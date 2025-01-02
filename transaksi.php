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

$host = 'localhost'; // Sesuaikan dengan host Anda
$user = 'root';      // Sesuaikan dengan username database Anda
$pass = '';          // Sesuaikan dengan password database Anda
$db = 'pempek_db';  // Nama database

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}

// Pastikan pengguna sudah login
if (!isset($_SESSION['user']['email'])) {
    die('Anda harus login untuk mengakses halaman ini.');
}

$email = $_SESSION['user']['email']; // Ambil email dari sesi

// Query untuk mengambil data order dan order items berdasarkan email
$sql = '
    SELECT o.id AS order_id, o.created_at, o.total_biaya, oi.id AS item_id, oi.src, oi.product_name, oi.price, oi.quantity
    FROM orders o
    LEFT JOIN order_items oi ON o.id = oi.order_id
    WHERE o.email = ?
    ORDER BY o.created_at DESC
';

$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param('s', $email); // Bind email
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Ambil data transaksi
        $transactions = [];
        while ($row = $result->fetch_assoc()) {
            $transactions[] = $row;
        }
    } else {
        die('Anda Belum Melakukan Transaksi Apapun');
    }
    $stmt->close();
} else {
    die('Query gagal disiapkan: ' . $conn->error);
}

// Sekarang $transactions berisi data transaksi berdasarkan email



$conn->close();
?>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
		<script src="https://unpkg.com/unlazy@0.11.3/dist/unlazy.with-hashing.iife.js" defer init></script>
        <script src="https://cdn.tailwindcss.com"></script>
		<script type="text/javascript">
			window.tailwind.config = {
				darkMode: ['class'],
				theme: {
					extend: {
						colors: {
							border: 'hsl(var(--border))',
							input: 'hsl(var(--input))',
							ring: 'hsl(var(--ring))',
							background: 'hsl(var(--background))',
							foreground: 'hsl(var(--foreground))',
							primary: {
								DEFAULT: 'hsl(var(--primary))',
								foreground: 'hsl(var(--primary-foreground))'
							},
							secondary: {
								DEFAULT: 'hsl(var(--secondary))',
								foreground: 'hsl(var(--secondary-foreground))'
							},
							destructive: {
								DEFAULT: 'hsl(var(--destructive))',
								foreground: 'hsl(var(--destructive-foreground))'
							},
							muted: {
								DEFAULT: 'hsl(var(--muted))',
								foreground: 'hsl(var(--muted-foreground))'
							},
							accent: {
								DEFAULT: 'hsl(var(--accent))',
								foreground: 'hsl(var(--accent-foreground))'
							},
							popover: {
								DEFAULT: 'hsl(var(--popover))',
								foreground: 'hsl(var(--popover-foreground))'
							},
							card: {
								DEFAULT: 'hsl(var(--card))',
								foreground: 'hsl(var(--card-foreground))'
							},
						},
					}
				}
			}
		</script>
		<style type="text/tailwindcss">
			@layer base {
				:root {
					--background: 0 0% 100%;
--foreground: 240 10% 3.9%;
--card: 0 0% 100%;
--card-foreground: 240 10% 3.9%;
--popover: 0 0% 100%;
--popover-foreground: 240 10% 3.9%;
--primary: 240 5.9% 10%;
--primary-foreground: 0 0% 98%;
--secondary: 240 4.8% 95.9%;
--secondary-foreground: 240 5.9% 10%;
--muted: 240 4.8% 95.9%;
--muted-foreground: 240 3.8% 46.1%;
--accent: 240 4.8% 95.9%;
--accent-foreground: 240 5.9% 10%;
--destructive: 0 84.2% 60.2%;
--destructive-foreground: 0 0% 98%;
--border: 240 5.9% 90%;
--input: 240 5.9% 90%;
--ring: 240 5.9% 10%;
--radius: 0.5rem;
				}
				.dark {
					--background: 240 10% 3.9%;
--foreground: 0 0% 98%;
--card: 240 10% 3.9%;
--card-foreground: 0 0% 98%;
--popover: 240 10% 3.9%;
--popover-foreground: 0 0% 98%;
--primary: 0 0% 98%;
--primary-foreground: 240 5.9% 10%;
--secondary: 240 3.7% 15.9%;
--secondary-foreground: 0 0% 98%;
--muted: 240 3.7% 15.9%;
--muted-foreground: 240 5% 64.9%;
--accent: 240 3.7% 15.9%;
--accent-foreground: 0 0% 98%;
--destructive: 0 62.8% 30.6%;
--destructive-foreground: 0 0% 98%;
--border: 240 3.7% 15.9%;
--input: 240 3.7% 15.9%;
--ring: 240 4.9% 83.9%;
				}
			}
		</style>
  </head>
  <body>
  <nav class="bg-gray-800 text-white py-4 w-full z-50">
		<div class="container mx-auto px-6">
		  <div class="flex justify-between items-center">
			<a href="index.php" class="brand-font text-2xl">Pempek Umi Rita</a>
			<div class="navbar-font flex items-center space-x-6">
			  <a href="index.php" class="hover:text-orange-400 transition-colors duration-300">Beranda</a>
			  <a href="pempek.php" class="hover:text-orange-400">Produk</a>
			  <a href="tentang.php" class="hover:text-orange-400 transition-colors duration-300">Tentang Kami</a>
              <a href="checkout.php" class="text-orange-400 transition-colors duration-300">Checkout</a>
			  <button class="relative inline-block">
				<i class="fas fa-shopping-cart"></i>
			  </button>
			</div>
		  </div>
		</div>
	  </nav>

      <div class="container mx-auto p-8">
      <h2 class="text-xl font-bold mb-4">Riwayat Transaksi</h2>
<div id="transaction-items" class="p-4 space-y-4">
    <?php
    // Memisahkan transaksi berdasarkan order_id
    $groupedTransactions = [];
    foreach ($transactions as $transaction) {
        $groupedTransactions[$transaction['order_id']][] = $transaction;
    }

    // Menampilkan transaksi per order_id
    foreach ($groupedTransactions as $orderId => $orderItems): ?>
        <h3 class="text-lg font-semibold mb-2">Order ID: <?php echo htmlspecialchars($orderId); ?></h3>
        <table class="table-auto w-full border-collapse border border-gray-300 mb-6">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border border-gray-300">Item</th>
                    <th class="px-4 py-2 border border-gray-300">Harga</th>
                    <th class="px-4 py-2 border border-gray-300">Kuantitas</th>
                    <th class="px-4 py-2 border border-gray-300">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalBiaya = 0;
                $mergedItems = []; // Menyimpan item yang digabungkan berdasarkan nama produk
                foreach ($orderItems as $item) {
                    // Gabungkan item yang sama berdasarkan nama produk
                    if (!isset($mergedItems[$item['product_name']])) {
                        $mergedItems[$item['product_name']] = [
                            'price' => $item['price'],
                            'quantity' => $item['quantity']
                        ];
                    } else {
                        $mergedItems[$item['product_name']]['quantity'] += $item['quantity'];
                    }
                }

                // Menampilkan item yang sudah digabungkan
                foreach ($mergedItems as $productName => $mergedItem):
                    $subtotal = $mergedItem['price'] * $mergedItem['quantity'];
                    $totalBiaya += $subtotal;
                ?>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300"><?php echo htmlspecialchars($productName); ?></td>
                        <td class="px-4 py-2 border border-gray-300"><?php echo htmlspecialchars($mergedItem['price']); ?></td>
                        <td class="px-4 py-2 border border-gray-300"><?php echo htmlspecialchars($mergedItem['quantity']); ?></td>
                        <td class="px-4 py-2 border border-gray-300"><?php echo htmlspecialchars($subtotal); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="font-semibold">Total Biaya: <?php echo htmlspecialchars($totalBiaya); ?></div>
    <?php endforeach; ?>

    <?php if (empty($transactions)): ?>
        <p>Anda Belum Melakukan transaksi apapun</p>
    <?php endif; ?>
</div>




    <div class="mt-6 flex justify-between">
        <button onclick="backToProduct()" class="bg-blue-500 text-white p-2 rounded-lg">
            <i class="fas fa-chevron-left"></i> Kembali ke Keranjang
        </button>
    </div>
</div>
  </body>
  <script>
// verificationsession.php
   function backToProduct() {
    window.location.href = "produk.php";
  }

  function completePayment() {
    const cartItems = JSON.parse(localStorage.getItem("cart"));

    if (cartItems.length === 0) {
      alert("keranjang tidak boleh kosong.");
      return;
    }

    fetch("process_payment.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ cartItems }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert("Pembayaran berhasil!");
          localStorage.removeItem("cart");
          location.reload();
        } else {
          alert("Pembayaran gagal: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("Terjadi kesalahan.");
      });
  }


    function loadTransaction() {
    const cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    const cartContainer = document.getElementById("cart-items");
    let total = 0;
  
    // Kosongkan kontainer keranjang
    cartContainer.innerHTML = "";
  
    // Iterasi melalui item di keranjang
    cartItems.forEach((item, index) => {
      // Buat elemen baru untuk setiap item
      const itemElement = document.createElement("div");
      itemElement.className =
        "flex items-center border-b pb-4 mb-4";
  
      // Hitung subtotal untuk item ini
      const subtotal = item.price * item.quantity;
      total += subtotal;
  
      // Isi elemen item dengan HTML
      itemElement.innerHTML = `
        <img src="${item.image}" alt="${item.name}" class="mr-4 w-[100px] h-[100px] object-cover rounded-lg" />
        <div class="flex-grow">
          <h3 class="text-lg font-semibold">${item.name}</h3>
          ${
            item.description
              ? `<p class="text-sm text-muted-foreground">${item.description}</p>`
              : ""
          }
        </div>
        <div class="text-right">
          <p class="text-lg font-semibold">Rp ${item.price.toLocaleString(
            "id-ID"
          )}</p>
          <p class="text-sm">Quantity: ${item.quantity}</p>
          <p class="text-lg font-semibold">Subtotal: Rp ${subtotal.toLocaleString(
            "id-ID"
          )}</p>
        </div>
      `;
      cartContainer.appendChild(itemElement);
    });
  
    // Tambahkan elemen total biaya
    const totalElement = document.createElement("div");
    totalElement.className = "mt-4";
    totalElement.innerHTML = `
      <h3 class="text-lg font-semibold">Total Biaya</h3>
      <p class="text-lg font-semibold">Rp ${total.toLocaleString("id-ID")}</p>
    `;
    cartContainer.appendChild(totalElement);
  }

  document.addEventListener("DOMContentLoaded", () => {
  loadCartItems();
});

  </script>
</html>