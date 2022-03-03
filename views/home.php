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

/* DATABASE DATA */
/* ------------------------------------------------------- */
$skills = [
    'html5' => 'icon/html5.png',
    'css3' => 'icon/css3.png',
    'sass' => 'icon/sass.png',
    'bootstrap' => 'icon/bootstrap.svg',
    'tailind' => 'icon/tailwind.png',
    'js' => 'icon/js.png',
    'ajax' => 'icon/ajax.png',
    'php' => 'icon/php.png',
    'laravel' => 'icon/laravel.png',
    'sql' => 'icon/sql.png'
];

$tools = [
    'figma' => 'icon/Figma-logo.svg',
    'adobe xd' => 'icon/adobe-xd.png',
    'git/github' => 'icon/git.png',
    'slack' => 'icon/slack.png',
    'vs code' => 'icon/vs-code.png'
];

/* ------------------------------------------------------- */
/* DATA END*/


$template->assign("pagetitle","{$companyname}");
$template->assign("companyname","{$companyname}");
$template->assign("css",$template->css('app'));
$template->assign("fontawesome",$template->css('fontawesome'));
$template->assign("jquery",$template->js('jquery'));
$template->assign("mainscript",$template->js('main'));
$template->assign("cursorscript",$template->js('cursor'));
$template->assign("gsapscript",'<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/gsap.min.js"></script>');
$template->assign("logo",$template->image('logo/logo.png'));
$template->assign("forgroundimg",$template->image('forground img.png'));
$template->assign("backgroundimg",$template->image('body_back.png'));


$skill_items = '';
foreach($skills as $key => $value){
    $img = "<img src='{$template->image($value)}' alt='{$key}'>";
    $skill_items .= '<div class="item">'.$img.'</div>';
}
$template->assign("skills",$skill_items);

$tool_items = '';
foreach($tools as $key => $value){
    $img = "<img src='{$template->image($value)}' alt='{$key}'>";
    $tool_items .= '<div class="item">'.$img.'</div>';
}
$template->assign("tools",$tool_items);


$query = "select concat(fname,' ', lname) as fullname, username, profilepic, designation from dreamusers where status = 1";
$data = $DB->select($query);
$team_member = '';
if($data){ 
    for($i = 0; $i < count($data); $i++){
        $team_member .= '<div class="card" style="background-image: url('.$template->image($data[$i]['profilepic']).');">
                            <div class="name">
                                <div class="nameContent">
                                    <h3>'.$data[$i]['fullname'].'</h3>
                                    <p>'.$data[$i]['designation'].'</p>
                                </div>
                            </div>
                            <div class="cardBlur"></div>
                        </div>
                        ';
    }
}

$template->assign("team",$team_member);


$projects = $DB->select("select * from dreamprojects where status = '1'");
$project_area = '';
$keyword = '';
$old_key = ['*'];
$unickey = '';
if($projects){
    for($i=0; $i < count($projects); $i++){
        $keywords = json_decode($projects[$i]['tags']);

        for ($j=0; $j < count($keywords); $j++) { 
            $keyword .= $keywords[$j].' ';
            $old_key[] = $keywords[$j];
        }
        $project_area .= '
        <div class="single-project '.$keyword.'">
            <img src="'.$template->image($projects[$i]['thumbnail']).'" alt="">
            <div class="project-details">
            <a href="javascript:void(0)"><h3>'.$projects[$i]["projectname"].'</h3></a>
            </div>
        </div>
        ';
        $keyword = '';
    }
}
$template->assign("projects",$project_area);


foreach(array_unique($old_key) as $newvalue){
    $unickey .= '<li><button data-filter="'.$newvalue.'">'.($newvalue == '*' ? 'All' : $newvalue).'</button></li>
    ';
}


$template->assign("projects_key",$unickey);


$template->render('header');
$template->render('menu');
$template->render('index');
$template->render('footer');
?>