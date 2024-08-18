<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_perusahaan";

$koneksi = new mysqli($host, $user, $pass, $db);

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
