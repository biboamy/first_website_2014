<?php
$src = imagecreatefrompng($_FILES['file']['tmp_name']);
$src_w = imagesx($src);
$src_h = imagesy($src);
if($src_w > $src_h){
  $thumb_w = 90;
  $thumb_h = intval($src_h / $src_w * 90);
}else{
  $thumb_h = 90;
  $thumb_w = intval($src_w / $src_h * 90);
}

$thumb = imagecreatetruecolor($thumb_w, $thumb_h);

imagecopyresampled($thumb, $src, 0, 0, 0, 0, $thumb_w, $thumb_h, $src_w, $src_h);

imagepng($thumb, "thumb/".$_FILES['file']['name']);

copy($_FILES['file']['tmp_name'], "images/" . $_FILES['file']['name']); 
?>