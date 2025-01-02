<?php
// Start session for error handling
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "pempek_db");

// Check connection
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Initialize variables
$nama_lengkap = $email = $password = $konfirmasi_password = $no_hp = $tanggal_lahir = $alamat = "";
$errors = [];

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get data from the form
    $nama_lengkap = trim($_POST['nama_lengkap']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $konfirmasi_password = trim($_POST['konfirmasi_password']);
    $no_hp = trim($_POST['no_hp']);
    $tanggal_lahir = trim($_POST['tanggal_lahir']);
    $alamat = trim($_POST['alamat']);

    // Validate data
    if ($password !== $konfirmasi_password) {
        $errors[] = "Password dan konfirmasi password tidak cocok.";
    }

    // Validate for at least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Password harus mengandung minimal satu huruf besar.";
    }

    // Check if email is already used
    $sql_check_email = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql_check_email);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $errors[] = "Email sudah digunakan.";
    }

    $stmt->close();

    // If there are errors, store them in session and redirect back
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: register.php");
        exit();
    }

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Save data to the database
    $stmt = $conn->prepare("INSERT INTO users (nama_lengkap, email, password, no_hp, tanggal_lahir, alamat) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nama_lengkap, $email, $password_hash, $no_hp, $tanggal_lahir, $alamat);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['errors'] = ["Terjadi kesalahan saat menyimpan data: " . $stmt->error];
        header("Location: register.php");
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar - Pempek Palembang Umi Rita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;700&family=Great+Vibes&display=swap" rel="stylesheet" />
</head>
<body class="bg-gray-100 min-h-screen py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Daftar Akun Baru</h1>
                <p class="text-gray-600">Bergabunglah dengan Pempek Palembang Umi Rita</p>
            </div>

            <!-- Display error messages -->
            <?php if (isset($_SESSION['errors'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline"><?php echo implode('<br>', $_SESSION['errors']); ?></span>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php endif; ?>

            <form id="registerForm" class="space-y-6" action="register.php" method="POST">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-orange-500" name="nama_lengkap" />
                        <small id="name_error" class="text-red-500"></small>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-orange-500" name="email" />
                        <small id="email_error" class="text-red-500"></small>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <input type="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-orange-500" name="password" />
                            <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2" id="togglePassword">
                                <i class="fas fa-eye-slash text-gray-500"></i>
                            </button>
                        </div>
                        <small id="pass_error" class="text-red-500"></small>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Konfirmasi Password</label>
                        <div class="relative">
                            <input type="password" id="confirm_password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-orange-500" name="konfirmasi_password" />
                            <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2" id="toggleConfirmPassword">
                                <i class="fas fa-eye-slash text-gray-500"></i>
                            </button>
                        </div>
                        <small id="confirm_pass_error" class="text-red-500"></small>
                    </div>

                    <div>
                        <label for="phone" class="block text-gray-700 mb-2">No. Handphone</label>
                        <input type="tel" id="phone" name="no_hp" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-orange-500" />
                        <span id="phone_error" class="text-red-500 text-sm"></span>
                    </div>

                    <div>
                        <label for="birthdate" class="block text-gray-700 mb-2">Tanggal Lahir</label>
                        <input type="date" id="birthdate" name="tanggal_lahir" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-orange-500" />
                        <span id="birthdate_error" class="text-red-500 text-sm"></span>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Alamat Lengkap</label>
                    <textarea class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-orange-500" rows="3" name="alamat"></textarea>
                </div>

                <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-600 transition-colors">Daftar Sekarang</button>
            </form>

            <p class="mt-8 text-center text-gray-600">
                Sudah punya akun?
                <a href="login.php" class="text-orange-500 hover:text-orange-600">Masuk di sini</a>
            </p>
        </div>
    </div>
    <script src="js/register.js"></script>
    <script>
        const form = document.getElementById("registerForm");
        const name = document.getElementById("name");
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("confirm_password");
        const birthdate = document.getElementById("birthdate");
        const phone = document.getElementById("phone");

        const name_error = document.getElementById("name_error");
        const email_error = document.getElementById("email_error");
        const pass_error = document.getElementById("pass_error");
        const confirm_pass_error = document.getElementById("confirm_pass_error");
        const birthdate_error = document.getElementById("birthdate_error");
        const phone_error = document.getElementById("phone_error");

        let isEmailValid = false;

        // Toggle password visibility
        const togglePassword = document.getElementById("togglePassword");
        const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");

        togglePassword.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            const icon = this.querySelector("i");
            icon.classList.toggle("fa-eye");
            icon.classList.toggle("fa-eye-slash");
        });

        toggleConfirmPassword.addEventListener("click", function () {
            const type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
            confirmPassword.setAttribute("type", type);
            const icon = this.querySelector("i");
            icon.classList.toggle("fa-eye");
            icon.classList.toggle("fa-eye-slash");
        });

        // Function to show error messages
        function showError(input, errorElement, message) {
            if (message) {
                errorElement.textContent = message;
                input.classList.add("error");
            } else {
                errorElement.textContent = "";
                input.classList.remove("error");
            }
        }

        // Function to check duplicate email
        document.getElementById("email").addEventListener("input", () => {
            const emailInput = document.getElementById("email");
            const emailError = document.getElementById("email_error");
            emailError.textContent = "";

            if (emailInput.value.trim() === "") return;

            fetch("check_email.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: `email=${encodeURIComponent(emailInput.value)}`,
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.exists) {
                    emailError.textContent = "Alamat email sudah digunakan.";
                    isEmailValid = false;
                } else {
                    emailError.textContent = "";
                    isEmailValid = true;
                }
            })
            .catch((error) => {
                console.error("Terjadi kesalahan:", error);
            });
        });

        // Function to validate birthdate
        function validateBirthdate(date) {
            const today = new Date();
            const birthdate = new Date(date);
            if (!date) return "Tanggal lahir wajib diisi.";
            if (birthdate > today) return "Tanggal lahir tidak boleh di masa depan.";
            const age = today.getFullYear() - birthdate.getFullYear();
            const monthDiff = today.getMonth() - birthdate.getMonth();
            const dayDiff = today.getDate() - birthdate.getDate();
            if (age < 16 || (age === 16 && (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)))) {
                return "Anda harus berusia minimal 16 tahun.";
            }
            return "";
        }

        // Function to validate phone number
        function validatePhone(phone) {
            if (phone.trim() === "") return "Nomor telepon wajib diisi.";
            if (!/^\d+$/.test(phone)) return "Nomor telepon hanya boleh mengandung angka.";
            if (phone.length < 10 || phone.length > 12) return "Nomor telepon harus 10-12 digit.";
            return "";
        }

        // Email format validation
        const email_check = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

        // Event listener for form submission
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            let isFormValid = true;

            // Full Name Validation
            if (name.value.trim() === "") {
                showError(name, name_error, "Nama lengkap wajib diisi.");
                isFormValid = false;
            } else {
                showError(name, name_error, "");
            }

            // Email Validation
            if (!email_check.test(email.value.trim())) {
                showError(email, email_error , "Masukkan email yang valid.");
                isFormValid = false;
            } else if (!isEmailValid) {
                showError(email, email_error, "Email sudah digunakan.");
                isFormValid = false;
            } else {
                showError(email, email_error, "");
            }

            // Password Validation
            if (password.value.trim() === "") {
                showError(password, pass_error, "Password wajib diisi");
                isFormValid = false;
            } else if (password.value.length < 6) {
                showError(password, pass_error, "Password harus lebih dari 6 karakter.");
                isFormValid = false;
            } else if (password.value.length > 16) {
                showError(password, pass_error, "Password tidak boleh lebih dari 16 karakter.");
                isFormValid = false;
            } else if (password.value.toLowerCase() === "password") {
                showError(password, pass_error, 'Password tidak boleh "password".');
                isFormValid = false;
            } else if (!/[A-Z]/.test(password.value)) {
                showError(password, pass_error, "Password harus mengandung huruf besar.");
                isFormValid = false;
            } else {
                showError(password, pass_error, "");
            }

            // Confirm Password Validation
            if (password.value !== confirmPassword.value) {
                showError(confirmPassword, confirm_pass_error, "Konfirmasi password tidak sesuai.");
                isFormValid = false;
            } else {
                showError(confirmPassword, confirm_pass_error, "");
            }

            // Validate birthdate
            const birthdateError = validateBirthdate(birthdate.value);
            showError(birthdate, birthdate_error, birthdateError);
            if (birthdateError) isFormValid = false;

            // Validate phone number
            const phoneError = validatePhone(phone.value);
            showError(phone, phone_error, phoneError);
            if (phoneError) isFormValid = false;

            // Submit form if validation is successful
            if (isFormValid && isEmailValid) {
                form.submit();
            }
        });
    </script>
</body>
</html>