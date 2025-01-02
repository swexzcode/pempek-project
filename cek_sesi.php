<?php
session_start();
// header("Content-Type: application/json");

// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "pempek_db";

$conn = new mysqli($host, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id']) || !isset($_SESSION['user']['email'])) {
    echo json_encode(["success" => false, "message" => "Pengguna belum login atau data tidak lengkap."]);
    exit;
}

$userId = $_SESSION['user']['id']; 
$email = $_SESSION['user']['email']; 

?>