<?php

									$stamp		=	$_POST['stamp'];
									$regid		=	$_POST['regid'];
									$name		=	$_POST['name'];
									$name		=	mysql_real_escape_string($name);
									$dobday		=	$_POST['dobday'];
									$dobmonth	=	$_POST['dobmonth'];
									$dobyear	=	$_POST['dobyear'];
									$gender		=	$_POST['gender'];
									$parent		=	$_POST['parent'];
									$name		=	mysql_real_escape_string($parent);
									$results	=	$_POST['results'];
									$result		=	mysql_real_escape_string($result);

	$sql = "UPDATE offspring SET name = '".$name."', dobday = '".$dobday."', dobmonth = '".$dobmonth."', dobyear = '".$dobyear."', gender = '".$gender."', parent = '".$parent."', results = '".$results."' WHERE id = ".$regid.";";
	
							//echo $sql;
							mysql_query ($sql);
							
							header("Refresh: 0; URL=\"?action=member&process=change&stamp=$stamp\"");

?>