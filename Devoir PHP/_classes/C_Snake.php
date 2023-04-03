<?php
require_once "helpers/data.php";
require_once "helpers/helpers.php";
class Snake
{
    # Variables
    private $SQL_tab = "snakes";
    public $index = "";
    public $sql ="";
    public $isDead = False;
    public $reproduced;
    
    
    public $asc = true;
    # Constructeur Syntaxe exclusive __construct
    public function __construct($id)
    {
        $this->index = $id;
        $this->sql = new PDO('mysql:host=localhost;dbname=snakes_db', 'root', '');
        $this->reproduced = false;


    }

    


    public function SelectAll($sort = null, $filterGender = null, $filterSpecie = null, $limit = null, $offset = null)
    {
        $req = "SELECT * FROM `" . $this->SQL_tab . "`";
        if($filterSpecie == "Off")
        {
            $filterSpecie = null;
        }
        // Add filters to the SQL query
        $filters = array();
        if($filterGender === 'Male' || $filterGender === 'Female') 
        {
            $filters[] = "`snake_gender` = '" . $filterGender . "'";
        }
        if($filterSpecie !== null) 
        {
            $filters[] = "`snake_specie` = '" . $filterSpecie . "'";
        }
        if(!empty($filters)) 
        {
            $req .= " WHERE " . implode(" AND ", $filters);
        }
        if($sort === 'specie') 
        {
            $req .= " ORDER BY `snake_specie` ASC";
        } 
        elseif($sort === 'gender') 
        {
            $req .= " ORDER BY `snake_gender` ASC";
        }
        if($limit !== null && $offset !== null) 
        {
            $req .= " LIMIT $limit OFFSET $offset";
        }



        // Execute the SQL query and return the result
        $result = $this->sql->query($req);
        $tlbresult = $result->fetchAll();
        return $tlbresult;
    }


    public function SelectAllByGender($gender)
    {
        $req = "SELECT * FROM `snakes` ORDER BY ".$gender."";
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
        $options = [];
        if($column == "snake_gender")
        {
            $req = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '".$this->SQL_tab."' AND COLUMN_NAME = '" . $column . "'";
            $stmt = $this->sql->prepare($req);
            $stmt->execute();
            $result = $stmt->fetch();
            $enum_list = explode(',', preg_replace('/[^\w,]/', '', $result['COLUMN_TYPE']));
            foreach ($enum_list as $value) 
            {
                $options[$value] = $value;
            }
            

        }

        return $options;
    }
    public function Get($column, $id)
    {
        $req = "SELECT " . $column . " FROM " . $this->SQL_tab . " WHERE snake_id = '" . $id . "'; ";
        $result = $this->sql->query($req);

        if ($result !== false) {
            $tlbresult = $result->fetchAll();

            if (count($tlbresult) > 0) {
                return $tlbresult[0][0];
            } else {
                return null; // or throw an exception, depending on how you want to handle errors
            }
        } else {
            // Vous pouvez ajouter ici un message d'erreur ou une exception pour indiquer que la requête a échoué
            return null;
        }
    }


    

    public function Set($column, $id, $value)
    {
        $req = "UPDATE ".$this->SQL_tab." SET ".$column." = '".$value."' WHERE `snake_id` ='".$id."'";
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
                $rdmName = rand(0, count(getMaleSnakesNames()) - 1);
                $rdmSpecie = rand(0, count(getSnakesSpecies()) - 1);
                if($randSex == 1)
                {
                    $life = rand(30,90);
                    $this->addNew(getMaleSnakesNames()[$rdmName], rand(1,50), $life, getRandomDate($life), getSnakesSpecies()[$rdmSpecie],"Male");
                }
                else
                {
                    $life = rand(30,90);
                    $this->addNew(getFemaleSnakesNames()[$rdmName], rand(1,50), $life, getSnakesSpecies()($life), getSnakesSpecies()[$rdmSpecie],"Female");
                }
            }
            echo $rdmNumber." serpents ont été générés aléatoirement";
        }
        else
        {
            for($i = 0; $i < $amount; $i++ )
            {
                $randSex = rand(1,2);
                $rdmName = rand(0, count(getMaleSnakesNames()) - 1);
                $rdmSpecie = rand(0, count(getSnakesSpecies()) - 1);
                if($randSex == 1)
                {
                    $life = rand(30,90);
                    $this->addNew(getMaleSnakesNames()[$rdmName], rand(1,50), $life, getRandomDate($life), getSnakesSpecies()[$rdmSpecie],"Male");
                }
                else
                {
                    $life = rand(30,90);
                    $this->addNew(getFemaleSnakesNames()[$rdmName], rand(1,50), $life, getRandomDate($life), getSnakesSpecies()[$rdmSpecie],"Female");
                }
            }
            
        }
    }

    public function hasReproduced() 
    {
        return $this->reproduced;
    }
    public function setReproduced($reproduced) 
    {
        $this->reproduced = $reproduced;
    }
#fonctions fonctionnelle mais temporaire
    /* public function SnakeReproduction($daddy, $mommy)
    {
        $snakeDad = new Snake($daddy);
        $snakeMom = new Snake($mommy);
        $randSex = rand(1,2);
        $rdmName = rand(0, count(getMaleSnakesNames()) - 1);
        $rdmSpecie = rand(0, count(getSnakesSpecies()) - 1);
        date_default_timezone_set('Europe/Paris');

        if($randSex == 1)
        {
            $life = rand(30,90);

            $this->addNew(getMaleSnakesNames()[$rdmName], rand(1,50), $life, date('Y-m-d H:i:s'), getSnakesSpecies()[$rdmSpecie],"Male", $this->Get("snake_name", $daddy), $this->Get("snake_name", $mommy));
        }
        else
        {
            $life = rand(30,90);
            $this->addNew(getFemaleSnakesNames()[$rdmName], rand(1,50), $life, date('Y-m-d H:i:s'), getSnakesSpecies()[$rdmSpecie],"Female", $this->Get("snake_name", $daddy), $this->Get("snake_name", $mommy));
        }
    }
     */

     public function SnakeReproduction($daddy, $mommy)
    {
        $snakeDad = new Snake($daddy);
        $snakeMom = new Snake($mommy);

        // Check if the species are the same
        if ($snakeDad->Get("snake_specie", $daddy) !== $snakeMom->Get("snake_specie", $mommy)) {
            // Try to find another snake of the same species
            try {
                if ($snakeDad->Get("snake_gender", $daddy) === "Male") {
                    $mommy = $this->GetAliveSnakeByGenderAndSpecie("Female", $snakeDad->Get("snake_specie", $daddy));
                } else {
                    $daddy = $this->GetAliveSnakeByGenderAndSpecie("Male", $snakeMom->Get("snake_specie", $mommy));
                }
            } catch (Exception $e) {
                // If there is no snake of the same species available, do not mate
                echo "No available mate of the same species was found.";
                return;
            }
        }

        // The rest of the code remains the same
        $randSex = rand(1, 2);
        $rdmName = rand(0, count(getMaleSnakesNames()) - 1);
        
        date_default_timezone_set('Europe/Paris');

        if($randSex == 1)
        {
            $life = rand(30,90);

            $this->addNew(getMaleSnakesNames()[$rdmName], rand(1,50), $life, date('Y-m-d H:i:s'), $this->Get("snake_specie", $daddy),"Male", $this->Get("snake_name", $daddy), $this->Get("snake_name", $mommy));
        }
        else
        {
            $life = rand(30,90);
            $this->addNew(getFemaleSnakesNames()[$rdmName], rand(1,50), $life, date('Y-m-d H:i:s'), $this->Get("snake_specie", $daddy),"Female", $this->Get("snake_name", $daddy), $this->Get("snake_name", $mommy));
        }
    }
   
public function GetAliveSnakeByGenderAndSpecie($gender, $specie)
{
    $req = "SELECT snake_id FROM " . $this->SQL_tab . " WHERE snake_dead = 0 AND snake_gender = :gender AND snake_specie = :specie LIMIT 1";
    $stmt = $this->sql->prepare($req);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':specie', $specie);
    $stmt->execute();

    // Check the number of affected rows
    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['snake_id'];
    } else {
        // Throw an exception if the result is empty
        throw new Exception("No snake found with the gender: " . $gender . " and the specie: " . $specie);
    }
}

   /*  public function GetAliveSnakeByGender($gender)
{
    $req = "SELECT snake_id FROM " . $this->SQL_tab . " WHERE snake_dead = 0 AND snake_gender = :gender LIMIT 1";
    $stmt = $this->sql->prepare($req);
    $stmt->bindParam(':gender', $gender);
    $stmt->execute();

    // Vérifie le nombre de lignes affectées
    $rowCount = $stmt->rowCount();
    
    if ($rowCount > 0) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['snake_id'];
    } else {
        // Lancer une exception si le résultat est vide
        throw new Exception("Aucun serpent trouvé avec le genre: " . $gender);
    }
} */

    /* public function CheckLifespan($id)
    {
        date_default_timezone_set('Europe/Paris');
        $lifespan = $this->Get("snake_lifespan", $id);
        $dateOfBirth = strtotime($this->Get("snake_H_DoB", $id));
        $currentTime = time();
        $timeSinceBirth = $currentTime - $dateOfBirth;
        $timeLeft = $lifespan - $timeSinceBirth;
        $firstThirdLifespan = $lifespan / 3;

        $reproduced = $this->Get("snake_reproduced", $id);

        if (($timeSinceBirth >= $lifespan) && !$this->isDead)
        {
            $this->KillSnake($id);
            return true;
        }
        else if (($timeSinceBirth >= $firstThirdLifespan) && !$reproduced)
        {
            if($this->Get("snake_gender", $id) == "Male")
            {
                $this->SnakeReproduction($this->Get("snake_id", $id), $this->GetAliveSnakeByGender("Female"));
                $this->Set("snake_reproduced", $id ,1);
                echo ("Let's make babies!");
            }
            else if($this->Get("snake_gender", $id) == "Female")
            {
                $this->SnakeReproduction($this->GetAliveSnakeByGender("Male"),$this->Get("snake_id", $id));
                $this->Set("snake_reproduced", $id, 1);
                echo ("Let's make babies!");
            }
            else
            {
                echo ("no more babies!");
            }
        }
        else
        {
            return false;
        }
    } */
    public function CheckLifespan($id)
    {
        date_default_timezone_set('Europe/Paris');
        
        try {
            $lifespan = $this->Get("snake_lifespan", $id);
            $dateOfBirth = strtotime($this->Get("snake_H_DoB", $id));
        } catch (Exception $e) {
            echo "Error: ", $e->getMessage();
            return false;
        }
        
        $currentTime = time();
        $timeSinceBirth = $currentTime - $dateOfBirth;
        $firstThirdLifespan = $lifespan / 3;
        $reproduced = $this->Get("snake_reproduced", $id);

        if (($timeSinceBirth >= $lifespan) && !$this->isDead) 
        {
            $this->KillSnake($id);
            return true;
        } 
        else if (($timeSinceBirth >= $firstThirdLifespan) && !$reproduced) 
        {
            $gender = $this->Get("snake_gender", $id);
            $snakeSpecies = $this->Get("snake_specie", $id);

            if ($gender === "Male" || $gender === "Female") 
            {
                try 
                {
                    $partnerId = $this->GetAliveSnakeByGenderAndSpecie($gender === "Male" ? "Female" : "Male", $snakeSpecies);

                    $this->SnakeReproduction($gender === "Male" ? $id : $partnerId, $gender === "Female" ? $id : $partnerId);
                    $this->Set("snake_reproduced", $id, 1);

                    // echo "Let's make babies!";
                } 
                catch (Exception $e) 
                {
                    // echo "No available mate of the same species was found.";
                }
            } 
            else 
            {
                // echo "Invalid gender!";
            }
        } 
        else 
        {
            return false;
        }
    }

    public function SameSpecies($snake1_id, $snake2_id)
    {
        $snake1_specie = $this->Get("snake_specie", $snake1_id);
        $snake2_specie = $this->Get("snake_specie", $snake2_id);

        return $snake1_specie === $snake2_specie;
    }

    
    /* public function CheckLifespan($id)
    {
        date_default_timezone_set('Europe/Paris');
        $lifespan = $this->Get("snake_lifespan", $id);
        $dateOfBirth = strtotime($this->Get("snake_H_DoB", $id));
        $currentTime = time();
        $timeSinceBirth = $currentTime - $dateOfBirth;
        $timeLeft = $lifespan - $timeSinceBirth;
        $firstThirdLifespan = $lifespan / 3;
    
        $reproduced = $this->Get("snake_reproduced", $id);
    
        if (($timeSinceBirth >= $lifespan) && !$this->isDead)
        {
            $this->KillSnake($id);
            return true;
        }
        else if (($timeSinceBirth >= $firstThirdLifespan) && !$reproduced)
        {
            if($this->Get("snake_gender", $id) == "Male")
            {
                $this->SnakeReproduction($this->Get("snake_id", $id), $this->GetAliveSnakeByGender("Female"));
                $this->Set("snake_reproduced", $id ,1);
                echo ("Let's make babies!");
            }
            else if($this->Get("snake_gender", $id) == "Female")
            {
                $this->SnakeReproduction($this->GetAliveSnakeByGender("Male"),$this->Get("snake_id", $id));
                $this->Set("snake_reproduced", $id, 1);
                echo ("Let's make babies!");
            }
            else
            {
                echo ("no more babies!");
            }
        }
        else
        {
            return false;
        }
    }
 */
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
    
    
    
}




?>