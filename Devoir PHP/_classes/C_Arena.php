<?php 
class Arena
{
    var $id = 0;
    var $fighters = array();

    function __construct()
    {
        
    }

    public function FillTheHumanArray($human)
    {
        array_push($this->fighters, $human);
        

    }
    public function SetFirstAndSecondFighter()
    {
        
        $fighter_1 = rand(0, 3);
        $fighter_2 = rand(0, 3);

        while($fighter_1 == $fighter_2)
        {
            $fighter_2 = rand(0, 3);
        }
        

        echo "<br><br> Le combat opposant : <b><u>".$this->fighters[$fighter_1]->Get('identity').
        " et ".$this->fighters[$fighter_2]->Get('identity')."</u></b> va débuter! <br>";
        
        $tmpStrenght1 = $this->fighters[$fighter_1]->Get('strenght') + 
                            $this->fighters[$fighter_1]->Get('exp');

        $tmpStrenght2 = $this->fighters[$fighter_2]->Get('strenght')+ 
                            $this->fighters[$fighter_1]->Get('exp');

        $tmpHealth1 = $this->fighters[$fighter_1]->Get('health'); 
        $tmpHealth2 = $this->fighters[$fighter_2]->Get('health'); 

        $tmpHealth1 -= $tmpStrenght2;
        $tmpHealth2 -= $tmpStrenght1;

        $this->fighters[$fighter_1]->SetHealth($tmpHealth1);
        $this->fighters[$fighter_2]->SetHealth($tmpHealth2);
        $this->fighters[$fighter_1]->SetExp();
        $this->fighters[$fighter_2]->SetExp();
        
        
        

        
        

    }
    public function fFight($_strenght, $_exp)
    {
        
        # code...
    }
    

}


?>