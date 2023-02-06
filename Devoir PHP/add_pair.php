<?php 
    include("_classes/C_Snake.php");

    $obj = new Snake(0);
    var_dump($_POST);
    
    $male_snake = $_POST["male_snake_id"];
    echo($male_snake);
    $female_snake = $_POST["female_snake_id"];
    echo($female_snake);
    //$req = "INSERT INTO `snakes_pairing` (`male_snake_id`, `female_snake_id`) VALUES ('$male_snake', '$female_snake')";
    $req = "INSERT INTO `snakes_pairing`(`id`, `male_snake_id`, `female_snake_id`, `baby_snake_id`, `pairing_date`)
    VALUES (NULL,".$male_snake.",".$female_snake.",NULL, NULL)";
    $obj->sql->query($req);
    
     $obj->AddRandomAmountOfSnake(1,true);
     

    


    
?>
