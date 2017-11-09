<?php
/*
* herry prasetyo 
* 2017 New Content
*/
//jika user belum melakukan login 
    if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
        echo "<link =\"css/style_login.css\" type=\"text/css\" rel=\"stylesheet\">
         <p class=\"error-code\">
                         404
                </p>

<p class=\"not-found\">Not<br/>Found</p>

<div class=\"clear\"></div>
<div class=\"content\">
    Anda harus login untuk masuk ke beranda.
    <br>
    <a href=\"index.php\">Go Home</a>
    or
    <br>
    <br>
</div>";
}
else{
    include "config/koneksi.php";
    include "config/function.php";
    
    //home beranda 
    if($_GET['module']=='beranda'){
        if($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
            include "modul/mod_beranda/beranda.php";
        }
    }
    
    //data user 
    elseif($_GET['module']=='user'){
        if($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
            include "modul/mod_user/user.php";
        }
    }
    
    //data karyawan 
    elseif($_GET['module']=='karyawan'){
        if($_SESSION['leveluser']=='admin'){
            include "modul/mod_karyawan/karyawan.php";
        }
    }
    
    //data module 
    elseif($_GET['module']=='modul'){
        if($_SESSION['leveluser']=='admin'){
            include "modul/mod_modul/modul.php";
        }
    }
    
    //data aset 
    elseif($_GET['module']=='aset') {
        if($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
            include "modul/mod_aset/aset.php";
        }
    }

    //data jenis aset 
    elseif ($_GET['module']=='jenis') {
        if($_SESSION['leveluser']=='admin'){
            include "modul/mod_jaset/jenis_aset.php";
        }
    }

    //data forum
    elseif($_GET['module']=='forum') {
        if($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
            include "modul/mod_forum/forum.php";
        }     
    }

    //data file history
    elseif ($_GET['module']=='history') {
        if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user') {
            include "modul/mod_history/history.php";
        }
    }

    //data area
    elseif($_GET['module']=='area') {
        if($_SESSION['leveluser']=='admin') {
            include "modul/mod_area/area.php";
        }
    }
    
    //data mutasi 
    elseif($_GET['module']=='mutasi'){
        if($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
            include "modul/mod_mutasi/mutasi.php";
        }
    }

    //data tanda terima 
    elseif($_GET['module']=='tandaterima'){
        if($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
            include "modul/mod_tandaterima/tandaterima.php";
        }
    }

    //data galeri photo
    elseif($_GET['module']=='galeri'){
        if($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
            include "modul/mod_galeri/galeri.php";
        }
    }
    
    
  else{
        echo "<meta http-equiv='refresh' content='0; url=404new.php'>";
    }
}


