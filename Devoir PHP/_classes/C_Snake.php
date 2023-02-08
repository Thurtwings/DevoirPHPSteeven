<?php
class Snake
{
    # Variables
    private $SQL_tab = "snakes";
    private $index = "";
    public $sql ="";
    private $snakesNames = array("Zarce", "Chiksha", "Szaccolhai", "Xaxsairral", "Adhiso", "Chastha", "Nisat", "Ostibhat", "Movastha", "Ladrarkattra", "Iraazs", "Yessish", "Kuscasasj", "Talicsie", "Irjace", "Ashpa", "Khivya", "Vrirmadmu", "Sakitha", "Atahasha", "Aco", "Eksaa", "Crudjuckaazs", "Odizhaash", "Erkuxzai", "Tika", "Ati", "Khahirka", "Isashpat", "Hoswatrala");
    private $snakesSpecies = array("Cobra", "Anaconda", "Python", "Boa", "Mamba Noir", "Vipère", "Python", "Couleuvre", "Serpent à sonnette", "Serpent corail", "Serpent vert", "Serpent de mer", "Serpent à lunettes");

    # Constructeur Syntaxe exclusive __construct
    public function __construct($id)
    {
        $this->index = $id;
        $this->sql = new PDO('mysql:host=localhost;dbname=snakes_db', 'root', '');
    }

    public function SelectAll($sort = null, $filter = null)
    {
        $req = "SELECT * FROM `".$this->SQL_tab."`";

        if ($sort === "specie") 
        {
            $req .= " ORDER BY `snakes`.`snake_specie` ASC";
        } 
        elseif ($sort === "gender") 
        {
            $req .= " ORDER BY `snakes`.`snake_gender` ASC";
        }
        
        if($filter === "M")
        {
            $req .= " WHERE snake_gender = 'Male'";
        }
        elseif($filter === "F")
        {
            $req .= "WHERE snake_gender = 'Female'";
        }

        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        
        return $tlbresult;
    }

    public function Get($column)
    {
        $req = "SELECT ".$column." FROM ".$this->SQL_tab." WHERE snake_id  = '".$this->index."'"; 
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult[0][0]; 
    }

    public function GetName($column, $id)
    {
        // $req = "SELECT ".$column." FROM ".$this->SQL_tab." WHERE snake_id  = '".$this->index."'"; 
        $req = "SELECT `".$column."` FROM `".$this->SQL_tab."` WHERE `snake_id` = `".$id."`"; 
        $this->sql->query($req);
    }

    public function Set($column, $value, $id)
    {
        $req = "UPDATE ".$this->SQL_tab." SET ".$column." = '".$value."' WHERE `snake_id` ='".$id."'";
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
                $rdmName = rand(0, count($this->snakesNames) - 1);
                $rdmSpecie = rand(0, count($this->snakesSpecies) - 1);
                if($randSex == 1)
                {
                    $life = rand(3,90);
                    $this->addNew($this->snakesNames[$rdmName], rand(1,50), $life, $this->RandomDate($life), $this->snakesSpecies[$rdmSpecie],"Male");
                }
                else
                {
                    $life = rand(3,90);
                    $this->addNew($this->snakesNames[$rdmName], rand(1,50), $life, $this->RandomDate($life), $this->snakesSpecies[$rdmSpecie],"Female");
                }
            }
            echo $rdmNumber." Serpents ont été généré aléatoirement";
        }
        else
        {
            for($i = 0; $i < $amount; $i++ )
            {
                $randSex = rand(1,2);
                $rdmName = rand(0, count($this->snakesNames) - 1);
                $rdmSpecie = rand(0, count($this->snakesSpecies) - 1);
                if($randSex == 1)
                {
                    $life = rand(3,90);
                    $this->addNew($this->snakesNames[$rdmName], rand(1,50), $life, $this->RandomDate($life), $this->snakesSpecies[$rdmSpecie],"Male");
                }
                else
                {
                    $life = rand(3,90);
                    $this->addNew($this->snakesNames[$rdmName], rand(1,50), $life, $this->RandomDate($life), $this->snakesSpecies[$rdmSpecie],"Female");
                }
            }
            
        }
    }


#fonctions fonctionnelle mais temporaire
    public function SnakeReproduction($daddy, $mommy)
    {
        $randSex = rand(1,2);
        $rdmName = rand(0, count($this->snakesNames) - 1);
        $rdmSpecie = rand(0, count($this->snakesSpecies) - 1);
        date_default_timezone_set('Europe/Paris');
        if($randSex == 1)
        {
            $life = rand(3,90);
            echo ($this->GetName('snake_name', $daddy));
            $this->addNew($this->snakesNames[$rdmName], rand(1,50), $life, date('Y-m-d H:i'), $this->snakesSpecies[$rdmSpecie],"Male", $this->Set("snake_dad", $this->GetName('snake_name', $daddy), $daddy), $this->Set("snake_mom", $this->GetName('snake_name', $mommy), $mommy));
        }   
        else
        {
            $life = rand(3,90);
            echo ($this->GetName('snake_name', $daddy));
            $this->addNew($this->snakesNames[$rdmName], rand(1,50), $life, date('Y-m-d H:i'), $this->snakesSpecies[$rdmSpecie],"Female", $this->Set("snake_dad", $this->GetName('snake_name', $daddy), $daddy), $this->Set("snake_mom", $this->GetName('snake_name', $mommy), $mommy));
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

    # Compte tous les serpent dont le genre est "Female"
    public function CountAllFemales()
    {
        $req ="SELECT count(*) FROM `snakes` WHERE `snake_gender` = 'Female'";
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult[0][0]; 
    }

    # Compte tous les serpent dont le genre n'a pas été renseigné et se retrouve pas defaut à NULL dans la base données
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
        $req = "UPDATE `snakes` SET `snake_dead` = '1' WHERE `snakes`.`snake_id` =".$idSnake;
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult;
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
        $req = "DELETE FROM `snakes` WHERE `snakes`.`snake_id` =".$idSnake;
        $this->sql->query($req);
        
    }

    # Fonction retournant un date aléatoire entre la date d'aujourd'hui, et la date d'aujourd'hui-la durée de vie du serpent
    function RandomDate($months) 
    {
        if (!is_int($months) || $months <= 0) {
            return false;
        }

        date_default_timezone_set('Europe/Paris');

        $today = strtotime(date("Y-m-d H:i"));
        $start_date = strtotime("-$months months", $today);
                
        // Generate random number using above bounds
        $val = rand($start_date, $today);

        // Convert back to desired date format
        return date('Y-m-d H:i', $val);

    }


}




?>