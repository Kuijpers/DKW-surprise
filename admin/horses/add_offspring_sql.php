<?php
									$stamp		=	$_POST['stamp'];
									$name		=	$_POST['name'];
									$gender		=	$_POST['gender'];
									$dobday		=	$_POST['dobday'];
									$dobmonth	=	$_POST['dobmonth'];
									$dobyear	=	$_POST['dobyear'];
									$parent		=	$_POST['parent'];
									$results	=	$_POST['results'];
									
									$name		=	mysql_real_escape_string($name);
									$parent		=	mysql_real_escape_string($parent);
									$results	=	mysql_real_escape_string($results);


						$sql = "INSERT INTO offspring (name, gender, dobday, dobmonth, dobyear, parent, results, stamp) 
								VALUES ('" . $name . "','" . $gender	 . "','" . $dobday	 . "','" . $dobmonth	 . "','" . $dobyear	 . "','" . $parent	 . "','" . $results	 . "','" . $stamp . "')";
								
								//echo $sql;
								mysql_query($sql) or die(mysql_error());
								
								header("Refresh: 0; URL=\"?action=member&process=change&stamp=$stamp\"");
?>
