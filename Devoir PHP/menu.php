<div class="liste_menu border sticky-top bg-dark text-center fs-4 fw-bolder">
    <nav id="Menu">
        <ul>
            <li class=" "> <a href="index.php?page=accueil"> Accueil </a> </li>
            
            <?php 
            if(!isset($_SESSION['user_name']))
            { ?>
                <li> <a href="index.php?page=admin"> Admin </a> </li>
            <?php } 
            else 
            { ?>
                <li> <a href="index.php?page=gestion"> Gestion </a> </li>
                <li> <a href="index.php?deco1=1"> Déconnection </a> </li>
            <?php } ?>
        </ul>
    </nav>
</div>


