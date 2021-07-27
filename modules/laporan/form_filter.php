<div class="d-flex flex-column flex-lg-row mb-4">
    <!-- judul halaman -->
    <div class="flex-grow-1 d-flex align-items-center">
        <i class="far fa-file-alt icon-title"></i>
        <h3>Laporan</h3>
    </div>
    <!-- breadcrumbs -->
    <div class="ms-5 ms-lg-0 pt-lg-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="https://pustakakoding.com/" class="text-dark text-decoration-none"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="?module=laporan" class="text-dark text-decoration-none">Laporan</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="bg-white rounded-4 shadow-sm p-4 mb-4">
    <!-- judul form -->
    <div class="alert alert-secondary rounded-4 mb-5" role="alert">
        <i class="fas fa-calendar-alt me-2"></i> Filter Tanggal Gabung
    </div>
    <!-- form filter data -->
    <form action="modules/laporan/cetak.php" target="_blank" method="get" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-lg-4 col-xl-3 mb-4 mb-lg-0">
                <label class="form-label">Tanggal Awal <span class="text-danger">*</span></label>
                <input type="text" name="tanggal_awal" class="form-control datepicker" autocomplete="off" required>
                <div class="invalid-feedback">Tanggal awal tidak boleh kosong.</div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <label class="form-label">Tanggal Akhir <span class="text-danger">*</span></label>
                <input type="text" name="tanggal_akhir" class="form-control datepicker" autocomplete="off" required>
                <div class="invalid-feedback">Tanggal akhir tidak boleh kosong.</div>
            </div>
        </div>

        <div class="pt-4 pb-2 mt-5 border-top">
            <div class="d-grid gap-3 d-sm-flex justify-content-md-start pt-1">
                <!-- button cetak laporan -->
                <button type="submit" class="btn btn-outline-brand px-4">
                    <i class="fas fa-print me-2"></i> Cetak
                </button>
            </div>
        </div>
    </form>
</div>