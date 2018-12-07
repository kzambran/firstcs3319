<!DOCTYPE html>
<html>
<head>
	<title>Store</title>
	<link rel="stylesheet" type="text/css" href="store.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<?php
include"connecttodb.php";
?>
<h1>My store</h1>
Costumers information:
<?php
include'getCostumerInfo.php';
?>
</body>
</html>
