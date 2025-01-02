function loadCartItems() {
    const cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    const cartContainer = document.getElementById("cart-items");
    let total = 0;
  
    // Kosongkan kontainer keranjang
    cartContainer.innerHTML = "";
  
    // Iterasi melalui item di keranjang
    cartItems.forEach((item, index) => {
      // Buat elemen baru untuk setiap item
      const itemElement = document.createElement("div");
      itemElement.className =
        "flex items-center border-b pb-4 mb-4";
  
      // Hitung subtotal untuk item ini
      const subtotal = item.price * item.quantity;
      total += subtotal;
  
      // Isi elemen item dengan HTML
      itemElement.innerHTML = `
        <img src="${item.image}" alt="${item.name}" class="mr-4 w-[100px] h-[100px] object-cover rounded-lg" />
        <div class="flex-grow">
          <h3 class="text-lg font-semibold">${item.name}</h3>
          ${
            item.description
              ? `<p class="text-sm text-muted-foreground">${item.description}</p>`
              : ""
          }
        </div>
        <div class="text-right">
          <p class="text-lg font-semibold">Rp ${item.price.toLocaleString(
            "id-ID"
          )}</p>
          <p class="text-sm">Quantity: ${item.quantity}</p>
          <p class="text-lg font-semibold">Subtotal: Rp ${subtotal.toLocaleString(
            "id-ID"
          )}</p>
        </div>
      `;
      cartContainer.appendChild(itemElement);
    });
  
    // Tambahkan elemen total biaya
    const totalElement = document.createElement("div");
    totalElement.className = "mt-4";
    totalElement.innerHTML = `
      <h3 class="text-lg font-semibold">Total Biaya</h3>
      <p class="text-lg font-semibold">Rp ${total.toLocaleString("id-ID")}</p>
    `;
    cartContainer.appendChild(totalElement);
  }
  