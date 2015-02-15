
<?php
						$stamp		=	$_POST['stamp'];
						$id			=	$_POST['id'];
						$tablename	=	$_POST['tablename'];
						$surecheck	=	$_POST['surecheck'];
						
						
						
						if ($surecheck !== '1')
						{
							header("Refresh: 3; URL=\"?action=member&process=change&stamp=$stamp\"");
						
								echo "<table>";
								echo	"<tr><td>";
								echo 	"You didn't check the button: Are you sure you want to delete this ?";
								echo	"</td></tr>";
								echo	"<tr><td><i>";
								echo	"You will be redirected in 3 seconds.";
								echo	"</i></td></tr>";
						
						echo	"</table>";
							
							
						}
					else
					
						{
							
								$sql3 = "DELETE FROM ".$tablename." WHERE id= ".$id." ";
										mysql_query ($sql3);
							
							header("Refresh: 0; URL=\"?action=member&process=change&stamp=$stamp\"");
						}

?>
