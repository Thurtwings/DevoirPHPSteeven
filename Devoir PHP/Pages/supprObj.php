
<?php  

// Delete this snake.
// Get a new Snake object
    $obj = new Snake($_GET['id']);

    if(isset($_POST["yes"]))
    {
        $obj->DeleteThisSnake($obj->Get("snake_id"));
        
        echo "Félicitation vous venez de tuer de sang froid le serpent numéro: ".$obj->Get("snake_id")." et nommé: ".$obj->Get("snake_name");
        ?><br><br><?php 
        echo "Vous pouvez retourner à la page de gestion";
        exit();
        
    }
    if(isset($_POST["nope"]))
    {
        
        ?><br><br><?php 
        echo "Vous pouvez retourner à la page de gestion";
        exit();
        
        
    }

?>
<br>Etes vous sur de vouloir tuer ce serpent?
<br><br>
<div>
<form action=""  method="POST"> <input type='submit' value="Oui" name="yes" > </form>
<form action=""  method="POST"> <input type='submit' value="Non" name="nope" > </form>


</div>