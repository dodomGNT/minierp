<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modern Dark Dashboard - Bootstrap 5.3</title>
        <link rel="icon" type="image/png" href="../assets/images/favicon.png">
        <link rel="stylesheet" href="../assets/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/bootstrap-icons.min.css">
        <script src="../assets/sweetalert2@11.js"></script>
        <link rel="stylesheet" href="custom.css">
    </head>
    <body class="p-4 bg-dark text-white">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <div class="card border-info bg-dark shadow-lg p-4">
                        <div class="card-body">
                            <h2 class="text-info mb-4"><i class="bi bi-broadcast"></i> Scan Kartu RFID</h2>
                            
                            <div class="mb-4">
                                <div class="spinner-grow text-info" role="status" style="width: 3rem; height: 3rem;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>

                            <p class="lead">Silahkan tap kartu Anda pada alat reader</p>

                            <form id="formRFID">
                                <input type="text" id="rfid_uid" name="rfid_uid" 
                                    class="form-control bg-dark text-dark border-0" 
                                    style="caret-color: transparent; outline: none;" 
                                    autofocus autocomplete="off">
                            </form>

                            <div id="status_message" class="mt-3 text-secondary small">
                                Menunggu scan...
                            </div>
                        </div>
                    </div>
                    <a href="dashboard.php" class="btn btn-link text-secondary mt-3 text-decoration-none">
                        <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>

        <script src="../assets/sweetalert2@11.js"></script>
        <script>
            const inputRfid = document.getElementById('rfid_uid');
            const statusMsg = document.getElementById('status_message');

            // Pastikan input selalu fokus agar kartu bisa terbaca kapan saja
            document.addEventListener('click', () => inputRfid.focus());

            document.getElementById('formRFID').addEventListener('submit', function(e) {
                e.preventDefault();
                const uid = inputRfid.value;

                if(uid) {
                    statusMsg.innerText = "Memproses UID: " + uid;

                    // Kirim ke PHP untuk cek ke database
                    fetch('prosesscanrfid.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: 'uid=' + uid
                    })
                    .then(res => res.json())
                    .then(data => {
                        if(data.status === 'success') {
                            Swal.fire({
                                title: 'Akses Diterima!',
                                text: 'Selamat datang, ' + data.message,
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                title: 'Ditolak!',
                                text: data.message,
                                icon: 'error',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                        // Reset input untuk scan berikutnya
                        inputRfid.value = '';
                        statusMsg.innerText = "Menunggu scan...";
                    });
                }
            });
        </script>
    </body>
</html>