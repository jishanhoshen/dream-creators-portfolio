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

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $products = $DB->select("select * from dreamprojects where id = '{$productId}'");

    if ($products) {
        $product = $products[0];

        $template->assign("projName", $product['projectname']);
        $template->assign("projThumb", $template->image($product['thumbnail']));
        $template->assign("projBody", $product['description']);
        $template->assign("projBodyImg1", $template->image($product['overview1']));
        $template->assign("projBodyImg2", $template->image($product['overview2']));

        $template->assign("projLastUpdate", $product['lastupdate']);
        $template->assign("projPublish", $product['created']);
        $template->assign("projCompatible", $product['compatible']);
        $template->assign("projTools", $product['tools']);
        $template->assign("projLayout", $product['layout']);

        $template->assign("projTag", $product['tags']);

        $users = $DB->select("select concat(fname,' ',lname) as projCreator, profilepic from dreamusers where id = '{$product['userid']}'");
        $user = $users[0];
        $template->assign("projCreator", $user['projCreator']);
        $template->assign("projCreatorProfile", $template->image($user['profilepic']));

        $template->assign("pagetitle", "Project | {$companyname}");
        $template->assign("companyname", "{$companyname}");
        $template->assign("css", $template->css('app'));
        $template->assign("fontawesome", $template->css('fontawesome'));
        $template->assign("jquery", $template->js('jquery'));
        $template->assign("mainscript", $template->js('main'));
        $template->assign("logo", $template->image('logo/logo.png'));

        $template->render('header');
        // $template->render('menu');
        $template->render('project');
        $template->render('footer');
    } else {
        $template->render('404');
    }
}else{
    header('location:https://'.$baseurl);
}