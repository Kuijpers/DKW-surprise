<?php
						$organisation	=	$_POST['organisation'];
						$organisation	=	mysql_real_escape_string($organisation);
						$registration	=	$_POST['registration'];
						$registration	=	mysql_real_escape_string($registration);
						$stamp			=	$_POST['stamp'];

			$sql = "INSERT INTO registration (organisation, registration, stamp) 
					VALUES ('" . $organisation . "','" . $registration . "','" . $stamp . "')";
			
			mysql_query($sql);
			
			header ('location: home_horses.php?action=member&process=registration&stamp='. $stamp.'');

?>