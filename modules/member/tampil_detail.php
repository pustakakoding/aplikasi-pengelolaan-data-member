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
                <li class="breadcrumb-item"><a href="?module=member" class="text-dark text-decoration-none">Member</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>
</div>

<?php
// mengecek data GET "id_member"
if (isset($_GET['id'])) {
    // ambil data GET dari tombol detail
    $id_member = $_GET['id'];

    // sql statement untuk menampilkan data dari tabel "tbl_member" berdasarkan "id_member"
    $query = mysqli_query($mysqli, "SELECT * FROM tbl_member WHERE id_member='$id_member'")
                                    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
}
?>

<div class="mb-5">
    <div class="d-grid gap-3 d-sm-flex flex-sm-row-reverse">
        <div class="d-grid gap-3 d-sm-flex">
            <!-- button ubah data -->
            <a href="?module=form_ubah_member&id=<?php echo $data['id_member']; ?>" class="btn btn-outline-brand px-4">
                <i class="far fa-edit me-2"></i> Ubah
            </a>
            <!-- button hapus data -->
            <a href="modules/member/proses_hapus.php?id=<?php echo $data['id_member']; ?>" onclick="return confirm('Anda yakin ingin menghapus data member <?php echo $data['nama_lengkap']; ?>?')" class="btn btn-outline-brand px-4">
                <i class="far fa-trash-alt me-2"></i> Hapus
            </a>
        </div>
        <!-- button kembali ke halaman tampil data -->
        <a href="?module=member" class="btn btn-outline-secondary px-4 me-sm-auto">
            <i class="fas fa-angle-left me-2"></i> Kembali
        </a>
    </div>
</div>

<?php
// menampilkan pesan sesuai dengan proses yang dijalankan
// jika pesan tersedia
if (isset($_GET['pesan'])) {
    // jika pesan = 1
    if ($_GET['pesan'] == 1) {
        // tampilkan pesan sukses ubah data
        echo '<div class="alert alert-success alert-dismissible rounded-4 fade show mb-4" role="alert">
                <strong><i class="fas fa-check-circle me-2"></i>Sukses!</strong> Data member berhasil diubah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}
?>

<div class="bg-white rounded-4 shadow-sm p-4 mb-4">
    <!-- judul form -->
    <div class="alert alert-secondary rounded-4 mb-5" role="alert">
        <i class="fas fa-user-check me-2"></i> Detail Data Member
    </div>
    <!-- tampilkan data -->
    <div class="d-flex flex-column flex-xl-row">
        <div class="flex-shrink-0 text-center mb-5 mb-xl-0">
            <div class="foto-profil-detail">
                <img src="images/<?php echo $data['foto_profil']; ?>" alt="Foto Profil" class="img-fluid rounded-circle">
            </div>
        </div>
        <div class="flex-grow-1 text-muted fw-light ms-xl-5">
            <div class="table-responsive">
                <table class="table table-striped lh-lg">
                    <tr>
                        <td width="200">ID Member</td>
                        <td width="10">:</td>
                        <td><?php echo $data['id_member']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Gabung</td>
                        <td>:</td>
                        <td><?php echo tanggal_indo($data['tanggal_gabung']); ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Member</td>
                        <td>:</td>
                        <td><?php echo $data['jenis_member']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><?php echo $data['nama_lengkap']; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo $data['alamat']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $data['email']; ?></td>
                    </tr>
                    <tr>
                        <td>WhatsApp</td>
                        <td>:</td>
                        <td><?php echo $data['whatsapp']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>