<?php require_once('header.php'); ?>
<?php require_once('sidebar.php'); ?>
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
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3 gap-2">
                        <div class="d-flex gap-2 flex-shrink-0">
                            <button class="btn btn-info text-white">
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
<?php require_once('footer.php'); ?>