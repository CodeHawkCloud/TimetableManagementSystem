<?php

if (session_status() == PHP_SESSION_NONE) {

    session_start();
    
}

if (isset($_SESSION['id'])) {

    //do Nothing

} else if (isset($_SESSION['Staff_ID'])) {

    $_SESSION['id'] = $_SESSION['Staff_ID'];

} else {

    header('Location: ../index.php');
    
}
