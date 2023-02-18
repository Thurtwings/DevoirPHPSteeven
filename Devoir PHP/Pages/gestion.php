<?php 

// Create an instance of the Snake class with an argument of 0 and a sort variable that is used later on to determine witch sort is activated
    $obj = new Snake(0);

    $sort = null;
    $filterGender = null;
    $filterSpecie = null;


    $snakes=$obj->SelectAll();
    //var_dump($snakes);
    foreach ($snakes as $snake) 
    {
        $id = $snake['snake_id'];
        $obj->CheckLifespan($id);
    }

$snakesPerPage = 10;
$snakesPageAmount =ceil( $obj->CountAll() / $snakesPerPage);
echo ($snakesPageAmount);


#Boutons de Tri

    if(isset($_POST["SortGender"]))
    {
        $sort = "gender";
    }
    if(isset($_POST["SortId"]))
    {
        $sort = null;
    }
    if(isset($_POST["SortSpecie"]))
    {
        $sort = "specie";
    }
    
#Boutons d'action
    if(isset($_POST["generate"]))
    {
        $obj->AddRandomAmountOfSnake(rand(1,30), false);
    }
    if(isset($_POST["truncate"]))
    {
        $obj->TruncateTable();
    }

#Boutons de filtrage par genre
    if(isset($_POST["M"]))
    {
        $filterGender = "M";
    }
    if(isset($_POST["F"]))
    {
        $filterGender = "F";
        
    }
    if(isset($_POST["Off"]))
    {
        $filterGender = null;
    }
    
#Boutons de filtrage
    if(isset($_POST["submitFilterGender"]))
    {
        if(isset($_POST["filterGender"]))
        {
            $filterGender = $_POST["filterGender"];
            
        }
        
    }
    
    if(isset($_POST["submitFilterSpecie"]))
    {
        if(isset($_POST["SpecieFilter"]))
        {
            $filterSpecie = $_POST["SpecieFilter"];
            
        }
    }

?>
                                    <!-- Boutons d'actions -->
<br>
<form action=""  method="POST">
    <div class="container-fluid">
        <div class="row">
            <div class="btn-group" role="group">
                <a href="index.php?page=insertObj" class="btn btn-primary col-1"> Add a new snake</a> 
                <button type="submit" class="btn btn-primary col-1" name="generate"> Generate </button>
                <button type="submit" class="btn btn-primary col-1" name="SortGender"> Sort by Gender</button>
                <button type="submit" class="btn btn-primary col-1" name="SortSpecie"> Sort by specie</button>
                <button type="submit" class="btn btn-primary col-1" name="SortId"> Sort by id</button>
                <a href="index.php?page=mateObj" class="btn btn-primary col-1"> Mating </a> 
            </div>
            <label> Filter by gender</label> <label> Filter by specie</label>
        <div >
            <div class="btn-group" role="group" >
                <form class="col-md">
                    <select name="filterGender" class="btn btn-primary">
                        <option value="null"> No Gender Filter   </option>
                        <option value="M"   > Only Male          </option>
                        <option value="F"   > Only Female        </option>
                    </select>
                    <input type="submit" value="Submit" name="submitFilterGender" class="btn btn-light col-md" >
                </form>
                <form method="POST">
                    <select name="SpecieFilter" class="btn btn-primary col-md">
                        <option value="null"            >No Specie Filter       </option>
                        <option value="Viper"           >All Vipers             </option>
                        <option value="Boa"             >All Boas               </option>
                        <option value="Python"          >All Pythons            </option>
                        <option value="Sea Snake"       >All Sea Snakes         </option>
                        <option value="Rattlesnake"     >All Rattlesnakes       </option>
                        <option value="Black Mamba"     >All Black Mambas       </option>
                        <option value="Coral Snake"     >All Coral Snakes       </option>
                        <option value="Green Snake"     >All Green Snakes       </option>
                        <option value="Grass Snake"     >All Grass Snakes       </option>
                        <option value="Spectacled Snake">All Spectacled Snakes  </option>
                        <option value="Anaconda"        >All Anacondas          </option>
                        <option value="Cobra"           >All Cobras             </option>
                    </select>
                    <input type="submit" value="Submit" name="submitFilterSpecie" class="btn btn-light col-md">
                </form>
                
            </div>
        </div>
        </div>
        <br><br>
        <div class="row">
            <div class="btn-group" role="group">
                <button type="submit" name="truncate" class="btn btn-danger text-white col-1">
                    <span style="color: yellow">/!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ </span>
                    Debug Truncate snakes This empty the table "snakes"
                    <span style="color: yellow">/!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ </span>
                </button> 
            </div>
        </div>
    </div>
</form>
<br>
<br>
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
             il y a <strong><span class="text-danger"><?php echo $obj->CountDeadSnakes(); ?> </span></strong> serpents décédés
            <br>
            
            how many snakes do you want to see per page?
            
            <br>
            <form  class="col-md">
                    <select name="filterGender" class="btn btn-primary">
                        
                        <option value="10"   > 10</option>
                        <option value="15"   > 15</option>
                        <option value="20"   > 20</option>
                        <option value="25"   > 25</option>
                        <option value="30"   > 30</option>
                    </select>
                    <input type="submit" value="Submit" name="submitFilterGender" class="btn btn-light col-md" >
                </form>
        </label>
    </div>
</div>
<br>
<div id="pagination">
    <?php 
        for ($i=1; $i <= $snakesPageAmount; $i++) 
        {
            echo "<a href='?page=$i'>$i</a>&nbsp";
        }
    ?>
</div>
<br>
<table>
<div class="container-fluid">
    <div class="row">
        <label for="" class="col-1 text-center border bg-primary text-white">Modify</label>
        <label for="" class="col-1 text-center border bg-primary text-white">Index</label>
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
    </div>
</div>
        
</table>
</div>
<?php
    foreach($obj->SelectAll($sort, $filterGender, $filterSpecie) as $value) 
    {
        
        ?>
        <table class="container-fluid">
        <tr>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <td class="col-1 text-center border">   
                            <a href="index.php?page=modifObj&id=<?php echo $value["snake_id"];      ?>">Modify</a>      </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_id"];      ?>                  </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_name"];    ?>                  </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_weight"];  ?> kg               </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_H_DoB"];   ?>                  </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_lifespan"];?> months           </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_specie"];  ?>                  </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_gender"];  ?>                  </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_dad"];     ?>                  </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_mom"];     ?>                  </td>
                        
                        <?php 
                        
                        if($value["snake_dead"] == 0) 
                        {
                            
                            ?> <td class="border col-1 bg-success text-white text-center">
                            <?php
                            // $obj->CheckLifespan($value["snake_id"]);
                            echo "Alive and Well";?>

                            <td class="border col-1 text-center"><a href="index.php?page=supprObj&id=<?php echo $value["snake_id"]; ?>"> Kill it with fire! </a> 
                            <?php
                        }   
                        else 
                        {
                            ?> <td class="border col-1 bg-warning text-white text-center">  Deceased <td class="border col-1 bg-dark">
                            <?php
                        
                        }?>
                        </td>
                    </div>
                </div>
            </div>
        </tr>
    </table> 
    <?php }

    

?>
