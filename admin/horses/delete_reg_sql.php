<?php
							$stamp	=	$_GET['stamp'];
							$regid	=	$_GET['regid'];
							
							$sql = "DELETE FROM registration WHERE id= ".$regid." ";
							mysql_query ($sql);
							
							header("Refresh: 0; URL=\"?action=member&process=change&lang=$lang&stamp=$stamp\"");

?>
