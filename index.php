<?php
session_start(); // Start session

// Database connection
$conn = new mysqli("localhost", "root", "", "pempek_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$isLoggedIn = isset($_SESSION['user']);
$userData = null;
if ($isLoggedIn) {
    $userData = $_SESSION['user'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Pempek Palembang Umi Rita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&amp;family=Roboto:wght@400;700&amp;family=Great+Vibes&amp;display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Playfair Display", serif;
      }
      .navbar-font {
        font-family: "Roboto", sans-serif;
      }
      .brand-font {
        font-family: "Great Vibes", cursive;
      }
      .navbar-font a:hover {
        background-color: rgba(255, 255, 255, 0.2);
        text-decoration: none;
      }
    </style>
  </head>
  <body class="bg-gray-100">
    <!-- Navbar -->
    <div class="relative">
      <img
        alt="Background image of Pempek Palembang"
        class="w-full h-screen object-cover"
        height="1080"
        src="https://st3.depositphotos.com/27171036/37277/i/600/depositphotos_372777682-stock-photo-pempek-served-rustic-wooden-table.jpg"
        width="1920"
      />
      <div class="absolute inset-0 bg-black opacity-50"></div>
      <div
        class="absolute inset-0 flex flex-col items-center justify-center text-white text-center px-4"
      >
        <div class="absolute top-0 left-0 w-full px-8 md:px-16 py-4">
          <div class="flex items-center justify-between max-w-7xl mx-auto">
            <h1 class="text-2xl md:text-3xl brand-font">
              Pempek Palembang Umi Rita
            </h1>
            <nav class="navbar-font">
              <ul class="flex space-x-4 text-sm md:text-lg">
                <li>
                  <a class="hover:bg-transparent px-3 py-2" href="index.php"                    >BERANDA</a
                  >
                </li>
                <li>
                  <a class="hover:bg-transparent px-3 py-2" href="produk.php"
                    >PRODUK</a
                  >
                </li>
                <li>
                  <a class="hover:bg-transparent px-3 py-2" href="tentang.php"
                    >TENTANG KAMI</a
                  >
                </li>
              </ul>
            </nav>
            <div class="text-white flex items-center space-x-6">
              <!-- Cart Icon -->
              <div class="relative">
                <button onclick="toggleCart()" class="relative inline-block">
                  <i class="fas fa-shopping-cart"></i>
                  <span
                    id="cart-counter"
                    class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center"
                    >0</span
                  >
                </button>
              </div>
              

            <!-- User Section -->
            <div class="flex items-center space-x-4">
                <div class="relative">
                  <button
                    onclick="toggleUserMenu()"
                    class="hover:text-gray-300"
                  >
                    <i class="fas fa-user text-xl"></i>
                  </button>
            <?php if (!$isLoggedIn): ?>
            <!-- Guest Menu -->
            <div id="guest-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                <a href="login.php" class="block px-4 py-2 text-gray-800 hover:bg-orange-50 hover:text-orange-500">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
                <a href="register.php" class="block px-4 py-2 text-gray-800 hover:bg-orange-50 hover:text-orange-500">
                    <i class="fas fa-user-plus mr-2"></i>Register
                </a>
            </div>
            <?php else: ?>
            <!-- User Menu -->
            <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                <div class="px-4 py-2 border-b border-gray-100">
                    <p class="font-semibold text-gray-800" id="username-display">
                        <?php echo htmlspecialchars($userData['nama_lengkap']); ?>
                    </p>
                    <p class="text-sm text-gray-600" id="user-email">
                        <?php echo htmlspecialchars($userData['email']); ?>
                    </p>
                </div>
                <a href="biodatauser.php" class="block px-4 py-2 text-gray-800 hover:bg-orange-50 hover:text-orange-500">
                    <i class="fas fa-user-circle mr-2"></i>Profil Saya
                </a>
                <a href="transaksi.php" class="block px-4 py-2 text-gray-800 hover:bg-orange-50 hover:text-orange-500">
                    <i class="fas fa-shopping-bag mr-2"></i>Transaksi
                </a>
                <a href="checkout.php" class="block px-4 py-2 text-gray-800 hover:bg-orange-50 hover:text-orange-500">
                    <i class="fas fa-clock mr-2"></i>Menunggu Pembayaran
                </a>
                <hr class="my-2" />
                <a href="logout.php" class="block px-4 py-2 text-gray-800 hover:bg-orange-50 hover:text-orange-500">
                    <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
</div>

<div class="mt-8">
          <p class="text-sm md:text-lg">Pempek Palembang Umi Rita</p>
          <h2 class="text-3xl md:text-6xl font-bold mt-2">
            Nikmati Pempek Khas Palembang
          </h2>
          <p class="mt-4 text-sm md:text-lg">
            Cicipi Pempek Khas Palembang yang lezat dan autentik. Dari bahan
            berkualitas tinggi dan resep khusus yang hanya bisa ditemukan di
            Palembang.
          </p>
          <a
            href="php"
            class="mt-8 bg-orange-600 text-white py-2 px-4 rounded hover:bg-orange-700 inline-block"
          >
            PESAN SEKARANG
          </a>
        </div>
        </div>
    </div>
    <!-- Produk Kami -->
    <section class="py-12 bg-white">
      <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold">Produk Kami</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 px-4">
          <!-- Produk 1 -->
          <div class="bg-gray-200 p-4 rounded-lg flex flex-col items-center">
            <div class="w-full h-64 mb-4">
              <img
                alt="Pempek"
                class="w-full h-full object-cover rounded"
                src="https://i.pinimg.com/736x/91/84/2e/91842e9e77c3b548c84dfb1cac242458.jpg"
              />
            </div>
            <h3 class="text-xl font-bold mb-2">Pempek</h3>
            <p class="text-gray-700 text-center mb-4">
              Pempek kami menyediakan pempek khas Palembang dengan berbagai
              macam jenis pempek seperti kapal selam, lenjer, adaan, kulit dan
              banyak lainnya.
            </p>
            <a
              href="pempek.php"
              class="text-orange-600 hover:text-orange-700 font-medium border-b-2 border-orange-600 hover:border-orange-700 transition-colors duration-300 mt-auto"
            >
              Lihat Produk
            </a>
          </div>

          <!-- Produk 2 -->
          <div class="bg-gray-200 p-4 rounded-lg flex flex-col items-center">
            <div class="w-full h-64 mb-4">
              <img
                alt="Paket Spesial"
                class="w-full h-full object-cover rounded"
                src="https://i.pinimg.com/736x/b4/d9/6e/b4d96ec5f068ea26998863e36d612d9b.jpg"
              />
            </div>
            <h3 class="text-xl font-bold mb-2">Paket Spesial</h3>
            <p class="text-gray-700 text-center mb-4">
              Pempek kami juga ada paket pempek dengan pilihan berbagai macam
              jenis pempek yang bisa disesuaikan dengan selera anda.
            </p>
            <a
              href="paketspesial.php"
              class="text-orange-600 hover:text-orange-700 font-medium border-b-2 border-orange-600 hover:border-orange-700 transition-colors duration-300 mt-auto"
            >
              Lihat Produk
            </a>
          </div>

          <!-- Produk 3 -->
          <div class="bg-gray-200 p-4 rounded-lg flex flex-col items-center">
            <div class="w-full h-64 mb-4">
              <img
                alt="Aneka Saus"
                class="w-full h-full object-cover rounded"
                src="https://st.depositphotos.com/1938399/2765/i/600/depositphotos_27657215-stock-photo-pempek-indonesian-cuisine.jpg"
              />
            </div>
            <h3 class="text-xl font-bold mb-2">Aneka Saus</h3>
            <p class="text-gray-700 text-center mb-4">
              Pempek kami menyediakan cuko khas Palembang dan aneka saus lainnya
              yang bisa disesuaikan dengan tingkat kepedasan anda.
            </p>
            <a
              href="anekasaus.php"
              class="text-orange-600 hover:text-orange-700 font-medium border-b-2 border-orange-600 hover:border-orange-700 transition-colors duration-300 mt-auto"
            >
              Lihat Produk
            </a>
          </div>
        </div>

        <!-- Tambahan tombol Lihat Semua Produk -->
        <div class="text-center mt-8">
          <a
            href="produk.php"
            class="inline-block bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition-colors duration-300"
          >
            Lihat Semua Produk
          </a>
        </div>
      </div>
    </section>
    <!-- End Produk Kami -->
    <!-- Cerita di Balik Pempek Umi Rita -->
    <section class="py-16 bg-gray-100">
      <div class="container mx-auto px-4 max-w-6xl">
        <h2 class="text-3xl font-bold text-center mb-12">
          Cerita di Balik Pempek Umi Rita
        </h2>
        <div class="flex flex-col md:flex-row items-center gap-12">
          <img
            alt="Cerita di Balik Pempek Umi Rita"
            class="w-full md:w-1/2 h-[400px] object-cover rounded-lg shadow-md"
            src="https://img.freepik.com/free-photo/deep-fried-fish-ball-dark-surface_1150-43604.jpg"
          />
          <div class="w-full md:w-1/2">
            <div class="bg-white p-8 rounded-lg shadow-md">
              <p class="text-gray-700 leading-relaxed">
                Pempek Umi Rita berdiri sejak tahun 1998, dimulai dari dapur
                kecil di sebuah rumah sederhana di Palembang. Awalnya, Umi Rita
                hanya membuat pempek untuk keluarga dan kerabat dekat.
              </p>
              <p class="text-gray-700 leading-relaxed mt-4">
                Dengan resep turun-temurun dari neneknya, Umi Rita berhasil
                menciptakan rasa khas pempek yang gurih, lembut, dan autentik.
                Resep ini menggunakan bahan-bahan pilihan seperti ikan segar dan
                bumbu alami yang terjaga kualitasnya.
              </p>
              <p class="text-gray-700 leading-relaxed mt-4">
                Pempek Umi Rita tidak hanya menjual pempek seperti kapal
                selam, lenjer, adaan, dan kulit, tetapi juga memperkenalkan
                inovasi baru seperti pempek keju dan pempek isi pedas.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Cerita di Balik Pempek Umi Rita -->
    <!-- Apa Kata Pelanggan -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4 max-w-6xl">
        <h2 class="text-3xl font-bold text-center mb-12">Apa Kata Pelanggan</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
          <!-- Testimonial 1 -->
          <div
            class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300"
          >
            <div class="flex items-center mb-4">
              <img
                src="https://i.pravatar.cc/150?img=1"
                alt="Foto Pelanggan"
                class="w-12 h-12 rounded-full mr-4"
              />
              <div>
                <p class="font-bold text-gray-900">Sarah Amalia</p>
                <p class="text-sm text-gray-600">Jakarta</p>
              </div>
            </div>
            <p class="text-gray-700 text-sm leading-relaxed">
              "Pempek Umi Rita benar-benar membawa saya kembali ke Palembang.
              Rasanya autentik dan sangat lezat!"
            </p>
            <div class="mt-3 text-orange-500">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>

          <!-- Testimonial 2 -->
          <div
            class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300"
          >
            <div class="flex items-center mb-4">
              <img
                src="https://i.pravatar.cc/150?img=2"
                alt="Foto Pelanggan"
                class="w-12 h-12 rounded-full mr-4"
              />
              <div>
                <p class="font-bold text-gray-900">Budi Santoso</p>
                <p class="text-sm text-gray-600">Bandung</p>
              </div>
            </div>
            <p class="text-gray-700 text-sm leading-relaxed">
              "Saya suka sekali dengan tekstur pempeknya yang kenyal dan saus
              cukonya yang pas. Pengiriman cepat dan packaging aman!"
            </p>
            <div class="mt-3 text-orange-500">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>

          <!-- Testimonial 3 -->
          <div
            class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300"
          >
            <div class="flex items-center mb-4">
              <img
                src="https://i.pravatar.cc/150?img=3"
                alt="Foto Pelanggan"
                class="w-12 h-12 rounded-full mr-4"
              />
              <div>
                <p class="font-bold text-gray-900">Linda Wijaya</p>
                <p class="text-sm text-gray-600">Surabaya</p>
              </div>
            </div>
            <p class="text-gray-700 text-sm leading-relaxed">
              "Paket pempek komplit sangat worth it! Porsinya pas dan rasanya
              konsisten. Sudah langganan 6 bulan!"
            </p>
            <div class="mt-3 text-orange-500">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>

          <!-- Testimonial 4 -->
          <div
            class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300"
          >
            <div class="flex items-center mb-4">
              <img
                src="https://i.pravatar.cc/150?img=4"
                alt="Foto Pelanggan"
                class="w-12 h-12 rounded-full mr-4"
              />
              <div>
                <p class="font-bold text-gray-900">Rudi Hermawan</p>
                <p class="text-sm text-gray-600">Medan</p>
              </div>
            </div>
            <p class="text-gray-700 text-sm leading-relaxed">
              "Pempek kapal selam favorit keluarga! Anak-anak suka sekali.
              Pelayanan ramah dan responsif."
            </p>
            <div class="mt-3 text-orange-500">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Apa Kata Pelanggan -->
    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300">
      <!-- Main Footer Content -->
      <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <!-- Brand & Deskripsi -->
          <div class="col-span-1 md:col-span-2">
            <h3 class="text-2xl brand-font text-white mb-4">
              Pempek Palembang Umi Rita
            </h3>
            <p class="text-sm leading-relaxed mb-6">
              Menyajikan pempek autentik khas Palembang dengan resep turun
              temurun sejak 1998. Kami berkomitmen menghadirkan cita rasa asli
              Palembang ke seluruh Indonesia.
            </p>
            <!-- Social Media Icons Moved Here -->
            <div class="flex space-x-6 mb-4">
              <a href="#" class="hover:text-white transition">
                <i class="fab fa-facebook-f text-xl"></i>
              </a>
              <a href="#" class="hover:text-white transition">
                <i class="fab fa-instagram text-xl"></i>
              </a>
              <a href="#" class="hover:text-white transition">
                <i class="fab fa-tiktok text-xl"></i>
              </a>
              <a href="#" class="hover:text-white transition">
                <i class="fab fa-whatsapp text-xl"></i>
              </a>
            </div>
          </div>

          <!-- Quick Links -->
          <div>
            <h4 class="text-white font-bold mb-4">Menu</h4>
            <ul class="space-y-2 text-sm">
              <li>
                <a href="#" class="hover:text-white transition">Beranda</a>
              </li>
              <li>
                <a href="#" class="hover:text-white transition">Produk</a>
              </li>
              <li>
                <a href="#" class="hover:text-white transition">Tentang Kami</a>
              </li>
              <li>
                <a href="#" class="hover:text-white transition">Kontak</a>
              </li>
            </ul>
          </div>

          <!-- Kontak -->
          <div>
            <h4 class="text-white font-bold mb-4">Hubungi Kami</h4>
            <div class="space-y-2 text-sm">
              <p class="flex items-center">
                <i class="fas fa-map-marker-alt w-5"></i>
                Jl. Pempek No. 123, Palembang
              </p>
              <p class="flex items-center">
                <i class="fas fa-phone w-5"></i>
                +62 123 4567 890
              </p>
              <p class="flex items-center">
                <i class="fas fa-envelope w-5"></i>
                info@pempekumirita.com
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Bottom Footer -->
      <div class="border-t border-gray-700">
        <div class="container mx-auto px-4 py-6">
          <!-- Copyright Centered -->
          <div class="text-center">
            <p class="text-sm">
              © 2024 Pempek Palembang Umi Rita. All rights reserved.
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- End Footer -->
    <!-- Floating WhatsApp Icon -->
    <a
      href="https://wa.me/6281234567890"
      class="fixed bottom-6 right-6 bg-green-500 text-white rounded-full p-4 shadow-lg hover:bg-green-600 transition-colors duration-300 z-50"
      target="_blank"
      rel="noopener noreferrer"
    >
      <i class="fab fa-whatsapp text-3xl"></i>
    </a>


<!-- Cart Sidebar -->
<div
      id="cart-popup"
      class="fixed right-0 top-0 h-screen w-[400px] bg-white shadow-2xl transform translate-x-full transition-transform duration-300 z-50"
    >
      <div class="flex flex-col h-full">
        <!-- Header -->
        <div
          class="flex justify-between items-center p-4 border-b border-gray-100"
        >
          <div class="flex items-center space-x-3">
            <i class="fas fa-shopping-cart text-orange-500"></i>
            <h2 class="text-lg font-semibold text-gray-800">
              Keranjang Belanja
            </h2>
          </div>
          <button
            onclick="toggleCart()"
            class="text-gray-400 hover:text-gray-600 transition-colors"
          >
            <i class="fas fa-times text-lg"></i>
          </button>
        </div>

        <!-- Cart Content -->
        <div class="flex-grow overflow-y-auto">
          <!-- Cart Items -->
          <div id="cart-items" class="p-4 space-y-4">
            <!-- Items akan dimasukkan oleh JavaScript -->
          </div>
        </div>

        <!-- Footer -->
        <div class="border-t border-gray-100 p-4 bg-white">
          <div class="mb-4">
            <p class="text-sm text-gray-600 mb-1">Total Pembayaran:</p>
            <h3 class="font-bold text-lg text-gray-800">
              <span id="cart-total">Rp 0</span>
            </h3>
          </div>
          <div class="flex justify-between space-x-4">
            <button
              onclick="deleteSelectedItems()"
              class="bg-white hover:bg-red-50 text-red-500 px-4 py-2 rounded-xl border border-red-500 text-sm font-medium transition-colors duration-200 flex items-center space-x-2"
            >
              <i class="fas fa-trash-alt text-sm"></i>
              <span>Hapus</span>
            </button>
            <button
              onclick="checkout()"
              class="flex-grow bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-xl font-semibold transition-colors duration-200 flex items-center justify-center space-x-2"
            >
              <i class="fas fa-shopping-bag"></i>
              <span>Checkout</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    

<!-- Sisanya tetap sama sampai bagian script -->

<!-- Modifikasi pada bagian script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set initial menu state based on PHP session
    const guestMenu = document.getElementById('guest-menu');
    const userMenu = document.getElementById('user-menu');
    
    
});
</script>



<!-- Panggil file JS external -->
<script src="js/cart.js"></script>
<script src="js/quantity.js"></script>
<script src="js/navigation.js"></script>
<script src="js/event.js"></script>

</body>
</html> 