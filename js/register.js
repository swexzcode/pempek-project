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
  const type =
    password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);

  // Ganti icon
  const icon = this.querySelector("i");
  icon.classList.toggle("fa-eye");
  icon.classList.toggle("fa-eye-slash");
});

toggleConfirmPassword.addEventListener("click", function () {
  const type =
    confirmPassword.getAttribute("type") === "password" ? "text" : "password";
  confirmPassword.setAttribute("type", type);

  // Ganti icon
  const icon = this.querySelector("i");
  icon.classList.toggle("fa-eye");
  icon.classList.toggle("fa-eye-slash");
});

// Fungsi untuk menampilkan pesan kesalahan
function showError(input, errorElement, message) {
  if (message) {
    errorElement.textContent = message;
    input.classList.add("error");
  } else {
    errorElement.textContent = "";
    input.classList.remove("error");
  }
}

// Fungsi untuk memeriksa email duplikat
document.getElementById("email").addEventListener("input", () => {
  const emailInput = document.getElementById("email");
  const emailError = document.getElementById("email_error");

  // Reset error message
  emailError.textContent = "";

  if (emailInput.value.trim() === "") return;

  // Kirim permintaan ke server untuk memeriksa email
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

// Fungsi untuk validasi tanggal lahir
function validateBirthdate(date) {
  const today = new Date();
  const birthdate = new Date(date);

  if (!date) return "Tanggal lahir wajib diisi.";
  if (birthdate > today) return "Tanggal lahir tidak boleh di masa depan.";

  const age = today.getFullYear() - birthdate.getFullYear();
  const monthDiff = today.getMonth() - birthdate.getMonth();
  const dayDiff = today.getDate() - birthdate.getDate();

  if (
    age < 16 ||
    (age === 16 && (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)))
  ) {
    return "Anda harus berusia minimal 16 tahun.";
  }
  return "";
}

// Fungsi untuk validasi nomor telepon
function validatePhone(phone) {
  if (phone.trim() === "") return "Nomor telepon wajib diisi.";
  if (!/^\d+$/.test(phone))
    return "Nomor telepon hanya boleh mengandung angka.";
  if (phone.length < 10 || phone.length > 12)
    return "Nomor telepon harus 10-12 digit.";
  return "";
}

// Fungsi untuk validasi format email
const email_check = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

// Event listener untuk submit
form.addEventListener("submit", async (e) => {
  e.preventDefault();

  let isFormValid = true;

  // Nama Lengkap Validation
  if (name.value.trim() === "") {
    showError(name, name_error, "Nama lengkap wajib diisi.");
    isFormValid = false;
  } else {
    showError(name, name_error, "");
  }

  // Email Validation
  if (!email_check.test(email.value.trim())) {
    showError(email, email_error, "Masukkan email yang valid.");
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
    showError(
      password,
      pass_error,
      "Password tidak boleh lebih dari 16 karakter."
    );
    isFormValid = false;
  } else if (password.value.toLowerCase() === "password") {
    showError(password, pass_error, 'Password tidak boleh "password".');
    isFormValid = false;
  } else if (!/[A-Z]/.test(password.value)) {
    showError(password, pass_error, "Password harus mengandung huruf besar.");
    isFormValid = false;
  } else if (
    !/[A-Za-z]/.test(password.value) &&
    !/\d/.test(password.value) &&
    !/[!@#$%^&*(),.?":{}|<>]/.test(password.value)
  ) {
    showError(
      password,
      pass_error,
      "Password harus mengandung angka, huruf, dan simbol."
    );
    isFormValid = false;
  } else if (!/[A-Za-z]/.test(password.value)) {
    showError(
      password,
      pass_error,
      "Password harus mengandung huruf dan simbol."
    );
    isFormValid = false;
  } else if (!/\d/.test(password.value)) {
    showError(
      password,
      pass_error,
      "Password harus mengandung angka dan simbol."
    );
    isFormValid = false;
  } else if (!/[!@#$%^&*(),.?":{}|<>]/.test(password.value)) {
    showError(
      password,
      pass_error,
      "Password setidaknya harus mengandung simbol."
    );
    isFormValid = false;
  } else {
    showError(password, pass_error, "");
  }

  // Confirm Password Validation
  if (password.value !== confirmPassword.value) {
    showError(
      confirmPassword,
      confirm_pass_error,
      "Konfirmasi password tidak sesuai."
    );
    isFormValid = false;
  } else {
    showError(confirmPassword, confirm_pass_error, "");
  }

  // Validasi tanggal lahir
  const birthdateError = validateBirthdate(birthdate.value);
  showError(birthdate, birthdate_error, birthdateError);
  if (birthdateError) isFormValid = false;

  // Validasi nomor telepon
  const phoneError = validatePhone(phone.value);
  showError(phone, phone_error, phoneError);
  if (phoneError) isFormValid = false;

  // Submit form jika validasi berhasil
  if (isFormValid && isEmailValid) {
    form.submit();
  }
});
