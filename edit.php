<?php 
require 'db.php';

$sql = "select * from files_tb where id='".$_GET['file_id']."'";

$result = $dblink->query($sql);

	$file_name = null;

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                	$file_name = $row['name'];

                }
            }

    $myfile = fopen("txt_files/".$file_name, "r") or die("Unable to open file!");

	$file_data = fread($myfile, filesize("txt_files/".$file_name));

	fclose($myfile);



if (isset($_POST['submit'])) {
	
	$file_txt = $_POST['file_txt'];

	$myfile = fopen("txt_files/".$file_name, "a") or die("Unable to open file!");

	fwrite($myfile, $file_txt);
	fclose($myfile);

	header("location: index.php");
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="post" action="">
	<h3><?php echo $file_name; ?></h3>
	<input type="text" name="file_txt" placeholder="File Text" value="<?php echo $file_data; ?>">

	<input type="submit" name="submit">
</form>
</body>
</html>