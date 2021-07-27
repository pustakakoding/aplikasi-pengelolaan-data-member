<div class="d-flex flex-column flex-lg-row mb-4">
    <!-- judul halaman -->
    <div class="flex-grow-1 d-flex align-items-center">
        <i class="far fa-user icon-title"></i>
        <h3>Member</h3>
    </div>
    <!-- breadcrumbs -->
    <div class="ms-5 ms-lg-0 pt-lg-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="https://pustakakoding.com/" class="text-dark text-decoration-none"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="?module=member" class="text-dark text-decoration-none">Member</a></li>
                <li class="breadcrumb-item" aria-current="page">Pencarian</li>
            </ol>
        </nav>
    </div>
</div>

<div class="mb-5">
    <div class="row flex-lg-row-reverse align-items-center">
        <!-- button kembali ke halaman tampil data -->
        <div class="col-lg-5 col-xl-3">
            <a href="?module=member" class="btn btn-outline-secondary float-lg-end px-4 mb-4 mb-lg-0">
                <i class="fas fa-angle-left me-2"></i> Kembali
            </a>
        </div>
        <!-- form pencarian -->
        <div class="col-lg-7 col-xl-9">
            <form action="?module=tampil_pencarian_member" method="post" class="form-search needs-validation" novalidate>
                <input type="text" name="kata_kunci" class="form-control rounded-pill" placeholder="Cari Member ..." autocomplete="off" required>
                <div class="invalid-feedback">Masukan ID atau Nama Member yang ingin Anda cari.</div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <?php
    // mengecek data hasil submit dari form
    if (isset($_POST['kata_kunci'])) {
        // ambil data hasil submit dari form
        $kata_kunci = $_POST['kata_kunci'];
    ?>
        <div class="col-12">
            <div class="alert alert-secondary rounded-4 mb-5" role="alert">
                <i class="far fa-hand-point-right me-2"></i> Hasil Pencarian <span class="fw-bold fst-italic">"<?php echo $kata_kunci; ?>"</span>
            </div>
        </div>

        <?php
        // sql statement untuk menampilkan data dari tabel "tbl_member" berdasarkan "kata_kunci"
        $query = mysqli_query($mysqli, "SELECT id_member, tanggal_gabung, jenis_member, nama_lengkap, foto_profil FROM tbl_member 
                                        WHERE id_member LIKE '%$kata_kunci%' OR nama_lengkap LIKE '%$kata_kunci%'
                                        ORDER BY id_member DESC")
                                        or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
        // ambil jumlah data hasil query
        $rows = mysqli_num_rows($query);

        // cek hasil query
        // jika data member ada
        if ($rows <> 0) {
            // ambil data hasil query
            while ($data = mysqli_fetch_assoc($query)) { ?>
                <!-- tampilkan data -->
                <div class="col-lg-6 col-xl-3">
                    <div class="bg-white rounded-4 shadow-sm text-center p-4 p-lg-4-2 mb-4">
                        <div class="foto-profil mb-4">
                            <img src="images/<?php echo $data['foto_profil']; ?>" alt="Foto Profil" class="img-fluid rounded-circle">
                        </div>
                        <h6><?php echo $data['nama_lengkap']; ?></h6>
                        <p class="text-muted mb-4">Member <?php echo $data['jenis_member']; ?></p>
                        <!-- button detail data -->
                        <a href="?module=tampil_detail_member&id=<?php echo $data['id_member']; ?>" class="btn btn-outline-brand btn-sm px-4">
                            Detail <i class="fas fa-angle-right ms-2"></i>
                        </a>
                    </div>
                </div>
            <?php
            }
        }
        // jika data member tidak ada
        else { ?>
            <!-- tampilkan pesan data tidak ditemukan -->
            <div class="col-12">
                <i class="far fa-question-circle me-1"></i>
                Data member dengan kata kunci <span class="text-brand fst-italic px-2">"<?php echo $kata_kunci; ?>"</span> tidak ditemukan.
            </div>
    <?php
        }
    }
    ?>
</div>