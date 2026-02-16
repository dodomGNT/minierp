<?php require_once('../guest_check.php'); ?>
<?php include_once('actions.php'); ?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password - Gemini Dash</title>
        <link rel="icon" type="image/png" href="../assets/images/favicon.png">
        <link rel="stylesheet" href="../assets/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/bootstrap-icons.min.css">
        <script src="../assets/sweetalert2@11.js"></script>
        <link rel="stylesheet" href="custom.css">
    </head>
    <body>
        <div class="login-card">
            <div class="text-center mb-4">
                <h1 class="fw-bold text-info"><i class="bi bi-key me-2"></i>Forgot Password</h1>
                <p class="text-secondary small">Masukkan email Anda untuk menerima instruksi reset password.</p>
            </div>
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <form method="POST" action="proses-forgot.php">
                        <div class="mb-3">
                            <label class="form-label small text-secondary">Alamat Email Terdaftar</label>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small text-secondary">Verifikasi Keamanan</label>
                            <div class="d-flex align-items-center gap-3">
                                <div class="captcha-box">
                                    <?php echo $_SESSION['forgot_captcha_a'] . " + " . $_SESSION['forgot_captcha_b']; ?>
                                </div>
                                <input type="number" name="captcha_input" class="form-control text-center" placeholder="?" required style="max-width: 80px;">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold mb-3">Kirim Instruksi</button>
                        <div class="text-center">
                            <a href="../login" class="text-info custom-link fw-bold"><i class="bi bi-arrow-left me-1"></i> Kembali ke Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="../assets/bootstrap.bundle.min.js"></script>
    </body>
</html>