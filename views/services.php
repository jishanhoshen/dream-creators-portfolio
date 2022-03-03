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

$template->assign("pagetitle","services | {$companyname}");
$template->assign("companyname","{$companyname}");
$template->assign("css",$template->css('app'));
$template->assign("fontawesome",$template->css('fontawesome'));
$template->assign("jquery",$template->js('jquery'));
$template->assign("mainscript",$template->js('main'));
$template->assign("logo",$template->image('logo/logo.png'));
$template->assign("thumbnail",$template->image('p1.png'));
$template->assign("porjectbody1",$template->image('p2.png'));
$template->assign("porjectbody2",$template->image('p3.png'));
$template->assign("profile",$template->image('profile.jpg'));

$template->render('header');
$template->render('menu');
$template->render('services');
$template->render('footer');

?>