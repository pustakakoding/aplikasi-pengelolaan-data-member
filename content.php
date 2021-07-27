<?php
// panggil file "database.php" untuk koneksi ke database
require_once "config/database.php";
// panggil file "fungsi_tanggal_indo.php" untuk membuat format tanggal indonesia
require_once "helper/fungsi_tanggal_indo.php";

// pemanggilan file halaman konten sesuai "module" yang dipilih
// jika module yang dipilih "dashboard"
if ($_GET['module'] == 'dashboard') {
    // panggil file tampil data dashboard
    include "modules/dashboard/tampil_data.php";
}
// jika module yang dipilih "member"
elseif ($_GET['module'] == 'member') {
    // panggil file tampil data member
    include "modules/member/tampil_data.php";
}
// jika module yang dipilih "form_entri_member"
elseif ($_GET['module'] == 'form_entri_member') {
    // panggil file form entri member
    include "modules/member/form_entri.php";
}
// jika module yang dipilih "form_ubah_member"
elseif ($_GET['module'] == 'form_ubah_member') {
    // panggil file form ubah member
    include "modules/member/form_ubah.php";
}
// jika module yang dipilih "tampil_detail_member"
elseif ($_GET['module'] == 'tampil_detail_member') {
    // panggil file tampil detail member
    include "modules/member/tampil_detail.php";
}
// jika module yang dipilih "tampil_pencarian_member"
elseif ($_GET['module'] == 'tampil_pencarian_member') {
    // panggil file tampil pencarian member
    include "modules/member/tampil_pencarian.php";
}
// jika module yang dipilih "laporan"
elseif ($_GET['module'] == 'laporan') {
    // panggil file form filter laporan
    include "modules/laporan/form_filter.php";
}
// jika module yang dipilih "tentang"
elseif ($_GET['module'] == 'tentang') {
    // panggil file tampil data tentang
    include "modules/tentang/tampil_data.php";
}
