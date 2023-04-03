<?php
// Instantiate a new Snake object with an ID of 0
$obj = new Snake(0);

// Initialize variables for sorting and filtering
$sort = isset($_GET['sort']) ? $_GET['sort'] : null;
$filterGender = isset($_GET['filterGender']) ? $_GET['filterGender'] : null;
$filterSpecie = isset($_GET['filterSpecie']) ? $_GET['filterSpecie'] : null;

// Initialize variables for pagination
$snakesPerPage = isset($_GET['perPage']) ? $_GET['perPage'] : 10;
$totalSnakes = $obj->CountAll();
$totalPages = ceil($totalSnakes / $snakesPerPage);
$currentPage = isset($_GET['pagination_number']) ? (int) $_GET['pagination_number'] : 1;
$offset = ($currentPage - 1) * $snakesPerPage;

// Sort buttons handling
if (isset($_POST["SortGender"])) 
{
    $sort = "gender";
}
if (isset($_POST["SortId"])) 
{
    $sort = null;
}
if (isset($_POST["SortSpecie"])) 
{
    $sort = "specie";
}

// Action buttons handling
if (isset($_POST["generate"])) 
{
    $obj->AddRandomAmountOfSnake(rand(1, 30), false);
    header("Location: index.php?page=gestion"); // Redirect to the same page
    exit();
}

if (isset($_POST["truncate"])) 
{
    $obj->TruncateTable();
    header("Location: index.php?page=gestion"); // Redirect to the same page
    exit();
}

// Gender filter buttons handling
if (isset($_POST["M"])) 
{
    $filterGender = "M";
}
if (isset($_POST["F"])) 
{
    $filterGender = "F";
}
if (isset($_POST["Off"])) 
{
    $filterGender = null;
}

// Filter buttons handling
if (isset($_POST["submitFilterGender"])) 
{
    if (isset($_POST["filterGender"])) 
    {
        $filterGender = $_POST["filterGender"];
    }
}

if (isset($_POST["submitFilterSpecie"])) 
{
    if (isset($_POST["SpecieFilter"])) 
    {
        $filterSpecie = $_POST["SpecieFilter"];
    }
}

if (isset($_POST["submitperPage"])) 
{
    if (isset($_POST["SpecieFilter"])) 
    {
        $filterSpecie = $_POST["SpecieFilter"];
    }
}
?>

// HTML code for displaying action buttons, filter buttons, and table of snake data
<br>
<form action="" method="POST">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="btn-group" role="group">
                <a href="index.php?page=insertObj" class="btn btn-primary">Add New Snake</a>
                <button type="submit" class="btn btn-primary" name="generate">Generate</button>
                <button type="submit" class="btn btn-primary" name="SortGender">Sort by Gender</button>
                <button type="submit" class="btn btn-primary" name="SortSpecie">Sort by Species</button>
                <button type="submit" class="btn btn-primary" name="SortId">Sort by ID</button>
                <a href="index.php?page=mateObj" class="btn btn-primary">Mating</a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                
                <!-- Gender filter form -->
                <form method="GET">
                    <input type="hidden" name="page" value="gestion" />
                    <label>Filter by Gender:</label>
                    <select name="filterGender" class="form-select">
                        <option value="Off">No Gender Filter</option>
                        <option value="M">Only Male</option>
                        <option value="F">Only Female</option>
                    </select>
                    <input type="submit" value="Apply" name="submitFilterGender" class="btn btn-light">
                </form>
            </div>
            <div class="col-md-4">
                
                <!-- Species filter form -->
                <form method="GET">
                    <input type="hidden" name="page" value="gestion" />
                    <label>Filter by Species:</label>
                    <select name="filterSpecie" class="form-select">
                        <option value="all">No Species Filter</option>
                        <?php foreach (getSnakesSpecies() as $key => $value) {
                            echo "<option value='$value'>$value</option>";
                        } ?>
                    </select>
                    <input type="submit" value="Apply" name="submitFilterSpecie" class="btn btn-light">
                </form>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <button type="submit" name="truncate" class="btn btn-danger">
                    <span class="text-warning">Warning:</span> Debug Truncate Snakes – This will empty the "snakes" table
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
            ce qui donne un total de <strong><u><span class="text-danger"><?php echo ($obj->CountAll() - $obj->CountDeadSnakes()); ?> serpents encore en vie!</span></u></strong> 
            <br>
                <!-- how many snakes do you want to see per page? -->
                <form method="GET">
                    <input type="hidden" name="page" value="gestion" />
                    <select name="perPage" class="btn btn-primary">
                        <option value="10" <?= $snakesPerPage == 10 ? 'selected' : ''; ?>>10</option>
                        <option value="15" <?= $snakesPerPage == 15 ? 'selected' : ''; ?>>15</option>
                        <option value="20" <?= $snakesPerPage == 20 ? 'selected' : ''; ?>>20</option>
                        <option value="25" <?= $snakesPerPage == 25 ? 'selected' : ''; ?>>25</option>
                        <option value="30" <?= $snakesPerPage == 30 ? 'selected' : ''; ?>>30</option>
                    </select>
                    <input type="submit" value="Submit" name="submitperPage" class="btn btn-light">
                </form>
            <br>
                
        </label>
    </div>
</div>
<br>

<!-- pagination -->
<?php 
    $currentURL = $_SERVER['REQUEST_URI'];
    $cleanURL = preg_replace('/([&?])pagination_number=\d+/', '', $currentURL);
    $separator = (strpos($cleanURL, '?') !== false) ? '&' : '?';

    echo '<div class="text-center pagination-container">';
    echo '<nav aria-label="Page navigation">';
    echo '<ul class="pagination pg-blue mdb-pagination">';

    // Previous button
    $prevDisabled = ($currentPage == 1) ? "disabled" : "";
    echo "<li class='page-item $prevDisabled'><a class='page-link' href='$cleanURL$separator" . "pagination_number=" . ($currentPage - 1) . "' tabindex='-1'>Previous</a></li>";

    // Page numbers
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i === $currentPage) {
            echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
        } else {
            echo "<li class='page-item'><a class='page-link' href='$cleanURL$separator" . "pagination_number=$i'>$i</a></li>";
        }
    }

    // Next button
    $nextDisabled = ($currentPage == $totalPages) ? "disabled" : "";
    echo "<li class='page-item $nextDisabled'><a class='page-link' href='$cleanURL$separator" . "pagination_number=" . ($currentPage + 1) . "'>Next</a></li>";

    echo '</ul>';
    echo '</nav>';
    echo '</div>'; 
    ?>
<br>
<table>
<div class="container-fluid">
    <div class="row">
        <label class="col-1 text-center border bg-primary text-white">Modify</label>
        <label class="col-1 text-center border bg-primary text-white">Index</label>
        <label class="col-1 text-center border bg-primary text-white">Name</label>
        <label class="col-1 text-center border bg-primary text-white">Weight</label>
        <label class="col-1 text-center border bg-primary text-white">Date of Birth</label>
        <label class="col-1 text-center border bg-primary text-white">Estimated Lifespan</label>
        <label class="col-1 text-center border bg-primary text-white">Specie</label>
        <label class="col-1 text-center border bg-primary text-white">Gender</label>
        <label class="col-1 text-center border bg-primary text-white">Father</label>
        <label class="col-1 text-center border bg-primary text-white">Mother</label>
        <label class="col-1 text-center border bg-primary text-white">Current status</label>
        <label class="col-1 text-center border bg-primary text-white">Kill</label>
    </div>
</div>

</table>
</div>
<?php
    foreach($obj->SelectAll($sort, $filterGender, $filterSpecie, $snakesPerPage, $offset) as $value) 
    {
    
        ?>
        <table class="container-fluid ">
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
                        <td class="col-1 border text-center ">  <?php echo $value["snake_lifespan"];?> seconds          </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_specie"];  ?>                  </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_gender"];  ?>                  </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_dad"];     ?>                  </td>
                        <td class="col-1 border text-center ">  <?php echo $value["snake_mom"];     ?>                  </td>
                        <?php 
                        if($value["snake_dead"] == 0) 
                        {
                            $id = $value['snake_id'];
                            
                            if($obj->CheckLifespan($id))
                            {
                                ?> 
                            <td class="border col-2 bg-warning text-white text-center">  Dying </td>
                            
                            <?php
                                
                            }
                            elseif ($value["snake_reproduced"] == 1) { ?>
                                <td class="border col-1 bg-info text-white text-center"><?php
                                echo "Alive, Well and Reproduced";
                                ?>
                                <td class="border col-1 text-center"><a href="index.php?page=supprObj&id=<?php echo $value["snake_id"]; ?>"> Kill it with fire! </a> 
                            <?php
                            }
                            else
                            {
                                ?> <td class="border col-1 bg-success text-white text-center">
                                <?php
                                echo "Alive and Well";
                                ?>
                                <td class="border col-1 text-center"><a href="index.php?page=supprObj&id=<?php echo $value["snake_id"]; ?>"> Kill it with fire! </a> 
                            <?php
                            };
                        }   
                        else 
                        {?>
                            <td class="border col-2 bg-danger text-white text-center">  Deceased 
                            
                        <?php
                        } ?>
                        </td>
                    </div>
                </div>
            </div>
        </tr>
    </table> 
    <?php 
    }
?>

<!-- Styles and script for pagination and page refresh -->
<style>
    .pagination-container 
    {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .mdb-pagination .page-item 
    {
        margin: 0 3px;
    }

    .mdb-pagination .page-item .page-link 
    {
        min-width: auto;
        padding: 5px;
    }
</style>
<!-- <script type="text/javascript">
    setTimeout(function () 
        {
        location.reload();
        }, 1000); // rafraîchit la page après 5000 millisecondes (5 secondes)
</script> -->
