<?php
    include 'connectdb.php';
?>
<?php
//this prints out and makes buttons out of all the judges names, ordered by last name 
$query='SELECT fname, lname, officialid FROM official ORDER BY lname';
$result= pg_query($query);
while ($row = pg_fetch_array($result)){
  $id = $row["officialid"];
  echo '<input type = "radio" name = "Official" value = "' . $id . '">';
  echo $row["fname"];
  echo $row["lname"];
  echo "</br>";
}
?>
<?php
   pg_close($connection);
?>
