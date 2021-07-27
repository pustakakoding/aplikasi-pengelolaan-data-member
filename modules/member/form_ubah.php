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
                <li class="breadcrumb-item" aria-current="page">Ubah</li>
            </ol>
        </nav>
    </div>
</div>

<?php
// mengecek data GET "id_member"
if (isset($_GET['id'])) {
    // ambil data GET dari tombol ubah
    $id_member = $_GET['id'];

    // sql statement untuk menampilkan data dari tabel "tbl_member" berdasarkan "id_member"
    $query = mysqli_query($mysqli, "SELECT * FROM tbl_member WHERE id_member='$id_member'")
                                    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
}
?>

<div class="bg-white rounded-4 shadow-sm p-4 mb-4">
    <!-- judul form -->
    <div class="alert alert-secondary rounded-4 mb-5" role="alert">
        <i class="fas fa-user-edit me-2"></i> Ubah Data Member
    </div>
    <!-- form ubah data -->
    <form action="modules/member/proses_ubah.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-xl-6">
                <div class="row g-0">
                    <div class="mb-3 col-xl-6 pe-xl-3">
                        <label class="form-label">ID Member <span class="text-danger">*</span></label>
                        <input type="text" name="id_member" class="form-control" value="<?php echo $data['id_member']; ?>" readonly>
                    </div>

                    <div class="mb-3 col-xl-6 pe-xl-3">
                        <label class="form-label">Tanggal Gabung <span class="text-danger">*</span></label>
                        <input type="text" name="tanggal_gabung" class="form-control datepicker" autocomplete="off" value="<?php echo date('d-m-Y', strtotime($data['tanggal_gabung'])); ?>" required>
                        <div class="invalid-feedback">Tanggal gabung tidak boleh kosong.</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="mb-3 ps-xl-3">
                    <label class="form-label">Jenis Member <span class="text-danger">*</span></label>
                    <select name="jenis_member" class="form-select" autocomplete="off" required>
                        <option value="<?php echo $data['jenis_member']; ?>"><?php echo $data['jenis_member']; ?></option>
                        <option disabled value="">-- Pilih --</option>
                        <option value="Gratis">Gratis</option>
                        <option value="Pelajar">Pelajar</option>
                        <option value="Personal">Personal</option>
                        <option value="Bisnis">Bisnis</option>
                    </select>
                    <div class="invalid-feedback">Jenis member tidak boleh kosong.</div>
                </div>
            </div>
        </div>

        <hr class="mb-4-2">

        <div class="row">
            <div class="col-xl-6">
                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" class="form-control" autocomplete="off" value="<?php echo $data['nama_lengkap']; ?>" required>
                    <div class="invalid-feedback">Nama lengkap tidak boleh kosong.</div>
                </div>

                <div class="mb-4-1-7 pe-xl-3">
                    <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                    <br>
                    <?php
                    if ($data['jenis_kelamin'] == 'Laki-laki') { ?>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="laki_laki" name="jenis_kelamin" class="form-check-input" value="Laki-laki" checked required>
                            <label class="form-check-label" for="laki_laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="perempuan" name="jenis_kelamin" class="form-check-input" value="Perempuan" required>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                            <div class="invalid-feedback invalid-feedback-inline">Pilih salah satu jenis kelamin.</div>
                        </div>
                    <?php
                    } else { ?>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="laki_laki" name="jenis_kelamin" class="form-check-input" value="Laki-laki" required>
                            <label class="form-check-label" for="laki_laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" id="perempuan" name="jenis_kelamin" class="form-check-input" value="Perempuan" checked required>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                            <div class="invalid-feedback invalid-feedback-inline">Pilih salah satu jenis kelamin.</div>
                        </div>
                    <?php } ?>
                </div>

                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea name="alamat" rows="4" class="form-control" autocomplete="off" required><?php echo $data['alamat']; ?></textarea>
                    <div class="invalid-feedback">Alamat tidak boleh kosong.</div>
                </div>

                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" autocomplete="off" value="<?php echo $data['email']; ?>" required>
                    <div class="invalid-feedback">Email tidak boleh kosong.</div>
                </div>

                <div class="mb-3 pe-xl-3">
                    <label class="form-label">WhatsApp <span class="text-danger">*</span></label>
                    <input type="text" name="whatsapp" class="form-control" maxlength="13" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['whatsapp']; ?>" required>
                    <div class="invalid-feedback">WhatsApp tidak boleh kosong.</div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="mb-3 ps-xl-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" accept=".jpg, .jpeg, .png" id="foto" name="foto" class="form-control" autocomplete="off" onchange="validasi_foto()">

                    <div class="foto-profil-detail mt-5">
                        <img src="images/<?php echo $data['foto_profil']; ?>" alt="Foto Profil" class="img-fluid rounded-circle">
                    </div>

                    <div class="form-text fs-7 mt-4">
                        Keterangan : <br>
                        - Tipe file yang bisa diunggah adalah *.jpg atau *.png. <br>
                        - Ukuran file yang bisa diunggah maksimal 1 Mb.
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-4 pb-2 mt-5 border-top">
            <div class="d-grid gap-3 d-sm-flex justify-content-md-start pt-1">
                <!-- button simpan data -->
                <input type="submit" name="simpan" value="Simpan" class="btn btn-outline-brand px-4">
                <!-- button kembali ke halaman detail data -->
                <a href="?module=tampil_detail_member&id=<?php echo $data['id_member']; ?>" class="btn btn-outline-secondary px-4">Batal</a>
            </div>
        </div>
    </form>
</div>