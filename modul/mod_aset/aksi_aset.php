<?php
/*
* Herry Prasetyo 2017
*/
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "<link href=\"../../css/style_login.css\" type=\"text/css\" rel=\"stylesheet\">
        <p class=\"error-code\"> 404</p>

    <p class=\"not-found\">Not<br/>Found</p>

    <div class=\"clear\"></div>
    <div class=\"content\">
        Silahkan untuk login terlebih dahulu.
        <br>
        <a href=\"index.php\">Go Home</a>
        or
        <br>
        <br>
</div>";
}
else{
		include "../../config/koneksi.php";
		include "../../config/function.php";
		include "../../config/thumbnail.php";

		# Fungsi untuk membalik tanggal dari format Indo (d-m-Y) -> English (Y-m-d)
		function InggrisTgl($tanggal){
			$tgl=substr($tanggal,0,2);
			$bln=substr($tanggal,3,2);
			$thn=substr($tanggal,6,4);
			$tanggal="$thn-$bln-$tgl";
			return $tanggal;
		}

		$module = $_GET['module'];
		$act  = $_GET['act'];

	//fungsi menghapus data aset 
	if($module=='aset' AND $act=='hapus'){
		$query = "SELECT gambar1, gambar2, gambar3, gambar4 FROM input_aset WHERE id_input = '$_GET[id]'";
		$hapus = mysqli_query($konek, $query);
		$r = mysqli_fetch_array($hapus);

		if ($r['gambar1']!=''){
			//hapus file gambar yang berhubungan dengan input aset 
			unlink("../../../foto_aset/$namafile"); 
			

			 // hapus data berita di database 
      mysqli_query($konek, "DELETE FROM input_aset WHERE id_input='$_GET[id]'");  
		}
		else{
			mysqli_query($konek, "DELETE FROM input_aset WHERE id_input='$_GET[id]'");
		}
		header("location:../../media.php?module=".$module);
	} 	
	
	//fungsi untuk menambahkan data aset	
	elseif($module=='aset' AND $act=='input'){
		

			$no_aset 	   = $_POST['no_aset'];
			$nama_aset 	   = $_POST['nama_aset'];
			$merk 		   = $_POST['merk'];
			$type 		   = $_POST['type'];
			$jenis 		   = $_POST['jenis_aset'];
			$kondisi 	   = $_POST['kondisi'];
			$no_proposal   = $_POST['no_proposal'];
			$harga_real    = $_POST['harga_real'];
			$harga 		   = $_POST['harga']; 
			$warna 	       = $_POST['warna'];
			$serial_number = $_POST['serial_number'];
			$noreg 		   = $_POST['noreg']; 			 
			$karyawan  	   = $_POST['karyawan'];
			$area		   = $_POST['area'];
			$customer	   = $_POST['customer'];
			$koordinator   = $_POST['koordinator'];
			$departemen	   = $_POST['departemen'];
			$cluster 	   = $_POST['cluster'];
			$tgl_terima    = $_POST['tgl_terima']; 	
			$keterangan    = $_POST['keterangan'];
		
			$tglTerima = InggrisTgl($tgl_terima);

			$jumlah = count($_FILES['fupload']['name']); 
			$fupload = array(); 
			for ($i=0; $i< $jumlah; $i++) { 
				$file_name = $_FILES['fupload']['name'][$i];
				$tmp_name = $_FILES['fupload']['tmp_name'][$i];
				resize_image($tmp_name, 200, 200, "../../foto_aset/".$file_name);
				// move_uploaded_file($tmp_name,"../../foto_aset/".$file_name);
				$fupload[$i] = $file_name;
			}


			//query simpan ke dalam database
			$input = "INSERT input_aset SET no_aset    	 ='$no_aset',
											nama_aset  	 ='$nama_aset',
											merk       	 ='$merk', 
											type       	 ='$type', 
											jenis_aset	 ='$jenis',
											status	   	 ='$kondisi',
											koordinator	 ='$koordinator',
											nomor_proposal = '$no_proposal',
											pic 		   = '$karyawan',
											departemen     = '$departemen',
											customer 	   = '$customer',
											noreg  		   = '$noreg', 
											serial_number  = '$serial_number', 
											warna 		   = '$warna', 
											harga_real 	   = '$harga_real',
											harga 		   = '$harga', 
											tgl_terima 	   = '$tglTerima', 
											keterangan 	   = '$keterangan',
											area 		   = '$area',
											cluster		   = '$cluster',
											gambar1		   ='$fupload[0]',
											gambar2		   = '$fupload[1]',
											gambar3		   = '$fupload[2]',
											gambar4        = '$fupload[3]' ";

							//echo $input;				
			mysqli_query($konek, $input);
			//  if ($query) {
			//  		$query_history = "INSERT histori_aset SET noreg       ='$noreg',
			//  												  no_aset     = '$no_aset',
			//  												  nama_aset   ='$nama_aset',
			// 												  pic 		  = '$karyawan',
			//  												  area 		  = '$area',
			//  												  customer    = '$customer',
			// 												  cluster     = '$cluster',
			// 												  tgl_terima  = '$tglTerima', 
			// 												  koordinator = '$koordinator',
			// 												  keterangan  = '$keterangan'";
			// 		mysqli_query($konek, $query_history);
			//  }
			 header("location:../../media.php?module=".$module);
	}


	//fungsi untuk mengupdate data aset
	elseif($module=='aset' AND $act=='update'){
		$id = $_POST['id'];
		$no_aset 	   = $_POST['no_aset'];
		$nama_aset 	   = $_POST['nama_aset'];
		$merk 		   = $_POST['merk'];
		$type 		   = $_POST['type'];
		$jenis 		   = $_POST['jenis_aset'];
		$kondisi 	   = $_POST['kondisi'];
		$no_proposal   = $_POST['no_proposal'];
		$harga_real    = $_POST['harga_real'];
		$harga 		   = $_POST['harga']; 
		$warna 	       = $_POST['warna'];
		$serial_number = $_POST['serial_number'];
		$noreg 		   = $_POST['noreg']; 			 
		$karyawan  	   = $_POST['karyawan'];
		$area		   = $_POST['area'];
		$customer	   = $_POST['customer'];
		$koordinator   = $_POST['koordinator'];
		$departemen	   = $_POST['departemen'];
		$cluster 	   = $_POST['cluster'];
		$tgl_terima    = $_POST['tgl_terima']; 	
		$keterangan    = $_POST['keterangan'];
	
		$tglTerima = InggrisTgl($tgl_terima);

		$jumlah = count($_FILES['fupload']['name']); 
		$fupload = array(); 
		for ($i=0; $i< $jumlah; $i++) { 
			$file_name = $_FILES['fupload']['name'][$i];
			$tmp_name = $_FILES['fupload']['tmp_name'][$i];
			resize_image($tmp_name, 200, 200, "../../foto_aset/".$file_name);
			// move_uploaded_file($tmp_name,"../../foto_aset/".$file_name);
			$fupload[$i] = $file_name;
		}


		//query simpan ke dalam database
		$update = "UPDATE input_aset SET no_aset    	 ='$no_aset',
										nama_aset  	 ='$nama_aset',
										merk       	 ='$merk', 
										type       	 ='$type', 
										jenis_aset	 ='$jenis',
										status	   	 ='$kondisi',
										koordinator	 ='$koordinator',
										nomor_proposal = '$no_proposal',
										pic 		   = '$karyawan',
										departemen     = '$departemen',
										customer 	   = '$customer',
										noreg  		   = '$noreg', 
										serial_number  = '$serial_number', 
										warna 		   = '$warna', 
										harga_real 	   = '$harga_real',
										harga 		   = '$harga', 
										tgl_terima 	   = '$tglTerima', 
										keterangan 	   = '$keterangan',
										area 		   = '$area',
										cluster		   = '$cluster',
										gambar1		   ='$fupload[0]',
										gambar2		   = '$fupload[1]',
										gambar3		   = '$fupload[2]',
										gambar4        = '$fupload[3]' 
					WHERE id_input = '$id'";
		mysqli_query($konek, $update);

		header("location:../../media.php?module=".$module);
	}
}