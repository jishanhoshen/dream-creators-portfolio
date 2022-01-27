<?php
//router
require_once("{$_SERVER['DOCUMENT_ROOT']}/resources/route.php"); // don't touch me

/* route functions */
    // get();
    // post();
    // put();
    // patch();
    // delete();
    // any();

/* start routing from here */

//get request
get('/','views/home.php');
get('/login','views/login.php');
get('/dashboard','views/dashboard.php');


// error core 404
any('/404','views/404.php');