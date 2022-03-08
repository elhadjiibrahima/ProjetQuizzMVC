<?php

///Recuperation des donnees du fichier
function json_to_array(string $key):array{
    $dataJson=file_get_contents(PATH_DB);
    $data=json_decode($dataJson,true);
    return $data[$key];
}
//Enregistrement et Mis a jour des donnees du fichier
    function array_to_json(string $key,array $data){
        $dataJson = file_get_contents(PATH_DB);
        $dataArrayDecode= json_decode($dataJson,true);
        $dataArrayDecode[$key][]=$data;
        $dataJson = json_encode($dataArrayDecode);
        file_put_contents(PATH_DB, $dataJson);
     
}