<?php
    $id = $_GET['id'];
    $obj = new Snake($id);

    if(isset($_POST['execute']))
    {
        foreach($_POST as $key => $value)
        {
            if($key != "execute") $obj->Set($key, $id, $value);
        }
    }
?>

<div class="container mt-5">
    <form action="" method="POST">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom:</label>
            <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $obj->Get("snake_name", $id); ?>">
        </div>
        <div class="mb-3">
            <label for="poids" class="form-label">Poids:</label>
            <input type="text" class="form-control" name="poids" id="poids" value="<?php echo $obj->Get("snake_weight", $id); ?>">
        </div>
        <div class="mb-3">
            <label for="DoB" class="form-label">Date de naissance:</label>
            <input type="date" class="form-control" name="DoB" id="DoB" value="<?php echo $obj->Get("snake_H_DoB", $id); ?>">
        </div>
        <div class="mb-3">
            <label for="lifespan" class="form-label">Espérance de vie:</label>
            <input type="text" class="form-control" name="lifespan" id="lifespan" value="<?php echo $obj->Get("snake_lifespan", $id); ?>">
        </div>
        <div class="mb-3">
            <label for="specie" class="form-label">Espèce:</label>
            <input type="text" class="form-control" name="specie" id="specie" value="<?php echo $obj->Get("snake_specie", $id); ?>">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Genre:</label>
            <input type="text" class="form-control" name="gender" id="gender" value="<?php echo $obj->Get("snake_gender", $id); ?>">
        </div>
        <div class="mb-3">
            <label for="daddy" class="form-label">Papa serpent:</label>
            <input type="text" class="form-control" name="daddy" id="daddy" value="<?php echo $obj->Get("snake_dad", $id); ?>">
        </div>
        <div class="mb-3">
            <label for="mommy" class="form-label">Maman Serpent:</label>
            <input type="text" class="form-control" name="mommy" id="mommy" value="<?php echo $obj->Get("snake_mom", $id); ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="execute">Executer</button>
    </form>
</div>
