<?php

function h($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}


//db接続

function dbConnection(){
    $db = new mysqli('localhost','root','root','min_bbs');
    if(!$db){
        die($db->error);
     }

     return $db;
}