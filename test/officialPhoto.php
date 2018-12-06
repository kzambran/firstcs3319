<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ADDPHOTO</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Adding photo:</h1>
<ol>
<?php
   $ID = $_POST['myVariable'];
   echo $ID;
   $URL= $_POST['url'];
   $query = 'UPDATE official SET offpicture=\'' .$URL.'\' WHERE officialid=\'' .$ID.'\'';
   $result = pg_query($query);
   if (!$result) {
         die("database query2 failed.");
   }
   echo $ID;
   echo $URL;
   echo "Photo was updated, select this official to see!";
   pg_close($connection);
?>
</ol>
</body>
</html>

