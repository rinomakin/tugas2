<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_tugas2";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}