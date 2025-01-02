document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault();

  // Ambil elemen input
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  const errorMessageDiv = document.getElementById("error-message");

  // Ambil nilai input
  const email = emailInput.value.trim();
  const password = passwordInput.value.trim();
  const captcha = document.getElementById("captcha").value.trim();

  // Validasi input di klien
  if (!email) {
      errorMessageDiv.innerHTML = "Email tidak boleh kosong.";
      errorMessageDiv.classList.remove("hidden");
      return;
  }

  if (!password) {
      errorMessageDiv.innerHTML = "Password tidak boleh kosong.";
      errorMessageDiv.classList.remove("hidden");
      return;
  }

  if (!captcha) {
    errorMessageDiv.innerHTML = "Captcha harus diisi.";
    errorMessageDiv.classList.remove("hidden");
    return;
  }

  // Format email
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
      errorMessageDiv.innerHTML = "Format email tidak valid.";
      errorMessageDiv.classList.remove("hidden");
      return;
  }

  const formData = new FormData(this);
  
  // Kirim data ke login.php
  fetch("login.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}&captcha_code=${encodeURIComponent(captcha)}`,
})
    .then((response) => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then((data) => {
        if (data.status === "success") {
            localStorage.setItem("isLoggedIn", "true");
            localStorage.setItem("userData", JSON.stringify(data.user));

            window.location.href = "index.html"; // Redirect setelah login
        } else {
            // Periksa apakah perlu refresh karena CAPTCHA salah
            if (data.refresh) {
                alert(data.message); // Beritahu pengguna bahwa CAPTCHA salah
                window.location.reload(); // Refresh halaman
            } else {
                errorMessageDiv.innerHTML = data.message || "Terjadi kesalahan.";
                errorMessageDiv.classList.remove("hidden");
            }
        }
    })
    .catch((error) => {
        console.error("Error:", error);
        errorMessageDiv.innerHTML = "Terjadi kesalahan, periksa koneksi.";
        errorMessageDiv.classList.remove("hidden");
    });
});
// Fungsi untuk menampilkan data pengguna setelah login
function displayUserData() {
  const userData = JSON.parse(localStorage.getItem("userData"));
  if (userData) {
      document.getElementById("username-display").innerText = userData.nama_lengkap;
      document.getElementById("user-email").innerText = userData.email;

      // Tampilkan menu pengguna
      document.getElementById("user-menu").classList.remove("hidden");
  }
};
