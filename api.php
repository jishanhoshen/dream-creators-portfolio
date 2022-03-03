<?php

header('Access-Control-Allow-Origin: *');

header('Content-type:application/json;charset=utf-8');

$userkey = '12345';
$retuen = [];

if(isset($_GET['apikey'])){
    if($userkey == $_GET['apikey']){
        $return["items"] = [
            [
                "id" => 1,
                "name" => "Apples",
                "price"=> "$2"
            ],
            [
                "id" => 2,
                "name" => "Peaches",
                "price"=> "$5"
            ]
        ];
        $return["users"] = [
            [

                'id' => 'user1',

                'name' => 'jishan',

                'email' => 'jishanhoshenjibon@gmail.com',

                'phone' => '+801967569642',

            ],

            [

                'id' => 'user2',

                'name' => 'siddick',

                'email' => 'abusiddik@gmail.com',

                'phone' => '+8019xxxxxxxx',

            ],
        ];
    }
}

echo json_encode($return);