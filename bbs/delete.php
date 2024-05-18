<?php

session_start();
require('./library.php');
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    header('Location:login.php');
    exit();
}

$post_id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
if(!$post_id){
    header('Location: index.php'); 
    exit();
}

$db = dbConnection();
$stmt = $db->prepare('delete from posts where id=? and member_id = ? limit 1');
$stmt->bind_param('ii',$post_id,$id);
$success = $stmt->execute();
if(!$success){
    die($db->error);
}

header('Location: index.php'); exit();
?>
