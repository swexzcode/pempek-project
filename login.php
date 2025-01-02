<?php
session_start(); // Start session

// Database connection
$conn = new mysqli("localhost", "root", "", "pempek_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inisialisasi pesan error
$error_message = "";

// Input sanitation and validation
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$captcha_code = trim($_POST['captcha_code'] ?? '');
$ip_address = $_SERVER['REMOTE_ADDR'];
$max_attempts = 3;
$time_window = 300; // 5 minutes in seconds

// Fungsi untuk menghasilkan captcha
if (!isset($_SESSION['captcha_code'])) {
    $_SESSION['captcha_code'] = rand(1000, 9999);
}

// Jika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validasi captcha
    if ($captcha_code !== ($_SESSION['captcha_code'] ?? '')) {
        $error_message = "Kode captcha tidak sesuai.";
        $_SESSION['captcha_code'] = rand(1000, 9999); // Regenerate CAPTCHA
    } else {
        // Check login attempts within the time window
        $stmt = $conn->prepare("
            SELECT COUNT(*) AS attempts
            FROM login_attempts
            WHERE ip_address = ? AND email = ? AND attempt_time > (NOW() - INTERVAL ? SECOND)
        ");
        $stmt->bind_param("ssi", $ip_address, $email, $time_window);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['attempts'] >= $max_attempts) {
            $error_message = "Terlalu banyak percobaan login. Silakan coba lagi nanti.";
        } else {
            // Verify user existence
            $stmt = $conn->prepare("SELECT id, nama_lengkap, email, password FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Verify password
                if (password_verify($password, $user['password'])) {
                    // Successful login
                    $_SESSION['user'] = [
                        "id" => $user['id'],
                        "nama_lengkap" => $user['nama_lengkap'],
                        "email" => $user['email']
                    ];

                    // Clear login attempts after successful login
                    $stmt = $conn->prepare("DELETE FROM login_attempts WHERE ip_address = ? AND email = ?");
                    $stmt->bind_param("ss", $ip_address, $email);
                    $stmt->execute();

                    // Redirect to dashboard or home
                    header("Location: index.php");
                    exit;
                }
            }

            // Record failed login attempt for both invalid password or email not found
            $stmt = $conn->prepare("INSERT INTO login_attempts (email, ip_address, attempt_time) VALUES (?, ?, NOW())");
            $stmt->bind_param("ss", $email, $ip_address);
            $stmt->execute();

            $error_message = "Email atau password tidak valid.";
        }
    }
}

// Refresh CAPTCHA if there is an error
if (!empty($error_message)) {
    $_SESSION['captcha_code'] = rand(1000, 9999); // Regenerate CAPTCHA
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pempek Palembang Umi Rita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;700&family=Great+Vibes&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <div class="text-center mb- 8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang</h1>
            <p class="text-gray-600 mb-2">Masuk ke akun Anda</p>
        </div>

        <!-- Pesan Error -->
        <?php if (!empty($error_message)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($error_message) ?>
            </div>
        <?php endif; ?>

        <!-- Form Login -->
        <form method="POST" class="space-y-6">
    <div>
        <label class="block text-gray-700 mb-2">Email</label>
        <input
            type="email"
            name="email"
            value="<?= htmlspecialchars($email) ?>"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-orange-500"
        />
    </div>

    <div class="relative">
        <label class="block text-gray-700 mb-2">Password</label>
        <input
            type="password"
            name="password"
            id="password"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-orange-500"
        />
        <span
            id="toggle-password"
            class="absolute right-3 top-10 transform text-gray-500 hover:text-gray-700"
        >
            <i class="fas fa-eye"></i>
        </span>
    </div>

    <div>
        <label class="block text-gray-700 mb-2">Captcha</label>
        <div class="flex items-center">
            <img src="captcha.php" alt="CAPTCHA" class="mr-4 border rounded">
            <input
                type="text"
                name="captcha_code"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-orange-500"
                placeholder="Masukkan kode"
            />
        </div>
    </div>

    <button
        type="submit"
        class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-600 transition-colors"
    >
        Masuk
    </button>
</form>

<p class="mt-8 text-center text-gray-600">
    Belum punya akun?
    <a href="register.php" class="text-orange-500 hover:text-orange-600">Daftar sekarang</a>
</p>

<script>
    // Toggle password visibility
    document.getElementById('toggle-password').addEventListener('click', function() {
        var passwordInput = document.getElementById('password');
        var type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;
        
        // Change icon to fa-eye-slash when password is visible
        this.innerHTML = passwordInput.type === 'password' ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
    });
</script>


</body>
</html>