
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>UPDATE</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Update game city</h1>
<?php
  $gameID= $_POST["gameID"];
  $query = "SELECT city FROM game WHERE game.gameID = '" . $gameID . "'";
   $result = pg_query($query);
    if (!$result) {
         die("database query2 failed.");
    }
   echo 'Current city game takes place in is: ';
   while ($row = pg_fetch_array($result)) {
        echo $row["city"];
     }
  echo "<br>";
  echo '<form action="changeGameCity.php" method="post">';
  echo "<input type='hidden' name='myVariable' value='". $gameID ."'/>";

?>
  New city: <input type="text" name="city"><br>
  <input type="submit" value="Change City">
  </form>
<?php
   pg_close($connection);
?>
</body></html>

