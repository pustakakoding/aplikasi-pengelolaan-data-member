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
                <li class="breadcrumb-item" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>
</div>

<div class="mb-5">
    <div class="row flex-lg-row-reverse align-items-center">
        <!-- button entri data -->
        <div class="col-lg-5 col-xl-3">
            <a href="?module=form_entri_member" class="btn btn-outline-brand float-lg-end px-4 mb-4 mb-lg-0">
                <i class="fas fa-user-plus me-2"></i> Entri Member
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

<?php
// menampilkan pesan sesuai dengan proses yang dijalankan
// jika pesan tersedia
if (isset($_GET['pesan'])) {
    // jika pesan = 1
    if ($_GET['pesan'] == 1) {
        // tampilkan pesan sukses simpan data
        echo '<div class="alert alert-success alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle me-2"></i>Sukses!</strong> Data member berhasil disimpan.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    // jika pesan = 2
    elseif ($_GET['pesan'] == 2) {
        // tampilkan pesan sukses hapus data
        echo '<div class="alert alert-success alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle me-2"></i>Sukses!</strong> Data member berhasil dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}
?>

<div class="row">
    <?php
    /* 
        membatasi jumlah data yang ditampilkan dari database untuk membuat pagination/paginasi
    */
    // cek data "paginasi" pada URL untuk mengetahui paginasi halaman aktif
    // jika data "paginasi" ada, maka paginasi halaman = data "paginasi". jika data "paginasi" tidak ada, maka paginasi halaman = 1
    $paginasi_halaman = (isset($_GET['paginasi'])) ? (int) $_GET['paginasi'] : 1;
    // tentukan jumlah data yang ditampilkan per paginasi halaman
    $batas = 8;
    // tentukan dari data ke berapa yang akan ditampilkan pada paginasi halaman
    $batas_awal = ($paginasi_halaman - 1) * $batas;

    // sql statement untuk menampilkan data dari tabel "tbl_member"
    $query = mysqli_query($mysqli, "SELECT id_member, jenis_member, nama_lengkap, foto_profil FROM tbl_member 
                                    ORDER BY id_member DESC LIMIT $batas_awal, $batas")
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
        <?php } ?>

        <div class="d-flex flex-column flex-xl-row align-items-center mt-4">
            <!-- menampilkan informasi jumlah paginasi halaman dan jumlah data -->
            <div class="flex-grow-1 text-center text-xl-start text-muted mb-3">
                <?php
                // sql statement untuk menampilkan jumlah data pada tabel "tbl_member"
                $query = mysqli_query($mysqli, "SELECT id_member FROM tbl_member")
                                                or die('Ada kesalahan pada query jumlah data : ' . mysqli_error($mysqli));
                // ambil jumlah data dari hasil query
                $jumlah_data = mysqli_num_rows($query);

                // hitung jumlah paginasi halaman yang tersedia
                $jumlah_paginasi_halaman = ceil($jumlah_data / $batas);

                // cek jumlah data
                // jika data ada
                if ($jumlah_data <> 0) {
                    // tampilkan informasi paginasi halaman aktif dan jumlah paginasi halaman
                    echo "Halaman $paginasi_halaman dari $jumlah_paginasi_halaman";
                }
                ?>

                <span class="mx-2">|</span>

                <?php
                // ambil data awal yang ditampilkan per paginasi halaman
                /* 
                    jika "jumlah_paginasi_halaman" <> "0", maka "data_awal" = "batas_awal" + 1.
                    jika "jumlah_paginasi_halaman" == "0", maka "data_awal" = "batas_awal". 
                */
                $data_awal = ($jumlah_paginasi_halaman <> 0) ? $batas_awal + 1 : $batas_awal;

                // sql statement untuk menampilkan jumlah data pada tabel "tbl_member" yang ditampilkan per halaman
                $query = mysqli_query($mysqli, "SELECT id_member FROM tbl_member LIMIT $data_awal, $batas")
                                                or die('Ada kesalahan pada query jumlah data per halaman : ' . mysqli_error($mysqli));
                // ambil jumlah data dari hasil query
                $jumlah_data_per_paginasi_halaman = mysqli_num_rows($query);

                // ambil data akhir yang ditampilkan per paginasi halaman
                /* 
                    jika "jumlah_data_per_paginasi_halaman" < "batas", maka "data_akhir" = "data_awal" + "jumlah_data_per_paginasi_halaman".
                    jika "jumlah_data_per_paginasi_halaman" >= "batas", maka "data_akhir" = "batas_awal" + "jumlah_data_per_paginasi_halaman". 
                */
                $data_akhir = ($jumlah_data_per_paginasi_halaman < $batas) ? $data_awal + $jumlah_data_per_paginasi_halaman : $batas_awal + $jumlah_data_per_paginasi_halaman;
                ?>
                <!-- tampilkan informasi jumlah data -->
                Menampilkan <?php echo $data_awal; ?> sampai <?php echo $data_akhir; ?> dari <?php echo $jumlah_data; ?> data
            </div>


            <!-- membuat pagination -->
            <ul class="pagination justify-content-center">
                <!-- button link "<" -->
                <?php
                // jika paginasi halaman <= 1, maka button link "<" tidak aktif
                if ($paginasi_halaman <= '1') { ?>
                    <li class="page-item pagination-pill disabled">
                        <a class="page-link" aria-label="Previous">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    </li>
                <?php
                }
                // jika paginasi halaman > 1, maka button link "<" aktif
                else { ?>
                    <li class="page-item pagination-pill">
                        <a class="page-link" href="?module=member&paginasi=<?php echo $paginasi_halaman - 1; ?>" aria-label="Previous">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    </li>
                <?php } ?>

                <!-- button link nomor -->
                <?php
                // tentukan jumlah button link nomor yang ditampilkan sebelum dan sesudah link yang aktif
                $jumlah_button = 3;

                // tentukan nilai awal dan nilai akhir yang akan digunakan pada perulangan untuk menampilkan button link nomor
                /* 
                    jika "paginasi_halaman" > "jumlah_button", maka "nomor_awal" = "paginasi_halaman" - "jumlah_button".
                    jika "paginasi_halaman" <= "jumlah_button", maka "nomor_awal" = 1.
                */
                $nomor_awal = ($paginasi_halaman > $jumlah_button) ? $paginasi_halaman - $jumlah_button : 1;

                /* 
                    jika "paginasi_halaman" < ("jumlah_paginasi_halaman" - "jumlah_button"), maka "nomor_akhir" = "paginasi_halaman" + "jumlah_button".
                    jika "paginasi_halaman" >= ("jumlah_paginasi_halaman" - "jumlah_button"), maka "nomor_akhir" = "jumlah_paginasi_halaman". 
                */
                $nomor_akhir = ($paginasi_halaman < ($jumlah_paginasi_halaman - $jumlah_button)) ? $paginasi_halaman + $jumlah_button : $jumlah_paginasi_halaman;

                // lakukan perulangan untuk menampilkan button link nomor sesuai jumlah paginasi halaman
                for ($x = $nomor_awal; $x <= $nomor_akhir; $x++) {
                    // membuat link aktif
                    /* 
                        jika "halaman" sama dengan link aktif, maka tambahkan css class "active"
                        jika "halaman" tidak sama dengan link aktif, maka hilangkan css class "active" 
                    */
                    $link_active = ($paginasi_halaman == $x) ? 'active' : '';
                ?>
                    <li class="page-item pagination-pill <?php echo $link_active; ?>">
                        <a class="page-link" href="?module=member&paginasi=<?php echo $x; ?>"><?php echo $x; ?></a>
                    </li>
                <?php } ?>

                <!-- button link ">" -->
                <?php
                // jika "paginasi_halaman" >= "jumlah_paginasi_halaman", maka button link ">" tidak aktif 
                if ($paginasi_halaman >= $jumlah_paginasi_halaman) { ?>
                    <li class="page-item pagination-pill disabled">
                        <a class="page-link" aria-label="Next">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                <?php
                }
                // jika "paginasi_halaman" < "jumlah_paginasi_halaman", maka button link ">" aktif
                else { ?>
                    <li class="page-item pagination-pill">
                        <a class="page-link" href="?module=member&paginasi=<?php echo $paginasi_halaman + 1; ?>" aria-label="Next">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php
    }
    // jika data member tidak ada
    else { ?>
        <!-- tampilkan pesan data tidak tersedia -->
        <div>Tidak ada data yang tersedia.</div>
    <?php } ?>
</div>