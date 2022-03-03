<?php
include 'vendors/database/database.php';

$DB = new Database();

$returnJson = [];

if (isset($_POST['contactemail'])) {
    $query = "insert into `contact` (`con_email`, `con_message`, `con_name`, `con_phone`) values (?, ?, ?, ?)";
    $paramType = 'ssss';
    $paramArray = array($_POST['contactemail'], $_POST['contactmessage'], $_POST['contactname'], $_POST['contactphone']);
    $result = $DB->insert($query, $paramType, $paramArray);
    if($result){
        $returnJson['success'] = true;
        $returnJson['error'] = false;
    }else{
        $returnJson['success'] = false;
        $returnJson['error'] = true;
    }
}

echo json_encode($returnJson);