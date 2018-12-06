<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>
VIEWINFO 
</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1> Here is the information for the game: </h1>
<ol>
<?php
   $gameID = $_POST["gameID"];
   $query = 'SELECT team.teamname, team.city, plays.score FROM team, plays WHERE plays.gameid=\'' .$gameID .'\' AND plays.teamid = team.teamid';
   $result = pg_query($query);
   if (!$result){
       die ("database query failed");
   }
   while ($row = pg_fetch_array($result)){
      echo "Team name: ";
      echo $row["teamname"];
      echo "<br> Team City: ";
      echo $row["city"];
      echo "<br> Team Score: ";   
      echo $row["score"];
      echo "<br>"; 
   }
   pg_free_result($result);

   $query1 = 'SELECT team.teamname FROM team WHERE team.teamid = (SELECT team.teamid FROM team, plays WHERE plays.gameid = \''.$gameID .'\' AND plays.teamid = team.teamid AND plays.score = (SELECT MAX(plays.score) FROM team, plays WHERE plays.gameid = \'' .$gameID .'\' AND plays.teamid = team.teamid))';   
   $result1 = pg_query($query1);
   if (!$result1){
       die ("database query failed");
   }
   while ($row = pg_fetch_array($result1)){
      echo "The winning team was: <mark>" .$row["teamname"]. "</mark><br>";
      echo "<br>";
   }



   pg_free_result($result1);

   $query2 = 'SELECT game.city, game.date FROM game WHERE game.gameid=\'' .$gameID .'\'';
   $result2 = pg_query($query2);
   if (!$result2){
       die ("database query failed");
   }
   while ($row = pg_fetch_array($result2)){
      echo "Game city: ";
      echo $row["city"];
      echo "<br> Game date: ";
      echo $row["date"];
      echo "<br>";
   }
   pg_free_result($result2);

   $query3 = 'SELECT official.fname, official.lname FROM official, game WHERE official.officialid = game.head_OfficiatorID AND game.gameid=\'' .$gameID .'\'';
   $result3 = pg_query($query3);
   if (!$result3){
       die ("database query failed");
   }
   while ($row = pg_fetch_array($result3)){
      echo "Head official: ";
      echo $row["fname"];
      echo " ";
      echo $row["lname"];
      echo "<br>";
   }
   pg_free_result($result3);

   $query4 = 'SELECT official.fname, official.lname FROM official, officiates_game WHERE official.officialid = officiates_game.officialid AND officiates_game.gameid = \'' .$gameID .'\'';
   $result4 = pg_query($query4);
   if (!$result4){
       die ("database query failed");
   }
   echo "Officials of game $gameID: ";
   while ($row = pg_fetch_array($result4)){
      echo $row["fname"];      
      echo " ";
      echo $row["lname"];
      echo ",  ";
   }
   pg_free_result($result4);
   ?>
   </ol>
   <?php
      pg_close($connection);
   ?>
   </body>
   </html>
