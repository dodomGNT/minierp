<!-- HEADER -->
<?php //require_once('header.php'); ?>
<?php require_once('../auth_check.php'); ?>
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
                            <img src="../assets/images/unknown.png" alt="mdo" width="32" height="32" class="rounded-circle me-2">
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

        <!-- SIDEBAR -->
        <?php //require_once('sidebar.php'); ?>
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
                            <?php for($i=0; $i<=20; $i++){ ?>
                                <li><a href="#" class="nav-link"><i class="bi bi-dot"></i> Project <?php echo chr(65+$i); ?></a></li>
                            <?php } ?>
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

                    <!-- BREADCRUMB -->
                    <?php //require_once('breadcrumb.php'); ?>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="text-info text-decoration-none">Home</a></li>
                            <li class="breadcrumb-item active text-light">Dashboard</li>
                        </ol>
                    </nav>

                    <div class="card border-0 shadow-sm p-2 mb-2">
                        <h3 class="text-info">Selamat Datang di Panel Kontrol</h3>
                        <p class="text-secondary">Dashboard ini sekarang menggunakan Dark Mode default. Sidebar dan Footer tetap pada posisinya (sticky) saat konten ditarik ke bawah.</p>
                    </div>
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3 gap-2">
                                <div class="d-flex gap-2 flex-shrink-0">
                                    <button class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#modalTambahData">
                                        <i class="bi bi-plus-lg me-1"></i> Tambah Data
                                    </button>
                                    <button class="btn btn-success">
                                        <i class="bi bi-file-earmark-excel me-1"></i> Export Excel
                                    </button>
                                </div>

                                <div class="d-flex gap-2 w-100 w-md-auto">
                                    <select class="form-select w-auto" aria-label="Filter Status">
                                        <option selected>Semua Status</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Approved</option>
                                        <option value="3">Rejected</option>
                                    </select>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Cari data..." aria-label="Cari data">
                                        <button class="btn btn-outline-info" type="button">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-dark table-hover align-middle border-light/10">
                                    <thead class="table-light text-dark">
                                        <tr>
                                            <th scope="col" style="width: 50px;">#</th>
                                            <th scope="col">Nama Proyek</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Implementasi ERP Fase 1</td>
                                            <td>15 Feb 2026</td>
                                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <button type="button" class="btn btn-outline-primary" title="Edit"><i class="bi bi-pencil"></i></button>
                                                    <button type="button" class="btn btn-outline-success" title="Approve"><i class="bi bi-check-lg"></i></button>
                                                    <button type="button" class="btn btn-outline-warning" title="Reject"><i class="bi bi-x-lg"></i></button>
                                                    <button type="button" class="btn btn-outline-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php for ($i = 2; $i <= 15; $i++) { ?>
                                        <tr>
                                            <td>2</td>
                                            <td>Audit Server Tahunan</td>
                                            <td>10 Feb 2026</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <button type="button" class="btn btn-outline-primary" title="Edit"><i class="bi bi-pencil"></i></button>
                                                    <button type="button" class="btn btn-outline-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                            <nav aria-label="Page navigation example" class="mt-3">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <?php //require_once('footer.php'); ?>
        <footer class="footer mt-auto">
            <div class="container-fluid d-flex justify-content-between">
                <span class="text-secondary">&copy; 2026 Gemini Dash Inc.</span>
                <span class="text-secondary d-none d-sm-inline">Made with <i class="bi bi-heart-fill text-danger"></i> & Bootstrap 5</span>
            </div>
        </footer>
        <script src="../assets/bootstrap.bundle.min.js"></script>
        <script src="index.js"></script>

        <div class="modal fade" id="modalTambahData" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content bg-dark border-secondary shadow-lg">
                    
                    <div class="modal-header border-secondary bg-dark shadow-sm">
                        <h5 class="modal-title text-info fw-bold">
                            <i class="bi bi-pencil-square me-2"></i>Form Input Data Proyek
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-4 custom-scrollbar">
                        <form id="formTambahProyek">
                            
                            <div class="mb-4">
                                <h6 class="text-uppercase fs-7 fw-bold text-secondary mb-3 opacity-75">Informasi Dasar</h6>
                                <div class="row g-3">
                                    <div class="col-md-8">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control bg-dark text-white border-secondary" id="floatNama" placeholder="Nama Proyek">
                                            <label for="floatNama">Nama Lengkap Proyek</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control bg-dark text-white border-secondary" id="floatTgl" placeholder="Tanggal">
                                            <label for="floatTgl">Tanggal Mulai</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-uppercase fs-7 fw-bold text-secondary mb-3 opacity-75">Detail Teknis</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select bg-dark text-white border-secondary" id="floatStatus" aria-label="Status">
                                                <option selected disabled>Pilih Status...</option>
                                                <option value="1">Pending</option>
                                                <option value="2">Approved</option>
                                                <option value="3">Rejected</option>
                                            </select>
                                            <label for="floatStatus">Status Proyek</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control bg-dark text-white border-secondary" id="floatBudget" placeholder="Budget">
                                            <label for="floatBudget">Estimasi Budget (Rp)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <h6 class="text-uppercase fs-7 fw-bold text-secondary mb-3 opacity-75">Catatan Tambahan</h6>
                                <div class="form-floating">
                                    <textarea class="form-control bg-dark text-white border-secondary" placeholder="Tulis deskripsi..." id="floatDesc" style="height: 120px"></textarea>
                                    <label for="floatDesc">Deskripsi Singkat Kendala/Catatan</label>
                                </div>
                            </div>
                            <?php for($i=0; $i<=5; $i++){ ?>
                            <div class="mb-2">
                                <div class="form-floating">
                                    <textarea class="form-control bg-dark text-white border-secondary" placeholder="Tulis deskripsi..." id="floatDesc" style="height: 120px"></textarea>
                                    <label for="floatDesc">Deskripsi Singkat Kendala/Catatan</label>
                                </div>
                            </div>
                            <?php } ?>

                        </form>
                    </div>

                    <div class="modal-footer border-secondary bg-dark shadow-lg">
                        <button type="button" class="btn btn-link text-secondary text-decoration-none me-auto" data-bs-dismiss="modal">Batalkan</button>
                        <button type="submit" form="formTambahProyek" class="btn btn-info text-white px-4 py-2 fw-bold">
                            <i class="bi bi-cloud-arrow-up-fill me-2"></i>Simpan Perubahan
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>