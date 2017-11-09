<?php
include_once ('config/koneksi.php');

//$q = trim(strip_tags($_GET['term'])); // variabel $q untuk mengambil inputan user
$q = $_GET['term'];
$sql = mysqli_query($konek,"SELECT * FROM tbl_karyawan_all WHERE noreg LIKE '%".$q."%'"); // menampilkan data yg ada didatabase yg sesuai dengan inputan user
while ($data = mysqli_fetch_array($sql)){
	//$result[] = htmlentities(stripslashes($data['nm_jabatan_eks'])); // manempilkan nama jabatan
		
		$row['value'] =$data['noreg'];
		$row['nama_aset'] = $data['nama_aset'];
		$row['cluster'] = $data['cluster'];
		$row['koordinator'] = $data['koordinator'];
		$row['area'] = $data['area'];
		$row['merk'] = $data['merk'];
		$row['type'] = $data['type'];
		$row['warna']	= $data['warna'];
		$row['keterangan']= $data['keterangan'];
		$row['serial_number']	= $data['serial_number'];
		$row['nomor_proposal'] = $data['nomor_proposal'];
		$row_set[] =$row;
}
//echo json_encode($result);
echo json_encode($row_set);
?>