<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/members.php';

    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Membre($db);
   
    
    /*if($item->createMembers()){
        echo 'Members created successfully.';
    } else{
        echo 'Members could not be created.';
    }*/
?>