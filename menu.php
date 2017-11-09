<?php
include "config/koneksi.php";

if ($_SESSION['leveluser']=='admin'){
  $query = "SELECT * FROM modul WHERE aktif='Y' ORDER BY urutan";
  $hasil = mysqli_query($konek, $query);
  while ($m=mysqli_fetch_array($hasil)){  
    echo "<li><a class=\"ajax-link\" href=\"$m[link]\"><i
                                    class=\"glyphicon glyphicon-align-justify\"></i><span> $m[nama_modul] </span></a></li>";
  }
}
elseif ($_SESSION['leveluser']=='user'){
  $query = "SELECT * FROM modul WHERE status='user' and aktif='Y' ORDER BY urutan";
  $hasil = mysqli_query($konek, $query);
  while ($m=mysqli_fetch_array($hasil)){  
    echo "<li><a class=\"ajax-link\" href=\"$m[link]\"><i
                                    class=\"glyphicon glyphicon-align-justify\"></i><span> $m[nama_modul] </span></a></li>";
  }
} 
?>
