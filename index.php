<!--
	index.php adalah file yang dipanggil pertama kali saat user mengakses sebuah alamat website
	disini file index.php hanya digunakan untuk pengalihan halaman 
-->
<?php
// alihkan ke halaman login
header('location: main.php?module=dashboard');
?>