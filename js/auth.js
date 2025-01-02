// Fungsi untuk mengecek status login
function checkLoginStatus() {
  const isLoggedIn = localStorage.getItem("isLoggedIn");
  const userData = JSON.parse(localStorage.getItem("userData"));

  const guestMenu = document.getElementById("guest-menu");
  const userMenu = document.getElementById("user-menu");

  // Sembunyikan kedua menu saat pertama kali dimuat
  guestMenu.classList.add("hidden");
  userMenu.classList.add("hidden");

  if (isLoggedIn && userData) {
    // Update informasi user saja, tapi tetap hidden
    document.getElementById("username-display").textContent = userData.name;
    document.getElementById("user-email").textContent = userData.email;
  }
}

// Toggle menu user
function toggleUserMenu() {
  const isLoggedIn = localStorage.getItem("isLoggedIn");
  const guestMenu = document.getElementById("guest-menu");
  const userMenu = document.getElementById("user-menu");

  // Hanya toggle menu yang sesuai dengan status login
  if (isLoggedIn === "true") {
    guestMenu.classList.add("hidden");
    userMenu.classList.toggle("hidden");
  } else {
    userMenu.classList.add("hidden");
    guestMenu.classList.toggle("hidden");
  }
}

// Fungsi logout
function logout() {
  localStorage.removeItem("isLoggedIn");
  localStorage.removeItem("userData");
  window.location.href = "index.html";
}

// Tutup menu ketika klik di luar
document.addEventListener("click", function (event) {
  const userMenu = document.getElementById("user-menu");
  const guestMenu = document.getElementById("guest-menu");
  const userButton = event.target.closest("button");

  if (
    !userButton &&
    !event.target.closest("#user-menu") &&
    !event.target.closest("#guest-menu")
  ) {
    userMenu.classList.add("hidden");
    guestMenu.classList.add("hidden");
  }
});

// Jalankan pengecekan status login saat halaman dimuat
document.addEventListener("DOMContentLoaded", checkLoginStatus);
