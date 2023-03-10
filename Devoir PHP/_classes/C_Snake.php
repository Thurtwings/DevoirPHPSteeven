<?php
class Snake
{
    # Variables
    private $SQL_tab = "snakes";
    public $index = "";
    public $sql ="";
    public $isDead = False;
    public $alreadyParent = False;
    // Male snake names
private $maleSnakesNames = array(
    "Agni", "Arjun", "Bala", "Bhima", "Chandra",
    "Dhruva", "Gagan", "Girish", "Hari", "Jivan",
    "Kavi", "Kiran", "Lalit", "Madhav", "Naveen",
    "Nikhil", "Om", "Pranav", "Raj", "Rakesh",
    "Ravi", "Rishi", "Rohit", "Sahil", "Sanjay",
    "Sarvesh", "Shankar", "Shiva", "Sudhir", "Suraj",
    "Vikram", "Vishal", "Yogi", "Yuvraj", "Zorawar",
    "Ashwin", "Kamal", "Jaswant", "Jatin", "Shailendra"
);

// Female snake names
private $femaleSnakesNames = array(
    "Aarti", "Anjali", "Asha", "Chhaya", "Disha",
    "Gauri", "Geeta", "Indira", "Jyoti", "Kajal",
    "Kavita", "Kirti", "Lata", "Madhu", "Mala",
    "Maya", "Meena", "Nalini", "Neha", "Pooja",
    "Radha", "Rajni", "Reena", "Renu", "Rita",
    "Sakshi", "Sangita", "Savita", "Shalini", "Shanti",
    "Shilpa", "Shweta", "Smita", "Sujata", "Sunita",
    "Supriya", "Swati", "Uma", "Usha", "Vandana"
);
public $snakesSpecies = array (
    "Cobra", "Anaconda", "Boa", "Black Mamba", "Viper", "Python", 
    "Grass Snake", "Rattlesnake", "Coral Snake", "Green Snake", 
    "Sea Snake", "Spectacled Snake", "Adder", "Bush Viper", "Gaboon Viper",
    "Horned Viper", "Cottonmouth", "Diamondback Rattlesnake", "Eastern Brown Snake",
    "Fer-de-Lance", "Inland Taipan", "King Cobra", "Mojave Rattlesnake", "Rhinoceros Viper",
    "Tiger Snake", "Water Moccasin", "Western Hognose Snake", "Yellow-Bellied Sea Snake",
    "Black Rat Snake", "Green Anaconda", "Japanese Rat Snake"
);


    # Constructeur Syntaxe exclusive __construct
    public function __construct($id)
    {
        $this->index = $id;
        $this->sql = new PDO('mysql:host=localhost;dbname=snakes_db', 'root', '');
    }

    


    public function SelectAll($sort = null, $filterGender = null, $filterSpecie = null)
    {
        $req = "SELECT * FROM `" . $this->SQL_tab . "`";
        if($filterSpecie == "Off")
        {
            $filterSpecie = null;
        }
        // Add filters to the SQL query
        $filters = array();
        if ($filterGender === 'Male' || $filterGender === 'Female') 
        {
            $filters[] = "`snake_gender` = '" . $filterGender . "'";
        }
        if ($filterSpecie !== null) 
        {
            $filters[] = "`snake_specie` = '" . $filterSpecie . "'";
        }
        if (!empty($filters)) 
        {
            $req .= " WHERE " . implode(" AND ", $filters);
        }
        //echo ($req);
        // Add sorting to the SQL query
        if ($sort === 'specie') {
            $req .= " ORDER BY `snake_specie` ASC";
        } elseif ($sort === 'gender') {
            $req .= " ORDER BY `snake_gender` ASC";
        }

        // Execute the SQL query and return the result
        $result = $this->sql->query($req);
        $tlbresult = $result->fetchAll();
        return $tlbresult;
    }
    public function GetIdByName($name) 
{
    $req = "SELECT `snake_id` FROM `" . $this->SQL_tab . "` WHERE `snake_name` = :name";
    $stmt = $this->sql->prepare($req);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    $result = $stmt->fetch();
    if ($result) {
        return $result['snake_id'];
    } else {
        return null;
    }
}

    public function FetchOptions($column)
    {
        $options = array();
        if($column == "snake_gender")
        {
            $req = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '".$this->SQL_tab."' AND COLUMN_NAME = '" . $column . "'";
            $stmt = $this->sql->prepare($req);
            $stmt->execute();
            $result = $stmt->fetch();
            $enum_list = explode(',', preg_replace('/[^\w,]/', '', $result['Type']));
            foreach ($enum_list as $value) 
            {
                $options[$value] = $value;
            }
            

        }
        return $options;
    }
    public function Get($column, $id)
    {
        $req = "SELECT ".$column." FROM ".$this->SQL_tab." WHERE snake_id  = '".$id."'; ";
            
        $result = $this->sql->prepare($req);
        $result->execute();
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();

        if (count($tlbresult) > 0) 
        {
            return $tlbresult[0][0]; 
        } 
        else 
        {
            return null; // or throw an exception, depending on how you want to handle errors
        }
    }

    

    public function Set($column, $value)
    {
        $req = "UPDATE ".$this->SQL_tab." SET ".$column." = '".$value."' WHERE `snake_id` ='".$this->index."'";
        $this->sql->query($req);
    }

    public function addNew($name, $weight, $lifespan, $dateOfBirth, $specie, $gender, $daddy = "Unknown", $mommy = "Unknown")
    {
        $req = "INSERT INTO ".$this->SQL_tab." (`snake_id`, `snake_name`, `snake_weight`, `snake_lifespan`, `snake_H_DoB`, `snake_specie`, `snake_gender`, `snake_dad`, `snake_mom`, `snake_dead`) 
        VALUES (NULL, '".$name."','".$weight."', '".$lifespan."', '".$dateOfBirth."', '".$specie."', '".$gender."', '".$daddy."', '".$mommy."', '0')";
        $this->sql->query($req);
    }



    public function AddRandomAmountOfSnake($amount = 0, $isRandom)
    {
        if($isRandom == true)
        {
            $rdmNumber = rand(1,$amount);
            for($i = 0; $i < $rdmNumber; $i++ )
            {
                $randSex = rand(1,2);
                $rdmName = rand(0, count($this->maleSnakesNames) - 1);
                $rdmSpecie = rand(0, count($this->snakesSpecies) - 1);
                if($randSex == 1)
                {
                    $life = rand(30,90);
                    $this->addNew($this->maleSnakesNames[$rdmName], rand(1,50), $life, $this->RandomDate($life), $this->snakesSpecies[$rdmSpecie],"Male");
                }
                else
                {
                    $life = rand(30,90);
                    $this->addNew($this->femaleSnakesNames[$rdmName], rand(1,50), $life, $this->RandomDate($life), $this->snakesSpecies[$rdmSpecie],"Female");
                }
            }
            echo $rdmNumber." serpents ont ??t?? g??n??r??s al??atoirement";
        }
        else
        {
            for($i = 0; $i < $amount; $i++ )
            {
                $randSex = rand(1,2);
                $rdmName = rand(0, count($this->maleSnakesNames) - 1);
                $rdmSpecie = rand(0, count($this->snakesSpecies) - 1);
                if($randSex == 1)
                {
                    $life = rand(30,90);
                    $this->addNew($this->maleSnakesNames[$rdmName], rand(1,50), $life, $this->RandomDate($life), $this->snakesSpecies[$rdmSpecie],"Male");
                }
                else
                {
                    $life = rand(30,90);
                    $this->addNew($this->femaleSnakesNames[$rdmName], rand(1,50), $life, $this->RandomDate($life), $this->snakesSpecies[$rdmSpecie],"Female");
                }
            }
            
        }
    }


#fonctions fonctionnelle mais temporaire
    public function SnakeReproduction($daddy, $mommy)
    {
        $randSex = rand(1,2);
        $rdmName = rand(0, count($this->maleSnakesNames) - 1);
        $rdmSpecie = rand(0, count($this->snakesSpecies) - 1);
        date_default_timezone_set('Europe/Paris');

        if($randSex == 1)
        {
            $life = rand(30,90);
            
            $this->addNew($this->maleSnakesNames[$rdmName], rand(1,50), $life, date('Y-m-d H:i:s'), $this->snakesSpecies[$rdmSpecie],"Male", $this->Get("snake_name", $daddy), $this->Get("snake_name", $mommy));
        }   
        else
        {
            $life = rand(30,90);
            $this->addNew($this->femaleSnakesNames[$rdmName], rand(1,50), $life, date('Y-m-d H:i:s'), $this->snakesSpecies[$rdmSpecie],"Female", $this->Get("snake_name", $daddy), $this->Get("snake_name", $mommy));
        }
    }
    
    public function GetAliveSnakeByGender($gender) {
        $req = "SELECT snake_id FROM " . $this->SQL_tab . " WHERE is_dead = 0 AND snake_gender = :gender LIMIT 1";
        $result = $this->sql->query($req);
        return $result;
    }
public function CheckLifespan($id) 
{
    date_default_timezone_set('Europe/Paris');
    $lifespan = $this->Get("snake_lifespan", $id);
    $dateOfBirth = strtotime($this->Get("snake_H_DoB", $id));
    $currentTime = time();
    $timeSinceBirth = $currentTime - $dateOfBirth;
    $timeLeft = $lifespan - $timeSinceBirth;
    $halfLifespan = $lifespan / 2;
    if (($timeSinceBirth >= $lifespan) && !$this->isDead) 
    {
        $this->KillSnake($id);
        return true;
    }
    else if (($timeSinceBirth >= $halfLifespan) && !$this->alreadyParent)
    {
        if($this->Get("snake_gender", $id) == "Male")
        {
            $this->SnakeReproduction($this->Get("snake_id", $id), $this->GetAliveSnakeByGender("Female")); //TODO: trouver le moyen de fournir l'id en fonction du serpent qui appelle la fonction
            $this->alreadyParent = true;
            echo ("Let's make babies!");
        }
        else if($this->Get("snake_gender", $id) == "Female")
        {
            $this->SnakeReproduction($this->GetAliveSnakeByGender("Male"),$this->Get("snake_id", $id)); //TODO: trouver le moyen de fournir l'id en fonction du serpent qui appelle la fonction
            $this->alreadyParent = true;
            echo ("Let's make babies!");
        }
    }
    else
    {
        
        return false; 
    }
    
    
}


# Fonctions de comptage  
    public function CountAllMales()
    {
        $req ="SELECT count(*) FROM `snakes` WHERE `snake_gender` = 'Male'";
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult[0][0]; 
    }

    # Compte tous les serpents dont le genre est "Female"
    public function CountAllFemales()
    {
        $req ="SELECT count(*) FROM `snakes` WHERE `snake_gender` = 'Female'";
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult[0][0]; 
    }

    # Compte tous les serpents dont le genre n'a pas ??t?? renseign?? et se retrouve pas defaut ?? NULL dans la base donn??es
    public function CountAllUnidentified()
    {
        $req ="SELECT count(*) FROM `snakes` WHERE `snake_gender` = NULL";
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult[0][0]; 
    }

    # Permet de compter le nombre de serpents morts 
    public function CountDeadSnakes()
    {
        $req = "SELECT COUNT(*) FROM `".$this->SQL_tab."` WHERE `snake_dead` = '1'" ;
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult[0][0];
    }
    # Compte tous les serpents confondu de la base de donn??es 
    public function CountAll()
    {
        $req = "SELECT COUNT(*) FROM `".$this->SQL_tab."`";
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult[0][0];
    }


    # Permet de tuer un serpent dont on renseigne l'identifiant
    public function KillSnake($idSnake)
    {
        if(!$this->isDead)
        {
            $req = "UPDATE `".$this->SQL_tab."` SET `snake_dead` = '1' WHERE `".$this->SQL_tab."`.`snake_id` =".$idSnake;
            $this->isDead = True;
            $this->sql->query($req);
        }
    }



# Fonction de debug: vide la table snakes de la bdd
    public function TruncateTable()
    {
        $req = "TRUNCATE ".$this->SQL_tab;
        $this->sql->query($req);
    }

    # Supprime compl??tement un serpent dont on donne l'identifiant de la base de donn??es
    public function DeleteThisSnake($idSnake)
    {
        $req = "DELETE FROM `".$this->SQL_tab."` WHERE `".$this->SQL_tab."`.`snake_id` =".$idSnake;
        $this->sql->query($req);
        
    }

    # Fonction retournant une date al??atoire entre la date d'aujourd'hui, et la date d'aujourd'hui-la dur??e de vie du serpent
    function RandomDate($months) 
    {
        if (!is_int($months) || $months <= 0) 
        {
            return false;
        }

        date_default_timezone_set('Europe/Paris');

        $today = strtotime(date("Y-m-d H:i:s"));
        $start_date = strtotime("-$months seconds", $today);
        
        // Generate random number using above bounds
        $val = rand($start_date, $today);
        
        // Convert back to desired date format
        return date('Y-m-d H:i:s', $val);

    }
    
}




?>