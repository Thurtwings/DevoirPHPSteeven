<?php
if (!isset($_GET['page'])) $_GET['page'] = 'accueil';
switch ($_GET['page']) {
    case 'accueil':
        $title = 'Accueil';
        break;
    case 'produits':
        $title = 'Produits';
        break;
    case 'societe':
        $title = 'Société';
        break;
    case 'contact':
        $title = 'Contact';
        break;
    case 'admin':
        $title = 'Administration';
        break;
    case 'backoffice':
        $title = 'Combats';
        break;
    case 'gestion':
        $title = 'Gestion';
        break;
    case 'modifObj':
        $title = 'Modifier';
        break;
    case 'insertObj':
        $title = 'Ajouter';
        break;
    case 'supprObj':
        $title = 'Boucherie';
        break;
    case 'mateObj':
        $title = "Love's in the air";
        break;
    default:
        $title = 'Erreur';
        break;
}

?>