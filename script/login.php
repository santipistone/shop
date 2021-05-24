<?php

    include 'conn.php';
    if (isset($_POST['email']) && isset($_POST['passw'])) {
        $user = mysqli_real_escape_string($conn, $_POST['email']);
        $pasw = mysqli_real_escape_string($conn, $_POST['passw']);
        $q = "SELECT account.* FROM account WHERE account.email = '".$user."' AND  account.password = PASSWORD('".$pasw."')";
        $req = mysqli_query($conn, $q);
        if (mysqli_num_rows($req) > 0) {
            $data = mysqli_fetch_object($req);

            session_start();
            $_SESSION['id'] = $data->id;
            $_SESSION['name'] = $data->nome;
            $_SESSION['redirect'] = $_SERVER['HTTP_REFERER'];
            header('Refresh: 0; URL=../home.php?page=login&q=success');
            exit;
        }

        else {
            header('Refresh: 0; URL=../home.php?page=login&q=fail');
        }
    }
    else {
        header('Refresh: 0; URL=../home.php?page=login&q=fail');
    }
    mysqli_close($conn);
?>

