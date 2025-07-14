<?php
    $servername = "localhost";
    $userdb = "root";
    $password = "";
    $dbname = "farmersandmarkets";

    $conn = new mysqli($servername, $userdb, $password, $dbname);

    if ($conn->connect_error) {
        die("Ket noi that bai: " . $conn->connect_error);
    }
?>