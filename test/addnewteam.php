<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>NEW TEAM</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Adding your team:</h1>
<ol>
<?php
   $teamName = $_POST["teamname"];
   $teamID = $_POST["teamID"];
   $teamCity = $_POST["city"];

 
   $query = "INSERT INTO team VALUES('" . $teamID . "','" . $teamCity . "','" . $teamName . "');";
   if (!pg_query($query)) {
        die("Error: insert failed-->" . pg_last_error($connection));
    }
   echo "Your team was added!";
   pg_close($connection);
?>
</ol>
</body>
</html>

