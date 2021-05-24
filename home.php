<head>
    <link rel='stylesheet' href="style.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/script.js" defer></script>
    <script src="js/db.js" defer></script>
    <script src="js/shop.js" defer></script>
    <script src="js/cookies.js" defer></script>
    

    <title>Shop</title>
</head>
<body>
        <?php
        require_once("script/conn.php");  
        require_once("script/check.php");
        ?>
        <nav>
        <div class="nav1">
            <a href="home.php"><div class="logo">Shop</div> </a>
            <form class="flex-1">
                <input class="input-box" placeholder="Cerca">
                <button id="but1"><img class ="img2" src="img/glass.png"></button>
            </form>
            <div class="acc"> 
                <a href="#" id="but3" ><img class ="img2" id="open_shop" src="img/shop2.png"></a>
                <a href="#" id="but3" ><img class ="img2" id="open_log" src="img/user2.png"></a></div>
                <div id="box" class="hidden">
                    <img src="img/ex" id="x">
                    <div class ="head1"></div>
                </div>
                <div id="box1" class="hidden">
                    <img src="img/ex" id="x1">
                    <div class ="head1"></div>
                    <div class="head2"><a href="home.php?page=order" id="but1" class="multi-acq" style="margin-left: 5px;">Acquista</a></div>
                </div>
                <div id="box3" class="hidden">
                    <img src="img/ex" id="x2">
                    <div class ="head1">
                        <div id="box4">
                        <?php
                            if (isset($_SESSION['id']) && isset($_SESSION['name'])) {
                                echo "<p class='check_reg'>Benvenuto ".$_SESSION['name']."</p>";
                                ?>
                                <div id="collect">
                                <a href="home.php?page=user" id="but2"><p>Utente</p></a>
                                <a href="script/logout.php" id="but2"><p>Esci</p></a>
                                </div>
                                
                            <?php
                            } else {
                                ?>
                                <form action="script/login.php" method="POST">
                            <input class="input-box2" name="email" placeholder="Username">
                            <input type="password" name="passw" id="change-id" class="input-box2" placeholder="Password">
                            <img src="img/eye-slash.png" class="ico-eye"></img>
                            <input id="but6" value="Accedi" type="submit"><br>
                            <a href="home.php?page=reg" id="but6">Registrati</a>
                            <?php
                            } ?>
                            
                        </form>
                        
                        </div>
                    </div>
                </div>
            <div class="menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>   

    </nav>
    </div>

        <div class="head">
            <div class="overlay">
                <div id="intestazione"><br><br><br>
                    <p class="text1">Acquista!<br>Approfitta della spedizione gratuita!</p>
                </div>
            </div>
        </div>


        <br>
        <div class="content">
            <div class="start">
            <?php if (isset($_GET['page']) && $_GET['page'] == "1") {?>
                <a id="but4click" href="home.php?page=1">
                    Smartphone & Tablet
                </a>
                <?php } else  { ?>
                    <a id="but4" href="home.php?page=1">
                    Smartphone & Tablet
                </a>
                <?php } if (isset($_GET['page']) && $_GET['page'] == "2") {?>
                    <a id="but4click" href="home.php?page=2" >
                    TV & Elettrodomestici
                    </a>
                <?php } else { ?>
                    <a id="but4" href="home.php?page=2" >
                    TV & Elettrodomestici </a>
                <?php } if (isset($_GET['page']) && $_GET['page'] == "3") { ?>
                <a id="but4click"  href="home.php?page=3">
                    Console & Giochi
                </a>
                <?php } else { ?>
                    <a id="but4"  href="home.php?page=3">
                    Console & Giochi
                </a>
                <?php } if (isset($_GET['page']) && $_GET['page'] == "music") { ?>
                    <a href="home.php?page=music" id="but4click"  >
                    Musica
                    </a>
                <?php } else { ?>
                    <a href="home.php?page=music" id="but4"  >
                    Musica
                    </a>
                <?php } if (isset($_GET['page']) && $_GET['page'] == "4") { ?>
                    <a id="but4click" href="home.php?page=4">
                    PC & Workstation
                </a>
                <?php } else { ?>
                    <a id="but4" href="home.php?page=4">
                    PC & Workstation
                </a>
                <?php } ?>
            </div>

            <?php
                if (isset($_GET['page'])) {
                if ($_GET['page'] == "reg") {;
                if (!isset($_POST['name']) && !isset($_POST['mail']) && !isset($_POST['passw']) && !isset($_POST['data']) && !isset($_POST['ind']) && !isset($_POST['check'])) {?>
                <div class="bd2">
                <script src="js/check_reg.js" defer></script>
                <div class="unbd2">
                <h3><p>Registrati ora!<br></p></h3><br>
                <form class="flex3" action="home.php?page=reg" method="POST">
                <input required="required" id="name" name="name" class="input-box3" placeholder="Nome">
                <input required="required" id="mail" name="mail" class="input-box3" placeholder="E-mail">
                <input required="required" id="mail2" name="mail2" class="input-box3" placeholder="Ripeti e-mail">
                <input required="required" id="passw" type="password" name="passw" class="input-box3" placeholder="Password">
                <input required="required" id="passw2" type="password" name="passw2" class="input-box3" placeholder="Ripeti password">
                <input required="required" id="ind" name="ind" class="input-box3" placeholder="Indirizzo">
                <input id="checkd" required="" type="text" name="data" class="date1" placeholder="Data di nascita" onfocus="(this.type='date')"/>

                <p><input name="check" required="required" type="checkbox" id="ok" > Registrandoti accetti la nostra politica sulla privacy</p>

                <input id="but1" type="submit" value="Registrati ora!">
                
                </form>
                
                        </div>
                        <div class="hidden" id="alert"><p></p></div>
                        
                </div>
                <?php
                } else if (isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['passw']) && isset($_POST['data']) && isset($_POST['ind']) && isset($_POST['check'])) {

                    $name = mysqli_real_escape_string($conn, $_POST['name']);
                    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
                    $ind = mysqli_real_escape_string($conn, $_POST['ind']);
            
                    $check = "SELECT * FROM account WHERE account.email = '".$mail."'";
                    $rs = mysqli_query($conn, $check);
                    if (mysqli_num_rows($rs) > 0) {
                        header('Refresh: 0; URL=home.php?page=regno');
                        return;
                    }
                    $q = "INSERT INTO account(nome,email,PASSWORD, indirizzo, DATA) VALUES ('".$name."', '".$mail."', PASSWORD('".$_POST['passw']."'), '".$ind."' ,'".$_POST['data']."')";
                    if(mysqli_query($conn, $q)) {
                        header('Refresh: 0; URL=home.php?page=regok');
                    } else {
                        header('Refresh: 0; URL=reg.php?page=regno');
                    }
                }} else if ($_GET['page'] == "offers") { ?>
                    <script src="js/look.js"></script>
                    <div class="bd3">
                    </div>
                <?php
                }  else if ($_GET['page'] == "success" && isset($_SESSION['shop'])) {
                    ?>
                    <div class="unbd2" ><p>
                                Complimenti <?php echo $_SESSION['name']  ?> !  <br>Grazie per aver effettuato l'ordine! <br><br>Riceverai una mail con tutte le informazioni riguardanti il tuo ordine entro pochi minuti.<br><br><br>
                                <!--FUNZIONE PER SVUOTARE CARRELLO -->
                                                        <script>
                                                        var ca = document.cookie.split(';');
                                                        for (let x=1; x<ca.length; x++) {
                                                            var j = ca[x];
                                                            document.cookie = j +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                                                        } </script>
                                <a href="home.php?" id="but1" style="width: 200px;" > Torna alla home</a>
                                       </p> </div>
                                       <?php unset($_SESSION['shop']); ?>
                    <?php
             } else if ($_GET['page'] == "fail") { ?>
                 
                 <div class="unbd2" >
                                <p>Oops ! Qualcosa è andato storto! <br> Contatta il nostro servizio assistenza se il problema persiste.</p>
                                        </div>
                    <?php
                
                
                
             }else if ($_GET['page'] == "item") { 

                            if (isset($_GET['item'])) {
                                $it = mysqli_real_escape_string($conn, $_GET['item']);
                                $q = "SELECT * FROM prodotto WHERE prodotto.codice = '".$it."'";
                                $ex = mysqli_query($conn, $q);
                                if (mysqli_num_rows($ex) > 0) {
                                    $res = mysqli_fetch_object($ex);
                                    $name = $res->nome;
                                    $stock = $res->stock;
                                    $img = $res->image;
                                    $price = $res->prezzo;
                                    $desc = $res->descrizione;
                                    $mag = $res->codice_m;
                                    ?>
                                    <div class="desc">
                                    <h2><p><?php echo $name; ?></p></h2>
                                    <img class="title" src=<?php echo "upload_img/".$img; ?>>
                                    <div>
                                    <h4><p>
                                        <?php if ($stock > 0) { ?> <form id="order" action="home.php?page=order" method="POST">
                                            <input type="hidden" id="cod2[1]" name="cod2[0]" value="<?php echo $it; ?>">
                                            <input type="hidden" id="num" name="num" value=1>
                                            <input type="hidden" id="x2" name="x2" value=1>
                                            <div style="margin-top: -40px;">
                                            <p>Quantità <br></p>
                                            <select style="width:100px; height: 30px; margin-top:20px; margin-left: 16px;", class="stock" id="stock", name="stock">
                                            <script src="js/tip.js"></script>
                                            <script> addElem(<?php if ($stock < 5) echo $stock; else echo "5";?>) </script>
                                            </select>
                                            </div> <div style="margin-top: 10px;">
                                            <button type="submit">Acquista ora <br> <img src="img/shop2.png" class="img_shop" /></button></div></form><?php } ?>
                                        <?php if ($stock < 1) { ?> <p>Non disponibile</p><?php } ?>
                                    </p></h4>
                                    <h4><p><?php echo $desc; ?> <br><br><br>Prezzo : <?php echo $price; ?> €</p></h4>
                                    <h4><p><?php if ($stock > 10) echo "Disponibile"; else if ($stock >= 1 && $stock < 10) echo "Disponibilità limitata"; else echo "Sold-out";?><br><br><br> Magazzino: <?php echo $mag;                                 }?>
                                    
                                    </p></h4>
                                    </div>
                                    </div>

                                    <?php

                            } }    else if ($_GET['page'] == "order") {
                                if (isset($_POST['num']) && $_POST['x2'] == 0) {
                                    for ($var=0; $var < $_POST['num']; $var++) {
                                        $codice_cliente = $_SESSION['id'];
                                        $codice_prod =  mysqli_real_escape_string($conn, $_POST['cod2'][$var]);
                                        $ind = mysqli_real_escape_string($conn, $_POST['indirizzo']);
                                        $cf = mysqli_real_escape_string($conn, $_POST['cf']);
                                        if (isset($_POST['stock']))
                                            $stock = mysqli_real_escape_string($conn, $_POST['stock']);
                                        else
                                            $stock = 1;
                                        $q = "SELECT make_an_order('".$codice_prod."', '".$codice_cliente."', '".$stock."', '".$ind."', '".$cf."')";
                                        $exec = mysqli_query($conn, $q);
                                        if (mysqli_num_rows($exec) > 0) {
                                            $res = mysqli_fetch_row($exec);
                                            if ($res[0] == 1) {
                                                $_SESSION['shop'] = 'True';
                                                header("Location: home.php?page=success");
                                            }
                                            else {
                                                header("Location: home.php?page=fail");
                                            }
                                        } else {
                                            header("Location: home.php?page=fail");
                                        }
                                    }
                                } else if (!isset($_POST['num'])) { 
                                 ?>
                                    <form id="order" action="home.php?page=order" method="POST">
                                    <script src="js/order.js" defer></script>               
                                    <input type="hidden" id="x2" name="x2" value="1">              
                                    <div class="unbd3">
                                    <div class="opt3">
                                    <div class="opt2">
                                    <div><p class="price"> Prezzo : <p class="price_add"></p>
                                    </p> </div>
                                    </div>
                                    <div class="opt2"><button type="submit" id="but1" style="margin-bottom: 20px; width: 200px; margin-left: 150px;">Acquista</button></div>
                                    </form>
                                    
                                    </div>
                                    </div>
                                    </div>
                        <?php
                        } else if (isset($_POST['x2']) && $_POST['x2'] =='1') {  
                            if (!isset($_SESSION['id'])) header("Location: home.php?page=order-error");
                            for ($var=0; $var < $_POST['num']; $var++) {
                                $codice_cliente = $_SESSION['id'];
                                $codice_prod =  mysqli_real_escape_string($conn, $_POST['cod2'][$var]);
                                if (isset($_POST['stock']))
                                    $stock = mysqli_real_escape_string($conn, $_POST['stock']);
                                else
                                    $stock = 1; 
                            }
                                $num = $_POST['num'];?>
                        <div class="bd2">
                        <script src="js/tip.js" defer ></script>
                <div class="unbd2">
                <h3><p><?php echo $_SESSION['name']; ?> effettua un ordine!<br></p></h3><br>
                <form class="flex3" action="home.php?page=order" method="POST">
                <input type="hidden" id="x2" name="x2" value="0"> 
                <?php 
                 for ($var=0; $var < $_POST['num']; $var++) {
                     echo "<input type='hidden' id='cod2[".$var."]' name='cod2[".$var."]' value='".$_POST['cod2'][$var]."'> ";
                 } ?>
                <input required="required" id="indirizzo" name="indirizzo" class="input-box3" placeholder="Indirizzo">
                <input required="required" id="cf" name="cf" class="input-box3" placeholder="Codice fiscale">
                <input required="required" id="card-id" name="card-id" class="input-box3" placeholder="Codice carta di credito">
                <input type="number" min="100" max="999" required="required" id="cvv" name="cvv" class="input-box3" placeholder="CVV">
                <input required="required" id="data-card"  class="date1" name="data-card class="input-box3" placeholder="Data di scadenza" onfocus="(this.type='date')"><br><br>
                <input type="hidden" id="num" name="num" value="<?php echo $num; ?>">

                <div class="hidden" id="alert" style="top:110.5%;"><p></p></div>


                <input id="but1" style="padding: 25px;" type="submit" value="Acquista"></div></div>
                
                </form>                     
                            
        
                            
                            <?php } 
                        } else if($_GET['page'] == "user" && isset($_SESSION['id'])) {
                            include("script/user.php");
                            include("script/stock.php");
                            if ($_SESSION['mark'] == "worker" && !isset($_GET['action']))  { ?>
                                <div class="unbd2" >
                     <p>Benvenuto <?php echo $_SESSION['name']; ?><br><br> Mansione : <?php getMansione($conn); ?><br>Salario mensile: <?php echo getMoney($conn); ?> € </p><br>
                                <?php if (OnOff($conn, $_SESSION['id']) == True ) {   ?>
                                <form method="POST" action="home.php?page=user&action=exit">
                                    <button style="padding: 20px 30px;" id="but1"> Uscita</button>
                                    </form>
                                 <?php } else if ($_SESSION['exit'] == 1 && strtotime(date("Y-m-d")) == strtotime($_SESSION['data'])) { ?>
                                
                                 
                                 <?php }else  { ?>
                                    <form method="POST" action="home.php?page=user&action=enter">
                                    <button style="padding: 20px 30px;" id="but1"> Ingresso</button>
                                    </form>
                                <?php } ?>

                                <form action="home.php?page=user&action=order" method="POST">
                                <p>Cerca ordini</p> 
                                <input class="input-box2" style="width: 400px;" placeholder="ID cliente" name="list-order-id"><br>
                                <input class="input-box2" style="width: 400px;" placeholder="Nome cliente" name="list-order-name"><br>
                                <center><input style="padding: 20px 30px;" value="Invia" type="submit" id="but1"></input></center>
                            </form>
                                <form action="home.php?page=user&action=item" method="POST">
                                <p>Cerca item</p> 
                                <div class="flex1" style="width: 500px;">
                                <div class="flex1" style="flex-direction: row; justify-content: space-between;">
                                <select class="input-box2" style="width: 400px;" id="list-item-id" name="list-item-id">
                                <option value disabled selected>Categoria</option>
                                <option value="1">Smartphone & Tablet</option>
                                <option value="2">TV & Elettrodomestici</option>
                                <option value="3">Console & Giochi</option>
                                <option value="4">PC & Workstation</option>
                                </select>
                                <input class="input-box2" style="width: 80px" placeholder="Num." name="num1">
                                </div>
                                <div class="flex1" style="flex-direction: row; justify-content: space-between;">
                                <input class="input-box2" style="width: 400px;" placeholder="Nome item" name="list-item-name"><br>
                                <input class="input-box2" style="width: 80px" placeholder="Num." name="num2">
                                </div>
                                <center><input style="padding: 20px 30px;" value="Invia" type="submit" id="but1"></input></center><br>
                                </div>

                                </form>

                                <a href="home.php?page=user&action=add" style="padding: 20px 30px;" id="but1">Inserisci un nuovo item</a><br><br>

                                    </div> <?PHP
                            } else if ($_SESSION['mark'] == "user") { ?>
                                <div class="unbd2" > 

                            <p> Benvenuto : <?php echo $_SESSION['name'];?><br>
                            <br>Lista ordini: <br><br>
                            <?php getOrderClient($conn, $_SESSION['id']); ?>
                                    </div>
                           <?php }
                           if (isset($_GET['action']) && $_GET['action'] == "order" && $_SESSION['mark'] == "worker")  {
                                ?><div class="unbd2" ><p> 
                                <a href="home.php?page=user" id="but1">Torna indietro</a><br><br><br><?php
                                if (isset($_POST['list-order-id']) && $_POST['list-order-id'] != "") {
                                    $id = mysqli_real_escape_string($conn, $_POST['list-order-id']);
                                    tableOrderID($conn, $id);
                                }else if (isset($_POST['list-order-name']) && $_POST['list-order-name'] != "") {
                                    $name = mysqli_real_escape_string($conn, $_POST['list-order-name']);
                                    tableOrderName($conn, $name);
                                }
                                ?> </p></div> <?php

                           } if (isset($_GET['action']) && $_GET['action'] == "enter" && $_SESSION['exit'] == 1 && $_SESSION['mark'] == "worker") {
                                newEnter($conn, $_SESSION['id']); 
                                header("Location: home.php?page=user");
                           } if (isset($_GET['action']) && $_GET['action'] == "exit" && $_SESSION['enter'] == 1 && $_SESSION['mark'] == "worker") {
                                newExit($conn, $_SESSION['id']);
                                header("Location: home.php?page=user");

                           } if (isset($_GET['action']) && $_GET['action'] == "add" && $_SESSION['mark'] == "worker") {
                                if (!isset($_POST['add-name']) || !isset($_FILES['img']) ||!isset($_POST['add-codice-rep']) || !isset($_POST['add-desc']) || !isset($_POST['add-prezzo']) || !isset($_POST['add-stock']) || !isset($_POST['add-codice-m']) || !isset($_POST['add-home']) || !isset($_POST['add-hidden'])){
                                    if (count($_POST) == 0) {?>
                                    <div class="unbd2" ><p> 
                                    <a href="home.php?page=user" id="but1">Torna indietro</a><br>
                                    <form class="flex3" action="home.php?page=user&action=add" method="POST" enctype="multipart/form-data"><br><br>
                                        <input required="" class="input-box3" placeholder="Nome prodotto" name="add-name">
                                        <label required="" id="but1" for="upload-photo">Immagine prodotto</label>
                                        <input required="" type="file" name="img" id="upload-photo" />   <br> 
                                        <select required="" class="input-box3" name="add-codice-rep">
                                        <option value="" disabled selected>Categoria</option>
                                        <option value="1">Smartphone & Tablet</option>
                                        <option value="2">TV & Elettrodomestici</option>
                                        <option value="3">Console & Giochi</option>
                                        <option value="4">PC & Workstation</option>
                                        </select>
                                        <textarea required="" placeholder="Descrizione prodotto" class="input-box3" name="add-desc" rows="4" cols="50"></textarea>

                                        <input required="" class="input-box3" placeholder="Prezzo prodotto" name="add-prezzo">
                                        <input required=""  min="1" max="999" class="input-box3" placeholder="Quantità prodotto" name="add-stock">
                                        <?php getMagazine($conn); ?>
                                        <select required=""  class="input-box3" name ="add-home">
                                        <option value="" disabled selected>Homepage</option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                        </select>
                                        <select required="" class="input-box3" name ="add-hidden">
                                        <option value="" disabled selected>Nascondi</option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                        
                                        </select>
                                        <input type="submit" value="Invia" id="but1" style="padding: 20px 30px;"></input>
                                    </form>
                                    </div>
                                    <?php
                        
                                } else echo ("<div class='unbd2'><br><a href=\"home.php?page=user&action=add\" id=\"but1\">Torna indietro</a><br><p>Errore! input mancante!</p></div>");

                            } if (isset($_POST['add-name']) && isset($_FILES['img']) && isset($_POST['add-codice-rep']) && isset($_POST['add-desc']) && isset($_POST['add-prezzo']) && isset($_POST['add-stock']) && isset($_POST['add-codice-m']) && isset($_POST['add-home']) && isset($_POST['add-hidden'])) {
                                $name = mysqli_real_escape_string($conn, $_POST['add-name']);
                                $img = $_FILES['img'];
                                $codice_rep = mysqli_real_escape_string($conn, $_POST['add-codice-rep']);
                                $desc = mysqli_real_escape_string($conn, $_POST['add-desc']);
                                $prezzo = mysqli_real_escape_string($conn, $_POST['add-prezzo']);
                                $stock = mysqli_real_escape_string($conn, $_POST['add-prezzo']);
                                $codice_m = mysqli_real_escape_string($conn, $_POST['add-codice-m']);
                                $home = mysqli_real_escape_string($conn, $_POST['add-home']);
                                $hidden = mysqli_real_escape_string($conn, $_POST['add-hidden']);
                                ?> <div class='unbd2'><p> <br>
                                <a href="home.php?page=user" id="but1">Torna indietro</a><br><?php
                                adder($conn, $name, $img, $codice_rep, $desc, $prezzo, $stock, $codice_m, $home, $hidden);
                                ?> </p></div> <?php
                            }
                        
                        
                        }if (isset($_GET['action']) && $_GET['action'] == "item" && $_SESSION['mark'] == "worker") {
                                ?> <div class="unbd2" ><p> <a href="home.php?page=user" id="but1">Torna indietro</a><br><br><?php
                                if (isset($_POST['list-item-id']) && $_POST['list-item-id'] != "") {
                                    $id = mysqli_real_escape_string($conn, $_POST['list-item-id']);
                                    if ($_POST['num1'] != "")
                                        $num = mysqli_real_escape_string($conn, $_POST['num1']);
                                    else $num = 10;
                                    show_all_id($conn, $id, $num);
                                    echo "<script src=\"js/tip.js\" defer></script>";
                                } else if (isset($_POST['list-item-name']) && $_POST['list-item-name'] != "") {
                                    $name = mysqli_real_escape_string($conn, $_POST['list-item-name']);
                                    if ($_POST['num2'] != "") 
                                        $num2 = mysqli_real_escape_string($conn, $_POST['num2']);
                                    else $num2 = 10;
                                    show_all_name($conn, $name, $num2);
                                    echo "<script src=\"js/tip.js\" defer></script>";
                                } if (isset($_POST['update-stock']) && $_POST['update-stock'] != "" && isset($_POST['update-num']) && $_POST['update-num'] != 0) {
                                    $id = mysqli_real_escape_string($conn, $_POST['update-num']);
                                    $num = mysqli_real_escape_string($conn, $_POST['update-stock']);
                                    updater($conn, $id, $num);
                                    header("Location: home.php?page=user");
                                } if (isset($_POST['delete-item']) && $_POST['delete-item'] != "" ) {
                                    $id = mysqli_real_escape_string($conn, $_POST['delete-item']);
                                    remover($conn, $id);
                                    
                                } if (isset($_POST['update-hidden']) && $_POST['update-hidden'] != "") {
                                    $id = mysqli_real_escape_string($conn, $_POST['update-hidden']);
                                    updateHidden($conn, $id);
                                }if (isset($_POST['update-home']) && $_POST['update-home'] != "") {
                                    $id = mysqli_real_escape_string($conn, $_POST['update-home']);
                                    updateHome($conn, $id);
                                }
                                ?> </p</div></div><?php
                           } 
                    }else if($_GET['page'] == "login")  {
                            if (isset($_GET['q']) && $_GET['q'] == "success" && isset($_SESSION['id'])) { ?>
                                <div class="unbd2" >
                                <p>Complimenti! <br> Hai effettuato con successo il log-in! <br>Sarai reinderizzato entro pochi secondi oppure <a href="<?php echo $_SESSION['redirect'];?>">Clicca qui</a></p>
                                        </div>
                                        <meta http-equiv="refresh" content="4; URL='<?php echo $_SESSION['redirect'];?>" />
                    <?php } else if (isset($_GET['q']) && $_GET['q'] == "fail" && !isset($_SESSION['id'])) { ?>
                        <div class="unbd2" >
                        <p>Oops! <br> Qualcosa è andato storto durante il log-in!<br> Sarai reinderizzato entro pochi secondi oppure <a href="home.php">Clicca qui</a></p>
                                        </div>
                                        <meta http-equiv="refresh" content="4; URL='home.php" />
                    <?php }}else if($_GET['page'] == "order-error") { ?>
                    <div class="unbd2" >
                    <p>Oops! <br> <br>Sembra che tu non sia loggato! <br>Effettua il log-in per ordinare dal nostro sito web!<br> Sarai reinderizzato entro pochi secondi oppure <a href="home.php">Clicca qui</a></p>
                                    </div>
                                    <meta http-equiv="refresh" content="4; URL='home.php" />
                    <?php }else if ($_GET['page'] == "1" || $_GET['page'] == "2" || $_GET['page'] == "3" || $_GET['page'] == "4") { ?>
                        <script src="js/look.js"></script>
                        <div class="bd3">

                        </div>              
                            <?php } else if ($_GET['page'] == "music") { ?>
                            
                            <script src="js/api.js" defer></script>
                            <div class ="hidden"><div class="int2"><p>Spotify</p></div></div>
                            <div id ="flex"><div id="alert1"><p>Trova gli album e ascoltali direttamente dai migliori servizi di streaming!</p></div></div>
                            <div class="bd">
                            </div>
                            <div class ="hidden"><div class="int"><p>Last.fm</p></div></div><br><br>
                            <div style="display:flex; justify-content: space-around;" class="bd2">
                            </div>
                            
                            
                            
                            
                         <?php   
                    } else if ($_GET['page'] == "regno") { ?>
                                <div class="unbd2" >
                        <p>Oops! <br> Qualcosa è andato storto durante la registrazione!<br> La e-mail da te inserita è gia usata!<br>Sarai reinderizzato entro pochi secondi oppure <a href="home.php">Clicca qui</a></p>
                                        </div>
                                        <meta http-equiv="refresh" content="4; URL='home.php" />
                        <?php } else if ($_GET['page'] == "regok") { ?>
                            <div class="unbd2" >
                            <p>Complimenti! <br> Hai effettuato con successo la registrazione <br>Riceverai una e-mail riepilogativa entro pochi minuti!<br>Sarai reinderizzato entro pochi secondi oppure <a href="home.php">Clicca qui</a></p>

                                        </div>
                                <meta http-equiv="refresh" content="4; URL='home.php" />
                        <?php    
                    }else { header("Location: home.php");
                                }} else {
                                    ?>
                                    <script src="js/look.js" defer></script>
                                    <div class="bd3">
                                        </div>
                                <?php
                                }
                            ?>
            

        </div>
    <div class="footer">
        <div id="elem1"><p><a href="#"><img class="img3" src="img/map.png"></a><br><p>Vieni a trovarci nel punto<br> vendita piu' vicino</p></div>
        <div id="elem1"><p><a href="#"><img class="img3" src="img/time.png"></a><br><p>Spedizione gratuita e veloce!<br> In sole 24h il vostro ordine <br>sara' gia' processato</p></div>
        <div id="elem1"><p><a href="#"><img class="img3" src="img/credit-card.png"></a><br><p>Accettiamo tutti i metodi di pagamento!</p></div>
        <div id="elem1"><p><a href="#"><img class="img3" src="img/msg.png"></a><br><p>Serve qualche info? Non esitare a <br> contattare il nostro servizio clienti</p></div>
        
    </div>
    <div class="footer1">
        <p>Santi Pier Pistone<br>O46002254</p>
    </div>

    </div>
        <section id="modal-view" class="hidden">

</body>