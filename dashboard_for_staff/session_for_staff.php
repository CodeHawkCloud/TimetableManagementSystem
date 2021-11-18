<?php
    // session for staff
    if (session_status() == PHP_SESSION_NONE) {

        session_start();
    }
    include_once '../1_Staff/user.php';
    $user = new User();
    $Staff_ID = $_SESSION['Staff_ID'];
    if (!$user->get_session()) {
        header("location:../1_Staff/login.php");
    }
