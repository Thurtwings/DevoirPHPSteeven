<?php
    session_start();
    
    include("_classes/C_Snake.php");

if (isset($_POST['log'])) 
{
    //connection a la bdd en PDO
    $bdd = new PDO('mysql:host=localhost;dbname=snakes_db', 'root', '');
    //création requête SQL
    $req = "SELECT * FROM `users` WHERE user_pseudo = '" . $_POST['log'] . "'AND user_password = '" . $_POST['pwd']."'";
    //execution requête
    $result = $bdd->query($req);
    //traitement du résultat ( le transforme en tableau)
    $tlbresult = $result ->fetchAll();
    //var_dump($tlbresult);
    //test si un enregistrement est présent en BDD, si oui on se connecte sinon, 
    //on ne se connecte pas et on informe l'utilisateur

    if (count($tlbresult) > 0)
    {
        $_SESSION['user_name'] = $tlbresult[0]['user_pseudo'];
        $_SESSION['user_id'] = $tlbresult[0]['user_id'];
    }
    else
    {
        echo "Mot de passe incorrect";
    }
}


if (isset($_POST['deco1']) || isset( $_GET['deco1']))
{
    unset($_SESSION);
    session_destroy();
}



//gestion des pages
include("referencement.php");

?>
<!DOCTYPE html>
<html lang="en">
</-- index.php -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
  rel="stylesheet"
/>
    <title><?php echo $title; ?></title>
</head>

<body>

    <!-- affice le menu sur toutes les pages -->
    <?php include("menu.php"); ?>

    <div id="Main">
        <?php
        if (file_exists('Pages/' . $_GET['page'] . '.php')) {
            include('Pages/' . $_GET['page'] . '.php');
        } 
        else 
        { //include('Pages/accueil.php'); 
            echo "pas de page avec cet identifiant là";
        }
        ?>
    </div>
   
</body>

</html>