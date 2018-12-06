<!DOCTYPE html>
<html>
<head>
	<title>Store</title>
	<link rel="stylesheet" type="text/css" href="store.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<script src="store.js"></script>
<?php
include"connecttodb.php";
?>

<h1>My store</h1>
Costumers information:
<form action="" method="post">
<select name="pickacostumer" id="pickacostumer">
<option value="1">Select Here</option>

<?php
include"getCostumerInfo.php";
?>
</select>
</form>
<hr>
<?php
if(isset($_POST['pickastore'])){
	include"connecttodb.php";
	include"getCostumerInfo.php";
}//end if
?>
<hr>
</body>
</html>
