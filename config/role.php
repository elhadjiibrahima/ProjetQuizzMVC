<?php
function is_connect():bool{
    return (isset($_SESSION[KEY_USER_CONNECT]));
}


function is_player():bool{
    return is_connect() && $_SESSION[KEY_USER_CONNECT]['role']==ROLE_JOUEUR ;
}

function is_admin():bool{
    return is_connect() && $_SESSION[KEY_USER_CONNECT]['role']==ROLE_ADMIN ;
}