<?php
session_start(); // Pastikan session dimulai
header("Content-Type: application/json");


// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pempek_db";

$conn = new mysqli($servername, $username, $password, $dbname);

$isLoggedIn = isset($_SESSION['user']);
$userData = null;
if ($isLoggedIn) {
    $userData = $_SESSION['user'];
}

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Koneksi database gagal."]));
}

// Ambil email dari session
if (!isset($userData['email'])) { // Tambahkan kurung setelah isset
    echo json_encode(["success" => false, "message" => "Anda belum login."]);
    exit;
}

$email = $userData['email'];


// Mendapatkan data dari request
$data = json_decode(file_get_contents("php://input"), true);
$cartItems = $data['cartItems'];

if (empty($cartItems)) {
    echo json_encode(["success" => false, "message" => "Keranjang kosong."]);
    exit;
}

$conn->autocommit(false);

try {
    // Menghitung total biaya
    $total_biaya = 0;
    foreach ($cartItems as $item) {
        $total_biaya += $item['price'] * $item['quantity'];
    }

    // Simpan ke tabel orders dengan total_biaya
    $stmt = $conn->prepare("INSERT INTO orders (email, created_at, total_biaya) VALUES (?, NOW(), ?)");
    $stmt->bind_param("sd", $email, $total_biaya); // 's' untuk string, 'd' untuk decimal (float)
    $stmt->execute();
    $order_id = $conn->insert_id;
    $stmt->close();

    // Simpan ke tabel order_items
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, src, product_name, price, quantity) VALUES (?, ?, ?, ?, ?)");
    foreach ($cartItems as $item) {
        $stmt->bind_param(
            "issdi",
            $order_id,
            $item['image'],
            $item['name'],
            $item['price'],
            $item['quantity']
        );
        $stmt->execute();
    }
    $stmt->close();

    $conn->commit();
    echo json_encode(["success" => true, "message" => "Pembayaran berhasil."]);
} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(["success" => false, "message" => "Terjadi kesalahan: " . $e->getMessage()]);
}


$conn->close();
?>
