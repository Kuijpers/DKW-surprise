
<?php
										$stamp		=	$_POST['stamp'];
										$stallion	=	$_POST['stallion'];
										$mare		=	$_POST['mare'];
										$breedyear	=	$_POST['breedyear'];
										$breedmonth	=	$_POST['breedmonth'];
										$regid		=	$_POST['regid'];
										
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
	
	$sql = "UPDATE breeding SET stallion = '".$stallion."', mare = '".$mare."', breedmonth = '".$breedmonth."', breedyear = '".$breedyear."' WHERE id = ".$regid.";";
	
							//echo $sql;
								mysql_query($sql) or die(mysql_error());
								
								header("Refresh: 0; URL=\"?action=member&process=currentbreeding&stamp=$stamp\"");
									}

?>