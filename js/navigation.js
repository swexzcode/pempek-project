// Aktifkan tombol filter berdasarkan halaman aktif
document.addEventListener("DOMContentLoaded", () => {
  const currentPath = window.location.pathname;

  document.querySelectorAll(".filter-btn").forEach((btn) => {
    const btnPath = new URL(btn.getAttribute("href"), window.location.href)
      .pathname;
    if (currentPath === btnPath) {
      btn.classList.remove("bg-gray-200");
      btn.classList.add("bg-orange-500", "text-white");
    } else {
      btn.classList.remove("bg-orange-500", "text-white");
      btn.classList.add("bg-gray-200");
    }
  });
});
