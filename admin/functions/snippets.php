<?php

###############################################################################

// Connects to your Database 

$con = mysql_connect("$dbhost","$dbuser", "$dbpass"); 	//	Verbinding maken met de database
	if (!$con)													//	De gegevens nodig voor de verbinding staan in includes/config.inc.php
  	{															//
 		 die('Could not connect: ' . mysql_error());			//	Wannneer er geen juiste verbinding is zal er een error met uitleg verschijnen.
  	}															//
	mysql_select_db("$dbname", $con);							//
 
###############################################################################









?>