<?php
					$stamp	=	$_POST['stamp'];
					$main_image	=	$_POST['main_image'];
					
					$sql1 = "UPDATE picture SET main_image = '0' WHERE `stamp` = $stamp ;";
						mysql_query ($sql1);
						
					$sql2 = "UPDATE picture SET main_image = '1' WHERE `id` = $main_image ;";
						mysql_query ($sql2);
						
					header("Refresh: 0; URL=\"?action=member&process=change&lang=$lang&stamp=$stamp\"");

?>
