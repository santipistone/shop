<?php
    require_once("conn.php");
    require_once("check.php");
    if (!Logged()) {
        header("Location: home.php");
    }

    
    function getOrder($conn) {
        $id = $_SESSION['id'];
        $q1 = "SELECT * FROM account WHERE account.id = '".$id."'";
        $q2 = "SELECT * FROM dipendente, lavora WHERE dipendente.codice = '".$id."' AND lavora.data_fine = '0000-00-00'";
        $res1 = mysqli_query($conn, $q1);
        $res2 = mysqli_query($conn, $q2);
        if (mysqli_num_rows($res1) > 0) {
            if (mysqli_num_rows($res2)> 0) {
                $_SESSION['mark'] = "worker";
            }
            else {
                $_SESSION['mark'] = "user";
            }
        } else ("Errore generale");
    }

    function getMansione($conn) {
        $id = $_SESSION['id'];
        $q1 = "SELECT dipendente.mansione FROM dipendente WHERE dipendente.codice = '".$id."'";
        $res1 = mysqli_query($conn, $q1);
        if (mysqli_num_rows($res1) > 0) {
            $f = mysqli_fetch_object($res1);
            echo $f->mansione;
        }
    }
    function getMoney($conn) {
        $id = $_SESSION['id'];
        $q1 = "SELECT dipendente.salario FROM dipendente WHERE dipendente.codice = '".$id."'";
        $res1 = mysqli_query($conn, $q1);
        if (mysqli_num_rows($res1) > 0) {
            $f = mysqli_fetch_object($res1);
            echo floor(($f->salario)/12);
        }
    }

    function tableOrderID($conn, $id) {
        $q1 = "SELECT * FROM ordini, negozio WHERE codice_cliente = '".$id."' AND ordini.codice_neg = negozio.codice ORDER BY data_ DESC, orario DESC LIMIT 5;";
        $g = mysqli_query($conn, $q1);
        if (mysqli_num_rows($g) > 0) {
            echo "<table>";
            echo "<tr><td>Codice prodotto</td><td>Nome prodotto</td><td>Codice Cliente</td><td>Data</td><td>Orario</td><td>Indirizzo</td><td>Negozio</td><td>Spedito</td></tr>";
            while($x = mysqli_fetch_object($g)){
                $q1 = "SELECT prodotto.nome FROM prodotto WHERE prodotto.codice = '".$x->codice_prodotto."'";
                $j = mysqli_query($conn, $q1);
                $j1 = mysqli_fetch_object($j);
                if ($x->spedito == '1') {
                    $img = "<img src='img/ok.png' style='height: 20px; margin-right: 5px;'>";
                }else
                $img = "<img src='img/no.png' style='height: 30px;'>";
                echo "<tr><td>".$x->codice_prodotto."</td><td>".$j1->nome."</td><td>".$x->codice_cliente."</td><td>".$x->data_."</td><td>".$x->orario."</td><td>".$x->indirizzo_sped."</td><td>".$x->codice_m."</td><td>".$img."</td></tr>";
            }
            echo "</table>";
        }else echo ("<p>Nessuna corrispondenza trovata</p>");
    }

    function tableOrderName($conn, $nome) {
        $q1 = "SELECT * FROM ordini, account, negozio WHERE ordini.codice_cliente = account.id AND account.nome = '".$nome."' AND ordini.codice_neg = negozio.codice ORDER BY data_ DESC, orario DESC LIMIT 5;";
        $g = mysqli_query($conn, $q1);

        if (mysqli_num_rows($g) > 0) {
            echo "<table>";
            echo "<tr><td>Codice prodotto</td><td>Nome prodotto</td><td>Codice Cliente</td><td>Data</td><td>Orario</td><td>Indirizzo</td><td>Negozio</td><td>Spedito</td></tr>";
            while($x = mysqli_fetch_object($g)){
                $q1 = "SELECT prodotto.nome FROM prodotto WHERE prodotto.codice = '".$x->codice_prodotto."'";
                $j = mysqli_query($conn, $q1);
                $j1 = mysqli_fetch_object($j);
                if ($x->spedito == '1') {
                    $img = "<img src='img/ok.png' style='height: 20px; margin-right: 5px;'>";
                }else
                $img = "<img src='img/no.png' style='height: 30px;'>";
                echo "<tr><td>".$x->codice_prodotto."</td><td>".$j1->nome."</td><td>".$x->codice_cliente."</td><td>".$x->data_."</td><td>".$x->orario."</td><td>".$x->indirizzo_sped."</td><td>".$x->codice_m."</td><td>".$img."</td></tr>";
            }
            echo "</table>";
        } else echo ("<p>Nessuna corrispondenza trovata</p>");
    }

    function lastDay($conn, $id, $stampa) {
        $q1 = "SELECT * FROM orario WHERE orario.codice_c = '".$id."' ORDER BY data DESC, o_inizio DESC";
        $f = mysqli_query($conn, $q1);
        if (mysqli_num_rows($f) > 0) {

            $y = mysqli_fetch_object($f);
            if ($y->o_fine == "00:00:00") {
                $_SESSION['enter'] = 1;
                $_SESSION['exit'] = 0;
                $_SESSION['o_inizio'] = $y->o_inizio;
                $_SESSION['data'] = $y->data;
            }
            else if ($y->o_fine != "00:00:00") {
                $_SESSION['enter'] = 0;
                $_SESSION['exit'] = 1;
                $_SESSION['o_inizio'] = $y->o_inizio;
                $_SESSION['data'] = $y->data;
            }
            $data1 = strtotime(date('Y/m/d'));
            $data2 = strtotime($_SESSION['data']);

            if ($stampa == 1) {
                echo "<p>Ultimo ingresso<br>Giorno : ".$y->data."  Orario ingresso : ".$y->o_inizio." Orario uscita : ".$y->o_fine."</p>";

            }
        }
    }

    function newEnter($conn, $id) {
        $qx = "SELECT lavora.codice_n FROM lavora WHERE lavora.codice_c = '".$id."'";
        $qqx = mysqli_query($conn, $qx);
        if (mysqli_num_rows($qqx) > 0) { $x1 = mysqli_fetch_object($qqx); $x2 = $x1->codice_n;}
        $q1 = "INSERT INTO orario VALUES('', '".$id."', '".$x2."', CURRENT_DATE(), CURRENT_TIME(), '')";
        $s2 = mysqli_query($conn, $q1);
        if ($s2) {
            lastDay($conn, $id, 0);
            return True;
        }    
     }

    function newExit($conn, $id) {
        $q1 = "UPDATE orario SET orario.o_fine = CURRENT_TIME() WHERE orario.codice_c = '".$id."'";
        $s2 = mysqli_query($conn, $q1);
        if ($s2) {
            lastDay($conn, $id, 0);
            return True;
        }    
    }

    function OnOff($conn, $id) {
        lastDay($conn, $id, 1);
        if ($_SESSION['enter'] == 1 && $_SESSION['exit'] == 0) {
            return True;
        } else
            return False;
    }


    function getOrderClient($conn, $id) {
        $q1 = "SELECT ordini.codice_prodotto, ordini.spedito, ordini.codice_cliente, ordini.data_, ordini.orario, ordini.indirizzo_sped, negozio.codice_m FROM ordini, negozio WHERE ordini.codice_cliente = '".$id."' AND ordini.codice_neg = negozio.codice ORDER BY data_ DESC, orario DESC LIMIT 5";
        $g = mysqli_query($conn, $q1);
        if (mysqli_num_rows($g) > 0) {
            echo "<table>";
            echo "<tr><td>Nome prodotto</td><td>Codice Cliente</td><td>Data</td><td>Orario</td><td>Indirizzo</td><td>Negozio</td><td>Spedito</td></tr>";
            while($x = mysqli_fetch_object($g)){
                $q1 = "SELECT prodotto.nome FROM prodotto WHERE prodotto.codice = '".$x->codice_prodotto."'";
                $j = mysqli_query($conn, $q1);
                $j1 = mysqli_fetch_object($j);
                if ($x->spedito == '1') {
                    $img = "<img src='img/ok.png' style='height: 20px; margin-right: 5px;'>";
                }else
                $img = "<img src='img/no.png' style='height: 30px;'>";
                echo "<tr><td>".$j1->nome."</td><td>".$x->codice_cliente."</td><td>".$x->data_."</td><td>".$x->orario."</td><td>".$x->indirizzo_sped."</td><td>".$x->codice_m."</td><td>".$img."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nessun ordine presente! <br>Inizia ad acquistare presso il nostro sito web!</p>";
        }
    }


    getOrder($conn);
?>