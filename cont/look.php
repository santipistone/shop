<?php

    include('../script/conn.php');
    if (isset($_GET['item']) && $_GET['item'] == "1") {
        $name = mysqli_real_escape_string($conn, $_GET['item']);
        $q = "SELECT * FROM prodotto WHERE codice_rep = 1 AND prodotto.hidden = 0";
    } elseif (isset($_GET['item']) && $_GET['item'] == "2") {
        $name = mysqli_real_escape_string($conn, $_GET['item']);
        $q = "SELECT * FROM prodotto WHERE codice_rep = 2 AND prodotto.hidden = 0";
    } elseif (isset($_GET['item']) && $_GET['item'] == "3") {
        $name = mysqli_real_escape_string($conn, $_GET['item']);
        $q = "SELECT * FROM prodotto WHERE codice_rep = 3 AND prodotto.hidden = 0";
    } elseif (isset($_GET['item']) && $_GET['item'] == "4") {
        $name = mysqli_real_escape_string($conn, $_GET['item']);
        $q = "SELECT * FROM prodotto WHERE codice_rep = 4 AND prodotto.hidden = 0";
    }else {
        $q = "SELECT * FROM prodotto WHERE prodotto.home = 1  AND prodotto.hidden = 0";
    }
    

    $res = mysqli_query($conn, $q);
    $x =0;
        $dot = array();
        while ($row = mysqli_fetch_row($res)) {
            $dot[$x] = array("codice" => $row[0],
            "codice_rep" => $row[1],
            "img" => $row[2],
            "nome" => $row[3],
            "desc" => $row[4],
            "prezzo" => $row[5],
            "stock" => $row[6],
            );
            $x++;
        }
        echo json_encode($dot);




?>