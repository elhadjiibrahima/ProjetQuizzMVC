<?php
function champ_obligatoire(string $key,string $data,array &$errors,string $message="Ce champ est obligatoire"){
    if(empty($data)){
        $errors[$key]=$message;
    }
}
function valid_email(string $key,string $data,array &$errors,string $message="Login invalide"){
    if(!filter_var($data,FILTER_VALIDATE_EMAIL)){
    $errors[$key]=$message;
    }
}
function valid_password(string $key,string $data,array &$errors,string $message="Mot de passe invalide"){
    $majuscule = preg_match('@[A-Z]@', $data);
	$minuscule = preg_match('@[a-z]@', $data);
	$chiffre = preg_match('@[0-9]@', $data);
	
	if(!$majuscule || !$minuscule || !$chiffre || strlen($data) < 6){

		$errors[$key]=$message;
	}
}