<?php
$dbhost = "dbserver";
$dbuser= "mlaird6";
$dbpass = "3AFd8WbCRr";
$dbname = "mlaird6assign2db";
$connection = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass");
if (!$connection) {
     echo "Database Connection Failed" ;
   }
?>
