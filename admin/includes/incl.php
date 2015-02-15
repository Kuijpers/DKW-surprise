<?php
		
// Zoek alle bestanden in de config map en include deze
		
		$dir = "./config/";

		$dh = opendir($dir);

		while (($file = readdir($dh)) !== false) {
		
			$extension = substr($file, strrpos($file, '.')); // Gets the File Extension
			if($extension == ".php")// checks if the extension is .php. If so it will be shown as an inclusion
			include ("./config/$file");

		}
		closedir($dh);

// Zoek alle bestanden in de functions map en include deze
	
		$dir = "./functions/";

		$dh = opendir($dir);

		while (($file = readdir($dh)) !== false) {
		
			$extension = substr($file, strrpos($file, '.')); // Gets the File Extension
			if($extension == ".php")// checks if the extension is .php. If so it will be shown as an inclusion
			include ("./functions/$file");

		}
		closedir($dh);
		
// Zoek alle bestanden in de arrays map en include deze
	
		$dir = "./arrays/";

		$dh = opendir($dir);

		while (($file = readdir($dh)) !== false) {
		
			$extension = substr($file, strrpos($file, '.')); // Gets the File Extension
			if($extension == ".php")// checks if the extension is .php. If so it will be shown as an inclusion
			include ("./arrays/$file");

		}
		closedir($dh);
		
// Selecteer de taal aan de hand van de lang instellingen en include deze
	
		if (empty($lang)) 
			{				// wanneer de variabel $lang geen resultaat heeft word het automatisch de main language
    			$lang	=	$main_lang; // $main_lang staat vermeld in de config.php file
			}
		
			// Look for files in the lang directory.
		
			$dir = "./lang/$lang/";

			$dh = opendir($dir);

			while (($file = readdir($dh)) !== false)
				{
		
					$extension = substr($file, strrpos($file, '.')); // Gets the File Extension
						if($extension == ".php")// checks if the extension is .php. If so it will be shown as an inclusion
							{
								include ("lang/$lang/$file");
							}

				}


		closedir($dh);
		
		



?>