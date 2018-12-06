<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>WEBSITE</title>
</head>
<body>
<?php
    include 'connectdb.php';
?>
<ol>
<?php
$answer = $_POST['Official'];
$query = 'SELECT fname, lname, officialid FROM official';
$result = pg_query($query);
if (!$result) {
    die("database query2 failed.");
}
while ($row = pg_fetch_array($result)) {
	$id = $row["officialid"];
	if ( strcmp($answer, $id) == 0) {
		 echo $row["fname"];
       		 echo $row["lname"];	
		 echo "has an official ID of ";
		 $workingID = $id;   		
	}
}
echo "<input type='hidden' name='myVariable' value= '". $workingID ."'/>";
//trying to send the ID value over to the next page so we can access it and change the photo
echo $workingID;
pg_free_result($result);
?>
<form action="officialPhoto.php" method="post">
Enter the URL of the photo you would like to add: <input type="text" name="url"><br>
<input type="submit" value="Add Photo">
</form>

</ol>
<?php
   pg_close($connection);
?>
</body>
</html>
