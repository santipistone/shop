<?php
    require_once("conn.php");
    if (isset($_GET['item'])) {
        $g = mysqli_real_escape_string($conn, $_GET['item']);
        $q = "SELECT * FROM prodotto WHERE prodotto.codice = '".$g."'";
        $r = mysqli_query($conn, $q);
        if (mysqli_num_rows($r)> 0) {
            $res = mysqli_fetch_object($r);
            $A = array();
            $a[0] = array("price" => $res->prezzo,
        "img" => $res->image,
        "nome" => $res->nome,
        "codice" => $res->codice);
            echo json_encode($a);
        }
    }

?>