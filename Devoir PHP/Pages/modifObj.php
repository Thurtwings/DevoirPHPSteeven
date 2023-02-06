<?php 
     $obj = new Snake($_GET['id']);

    if(isset($_POST['execute']))
    {
       /* $obj->Set('nom', $_POST["nom"]);
       $obj->Set('poids', $_POST["poids"]);
       $obj->Set('taille', $_POST["taille"]); */

       foreach($_POST as $key => $value)
       {
        if($key != "execute") $obj->Set($key, $value);
       }
    }
     
?>

    <div>
    <form action="" method="POST" >
        <br><br><br><br>
        Nom:<br>
        <input type="text" name= 'nom' value="<?php echo $obj->Get("snake_name"); ?>">
        <br>
        Poids:<br>
        <input type="text" name= 'poids' value="<?php echo $obj->Get("snake_weight"); ?>">
        <br>
        Date de naissance:<br>
        <input type="date" name= 'DoB' value="<?php echo $obj->Get("snake_H_DoB"); ?>">
        <br>
        Espérance de vie:<br>
        <input type="text" name= 'lifespan' value="<?php echo $obj->Get("snake_lifespan"); ?>">
        <br>
        Espèce:<br>
        <input type="text" name= 'specie' value="<?php echo $obj->Get("snake_specie"); ?>">
        <br>
        Genre:<br>
        <input type="text" name= 'gender' value="<?php echo $obj->Get("snake_gender"); ?>">
        <br>
        Papa serpent:<br>
        <input type="text" name= 'daddy' value="<?php echo $obj->Get("snake_dad"); ?>">
        <br>
        Maman Serpent:<br>
        <input type="text" name= 'mommy' value="<?php echo $obj->Get("snake_mom"); ?>">
        <br>
        <br>
        <br>
        <input type='submit' value="Executer" name="execute">
    </form>
</div>

