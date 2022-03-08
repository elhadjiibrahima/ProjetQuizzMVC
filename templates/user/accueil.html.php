<?php
require_once(PATH_VIEWS.'include'.DIRECTORY_SEPARATOR.'header.html.php');
require_once(PATH_VIEWS.'include'.DIRECTORY_SEPARATOR.'menu.html.php');

if(isset($content_for_views)){
    echo $content_for_views;
}




?>
<?php if (is_connect() && is_admin()): ?>
<div class="container-admin">
    <div class="entete-admin">
        <h2>Créez et paramétrez vos quizz</h2>
        <span><a href="<?= PATH_POST."?controller=securite&action=deconnexion" ?>">DECONNEXION</a></span>
    </div>
    <div class="content-admin">
        <div class="dashboard-admin">
            <div class="dashboard-avatar">
                <img src="<?= WEB_ROOT."img".DIRECTORY_SEPARATOR."chat.webp" ?>" alt="AVATAR">
                <h2>ADMIN</h2>
            </div>
            <div class="dashboard-list">
                <div>
                    <p>Liste question</p>
                    <img src="<?= WEB_ROOT."img".DIRECTORY_SEPARATOR."Icônes".DIRECTORY_SEPARATOR."ic-liste.png" ?>" alt="">
                </div>
                <div>
                <p><a href="<?= PATH_POST."?controller=user&action=lister.joueur"  ?>">Liste joueur</a></p>

                <img src="<?= WEB_ROOT."img".DIRECTORY_SEPARATOR."Icônes".DIRECTORY_SEPARATOR."ic-liste.png" ?>" alt="">
                </div>
                <div>
                    <p>Créer question</p>
                    <img src="<?= WEB_ROOT."img".DIRECTORY_SEPARATOR."Icônes".DIRECTORY_SEPARATOR."ic-ajout.png" ?>" alt="">
                </div>
                <div>
                    <p><a href="<?= PATH_POST."?controller=securite&action=inscriptionAdmin"  ?>">Créer admin</a></p>
                    <img src="<?= WEB_ROOT."img".DIRECTORY_SEPARATOR."Icônes".DIRECTORY_SEPARATOR."ic-ajout.png" ?>" alt="">
                </div>
            </div>
        </div>
        <div class="variable-content">
            <?php if(isset($content_for_list)){
                echo $content_for_list;
            }  ?>
        </div>
        
    </div>
</div>


<?php endif;
require_once(PATH_VIEWS.'include'.DIRECTORY_SEPARATOR.'footer.html.php');

?>