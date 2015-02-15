
<?php
					
					$tablename	=	"horses";
										
					$fullname	=	$_POST['fullname'];
					$callname	=	$_POST['callname'];
					$gender		=	$_POST['gender'];
					$dobday		=	$_POST['dobday'];
					$dobmonth	=	$_POST['dobmonth'];
					$dobyear	=	$_POST['dobyear'];
					$sire		=	$_POST['sire'];
					$dam		=	$_POST['dam'];
					$fofs		=	$_POST['fofs'];
					$mofs		=	$_POST['mofs'];
					$fofd		=	$_POST['fofd'];
					$mofd		=	$_POST['mofd'];
					$color		=	$_POST['color'];
					$height		=	$_POST['height'];
					$unit		=	$_POST['unit'];
					$spot		=	$_POST['spot'];
					$stamp		=	$_POST['stamp'];
					
					
					$fullname	=	mysql_real_escape_string($fullname);
					$callname	=	mysql_real_escape_string($callname);
					$sire		=	mysql_real_escape_string($sire);
					$dam		=	mysql_real_escape_string($dam);
					$fofs		=	mysql_real_escape_string($fofs);
					$mofs		=	mysql_real_escape_string($mofs);
					$fofd		=	mysql_real_escape_string($fofd);
					$mofd		=	mysql_real_escape_string($mofd);
					$color		=	mysql_real_escape_string($color);
					$height		=	mysql_real_escape_string($height);
					
		
		// Wanneer de meet gegevens incompleet zijn
	
		if (!empty($height))
			{
				if (empty($unit))
					{
						$unit = "1";	
					}
				if (empty($spot))
					{
						$spot = "1";	
					}
				
			}
			
			
					
$sql = "UPDATE ".$tablename." SET fullname = '".$fullname."', callname = '".$callname."', gender = '".$gender."', dobday = '".$dobday."', dobmonth = '".$dobmonth."', dobyear = '".$dobyear."', sire = '".$sire."', dam = '".$dam."', fofs = '".$fofs."', mofs = '".$mofs."', fofd = '".$fofd."', mofd = '".$mofd."', color = '".$color."', height = '".$height."', unit = '".$unit."', spot = '".$spot."' WHERE stamp = ".$stamp.";";

mysql_query($sql);

header ("Location: home_horses.php?action=member&process=change&stamp=". $stamp);
												


?>
