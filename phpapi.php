<?php
header('Access-Control-Allow-Origin: *');
header('Content-type:application/json;charset=utf-8');

$data = [
        'person' => [
            [
                'id' => 0,
                'name' => 'jishan',
                'email' => 'jishanhoshenjibon@gmail.com',
                'phone' => '+801967569642',
            ],
            [
                'id' => 1,
                'name' => 'siddick',
                'email' => 'abusiddik@gmail.com',
                'phone' => '+8019xxxxxxxx',
            ],
        ],
        'post' => [
            [
                'posttitle' => "this is a post title",
                'postedby' => 1,
                'postat' => '27/02/2022 12:45 pm',
                'postcover' => 'postcover4.jpg',
                'postbody' => "<p>Lorem ipsum dolor squam est error soluta quis doloremque aspernatur maxime exercitationem laboriosam magnam, sit rem sed iusto dolorum excepturi odio deserunt.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab doloribus voluptas quisquam est error soluta quissed iusto dolorum excepturi odio deserunt.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab doloribus voluptas quisquam est error soluta quis doloremque aspernatur maximsed iusto dolorum excepturi odio deserunt.</p><p>doloremque aspernatur maxime exercitationem laboriosam magnam, sit rem sed iusto dolorum excepturi odio deserunt.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab doloribus voluptas quisquam est error soluta quis doloremque aspernatur maximsed iusto dolorum excepturi odio deserunt. doloremque aspernatur maxime exercitationem laboriosam magnam, sit rem sed iusto dolorum excepturi odio deserunt.</p>"
            ],
            [
                'posttitle' => "this is a post title",
                'postedby' => 0,
                'postat' => '27/02/2022 12:45 pm',
                'postcover' => 'postcover5.jpg',
                'postbody' => "<p>post ipsum dolor squam est error soluta quis doloremque aspernatur maxime exercitationem laboriosam magnam, sit rem sed iusto dolorum excepturi odio deserunt.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab doloribus voluptas quisquam est error soluta quissed iusto dolorum excepturi odio deserunt.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab doloribus voluptas quisquam est error soluta quis doloremque aspernatur maximsed iusto dolorum excepturi odio deserunt.</p><p>doloremque aspernatur maxime exercitationem laboriosam magnam, sit rem sed iusto dolorum excepturi odio deserunt.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab doloribus voluptas quisquam est error soluta quis doloremque aspernatur maximsed iusto dolorum excepturi odio deserunt. doloremque aspernatur maxime exercitationem laboriosam magnam, sit rem sed iusto dolorum excepturi odio deserunt.</p>"
            ]
        ]
    ];

$userkey = '12345';
$retuen = [];
if(isset($_GET['apikey'])){
    if($userkey == $_GET['apikey']){
        $return['success'] = 'apikey success!';
        $return['error'] = 0;
        if(isset($_GET['postid'])){
            $return['data']['person'] = [
                    $data['person'][$data['post'][$_GET['postid']]['postedby']]
                ];
            $return['data']['post'] =  [
                    $data['post'][$_GET['postid']]
                ];
        }else{
            $return['data'] = $data;
        }
    }else{
        $return['success'] = 0;
        $return['error'] = 'apikey invalid';
    }
}else{
        $return['success'] = 0;
        $return['error'] = 'apikey required';
}
echo json_encode($return);
?>