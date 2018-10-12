<?php
	session_start();
	if (!isset($_SESSION['login']))
		header('Location: index.php');
	include('configdb.php');
	$alternatif = $_POST['alternatif'];
	$jabatan = $_POST['jabatan']; 
	$alamat = $_POST['alamat'];
	$hp = $_POST['hp'];
	
	$result = $mysqli->query("INSERT INTO `alternatif` (`id_alternatif`, `alternatif`, `jabatan`, `alamat`, `hp`) 
								VALUES (NULL, '".$alternatif."', '".$jabatan."', '".$alamat."', '".$hp."');");
	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		header('Location: karyawan.php');
	}
?>