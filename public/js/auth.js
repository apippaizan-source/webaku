function switchMode(targetUrl) {
    const authBox = document.getElementById('authBox');
    
    // 1. Jalankan animasi geser (tambah/hapus class active)
    authBox.classList.toggle('active');
    
    // 2. Tahan perpindahan halaman selama 600ms (0.6 detik)
    // Sesuai dengan durasi transition di CSS
    setTimeout(() => {
        window.location.href = targetUrl;
    }, 600);
}