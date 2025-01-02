<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produk - Pempek Palembang Umi Rita</title>
    <!-- External CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;700&family=Great+Vibes&display=swap"
      rel="stylesheet"
    />

    <!-- Custom Styles -->
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
    </style>
  </head>

  <body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-gray-800 text-white py-4 w-full z-50">
      <div class="container mx-auto px-6">
        <div class="flex justify-between items-center">
          <a href="index.php" class="brand-font text-2xl">Pempek Umi Rita</a>
          <div class="navbar-font flex items-center space-x-6">
            <a href="index.php" class="hover:text-orange-400 transition-colors duration-300">Beranda</a>
            <a href="produk.php" class="text-orange-400">Produk</a>
            <a href="tentang.php" class="hover:text-orange-400 transition-colors duration-300">Tentang Kami</a>
            <button onclick="toggleCart()" class="relative inline-block">
              <i class="fas fa-shopping-cart"></i>
              <span id="cart-counter" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
            </button>
          </div>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <div class="h-[40vh] relative mt-16">
      <img
        src="produk-pempek-headline.jpg"
        alt="Banner Produk"
        class="w-full h-full object-cover"
      />
        <div class="absolute inset-0 flex flex-col items-center justify-center">
        <h1 class="text-white text-4xl font-bold mb-2">Produk Kami</h1>
        <h5 class="text-white text-xl font-bold">Pempek khas Palembang</h5>
      </div>
    </div>

    <!-- Filter Buttons -->
    <div class="container mx-auto px-4 py-8">
      <div class="flex justify-center flex-wrap gap-4 mb-12">
        <a
            href="produk.php"
          class="filter-btn px-6 py-2 rounded-full bg-gray-200 hover:bg-orange-500 hover:text-white transition-colors"
          >Semua</a
        >
        <a
          href="pempek.php"
          class="filter-btn px-6 py-2 rounded-full bg-gray-200 hover:bg-orange-500 hover:text-white transition-colors"
          >Pempek</a
        >
        <a
          href="paketspesial.php"
          class="filter-btn px-6 py-2 rounded-full bg-gray-200 hover:bg-orange-500 hover:text-white transition-colors"
          >Paket Spesial</a
        >
        <a
          href="anekasaus.php"
          class="filter-btn px-6 py-2 rounded-full bg-gray-200 hover:bg-orange-500 hover:text-white transition-colors"
          >Aneka Saus</a
        >
      </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12">
      <div
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto"
      >
        <!-- Pempek Items -->
        <div class="product-item pempek mx-4">
          <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
            <div class="relative">
              <img src="https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829500.jpg?t=st=1732418783~exp=1732422383~hmac=7a62252a66cb466f04a5d81c34b5c5980c7b138bd1e9f0c1e626d342dc45a15b&w=1060" alt="Pempek Kapal Selam" class="w-full h-48 object-cover object-center"/>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-medium mb-2">Pempek Kapal Selam</h3>
              <div class="flex items-center justify-between mb-3">
                <span class="text-orange-500 font-medium">Rp 15.000</span>
                <div class="flex items-center space-x-2">
                  <button class="quantity-btn minus bg-gray-200 px-2 py-1 rounded" onclick="updateQuantity(this, -1)">-</button>
                  <input type="number" class="quantity-input w-12 text-center border rounded" value="1" min="1" readonly>
                  <button class="quantity-btn plus bg-gray-200 px-2 py-1 rounded" onclick="updateQuantity(this, 1)">+</button>
                </div>
              </div>
              <div class="flex items-center justify-between space-x-2">
                <button onclick="addToCart(this)" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors">
                  <i class="fas fa-shopping-cart"></i>
                </button>
                <button onclick="buyNow(this)" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition-colors">Beli Sekarang</button>
              </div>
            </div>
          </div>
        </div>

        <div class="product-item pempek mx-4">
          <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
            <div class="relative">
              <img src="https://img.freepik.com/free-photo/deep-fried-fish-ball-dark-surface_1150-43602.jpg" alt="Pempek Lenjer" class="w-full h-48 object-cover object-center"/>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-medium mb-2">Pempek Lenjer</h3>
              <div class="flex items-center justify-between mb-3">
                <span class="text-orange-500 font-medium">Rp 12.000</span>
                <div class="flex items-center space-x-2">
                  <button class="quantity-btn minus bg-gray-200 px-2 py-1 rounded" onclick="updateQuantity(this, -1)">-</button>
                  <input type="number" class="quantity-input w-12 text-center border rounded" value="1" min="1" readonly>
                  <button class="quantity-btn plus bg-gray-200 px-2 py-1 rounded" onclick="updateQuantity(this, 1)">+</button>
                </div>
              </div>
              <div class="flex items-center justify-between space-x-2">
                <button onclick="addToCart(this)" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors">
                  <i class="fas fa-shopping-cart"></i>
                </button>
                <button onclick="buyNow(this)" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition-colors">Beli Sekarang</button>
              </div>
            </div>
          </div>
        </div>

        <div class="product-item pempek mx-4">
          <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
            <div class="relative">
              <img src="https://img.freepik.com/free-photo/boiled-eggs-stir-fried-with-tamarind-sauce_1150-22260.jpg?t=st=1732418838~exp=1732422438~hmac=d88db83dd28cc184a64fec99d946cbddfacbc2091b79d6117492c27f8b4dba04&w=360" alt="Pempek Adaan" class="w-full h-48 object-cover object-center"/>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-medium mb-2">Pempek Adaan</h3>
              <div class="flex items-center justify-between mb-3">
                <span class="text-orange-500 font-medium">Rp 10.000</span>
                <div class="flex items-center space-x-2">
                  <button class="quantity-btn minus bg-gray-200 px-2 py-1 rounded" onclick="updateQuantity(this, -1)">-</button>
                  <input type="number" class="quantity-input w-12 text-center border rounded" value="1" min="1" readonly>
                  <button class="quantity-btn plus bg-gray-200 px-2 py-1 rounded" onclick="updateQuantity(this, 1)">+</button>
                </div>
              </div>
              <div class="flex items-center justify-between space-x-2">
                <button onclick="addToCart(this)" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors">
                  <i class="fas fa-shopping-cart"></i>
                </button>
                <button onclick="buyNow(this)" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition-colors">Beli Sekarang</button>
              </div>
            </div>
          </div>
        </div>

        <div class="product-item pempek mx-4">
          <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
            <div class="relative">
              <img src="https://img.freepik.com/free-photo/sliced-pirozhki-peppers-board-marble-table_114579-84001.jpg?t=st=1732418933~exp=1732422533~hmac=8323550e4266f8c3368f90cc95925852294b17e1375f8bc7c69bd8db7e44950e&w=1060" alt="Pempek Kulit" class="w-full h-48 object-cover object-center"/>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-medium mb-2">Pempek Kulit</h3>
              <div class="flex items-center justify-between mb-3">
                <span class="text-orange-500 font-medium">Rp 13.000</span>
                <div class="flex items-center space-x-2">
                  <button class="quantity-btn minus bg-gray-200 px-2 py-1 rounded" onclick="updateQuantity(this, -1)">-</button>
                  <input type="number" class="quantity-input w-12 text-center border rounded" value="1" min="1" readonly>
                  <button class="quantity-btn plus bg-gray-200 px-2 py-1 rounded" onclick="updateQuantity(this, 1)">+</button>
                </div>
              </div>
              <div class="flex items-center justify-between space-x-2">
                <button onclick="addToCart(this)" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors">
                  <i class="fas fa-shopping-cart"></i>
                </button>
                <button onclick="buyNow(this)" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition-colors">Beli Sekarang</button>
              </div>
            </div>
          </div>
        </div>

        <div class="product-item pempek mx-4">
          <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
            <div class="relative">
              <img src="https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-2148739199.jpg?t=st=1732418868~exp=1732422468~hmac=b4013fd72d79d8e11c4111d793247060c5fcdc51b1329b29d232d3acebef0a8c&w=1380" alt="Pempek Tahu" class="w-full h-48 object-cover object-center"/>
            </div>
            <div class="p-4">
              <h3 class="text-lg font-medium mb-2">Pempek Tahu</h3>
              <div class="flex items-center justify-between mb-3">
                <span class="text-orange-500 font-medium">Rp 11.000</span>
                <div class="flex items-center space-x-2">
                  <button class="quantity-btn minus bg-gray-200 px-2 py-1 rounded" onclick="updateQuantity(this, -1)">-</button>
                  <input type="number" class="quantity-input w-12 text-center border rounded" value="1" min="1" readonly>
                  <button class="quantity-btn plus bg-gray-200 px-2 py-1 rounded" onclick="updateQuantity(this, 1)">+</button>
                </div>
              </div>
              <div class="flex items-center justify-between space-x-2">
                <button onclick="addToCart(this)" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors">
                  <i class="fas fa-shopping-cart"></i>
                </button>
                <button onclick="buyNow(this)" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition-colors">Beli Sekarang</button>
              </div>
            </div>
          </div>
        </div>

    </main>

    <!-- Floating WhatsApp Button -->
    <a
      href="https://wa.me/6281234567890"
      class="fixed bottom-6 right-6 bg-green-500 text-white rounded-full p-4 shadow-lg hover:bg-green-600 transition-colors duration-300 z-50"
      target="_blank"
      rel="noopener noreferrer"
    >
      <i class="fab fa-whatsapp text-3xl"></i>
    </a>

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

    <!-- Cart Popup -->
    <div id="cart-popup" class="fixed right-0 top-0 h-screen w-[400px] bg-white shadow-2xl transform translate-x-full transition-transform duration-300 z-50">
      <div class="flex flex-col h-full">
        <!-- Header -->
        <div class="flex justify-between items-center p-4 border-b border-gray-100">
          <div class="flex items-center space-x-3">
            <i class="fas fa-shopping-cart text-orange-500"></i>
            <h2 class="text-lg font-semibold text-gray-800">Keranjang Belanja</h2>
          </div>
          <button onclick="toggleCart()" class="text-gray-400 hover:text-gray-600 transition-colors">
            <i class="fas fa-times text-lg"></i>
          </button>
        </div>

        <!-- Cart Content -->
        <div class="flex-grow overflow-y-auto">
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
            <button onclick="deleteSelectedItems()" class="bg-white hover:bg-red-50 text-red-500 px-4 py-2 rounded-xl border border-red-500 text-sm font-medium transition-colors duration-200 flex items-center space-x-2">
              <i class="fas fa-trash-alt text-sm"></i>
              <span>Hapus</span>
            </button>
            <button onclick="checkout()" class="flex-grow bg-orange-500 hover:bg-orange-600 text-white py-2 rounded-xl font-semibold transition-colors duration-200 flex items-center justify-center space-x-2">
              <i class="fas fa-shopping-bag"></i>
              <span>Checkout</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script>
      function checkout() {
      const cart = JSON.parse(localStorage.getItem("cart")) || [];
      if (cart.length === 0) {
       alert("Keranjang belanja Anda masih kosong.");
     return;
     }
  // Simpan data keranjang ke session storage untuk digunakan di halaman checkout
  sessionStorage.setItem("cart", JSON.stringify(cart));

  // Redirect ke halaman checkout
  window.location.href = "checkout.php";
}
    </script>
    <script src="js/cart.js"></script>
    <script src="js/quantity.js"></script>
    <script src="js/navigation.js"></script>
  </body>
</html>
