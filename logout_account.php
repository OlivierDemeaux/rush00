<?php

include "includes/lib.php";

if ($_POST["submit"] && $_POST["submit"] === 'OK') {
    session_start();
    logout();
    header('Location: /');
}
