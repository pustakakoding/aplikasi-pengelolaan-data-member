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
                <li class="breadcrumb-item" aria-current="page">Entri</li>
            </ol>
        </nav>
    </div>
</div>

<div class="bg-white rounded-4 shadow-sm p-4 mb-4">
    <!-- judul form -->
    <div class="alert alert-secondary rounded-4 mb-5" role="alert">
        <i class="fas fa-user-plus me-2"></i> Entri Data Member
    </div>
    <!-- form entri data -->
    <form action="modules/member/proses_simpan.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-xl-6">
                <div class="row g-0">
                    <div class="mb-3 col-xl-6 pe-xl-3">
                        <?php
                        // membuat "id_member"
                        // sql statement untuk menampilkan 5 digit terakhir dari "id_member" pada tabel "tbl_member"
                        $query = mysqli_query($mysqli, "SELECT RIGHT(id_member,5) as nomor FROM tbl_member ORDER BY id_member DESC LIMIT 1")
                                                        or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
                        // ambil jumlah baris data hasil query
                        $rows = mysqli_num_rows($query);

                        // cek hasil query
                        // jika "id_member" sudah ada
                        if ($rows <> 0) {
                            // ambil data hasil query
                            $data = mysqli_fetch_assoc($query);
                            // nomor urut "id_member" yang terakhir + 1
                            $nomor_urut = $data['nomor'] + 1;
                        }
                        // jika "id_member" belum ada
                        else {
                            // nomor urut "id_member" = 1
                            $nomor_urut = 1;
                        }

                        // menambahkan karakter "ID-" diawal dan karakter "0" disebelah kiri nomor urut
                        $id_member = "ID-" . str_pad($nomor_urut, 5, "0", STR_PAD_LEFT);
                        ?>
                        <label class="form-label">ID Member <span class="text-danger">*</span></label>
                        <!-- tampilkan "id_member" -->
                        <input type="text" name="id_member" class="form-control" value="<?php echo $id_member; ?>" readonly>
                    </div>

                    <div class="mb-3 col-xl-6 pe-xl-3">
                        <label class="form-label">Tanggal Gabung <span class="text-danger">*</span></label>
                        <input type="text" name="tanggal_gabung" class="form-control datepicker" autocomplete="off" required>
                        <div class="invalid-feedback">Tanggal gabung tidak boleh kosong.</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="mb-3 ps-xl-3">
                    <label class="form-label">Jenis Member <span class="text-danger">*</span></label>
                    <select name="jenis_member" class="form-select" autocomplete="off" required>
                        <option selected disabled value="">-- Pilih --</option>
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
                    <input type="text" name="nama_lengkap" class="form-control" autocomplete="off" required>
                    <div class="invalid-feedback">Nama lengkap tidak boleh kosong.</div>
                </div>

                <div class="mb-4-1-7 pe-xl-3">
                    <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="laki_laki" name="jenis_kelamin" class="form-check-input" value="Laki-laki" required>
                        <label class="form-check-label" for="laki_laki">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="perempuan" name="jenis_kelamin" class="form-check-input" value="Perempuan" required>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                        <div class="invalid-feedback invalid-feedback-inline">Pilih salah satu jenis kelamin.</div>
                    </div>
                </div>

                <div class="mb-3 pe-xl-3">
                    <label class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea name="alamat" rows="4" class="form-control" autocomplete="off" required></textarea>
                    <div class="invalid-feedback">Alamat tidak boleh kosong.</div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="mb-3 ps-xl-3">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" autocomplete="off" required>
                    <div class="invalid-feedback">Email tidak boleh kosong.</div>
                </div>

                <div class="mb-3 ps-xl-3">
                    <label class="form-label">WhatsApp <span class="text-danger">*</span></label>
                    <input type="text" name="whatsapp" class="form-control" maxlength="13" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                    <div class="invalid-feedback">WhatsApp tidak boleh kosong.</div>
                </div>

                <div class="mb-3 ps-xl-3">
                    <label class="form-label">Foto Profil <span class="text-danger">*</span></label>
                    <input type="file" accept=".jpg, .jpeg, .png" id="foto" name="foto" class="form-control" autocomplete="off" onchange="validasi_foto()" required>
                    <div class="invalid-feedback">Foto profil tidak boleh kosong.</div>

                    <div class="form-text fs-7 mt-3">
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
                <!-- button kembali ke halaman tampil data -->
                <a href="?module=member" class="btn btn-outline-secondary px-4">Batal</a>
            </div>
        </div>
    </form>
</div>