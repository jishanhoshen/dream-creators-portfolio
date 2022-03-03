<?php
//router
require_once("{$_SERVER['DOCUMENT_ROOT']}/resources/route.php"); // don't touch me
// $baseurl = 'dream-creators.com';
// $subject = $_SERVER['SERVER_NAME'];
// $search = '.' . $baseurl;
// $trimmed = str_replace($search, '', $subject);
// if ($trimmed != $baseurl) {
//     get('/', 'views/profile.php');
// } else {
    //post request
    post('/signinaction', 'resources/signinaction.php');
    post('/contactaction', 'resources/contactAction.php');
    //get request
    get('/', 'views/home.php');
    get('/signin', 'views/signin.php');
    get('/signup', 'views/signup.php');
    get('/logout', 'resources/logout.php');
    get('/dashboard', 'views/dashboard.php');
    get('/admin', 'views/dashboard.php');
    get('/project', 'views/project.php');
    get('/services', 'views/services.php');
    get('/test', 'views/test.php');
    get('/api', 'api.php');
    get('/reactapp', 'react/index.html');
// }
// error core 404
any('/404','views/404.php');