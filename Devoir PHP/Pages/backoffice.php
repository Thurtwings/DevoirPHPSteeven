
<?php
include("_classes/C_Arena.php");

if (empty($_SESSION)) {
    //die("Crevure"); //cette ligne coupe complètement le script php
    //include("Pages/admin.php");
    header('Location:index.php?page=admin');
} 
else 
{

    $fightersList = new Arena();

    $human1 = new Human('Jeanninja', 100, 0);
    $human1->GetHumanIdentity();
    $fightersList->FillTheHumanArray($human1);
    $fightersList->id++;

    $human2 = new Human('Jean-Clodo', 100, 0);
    $human2->GetHumanIdentity();
    $fightersList->FillTheHumanArray($human2);
    $fightersList->id++;

    $human3 = new Human('Xx_D4rk_Jean-Yves_xX', 100, 0);
    $human3->GetHumanIdentity();
    $fightersList->FillTheHumanArray($human3);
    $fightersList->id++;

    $human4 = new Human('Jean-Louis le démon', 100, 0);
    $human4->GetHumanIdentity();
    $fightersList->FillTheHumanArray($human4);
    $fightersList->id++;

    for($i = 0; $i <=15; $i++)
        $fightersList->SetFirstAndSecondFighter();
    
    
    
    


    
    
    
    
} 
?>
