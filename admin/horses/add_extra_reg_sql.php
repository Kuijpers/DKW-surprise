
<?php	
					$stamp			=	$_POST['stamp'];
					$organisation	=	$_POST['organisation'];
					$organisation	=	mysql_real_escape_string($organisation);
					$registration	=	$_POST['registration'];
					$registration	=	mysql_real_escape_string($registration);

				
				if (empty($organisation) || empty($registration))
					{
						header("Refresh: 3; URL=\"?action=member&process=change&lang=$lang&stamp=$stamp\"");
						
						echo "<table>";
						
						if (empty($organisation))
							{
								echo	"<tr><td>";
								echo	$ADM['didntfillin'];
								echo	"</td><td>";
								echo 	"organisation";
								echo	"</td></tr>";
							}
							
							if (empty($registration))
							{
								echo	"<tr><td>";
								echo	$ADM['didntfillin'];
								echo	"</td><td>";
								echo 	"registration";
								echo	"</td></tr>";
							}
						
					
						echo	"<tr><th colspan='2'><i>";
						echo	"You will be redirected in 3 seconds.";
						echo	"</i></th></tr>";
						
						echo	"</table>";
					}
				else
					{
						$sql = "INSERT INTO registration (organisation, registration, stamp) 
								VALUES ('" . $organisation . "','" . $registration . "','" . $stamp . "')";
			
						mysql_query($sql);
			
						header("Refresh: 0; URL=\"?action=member&process=change&lang=$lang&stamp=$stamp\"");
						
						
					}

?>
