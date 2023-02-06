<?php 

// Create an instance of the Snake class with an argument of 0 and a sort variable that is used later on to determine witch sort is activated
    $obj = new Snake(0);
    $sort = null;

    // Check if the "generate, SortGender, SortId, SortSpecie" button was pressed
    if(isset($_POST["generate"]))
    {
        $obj->AddRandomAmountOfSnake(rand(1,30), false);
    }
    if(isset($_POST["SortGender"]))
    {
        // $obj->SelectAll("gender");
        $sort = "gender";
    }
    if(isset($_POST["SortId"]))
    {
        // $obj->SelectAll();
        $sort = null;
    }
    if(isset($_POST["SortSpecie"]))
    {
        // $obj->SelectAll("specie");
        $sort = "specie";
    }

?>
                                    <!-- Boutons d'actions -->
<form action=""  method="POST">
    <div class="container-fluid">
        <div class=" row">
            <div class="btn-group sticky" role="group">
                <a href="index.php?page=insertObj" class="btn btn-primary col-1"> Add a new snake</a> 
                <button type="submit" class="btn btn-primary col-1" name="generate"> Generate </button>
                <button type="submit" class="btn btn-primary col-1" name="SortGender"> Sort by Gender</button>
                <button type="submit" class="btn btn-primary col-1" name="SortSpecie"> Sort by specie</button>
                <button type="submit" class="btn btn-primary col-1" name="SortId"> Sort by id</button>
                <a href="index.php?page=mateObj" class="btn btn-primary col-1"> Mating </a> 
            </div>
        </div>
    </div>
</form>
<br><br>
                                    <!-- Message d'info -->
<div class="container-fluid border bg-warning text-center">
    <div class="row">
        <label for="" class="col-12 "> <br>
            Il y a actuellement : 
            <strong><span class="text-danger"><?php echo $obj->CountAllMales(); ?>  males</span></strong>, 
         <strong><span class="text-danger"><?php echo $obj->CountAllFemales(); ?> femelles</span></strong> 
         et <strong><span class="text-danger"><?php echo $obj->CountAllUnidentified(); ?></span></strong> 
         dont le genre n'est pas identifié pour un total de : 
            <strong><u><span class="text-danger"><?php echo $obj->CountAll(); ?> serpents</span></u></strong> 
            <br><br>
        </label>
    </div>
</div>
<br><br>
<table>
<div class="container-fluid">
    <div class="row">
        <!-- <div class="col-12">
            <div class="row"> -->
                <label for="" class="col-1 text-center border bg-primary text-white">Modify</label>
                <label for="" class="col-1 text-center border bg-primary text-white">Idex</label>
                <label for="" class="col-1 text-center border bg-primary text-white">Name</label>
                <label for="" class="col-1 text-center border bg-primary text-white">Weight</label>
                <label for="" class="col-1 text-center border bg-primary text-white">Date of Birth</label>
                <label for="" class="col-1 text-center border bg-primary text-white">Estimated Lifespan</label>
                <label for="" class="col-1 text-center border bg-primary text-white">Specie</label>
                <label for="" class="col-1 text-center border bg-primary text-white">Gender</label>
                <label for="" class="col-1 text-center border bg-primary text-white">Father</label>
                <label for="" class="col-1 text-center border bg-primary text-white">Mother</label>
                <label for="" class="col-1 text-center border bg-primary text-white">Current status</label>
                <label for="" class="col-1 text-center border bg-primary text-white">Kill</label>
            <!-- </div>
        </div> -->
    </div>
</div>
        
</table>
</div>
<?php
    foreach($obj->SelectAll($sort) as $value) 
    {
        
        ?>
        <table class="container-fluid">
            
        <tr>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <td class="col-1 text-center border"><a href="index.php?page=modifObj&id=<?php echo $value["snake_id"]; ?>">Modifier</a> </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_id"]; ?>  </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_name"];   ?></td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_weight"]; ?> kg </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_H_DoB"]; ?>  </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_lifespan"]; ?> months</td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_specie"]; ?>  </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_gender"]; ?>  </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_dad"]; ?>  </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_mom"]; ?>  </td>
                        <?php 

                        if($value["snake_dead"] == 0) 
                        {
                            ?> <td class="border col-1 bg-success text-white text-center"><?php
                            echo "Vivant";?>

                            <td class="border col-1 text-center"><a href="index.php?page=supprObj&id=<?php echo $value["snake_id"]; ?>"> Tuer </a> 
                            <?php
                        }   
                        else 
                        {
                            ?> <td class="border col-1 bg-warning text-white text-center">  Mort <td class="border col-1 bg-dark">
                            <?php

                        }?>
                        </td>
                        <!-- <td class="col-1"> <form action=""  method="POST"> <input type='submit' value="Supprimer" name="delete"> </form></td> -->
                    </div>
                </div>
            </div>
        </tr>
    </table> 
    <?php }

    

?>
