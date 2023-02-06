<?php
class Objet
{
    private $SQL_tab = "snakes";
    private $index = "";
    public $sql ="";
    private $snakesNames = array("Zarce", "Chiksha", "Szaccolhai", "Xaxsairral", "Adhiso", "Chastha", "Nisat", "Ostibhat", "Movastha", "Ladrarkattra", "Iraazs", "Yessish", "Kuscasasj", "Talicsie", "Irjace", "Ashpa", "Khivya", "Vrirmadmu", "Sakitha", "Atahasha", "Aco", "Eksaa", "Crudjuckaazs", "Odizhaash", "Erkuxzai", "Tika", "Ati", "Khahirka", "Isashpat", "Hoswatrala");
    private $snakesSpecies = array("Cobra", "Anaconda", "Python", "Boa", "Mamba Noir", "Vipère", "Python", "Couleuvre", "Serpent à sonnette", "Serpent corail", "Serpent vert", "Serpent de mer", "Serpent à lunettes");
   
    public function __construct($id)
    {
        $this->index = $id;
        $this->sql = new PDO('mysql:host=localhost;dbname=snakes_db', 'root', '');
    }

    public function CountAllMales()
    {
        $req ="SELECT count(*) FROM `snakes` WHERE `snake_gender` = 'Male'";
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult[0][0]; 
        
        
    }
    public function CountAllFemales()
    {
        $req ="SELECT count(*) FROM `snakes` WHERE `snake_gender` = 'Female'";
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult[0][0]; 
        
        
    }public function CountAllUnidentified()
    {
        $req ="SELECT count(*) FROM `snakes` WHERE `snake_gender` = NULL";
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult[0][0]; 
        
        
    }
    public function CountAll()
    {
        
        $req = "SELECT COUNT(*) FROM `".$this->SQL_tab."`";
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult[0][0];
    }
    public function SelectAll($sort = null)
    {
        $req = "SELECT * FROM `".$this->SQL_tab."`";
        if ($sort === "specie") {
            $req .= " ORDER BY `snakes`.`snake_specie` ASC";
        } elseif ($sort === "gender") {
            $req .= " ORDER BY `snakes`.`snake_gender` ASC";
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

    
    
    public function Set($column, $value)
    {
        
        $req = "UPDATE ".$this->SQL_tab." SET ".$column." = '".$value."' WHERE `snake_id` =".$this->index;
        $this->sql->query($req);
    }

    public function addNew($name, $weight, $lifespan, $dateOfBirth, $specie, $gender, $daddy = NULL, $mommy = NULL)
    {
       
        
        $req = "INSERT INTO ".$this->SQL_tab." (`snake_id`, `snake_name`, `snake_weight`, `snake_lifespan`, `snake_H_DoB`, `snake_specie`, `snake_gender`, `snake_dad`, `snake_mom`, `snake_dead`) 
        VALUES (NULL, '".$name."','".$weight."', '".$lifespan."', '".$dateOfBirth."', '".$specie."', '".$gender."', '".$daddy."', '".$mommy."', '0')";
        $this->sql->query($req);
        
        
    }
   

    // Deletes a snake from the database.
    public function DeleteThisSnake($idSnake)
    {
        $req = "UPDATE `snakes` SET `snake_dead` = '1' WHERE `snakes`.`snake_id` =".$idSnake;
        $this->sql->query($req);
        
    }

    public function SortBySpecie(){
        $req = "SELECT * FROM `snakes` ORDER BY `snakes`.`snake_specie` ASC";
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult;
    }
    public function SortByGender()
    {
        
        $req = "SELECT * FROM `snakes` ORDER BY `snakes`.`snake_gender` ASC";
        echo " les Serpents sont triés";
        $result = $this->sql->query($req);
        $tlbresult = $result ->fetchAll();
        return $tlbresult;
    }
    // Adds an amount of snakes to the collection.
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
                    $this->addNew($this->snakesNames[$rdmName], rand(1,50), rand(3,90), date("Y-m-d"), $this->snakesSpecies[$rdmSpecie],"Male");
                }
                else
                {
                    $this->addNew($this->snakesNames[$rdmName], rand(1,50), rand(3,90), date("Y-m-d"), $this->snakesSpecies[$rdmSpecie],"Female");
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
                    $this->addNew($this->snakesNames[$rdmName], rand(1,50), rand(3,90), date("Y-m-d"), $this->snakesSpecies[$rdmSpecie],"Male");
                }
                else
                {
                    $this->addNew($this->snakesNames[$rdmName], rand(1,50), rand(3,90), date("Y-m-d"), $this->snakesSpecies[$rdmSpecie],"Female");
                }
            }
            echo $amount." Serpents ont été généré aléatoirement";
        }
    }

    public function KillSnake($idSnake)
    {
        $req = "UPDATE `snakes` SET `snake_dead` = '1' WHERE `snakes`.`snake_id` =".$idSnake;
        $this->sql->query($req);
    }

 
    
}




?>