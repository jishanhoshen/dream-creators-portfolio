<?php
include 'vendors/jishanTemplate/template.php';
include 'vendors/database/database.php';

$template = new Template();
$companyname = "Dream Creators";

$DB = new Database();

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
$template->assign("logo",$template->image('logo/logo.png'));
$template->assign("herocover",$template->image('herocover.jpg'));


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


$query = "select concat(fname,' ', lname) as fullname, profile, designation from dreamusers";
$data = $DB->select($query);
$team_member = '';
if($data){ 
    for($i = 0; $i < count($data); $i++){
        $team_member .= '<div class="card" style="background-image: url('.$template->image($data[$i]['profile']).');">
                            <div class="name">
                                <div class="nameContent">
                                    <h3>'.$data[$i]['fullname'].'</h3>
                                    <p>'.$data[$i]['designation'].'</p>
                                    <div class="socialMedia">
                                        <div class="media">
                                            <i class="fab fa-facebook facebook"></i>
                                        </div>
                                        <div class="media">
                                            <i class="fab fa-youtube youtube"></i>
                                        </div>
                                        <div class="media">
                                            <i class="fab fa-twitter twitter"></i>
                                        </div>
                                        <div class="media">
                                            <i class="fab fa-instagram instagram"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cardBlur"></div>
                        </div>
                        ';
    }
}

$template->assign("team",$team_member);


$projects = $DB->select("select * from dreamprojects");
$project_area = '';
$keyword = '';
$old_key = ['*'];
$unickey = '';
if($projects){
    for($i=0; $i < count($projects); $i++){
        $keywords = json_decode($projects[$i]['keyword']);

        for ($j=0; $j < count($keywords); $j++) { 
            $keyword .= $keywords[$j].' ';
            $old_key[] = $keywords[$j];
        }
        $project_area .= '
        <div class="single-project '.$keyword.'">
            <img src="'.$template->image($projects[$i]['thumbnail']).'" alt="">
            <div class="project-details">
                <h3>'.$projects[$i]["projectname"].'</h3>
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






$template->render('index');
?>