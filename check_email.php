<?php
$host = 'localhost'; // Sesuaikan dengan host Anda
$user = 'root';      // Sesuaikan dengan username database Anda
$pass = '';          // Sesuaikan dengan password database Anda
$db = 'pempek_db'; // Nama database

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
}

$conn->close();
?>
