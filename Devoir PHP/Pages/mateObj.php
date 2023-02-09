<?php 
    $obj = new Snake(0);

    if(isset($_POST['lovelove'])){
        
        $obj->SnakeReproduction($_POST['male_snake_id'], $_POST['female_snake_id']);
        
        echo "Youhou, un nouveau serpent est né!";
    }


    if($obj->CountAllFemales() == 0 && $obj->CountAllMales() == 0)
    {?>
           <div class="d-flex align-items-center justify-content-center" style="height: 350px;">
                <h1 class="bg-primary text-white text-center">Il n'y a ni mâle, ni femelle disponible 
                    <br>
                    <br> 
                    Veuillez retourner au menu Gestion pour en ajouter
                </h1>
           </div>
<?php 
    }
    elseif($obj ->CountAllMales() == 0)
    {?>
        <div class="d-flex align-items-center justify-content-center" style="height: 350px;">
            <h1 class="bg-primary text-white ">Il n'y a pas de mâle disponible
                <br>
                <br> 
                Veuillez retourner au menu Gestion pour en ajouter
                </h1>
        </div>
<?php 
    }
    elseif($obj->CountAllFemales() == 0)
    {?>
        <div class="d-flex align-items-center justify-content-center" style="height: 350px;">
            <h1 class="bg-primary text-white ">Il n'y a pas femelle disponible 
                 <br>
                <br> 
                Veuillez retourner au menu Gestion pour en ajouter
            </h1>
        </div>
 <?php   
    }
    else
    {
    ?>  
        <form action="" method="POST"> 
            <div class="container">
                <div class="row">
                    <div class="row ">
                        <div class="col-12 text-center">
                            <button type="submit" name="lovelove" class="btn btn-primary">Pair Snakes</button>
                        </div>
                    </div> 
                </div>
        </form> 
  <?php   
    }?> 
            <div class="row">
                <div class="col-5 offset-1">
                    <h2>Males</h2>
                    <?php 
                        foreach ($obj->SelectAll("specie") as $value) 
                        {
                            if($value["snake_gender"] == "Male" && $value["snake_dead"] == 0)
                            {
                    ?> 
                                <div class="form-check">
                                    <input methode="POST" type="radio" class="form-check-input male" name="male_snake_id" value="<?php echo $value["snake_id"]; ?>">
                                    <label class="form-check-label border col-5">
                                        Name: <?php echo $value["snake_name"]; ?> 
                                    </label>
                                    <label class="form-check-label border col-5">
                                        Specie: <?php echo $value["snake_specie"]; ?> 
                                    </label>
                                </div>
                    <?php 
                            }
                        }
                    ?>
                </div>
                <div class="col-5">
                    <h2>Females</h2>
                    <?php 
                        foreach ($obj->SelectAll("specie") as $value) 
                        {
                            if($value["snake_gender"] == "Female" && $value["snake_dead"] == 0)
                            {
                    ?> 
                                <div class="form-check">
                                    <input methode="POST" type="radio" class="form-check-input female" name="female_snake_id" value="<?php echo $value["snake_id"]; ?>">
                                    <label class="form-check-label border col-5">
                                        Name: <?php echo $value["snake_name"]; ?> 
                                    </label>
                                    <label class="form-check-label border col-5">
                                        Specie: <?php echo $value["snake_specie"]; ?> 
                                    </label>
                                </div>
                    <?php 
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>

            
        
