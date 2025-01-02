/**
 * Fungsi-fungsi untuk menampilkan isi keranjang
 */

// Fungsi untuk memuat dan menampilkan isi keranjang
// Fungsi untuk checkout

function loadCartItems() {
  const cartItems = JSON.parse(localStorage.getItem("cart")) || [];
  const cartContainer = document.getElementById("cart-items");
  let total = 0;

  cartContainer.innerHTML = "";

  cartItems.forEach((item, index) => {
    const itemElement = document.createElement("div");
    itemElement.className =
      "flex items-center bg-gray-50 rounded-xl p-3 mb-3 hover:bg-gray-100/80 transition-colors duration-200";

    // Hitung subtotal untuk item ini
    const subtotal = item.price * item.quantity;
    total += subtotal;

    itemElement.innerHTML = `
      <div class="flex items-center w-full">
        <input type="checkbox" class="cart-item-checkbox w-4 h-4 rounded-lg border-gray-300 text-orange-500 focus:ring-orange-500" data-index="${index}">
        <div class="ml-3 w-[60px] h-[60px] rounded-lg overflow-hidden flex-shrink-0 border border-gray-200">
          <img src="${item.image}" alt="${
      item.name
    }" class="w-full h-full object-cover">
        </div>
        <div class="ml-3 flex-grow">
          <h3 class="font-medium text-gray-800 text-sm line-clamp-1">${
            item.name
          }</h3>
          <p class="text-sm text-gray-500 mt-0.5">Rp ${item.price.toLocaleString(
            "id-ID"
          )}</p>
          <div class="flex items-center mt-2">
            <button onclick="updateCartQuantity(${index}, -1)" class="w-6 h-6 flex items-center justify-center bg-white border border-gray-200 rounded-md text-gray-600 hover:bg-gray-50">
              <i class="fas fa-minus text-xs"></i>
            </button>
            <span class="mx-2 text-sm font-medium text-gray-800 w-5 text-center">${
              item.quantity
            }</span>
            <button onclick="updateCartQuantity(${index}, 1)" class="w-6 h-6 flex items-center justify-center bg-white border border-gray-200 rounded-md text-gray-600 hover:bg-gray-50">
              <i class="fas fa-plus text-xs"></i>
            </button>
          </div>
          <p class="text-sm text-orange-500 mt-1">Subtotal: Rp ${subtotal.toLocaleString(
            "id-ID"
          )}</p>
        </div>
      </div>
    `;

    cartContainer.appendChild(itemElement);
  });
  
  // Update total pembayaran
  const totalElement = document.getElementById("cart-total");
  if (totalElement) {
    totalElement.textContent = `Rp ${total.toLocaleString("id-ID")}`;
  }

  // Tampilkan pesan jika keranjang kosong
  if (cartItems.length === 0) {
    cartContainer.innerHTML = `
      <div class="flex flex-col items-center justify-center py-8 text-gray-500">
        <i class="fas fa-shopping-cart text-4xl mb-3"></i>
        <p class="text-sm">Keranjang belanja Anda masih kosong</p>
      </div>
    `;
  }
}

// Fungsi untuk toggle tampilan keranjang
function toggleCart() {
  const cartPopup = document.getElementById("cart-popup");
  if (cartPopup) {
    cartPopup.classList.toggle("translate-x-full");
    // Load items ketika keranjang dibuka
    if (!cartPopup.classList.contains("translate-x-full")) {
      loadCartItems();
    }
  }
}

// Panggil fungsi saat halaman dimuat
document.addEventListener("DOMContentLoaded", () => {
  // Update cart counter
  updateCartCounter();

  // Load cart items jika keranjang sedang terbuka
  const cartPopup = document.getElementById("cart-popup");
  if (cartPopup && !cartPopup.classList.contains("translate-x-full")) {
    loadCartItems();
  }
});

/**
 * Fungsi-fungsi terkait keranjang belanja
 */

// Update jumlah item di keranjang
function updateCartCounter() {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  const cartCounter = document.getElementById("cart-counter");

  if (cartCounter) {
    // Hitung jumlah item (bukan total quantity)
    const totalItems = cart.length;
    cartCounter.textContent = totalItems;
    cartCounter.style.display = totalItems > 0 ? "flex" : "none";
  }
}

// Fungsi untuk menambahkan item ke keranjang
function addToCart(btn) {
  const productDiv = btn.closest(".product-item");
  const priceText = productDiv.querySelector(".text-orange-500").textContent;
  const price = parseInt(priceText.replace(/[^0-9]/g, ""));

  const productData = {
    name: productDiv.querySelector("h3").textContent,
    price: price,
    quantity: parseInt(productDiv.querySelector(".quantity-input").value),
    image: productDiv.querySelector("img").src,
  };

  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  cart.push(productData);
  localStorage.setItem("cart", JSON.stringify(cart));

  // Update counter setelah menambah item
  updateCartCounter();

}

// Fungsi untuk update quantity di keranjang
function updateCartQuantity(index, change) {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  if (cart[index].quantity + change > 0) {
    cart[index].quantity += change;
    localStorage.setItem("cart", JSON.stringify(cart));
    loadCartItems();
    // Update counter setelah mengubah quantity
    updateCartCounter();
  }
}

// Fungsi untuk menghapus item terpilih
function deleteSelectedItems() {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  const checkboxes = document.querySelectorAll(".cart-item-checkbox:checked");
  const indicesToRemove = Array.from(checkboxes)
    .map((checkbox) => parseInt(checkbox.dataset.index))
    .sort((a, b) => b - a);

  indicesToRemove.forEach((index) => {
    cart.splice(index, 1);
  });

  localStorage.setItem("cart", JSON.stringify(cart));
  loadCartItems();
  // Update counter setelah menghapus item
  updateCartCounter();
}
// Initialize saat halaman dimuat
document.addEventListener("DOMContentLoaded", () => {
  // Update counter saat halaman dimuat
  updateCartCounter();

  // Load cart items jika keranjang sedang terbuka
  const cartPopup = document.getElementById("cart-popup");
  if (cartPopup && !cartPopup.classList.contains("translate-x-full")) {
    loadCartItems();
  }
});
