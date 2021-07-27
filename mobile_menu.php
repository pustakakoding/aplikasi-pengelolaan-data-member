<?php
// pengecekan menu aktif
// jika menu dashboard dipilih, menu dashboard aktif
if ($_GET['module'] == 'dashboard') { ?>
    <div class="col-3 item-menu active text-center">
        <a href="?module=dashboard">
            <i class="fas fa-chart-line"></i>
        </a>
    </div>
<?php
}
// jika tidak dipilih, menu dashboard tidak aktif
else { ?>
    <div class="col-3 item-menu text-center">
        <a href="?module=dashboard">
            <i class="fas fa-chart-line"></i>
        </a>
    </div>
<?php
}

// jika menu member (tampil data / tampil detail / form entri / form ubah / tampil pencarian) dipilih, menu member aktif
if ($_GET['module'] == 'member' || $_GET['module'] == 'tampil_detail_member' || $_GET['module'] == 'form_entri_member' || $_GET['module'] == 'form_ubah_member' || $_GET['module'] == 'tampil_pencarian_member') { ?>
    <div class="col-3 item-menu active text-center">
        <a href="?module=member">
            <i class="far fa-user"></i>
        </a>
    </div>
<?php
}
// jika tidak dipilih, menu member tidak aktif
else { ?>
    <div class="col-3 item-menu text-center">
        <a href="?module=member">
            <i class="far fa-user"></i>
        </a>
    </div>
<?php
}

// jika menu laporan dipilih, menu laporan aktif
if ($_GET['module'] == 'laporan') { ?>
    <div class="col-3 item-menu active text-center">
        <a href="?module=laporan">
            <i class="far fa-file-alt"></i>
        </a>
    </div>
<?php
}
// jika tidak dipilih, menu laporan tidak aktif
else { ?>
    <div class="col-3 item-menu text-center">
        <a href="?module=laporan">
            <i class="far fa-file-alt"></i>
        </a>
    </div>
<?php
}

// jika menu tentang aplikasi dipilih, menu tentang aplikasi aktif
if ($_GET['module'] == 'tentang') { ?>
    <div class="col-3 item-menu active text-center">
        <a href="?module=tentang">
            <i class="fas fa-info"></i>
        </a>
    </div>
<?php
}
// jika tidak dipilih, menu tentang aplikasi tidak aktif
else { ?>
    <div class="col-3 item-menu text-center">
        <a href="?module=tentang">
            <i class="fas fa-info"></i>
        </a>
    </div>
<?php
}
?>