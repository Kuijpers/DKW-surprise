<?php
	
	ob_start();//this just buffers the header so that you dont recieve an error for returning to the same page

	$page_id = "For Sale"; // De tekst tussen de " " moet je veranderen voor de pagina titel ( <title></title> )
	
	$section_id	=	"Home";	// Hiermee bepaal je onder welke noemer de pagina valt.
	
	if (!empty($_GET['lang']))
		{
			$lang		=	$_GET['lang']; // Kijk of er een taal geselecteerd is
		}
		


include ('includes/incl.php');

include ('templates/header.html');


if (isset($_GET['action']) && $_GET['action'])
	{
		$action = $_GET['action'];
	}
else
	{
		$action = '';
	}


switch($action)
	{
   		default:
			header("Refresh: 0; URL=\"?action=member\"");
		break;		
		case 'member':
			//checks cookies to make sure they are logged in 
 				if(isset($_COOKIE['ID_my_site'])) 
 					{ 
 						$username = $_COOKIE['ID_my_site']; 
 						$pass = $_COOKIE['Key_my_site']; 
 	 					$check = mysql_query("SELECT * FROM members WHERE login = '$username'")or die(mysql_error()); 
 					while($info = mysql_fetch_array( $check )) 	 
 						{ 
 
 				//if the cookie has the wrong password, they are taken to the login page 
 						if ($pass != $info['pass']) 
 							{ 			
								header("Location: ?action=login"); 
 							} 
 
 				//otherwise they are shown the admin area	 
 					else 
 							{
 			 					
#######################################################################################################################
#
#	Vanaf hier is de indeling van de webpagina !!!!!!!!!!!!!!!
#
#######################################################################################################################
?>
<div class="container">
	<div class="menu">
	<?php
				include ('includes/menu.html');

	?>
    </div>
    	<div class="submenu">
        	<span class="submenu_left">&nbsp;</span>
            <?php
				if ($section_id == "Home")
					{
						include ('includes/submenu_home.html');
					}

			?>
            <span class="submenu_right">&nbsp;</span>
        </div>
        
        <div class="time">
                	<a href="?action=logout">Log out</a>
        </div>

		<div id="body">
        	<div class="body">
				<div class="admin_menu">
        			<?php
						if ( $page_id !== "Main")
							{
								include ('includes/salemenu.html');
							}

					?>
        		</div>
        		<div class="admin_body">
        			
<?php
##################################################################################################################################
#							
#												Begin van de webpagina
#
##################################################################################################################################

?>


 <?php
                    	if (isset($_GET['process']) && $_GET['process'])
							{
								$process = $_GET['process'];
							}
						else
    						{
        						$process = '';
    						}
					switch($process)
						{



default:
                    			echo "Default dus hier komt alle informatie";
								
								
break;

// Maak paarden for sale

case 'forsale':
?>	
<form name="forsale" enctype="multipart/form-data" action="?lang=<?php echo $lang ?>&amp;action=member&amp;process=forsalecheck" method="post">
<table>
	<tr class="listing">
		<th colspan="4">
        	<b>
				<?php echo "Horses that aren't for sale"; ?>
            </b>
        </th>
	</tr>
    
    	<?php
			
			$tablename	=	"horses";
			
			$horse = array
			(
			 	"1"	=> $HORSE['stallion'],
				"2"	=> $HORSE['mare'],
				"3"	=> $HORSE['gelding'],
			 );
			
			$sql ="SELECT * FROM ".$tablename." WHERE sale=0 ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					echo "No records available";
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$stamp 		= 	$info['stamp'];
							$gender		=	$info['gender'];
?>
							
						
                        	<tr class="listing">
                            	<td>
                                	<input name="horse_id" type="radio" value="<?php echo $id ; ?>" />
                                </td>
                    			<td>
                        			<?php echo $fullname; ?>
                        		</td>
                                <td>
                                	<?php echo $horse["$gender"]; ?>
                                </td>
                   		 </tr>
    
    
    
    
    

<?php
						}
					}
?>
	<tr>
    	<td>
        	<input name="submit" type="submit" value="Next step" />
        </td>
    </tr>
</table>
</form>

<?php
break;
 
case 'forsalecheck':
?>

<?php
							if(!empty($_POST['horse_id']))
								{							
									$horse_id	=	$_POST['horse_id'];
								}
							if (!empty ($_GET['horse_id']))
								{
									$horse_id	=	$_GET['horse_id'];
								}

	
	
// Gegevens van het paard uit database halen					
			
			$tablename	=	"horses";
			
			$horse = array
			(
			 	"1"	=> $HORSE['stallion'],
				"2"	=> $HORSE['mare'],
				"3"	=> $HORSE['gelding'],
			 );
			
			$sql ="SELECT * FROM ".$tablename." WHERE id=".$horse_id." ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					echo "No records available";
					else
					{
					//here is the loop using the statement above
					$info = mysql_fetch_array( $data );
					
							$horse_id	=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$stamp 		= 	$info['stamp'];
							$gender		=	$info['gender'];
					}

			
// Foto van het paard uit de database halen

			$tablename	=	"picture";
			
			$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp." AND main_image= 1 ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)!==0)
						{
						
						$info = mysql_fetch_array( $data );
											   
											   
							$image_id			=	$info['id'];
							$image_name 		= 	$info['image'];
							
							
								$thumb_path		=	"../album/thumbs/thumb_";

								$thumb_image	=	"".$thumb_path."".$image_name."";
						}
?>






<form name="addforsale" enctype="multipart/form-data" action="?lang=<?php echo $lang ?>&amp;action=member&amp;process=forsaleadd" method="post">
<table>
	<tr>
    	<td>
        	Name of the horse
        </td>
        <td>
        	:
        </td>
        <td>
        	<b>
        		<?php echo $fullname ; ?>
            </b>
        </td>
    </tr>
    <tr>
    	<td>
        	Gender of the horse
        </td>
        <td>
        	:
        </td>
        <td>
        	<b>
        		<?php echo $horse["$gender"]; ?>
            </b>
        </td>
    </tr>
    <tr>
    	<td valign="top" >
        	Image of the horse
        </td>
        <td valign="top" >
        	:
        </td>
        <th colspan="2">
        	<?php if (!empty($image_name))
				{
					?>
        	<img src="<?php echo $thumb_image;?>" title="thumb image" alt="thumb image" />
            <?php
				}
				else
				{
			?>
            <img src="images/no_image.png" alt="no image" title="no image" />
			<?php
				}
			?>
        </th>
    </tr>
    <tr>
    	<td>
        	Are you sure you want to sell this horse
        </td>
        <td>
        	:
        </td>
        <td>
        	<input name="suresell" type="radio" value="1" /> Yes <input name="suresell" type="radio" value="0" checked="checked" /> No
        </td>
    </tr>
    <tr>
    	<td>
        	Sellprice for the horse
        </td>
        <td>
        	:
        </td>
        <td>
        	&#8364; <input name="sellprice" type="text" size="5" />,--
        </td>
        <td>
        	On request : <input name="request" type="checkbox" value="1" />
        </td>
    </tr>
    <tr>
    	<td>
        	<input name="horse_id" type ="hidden" value="<?php echo $horse_id ; ?>"  />
        	<input name="submit" type="submit" value="Add horse to saleslist" />
        </td>
    </tr>
</table>
</form>

	
<?php
break;
 
case 'forsaleadd':
?>

<?php
								$horse_id	=	$_POST['horse_id'];
								$suresell	=	$_POST['suresell'];
								$sellprice	=	$_POST['sellprice'];
								$request	=	$_POST['request'];
								
								//echo	$horse_id;
								//echo	"<br />";
								//echo	$suresell;
								//echo	"<br />";
								//echo	$sellprice;
								//echo	"<br />";
								//echo	$request;
								//echo	"<br />";
								
						if ($suresell !== '1')
						{
							header("Refresh: 3; URL=\"?action=member&process=forsalecheck&lang=$lang&horse_id=$horse_id\"");
						
								echo 	"<table>";
								echo	"<tr><td>";
								echo 	"You didn't check the button: Are you sure you want to sell this horse ?";
								echo	"</td></tr>";
								echo	"<tr><td><i>";
								echo	"You will be redirected in 3 seconds.";
								echo	"</i></td></tr>";
								echo	"</table>";
							
							
						}
						else
						{
							
						if ($request == "1"){$sellprice	= "request";} // wanneer de prijs op verzoek is anders gebruiken we de prijs die aangegeven is
							
							if (empty($sellprice))
							{
								header("Refresh: 3; URL=\"?action=member&process=forsalecheck&horse_id=$horse_id\"");
						
								echo 	"<table>";
								echo	"<tr><td>";
								echo 	"You didn't fill in a sellprice";
								echo	"</td></tr>";
								echo	"<tr><td><i>";
								echo	"You will be redirected in 3 seconds.";
								echo	"</i></td></tr>";
								echo	"</table>";
							}
							else
							{
								
							$sql = "UPDATE horses SET sale = '".$suresell."', sale_price = '".$sellprice."'WHERE id=".$horse_id."";
	
							//echo $sql;
								mysql_query($sql) or die(mysql_error());
								
								header("Refresh: 0; URL=\"?action=member&process=forsale\"");
								
								
							}
						}
	
?>
	
<?php
break;
 
case 'changesold':
?>
<form name="multisold" enctype="multipart/form-data" action="?lang=<?php echo $lang ?>&amp;action=member&amp;process=multisold" method="post">	
<table>
<tr>
	<th colspan="2">
    	<h3>
    		Horse that are for sale
        </h3>
    </th>
</tr>
<tr>
	<td>
    	<b>
    		Sold
        </b>
    </td>
    <td>
    	<b>
    		Name horse
        </b>
    </td>
    <td>
    	<b>
    		Gender
        </b>
    </td>
</tr>
<?php
			$tablename	=	"horses";
			
			$horse = array
			(
			 	"1"	=> $HORSE['stallion'],
				"2"	=> $HORSE['mare'],
				"3"	=> $HORSE['gelding'],
			 );
			
			$sql ="SELECT * FROM ".$tablename." WHERE sale=1 ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					{
					echo "<tr><th colspan='2'>";
					echo "No records available";
					echo "</th></tr>";
					}
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$stamp 		= 	$info['stamp'];
							$gender		=	$info['gender'];
?>
							
						
                        	<tr class="listing">
                            	<td>
                                	<input name="sold[]" type="checkbox" value="<?php echo $id ; ?>" />
                                </td>
                    			<td>
                        			<?php echo $fullname; ?>
                        		</td>
                                <td>
                                	<?php echo $horse["$gender"]; ?>
                                </td>
                                <td>
                                &nbsp;
      								<a href="?action=member&amp;process=editsale&amp;regid=<?php echo $id  ?>">
      								<img src="images/edit.gif" alt="<?php echo $ADM['changeinfo']; ?>" title="<?php echo $ADM['changeinfo']; ?>" />
      								</a>
                                </td>
                   		 </tr>
    
    
    
    
    

<?php
						}
					}		


?>
<tr>
	<td>
    	<input name="submit" type="submit" value="Change to sold" />
    </td>
</tr>
</table>
</form>


<form name="multiunsold" enctype="multipart/form-data" action="?lang=<?php echo $lang ?>&amp;action=member&amp;process=multiunsold" method="post">	
<table>
<tr>
	<th colspan="2">
    	<h3>
    		Horse that are sold
        </h3>
    </th>
</tr>
<tr>
	<td>
    	<b>
    		Unsold
        </b>
    </td>
    <td>
    	<b>
    		Name horse
        </b>
    </td>
    <td>
    	<b>
    		Gender
        </b>
    </td>
    <td>
    	<b>
    		Sold since
        </b>
    </td>
</tr>
<?php
			$tablename	=	"horses";
			
			$horse = array
			(
			 	"1"	=> $HORSE['stallion'],
				"2"	=> $HORSE['mare'],
				"3"	=> $HORSE['gelding'],
			 );
			
			$sql ="SELECT * FROM ".$tablename." WHERE sale=2 ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					{
					echo "<tr><th colspan='2'>";
					echo "No records available";
					echo "</th></tr>";
					}
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$stamp 		= 	$info['stamp'];
							$gender		=	$info['gender'];
							$date	=	$info['sold_date'];

?>
							
						
                        	<tr class="listing">
                            	<td>
                                	<input name="sold[]" type="checkbox" value="<?php echo $id ; ?>" />
                                </td>
                    			<td>
                        			<?php echo $fullname; ?>
                        		</td>
                                <td>
                                	<?php echo $horse["$gender"]; ?>
                                </td>
                    			<td>
                        			<?php echo $date; ?>
                        		</td>
                   		 </tr>
    
    
    
    
    

<?php
						}
					}		


?>
<tr>
	<td>
    	<input name="submit" type="submit" value="Change to not sold" />
    </td>
</tr>
</table>
</form>

<?php
break;
 
case 'editsale':
?>	

<?php
											$regid	=	$_GET['regid'];

			$tablename	=	"horses";
			
			$horse = array
			(
			 	"1"	=> $HORSE['stallion'],
				"2"	=> $HORSE['mare'],
				"3"	=> $HORSE['gelding'],
			 );
			
			$sql ="SELECT * FROM ".$tablename." WHERE id=".$regid." ";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					{
					echo "<tr><th colspan='2'>";
					echo "No records available";
					echo "</th></tr>";
					}
					else
					{
						$info = mysql_fetch_array( $data );
							$id			=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$stamp 		= 	$info['stamp'];
							$gender		=	$info['gender'];
							$sellprice	=	$info['sale_price'];
					}
					
					
?>
<table>
	<tr>
		<td>
        	<b>
        		<?php echo $fullname; ?>
            </b>
        </td>
    </tr>
    <tr>
    	<td>
        	Current sellprice :
        </td>
        <?php
			if ($sellprice!=="request")
			{
		?>
        <td>
        	&#8364;
        	<?php echo $sellprice ; ?>
        	,--
        </td>
        <?php
			}
			else
			{
				echo "<td><b>";
				echo "On request";
				echo "</b></td>";
			}
			?>
    </tr>
</table>
<form name="changesale" enctype="multipart/form-data" action="?lang=<?php echo $lang ?>&amp;action=member&amp;process=changesale" method="post">
<table>    
    <tr>
    	<td>
        	Remove from sale list :
        </td>
        <td>
        	<input name="remove" type="radio" value="1" /> Yes <input name="remove" type="radio" value="0" checked="checked" /> No
        </td>
    </tr>
    <tr>
    	<td>
        	Change to sold :
        </td>
        <td>
        	<input name="sold" type="radio" value="1" /> Yes <input name="sold" type="radio" value="0" checked="checked" /> No
        </td>
    </tr>
    <tr>
    	<td>
        	Change sellprice :
        </td>
        <?php
			if ($sellprice!=="request")
			{
		?>
        <td>
        		<input name="sellprice" type="radio" value="0"/> On request 
                <input name="sellprice" type="radio" value="set" checked="checked" /> Set price 
                &#8364;
            	<input name="sellvalue" type="text" value="<?php echo $sellprice ; ?>" size="5" />
        		,--
        </td>
        <?php
			}
			else
			{
		?>
			<td>
        		<input name="sellprice" type="radio" value="0" checked="checked"/> On request 
                <input name="sellprice" type="radio" value="set" /> Set price 
                &#8364;
            	<input name="sellvalue" type="text" size="5" />
        		,--
            </td>
        <?php
			}
			?>
    </tr>
    <tr>
    	<td>
        	<input name="id" type="hidden" value="<?php echo $id ; ?>" />
        	<input name="submit" type="image" value="submit" src="images/save.gif" alt="submit" />
        </td>
    </tr>
</table>
</form>

<?php
break;
 
case 'changesale':
?>	

<?php
							$id			=	$_POST['id'];
							$remove		=	$_POST['remove'];
							$sold		=	$_POST['sold'];
							$sellprice	=	$_POST['sellprice'];
							$sellvalue	=	$_POST['sellvalue'];
							$tablename	=	"horses";
							$date		=	date("Ymd");
							$request	=	"request";


	if ($remove == '1')
		{
			$sql = "UPDATE ".$tablename." SET sale = 0 WHERE id = ".$id.";";
							
			//echo $sql;
							
			mysql_query($sql);
			
			//echo "sql opdracht voor update van kolom sale naar waarde 0";	
		}
	else
		{
			if ($sold == '1')
				{
					$sql = "UPDATE ".$tablename." SET sale = 2, sold_date =  $date WHERE id = ".$id.";";
							
							//echo $sql;
							
							mysql_query($sql);
					
					
					//echo "sql opdracht voor update van kolom sale naar waarde 2 en toevoegen date(d-m-Y) in kolom sold_date";
					//echo "<br />";
					//echo $date;
				}
			else
				{
					if ($sellprice !== 'set')
						{
							$sql = "UPDATE ".$tablename." SET sale_price = '".$request."' WHERE id = ".$id.";";
							
							//echo $sql;
							mysql_query($sql);
						}
					else
						{
							$sql = "UPDATE ".$tablename." SET sale_price = ".$sellvalue." WHERE id = ".$id.";";
							
							//echo $sql;
							
							mysql_query($sql);
							
							//echo "sql opdracht voor update van kolom sale_price naar waarde $sellvalue";
						}
				}
		}
	
header("Refresh: 0; URL=\"?action=member&process=changesold\"");
?>

<?php
break;
 
case 'multisold':
?>

<?php

	$tablename	=	"horses";
	$date		=	date("Ymd");

  $aSold = $_POST['sold'];
  if(empty($aSold)) 
  {
	  echo "<table><tr><td>";
	  echo "You didn't select any horse that is sold.";
	  echo "</td></tr></table>";
	  header("Refresh: 2; URL=\"?action=member&process=changesold\"");
  } 
  else 
  {
    $N = count($aSold);

    //echo("You selected $N horse(s): ");
    for($i=0; $i < $N; $i++)
    {
      //echo($aSold[$i] . " ");
	  $sql =  "UPDATE ".$tablename." SET sale = 2, sold_date =  $date WHERE id = ".$aSold[$i].";";
	  //echo	$sql;
	  mysql_query($sql);
	  
    }
	header("Refresh: 0; URL=\"?action=member&process=changesold\"");
  }
?>
					

<?php
break;
 
case 'multiunsold':
?>

<?php

	$tablename	=	"horses";
	$date		=	"00000000";

  $aSold = $_POST['sold'];
  if(empty($aSold)) 
  {
	  echo "<table><tr><td>";
	  echo "You didn't select any horse that is not sold.";
	  echo "</td></tr></table>";
	  header("Refresh: 2; URL=\"?action=member&process=changesold\"");
  } 
  else 
  {
    $N = count($aSold);

    //echo("You selected $N horse(s): ");
    for($i=0; $i < $N; $i++)
    {
      //echo($aSold[$i] . " ");
	  $sql =  "UPDATE ".$tablename." SET sale = 1, sold_date =  $date WHERE id = ".$aSold[$i].";";
	  //echo	$sql;
	  mysql_query($sql);
	  
    }
	header("Refresh: 0; URL=\"?action=member&process=changesold\"");
  }
?>
					

<?php
break;
 
case 'overview':
?>
<table>
	<tr>
    	<td>
			<h2>
				Overview
			</h2>
		</td>
	</tr>
</table>
<table>
<tr>
	<th colspan="2">
    	<h3>
    		Horse that are for sale
        </h3>
    </th>
</tr>
<tr>
	<td>
    	<b>
    		Sold
        </b>
    </td>
    <td>
    	<b>
    		Name horse
        </b>
    </td>
    <td>
    	<b>
    		Gender
        </b>
    </td>
</tr>
<?php
			$tablename	=	"horses";
			
			$horse = array
			(
			 	"1"	=> $HORSE['stallion'],
				"2"	=> $HORSE['mare'],
				"3"	=> $HORSE['gelding'],
			 );
			
			$sql ="SELECT * FROM ".$tablename." WHERE sale=1 ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					{
					echo "<tr><th colspan='2'>";
					echo "No records available";
					echo "</th></tr>";
					}
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$stamp 		= 	$info['stamp'];
							$gender		=	$info['gender'];
?>
							
						
                        	<tr class="listing">
                    			<td>
                        			<?php echo $fullname; ?>
                        		</td>
                                <td>
                                	<?php echo $horse["$gender"]; ?>
                                </td>
                                <td>
                   		 </tr>
    
    
    
    
    

<?php
						}
					}		


?>
</table>

	
<table>
<tr>
	<th colspan="2">
    	<h3>
    		Horse that are sold
        </h3>
    </th>
</tr>
<tr>
	<td>
    	<b>
    		Unsold
        </b>
    </td>
    <td>
    	<b>
    		Name horse
        </b>
    </td>
    <td>
    	<b>
    		Gender
        </b>
    </td>
    <td>
    	<b>
    		Sold since
        </b>
    </td>
</tr>
<?php
			$tablename	=	"horses";
			
			$horse = array
			(
			 	"1"	=> $HORSE['stallion'],
				"2"	=> $HORSE['mare'],
				"3"	=> $HORSE['gelding'],
			 );
			
			$sql ="SELECT * FROM ".$tablename." WHERE sale=2 ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					{
					echo "<tr><th colspan='2'>";
					echo "No records available";
					echo "</th></tr>";
					}
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$stamp 		= 	$info['stamp'];
							$gender		=	$info['gender'];
							$date	=	$info['sold_date'];

?>
							
						
                        	<tr class="listing">
                    			<td>
                        			<?php echo $fullname; ?>
                        		</td>
                                <td>
                                	<?php echo $horse["$gender"]; ?>
                                </td>
                    			<td>
                        			<?php echo $date; ?>
                        		</td>
                   		 </tr>
    
    
    
    
    

<?php
						}
					}		


?>
</table>





<?php
break;
 
 
                        
						}
                    ?>





<?php
##################################################################################################################################
#							
#												Einde van de webpagina
#
##################################################################################################################################

?>
                    
                    
        		</div>
            </div>
		</div>

<?php

include ('templates/footer.html');

#######################################################################################################
#
#	Hier is het einde van de webpagina !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
#
#######################################################################################################
 							} 
 						} 
 					} 
 				else 
 
 					//if the cookie does not exist, they are taken to the login screen 
 					{			 
 						header("Location: ?action=login"); 
 					} 
		

    	break;
		case 'login':
			
			 	//Checks if there is a login cookie
 				if(isset($_COOKIE['ID_my_site']))
					//if there is, it logs you in and directes you to the members page
 					{ 	
						$username = $_COOKIE['ID_my_site']; 
 						$pass = $_COOKIE['Key_my_site'];
 	 					$check = mysql_query("SELECT * FROM members WHERE login = '$username'")or die(mysql_error());
 					
						while($info = mysql_fetch_array( $check )) 	
 							{
 								if ($pass != $info['pass']) 
 								{
 			 					}
 								else
 								{
 									header("Location: ?action=member");
 
 								}
 							}
					}
					
					
 				//if the login form is submitted 
 				if (isset($_POST['submit'])) 
					{ // if form has been submitted
 
 						// makes sure they filled it in
 						if(!$_POST['username'] | !$_POST['pass']) 
							{
 								print(
					
										'<div id="logcontainer">
 											<h3 class="red">
    											Error
   						 					</h3>
    										<table class="done">
    											<tr>
        											<td>
    													You did not complete all of the required fields.
            										</td>
        										</tr>
        										<tr>
        											<td>
        												Please try again.
            										</td>
        										</tr>
    										</table>
 										</div>
										</body>
										</html>');

  
  										header("Refresh: 3; URL=\"?action=login\"");
       									exit;
 							}
 						// checks it against the database
 
 					if (!get_magic_quotes_gpc()) 
						{
 							$_POST['email'] = addslashes($_POST['email']);
 						}
 					$check = mysql_query("SELECT * FROM members WHERE login = '".$_POST['username']."'")or die(mysql_error());
 
 					//Gives error if user dosen't exist
 					$check2 = mysql_num_rows($check);
 						if ($check2 == 0) 
							{
								print(
					
										'<div id="logcontainer">
 											<h3 class="red">
    											Error
   						 					</h3>
    										<table class="done">
    											<tr>
        											<td>
    													That user does not exist in our database.
            										</td>
        										</tr>
        										<tr>
        											<td>
        												Please register first.
            										</td>
        										</tr>
    										</table>
 										</div>
										</body>
										</html>');

  
  										header("Refresh: 3; URL=\"?action=reg\"");
       									exit;
 							}
 						while($info = mysql_fetch_array( $check )) 	
 							{
 								$_POST['pass'] = stripslashes($_POST['pass']);
 								$info['pass'] = stripslashes($info['pass']);
 								$_POST['pass'] = md5($_POST['pass']);
 
 									//gives error if the password is wrong
 									if ($_POST['pass'] != $info['pass']) 
										{
											print(
					
										'<div id="logcontainer">
 											<h3 class="red">
    											Error
   						 					</h3>
    										<table class="done">
    											<tr>
        											<td>
    													Incorrect password.
            										</td>
        										</tr>
        										<tr>
        											<td>
        												Please try again.
            										</td>
        										</tr>
    										</table>
 										</div>
										</body>
										</html>');

  
  										header("Refresh: 3; URL=\"?action=login\"");
       									exit;
 										}
	 								else 
 										{ 
											// if login is ok then we add a cookie 
 	 										$_POST['username'] = stripslashes($_POST['username']); 
 	 										$hour = time() + 3600; 
 											setcookie(ID_my_site, $_POST['username'], $hour); 
 											setcookie(Key_my_site, $_POST['pass'], $hour);	 
 
 												//then redirect them to the members area 
												 header("Location: ?action=member"); 
 										} 
 							} 
 						} 
					else 
 						{	 
 
 						// if they are not logged in 
 						?> 
 							<div id="logcontainer">
								<h3>
    								Log in
    							</h3>
   								<form action="" method="post">
									<table>
    									<tr>
        									<td>
            									<b>Username:</b>
            								</td>
            								<td>
            									<input name="username" type="text" />
            								</td>
										</tr>
    									<tr>
        									<td>
            									<b>Password:</b>
            								</td>
            								<td>
            									<input name="pass" type="password" />
            								</td>
										</tr>
        								<tr>
        									<td colspan="2" align="center">
            									<input value="Reset" type="reset" />
            									<input type="submit" name="submit" value="login" />
            								</td>
										</tr>
    								</table>
    							</form>
    							<h6>
                                	Designed &amp; Scripted by Divigo Design.
                                </h6>
							</div> 
 <?php 
 						} 
 

			
			
		break;
		case 'reg':
			if ($registration == 0)
				{
					print(
					
							'<div id="logcontainer">
 								<h3 class="red">
    								Error
   						 		</h3>
    							<table class="done">
    								<tr>
        								<td>
											<b>
    											You can not register for this website.
											</b>
            							</td>
        							</tr>
    							</table>
 							</div>
							</body>
							</html>');

  
  						header("Refresh: 3; URL=\"?action=login\"");
       					exit;
				
				
				
				}
			if ($registration == 1)
				{
		
					//This code runs if the form has been submitted
 					if (isset($_POST['submit'])) 
 						{ 
	
							$login	=	$_POST['username'];
							$pass1	=	$_POST['pass'];
							$pass2	=	$_POST['pass2'];
 
 							//This makes sure they did not leave any fields blank
 							if (!$login | !$pass1 | !$pass2 ) 
								{
									print(
											'<div id="logcontainer">
 												<h3 class="red">
    												Error
   						 						</h3>
    											<table class="done">
    												<tr>
        												<td>
    														You did not complete all of the required fields.
            											</td>
        											</tr>
        											<tr>
        												<td>
        													Please try again.
            											</td>
        											</tr>
    											</table>
 											</div>'
										);

  
  										header("Refresh: 3; URL=\"?action=reg\"");
       									exit;
 								}
 
 							// checks if the username is in use
 							if (!get_magic_quotes_gpc()) 
								{
 									$login = addslashes($login);
 								}
			
			
 								$usercheck = $login;
 								$check = mysql_query("SELECT login FROM members WHERE login = '$usercheck'")or die(mysql_error());
 								$check2 = mysql_num_rows($check);
 
 							//if the name exists it gives an error
 							if ($check2 != 0) 
								{
 									print(
											'<div id="logcontainer">
 												<h3 class="red">
    												Error
   						 						</h3>
    											<table class="done">
    												<tr>
        												<td>
    														Sorry, the username '.$login.' is invalid.
            											</td>
        											</tr>
        											<tr>
        												<td>
        													Please choose a different name.
            											</td>
        											</tr>
    											</table>
 											</div>'
										);

  
  										header("Refresh: 3; URL=\"?action=reg\"");
       									exit;

 								}
			
 							// this makes sure both passwords entered match
 							if ($pass1 != $pass2)
								{
 									print(
											'<div id="logcontainer">
 												<h3 class="red">
    												Error
   						 						</h3>
												<table class="done">
													<tr>
        												<td>
    														Sorry the passwords didn\'t match.
            											</td>
        											</tr>
        											<tr>
        												<td>
        													Please try again.
            											</td>
        											</tr>
    											</table>
 											</div>'
										);

  
  										header("Refresh: 3; URL=\"?action=reg\"");
       									exit;

 								}
 
 							// here we encrypt the password and add slashes if needed
 							$pass = md5($pass1);
 							if (!get_magic_quotes_gpc()) 
								{
 									$pass = addslashes($pass);
 									$login = addslashes($login);
 								}
 
 							// now we insert it into the database
 								$insert = "INSERT INTO members 
																(
																	login, 
																	pass
																)
 														VALUES 
																(
							 										'".$login."',
							 										'".$pass."'
							 									)";
 								$add_member = mysql_query($insert);

 							print
								(
                    				'<div id="logcontainer">
 										<h3>
    										Registered
    									</h3>
    									<table class="done">
    										<tr>
        										<td>
    												Thank you, you have registered.
            									</td>
        									</tr>
        									<tr>
        										<td>
        											You may now login.
            									</td>
        									</tr>
    									</table>
										<h6>
                        					Designed &amp; Scripted by Divigo Design.
                        				</h6>
 									</div>'
								);
									header("Refresh: 3; URL=\"?action=login\"");
       								exit;
  						}
 					else 
						{	 
?>
							 <div id="logcontainer">
 								<h3>
    								Register
    							</h3>
 								<form action="" method="post">
 									<table border="0">
 										<tr>
        									<td>
            									Username:
            								</td>
           									 <td>
 												<input type="text" name="username" maxlength="60" />
 											</td>
        								</tr>
 										<tr>
        									<td>
            									Password:
            								</td>
            								<td>
												<input type="password" name="pass" maxlength="10" />
 											</td>
 										</tr>
 										<tr>
 											<td>
 												Confirm Password:
            								</td>
            								<td>
 												<input type="password" name="pass2" maxlength="10" />
 											</td>
        								</tr>
 										<tr>
        									<th colspan="2">
            									<input value="Reset" type="reset" />
            									<input type="submit" name="submit" value="Register" />
            								</th>
       									 </tr>
 									</table>
 								</form>
 							</div>
 
 <?php
						}
				}
		break;
		case 'logout':
			
			 $past = time() - 100; 
			 //this makes the time in the past to destroy the cookie 
 				setcookie(ID_my_site, gone, $past); 
 				setcookie(Key_my_site, gone, $past); 
 				header("Location: ?action=login"); 
			
		break;
   
	}//end the switch



?>




</body>
</html>
 <?php
ob_flush();?>