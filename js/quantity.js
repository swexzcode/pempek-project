// Update kuantitas produk
function updateQuantity(btn, change) {
  const input = btn.parentElement.querySelector(".quantity-input");
  let value = parseInt(input.value) + change;
  if (value < 1) value = 1;
  input.value = value;
}

// Update kuantitas di keranjang
function updateCartQuantity(index, change) {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];

  if (cart[index]) {
    const newQuantity = cart[index].quantity + change;

    if (newQuantity > 0) {
      cart[index].quantity = newQuantity;
      localStorage.setItem("cart", JSON.stringify(cart));

      // Reload tampilan keranjang untuk update total
      loadCartItems();
    } else if (newQuantity === 0) {
      // Hapus item jika quantity 0
      cart.splice(index, 1);
      localStorage.setItem("cart", JSON.stringify(cart));

      // Update tampilan
      loadCartItems();
      updateCartCounter();
    }
  }
}
