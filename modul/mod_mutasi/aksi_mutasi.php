<?php 
session_start();
// function error_404(){
//         
//         <link href=../../css/style_login.css type=text/css rel=stylesheet>
//         <p class=error-code> 404</p>
//                 <p class=not-found>Not<br/>Found</p>
//                 <div class=clear></div>
//                 <div class=content>
//                 Silahkan untuk login terlebih dahulu.
//                 <br>
//                 <a href=index.php>Go Home</a>
//                 or
//                 <br>
//                 <br>
//         </div>
// }
 if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
                echo "<link href=\"../css/style_login.css\" type=\"text/css\" rel=\"stylesheet\">
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
        function InggrisTgl($tanggal){
                $tgl=substr($tanggal,0,2);
                $bln=substr($tanggal,3,2);
                $thn=substr($tanggal,6,4);
                $tanggal="$thn-$bln-$tgl";
                return $tanggal;
        }

        include "../../config/koneksi.php";
        include "../../config/function.php";
        //action         
        $module = $_GET['module'];
        $act = $_GET['act'];

        //Update AND Add
        if($module=='mutasi' AND $act=='update'){
              //deklarasikan Form mutasi  
                $id = $_POST['id'];
                $no_aset = $_POST['no_aset'];
                $nama_aset = $_POST['nama_aset'];
                $noreg = $_POST['noreg'];
                $pic = $_POST['karyawan'];
                $customer = $_POST['customer'];
                $karyawan  = $_POST['karyawan'];
                $koordinator = $_POST['koordinator'];
                $koordinator_awal = $_POST['koordinator_awal'];
                $kondisi  = $_POST['kondisi'];
                $area = $_POST['area'];
                $tgl_terima = $_POST['tgl_terima'];
                $departemen = $_POST['departemen'];
                $departemen_awal = $_POST['departemen_awal']; 
                $tgl_pindah = $_POST['tgl_pindah'];
                $keterangan = $_POST['keterangan'];

                $tglTerima = InggrisTgl($tgl_terima);
                $tglPindah = InggrisTgl($tgl_pindah);
        
        $querySave = "INSERT mutasi_aset SET id_input = '$id', 
                                             no_aset  ='$no_aset',
                                             nama_aset ='$nama_aset',
                                             koordinator = '$_POST[koordinator_awal]',
                                             koordinator_baru ='$koordinator',
                                             pic_awal = '$_POST[pic_awal]',
                                             pic_baru = '$karyawan',
                                             departemen_baru = '$departemen',
                                             noreg  = '$noreg', 
                                             tgl_terima = '$tgl_terima', 
                                             tgl_pindah = '$tglPindah',
                                             keterangan 	 = '$keterangan',
                                             area 		 = '$area',
                                             username = '$_SESSION[namauser]'";  
        mysqli_query($konek,$querySave);  
        
              
        
        $query = "UPDATE input_aset SET no_aset  ='$no_aset',
					nama_aset  	 ='$nama_aset', 
					status	   	 ='$kondisi',
					koordinator	 ='$koordinator',
					pic 		   = '$karyawan',
					departemen     = '$departemen',
					customer 	   = '$customer',
					noreg  		   = '$noreg', 
					tgl_terima 	   = '$tglTerima', 
					keterangan 	   = '$keterangan',
					area 		   = '$area',
					cluster		   = '$_POST[cluster]'
                          WHERE id_input = '$id'";

        mysqli_query($konek,$query);
        
        $queryHistory = "INSERT histori_aset SET no_aset = '$_POST[no_asetawal]', 
                                                 nama_aset = '$_POST[nama_asetawal]',
                                                 noreg     = '$_POST[noreg_awal]',
                                                 pic       = '$_POST[pic_awal]',
                                                 koordinator = '$_POST[koordinator_awal]',
                                                 area       = '$_POST[area_awal]', 
                                                 customer   = '$_POST[customer_awal]',
                                                 cluster    = '$_POST[cluster_awal]',
                                                 tgl_terima 	   = '$tglTerima',
                                                 keterangan 	   = '$_POST[keterangan_awal]',
                                                 id_input = '$id'";
        mysqli_query($konek, $queryHistory);
        echo "$queryHistory";
        
        header("location:../../media.php?module=".$module);
        }


}
