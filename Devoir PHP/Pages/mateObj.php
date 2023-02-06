<?php 
    $obj = new Snake(0);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>

                    
        <div class="container">
            <div class="row">
                <div class="row ">
                    <div class="col-12 text-center">
                        <button id="pair_snakes" class="btn btn-primary">Pair Snakes</button>
                </div>
            </div>
                <div class="col-6">
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
                <div class="col-6">
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
                                        Name: <?php echo $value["snake_specie"]; ?> 
                                    </label>
                                </div>
                    <?php 
                            }
                        }
                    ?>
                </div>
            </div>
            
        </div> 
    </body>
</html>
