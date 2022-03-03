<?php
include 'vendors/jishanTemplate/template.php';
include 'vendors/database/database.php';


$DB = new Database();
$template = new Template();

$settings = $DB->select("select * from settings where name = 'baseurl'");
$baseurl = $settings[0]['value'];
$template->assign("root", $baseurl);

$settings = $DB->select("select * from settings where name = 'companyname'");
$companyname = $settings[0]['value'];

$template->assign("pagetitle","Signin | {$companyname}");
$template->assign("companyname","{$companyname}");
$template->assign("css",$template->css('app'));
$template->assign("fontawesome",$template->css('fontawesome'));
$template->assign("jquery",$template->js('jquery'));
$template->assign("mainscript",$template->js('main'));
$template->assign("logo",$template->image('logo/logo.png'));
$template->assign("cover",$template->image('login-cover1.png'));

$template->render('header');
$template->render('signin');

?>