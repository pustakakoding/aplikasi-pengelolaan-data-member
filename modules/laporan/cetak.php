<?php
// panggil file "autoload.inc.php" untuk load dompdf, libraries, dan helper functions
require_once("../../assets/vendor/dompdf/autoload.inc.php");
// mereferensikan Dompdf namespace
use Dompdf\Dompdf;

// panggil file "database.php" untuk koneksi ke database
require_once "../../config/database.php";
// panggil file "fungsi_tanggal_indo.php" untuk membuat format tanggal indonesia
require_once "../../helper/fungsi_tanggal_indo.php";

// ambil data GET dari tombol cetak
$tanggal_awal  = $_GET['tanggal_awal'];
$tanggal_akhir = $_GET['tanggal_akhir'];

// gunakan dompdf class
$dompdf = new Dompdf();
// setting options
$options = $dompdf->getOptions();
$options->setChroot(__DIR__. '/../..'); // tentukan path direktori aplikasi
$dompdf->setOptions($options);

// halaman HTML yang akan diubah ke PDF
$html = '<!DOCTYPE html>
        <html>
        <head>
          	<title>Laporan Data Member</title>
          	<link rel="stylesheet" href="../../assets/css/laporan.css">
        </head>
        <body>
			<div class="text-center">
				<h1>LAPORAN DATA MEMBER</h1>
				<h3>Tanggal ' . $tanggal_awal . ' s.d. ' . $tanggal_akhir . '</h3>
			</div>
          	<hr>
          	<div>
				<table class="table table-bordered" cellspacing="0">
					<thead>
						<tr>
						<th>No.</th>
						<th>ID Member</th>
						<th>Tanggal Gabung</th>
						<th>Jenis Member</th>
						<th>Nama Lengkap</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Email</th>
						<th>WhatsApp</th>
						<th>Foto</th>
						</tr>
					</thead>
					<tbody>';
// ubah format tanggal menjadi Tahun-Bulan-Hari (Y-m-d)
$tgl_awal  = date('Y-m-d', strtotime($tanggal_awal));
$tgl_akhir = date('Y-m-d', strtotime($tanggal_akhir));
// variabel untuk nomor urut tabel
$no = 1;
// sql statement untuk menampilkan data dari tabel "tbl_member"
$query = mysqli_query($mysqli, "SELECT * FROM tbl_member 
                                WHERE tanggal_gabung BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                ORDER BY id_member ASC")
								or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
// ambil jumlah data hasil query
$rows = mysqli_num_rows($query);

// cek hasil query
// jika data member ada
if ($rows <> 0) {
	// ambil data hasil query
	while ($data = mysqli_fetch_assoc($query)) {
		// tampilkan data
		$html .= '		<tr>
							<td width="30" align="center">' . $no++ . '</td>
							<td width="55" align="center">' . $data['id_member'] . '</td>
							<td width="65" align="center">' . date('d-m-Y', strtotime($data['tanggal_gabung'])) . '</td>
							<td width="60" align="center">' . $data['jenis_member'] . '</td>
							<td width="120">' . $data['nama_lengkap'] . '</td>
							<td width="60" align="center">' . $data['jenis_kelamin'] . '</td>
							<td width="140">' . $data['alamat'] . '</td>
							<td width="100">' . $data['email'] . '</td>
							<td width="75" align="center">' . $data['whatsapp'] . '</td>
							<td width="60" align="center"><img src="../../images/' . $data['foto_profil'] . '" alt="Foto Profil" class="foto-profil"></td>
						</tr>';
	}
}
// jika data member tidak ada
else {
	// tampilkan pesan data tidak tersedia
	$html .= '    		<tr><td width="1000" align="center" colspan="10">Tidak ada data yang tersedia</td></tr>';
}
$html .= '    		</tbody>
            	</table>
          	</div>
          	<div class="text-right mt-5">Bandar Lampung, ' . tanggal_indo(date('Y-m-d')) . '</div>
        </body>
        </html>';

// load html
$dompdf->loadHtml($html);
// mengatur ukuran dan orientasi kertas
$dompdf->setPaper('legal', 'landscape');
// mengubah dari HTML menjadi PDF
$dompdf->render();
// menampilkan file PDF yang dihasilkan ke browser dan berikan nama file "Laporan-Data-Member.pdf"
$dompdf->stream('Laporan-Data-Member-Tanggal-' . $tanggal_awal . '-sd-' . $tanggal_akhir . '.pdf', array('Attachment' => 0));
