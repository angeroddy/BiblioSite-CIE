<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/members.php';

    $idFromURL = $_GET['Edit'];
    $database = new Database();
    $db = $database->getConnection();
    $items = new Membre($db);
    $stmt = $items->getOneMumber($idFromURL);
    $itemCount = $stmt->rowCount();

    json_encode($itemCount);
    if($itemCount > 0){      
        $membersArr = array();
        //$membersArr["body"] = array();
        //$membersArr["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id_membre" => $id_membre,
                "nom_membre" => $nom_membre,
                "prenom_membre" => $prenom_membre,
                "date_inscription" => $date_inscription,
                "dateNaiss_membre" => $dateNaiss_membre,
                "contacts" => $contacts
            );
            array_push($membersArr, $e);
        }
        echo json_encode($membersArr);
        $items->redirect("../EditMember.php");
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>