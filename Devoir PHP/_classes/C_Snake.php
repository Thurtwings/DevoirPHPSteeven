<?php
class Snake
{
    # Variables
    private $SQL_tab = "snakes";
    public $index = "";
    public $sql ="";
    public $isDead = False;
    
    private $maleSnakesNames = array(
        "Agni",
        "Arjun",
        "Bala",
        "Bhima",
        "Chandra",
        "Dhruva",
        "Gagan",
        "Girish",
        "Hari",
        "Jivan",
        "Kavi",
        "Kiran",
        "Lalit",
        "Madhav",
        "Naveen",
        "Nikhil",
        "Om",
        "Pranav",
        "Raj",
        "Rakesh",
        "Ravi",
        "Rishi",
        "Rohit",
        "Sahil",
        "Sanjay",
        "Sarvesh",
        "Shankar",
        "Shiva",
        "Sudhir",
        "Suraj",
        "Vikram",
        "Vishal",
        "Yogi",
        "Yuvraj",
        "Zorawar",
        "Ashwin",
        "Kamal",
        "Jaswant",
        "Jatin",
        "Shailendra"
    );
    private $femaleSnakesNames = array(
        "Aarti",
        "Anjali",
        "Asha",
        "Chhaya",
        "Disha",
        "Gauri",
        "Geeta",
        "Indira",
        "Jyoti",
        "Kajal",
        "Kavita",
        "Kirti",
        "Lata",
        "Madhu",
        "Mala",
        "Maya",
        "Meena",
        "Nalini",
        "Neha",
        "Pooja",
        "Radha",
        "Rajni",
        "Reena",
        "Renu",
        "Rita",
        "Sakshi",
        "Sangita",
        "Savita",
        "Shalini",
        "Shanti",
        "Shilpa",
        "Shweta",
        "Smita",
        "Sujata",
        "Sunita",
        "Supriya",
        "Swati",
        "Uma",
        "Usha",
        "Vandana",
        "Veena",
        "Vidya"
    );
    private $snakesSpecies = array  ("Cobra", "Anaconda", "Boa", 
                                    "Black Mamba", "Viper", "Python", 
                                    "Grass Snake", "Rattlesnake", "Coral Snake", 
                                    "Green Snake", "Sea Snake", "Spectacled Snake"
                                    );
    
    # Constructeur Syntaxe exclusive __construct
    public function __construct($id)
    {
        $this->index = $id;
        $this->sql = new PDO('mysql:host=localhost;dbname=snakes_db', 'root', '');
    }

    public function SelectAll($sort = null, $filterGender = null, $filterSpecie = null)
    {
        $req = "SELECT * FROM `".$this->SQL_tab."`";

        if($filterGender === "M")
        {
            $req .= " WHERE `snakes`.`snake_gender` = 'Male'";
        }

        elseif($filterGender === "F")
        {
            $req .= "WHERE `snakes`.`snake_gender` = 'Female'";
        }
        if($filterSpecie !== null)
        {
            $req .= " WHERE `snakes`.`snake_specie` = '".$filterSpecie."'";
        }
        
        elseif($filterSpecie !== null && $filterGender !== null)
        {
            $req .= " WHERE `snakes`.`snake_specie` = '".$filterSpecie."'";
        }
        
        if ($sort === "specie") 
        {
            $req .= " ORDER BY `snakes`.`snake_specie` ASC";
        } 
        elseif ($sort === "gender") 
        {
            $req .= " ORDER BY `snakes`.`snake_gender` ASC";
        }
        
        echo($req);
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        
        return $tlbresult;
    }

    /* public function Get($column, $id)
    {
        $req = "SELECT ".$column." FROM ".$this->SQL_tab." WHERE snake_id  = '".$this->index."'; ";
        
        $result = $this->sql->prepare($req);
        $result->execute();
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult[0][0]; 
    } */
    public function Get($column, $id)
{
    $req = "SELECT ".$column." FROM ".$this->SQL_tab." WHERE snake_id  = '".$this->index."'; ";
    
    $result = $this->sql->prepare($req);
    $result->execute();
    $result = $this->sql->query($req);
    $tlbresult = $result ->fetchAll();

    if (count($tlbresult) > 0) {
        return $tlbresult[0][0]; 
    } else {
        return null; // or throw an exception, depending on how you want to handle errors
    }
}

    public function GetName($column, $id)
    {
        // $req = "SELECT ".$column." FROM ".$this->SQL_tab." WHERE snake_id  = '".$this->index."'"; 
        $req = "SELECT `".$column."` FROM `".$this->SQL_tab."` WHERE `snake_id` = `".$id."`"; 
        $this->sql->query($req);
    }

    public function Set($column, $value)
    {
        $req = "UPDATE ".$this->SQL_tab." SET ".$column." = '".$value."' WHERE `snake_id` ='".$this->index."'";
        $this->sql->query($req);
    }

    public function addNew($name, $weight, $lifespan, $dateOfBirth, $specie, $gender, $daddy = NULL, $mommy = NULL)
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
                    $life = rand(3,90);
                    $this->addNew($this->maleSnakesNames[$rdmName], rand(1,50), $life, $this->RandomDate($life), $this->snakesSpecies[$rdmSpecie],"Male");
                }
                else
                {
                    $life = rand(3,90);
                    $this->addNew($this->femaleSnakesNames[$rdmName], rand(1,50), $life, $this->RandomDate($life), $this->snakesSpecies[$rdmSpecie],"Female");
                }
            }
            echo $rdmNumber." serpents ont été générés aléatoirement";
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
                    $life = rand(3,90);
                    $this->addNew($this->maleSnakesNames[$rdmName], rand(1,50), $life, $this->RandomDate($life), $this->snakesSpecies[$rdmSpecie],"Male");
                }
                else
                {
                    $life = rand(3,90);
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
            $life = rand(3,90);
            echo ($this->GetName('snake_name', $daddy));
            $this->addNew($this->maleSnakesNames[$rdmName], rand(1,50), $life, date('Y-m-d H:i:s'), $this->snakesSpecies[$rdmSpecie],"Male");
        }   
        else
        {
            $life = rand(3,90);
            echo ($this->GetName('snake_name', $daddy));
            $this->addNew($this->femaleSnakesNames[$rdmName], rand(1,50), $life, date('Y-m-d H:i:s'), $this->snakesSpecies[$rdmSpecie],"Female");
        }

    }
    /* public function CheckLifespan($id) 
    {
        $lifespan = $this->Get("snake_lifespan", $id);
        $dateOfBirth = strtotime($this->Get("snake_H_DoB", $id));
        $currentTime = time();
        $timeSinceBirth = $currentTime - $dateOfBirth;

        echo ($timeSinceBirth);
        if (($timeSinceBirth > $lifespan) && !$this->isDead) 
        {
            $this->KillSnake($this->Get("snake_id", $id));
            echo "je suis entré dans le if";
        }
    }
 */
public function CheckLifespan($id) 
{
    $lifespan = $this->Get("snake_lifespan", $id);
    $dateOfBirth = strtotime($this->Get("snake_H_DoB", $id));
    $currentTime = time();
    $timeSinceBirth = $currentTime - $dateOfBirth;

    if (($timeSinceBirth > $lifespan) && !$this->isDead) 
    {
        return true; // The snake should be killed
    }
    else
    {
        return false; // The snake should not be killed
    }
    
    
}

public function TimeBeforeDeath($id)
{
    $lifespan = $this->Get("snake_lifespan", $id);
    $dateOfBirth = strtotime($this->Get("snake_H_DoB", $id));
    echo(strtotime($dateOfBirth + $lifespan));
    return strtotime($dateOfBirth + $lifespan);
}
# Fonctions de comptage  
    public function CountAllMales()
    {
        $req ="SELECT count(*) FROM `snakes` WHERE `snake_gender` = 'Male'";
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult[0][0]; 
    }

    # Compte tous les serpent dont le genre est "Female"
    public function CountAllFemales()
    {
        $req ="SELECT count(*) FROM `snakes` WHERE `snake_gender` = 'Female'";
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult[0][0]; 
    }

    # Compte tous les serpents dont le genre n'a pas été renseigné et se retrouve pas defaut à NULL dans la base données
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
    # Compte tous les serpents confondu de la base de données 
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

    # Supprime complètement un serpent dont on donne l'identifiant de la base de données
    public function DeleteThisSnake($idSnake)
    {
        $req = "DELETE FROM `".$this->SQL_tab."` WHERE `".$this->SQL_tab."`.`snake_id` =".$idSnake;
        $this->sql->query($req);
        
    }

    # Fonction retournant une date aléatoire entre la date d'aujourd'hui, et la date d'aujourd'hui-la durée de vie du serpent
    function RandomDate($months) 
    {
        if (!is_int($months) || $months <= 0) 
        {
            return false;
        }

        date_default_timezone_set('Europe/Paris');

        $today = strtotime(date("Y-m-d H:i:s"));
        $start_date = strtotime("-$months months", $today);
        
        // Generate random number using above bounds
        $val = rand($start_date, $today);
        
        // Convert back to desired date format
        return date('Y-m-d H:i:s', $val);

    }


}




?>