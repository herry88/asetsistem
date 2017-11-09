<?php
//pembaharuan 
include_once ('config/koneksi.php');

//$q = trim(strip_tags($_GET['term'])); // variabel $q untuk mengambil inputan user
$q = $_GET['term'];
$sql = mysqli_query($konek,"SELECT * FROM input_aset WHERE no_aset LIKE '%".$q."%'"); // menampilkan data yg ada didatabase yg sesuai dengan inputan user
while ($data = mysqli_fetch_array($sql)){
	//$result[] = htmlentities(stripslashes($data['nm_jabatan_eks'])); // manempilkan nama jabatan
		
		//$row['value']	=$data['kode_barang'];
		$row['value']	=$data['no_aset'];
		$row['nama_aset'] = $data['nama_aset'];
		$row['tgl_terima'] = $data['tgl_terima'];
		$row['noreg'] = $data['noreg'];
		$row['pic']	= $data['pic'];
		$row['area']	= $data['area'];
		$row['departemen'] = $data['departemen'];
		$row['koordinator']	=$data['koordinator'];
		$row['merk'] = $data['merk'];
		$row['type'] = $data['type'];
		$row['warna']	= $data['warna'];
		$row['serial_number']	= $data['serial_number'];
		$row['nomor_proposal']	= $data['nomor_proposal'];
		$row['keterangan']	= $data['keterangan'];
		$row_set[]		=$row;
}
//echo json_encode($result);
echo json_encode($row_set);
?>