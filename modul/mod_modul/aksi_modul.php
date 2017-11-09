<?php
session_start();
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo "<link href='http://fonts.googleapis.com/css?family=Creepster|Audiowide' rel='stylesheet' type='text/css'>
        <link href=\"../css/style_login.css\" rel='stylesheet' type=\"text/css\" />
<p class=\"error-code\">
    404
</p>

<p class=\"not-found\">Not<br/>Found</p>

<div class=\"clear\"></div>
<div class=\"content\">
    Silahkan login terlebih dahulu
    <br>
    <a href=\"index.php\">Go Back</a>
    
    <br>
    <br>
</div>";
}
else{
    include "../../config/koneksi.php";
    $module = $_GET['module'];
    $act = $_GET['act'];
    
    //input modul
    if($module=='modul' AND $act=='input'){
        //cari urutan akhir
        $query = mysqli_query($konek,"SELECT urutan FROM modul ORDER BY urutan DESC LIMIT 1");
        $r = mysqli_fetch_array($query);
        
        $urutan = $r['urutan']+1;
        $nama_modul = $_POST['nama_modul'];
        $link = $_POST['link'];
        
        $input  = "INSERT modul SET nama_modul = '$nama_modul',
                                    link = '$link',
                                    urutan = '$urutan'";
        mysqli_query($konek,$input);
        header("location:../../media.php?module=".$module);
    }
    
    //update modul
    elseif($module=='modul' AND $act=='update'){
        $id         = $_POST['id'];
        $urutan     = $_POST['urutan'];
        $nama_modul = $_POST['nama_modul'];
        $link       = $_POST['link'];
        $status     = $_POST['status'];
        $aktif      = $_POST['aktif'];
        
        $update = "UPDATE modul SET nama_modul  = '$nama_modul',
                                    link = '$link',
                                    urutan = '$urutan',
                                    status = '$status', 
                                    aktif = '$aktif'
                        WHERE id_modul = '$id'";
        mysqli_query($konek,$update);
        header("location:../../media.php?module=".$module);
    }
}

