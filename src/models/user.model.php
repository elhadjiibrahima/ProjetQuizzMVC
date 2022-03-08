<?php
function find_user_login_password(string $login,string $password):array{
    $users=json_to_array("users");
    foreach ($users as $user) {
        if( $user['login']==$login && $user['password']==$password)
            return $user;
        }
    return [];
}

function find_users_by_role(string $role):array{
    $users = json_to_array("users");
    $result=[];
    foreach ($users as $user){
        if ($user['role']==$role){
            $result[] = $user;
        }
    }
    return $result;
}

function saveUser($data){
    $users = array_to_json("users",$data);
    if($users){
        $message='<small style="color:#2ecc71; background-color:#2ecc71; ">Joueur enregistré</small>';
    }
}