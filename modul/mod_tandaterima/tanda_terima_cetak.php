<?php
include_once "../../config/koneksi.php";
include_once "../../config/function.php";

function IndonesiaTgl($tanggal){
	$tgl=substr($tanggal,8,2);
	$bln=substr($tanggal,5,2);
	$thn=substr($tanggal,0,4);
	$tanggal="$tgl-$bln-$thn";
	return $tanggal;
}

if($_GET) {
	# Baca variabel URL
	$noNota = $_GET['noNota'];
	# Perintah untuk mendapatkan data dari tabel pembelian
	$mySql1 = "SELECT tanda_terima.*, input_aset.pic, users.username, users.gambar FROM tanda_terima 
				LEFT JOIN input_aset ON tanda_terima.noreg=input_aset.noreg
				LEFT JOIN users ON tanda_terima.username=users.username 
				WHERE tanda_terima.no_tandaterima='$noNota'";
    $myQry1= mysqli_query($konek,$mySql1);
    $kolomData = mysqli_fetch_array($myQry1);
}
else {
	echo "Nomor Transaksi Tidak Terbaca";
	exit;
	
}
?>
<html>
<head>
<title>.</title>
<link href="../styles/styles_cetak.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1 align="center" > TANDA TERIMA </h1>
<tr> <h2 align="center">
    <td width="160"><b>Area</b></td>
    <td width="10"><b>:</b></td>
    <td width="302"><?php echo $kolomData['area']; ?> <b>,</b></td>
	
	 <td width="160"><b>Cluster</b></td>
    <td width="10"><b>:</b></td>
    <td width="302"><?php echo $kolomData['cluster']; ?></td>
	
  </h2></tr>

<h2 align="left" > HRGA </h2>
<h2 align="left" > PT. Prasetia Dwidharma </h2>
<table width="500" border="0" cellspacing="1" cellpadding="4" class="table-print">
  <tr>
    <td width="190"><b>No. Tanda Terima : </b></td>
    <td width="302"><?php echo $kolomData['no_tandaterima']; ?></td>
  </tr>
  <tr>
    <!-- <td align="center">&nbsp;</td> -->
  </tr>
</table>
  <tr> <h2 align="right">
   <td width="160"><b>Tgl. Kirim Barang</b></td>
   <td width="10"><b>:</b></td>
   <td width="302"><?php echo IndonesiaTgl($kolomData['tgl_cetak']); ?></td>
  </h2> </tr>

<table class="table-list" width="1500" border="1" cellspacing="1" cellpadding="2">
  <tr> <h2>
    <td colspan="11" bgcolor="#CCCCCC"><strong>DAFTAR BARANG</strong></td>
  </h2></tr>
  <tr>
	<td width="35" align="center" bgcolor="#F5F5F5"><b><h2><center>No</center></h2></b></td>
    <td width="200" bgcolor="#F5F5F5"><b><h2><center>Nama Aset</center></h2></b></td>
	<td width="50" bgcolor="#F5F5F5"><b><h2><center>Merk</center></h2></b></td>
    <td width="75" bgcolor="#F5F5F5"><b><h2><center>Type</center></h2></b></td>
	<td width="50" bgcolor="#F5F5F5"><b><h2><center>Warna</center></h2></b></td>
	<td width="95" bgcolor="#F5F5F5"><b><h2><center>Serial Number</center></h2></b></td>
	<td width="300" bgcolor="#F5F5F5"><b><h2><center>Nomor Aset </center></h2></b></td>
	<td width="200" bgcolor="#F5F5F5"><b><h2><center>No Proposal</center></h2></b></td>
	<td width="300" bgcolor="#F5F5F5"><b><h2><center>Keterangan</center></h2></b></td>
  </tr>
  
<?php
// Variabel data


// Skrip untuk mengambil data daftar barang yang dicatat
$mySql ="SELECT tanda_terima.*,
					tanda_terima.no_tandaterima,
					tanda_terima.noreg,
					tanda_terima.tgl_cetak,
					tanda_terima.area,
					tanda_terima.cluster,
					tanda_terima.koordinator,
					tbl_karyawan_all.nama_lengkap,
					tanda_terima_item.merk,
					tanda_terima_item.type,
					tanda_terima_item.warna,
					tanda_terima_item.keterangan,
					input_aset.nama_aset,
					input_aset.serial_number,
					input_aset.nomor_proposal,
					input_aset.no_aset,
                    users.nama_lengkap,
					users.username,
                    users.gambar
					
			FROM tanda_terima
				INNER JOIN tanda_terima_item ON tanda_terima.no_tandaterima = tanda_terima_item.no_tandaterima
				INNER JOIN tbl_karyawan_all ON tanda_terima.noreg = tbl_karyawan_all.noreg
				INNER JOIN input_aset ON tanda_terima_item.no_aset = input_aset.no_aset
				INNER JOIN `users` ON `users`.username = tanda_terima.username
				WHERE tanda_terima_item.no_tandaterima='$noNota' 
				ORDER BY tanda_terima_item.no_aset";
				
$myQry = mysqli_query($konek, $mySql); 
$nomor=0; 
while($myData = mysqli_fetch_array($myQry)) {
	$nomor++;
?>
  <tr>
    <td align="center"><h2><?php echo $nomor; ?></h2></td>
    <td><h2><?php echo $myData['nama_aset']; ?></h2></td>
	<td><h2><?php echo $myData['merk']; ?></h2></td>
	<td><h2><?php echo $myData['type']; ?></h2></td>
	<td><h2><?php echo $myData['warna']; ?></h2></td>
	<td><h2><?php echo $myData['serial_number']; ?></h2></td>
	<td><h2><?php echo $myData['no_aset']; ?></h2></td>
	<td><h2><?php echo $myData['nomor_proposal']; ?></h2></td>	
	<td><h2><?php echo $myData['keterangan']; ?></h2></td>
  </tr>
  <?php } ?>
  
</table>
<tr><td>&nbsp;</td> </tr>
<tr> <h2 align="right">
   <td width="160"><b>Tgl. Terima</b></td>
   <td width="10"><b>:</b></td>
   <td width="302"><b>....................</b></td>
  </h2> </tr>
  

 <!-- =========tabel tandatangan========= -->
  <head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
	
}
</style>
<h2></h2>

	<table align ="left" style="width:20%;" border="0">
		<th>
			<table style="width:100%;">
				<tr>
					<th colspan="2"><center>Menyerahkan,</center></th>
				</tr>
				<tr>
					<th>
					<center>
						<img src= "../../img-ttd/<?php echo $kolomData['gambar']; ?>" height="90"/>
					</center>
					</th>
				</tr>
				<tr>
					<th><center><?php echo $kolomData['username']; ?></center></th>
				</tr>
			</table>
		</th>
	</table>
<table align ="right" style="width:20%;" border="0">
	<tr>
		<th>
			<table align = "center" style="width:100%;">	
				<tr>
					<th><center>Karyawan Penerima,</center></th>
				</tr>
				<tr>
					<th><center><img src="../../images/putih.jpg" height="90"/></center></th>
				</tr>
				<tr>
					
					<th><left>Noreg :</left><?php echo $kolomData['noreg']; ?></th>
				</tr>
				<tr>
				<th><left>Nama :</left><?php echo $kolomData['pic']; ?></th>
				</tr>
			</table>
		</th>
	</tr>
</table>

<!--<table style="width:100%">
  <tr>
    <th  width = "200px" > <center>Menyerahkan,</center></th>
	<th style="border-style:None;"></th>
	<th width="600px" > <center>Penerima,</center></th>
  </tr>
  <tr>
    <td><center>55577855</center></td>
	<td><center>&nbsp;</center></td>
	<td><center>55577855</center></td>
  </tr>
</table>-->
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<img src="../../images/btn_print.png" height="20" onClick="javascript:window.print()" />
</body>
</html>