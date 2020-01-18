
<?php 

require 'db.php';

	$sql = "select * from files_tb";

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<table>

	<a href="add.php">Add File</a>
	<thead>
		<tr>
			<th>file name</th>
			<th>status</th>
		</tr>
	</thead>
	<tbody>
		<?php 

			$result = $dblink->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><a class="btn btn-primary" href="edit.php?file_id=<?php echo $row['id']; ?>">EDIT </a>
                        <a class="btn btn-danger" href="delete.php?file_id=<?php echo $row['id']; ?>">DELETE </a></td>
                    </tr>
                    <?php
                }
            }
		 ?>
	</tbody>
</table>
</body>
</html>