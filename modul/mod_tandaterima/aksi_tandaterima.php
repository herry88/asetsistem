<?php 
session_start();
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


        $module = $_GET['module'];
        $act = $_GET['act'];

        if($module=='tandaterima' AND $act=='input'){
            if(isset($_POST['btnadd'])){
                $no_aset    = $_POST['no_aset'];
                $tgl_kirim  = $_POST['tgl_kirim'];
                $noreg      = $_POST['noreg'];
                $merk       = $_POST['merk'];
                $type       = $_POST['type'];
                $warna      = $_POST['warna'];
                $serial_number = $_POST['serial_number'];
                $no_proposal = $_POST['no_proposal'];
                $karyawan = $_POST['karyawan'];
                $area = $_POST['area'];
                $cluster = $_POST['cluster'];
                $koordinator = $_POST['koordinator'];
                $nama_aset = $_POST['nama_aset'];
                $no_tandaterima = $_POST['no_tandaterima'];
                $keterangan = $_POST['keterangan'];

                $tglKirim = InggrisTgl($tgl_kirim);
                //insert to tmp_tandaterima 
                $query = "INSERT tmp_tandaterima SET no_tandaterima = '$no_tandaterima', 
                                                     no_aset = '$no_aset', 
                                                     nama_aset = '$nama_aset', 
                                                     merk = '$merk', 
                                                     type = '$type',
                                                     warna = '$warna',
                                                     serial_number = '$serial_number', 
                                                     no_proposal = '$no_proposal', 
                                                     keterangan = '$keterangan',
                                                     username = '$_SESSION[namauser]'";
                mysqli_query($konek, $query);
                header("location:../../media.php?module=".$module);
            } 
            //insert to tandaterima 
            elseif(isset($_POST['btnsimpan'])){
                $no_aset    = $_POST['no_aset'];
                $tgl_kirim  = $_POST['tgl_kirim'];
                $noreg      = $_POST['noreg'];
                $merk       = $_POST['merk'];
                $type       = $_POST['type'];
                $warna      = $_POST['warna'];
                $serial_number = $_POST['serial_number'];
                $no_proposal = $_POST['no_proposal'];
                $karyawan = $_POST['karyawan'];
                $area = $_POST['area'];
                $cluster = $_POST['cluster'];
                $koordinator = $_POST['koordinator'];
                $nama_aset = $_POST['nama_aset'];
                $no_tandaterima = $_POST['no_tandaterima'];
                $keterangan = $_POST['keterangan'];

                $no_tandaterima = $_POST['no_tandaterima'];
                $tglKirim = InggrisTgl($tgl_kirim);
                $mysql = "INSERT tanda_terima SET     no_tandaterima = '$no_tandaterima',
                                                      tgl_cetak = '$tglKirim',
                                                      noreg = '$noreg',
                                                      koordinator = '$koordinator', 
                                                      area = '$area',
                                                      cluster = '$cluster', 
                                                      username = '$_SESSION[namauser]'";
                $itemQry =  mysqli_query($konek, $mysql);
                // echo "$itemQry";

                    $tmpSql = "SELECT * FROM tmp_tandaterima WHERE username = '$_SESSION[namauser]'";
                    $tmpQry =  mysqli_query($konek,$tmpSql);
                    while($t  = mysqli_fetch_array($tmpQry)){
                          $datanotandaterima = $t['no_tandaterima'];
                          $datanoaset = $t['no_aset']; 
                          $datatype = $t['type'];
                          $datawarna = $t['warna'];
                          $datamerk  = $t['merk'];
                          $dataketerangan = $t['keterangan'];  

                    $item = "INSERT tanda_terima_item SET no_tandaterima = '$datanotandaterima',
                                                          no_aset = '$datanoaset', 
                                                          type = '$datatype',
                                                          warna = '$datawarna', 
                                                          merk = '$datamerk',
                                                          keterangan = '$dataketerangan'";
                   $gw = mysqli_query($konek, $item);    
                //    echo "$gw";  
                    }

                    $deletetmp = "DELETE FROM tmp_tandaterima WHERE username = '$_SESSION[namauser]'";
                    mysqli_query($konek, $deletetmp);

                    //refresh
                    echo "<script>";
                        echo "window.open('tanda_terima_cetak.php?noNota=$no_tandaterima',width=330,
                                   height=330,left=100, top=25)";
                    echo "</script>";
            }
            header("location:../../media.php?module=".$module);
        }

        elseif($module=='tandaterima' AND $act=='delete'){
            $myDel = "DELETE FROM tmp_tandaterima WHERE id = '$_GET[id]' AND username = '$_SESSION[namauser]'";
            mysqli_query($konek, $myDel);
            header("location:../../media.php?module=".$module);
        }
}