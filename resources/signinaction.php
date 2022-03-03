<?php
include './resources/auth.php';

$Auth = new Auth();

if(isset($_POST['email']) && isset($_POST['password'])){
    $signinAction = $Auth->signin($_POST['email'],$_POST['password']);
    echo json_encode($signinAction);
}
?>