<?php
include "config.php";
include "MinecraftReH.php";
$api = new MinecraftReH;

if($_GET) {

    if ($_GET["uuid"] == TRUE) {
        $username = $_GET["username"];
        echo $api->RenderUUID($username);
    }

    if ($_GET["nameHistory"] == TRUE) {
        $UUID = $_GET["uuID"];
        echo $api->NameHistory($UUID);
    }

    if ($_GET["Render3DHead"] == TRUE) {
        $UUID = $_GET["uuID"];
        echo json_encode(array("renderHead" => $api->Render3DHead($UUID)));
    }

    if ($_GET["Render3DAvatar"] == TRUE) {
        $UUID = $_GET["uuID"];
        $Overlay = $_GET["overlay"];
        echo json_encode(array("Render3DAvatar" => $api->Render3DAvatar($UUID, $Overlay = "true")));
    }

    if ($_GET["Render3DSkin"] == TRUE) {
        $UUID = $_GET["uuID"];
        echo json_encode(array("Render3DSkin" => $api->Render3DSkin($UUID)));
    }

    if ($_GET["getData"] == TRUE) {
        $username = $_GET["username"];
        echo $api->getData($username);
    }

}else if($_POST){

    if ($_POST["uuid"] == TRUE) {
        $username = $_POST["username"];
        echo $api->RenderUUID($username);
    }

    if ($_POST["JSuuid"] == TRUE) {
        $username = $_POST["username"];
        echo json_encode(array("status"=>"good","UUID"=>$api->getUUID($username)));
    }

    if ($_POST["nameHistory"] == TRUE) {
        $UUID = $_POST["uuID"];
        echo $api->NameHistory($UUID);
    }

    if ($_POST["Render3DHead"] == TRUE) {
        $UUID = $_POST["uuID"];
        echo json_encode(array("renderHead" => $api->Render3DHead($UUID)));
    }

    if ($_POST["Render3DAvatar"] == TRUE) {
        $UUID = $_POST["uuID"];
        $Overlay = $_POST["overlay"];
        echo json_encode(array("Render3DAvatar" => $api->Render3DAvatar($UUID, $Overlay = "true")));
    }

    if ($_GET["Render3DSkin"] == TRUE) {
        $UUID = $_POST["uuID"];
        echo json_encode(array("Render3DSkin" => $api->Render3DSkin($UUID)));
    }

    if ($_POST["getData"] == TRUE) {
        $username = $_POST["username"];
        echo $api->getData($username);
    }

}else{
    echo json_encode(array("message" => "Required Data Not Found"));
}