<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>DELETE</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Deleting team</h1>
<ol>
<?php
   $teamID= $_POST["teamID"];
   $query = "DELETE FROM team WHERE team.teamid = '" . $teamID . "'";
   $result = pg_query($query);
   echo "Team with teamID $teamID was deleted";
   pg_close($connection);
?>
</ol>
</body>
</html>
