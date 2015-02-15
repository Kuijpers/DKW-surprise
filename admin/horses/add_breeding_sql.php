	
<?php			
										$stamp		=	$_POST['stamp'];
										$stallion	=	$_POST['stallion'];
										$mare		=	$_POST['mare'];
										$breedyear	=	$_POST['breedyear'];
										$breedmonth	=	$_POST['breedmonth'];
										
										$stallion	=	mysql_real_escape_string($stallion);
										$mare		=	mysql_real_escape_string($mare);
									
								if (empty($stallion) || empty($mare) || empty($breedmonth) || empty($breedyear))
									{
									
										if(empty ($stallion))
											{
												echo "You did not fill in the stallion";
												echo "<br />";
												
											}
										if(empty ($mare))
											{
												echo "You did not fill in the mare";
												echo "<br />";	
												
											}
										if(empty ($breedmonth))
											{
												echo "You did not fill in the expected month";	
												echo "<br />";
												
											}
										if(empty ($breedyear))
											{
												echo "You did not fill in the expected year";
												echo "<br />";	
												
											}
									}
								else
									{
	
	
	$sql = "INSERT INTO breeding (stallion, mare, breedmonth, breedyear, stamp) 
			VALUES ('" . $stallion . "','" . $mare	 . "','" . $breedmonth	 . "','" . $breedyear	 . "','". $stamp ."')";
										
							//echo $sql;
								mysql_query($sql) or die(mysql_error());
								
								header("Refresh: 0; URL=\"?action=member&process=currentbreeding&stamp=$stamp\"");
									}
?>