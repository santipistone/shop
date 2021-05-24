<?php
    require_once ("conn.php");

    function adder($conn, $name, $img, $codice_rep, $desc, $prezzo, $stock, $codice_m, $home, $hidden) {
        $img = $_FILES['img']['name'];
        $q = "INSERT INTO prodotto VALUES('', '".$codice_rep."', '".$img."', '".$name."', '".$desc."', '".$prezzo."', '".$stock."', '".$codice_m."', '".$home ."', '".$hidden."')";
        $err = 0;
        if (is_uploaded_file($_FILES['img']['tmp_name'])) {
            // Controllo che il file non superi i 18 KB
            if ($_FILES['img']['size'] > 984320) {
              die ("<p>Il file non deve superare i 930 KB!!</p>");
              $err = 1;
              return;
            }
            // Ottengo le informazioni sull'immagine
            list($width, $height, $type, $attr) = getimagesize($_FILES['img']['tmp_name']);
            // Controllo che il file sia in uno dei formati GIF, JPG o PNG
            if (($type!=1) && ($type!=2) && ($type!=3)) {
                die ("<p>Formato non corretto!!</p>");
                $err = 1;
                return;
            }
            // Verifico che sul sul server non esista già un file con lo stesso nome
            // In alternativa potrei dare io un nome che sia funzione della data e dell'ora
            if (file_exists('upload_img/'.$_FILES['img']['name'])) {
                die ("<p>File già esistente sul server. Rinominarlo e riprovare.</p>");
                $err = 1;
                return;
            }
            // Sposto il file nella cartella da me desiderata
            if (!move_uploaded_file($_FILES['img']['tmp_name'], 'upload_img/'.$_FILES['img']['name'])) {
                die ("<p>Errore nel caricamento dell'immagine!!</p>");
                $err= 1 ;
                return;
            }
          }
        if ($err != 1) {
            $q2 = mysqli_query($conn, $q);
            if ($q2) {
                echo "<p>Prodotto aggiunto con successo al database!</p>";
            } else {
                echo "<p>Errore nell'inserimento!</p><br>";
            }
        }
    }

    function showHidden($conn, $id) {
        $q = "SELECT prodotto.hidden FROM prodotto WHERE prodotto.codice = '".$id."'";
        $x = mysqli_query($conn, $q);
        $x1 = mysqli_fetch_object($x);
        return $x1->hidden;
    }

    function showHome($conn, $id) {
        $q = "SELECT prodotto.home FROM prodotto WHERE prodotto.codice = '".$id."'";
        $x = mysqli_query($conn, $q);
        $x1 = mysqli_fetch_object($x);
        return $x1->home;
    }

    function updateHidden($conn, $id) {
        if (showHidden($conn, $id) == 0)
            $val = 1;
        else $val = 0;
        $q = "UPDATE prodotto SET prodotto.hidden = '".$val."' WHERE prodotto.codice = '".$id."'";
        $x = mysqli_query($conn, $q);
        if ($x) echo ("<p>Prodotto aggiornato con successo!");
        else echo ("<p>Errore aggiornamento prodotto codice : ".$id."</p>");
    }

    function updateHome($conn, $id) {
        if (showHome($conn, $id) == 0) 
            $val = 1;
        else $val = 0;
        $q = "UPDATE prodotto SET prodotto.home = '".$val."' WHERE prodotto.codice = '".$id."'";
        $x = mysqli_query($conn, $q);
        if ($x) echo ("<p>Prodotto aggiornato con successo!");
        else echo ("<p>Errore aggiornamento prodotto codice : ".$id."</p>");
    }

    function remover($conn, $id) {
        $q1 = "DELETE FROM prodotto WHERE prodotto.codice = '".$id."'";
        $x = mysqli_query($conn, $q1);
        if ($x) {
            echo "<p>Prodotto eliminato con successo!</p>";
        } else echo ("<p>Errore eliminazione prodotto codice : ".$id."</p>");
    }


    function updater($conn, $id, $stock) {
        $q1 = "UPDATE prodotto SET prodotto.stock = prodotto.stock + '".$stock."' WHERE prodotto.codice = '".$id."'";
        $q2 = mysqli_query($conn, $q1);
        if ($q2) {
            return True;
        } else return False;
    };

    function show_all_name($conn, $nome, $num) {
        $q1 = "SELECT * FROM prodotto WHERE prodotto.nome LIKE '%".$nome."%' LIMIT ".$num."";
        $q2 = mysqli_query($conn, $q1);
        echo "<table>";
        echo "<tr><td>Codice prodotto</td><td>Codice categoria</td><td>Nome</td><td>Descrizione</td><td>Prezzo</td><td>Stock</td><td>Negozio</td><td>Modifica stock</td><td>Elimina</td><td>Home</td><td>Nascondi</td></tr>";
        while ($q3 = mysqli_fetch_object($q2)) {
            if (showHidden($conn, $q3->codice) == '1') {
                $img = "<img src='img/ok.png' style='height: 20px; margin-right: 5px;'>";
            }else {
                $img = "<img src='img/no.png' style='height: 30px;'>";
            }
            if (showHome($conn, $q3->codice) == '1' ) {
                $img2 = "<img src='img/ok.png' style='height: 20px; margin-right: 5px;'>"; 
            }else {
                $img2 = "<img src='img/no.png' style='height: 30px;'>";
            }
            echo "<tr><td>".$q3->codice."</td><td>".$q3->codice_rep."</td><td>".$q3->nome."</td><td>".$q3->descrizione."</td><td>".$q3->prezzo."</td><td>".$q3->stock."</td><td>".$q3->codice_m."</td><td><form style='margin-block-end: 0em;'action='home.php?page=user&action=item' method='POST'><div style='flex-direction:row; justify-content: space-between;'class='flex1'><input type='hidden' name='update-num' value='".$q3->codice."'><input name='update-stock' class='input-box' style='width: 60px; height: 30px;'></input><button style='padding: 2px 13px;' id='but1'>+</button></div></form></td><td><form style='margin-block-end: 0em;' class='elimina' action='home.php?page=user&action=item' method='POST'><div style='flex-direction:row; justify-content: space-between;'class='flex1'><input class='delete-item' type='hidden' name='delete-item' value='".$q3->codice."'><button style='padding: 3px 15px;' id='but1'>x</button></div></form></td><td><form style='margin-block-end: 0em;'action='home.php?page=user&action=item' method='POST'><div style='flex-direction:row; justify-content: space-between;'class='flex1'><input type='hidden' name='update-home' value='".$q3->codice."'>".$img2."<button style='padding: 2px 13px;' id='but1'>o</button></div></form></td><td><form style='margin-block-end: 0em;'action='home.php?page=user&action=item' method='POST'><div style='flex-direction:row; justify-content: space-between;'class='flex1'><input type='hidden' name='update-hidden' value='".$q3->codice."'>".$img."<button style='padding: 2px 13px;' id='but1'>o</button></div></form></td></tr>";
        }
        echo "</table>";
    }

    function show_all_id($conn, $id, $num) {
        $q1 = "SELECT * FROM prodotto WHERE prodotto.codice_rep = '".$id."' LIMIT ".$num."";
        $q2 = mysqli_query($conn, $q1);
        echo "<table>";
        echo "<tr><td>Codice prodotto</td><td>Codice categoria</td><td>Nome</td><td>Descrizione</td><td>Prezzo</td><td>Stock</td><td>Negozio</td><td>Modifica stock</td><td>Elimina</td><td>Home</td><td>Nascondi</td></tr>";
        while ($q3 = mysqli_fetch_object($q2)) {
            if (showHidden($conn, $q3->codice) == '1') {
                $img = "<img src='img/ok.png' style='height: 20px; margin-right: 5px;'>";
            }else {
                $img = "<img src='img/no.png' style='height: 30px;'>";
            }
            if (showHome($conn, $q3->codice) == '1' ) {
                $img2 = "<img src='img/ok.png' style='height: 20px; margin-right: 5px;'>"; 
            }else {
                $img2 = "<img src='img/no.png' style='height: 30px;'>";
            }
            echo "<tr><td>".$q3->codice."</td><td>".$q3->codice_rep."</td><td>".$q3->nome."</td><td>".$q3->descrizione."</td><td>".$q3->prezzo."</td><td>".$q3->stock."</td><td>".$q3->codice_m."</td><td><form style='margin-block-end: 0em;'action='home.php?page=user&action=item' method='POST'><div style='flex-direction:row; justify-content: space-between;'class='flex1'><input type='hidden' name='update-num' value='".$q3->codice."'><input name='update-stock' class='input-box' style='width: 60px; height: 30px;'></input><button style='padding: 2px 13px;' id='but1'>+</button></div></form><td><form style='margin-block-end: 0em;' class='elimina' action='home.php?page=user&action=item' method='POST'><div style='flex-direction:row; justify-content: space-between;'class='flex1'><input class='delete-item' type='hidden' name='delete-item' value='".$q3->codice."'><button style='padding: 3px 15px;' id='but1'>x</button></div></form></td><td><form style='margin-block-end: 0em;'action='home.php?page=user&action=item' method='POST'><div style='flex-direction:row; justify-content: space-between;'class='flex1'><input type='hidden' name='update-home' value='".$q3->codice."'>".$img2."<button style='padding: 2px 13px;' id='but1'>o</button></div></form></td><td><form style='margin-block-end: 0em;'action='home.php?page=user&action=item' method='POST'><div style='flex-direction:row; justify-content: space-between;'class='flex1'><input type='hidden' name='update-hidden' value='".$q3->codice."'>".$img."<button style='padding: 2px 13px;' id='but1'>o</button></div></form></td></tr>";
        }
        echo "</table>";
    }

    function getMagazine($conn) {
        $q = "SELECT * FROM magazzino";
        $q1 = mysqli_query($conn, $q);
        if (mysqli_num_rows($q1) > 0) {
            
            echo "<select required=\"\" class=\"input-box3\" name=\"add-codice-m\">";
            echo "<option value=\"\" disabled selected>Negozio</option>";
            while( $x = mysqli_fetch_object($q1)) {
                echo "<option value=".$x->sede.">".$x->sede."</option>";
            }
            echo "</select>";
        }
    }
    

    showHidden($conn, 1);

?>