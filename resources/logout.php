<?php
include 'auth.php';
$Auth = new Auth();
$Auth->authSessionDel();

header('location:/signin');