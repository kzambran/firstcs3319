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

$answer = $_POST['Option'];
if ($answer == "1") {
//show the scores for all the games that the Leafs played in and their opponents name and city.
	$query = 'SELECT plays.score FROM plays WHERE plays.teamid = \'12\'';
	$result = pg_query($query);	
	if (!$result){
		die ("Database query failed");
	}	
	$query1 = 'SELECT team.teamname, team.city FROM plays, team WHERE team.teamname <> \'Maple Leafs\' AND team.teamID = plays.teamid AND plays.gameid IN (SELECT plays.gameid FROM team, plays WHERE team.teamname = \'Maple Leafs\' AND team.teamid = \'12\' AND team.teamid = plays.teamid);';
	$result1 = pg_query($query1);
        if (!$result1){
                die ("Database query failed");
        }
	while ($row1 = pg_fetch_array($result) AND $row2 = pg_fetch_array($result1)){
		echo "The Maple Leafs scored ";
		echo $row1["score"];
		echo " against the ";
		echo $row2["city"];
		echo $row2["teamname"];
		echo "<br>";
	}
}

if ($answer == "2") {
//show the name of the official who has officiated the most Leafs games
	$query5 = 'DROP VIEW MLgames; CREATE  VIEW MLgames AS 
 SELECT fname, lname, COUNT(official.officialID) as count FROM official, officiates_game, game, team AS team1, team AS team2, plays AS score1, plays AS score2 WHERE official.officialID = officiates_game.officialid AND officiates_game.gameID=game.gameid AND team1.teamid=score1.teamid AND team2.teamid=score2.teamid AND game.gameid=score1.gameid AND game.gameid=score2.gameid AND team1.teamid != team2.teamid GROUP BY official.fname, official.lname;';
	$query2 = 'SELECT fname, lname, count FROM MLGames WHERE count=(SELECT MAX(count) from MLGames)';
        $result2 = pg_query($query2);
        if (!$result2){
                die ("Database query failed");
        }
        while ($row = pg_fetch_array($result2)){
                echo $row["fname"];
                echo $row["lname"];
                echo "officiated the most Maple Leafs games with ";
                echo $row["count"];
                echo " games.<br>";
        }
}

if ($answer == "3") {
//show the name of the official who had officiated the most Leaf losses  
	$query6 = 'DROP VIEW MLLoss; CREATE  VIEW MLLoss AS SELECT fname, lname, COUNT(official.officialID) as count FROM official, officiates_game, game, team AS team1, team AS team2, plays AS score1, plays AS score2 WHERE official.officialID = officiates_game.officialid AND officiates_game.gameID=game.gameid AND team1.teamid=score1.teamid AND team2.teamid=score2.teamid  AND game.gameid=score1.gameid AND game.gameid=score2.gameid AND team1.teamid != team2.teamid  AND ((team1.teamname=\'Maple Leafs\' AND score1.score < score2.score) OR (team2.teamname=\'Maple Leafs\' AND score2.score < score1.score)) GROUP BY official.fname, official.lname;';
	$query3 = 'SELECT fname, lname, count FROM MLLoss WHERE count=(SELECT MAX(count) from MLLoss)';
        $result3 = pg_query($query3);
        if (!$result3){
                die ("Database query failed");
        }
	while ($row = pg_fetch_array($result3)){
                echo $row["fname"];
                echo $row["lname"];
                echo "officiated the most Maple Leafs losses with ";
                echo $row["count"];
                echo " games.<br>";
        }
}

if ($answer == "4") {
//show the name of the official who has officiated the most Leaf wins. 
	$query5 = 'DROP VIEW MLWins; CREATE  VIEW MLWins AS SELECT fname, lname, COUNT(official.officialID) as count FROM official, officiates_game, game, team AS team1, team AS team2, plays AS score1, plays AS score2 WHERE official.officialID = officiates_game.officialid AND officiates_game.gameID=game.gameid AND team1.teamid=score1.teamid AND team2.teamid=score2.teamid AND game.gameid=score1.gameid AND game.gameid=score2.gameid AND team1.teamid != team2.teamid AND ((team1.teamname=\'Maple Leafs\' AND score1.score > score2.score) OR (team2.teamname=\'Maple Leafs\' AND score2.score > score1.score)) GROUP BY official.fname, official.lname;';
	$query4 = 'SELECT fname, lname, count FROM MLWins WHERE count=(SELECT MAX(count) from MLWins)';
        $result4 = pg_query($query4);
        if (!$result4){
                die ("Database query failed");
        }
        while ($row = pg_fetch_array($result4)){
                echo $row["fname"];
                echo $row["lname"];
                echo "officiated the most Maple Leafs wins with ";
                echo $row["count"];
                echo " games.<br>";
        }
}


?>
</ol>
<?php
   pg_close($connection);
?>
</body>
</html>
