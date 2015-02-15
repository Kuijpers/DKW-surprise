
<?php							
								
								$stamp			=	$_POST['stamp'];
								$resday			=	$_POST['resday'];
								$resmonth		=	$_POST['resmonth'];
								$resyear		=	$_POST['resyear'];
								$organisation	=	$_POST['organisation'];
								$organisation	=	mysql_real_escape_string($organisation);
								$showname		=	$_POST['showname'];
								$showname		=	mysql_real_escape_string($showname);
								$showclass		=	$_POST['showclass'];
								$showclass		=	mysql_real_escape_string($showclass);
								$result			=	$_POST['result'];
								$result			=	mysql_real_escape_string($result);

								
						if (
							empty($resday) || 
							empty($resmonth) || 
							empty($resyear) || 
							empty($organisation) || 
							empty($showname) || 
							empty($showclass) || 
							empty($result)
							)
							{
								echo	"<table><tr><th colspan='2'><h3 class='red'>";
								echo	$ADM['error'];
								echo	"</h3></th></tr>";
				
									if (empty($resday))
									{
										echo	"<tr>";
										echo	"<td>";
										echo	$ADM['didntfillin'];
										echo	"</td>";
										echo	"<td>";
										echo	"Day";
										echo	"</td>";
										echo	"</tr>";
									}
					
									if (empty($resmonth))
									{
										echo	"<tr>";
										echo	"<td>";
										echo	$ADM['didntfillin'];
										echo	"</td>";
										echo	"<td>";
										echo	"Month";
										echo	"</td>";
										echo	"</tr>";
									}
					
									if (empty($resyear))
									{
										echo	"<tr>";
										echo	"<td>";
										echo	$ADM['didntfillin'];
										echo	"</td>";
										echo	"<td>";
										echo	"Year";
										echo	"</td>";
										echo	"</tr>";
									}
					
									if (empty($organisation))
									{
										echo	"<tr>";
										echo	"<td>";
										echo	$ADM['didntfillin'];
										echo	"</td>";
										echo	"<td>";
										echo	"Organisation";
										echo	"</td>";
										echo	"</tr>";
									}
					
									if (empty($showname))
									{
										echo	"<tr>";
										echo	"<td>";
										echo	$ADM['didntfillin'];
										echo	"</td>";
										echo	"<td>";
										echo	"Showname";
										echo	"</td>";
										echo	"</tr>";
									}
					
									if (empty($showclass))
									{
										echo	"<tr>";
										echo	"<td>";
										echo	$ADM['didntfillin'];
										echo	"</td>";
										echo	"<td>";
										echo	"Showclass";
										echo	"</td>";
										echo	"</tr>";
									}
					
									if (empty($result))
									{
										echo	"<tr>";
										echo	"<td>";
										echo	$ADM['didntfillin'];
										echo	"</td>";
										echo	"<td>";
										echo	"Result";
										echo	"</td>";
										echo	"</tr>";
									}
				
								echo	"<tr><th colspan='2'>";
								echo	"<input type='button' value='Go Back' onclick='history.go(-1)' />";
								echo	"</th></tr>";
								echo "</table>";
							}
						else
							{
								

								//echo 	$stamp;
								//echo	"<br />";
								//echo	$resday;
								//echo	"<br />";
								//echo	$resmonth;
								//echo	"<br />";
								//echo	$resyear;
								//echo	"<br />";
								//echo	$organisation;
								//echo	"<br />";
								//echo	$showname;
								//echo	"<br />";
								//echo	$showclass;
								//echo	"<br />";
								//echo	$result;
								
								$sql = "INSERT INTO results (resday, resmonth, resyear, organisation, showname, showclass, result, stamp) 
			VALUES ('" . $resday . "','" . $resmonth	 . "','" . $resyear	 . "','" . $organisation	 . "','". $showname ."','" . $showclass	 . "','" . $result	 . "','" . $stamp	 . "')";
								
								//echo $sql;
								mysql_query($sql) or die(mysql_error());
								
								header("Refresh: 0; URL=\"?action=member&process=results&stamp=$stamp\"");
							}
?>