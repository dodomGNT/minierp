document.addEventListener('DOMContentLoaded', function () {
    // 1. Fungsi Toggle Show/Hide Password
    const togglePassword = document.querySelector('#togglePassword');
    if (togglePassword) {
        togglePassword.addEventListener('click', function () {
            const password = document.querySelector('#password');
            const eyeIcon = document.querySelector('#eyeIcon');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            eyeIcon.classList.toggle('bi-eye');
            eyeIcon.classList.toggle('bi-eye-slash');
        });
    }

    // 2. Fungsi AJAX Login
    const loginForm = document.querySelector('#loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            Swal.fire({
                title: 'Memverifikasi...',
                text: 'Mohon tunggu sejenak',
                allowOutsideClick: false,
                showConfirmButton: false,
                background: '#383737',
                color: '#fff',
                didOpen: () => { Swal.showLoading(); }
            });

            fetch(window.location.href, {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                setTimeout(() => {
                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message,
                            timer: 1500,
                            showConfirmButton: false,
                            background: '#383737',
                            color: '#fff'
                        }).then(() => window.location.href = '../dashboard');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Akses Ditolak',
                            text: data.message,
                            background: '#383737',
                            color: '#fff'
                        });
                        // Update captcha
                        document.querySelector('#captchaValue').innerText = data.new_captcha;
                        document.querySelector('input[name="captcha_input"]').value = '';
                    }
                }, 1000);
            })
            .catch(error => {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Koneksi terputus.', background: '#383737', color: '#fff' });
            });
        });
    }

    // 3. Cek Status Logout (SweetAlert Logout Berhasil)
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('status') === 'logged_out') {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Keluar',
            text: 'Sesi Anda telah berakhir dengan aman.',
            timer: 2000,
            showConfirmButton: false,
            background: '#383737',
            color: '#fff'
        });
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    if (urlParams.get('status') === 'security_alert') {
        Swal.fire({
            icon: 'warning',
            title: 'Sesi Tidak Aman',
            text: 'Terdeteksi perubahan perangkat atau browser. Silakan login kembali.',
            background: '#383737',
            color: '#fff'
        });
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});