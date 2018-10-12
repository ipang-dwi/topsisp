<?php
	@session_start();
	$_SESSION['judul'] = 'SPK BSBA';
	$_SESSION['welcome'] = 'SPK Untuk Menentukan Karyawan Terbaik Pada <br> Bakso Sehat Bakso Atom (BSBA) <br> Menggunakan Metode TOPSIS';
	$_SESSION['by'] = 'lab.firstplato.com';
	$mysqli = new mysqli('localhost','root','1717','topsisp');
	if($mysqli->connect_errno){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
?>