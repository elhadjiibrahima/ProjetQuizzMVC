<div class="en-tete">
        <img src="<?= WEB_ROOT.'img'.DIRECTORY_SEPARATOR.'Icônes'.DIRECTORY_SEPARATOR.'logo-QuizzSA.png'  ?>" alt="Logo">
        <h1>Le plaisir de jouer</h1>
        <?php if(is_connect() && is_player()): ?>
                <span><a href="<?= PATH_POST."?controller=securite&action=deconnexion" ?>">DECONNEXION</a></span>
        <?php endif ?>

</div>