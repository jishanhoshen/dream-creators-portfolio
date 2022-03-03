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

$subject = $_SERVER['SERVER_NAME'];
$search = '.' . $baseurl;
$usernameurl = str_replace($search, '', $subject);

$users = $DB->select("select concat(fname,' ', lname) as fullname, designation, profilepic, cover, description, languages, linked_account, skills from dreamusers where username = '{$usernameurl}'");
$user = $users[0];
$template->assign("fullname", "{$user['fullname']}");
$template->assign("designation", "{$user['designation']}");
$template->assign("profile", $template->image($user['profilepic']));
$template->assign("cover", "{$user['cover']}");
$template->assign("description", "{$user['description']}");
$language = '';
foreach (json_decode($user['languages']) as $languages) {
    $language .= '<p class="lang">' . $languages . '</p>';
}
$template->assign("languages", "{$language}");
$link = '';
foreach (json_decode($user['linked_account']) as $linked) {
    $subject = 'https://facebook';
    $search = 'https://';
    $withouthttp = str_replace($search, '', $linked);
    $social = substr($withouthttp,0,1);
    if($social == 'f'){
        $link .= '<li><a href="'.$linked.'"><i class="fab fa-facebook-f"></i>Facebook</a></li>';
    }
    if($social == 't'){
        $link .= '<li><a href="'.$linked.'"><i class="fab fa-twitter"></i>Twitter</a></li>';
    }
    if($social == 'l'){
        $link .= '<li><a href="'.$linked.'"><i class="fab fa-linkedin-in"></i>Linkedin</a></li>';
    }
    if($social == 'g'){
        $link .= '<li><a href="'.$linked.'"><i class="fab fa-github"></i>Github</a></li>';
    }
    if($social == 'i'){
        $link .= '<li><a href="'.$linked.'"><i class="fab fa-instagram"></i>Instagram</a></li>';
    }
}
$template->assign("linked_account", $link );
$skill = '';
foreach (json_decode($user['skills']) as $skills) {
    $skill .= '<span>' . $skills . '</span>';
}
$template->assign("skills", $skill);

$template->assign("pagetitle", "profile | {$companyname}");
$template->assign("companyname", "{$companyname}");
$template->assign("css", $template->css('app'));
$template->assign("fontawesome", $template->css('fontawesome'));
$template->assign("jquery", $template->js('jquery'));
$template->assign("mainscript", $template->js('main'));
$template->assign("logo", $template->image('logo/logo.png'));
$template->assign("thumbnail", $template->image('p1.png'));
$template->assign("porjectbody1", $template->image('p2.png'));
$template->assign("porjectbody2", $template->image('p3.png'));


$projects = $DB->select("select * from dreamprojects");
$project_area = '';
$keyword = '';
$old_key = ['*'];
$unickey = '';
if ($projects) {
    for ($i = 0; $i < count($projects); $i++) {
        $keywords = json_decode($projects[$i]['keyword']);

        for ($j = 0; $j < count($keywords); $j++) {
            $keyword .= $keywords[$j] . ' ';
            $old_key[] = $keywords[$j];
        }
        $project_area .= '
        <div class="single-project ' . $keyword . '">
            <img src="' . $template->image($projects[$i]['thumbnail']) . '" alt="">
            <div class="project-details">
            <a href="https://' . $baseurl . '/project?id=' . $projects[$i]['id'] . '"><h3>' . $projects[$i]["projectname"] . '</h3></a>
            </div>
        </div>
        ';
        $keyword = '';
    }
}
$template->assign("projects", $project_area);

$template->render('header');
$template->render('menu');
$template->render('profile');
$template->render('footer');
