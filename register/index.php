<?php require_once('../guest_check.php'); ?>
<?php include_once('actions.php'); ?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Akun - Gemini Dash</title>
        <link rel="stylesheet" href="../assets/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/bootstrap-icons.min.css">
        <link rel="stylesheet" href="custom.css">
    </head>
    <body>
        <div class="login-card">
            <div class="text-center mb-4">
                <h1 class="fw-bold text-info"><i class="bi bi-person-plus me-2"></i>GEMINI-DASH</h1>
                <p class="text-secondary">Buat akun baru Anda</p>
            </div>
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <form method="POST" action="proses-register.php" id="registerForm">
                        <div class="mb-3">
                            <label class="form-label small text-secondary">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small text-secondary">Alamat Email</label>
                            <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small text-secondary">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="password" placeholder="••••••••" required>
                                <button class="btn btn-outline-secondary border-secondary" type="button" onclick="togglePassword('password', 'eyePassword')">
                                    <i class="bi bi-eye" id="eyePassword"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small text-secondary">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="••••••••" required>
                                <button class="btn btn-outline-secondary border-secondary" type="button" onclick="togglePassword('confirm_password', 'eyeConfirm')">
                                    <i class="bi bi-eye" id="eyeConfirm"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small text-secondary">Verifikasi Keamanan</label>
                            <div class="d-flex align-items-center gap-3">
                                <div class="captcha-box">
                                    <?php echo $_SESSION['reg_captcha_a'] . " + " . $_SESSION['reg_captcha_b']; ?>
                                </div>
                                <input type="number" name="captcha_input" class="form-control text-center" placeholder="?" required style="max-width: 80px;">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold mb-3">Daftar Sekarang</button>
                        <div class="text-center">
                            <span class="small text-secondary">Sudah punya akun?</span> 
                            <a href="../login" class="text-info custom-link fw-bold">Login di sini</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="index.js"></script>
    </body>
</html>