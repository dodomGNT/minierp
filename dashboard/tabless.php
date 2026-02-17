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
        
        <style>
            /* Header & Footer Sticky transparan */
            .modal-header, .modal-footer {
                background-color: rgba(33, 37, 41, 0.9) !important; /* Semi transparan */
                backdrop-filter: blur(8px); /* Efek blur kaca */
                z-index: 10;
            }

            /* Biar input yang melayang lebih smooth */
            .form-floating > label {
                transition: all 0.2s ease-in-out;
            }

            /* Fokus input biar lebih "Gemini" (Warna Info) */
            .form-control:focus {
                border-color: #0dcaf0 !important;
                box-shadow: 0 0 0 0.25rem rgba(13, 202, 240, 0.15) !important;
            }

            /* Custom Scrollbar lebih tipis */
            .custom-scrollbar::-webkit-scrollbar {
                width: 4px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #495057;
                border-radius: 10px;
            }

            /* Menyesuaikan Floating Label saat Dark Mode */
            .form-floating > .form-control:focus, 
            .form-floating > .form-control:not(:placeholder-shown) {
                padding-top: 1.625rem;
                padding-bottom: 0.625rem;
                background-color: #1a1d20 !important; /* Warna gelap solid saat diketik */
            }

            .form-floating > label {
                color: #6c757d; /* Warna label saat diam */
            }

            .form-floating > .form-control:focus ~ label,
            .form-floating > .form-control:not(:placeholder-shown) ~ label {
                color: #0dcaf0; /* Warna label saat melayang (Warna Info) */
            }

            /* Custom Scrollbar untuk Modal Body agar terlihat Modern */
            .custom-scrollbar::-webkit-scrollbar {
                width: 6px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: transparent;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #343a40;
                border-radius: 10px;
            }
        </style>
    </head>
    <body>
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

        <script src="../assets/bootstrap.bundle.min.js"></script>
        <script>
            document.getElementById('formTambahProyek').addEventListener('submit', function(e) {
                e.preventDefault();

                // Ambil data (untuk keperluan integrasi DB nanti)
                const nama = document.getElementById('nama_proyek').value;

                // Tampilkan loading/proses
                Swal.fire({
                    title: 'Menyimpan...',
                    text: 'Mohon tunggu sebentar',
                    icon: 'info',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Simulasi pengiriman data ke server
                setTimeout(() => {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: `Proyek "${nama}" telah ditambahkan.`,
                        icon: 'success',
                        confirmButtonColor: '#0dcaf0'
                    }).then(() => {
                        // Tutup modal secara manual
                        const modalElement = document.getElementById('modalTambahData');
                        const modal = bootstrap.Modal.getInstance(modalElement);
                        modal.hide();
                        
                        // Reset form
                        document.getElementById('formTambahProyek').reset();
                    });
                }, 1500);
            });
        </script>
    </body>
</html>