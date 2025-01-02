<?php
session_start();
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
$sql = 'SELECT * FROM users WHERE email = ?';
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param('s', $email); // Bind email
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc(); // Ambil data pengguna
    } else {
        die('Data pengguna tidak ditemukan.');
    }
    $stmt->close();
} else {
    die('Query gagal disiapkan: ' . $conn->error);
}



$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Saya - Digitalibs</title>
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
  <body class="bg-gray-100">
    <!-- Include your navbar here -->

    <div class="container mx-auto px-4 py-8">
      <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <div class="p-6 bg-blue-500 text-white">
            <h1 class="text-2xl font-bold">Profil Saya</h1>
          </div>

          <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Profile Picture Section -->
              <div class="text-center">
                <div class="mb-4">
                  <img
                    src="https://via.placeholder.com/150"
                    alt="Profile Picture"
                    class="w-32 h-32 rounded-full mx-auto"
                  />
                </div>
                <button
                  class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors"
                >
                  Ubah Foto Profil
                </button>
              </div>

              <!-- Personal Information -->
              <div>
                <h2 class="text-xl font-semibold mb-4">Informasi Pribadi</h2>
                <div class="space-y-4">
                  <div>
                    <label class="block text-gray-600 mb-1">Nama Lengkap</label>
                    <input
                      type="text"
                      value="<?= htmlspecialchars($userData['nama_lengkap']) ?>"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                      readonly
                    />
                  </div>
                  <div>
                    <label class="block text-gray-600 mb-1">Email</label>
                    <input
                      type="email"
                      value="<?= htmlspecialchars($userData['email']) ?>"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                      readonly
                    />
                  </div>
                  <div>
                    <label class="block text-gray-600 mb-1">No. Handphone</label>
                    <input
                      type="tel"
                      value="<?= htmlspecialchars($userData['no_hp']) ?>"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                      readonly
                    />
                  </div>
                </div>
              </div>
            </div>

            <!-- Address Section -->
            <div class="mt-8">
              <h2 class="text-xl font-semibold mb-4">Alamat Lengkap</h2>
              <div class="space-y-4">
                <div>
                  <label class="block text-gray-600 mb-1">Alamat Lengkap</label>
                  <textarea
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"
                    rows="3"
                    readonly
                  ><?= htmlspecialchars($userData['alamat']) ?></textarea>
                </div>
              </div>
            </div>

            <!-- Save Button -->
            <div class="mt-8 flex justify-end">
              <button
                id="simpanprofil" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition-colors"
              >
                Simpan Perubahan
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
