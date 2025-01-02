<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tentang Kami - Pempek Palembang Umi Rita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;700&family=Great+Vibes&display=swap"
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
    </style>
  </head>
  <!-- Navbar -->
  <nav class="bg-gray-800 text-white py-4 fixed w-full z-50">
    <div class="container mx-auto px-6">
      <div class="flex justify-between items-center">
        <a href="index.php" class="brand-font text-2xl">Pempek Umi Rita</a>
        <div class="navbar-font space-x-6">
          <a
            href="index.php"
            class="hover:text-orange-400 transition-colors duration-300"
            >Beranda</a
          >
          <a href="produk.php" class="text-orange-400">Produk</a>
          <a
            href="tentang.php"
            class="hover:text-orange-400 transition-colors duration-300"
            >Tentang Kami</a
          >
          <button onclick="toggleCart()" class="relative inline-block">
            <i class="fas fa-shopping-cart"></i>
            <span id="cart-counter" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
          </button>
        </div>
      </div>
    </div>
  </nav>

    <!-- Hero Section dengan Background Pastel -->
    <div class="pt-24 bg-pink-100">
      <div class="container mx-auto px-6 py-20 text-center">
        <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-6">
          Kisah Kami
        </h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
          Perjalanan cita rasa Pempek khas Palembang sejak 1998
        </p>
      </div>
    </div>

    <!-- Nilai-nilai Perusahaan -->
    <section class="py-20 bg-white">
      <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
          <div class="text-center">
            <div
              class="bg-orange-100 rounded-full p-8 w-32 h-32 mx-auto mb-6 flex items-center justify-center"
            >
              <i class="fas fa-heart text-4xl text-orange-500"></i>
            </div>
            <h3 class="text-xl font-bold mb-4">Autentik</h3>
            <p class="text-gray-600">
              Resep turun temurun yang terjaga keasliannya sejak 1998
            </p>
          </div>

          <div class="text-center">
            <div
              class="bg-yellow-100 rounded-full p-8 w-32 h-32 mx-auto mb-6 flex items-center justify-center"
            >
              <i class="fas fa-certificate text-4xl text-yellow-500"></i>
            </div>
            <h3 class="text-xl font-bold mb-4">Kualitas</h3>
            <p class="text-gray-600">
              Bahan berkualitas tinggi untuk hasil terbaik
            </p>
          </div>

          <div class="text-center">
            <div
              class="bg-green-100 rounded-full p-8 w-32 h-32 mx-auto mb-6 flex items-center justify-center"
            >
              <i class="fas fa-users text-4xl text-green-500"></i>
            </div>
            <h3 class="text-xl font-bold mb-4">Keluarga</h3>
            <p class="text-gray-600">
              Bisnis keluarga yang mengutamakan kehangatan
            </p>
          </div>

          <div class="text-center">
            <div
              class="bg-blue-100 rounded-full p-8 w-32 h-32 mx-auto mb-6 flex items-center justify-center"
            >
              <i class="fas fa-shipping-fast text-4xl text-blue-500"></i>
            </div>
            <h3 class="text-xl font-bold mb-4">Pelayanan</h3>
            <p class="text-gray-600">Pengiriman cepat ke seluruh Indonesia</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Galeri Produk -->
    <section class="py-20 bg-gray-50">
      <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">
          Produk Unggulan Kami
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          <div class="rounded-lg overflow-hidden shadow-lg">
            <img
              src="https://img.freepik.com/free-photo/top-view-delicious-breakfast-meal-assortment_23-2148829501.jpg?t=st=1732434605~exp=1732438205~hmac=cb2c7b20a435e126b01c3265f708f3a36baeaa2dce9ac8570d819c26dddb2084&w=740"
              alt="Pempek"
              class="w-full h-64 object-cover"
            />
            <div class="p-6 bg-white">
              <h3 class="font-bold mb-2">Pempek Kapal Selam</h3>
              <p class="text-gray-600">Pempek isi telur yang lezat</p>
            </div>
          </div>

          <div class="rounded-lg overflow-hidden shadow-lg">
            <img
              src="https://img.freepik.com/free-photo/top-view-pickle-green-patty-pan-squash-white-bowl_114579-86468.jpg?t=st=1732434665~exp=1732438265~hmac=fab0feffe9bc79776a94bdec79b9c6f888579a1b271f4e9b21e83359c5738e01&w=1060"
              alt="Pempek"
              class="w-full h-64 object-cover"
            />
            <div class="p-6 bg-white">
              <h3 class="font-bold mb-2">Pempek Lenjer</h3>
              <p class="text-gray-600">Tekstur kenyal yang khas</p>
            </div>
          </div>

          <div class="rounded-lg overflow-hidden shadow-lg">
            <img
              src="https://img.freepik.com/free-photo/flat-lay-delicious-brazilian-food-arrangement-with-copy-space_23-2148739199.jpg?t=st=1732418868~exp=1732422468~hmac=b4013fd72d79d8e11c4111d793247060c5fcdc51b1329b29d232d3acebef0a8c&w=1380"
              alt="Pempek"
              class="w-full h-64 object-cover"
            />
            <div class="p-6 bg-white">
              <h3 class="font-bold mb-2">Pempek Adaan</h3>
              <p class="text-gray-600">Bulat sempurna dan gurih</p>
            </div>
          </div>

          <div class="rounded-lg overflow-hidden shadow-lg">
            <img
              src="https://img.freepik.com/free-photo/mix-sauces-strawberry-jam-condensed-milk-honey-top-view_141793-4494.jpg?t=st=1732419273~exp=1732422873~hmac=b5f53f9c499342cca310c97752f20a54c159c510c4c7e2a149d63ac5a178dbe1&w=1060"
              alt="Pempek"
              class="w-full h-64 object-cover"
            />
            <div class="p-6 bg-white">
              <h3 class="font-bold mb-2">Cuko Spesial</h3>
              <p class="text-gray-600">Saus khas Palembang</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Cerita Brand -->
    <section class="py-20 bg-orange-50">
      <div class="container mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center">
          <h2 class="text-3xl font-bold mb-8">Perjalanan Kami</h2>
          <p class="text-gray-600 mb-8 leading-relaxed">
            Berawal dari dapur kecil di Palembang pada tahun 1998, Umi Rita
            memulai perjalanannya membuat pempek dengan resep warisan keluarga.
            Kini, setelah lebih dari 20 tahun, kami tetap berpegang teguh pada
            keaslian resep dan kualitas bahan yang digunakan.
          </p>
          <p class="text-gray-600 leading-relaxed">
            Setiap pempek yang kami buat adalah hasil dari dedikasi dan cinta
            terhadap kuliner tradisional Palembang. Kami berkomitmen untuk terus
            melestarikan cita rasa autentik ini untuk generasi mendatang.
          </p>
        </div>
      </div>
    </section>

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

    <!-- Floating WhatsApp Button -->
    <a
      href="https://wa.me/6281234567890"
      class="fixed bottom-6 right-6 bg-green-500 text-white rounded-full p-4 shadow-lg hover:bg-green-600 transition-colors duration-300 z-50"
      target="_blank"
      rel="noopener noreferrer"
    >
      <i class="fab fa-whatsapp text-3xl"></i>
    </a>
  </body>
  <script>
    src="js/cart.js"
    </script>
</html>
