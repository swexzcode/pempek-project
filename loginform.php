<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Pempek Palembang Umi Rita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;700&family=Great+Vibes&display=swap"
      rel="stylesheet"
    />
  </head>
  <body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
      <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang</h1>
        <p class="text-gray-600">Masuk ke akun Anda</p>
      </div>

      <!-- Pesan Error -->
      <div
        id="error-message"
        class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4"
      ></div>

      <!-- Form Login -->
      <form id="loginForm" class="space-y-6">
        <div>
          <label class="block text-gray-700 mb-2">Email</label>
          <input
            type="email"
            id="email"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-orange-500"
          />
        </div>

        <div>
          <label class="block text-gray-700 mb-2">Password</label>
          <div class="relative">
            <input
              type="password"
              name="password"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-orange-500"
            />
            <button
              type="button"
              id="togglePassword"
              class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
            >
              <i class="fas fa-eye"></i>
            </button>
          </div>
        </div>

        <div>
          <label class="block text-gray-700 mb-2">Captcha</label>
          <div class="flex items-center">
            <img src="captcha.php" alt="CAPTCHA" class="mr-4 border rounded" />
            <input
              type="text"
              id="captcha"
              name="captcha_code"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-orange-500"
              placeholder="Masukkan kode"
            />
          </div>
        </div>

        <button
          type="submit"
          value="LOGIN"
          action="login.php"
          class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-600 transition-colors"
        >
          Masuk
        </button>
      </form>
      <div id="error-message" class="text-red-500 hidden"></div>

      <p class="mt-8 text-center text-gray-600">
        Belum punya akun?
        <a href="register.html" class="text-orange-500 hover:text-orange-600"
          >Daftar sekarang</a
        >
      </p>
    </div>
    <script src="js/login.js"></script>
    <script>
      const togglePassword = document.querySelector("#togglePassword");
      const password = document.querySelector("#password");

      togglePassword.addEventListener("click", function (e) {
        const type =
          password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        this.querySelector("i").classList.toggle("fa-eye");
        this.querySelector("i").classList.toggle("fa-eye-slash");
      });
    </script>
  </body>
</html>
