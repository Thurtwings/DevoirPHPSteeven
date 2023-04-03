<?php
    if(isset($_POST['SubmitInsert']))
    {
       $obj = new Snake(0);
       $obj->addNew($_POST["snake_name"], $_POST["snake_weight"], $_POST["snake_lifespan"], $_POST["DateOfBirth"], $_POST["snake_specie"], $_POST["snake_gender"] );
    }
?>

<div class="container mt-5">
    <h3 class="text-center mb-4">Ajouter un serpent à la base de données</h3>
    <form action="" method="POST" class="col-6 offset-3">
        <div class="mb-3">
            <label for="snake_name" class="form-label">Nom:</label>
            <input type="text" class="form-control" name="snake_name" id="snake_name" value="">
        </div>
        <div class="mb-3">
            <label for="snake_weight" class="form-label">Poids:</label>
            <input type="text" class="form-control" name="snake_weight" id="snake_weight" value="">
        </div>
        <div class="mb-3">
            <label for="snake_lifespan" class="form-label">Durée de vie:</label>
            <input type="text" class="form-control" name="snake_lifespan" id="snake_lifespan" value="">
        </div>
        <div class="mb-3">
            <label for="DateOfBirth" class="form-label">Date de naissance:</label>
            <input type="date" class="form-control" name="DateOfBirth" id="DateOfBirth" value="">
        </div>
        <div class="mb-3">
            <label for="snake_specie" class="form-label">Espèce:</label>
            <select name="snake_specie" id="snake_specie" class="form-select">
                <option value="all">Espece Inconnue</option>
                <?php foreach (getSnakesSpecies() as $key => $value) 
                {
                    echo "<option value='$value'>$value</option>";
                }?>
            </select>
        </div>
        <div class="mb-3">
            <label for="snake_gender" class="form-label">Sexe:</label>
            <select name="snake_gender" id="snake_gender" class="form-select">
                <option value="all">Genre inconnu</option>
                <option value="M">Male</option>
                <option value="F">Femelle</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="SubmitInsert">Soumettre</button>
    </form>
</div>
