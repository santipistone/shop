<?php

    include('../script/conn.php');
    $q = "SELECT * FROM prodotto";
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