<?php
									$stamp	=	$_GET['stamp'];
									$regid	=	$_GET['regid'];
							
							$sql = "DELETE FROM offspring WHERE id= ".$regid." ";
							
							//echo $sql;
							mysql_query ($sql);
							
							header("Refresh: 0; URL=\"?action=member&process=change&stamp=$stamp\"");



?>