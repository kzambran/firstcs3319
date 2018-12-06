

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

$answer = $_POST['Order'];  
if ($answer == "byName") {
    echo 'Teams ordred by Team Name:';          
    $query = 'SELECT teamname, city, teamID FROM team ORDER BY teamName';
    $result = pg_query($query);
    if (!$result) {
         die("database query2 failed.");
    }
    while ($row = pg_fetch_array($result)) {
        echo '<li>';
	echo $row["city"];
        echo $row["teamname"];
	echo $row["teamid"];
     }
     pg_free_result($result);
}

if ($answer == "byCity") {
    echo 'Teams ordred by Team City:';
    $query = 'SELECT teamname, city FROM team ORDER BY city';
    $result = pg_query($query);
    if (!$result) {
         die("database query2 failed.");
    }
    while ($row = pg_fetch_array($result)) {
        echo '<li>';
        echo $row["city"];
        echo $row["teamname"];
     }
     pg_free_result($result);
}
?>
</ol>
<?php
   pg_close($connection);
?>
</body>
</html>


