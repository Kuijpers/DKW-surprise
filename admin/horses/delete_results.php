<?php
							$stamp	=	$_GET['stamp'];
							$id		=	$_GET['regid'];
							
							//echo $stamp;
							//echo "<br />";
							//echo $id;
				$sql = "DELETE FROM results WHERE id= ".$id." ";
							
							//echo $sql;
							mysql_query ($sql);
							
							header("Refresh: 0; URL=\"?action=member&process=results&stamp=$stamp\"");

?>