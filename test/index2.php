<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>WEBSITE HERE</title>
</head>
<body>
<?php
  include 'connectdb.php';
?>
<h1>Melina Lairds Hockey Team Database</h1>
<p>
<hr>
<p>
<h2>How would you like to display your teams?</h2>
<form action="getteamNames.php" method="post">
<?php
   include 'getdata.php';
?>
<input type="submit" value="Select">
</form>

<p>
<hr>
<p>
<h2> Add a new team:</h2>
<form action="addnewteam.php" method="post">
New Teams's Name: <input type="text" name="teamname"><br>
New Teams's ID: <input type="text" name="teamID"><br>
New Teams's City: <input type="text" name="city"><br>
<input type="submit" value="Add New Team">
</form>

<p>
<hr>
<p>
<h2> Delete an existing team:</h2>
<form action="deleteteam.php" method="post">
TeamID of the team you would like to delete: <input type="text" name="teamID"><br>
<input type="submit" value="Delete Team">
</form>

<p>
<hr>
<p>
<h2> Update game city:</h2>
<form action="updategamecity.php" method="post">
Enter the gameID of the game you would like to change: <input type="text" name="gameID"><br>
<input type="submit" value="Choose game">
</form>


<p>
<hr>
<p>
<h2> View game information:</h2>
<form action="getGameinfo.php" method="post">
Enter the gameID of the game you would like to see: <input type="text" name="gameID"><br>
<input type="submit" value="Choose game">
</form>

<p>
<hr>
<p>
<h2>Select which official you would like to view:</h2>
<form action="officialData.php" method="post">
<?php
   include 'getOfficialsButtons.php';
?>
<input type="submit" value="Select">
</form>

<p>
<hr>
<p>
<h2>Select which Maple Leaf data you would like to view:</h2>
<form action="MLdataView.php" method="post">
<?php
   include 'getMLdata.php';
?>
<input type="submit" value="Select">
</form>

?>
</body>
</html>
