<?php
include 'vendors/jishanTemplate/template.php';
include 'resources/auth.php';

$Auth = new Auth();
$template = new Template();

if(!$Auth->authSession()){
    header('location:/signin');
}

$companyname = "Company Name";

$template->assign("pagetitle","{$companyname}");
$template->assign("companyname","{$companyname}");
$template->assign("css",$template->css('app'));
$template->assign("fontawesome",$template->css('fontawesome'));
$template->assign("tagifycss",$template->css('tagify'));
$template->assign("jquery",$template->js('jquery'));
$template->assign("mainscript",$template->js('main'));
$template->assign("tagify",$template->js('tagify'));
$template->assign("ediotr",$template->js('editor'));
$template->assign("logo",$template->image('logo/logo.png'));
$template->assign("herocover",$template->image('herocover.jpg'));
$template->assign("profile",$template->image('profile.jpg'));


$template->render('admin copy');

?>