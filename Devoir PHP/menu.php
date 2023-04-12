

<div class="liste_menu border sticky-top bg-dark text-center fs-4 fw-bolder">
    <nav id="Menu" class="nav nav-tabs">
        <ul style="list-style-type: none;" class="nav nav-tabs">
            <li class="nav-item"> 
                <a class="nav-link" href="index.php?page=accueil"> Accueil </a> 
            </li>
            
            <?php 
            if(!isset($_SESSION['user_name']))
            { ?>
                <li class="nav-item"> 
                    <a class="nav-link" href="index.php?page=admin"> Admin </a> 
                </li>
            <?php } 
            else 
            { ?>
                <li class="nav-item"> 
                    <a class="nav-link" href="index.php?page=gestion"> Gestion </a> 
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" href="index.php?deco1=1"> Déconnection </a> 
                </li>
            <?php } ?>
        </ul>
    </nav>
</div>

<style>
.liste_menu a.nav-link {
    color: white;
}
.liste_menu a.nav-link:hover {
    background-color: #f2f2f2;
    color: black;
}
</style>

