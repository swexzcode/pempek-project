<?php

session_start();

require('fpdf/fpdf.php');

// Koneksi ke database
$host = "localhost";
$user = "root";
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "pempek_db"; 

$conn = new mysqli($host, $user, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil email dari session user
$isLoggedIn = isset($_SESSION['user']);
$userData = null;
$email = ''; // Initialize email variable
if ($isLoggedIn) {
    $userData = $_SESSION['user'];
    $email = $userData['email']; // Set the email value from session data
}

// Ambil data order dan order items
$stmt = $conn->prepare("
    SELECT o.id AS order_id, o.created_at, o.total_biaya, oi.id AS item_id, oi.src, oi.product_name, oi.price, oi.quantity
    FROM orders o
    LEFT JOIN order_items oi ON o.id = oi.order_id
    WHERE o.email = ?
    ORDER BY o.created_at DESC");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah ada data
if ($result->num_rows == 0) {
    die("Tidak ada transaksi ditemukan.");
}

// Buat PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Header
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, 'INVOICE PEMBELIAN', 0, 1, 'C');
$pdf->Ln(10);

// Detail Invoice
$pdf->SetFont('Arial', '', 12);
$order = $result->fetch_assoc(); // Ambil satu data order

// Tanggal order dan ID
$pdf->Cell(40, 10, 'Order ID:', 0, 0);
$pdf->Cell(150, 10, $order['order_id'], 0, 1);

$pdf->Cell(40, 10, 'Tanggal:', 0, 0);
$pdf->Cell(150, 10, $order['created_at'], 0, 1);

// Detail Item Pembelian
$pdf->Ln(10);
$pdf->Cell(40, 10, 'Item', 1, 0, 'C');
$pdf->Cell(40, 10, 'Harga', 1, 0, 'C');
$pdf->Cell(40, 10, 'Jumlah', 1, 0, 'C');
$pdf->Cell(40, 10, 'Subtotal', 1, 1, 'C');

$totalBiaya = 0;
do {
    $subtotal = $order['price'] * $order['quantity'];
    $totalBiaya += $subtotal;

    // Detail item
    $pdf->Cell(40, 10, $order['product_name'], 1, 0, 'L');
    $pdf->Cell(40, 10, 'Rp. ' . number_format($order['price'], 0, ',', '.'), 1, 0, 'R');
    $pdf->Cell(40, 10, $order['quantity'], 1, 0, 'C');
    $pdf->Cell(40, 10, 'Rp. ' . number_format($subtotal, 0, ',', '.'), 1, 1, 'R');

} while ($order = $result->fetch_assoc()); // Loop untuk item lainnya

// Total Biaya
$pdf->Ln(5);
$pdf->Cell(120, 10, '', 0, 0); // Untuk memberi jarak
$pdf->Cell(40, 10, 'Total:', 0, 0, 'C');
$pdf->Cell(20, 10, 'Rp. ' . number_format($totalBiaya, 0, ',', '.'), 0, 1, 'R');

// Footer
$pdf->Ln(10);
$pdf->Cell(190, 10, 'Terimakasih atas pembelian Anda!', 0, 1, 'C');

// Output PDF
$pdf->Output();

// Tutup koneksi
$conn->close();

?>
