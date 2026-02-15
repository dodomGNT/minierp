<?php require_once('../guest_check.php'); ?>
<?php include_once('actions.php'); ?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Gemini Dash</title>
        <link rel="stylesheet" href="../assets/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/bootstrap-icons.min.css">
        <script src="../assets/sweetalert2@11.js"></script>
        <link rel="stylesheet" href="custom.css">
    </head>
    <body>
        <div class="login-card">
            <div class="text-center mb-4">
                <h1 class="fw-bold text-info"><i class="bi bi-speedometer2 me-2"></i>GEMINI-DASH</h1>
                <p class="text-secondary small">Silakan masuk untuk mengakses sistem</p>
            </div>
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label class="form-label small text-secondary">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-secondary"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="admin@mail.com" value="admin@mail.com" required>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label small text-secondary">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark border-secondary text-secondary"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password" class="form-control" id="password" value="admin123" required>
                                <button class="btn btn-outline-secondary border-secondary" type="button" id="togglePassword">
                                    <i class="bi bi-eye" id="eyeIcon"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3 text-end">
                            <a href="../forgot-password" class="text-info custom-link">Lupa Password?</a>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small text-secondary">Verifikasi Keamanan</label>
                            <div class="d-flex align-items-center gap-3">
                                <div class="captcha-box text-info" id="captchaValue">
                                    <?php echo $_SESSION['captcha_a'] . " + " . $_SESSION['captcha_b']; ?>
                                </div>
                                <input type="number" name="captcha_input" class="form-control text-center" placeholder="?" required style="max-width: 80px;">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 btn-login mb-3" id="btnLogin">
                            <span><i class="bi bi-box-arrow-in-right me-2"></i> Masuk</span>
                        </button>
                        <div class="text-center">
                            <span class="small text-secondary">Belum punya akun?</span>
                            <a href="../register" class="text-info custom-link fw-bold">Daftar</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-4">
                <p class="small text-secondary">&copy; 2026 Gemini Dash Inc.</p>
            </div>
        </div>
        <script src="index.js"></script>
    </body>
</html>