<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda telah keluar dari sistem'); window.location = 'index.php'</script>";
?>
