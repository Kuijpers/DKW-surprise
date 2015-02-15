	
<?php

			$stamp	=	$_GET['stamp'];
			
			
			$tablename	=	"horses";
			
						$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp."";
    						$data = mysql_query($sql);
							if (mysql_num_rows($data)!==0)
								{
									$info = mysql_fetch_array( $data );
					
									$id			=	$info['id'];
									$callname	=	$info['callname'];
									$fullname	=	$info['fullname'];
									$gender		=	$info['gender'];
									$dobday		=	$info['dobday'];
									$dobmonth	=	$info['dobmonth'];
									$dobyear	=	$info['dobyear'];
									$sire		=	$info['sire'];
									$dam		=	$info['dam'];
									$fofs		=	$info['fofs'];
									$mofs		=	$info['mofs'];
									$fofd		=	$info['fofd'];
									$mofd		=	$info['mofd'];
									$color		=	$info['color'];
									$height		=	$info['height'];
									$unit		=	$info['unit'];
									$spot		=	$info['spot'];
								}
			

				$horse			=	array (
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




?>
<table>
	<tr>
    	<td>
			<h3>
            	Final
           	</h3>
        </td>
   </tr>
</table>

<div class="halve">
<table>
	<tr>
    	<td>
        	<?php echo $fullname; ?>
        </td>
    </tr>
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
    <tr>
        	<th colspan="2">
            	<b>
            		Registrations
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
							$registration 		= $info['registration'];
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
</div>


<div class="halve">
	<table>
    	<tr>
        	<th colspan="2">
            	<b>
            		Main image
                </b>
            </th>
        </tr>
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
							
							
								$thumb_path		=	"../album/thumbs/thumb_";
								$full_path		=	"../album/";

								$thumb_image	=	"".$thumb_path."".$image_name."";
								$full_image		=	"".$full_path."".$image_name."";
								
								$image_value	=	"1";
?>
		<tr>
        	<td>
            	<img src="<?php echo $thumb_image ; ?>" alt="Main image"/>
            </td>
        </tr>
        <?php
		
						}
					}
	?>
	</table>
</div>





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

<div class="image_scroll">
	<table>
    	<tr>
	<?php
			
			$tablename	=	"picture";
			
			$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp." ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
						{
							echo	"<div class='image'>";
							echo 	"<img src='images/no_image.png' alt='No image availlable'/>";
							echo	"</div>";
						}
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id					=	$info['id'];
							$image_name 		= 	$info['image'];
							
							
								$thumb_path		=	"../album/thumbs/thumb_";
								$full_path		=	"../album/";

								$thumb_image	=	"".$thumb_path."".$image_name."";
								$full_image		=	"".$full_path."".$image_name."";
								
								$image_value	=	"1";
?>
		<td>
            	<img src="<?php echo $thumb_image ; ?>" alt="Images"/>
        </td>
        <?php
		
						}
					}
	?>
    </tr>
    </table>
    
    
	

</div>
<?php
		
		
		$dir = "./lang/";

		$dh = opendir($dir);

		while (($file = readdir($dh)) !== false) 
		{
			// Gets the File Extension
			$extension = substr($file, strrpos($file, '.'));
			
			
			// checks if the extension is .php or the file name is  . or .. if so it will be shown as an exclusion
			if($extension !== ".php" && $file !== "." && $file !== ".." && $file !== "index.html")
			{
			
			
						
			
			
?>
<div class="halve">
<table>
	<tr>
    	<td>
			<h3>
				<?php echo $language[$file] ; ?>
			</h3>
        </td>
    </tr>
</table>
</div>
<div class="horseinfo">
<?php


						$tablename	=	"".$file."_".$data_id."";


			$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp." ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					echo "No records available";
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id		=	$info['id'];
							$title 	= 	$info['title'];
    						$tekst 	= 	$info['text'];
							$tekst 	= 	nl2br ($tekst);
							$stamp = $info['stamp'];

			
?>

<h4>
	<?php echo $title ; ?>
</h4>
<?php echo $tekst ; ?>
<hr />

<?php

						}
					}


?>

</div>


<?php
			}
		}


		closedir($dh);
?>
<div class="full">
<table>
	<tr>
    	<th colspan="2">
        	<i>
        		All information about the horse is in the database now.
            	<br />
            	With the links below you can add additional information for the horse.
            	<br />
           		This can also be done later.
            </i>
        </th>
	</tr>
</table>
<hr />
<form name="offspring" enctype="multipart/form-data" action="?action=member&amp;process=offspring" method="post">
	<table>
    	<tr>
        	<td>
            	Check, add and change all offsprings :
            </td>
            <td>
            	<input name="stamp" type="hidden" value="<?php echo $stamp ; ?>" />
            	<input name="submit" type="submit" value="Proceed" />
            </td>
        </tr>
    </table>
</form>
<form name="breeding" enctype="multipart/form-data" action="?action=member&amp;process=currentbreeding" method="post">   
    <table>
    	<tr>
        	<td>
            	Check, add and change all breedings :
            </td>
            <td>
            	<input name="stamp" type="hidden" value="<?php echo $stamp ; ?>" />
            	<input name="submit" type="submit" value="Proceed" />
            </td>
        </tr>
    </table>
</form>
<form name="breeding" enctype="multipart/form-data" action="?action=member&amp;process=results" method="post">   
    <table>
    	<tr>
        	<td>
            	Check, add and change all results :
            </td>
            <td>
            	<input name="stamp" type="hidden" value="<?php echo $stamp ; ?>" />
            	<input name="submit" type="submit" value="Proceed" />
            </td>
        </tr>
    </table>
</form>


</div>
<div class="full">
<table>
	<tr>
    	<th colspan="2">
        	<a href="home_horses.php?action=member">Finished >></a>
        </th>
    </tr>
</table>
</div>
