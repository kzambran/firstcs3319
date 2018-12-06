<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CHANGE</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Changing game city</h1>
<ol>
<?php
   $gameID = $_POST['myVariable'];
   $city1 = $_POST['city'];
   $query = "UPDATE game SET city = '$city1' WHERE gameid='$gameID'";
   $result = pg_query($query);
   echo "Game $gameID now takes place in $city1";
   pg_close($connection);
?>
</ol>
</body>
</html>
