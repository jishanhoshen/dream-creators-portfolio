<?php

$baseurl = '.dream-creators.com';

$subject = $_SERVER['SERVER_NAME'];
$search = $baseurl ;
$trimmed = str_replace($search, '', $subject) ;

if($trimmed != ''){
    echo $trimmed;
}else{
    echo $_SERVER['SERVER_NAME'];
}