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