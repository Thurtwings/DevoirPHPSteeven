
<?php  

// Delete this snake.
// Get a new Snake object
    $obj = new Snake($_GET['id']);

    if(isset($_POST["yes"]))
    {
        $obj->KillSnake($obj->Get("snake_id",$_GET['id']));
        
        echo "Félicitation vous venez de tuer de sang froid le serpent numéro: ".$obj->Get("snake_id", $_GET['id'])." et nommé: ".$obj->Get("snake_name", $_GET['id']);
        ?>
        <br><br><?php 
        echo "Vous pouvez retourner à la page de gestion";
        exit();
        
    }

?>
<br><h3> Etes vous sur de vouloir tuer ce serpent? </h3>
<br><br>
<div>
<form method="POST"> <input type='submit' value="Oui" name="yes" > </form>
<form action="index.php?page=gestion" method="POST"> <button>Non</button> </form>

</div>