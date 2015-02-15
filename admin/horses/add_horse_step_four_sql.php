	
<?php
		// Plaatsen van de text gegevens in de database
		
		$dir = "./lang/";

		$dh = opendir($dir);

		while (($file = readdir($dh)) !== false) 
			{
				// Gets the File Extension
				$extension = substr($file, strrpos($file, '.'));
			
			
				// checks if the extension is .php or the file name is  . or .. if so it will be shown as an exclusion
				if($extension !== ".php" && $file !== "." && $file !== "..")
			
				
					if (!empty($_POST))
					
						{
			
						
							
							$tablename	=	$file._.$data_id ;
						
									$sql1 = "CREATE TABLE IF NOT EXISTS ".$tablename." \n"
    									. " (\n"
    									. " id mediumint(9) NOT NULL AUTO_INCREMENT,\n"
    									. " title varchar(60) COLLATE utf8_bin NOT NULL,\n"
    									. " text TEXT COLLATE utf8_bin NOT NULL,\n"
										. " stamp int(11) NOT NULL,\n"
    									. " PRIMARY KEY (`id`)\n"
    									. " ) \n"
    									. " ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=0 ;";

									mysql_query($sql1);	
									
								$title		=	$_POST["title_$file"];
								$title		=	mysql_real_escape_string($title);
								$text		=	$_POST["text_$file"];
								$text		=	mysql_real_escape_string($text);
								$stamp		=	$_POST["stamp"];
					
									$sql2 = "INSERT INTO ".$tablename." (title, text, stamp) 
													VALUES (
															'" . $title . "',
															'" . $text . "',
															'" . $stamp . "')";
									mysql_query($sql2);
							
						}
			
			}

//If no errors registered, print the success message and show the thumbnail image created
	if(
	   //isset($_POST['Submit']) && 
	   !$errors)
		{
			//echo "<h1>Thumbnail created Successfully!</h1>";
			//echo '<img src="'.$thumb_name.'">';

			//done take me back to the main page
    		//header('location: ?lang=$lang&amp;action=member');
			//header('Location: '.$_SERVER['PHP_SELF']);
			header ("Location: home_horses.php?action=member&process=info&stamp=". $stamp);
		}				


?>
