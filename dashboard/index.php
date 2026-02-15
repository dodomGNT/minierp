<?php require_once('../auth_check.php'); ?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modern Dark Dashboard - Bootstrap 5.3332</title>
        <link rel="stylesheet" href="../assets/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/bootstrap-icons.min.css">
        <script src="../assets/sweetalert2@11.js"></script>
        <link rel="stylesheet" href="custom.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-dark d-md-none me-2" type="button" onclick="toggleSidebar()">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand fw-bold text-info" href="#">GEMINI-DASH</a>
                <div class="ms-auto d-flex align-items-center">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name=Admin+User&background=0D6EFD&color=fff" alt="mdo" width="32" height="32" class="rounded-circle me-2">
                            <span class="d-none d-sm-inline">Admin User</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="javascript:void(0)" id="logoutBtn">
                                    <i class="bi bi-box-arrow-right me-2"></i>Sign out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="sidebar d-flex flex-column p-3" id="sidebarMain">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active mb-2">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#projectSubmenu" class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="projectSubmenu">
                        <span><i class="bi bi-folder me-2"></i> Projects</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                    <div class="collapse" id="projectSubmenu">
                        <ul class="nav-submenu">
                            <li><a href="#" class="nav-link"><i class="bi bi-dot"></i> Project A</a></li>
                            <li><a href="#" class="nav-link"><i class="bi bi-dot"></i> Project B</a></li>
                            <li><a href="#" class="nav-link"><i class="bi bi-dot"></i> Project C</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#reportSubmenu" class="nav-link d-flex justify-content-between align-items-center mt-1" data-bs-toggle="collapse" role="button" aria-expanded="false">
                        <span><i class="bi bi-bar-chart me-2"></i> Laporan</span>
                        <i class="bi bi-chevron-right"></i>
                    </a>
                    <div class="collapse" id="reportSubmenu">
                        <ul class="nav-submenu">
                            <li><a href="#" class="nav-link"><i class="bi bi-dot"></i> Laporan Bulanan</a></li>
                            <li><a href="#" class="nav-link"><i class="bi bi-dot"></i> Laporan Tahunan</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item"><a href="#" class="nav-link mt-1"><i class="bi bi-gear me-2"></i> Konfigurasi Konfigurasi Konfigurasi </a></li>
                <?php for($i=0; $i<=20; $i++){ ?>
                    <li class="nav-item"><a href="#" class="nav-link mt-1"><i class="bi bi-gear me-2"></i> Konfigurasi</a></li>
                <?php } ?>
                <li class="nav-item"><a href="#" class="nav-link mt-1"><i class="bi bi-gear me-2"></i> Konfigurasi</a></li>
            </ul>
            <hr class="text-secondary">
            <div class="small text-muted text-center italic">v1.0.0-beta</div>
        </div>
        <div class="main-content px-4">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="text-info text-decoration-none">Home</a></li>
                            <li class="breadcrumb-item active text-light">Dashboard</li>
                        </ol>
                    </nav>
                    <div class="card border-0 shadow-sm p-4 mb-4">
                        <h3 class="text-info">Selamat Datang di Panel Kontrol</h3>
                        <p class="text-secondary">Dashboard ini sekarang menggunakan Dark Mode default. Sidebar dan Footer tetap pada posisinya (sticky) saat konten ditarik ke bawah.</p>
                    </div>
                    <div style="background: linear-gradient(#1a1a1a, #121212); border-radius: 10px; border: 2px dashed #444; height: 1000px;" class="d-flex align-items-center justify-content-center mb-4">
                        <span class="text-muted text-center p-5">Konten Utama yang Sangat Panjang<br>(Scroll ke bawah untuk melihat footer tetap diam)</span>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer mt-auto">
            <div class="container-fluid d-flex justify-content-between">
                <span class="text-secondary">&copy; 2026 Gemini Dash Inc.</span>
                <span class="text-secondary d-none d-sm-inline">Made with <i class="bi bi-heart-fill text-danger"></i> & Bootstrap 5</span>
            </div>
        </footer>
        <script src="../assets/bootstrap.bundle.min.js"></script>
        <script src="index.js"></script>
    </body>
</html>