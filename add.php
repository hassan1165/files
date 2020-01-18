<?php 
require 'db.php';

if (isset($_POST['submit'])) {
	
	$file_name = $_POST['file_name'];
	$file_txt = $_POST['file_txt'];


	$myfile = fopen("txt_files/".$file_name.".txt", "w") or die("Unable to open file!");

	fwrite($myfile, $file_txt);
	fclose($myfile);


	if(isset($_POST['submit'])){

        $res=mysqli_query($dblink, "INSERT INTO files_tb (name) VALUES ('".$_POST['file_name'].".txt')");

        header("location: index.php");

    }

	
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="post" action="">
	<input type="text" name="file_name" placeholder="File Name">
	<input type="text" name="file_txt" placeholder="File Text">

	<input type="submit" name="submit">
</form>
</body>
</html>