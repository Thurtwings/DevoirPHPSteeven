<?php
class Human
{
    private $identity;
    private $health;
    private $strenght;
    private $exp;
    private $tab = [];
    
    function __construct($_identity, $_health, $_exp)
    {
        $this->identity = $_identity;
        $this->health = $_health;
        $this->strenght = rand(1, 9);
        $this->exp = $_exp;
        

    }

    public function GetHumanIdentity()
    {
        echo "<br> <b>" . $this->identity . "</b> : " . $this->health . " de santé, ma force :"
            . $this->strenght . ", mon expérience : " . $this->exp ."<br>";
    }

    public function SetHealth($_health)
    {
        if (!is_int($_health)) {
            trigger_error("La santé doit être un entier", E_USER_WARNING);
            return;
        }
        echo "La santé de ". $this->identity." est à :".$_health."<br>";
        $this->health = $_health;
        
        if($this->health <= 0){
            echo "<b style='color:red;'>Le regrété ".$this->identity." nous à subitement quitté.</b> <br>";
        }
    }
    public function SetExp()
    {
        $this->exp ++;
    }

    public function Get($param)
    {
        return $this->$param;
    }

    
    
}


?>