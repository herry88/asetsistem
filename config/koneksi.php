<?php 
	$konek = mysqli_connect("localhost","root","","db_aset");
	
	if(!$konek){
		echo "Failed Connection";
	}
?>