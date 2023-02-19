<?php 
    $obj = new Snake($_GET['id']);

    if(isset($_POST['execute']))
    {
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
        <input type="text" name= 'nom' value="<?php echo $obj->Get("snake_name", $_GET['id']); ?>">
        <br>
        Poids:<br>
        <input type="text" name= 'poids' value="<?php echo $obj->Get("snake_weight", $_GET['id']); ?>">
        <br>
        Date de naissance:<br>
        <input type="date" name= 'DoB' value="<?php echo $obj->Get("snake_H_DoB", $_GET['id']); ?>">
        <br>
        Espérance de vie:<br>
        <input type="text" name= 'lifespan' value="<?php echo $obj->Get("snake_lifespan", $_GET['id']); ?>">
        <br>
        Espèce:<br>
        <input type="text" name= 'specie' value="<?php echo $obj->Get("snake_specie", $_GET['id'] ); ?>">
        <br>
        Genre:<br>
        <input type="text" name= 'gender' value="<?php echo $obj->Get("snake_gender", $_GET['id']); ?>">
        <br>
        Papa serpent:<br>
        <input type="text" name= 'daddy' value="<?php echo $obj->Get("snake_dad", $_GET['id']); ?>">
        <br>
        Maman Serpent:<br>
        <input type="text" name= 'mommy' value="<?php echo $obj->Get("snake_mom", $_GET['id']); ?>">
        <br>
        <br>
        <br>
        <input type='submit' value="Executer" name="execute">
    </form>
</div>

