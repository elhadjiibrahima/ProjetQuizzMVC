<?php

if(isset($_SESSION[KEY_ERRORS])){
    $errors = $_SESSION[KEY_ERRORS];
    unset($_SESSION[KEY_ERRORS]);
}
// require_once(PATH_VIEWS.'include'.DIRECTORY_SEPARATOR.'header.html.php');
// require_once(PATH_VIEWS.'include'.DIRECTORY_SEPARATOR.'menu.html.php');

?>

    <div class="container">
        <div class="login-form">
            <h3>Login Form</h3>
            <div class="croix"></div>
        </div>
        <form action="<?= PATH_POST?>" method="POST" name="form" class="form">
        <input type="hidden" name="controller" value="securite">
        <input type="hidden" name="action" value="connexion">

            <?php if(isset($errors['connexion'])):  ?>
                <small class="ERROR-LAY RED-ERROR"><?= $errors['connexion']   ?></small>
            <?php endif ?>

            
            <input type="text" placeholder="Login" name="login" class="login">
            <small id="email_error">Entrer un Email valide</small>

            <?php if(isset($errors['login'])):  ?>
                <small class="ERROR-LAY RED-ERROR"><?= $errors['login']   ?></small>
            <?php endif ?>

            <input type="password" placeholder="Password" name="password" class="password">
            <small id="pass_error">Le mot de passe n'est pas valide</small>

            <?php if(isset($errors['password'])):  ?>
                <small class="ERROR-LAY RED-ERROR"><?= $errors['password']   ?></small>
            <?php endif ?>

            <div class="connect">
            <button type="submit" class="submit" name="connexion" id="connect">Connexion</button>
            <a href="<?= PATH_POST.'?controller=securite&action=inscription'?>"><p>S'inscrire pour jouer?</p></a>
            </div>
        </form>
    </div>

    <script src="<?= WEB_ROOT.'js'.DIRECTORY_SEPARATOR.'connexion.js'  ?>"></script>

