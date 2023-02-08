<?php
    if(isset($_POST['SubmitInsert']))
    {
       $obj = new Snake(0);
       $obj->addNew($_POST["snake_name"], $_POST["snake_weight"], $_POST["snake_lifespan"], $_POST["DateOfBirth"], $_POST["snake_specie"], $_POST["snake_gender"] );
    }

?>
    
    <div class="container bg-grey">
        <div class="row">
            
            <h3 class="text-center"> Ajouter un serpent à la base de données </h3>
            <form action="" method="POST" class="col-4 offset-4">
                <br><br>
        
                Nom:<br>
                <input type="text" name= 'snake_name' value="">
                <br>
                Poids:<br>
                <input type="text" name= 'snake_weight' value="">
                <br>
                Durée de vie:<br>
                <input type="text" name= 'snake_lifespan' value="">
                <br>
                Date de naissance:<br>
                <input type="date" name= 'DateOfBirth' value="">
                <br>
                Espèce:<br>
                <input type="text" name= 'snake_specie' value="">
                <br>
                Sexe:<br>
                <input type="text" name= 'snake_gender' value="">
                <br>
                <br>
                <input type='submit' value="Soumettre" name="SubmitInsert">
            </form>
        </div>
    
</div>

