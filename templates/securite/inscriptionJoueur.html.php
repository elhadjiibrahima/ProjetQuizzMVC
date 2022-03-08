<?php

if(isset($_SESSION[KEY_ERRORS])){
    $errors = $_SESSION[KEY_ERRORS];
    unset($_SESSION[KEY_ERRORS]);
}

?>


<div class="inscription">
    <div class="formulaire">
        <div class="titre">
            <h2>S'INSCRIRE</h2>
            <p>Pour tester votre niveau de culture générale</p>
        </div>
        <form action="<?= PATH_POST?>" method="post" class="formul" name="formul">
            <input type="hidden" name="controller" value="securite">
            <input type="hidden" name="action" value="inscription">
            <div class="first-control">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" class="prenom">
                <small id="prenom_error">Message d'erreur</small>
                <?php if(isset($errors['prenom'])):  ?>
                <small class="ERROR-LAY RED-ERROR"><?= $errors['prenom']   ?></small>
                <?php endif ?>
            </div>
            <div class="first-control">
                <label for="name">Nom</label>
                <input type="text" name="nom" class="nom">
                <small id="nom_error">Message d'erreur</small>
                <?php if(isset($errors['nom'])):  ?>
                <small class="ERROR-LAY RED-ERROR"><?= $errors['nom']   ?></small>
                <?php endif ?>
            </div>
            <div class="first-control">
                <label for="login">Login</label>
                <input type="text" name="login" class="login">
                <small id="login_error">Message d'erreur</small>
                <?php if(isset($errors['login'])):  ?>
                <small class="ERROR-LAY RED-ERROR"><?= $errors['login']   ?></small>
            <?php endif ?>
            </div>
            <div class="first-control">
                <label for="password">Password</label>
                <input type="password" name="password1" class="password1">
                <small id="password1_error">Message d'erreur</small>
                <?php if(isset($errors['password1'])):  ?>
                <small class="ERROR-LAY RED-ERROR"><?= $errors['password1']   ?></small>
                <?php endif ?>
            </div>
            <div class="first-control">
                <label for="confirmer">Confirmer Password</label>
                <input type="password" name="password2" class="password2">
                <small id="password2_error">Message d'erreur</small>
                <?php if(isset($errors['password2'])):  ?>
                <small class="ERROR-LAY RED-ERROR"><?= $errors['password2'] ?></small>
            <?php endif ?>
            </div>
            <div class="fiche">
                <label for="file">Avatar</label>
                <input type="file" name="file" id="fichier">
            </div>
            <div class="divSubmit">
                <button type="submit" id="submit">Créer un compte</button>
            </div>
        </form>
        </div>
        <div class="avatar">
            <img src="<?= WEB_ROOT."img".DIRECTORY_SEPARATOR."chat.webp" ?>" alt="AVATAR">
        </div>
        
            
    
</div>
<script src="<?= WEB_ROOT.'js'.DIRECTORY_SEPARATOR.'inscription.js' ?>"></script>