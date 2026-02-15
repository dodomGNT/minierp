function toggleSidebar() {
            document.getElementById('sidebarMain').classList.toggle('show');
        }

        document.querySelector('#logoutBtn').addEventListener('click', function(e) {
    e.preventDefault();

    // 1. Popup Konfirmasi
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Sesi Anda akan diakhiri dan Anda harus login kembali.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#333',
        confirmButtonText: 'Ya, Logout!',
        cancelButtonText: 'Batal',
        background: '#1a1a1a',
        color: '#fff'
    }).then((result) => {
        if (result.isConfirmed) {
            
            // 2. Popup Loading
            Swal.fire({
                title: 'Sedang keluar...',
                text: 'Mohon tunggu sejenak',
                allowOutsideClick: false,
                showConfirmButton: false,
                background: '#1a1a1a',
                color: '#fff',
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // 3. Jeda sedikit untuk efek "Premium" lalu pindah ke file logout
            setTimeout(() => {
                window.location.href = '../logout/';
            }, 1200); 
        }
    });
});