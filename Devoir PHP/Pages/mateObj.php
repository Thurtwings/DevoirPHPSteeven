<?php 
    $obj = new Objet(0);
    
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
                    foreach ($obj->SelectAll($sort) as $value) 
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
                                    Name: <?php echo $value["snake_specie"]; ?> 
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
                    foreach ($obj->SelectAll($sort) as $value) 
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

    <script src="js/jquery-3.6.3.min.js"></script>

    <script>
        $(document).ready(function() 
        {
            $('#pair_snakes').click(function() 
            {
                var male_snake_id = $('.male:checked').val();
                var female_snake_id = $('.female:checked').val();
                console.log(male_snake_id, "   ", female_snake_id);

                if(male_snake_id == undefined || female_snake_id == undefined) 
                {
                    alert("Please select a male snake and a female snake.");
                } 
                else 
                {
                    $.ajax("add_pair.php",
                        {
                            method: "POST",
                            data:
                            { 
                                male_snake_id: male_snake_id, 
                                female_snake_id: female_snake_id
                                
                            },
                            success: function(result) 
                            {
                                console.log(result);
                                alert("Snakes have been paired successfully.");
                            }
                        });
                }
            });
        });
    </script>
 
</body>
</html>
