<?php
// pengecekan menu aktif
// jika menu dashboard dipilih, menu dashboard aktif
if ($_GET['module'] == 'dashboard') { ?>
	<div class="item active d-flex align-items-center">
		<i class="fas fa-chart-line"></i>
		<a href="?module=dashboard"> Dashboard </a>
	</div>
<?php
}
// jika tidak dipilih, menu dashboard tidak aktif
else { ?>
	<div class="item d-flex align-items-center">
		<i class="fas fa-chart-line"></i>
		<a href="?module=dashboard"> Dashboard </a>
	</div>
<?php
}

// jika menu member (tampil data / tampil detail / form entri / form ubah / tampil pencarian) dipilih, menu member aktif
if ($_GET['module'] == 'member' || $_GET['module'] == 'tampil_detail_member' || $_GET['module'] == 'form_entri_member' || $_GET['module'] == 'form_ubah_member' || $_GET['module'] == 'tampil_pencarian_member') { ?>
	<div class="item active d-flex align-items-center">
		<i class="far fa-user"></i>
		<a href="?module=member"> Member </a>
	</div>
<?php
}
// jika tidak dipilih, menu member tidak aktif
else { ?>
	<div class="item d-flex align-items-center">
		<i class="far fa-user"></i>
		<a href="?module=member"> Member </a>
	</div>
<?php
}

// jika menu laporan dipilih, menu laporan aktif
if ($_GET['module'] == 'laporan') { ?>
	<div class="item active d-flex align-items-center">
		<i class="far fa-file-alt"></i>
		<a href="?module=laporan"> Laporan </a>
	</div>
<?php
}
// jika tidak dipilih, menu laporan tidak aktif
else { ?>
	<div class="item d-flex align-items-center">
		<i class="far fa-file-alt"></i>
		<a href="?module=laporan"> Laporan </a>
	</div>
<?php
}

// jika menu tentang aplikasi dipilih, menu tentang aplikasi aktif
if ($_GET['module'] == 'tentang') { ?>
	<div class="item active d-flex align-items-center">
		<i class="fas fa-info"></i>
		<a href="?module=tentang"> Tentang Aplikasi </a>
	</div>
<?php
}
// jika tidak dipilih, menu tentang aplikasi tidak aktif
else { ?>
	<div class="item d-flex align-items-center">
		<i class="fas fa-info"></i>
		<a href="?module=tentang"> Tentang Aplikasi </a>
	</div>
<?php
}
?>