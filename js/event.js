function toggleUserMenu() {
    const guestMenu = document.getElementById('guest-menu');
    const userMenu = document.getElementById('user-menu');
    const userMenuButton = document.getElementById('user-menu-button');


    // Toggle visibility of the guest menu and user menu
    if (guestMenu) {
        guestMenu.classList.toggle('hidden');
    }
    if (userMenu) {
        userMenu.classList.toggle('hidden');
    }
}
