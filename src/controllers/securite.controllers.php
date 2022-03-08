<?php
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php");
/**
* Traitement des Requetes POST
*/
if($_SERVER['REQUEST_METHOD']=="POST"){

    if(isset($_REQUEST['action'])){

        if($_REQUEST['action']=="connexion"){
            $login=$_POST['login'];
            $password=$_POST['password'];
            connexion($login,$password);
        }
        elseif($_REQUEST['action']=='inscription'){
            if(isset($_POST)){
                $prenom=$_POST['prenom'];
                $nom=$_POST['nom'];
                $login=$_POST['login'];
                $password1=$_POST['password1'];
                $password2=$_POST['password2'];
                $file=$_POST['file'];
                validInscription($prenom,$nom,$login,$password1,$password2,$file);
                $data = array(
                    'nom' =>$nom,
                    'prenom' =>$prenom,
                    'login' =>$login,
                    'password' =>$password2,
                    'role' =>'ROLE_JOUEUR',
                    'score' =>0
                ); 
                die(print_r($data));
                saveUser($data);
                if(!is_connect()){
                    header("location:".PATH_POST."?controller=securite&action=connexion");
                    exit();
                }

            }
        }elseif($_REQUEST['action']=="inscriptionAdmin"){
            if(isset($_POST)){
                $prenom=$_POST['prenom'];
                $nom=$_POST['nom'];
                $login=$_POST['login'];
                $password1=$_POST['password1'];
                $password2=$_POST['password2'];
                $file=$_POST['file'];
                validInscription($prenom,$nom,$login,$password1,$password2,$file);
                $data = array(
                    'nom' =>$nom,
                    'prenom' =>$prenom,
                    'login' =>$login,
                    'password' =>$password2,
                    'role' =>'ROLE_ADMIN',
                    'score' =>0
                );
                // die(print_r($data));

                saveUser($data);
                header("location:".PATH_POST."?controller=securite&action=inscriptionAdmin");
                exit();
            }
        }
    }
}

/**
* Traitement des Requetes GET
*/
if($_SERVER['REQUEST_METHOD']=="GET"){
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']=="connexion"){
            presenter_connexion();
            require_once(  PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php"); 
        }elseif($_REQUEST['action']=="deconnexion"){
            log_out();
        }elseif($_REQUEST['action']=="inscriptionAdmin"){
            presenter_inscriptionAdmin();
        }
        elseif($_REQUEST['action']=="inscription"){
            presenter_inscription();
        }
    }else{
        presenter_connexion();     
    
    }
}



//US1


function connexion(string $login,string $password):void{
    $errors=[];
    champ_obligatoire('login',$login,$errors,"Login obligatoire");
    if(count($errors)==0){
        valid_email('login',$login,$errors);
    }
    champ_obligatoire('password',$login,$errors);
    if(count($errors)==0){
        $user=find_user_login_password($login,$password);
        if(count($user)!=0){
            $_SESSION[KEY_USER_CONNECT]=$user;
            header("location:".PATH_POST."?controller=user&action=accueil");
            exit();
        }else{
            $errors['connexion']="Login ou mot de passe incorrect";
            $_SESSION[KEY_ERRORS]=$errors;
            header("location:".PATH_POST);
            exit();
        }
    }else{
        $_SESSION[KEY_ERRORS]=$errors;
        header("location:".PATH_POST);
        exit();
    }
}


function presenter_connexion(){
    ob_start();
    require_once(PATH_VIEWS.'securite'.DIRECTORY_SEPARATOR.'connexion.html.php');
    $content_for_views = ob_get_clean();
    require_once(PATH_VIEWS.'user'.DIRECTORY_SEPARATOR.'accueil.html.php');
}

function log_out(){
    session_destroy();
    session_unset();
    header('location:'.PATH_POST);
    exit();
}

function presenter_inscriptionAdmin(){
    ob_start();
    require_once(PATH_VIEWS.'securite'.DIRECTORY_SEPARATOR.'inscriptionAdmin.html.php');
    $content_for_list = ob_get_clean();
    require_once(PATH_VIEWS.'user'.DIRECTORY_SEPARATOR.'accueil.html.php');

}

function presenter_inscription(){
    ob_start();
    require_once(PATH_VIEWS.'securite'.DIRECTORY_SEPARATOR.'inscriptionJoueur.html.php');
    $content_for_views = ob_get_clean();
    require_once(PATH_VIEWS.'user'.DIRECTORY_SEPARATOR.'accueil.html.php');    
}


function validInscription(string $prenom,string $nom,string $login,string $password1,string $password2,$file):void{
    $errors=[];
    champ_obligatoire('login',$login,$errors,"Login obligatoire");
        if(count($errors)==0){
            valid_email('login',$login,$errors);
        }
    champ_obligatoire('prenom',$prenom,$errors,"Prenom obligatoire");
    

    champ_obligatoire('nom',$login,$errors,"Nom obligatoire");

    champ_obligatoire('password1',$password1,$errors,"Mot de passe obligatoire");
    if(count($errors)==0){
        valid_password('password1',$password1,$errors,"Majuscule, minuscule, chiffre et MDP supérieur à 6 caractères");
    }
    champ_obligatoire('password2',$password2,$errors,"Champs obligatoire");
    if(count($errors)==0){
        if($password1==$password2){
            valid_password('password2',$password2,$errors);
        }
        else{
            $errors['password2']='Mots de passe différents';
        }
    }
    else{
        $_SESSION[KEY_ERRORS]=$errors;
        if(!is_connect()){
            header("location:".PATH_POST.'?controller=securite&action=inscription');
            exit();
        }
        if(is_admin()){
            presenter_inscriptionAdmin();
            // header("location:".PATH_POST.'?controller=securite&action=inscriptionAdmin');
            // exit();
        }
    }
}


// function validInscriptionAdmin(string $prenom,string $nom,string $login,string $password1,string $password2,$file):void{
//     $errors=[];
//     champ_obligatoire('login',$login,$errors,"Login obligatoire");
//         if(count($errors)==0){
//             valid_email('login',$login,$errors);
//         }
//     champ_obligatoire('prenom',$prenom,$errors,"Prenom obligatoire");
    

//     champ_obligatoire('nom',$login,$errors,"Nom obligatoire");

//     champ_obligatoire('password1',$password1,$errors,"Mot de passe obligatoire");
//     if(count($errors)==0){
//         valid_password('password1',$password1,$errors,"Majuscule, minuscule, chiffre et MDP supérieur à 6 caractères");
//     }
//     champ_obligatoire('password2',$password2,$errors,"Champs obligatoire");
//     if(count($errors)==0){
//         if($password1==$password2){
//             valid_password('password2',$password2,$errors);
//         }
//         else{
//             $errors['password2']='Mots de passe différents';
//         }
//     }
//     else{
//         $_SESSION[KEY_ERRORS]=$errors;
//         header("location:".PATH_POST.'?controller=securite&action=inscriptionAdmin');
//         exit();
//     }
// }


