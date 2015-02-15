<?php

						$stamp			=	$_POST['stamp'];
						$regid			=	$_POST['regid'];
						$organisation	=	$_POST['organisation'];
						$organisation	=	mysql_real_escape_string($organisation);
						$registration	=	$_POST['registration'];
						$registration	=	mysql_real_escape_string($registration);

		$sql = "UPDATE registration SET organisation='".$organisation."', registration='".$registration."' WHERE id='".$regid."'; "; 
		mysql_query($sql);
		
		header("Refresh: 0; URL=\"?action=member&process=change&stamp=$stamp\"");

?>
