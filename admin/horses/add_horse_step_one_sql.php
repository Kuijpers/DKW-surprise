<?php
			$stamp		=	$_POST['stamp'];
			$call		=	$_POST['callname'];
			$call		=	mysql_real_escape_string($call);
			$name		=	$_POST['fullname'];
			$name		=	mysql_real_escape_string($name);
			$gender		=	$_POST['gender'];
			$dobday		=	$_POST['DOB_day'];
			$dobmonth	=	$_POST['DOB_month'];
			$dobyear	=	$_POST['DOB_year'];
			$color		=	$_POST['color'];
			$color		=	mysql_real_escape_string($color);
			$height		=	$_POST['height'];
			$height		=	mysql_real_escape_string($height);
			$unit		=	$_POST['unit'];
			$spot		=	$_POST['spot'];
			$sire		=	$_POST['sire'];
			$sire		=	mysql_real_escape_string($sire);
			$dam		=	$_POST['dam'];
			$dam		=	mysql_real_escape_string($dam);
			$fos		=	$_POST['fos']; // Father of sire
			$fos		=	mysql_real_escape_string($fos);
			$mos		=	$_POST['mos']; // Mother of sire
			$mos		=	mysql_real_escape_string($mos);
			$fod		=	$_POST['fod']; // Father of dam
			$fod		=	mysql_real_escape_string($fod);
			$mod		=	$_POST['mod']; // Mother of dam
			$mod		=	mysql_real_escape_string($mod);
			
			
	// Wanneer een veld niet ingevuld is
	
			if (empty($call) || 
				empty($name) || 
				empty($sire) || 
				empty($dam) || 
				empty($fos) || 
				empty($mos) || 
				empty($fod) || 
				empty($mod) || 
				$gender == '0' || 
				$dobday == '0' || 
				$dobmonth == '0' || 
				$dobyear == '0')
			
			{
				echo	"<table><tr><th colspan='2'><h3 class='red'>";
				echo	$ADM['error'];
				echo	"</h3></th></tr>";
				
					if (empty($call))
					{
						echo	"<tr>";
						echo	"<td>";
						echo	$ADM['didntfillin'];
						echo	"</td>";
						echo	"<td>";
						echo	$HORSE['call'];
						echo	"</td>";
						echo	"</tr>";
					}
					
					if (empty($name))
					{
						echo	"<tr>";
						echo	"<td>";
						echo	$ADM['didntfillin'];
						echo	"</td>";
						echo	"<td>";
						echo	$HORSE['full'];
						echo	"</td>";
						echo	"</tr>";
					}
					
					if ($gender == '0')
					{
						echo	"<tr>";
						echo	"<td>";
						echo	$ADM['didntselect'];
						echo	"</td>";
						echo	"<td>";
						echo	$HORSE['gender'];
						echo	"</td>";
						echo	"</tr>";
					}
					
					if ($dobday == '0')
					{
						echo	"<tr>";
						echo	"<td>";
						echo	$ADM['didntselect'];
						echo	"</td>";
						echo	"<td>";
						echo	$ADM['day'];
						echo	"</td>";
						echo	"</tr>";
					}
					
					if ($dobmonth == '0')
					{
						echo	"<tr>";
						echo	"<td>";
						echo	$ADM['didntselect'];
						echo	"</td>";
						echo	"<td>";
						echo	$ADM['month'];
						echo	"</td>";
						echo	"</tr>";
					}
					
					if ($dobyear == '0')
					{
						echo	"<tr>";
						echo	"<td>";
						echo	$ADM['didntselect'];
						echo	"</td>";
						echo	"<td>";
						echo	$ADM['year'];
						echo	"</td>";
						echo	"</tr>";
					}
					
					if (empty($sire))
					{
						echo	"<tr>";
						echo	"<td>";
						echo	$ADM['didntfillin'];
						echo	"</td>";
						echo	"<td>";
						echo	$HORSE['sire'];
						echo	"</td>";
						echo	"</tr>";
					}
					
					if (empty($dam))
					{
						echo	"<tr>";
						echo	"<td>";
						echo	$ADM['didntfillin'];
						echo	"</td>";
						echo	"<td>";
						echo	$HORSE['dam'];
						echo	"</td>";
						echo	"</tr>";
					}
					
					if (empty($fos))
					{
						echo	"<tr>";
						echo	"<td>";
						echo	$ADM['didntfillin'];
						echo	"</td>";
						echo	"<td>";
						echo	$HORSE['fos'];
						echo	"</td>";
						echo	"</tr>";
					}
					
					if (empty($mos))
					{
						echo	"<tr>";
						echo	"<td>";
						echo	$ADM['didntfillin'];
						echo	"</td>";
						echo	"<td>";
						echo	$HORSE['mos'];
						echo	"</td>";
						echo	"</tr>";
					}
					
					if (empty($fod))
					{
						echo	"<tr>";
						echo	"<td>";
						echo	$ADM['didntfillin'];
						echo	"</td>";
						echo	"<td>";
						echo	$HORSE['fod'];
						echo	"</td>";
						echo	"</tr>";
					}
					
					if (empty($mod))
					{
						echo	"<tr>";
						echo	"<td>";
						echo	$ADM['didntfillin'];
						echo	"</td>";
						echo	"<td>";
						echo	$HORSE['mod'];
						echo	"</td>";
						echo	"</tr>";
					}
				
				echo	"<tr><th colspan='2'>";
				echo	"<input type='button' value='Go Back' onclick='history.go(-1)' />";
				echo	"</th></tr>";
				echo "</table>";
			
			
			}

			
	// Wanneer alle velden ingevuld zijn
			else
			
			{
				
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

	$sql = "INSERT INTO horses (callname, fullname, gender, dobday, dobmonth, dobyear, sire, dam, fofs, mofs, fofd, mofd, stamp, color, height, unit, spot) 
	VALUES ('" . $call . "','" . $name . "','" . $gender . "','" . $dobday . "','" . $dobmonth . "','" . $dobyear . "','" . $sire . "','" . $dam . "','" . $fos . "','" . $mos . "','" . $fod . "','" . $mod . "','" . $stamp . "','" . $color . "','" . $height . "','" . $unit . "','" . $spot . "')";
			
	//echo $sql;
	
	mysql_query($sql);
	header ('location: home_horses.php?action=member&process=registration&stamp='. $stamp.'');
	
							//	}
								
			}
			
			
?>