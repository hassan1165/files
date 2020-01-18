<?php 

$file_name = $_GET['file_id'];

unlink("txt_files/".$file_name);

header("location: index.php");
 ?>