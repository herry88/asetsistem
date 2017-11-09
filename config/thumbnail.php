<?php
// Upload gambar untuk aset
function UploadFoto($fupload_name, $folder, $ukuran){
  // File gambar yang di upload
  $file_upload = $folder . $fupload_name;

  // Simpan gambar dalam ukuran aslinya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $file_upload);

  // Identitas file asli
  $gbr_asli = imagecreatefromjpeg($file_upload);
  $lebar    = imageSX($gbr_asli);
  $tinggi 	= imageSY($gbr_asli);

  // Simpan dalam versi thumbnail
  $thumb_lebar  = $ukuran;
  $thumb_tinggi = ($thumb_lebar/$lebar) * $tinggi;

  // Proses perubahan dimensi ukuran
  $gbr_thumb = imagecreatetruecolor($thumb_lebar,$thumb_tinggi);
  imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $thumb_lebar, $thumb_tinggi, $lebar, $tinggi);

  // Simpan gambar thumbnail
  imagejpeg($gbr_thumb,$folder . "small_" . $fupload_name);
  
  // Hapus gambar di memori komputer
  imagedestroy($gbr_asli);
  imagedestroy($gbr_thumb);
}

function resize_image($image, $new_width, $new_height, $destination){
  list($width, $height) = getimagesize($image);

  $gbr_asli = imagecreatefromjpeg($image);
  $gbr_thumb = imagecreatetruecolor($new_width,$new_height);
    
    imagecopyresampled($gbr_thumb, $gbr_asli, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    imagejpeg($gbr_thumb,$destination, 100);

    return $gbr_thumb;
}
?>
