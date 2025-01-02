document.addEventListener("DOMContentLoaded", function () {
    const isLoggedIn = localStorage.getItem("isLoggedIn");
    if (isLoggedIn === "true") {
        // Ambil data pengguna
        const userData = JSON.parse(localStorage.getItem("userData"));
        if (userData) {
            // Tampilkan nama dan email
            document.getElementById("username-display").innerText = userData.nama_lengkap;
            document.getElementById("user-email").innerText = userData.email;

            // Tampilkan menu pengguna
            document.getElementById("user-menu").classList.remove("hidden");
        }
    } else {
        // Redirect ke halaman login jika belum login
        window.location.href = "login.html";
    }
});
