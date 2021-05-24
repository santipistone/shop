<?php
    @header("Content-type: application/javascript");
    require_once("../script/check.php");
    if (Logged()) {
        echo json_encode("id" => $_SESSION['id']);
    }
?>