<!DOCTYPE html>
<html>
<head>
	<title>Deletar</title>
</head>
<body>

	<?php

       include 'config.php';

       $id=$_GET["id"];

       $base->query("DELETE FROM devedor WHERE ID='$id'");

       header("Location:devedor.php");

	?>

</body>
</html>
