<?php require_once('../guest_check.php'); ?>
<?php include_once('actions.php'); ?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Password - Gemini Dash</title>
        <link rel="icon" type="image/png" href="../assets/images/favicon.png">
        <link rel="stylesheet" href="../assets/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/bootstrap-icons.min.css">
        <link rel="stylesheet" href="custom.css">
    </head>
    <body>
        <div class="login-card">
            <div class="text-center mb-4">
                <h1 class="fw-bold text-info"><i class="bi bi-shield-check me-2"></i>NEW PASSWORD</h1>
                <p class="text-secondary small">Silakan masukkan password baru Anda untuk memulihkan akses.</p>
            </div>
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <form method="POST" action="proses-reset.php">
                        <input type="hidden" name="token" value="<?php echo $_GET['token'] ?? ''; ?>">
                        <div class="mb-3">
                            <label class="form-label small text-secondary">Password Baru</label>
                            <div class="input-group">
                                <input type="password" name="new_password" class="form-control" id="new_password" placeholder="••••••••" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('new_password', 'eyeNew')">
                                    <i class="bi bi-eye" id="eyeNew"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small text-secondary">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <input type="password" name="confirm_new_password" class="form-control" id="confirm_new_password" placeholder="••••••••" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirm_new_password', 'eyeConfirm')">
                                    <i class="bi bi-eye" id="eyeConfirm"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small text-secondary">Verifikasi Keamanan</label>
                            <div class="d-flex align-items-center gap-3">
                                <div class="captcha-box">
                                    <?php echo $_SESSION['reset_captcha_a'] . " + " . $_SESSION['reset_captcha_b']; ?>
                                </div>
                                <input type="number" name="captcha_input" class="form-control text-center" placeholder="?" required style="max-width: 80px;">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold mb-3">Update Password</button>
                        <div class="text-center">
                            <a href="../login" class="text-info text-decoration-none small fw-bold">Batal dan Kembali ke Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="index.js"></script>
    </body>
</html>