<?php
session_start();
function Logged() {

    if (isset($_SESSION['name']) && isset($_SESSION['id'])) {
        return True;
    } else {
        return False;
    }

}

?>