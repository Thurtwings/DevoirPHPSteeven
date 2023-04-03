<?php 
    $obj = new Snake(0);

   
    if(isset($_POST['lovelove']) && isset($_POST['male_snake_id']) && isset($_POST['female_snake_id']))
    {
        $male_snake_id = $_POST['male_snake_id'];
        $female_snake_id = $_POST['female_snake_id'];

        if ($obj->SameSpecies($male_snake_id, $female_snake_id)) 
        {
            $male_snake = $obj->Get("snake_name", $male_snake_id);
            $female_snake = $obj->Get("snake_name", $female_snake_id);

            echo "You selected male snake: " . $male_snake. "<br>";
            echo "You selected female snake: " . $female_snake. "<br>";

            $obj->SnakeReproduction($male_snake_id, $female_snake_id);

            echo "Youhou, un nouveau serpent est né!";
        } 
        else 
        {
            echo "Malheureusement, ces deux espèces de serpents ne peuvent pas se reproduire ensemble. Veuillez séléctionner deux serpents de la meme espèce";
        }
    }

    if($obj->CountAllFemales() == 0 && $obj->CountAllMales() == 0) 
    { ?>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <h1 class="bg-primary text-white text-center p-3">
            Il n'y a ni mâle, ni femelle disponible<br><br>
            Veuillez retourner au menu Gestion pour en ajouter
        </h1>
    </div>
<?php 
    } 
    elseif($obj->CountAllMales() == 0) 
    { ?>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <h1 class="bg-primary text-white p-3">
            Il n'y a pas de mâle disponible<br><br>
            Veuillez retourner au menu Gestion pour en ajouter
        </h1>
    </div>
<?php 
    } 
    elseif($obj->CountAllFemales() == 0) 
    { ?>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <h1 class="bg-primary text-white p-3">
            Il n'y a pas femelle disponible<br><br>
            Veuillez retourner au menu Gestion pour en ajouter
        </h1>
    </div>
<?php 
    } 
    else 
    { ?>
    <form method="POST">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <button type="submit" name="lovelove" class="btn btn-primary">Pair Snakes</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2>Males</h2>
                    <?php 
                    foreach ($obj->SelectAll("specie") as $value) 
                    {
                        if($value["snake_gender"] == "Male" && $value["snake_dead"] == 0 && $value['snake_reproduced'] == 0) 
                        { ?>
                            <div class="form-check mb-2">
                                <input method="POST" type="radio" class="form-check-input male" name="male_snake_id" value="<?php echo $value["snake_id"]; ?>">
                                <label class="form-check-label">
                                    Name: <?php echo $value["snake_name"]; ?> - Specie: <?php echo $value["snake_specie"]; ?>
                                </label>
                            </div>
                    <?php
                        }
                    } ?>
                </div>
                <div class="col-md-6">
                    <h2>Females</h2>
                    <?php 
                    foreach ($obj->SelectAll("specie") as $value)    
                    {
                        if($value["snake_gender"] == "Female" && $value["snake_dead"] == 0 && $value['snake_reproduced'] == 0) 
                        { ?>
                            <div class="form-check mb-2">
                                <input method="POST" type="radio" class="form-check-input female" name="female_snake_id" value="<?php echo $value["snake_id"]; ?>">
                                <label class="form-check-label">
Name: <?php echo $value["snake_name"]; ?> - Specie: <?php echo $value["snake_specie"]; ?>
</label>
</div>
<?php }
                     } ?>
</div>
</div>
</div>
</form>
<?php } ?>

            
        
