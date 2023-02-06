<?php
if (!isset($_SESSION['user_name'])) 
{?>

<div>
    <form  method="POST">
        Login:<br>
        <input type="text" name= 'log' placeholder= 'Identifiant'>
        <br>
        Password:<br>
        <input type="password" name='pwd' placeholder= 'Mot de passe'>
        <br>
        <br>
        <input type='submit' value="S'identifier">
    </form>
</div>
<?php } 
else
{ ?>
 
 <div class="form_admin">
    <form method="POST">
        Vous êtes déjà identifié en tant que 
        <?php echo $_SESSION['user_name']?>
        <br>  
        <br>  
        
        <input type='submit'name="deco1" value="Se déconnecter">
    </form>
</div>
 
<?php 
} ?> 