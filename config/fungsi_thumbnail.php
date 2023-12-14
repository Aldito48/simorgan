<?php
error_reporting(0);
// Upload gambar untuk berita, album, galeri foto, banner
function Uploadfoto($fupload_name){
  //direktori gambar
  $vdir_upload = "../../img/pas_foto/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["pas_foto"]["type"];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["pas_foto"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
		case "image/gif":
			$im_src=imagecreatefromgif($vfile_upload); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$im_src=imagecreatefromjpeg($vfile_upload); 
			break;
	    case "image/png":
		case "image/x-png":
			$im_src=imagecreatefrompng($vfile_upload); 
			break;
  }
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 196 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=200){
  $dst_width = 200;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im,$vdir_upload.$fupload_name);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im,$vdir_upload.$fupload_name);
			break;
	    case "image/png":
		case "image/x-png":
  			imagepng($im,$vdir_upload.$fupload_name);
			break;
  }


  
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  
}
//============================================================

function Uploadfotoabsen($fupload_name){
  //direktori gambar
  $vdir_upload = "../../img/foto_absen/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["foto_absen"]["type"];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["foto_absen"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
		case "image/gif":
			$im_src=imagecreatefromgif($vfile_upload); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$im_src=imagecreatefromjpeg($vfile_upload); 
			break;
	    case "image/png":
		case "image/x-png":
			$im_src=imagecreatefrompng($vfile_upload); 
			break;
  }
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 196 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=200){
  $dst_width = 200;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im,$vdir_upload.$fupload_name);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im,$vdir_upload.$fupload_name);
			break;
	    case "image/png":
		case "image/x-png":
  			imagepng($im,$vdir_upload.$fupload_name);
			break;
  }

  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  
}
//============================================================

function UploadSurat($fupload_name){
  //direktori gambar
  $vdir_upload = "../../img/foto_surat/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["foto_surat"]["type"];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["foto_surat"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
		case "image/gif":
			$im_src=imagecreatefromgif($vfile_upload); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$im_src=imagecreatefromjpeg($vfile_upload); 
			break;
	    case "image/png":
		case "image/x-png":
			$im_src=imagecreatefrompng($vfile_upload); 
			break;
  }
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 400 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=1000){
  $dst_width = 1000;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im,$vdir_upload.$fupload_name);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im,$vdir_upload.$fupload_name);
			break;
	    case "image/png":
		case "image/x-png":
  			imagepng($im,$vdir_upload.$fupload_name);
			break;
  }

  imagedestroy($im_src);
  imagedestroy($im);
  
}

//
function UploadDisposisi($fupload_name){
  //direktori gambar
  $vdir_upload = "../../img/foto_disp/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["foto_disp"]["type"];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["foto_disp"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
		case "image/gif":
			$im_src=imagecreatefromgif($vfile_upload); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$im_src=imagecreatefromjpeg($vfile_upload); 
			break;
	    case "image/png":
		case "image/x-png":
			$im_src=imagecreatefrompng($vfile_upload); 
			break;
  }
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 400 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=1000){
  $dst_width = 1000;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im,$vdir_upload.$fupload_name);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im,$vdir_upload.$fupload_name);
			break;
	    case "image/png":
		case "image/x-png":
  			imagepng($im,$vdir_upload.$fupload_name);
			break;
  }

  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  
}

//=====================================================


function Uploadfotopeg($fupload_name){
  //direktori gambar
  $vdir_upload = "../../img/foto_peg/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["foto_peg"]["type"];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["foto_peg"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
		case "image/gif":
			$im_src=imagecreatefromgif($vfile_upload); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$im_src=imagecreatefromjpeg($vfile_upload); 
			break;
	    case "image/png":
		case "image/x-png":
			$im_src=imagecreatefrompng($vfile_upload); 
			break;
  }
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 400 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=1000){
  $dst_width = 1000;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im,$vdir_upload.$fupload_name);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im,$vdir_upload.$fupload_name);
			break;
	    case "image/png":
		case "image/x-png":
  			imagepng($im,$vdir_upload.$fupload_name);
			break;
  }

  imagedestroy($im_src);
  imagedestroy($im);
  
}
//=========================================


function Uploadfotouser($fupload_name){
  //direktori gambar
  $vdir_upload = "../../img/foto_user/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["foto"]["type"];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["foto"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
		case "image/gif":
			$im_src=imagecreatefromgif($vfile_upload); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$im_src=imagecreatefromjpeg($vfile_upload); 
			break;
	    case "image/png":
		case "image/x-png":
			$im_src=imagecreatefrompng($vfile_upload); 
			break;
  }
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 400 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=1000){
  $dst_width = 1000;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im,$vdir_upload.$fupload_name);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im,$vdir_upload.$fupload_name);
			break;
	    case "image/png":
		case "image/x-png":
  			imagepng($im,$vdir_upload.$fupload_name);
			break;
  }

  imagedestroy($im_src);
  imagedestroy($im);
  
}

function Uploadfotoktp($fupload_name){
  //direktori gambar
  $vdir_upload = "../../img/fotoktp/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fotoktp"]["type"];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fotoktp"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
		case "image/gif":
			$im_src=imagecreatefromgif($vfile_upload); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$im_src=imagecreatefromjpeg($vfile_upload); 
			break;
	    case "image/png":
		case "image/x-png":
			$im_src=imagecreatefrompng($vfile_upload); 
			break;
  }
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 400 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=1000){
  $dst_width = 1000;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im,$vdir_upload.$fupload_name);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im,$vdir_upload.$fupload_name);
			break;
	    case "image/png":
		case "image/x-png":
  			imagepng($im,$vdir_upload.$fupload_name);
			break;
  }

  imagedestroy($im_src);
  imagedestroy($im);
  
}

function Uploadfototamu($fupload_name){
  //direktori gambar
  $vdir_upload = "../../img/fototamu/";
  $vfile_upload = $vdir_upload . $fupload_name;
  $imageType = $_FILES["fototamu"]["type"];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fototamu"]["tmp_name"], $vfile_upload);

  //identitas file asli
  switch($imageType) {
		case "image/gif":
			$im_src=imagecreatefromgif($vfile_upload); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$im_src=imagecreatefromjpeg($vfile_upload); 
			break;
	    case "image/png":
		case "image/x-png":
			$im_src=imagecreatefrompng($vfile_upload); 
			break;
  }
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 400 pixel
  //Set ukuran gambar hasil perubahan
  if($src_width>=1000){
  $dst_width = 1000;
  } else {
  $dst_width = $src_width;
  }
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
   
  //Simpan gambar
  switch($imageType) {
		case "image/gif":
  			imagegif($im,$vdir_upload.$fupload_name);
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
  			imagejpeg($im,$vdir_upload.$fupload_name);
			break;
	    case "image/png":
		case "image/x-png":
  			imagepng($im,$vdir_upload.$fupload_name);
			break;
  }

  imagedestroy($im_src);
  imagedestroy($im);
  
}

?>
