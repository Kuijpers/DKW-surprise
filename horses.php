<?php

	$page_id = "Horses"; // De tekst tussen de " " moet je veranderen voor de pagina titel ( <title></title> )
	
	$data_id = "horses";
	
	if (!empty($_GET['stamp']))
		{
			$stamp		=	$_GET['stamp'];
		}
	else
		{
			if (!empty($_POST['stamp']))
				{
					$stamp		=	$_POST['stamp'];
				}
		}
	if (!empty($_GET['lang']))
		{
			$lang		=	$_GET['lang']; // Kijk of er een taal geselecteerd is
		}
		



include ('includes/incl.php');

include ('templates/header.html');
include ('templates/top.html');
include ('templates/lang.html');
if ($menu_set == 1) // gegevens staan vermeld in config/config.php
		{
			include ('includes/menu.php');
		}


?>

<div class="overall_body">


<!-- In dit onderstaande gedeelte komt de tekst en eventueel de foto's te staan welke je op de pagina wilt laten zien -->


   		<div id="body">
        	<div class="body_full">
<?php

$intUserInput = validateint($_GET['stamp']);

if($intUserInput > -1) {


// BEGIN VOORSTELLING

$stamp		=	$_GET['stamp'];
$tablename	=	"horses";

			$stamp = mysql_real_escape_string($stamp);
			
						$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp."";
    						$data = mysql_query($sql);
							if (mysql_num_rows($data)!==0)
								{
									$info = mysql_fetch_array( $data );
					
									$id				=	$info['id'];
									$callname		=	$info['callname'];
									$callname		=	stripslashes($callname);
									$fullname		=	$info['fullname'];
									$fullname		=	stripslashes($fullname);
									$gender			=	$info['gender'];
									$dobday			=	$info['dobday'];
									$dobmonth		=	$info['dobmonth'];
									$dobyear		=	$info['dobyear'];
									$sire			=	$info['sire'];
									$sire			=	stripslashes($sire);
									$dam			=	$info['dam'];
									$dam			=	stripslashes($dam);
									$fofs			=	$info['fofs'];
									$fofs			=	stripslashes($fofs);
									$mofs			=	$info['mofs'];
									$mofs			=	stripslashes($mofs);
									$fofd			=	$info['fofd'];
									$fofd			=	stripslashes($fofd);
									$mofd			=	$info['mofd'];
									$mofd			=	stripslashes($mofd);
									$sale			=	$info['sale'];
									$sale_price		=	$info['sale_price'];
									$breed			=	$info['breed'];
									$breed_price	=	$info['breed_price'];
									$color			=	$info['color'];
									$color			=	stripslashes($color);
									$height			=	$info['height'];
									$unit			=	$info['unit'];
									$spot			=	$info['spot'];
								}
			

				$horse	=	array (
								   	"1"	=>	$HORSE["stallion"],
									"2"	=>	$HORSE["mare"],
									"3"	=>	$HORSE["gelding"],
								   
								   );
				
				$measure 		=	array (
								  		"1" =>	$HORSE["measurespot1"],
										"2" =>	$HORSE["measurespot2"],
								  	);
				
				$measureunit 	=	array (
									  	"1" =>	$HORSE['measureunit1'],
										"2" =>	$HORSE['measureunit2'],
										"3" =>	$HORSE['measureunit3'],
									 );



// ALS HET PAARD TE KOOP IS OF VERKOCHT

if ($sale !== "0")
{
?>
<table>
	<tr>
    	<td class="forsale">
        	<b>
<?php
	if ($sale == "1")
	{
    	echo $HORSE["for_sale"];
	}
	else
	{
		echo $HORSE["sold"]	;
	}

?>
            </b>
        </td>
    </tr>
    <tr>
        <td>
        	<?php
				echo $HORSE["sellprice"]	;
			?>
        </td>
        <td>
<?php
	if ($sale == "1" && $sale_price !== "request")
		{
        	echo	"&#8364;";
			echo	$sale_price;
			echo	",--";
		}
	if ($sale == "1" && $sale_price == "request")
		{
        	echo	$HORSE["price_request"];
		}
?>
        </td>
    </tr>
</table>

<?php
}
?>




<?php
// NAAMSVERMELDING VAN HET PAARD
?>
<table>
	<tr>
    	<td>
			<h3>
            	<?php echo $fullname; ?>
           	</h3>
        </td>
   </tr>
</table>
<?php
// VOLLEDIGE INFORMATIE VAN HET PAARD
?>
<div class="halve">
<table>
	<tr>
    	<td>
        	<?php echo $callname; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $horse[$gender]; ?>
        </td>
	</tr>
	<tr>
    	<td>
        	<?php echo $dobday ; echo "-" ; echo $dobmonth ;echo "-"; echo $dobyear ; ?>
        </td>
   	</tr>
<?php
 	
	if (!empty($color))
		{	
?>
	<tr>
    	<td>
        	<?php echo $color; ?>
        </td>
    </tr>
<?php
		}
?>
<?php
 	
	if (!empty($height))
		{	
?>
	<tr>
    	<td>
        	<?php echo $height; ?> <?php echo $measureunit[$unit]; ?> 
        </td>
    </tr>
    <tr>
    	<td>
        	<?php echo $HORSE['measurespot']; ?> <?php echo $measure[$spot]; ?> 
        </td>
    </tr>
<?php
		}
?>
<?php
// REGISTRATIE INFORMATIE VAN HET PAARD
?>
    <tr>
        	<th colspan="2">
            	<b>
            		<?php
						echo $HORSE["registrations"]	;
					?>
                </b>
            </th>
        </tr>
        <?php
			
			$tablename	=	"registration";
			
			$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp." ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
						{
							echo	"<tr><th colspan='2'>";
							echo "No registration known.";
							echo	"</th></tr>";
						}
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id					=	$info['id'];
							$organisation 		= 	$info['organisation'];
							$organisation		=	stripslashes($organisation);
							$registration 		= 	$info['registration'];
?>
		<tr>
        	<td>
            	<?php echo $organisation ; ?>
            </td>
            <td>
            	<?php echo $registration ; ?>
            </td>
        </tr>
        <?php
		
						}
					}
	?>
</table>
<table>
<?php
	if ($gender == 1 && $breed == 1)
		{
?>
    		<tr>
    			<th colspan="4">
                	<h4>
    				<?php echo $HORSE["outsidebreeding"] ; ?>
                    </h4>
    			</th>
    		</tr>
            <tr>
            	<td>
                	<?php echo $HORSE["breedingprice"] ; ?>
                </td>
                <td>
                	:
                </td>
                <td>
                			<?php
									if ($breed_price == "request")
										{
											echo $HORSE["breed_request"];	
										}
									else
										{
								?>
                                	&#8364; <?php echo $breed_price; ?>
                                <?php
                                    	}
								?>
                </td>
            </tr>
            <tr>
            	<td>&nbsp;
                	
                </td>
            </tr>
            <tr>
            	<th align="center" colspan="4">
                	<input type="button" class="button" value="<?php echo $HORSE["breedingterms"] ; ?>" onclick="javascript:popUp('breedingterms.php?lang=<?php echo $lang ; ?>')" />
					<?php echo $MAIN["popup"] ; ?>
					<br />
					<noscript>
						<b>
							Sorry java script moet aan staan om de dekvoorwaarden te zien.
    					</b>
					</noscript>
                </th>
            </tr>
<?php
		}
?>
</table>
</div>
<?php
// FOTO VAN HET PAARD
?>
<div class="halve">
	<table>
        <?php
			
			$tablename	=	"picture";
			
			$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp." AND main_image= 1 ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
						{
							echo	"<tr><th colspan='2'>";
							echo 	"<img src='images/no_image.png' alt='No image availlable'/>";
							echo	"</th></tr>";
						}
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id					=	$info['id'];
							$image_name 		= 	$info['image'];
							
							
								$thumb_path		=	"album/thumbs/thumb_";
								$full_path		=	"album/";

								$thumb_image	=	"".$thumb_path."".$image_name."";
								$full_image		=	"".$full_path."".$image_name."";
								
								$image_value	=	"1";
?>
		<tr>
        	<td>
            	<span class="left">
            	<a href="<?php echo $full_image;?>" title="Slide image" rel="foto">
                    	<img src="<?php echo $thumb_image;?>" title="Slide image" alt="Slide image" />
                    </a>
                </span>
            </td>
        </tr>
        <?php
		
						}
					}
	?>
	</table>
</div>


<?php
// BLOEDLIJN VAN HET PAARD
?>


<div class="full">
<table>
    <tr class="listing">
    	<td>&nbsp;
        
    	</td>
        <td>
        	<?php echo $fofs ; ?>
        </td>
    </tr>
    <tr class="listing">
        <td>
        	<?php echo $sire ; ?>
        </td>
    	<td>&nbsp;
        
    	</td>
    </tr>
    <tr class="listing">
    	<td>&nbsp;
        
    	</td>
        <td>
        	<?php echo $mofs ; ?>
        </td>
    </tr>
    <tr class="listing">
    	<td>&nbsp;
        
    	</td>
        <td>
        	<?php echo $fofd ; ?>
        </td>
    </tr>
    <tr class="listing">
        <td>
        	<?php echo $dam ; ?>
        </td>
    	<td>&nbsp;
        
    	</td>
    </tr>
    <tr class="listing">
    	<td>&nbsp;
        
    	</td>
        <td>
        	<?php echo $mofd ; ?>
        </td>
    </tr>
</table>

</div>
<?php
// ALLE FOTO'S DIE BESCHIKBAAR ZIJN OP DE WEBSITE VAN HET PAARD
?>

	<?php
			
			$tablename	=	"picture";
			
			$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp." ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
						{
							
						}
					else
					{
						if (mysql_num_rows($data)>1)
							{
							?>	
<div class="image_scroll">
	<table>
    	<tr>								
<?php
								//here is the loop using the statement above
								while($info = mysql_fetch_array( $data ))
									{
										$id					=	$info['id'];
										$image_name 		= 	$info['image'];
							
							
											$thumb_path		=	"album/thumbs/thumb_";
											$full_path		=	"album/";

											$thumb_image	=	"".$thumb_path."".$image_name."";
											$full_image		=	"".$full_path."".$image_name."";
								
											$image_value	=	"1";
?>
											<td>
            									<a href="<?php echo $full_image;?>" title="Slide image" rel="foto">
                    								<img src="<?php echo $thumb_image;?>" title="Slide image" alt="Slide image" />
                    							</a>
       										</td>
        <?php
		
									}
?>
	 </tr>
    </table>
</div>						
<?php
							}
					}
	?>
   
    
    
<?php
// ALLE BERICHTGEVINGEN OVER HET PAARD
?>	



<?php


						$tablename	=	"".$lang."_".$data_id."";


			$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp." ORDER BY id DESC";
    				$data = mysql_query($sql) or die(mysql_error());
					if (mysql_num_rows($data)==0)
					{
						
					}
					else
					{
?>
<div class="full">
<?php
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id		=	$info['id'];
							$title 	= 	$info['title'];
							$title	=	stripslashes($title);
    						$tekst 	= 	$info['text'];
							$tekst 	= 	nl2br ($tekst);
							$tekst	=	stripslashes($tekst);
							$stamp 	= 	$info['stamp'];

			
?>
<table>
	<tr>
    	<td>
			<h4>
				<?php echo $title ; ?>
			</h4>
        </td>
   	</tr>
    <tr>
    	<td>
			<?php echo $tekst ; ?>
        </td>
    </tr>
</table>


<?php

						}
?>	
</div>
<?php				
					}


?>

<?php
// RESULTATEN DIE BEHAALD ZIJN MET HET PAARD
?>

<?php
		$sql ="SELECT * FROM results WHERE stamp= ".$stamp." ORDER BY resyear DESC, resmonth DESC, resday DESC, organisation DESC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)!==0)
					{
					?>

<table>
	<tr>
    	<th colspan="4">
        	<h3>
            	<?php echo $HORSE["results"]; ?>
            </h3>
        </th>
    </tr>
	<tr>
		<th colspan="3">
        	<b>
         		<?php echo $DATE["date"]; ?>
            </b>
    	</th>
		<td>
        	<b>
    			<?php echo $HORSE["organisation"]; ?>
            </b>
    	</td>
		<td>
        	<b>
    			<?php echo $HORSE["showname"]; ?>
            </b>
    	</td>
		<td>
        	<b>
    			<?php echo $HORSE["class"]; ?>
            </b>
    	</td>
		<td>
        	<b>
    			<?php echo $HORSE["result"]; ?>
            </b>
    	</td>
	</tr>                   
                    <?php
						//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$resday			=	$info['resday'];
							$resmonth		= 	$info['resmonth'];
    						$resyear		= 	$info['resyear'];
							$organisation	=	$info['organisation'];
							$organisation	=	stripslashes($organisation);
							$showname		=	$info['showname'];
							$showname		=	stripslashes($showname);
							$showclass		=	$info['showclass'];
							$showclass		=	stripslashes($showclass);
							$result			=	$info['result'];
							$result			=	stripslashes($result);

?>
<tr>
	<td>
    	<?php echo $resday ; ?>
    </td>
	<td>
    	<?php echo $DATE[$resmonth] ; ?>
    </td>
	<td>
    	<?php echo $resyear ; ?>
    </td>
	<td>
    	<?php echo $organisation ; ?>
    </td>
	<td>
    	<?php echo $showname ; ?>
    </td>
	<td>
    	<?php echo $showclass ; ?>
    </td>
	<td>
    	<?php echo $result ; ?>
    </td>
</tr>

<?php

						}
?>						
</table>



</div>
<?php
					}

?>



<?php

//CURRENT BREEDING MET HET PAARD

?>

<?php
			$tablename	=	"breeding";


			$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp." ORDER BY id DESC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)!==0)
					{

?>
<div class="full">
<table>
    	<tr>
        	<th colspan="2">
            	<h3>
            		<?php echo $HORSE["current_breeding"];?>
                </h3>
            </th>
        </tr>
	<tr>
    	<td>
        	<b>
        		<?php echo $horse["1"];?>
            </b>
        </td>
        <td>
        	<b>
            	X
            </b>
        </td>
        <td>
        	<b>
            	<?php echo $horse["2"];?>
            </b>
        </td>
        <td>
        	<b>
            	<?php echo $HORSE["expected_fd"];?>
            </b>
        </td>
    </tr>
<?php

				//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$stallion		=	$info['stallion'];
							$stallion		=	stripslashes($stallion);
							$mare	 		= 	$info['mare'];
							$mare			=	stripslashes($mare);
    						$breedmonth 	= 	$info['breedmonth'];
							$breedyear		=	$info['breedyear'];
?>
	<tr>
    	<td>
        	<?php echo $stallion ; ?>
        </td>
        <td>
        	<b>
            	X
            </b>
        </td>
        <td>
        	<?php echo $mare ; ?>
        </td>
        <td>
        	<?php
				echo	$DATE[$breedmonth];
				echo	"&nbsp;";
				echo	$breedyear ;
			
			?>
        </td>
    </tr>



<?php
						}
?>				
</table>
</div>
<?php				
					}
?>


<?php
// GEREGISTREERDE NAKOMELINGEN VAN HET PAARD MET HUN RESULTATEN
?>

<?php
$horse			=	array(
				
	// form information
	
	
	"1"			=>	"Stallion",
	
	"2"			=>	"Mare",
	
	"3"			=>	"Gelding",
	
	);
							
							
							
							
					$sql1 ="SELECT * FROM offspring WHERE stamp= $stamp ORDER BY dobyear ASC";
    				$data = mysql_query($sql1);
					if (mysql_num_rows($data)!==0)
					{
?>

<div class="full">
<table>
	<tr>
    	<th colspan="5">
        	<h3>
        		<?php echo $HORSE["offspring"];?>
            </h3>
        </th>
    </tr>
    <tr>
    	<td>
        	<b>
				<?php echo $HORSE["horsename"];?>
            </b>
        </td>
    	<th colspan="3">
        	<b>
				<?php echo $HORSE["dob"];?>
            </b>
        </th>
        <td>
        	<b>
        		<?php echo $HORSE["gender"];?>
            </b>
        </td>
        <td>
        	<b>
        		<?php echo $HORSE["2ndparent"];?>
            </b>
        </td>
        <td>
        	<b>
        		<?php echo $HORSE["results"];?>
            </b>
        </td>
    </tr>
<?php
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$name 		= 	$info['name'];
							$name		=	stripslashes($name);
    						$gender 	= 	$info['gender'];
							$dobday		=	$info['dobday'];
							$dobmonth	=	$info['dobmonth'];
							$dobyear	=	$info['dobyear'];
							$parent		=	$info['parent'];
							$parent		=	stripslashes($parent);
							$results	=	$info['results'];
							$results 	= 	nl2br ($results);
							$results	=	stripslashes($results);
							$stamp 		= 	$info['stamp'];

			
?>
	<tr>
    	<td valign="top">
			<?php echo $name ; ?>
        </td>
    	<td valign="top">
			<?php echo $dobday ; ?>
        </td>
    	<td valign="top">
			<?php echo $DATE["$dobmonth"] ; ?>
        </td>
    	<td valign="top">
			<?php echo $dobyear ; ?>
        </td>
        <td valign="top">
        	<?php echo $horse["$gender"] ; ?>
        </td>
        <td valign="top">
        	<?php echo $parent ; ?>
        </td>
        <td>
        	<?php echo $results ; ?>
        </td>
    </tr>

<?php

						}
?>	
</table>


</div>
<?php				
					}
?>


<?php
// EINDE VOORSTELLING

}
	else
{

?>
<table>
	<tr>
    	<td>
        	Something went wrong when you selected the horse.
            <br />
            Please select the horse again.
        </td>
    </tr>
</table>

<?php

}

?>

   </div>


</div>

<?php

include ('templates/footer.html');

?>