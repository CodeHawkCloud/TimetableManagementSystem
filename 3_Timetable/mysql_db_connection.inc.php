<?php

/*
 * Name    : N.S.R.Corera
 * Id      : IT18508338
 * Group Id: ITP-2019-MLB-FO-03
 */

    //database connection file
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tms";

    // Create connection
    $conn = new mysqli($servername, $username, $password,$database);

    // Check connection
    if ($conn->connect_error) {
        die("MySQL database connection failed: " . $conn->connect_error);
    }


