
<?php
								$stamp		=	$_POST['stamp'];
								$imageid	=	$_POST['imageid'];
								$surecheck	=	$_POST['surecheck'];
								$gallery	=	$_POST['gallery'];


					if ($surecheck !== '1')
						{
							header("Refresh: 3; URL=\"?action=member&process=change&stamp=$stamp\"");
						
								echo "<table>";
								echo	"<tr><td>";
								echo 	"You didn't check the button: Are you sure you want to delete this image ?";
								echo	"</td></tr>";
								echo	"<tr><td><i>";
								echo	"You will be redirected in 3 seconds.";
								echo	"</i></td></tr>";
						
						echo	"</table>";
							
							
						}
					else
					
						{
							
							if ($gallery !== '1') // kijken of de image bewaard moet blijven voor de gallery
									{	// Wanneer de image niet bewaard hoeft te blijven
			
			
										// delete picture from folder
				
										$sql2 ="SELECT * FROM picture WHERE id = ".$imageid.";";
    										$data = mysql_query($sql2);
											$info = mysql_fetch_array( $data );
					
											$image_name = $info['image'];
						
												$thumb_path		=	"../album/thumbs/thumb_";
												$full_path		=	"../album/";

												$thumb_image	=	"".$thumb_path."".$image_name."";
												$full_image		=	"".$full_path."".$image_name."";
						
												unlink ($full_image);
												unlink ($thumb_image);
				
										// delete picture info from database
				
										$sql3 = "DELETE FROM picture WHERE id= ".$imageid." ";
										mysql_query ($sql3);
			
									}
							else	// wanneer de image bewaard moet blijven voor de gallery
									{
									// pas de main_image instelling aan
									$sql4 = "UPDATE picture SET main_image = '0', stamp = '0' WHERE `id` = $imageid ;";
									mysql_query ($sql4);
				
									}
							
							header("Refresh: 0; URL=\"?action=member&process=change&stamp=$stamp\"");
						}
					
?>