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
            	Step 3 of 4
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
							$image_value		=	$info['main_image'];
							
								$thumb_path		=	"../album/thumbs/thumb_";
								$full_path		=	"../album/";

								$thumb_image	=	"".$thumb_path."".$image_name."";
								$full_image		=	"".$full_path."".$image_name."";
								
								
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

<div class="full">
<form name="update" enctype="multipart/form-data" action="?action=member&amp;process=uploadimage" method="post">
<table>
	<tr>
    	<th>
        	<h3>
            	Add Image
            </h3>
        </th>
    </tr>
   	<tr>
    	<td>
        	<b>
        		Image
            </b>
        </td>
     <?php
			if (!empty($image_value))
				{
					$image_value	=	$image_value;
				}
			else
				{
					$image_value	=	'';
				}
				
				
	 		if ($image_value !== '1')
				{
		?>
        <td>
        	<b>
        		Main image
            </b>
        </td>
        <?php
				}
		?>
    </tr>
    <tr>
    	<td>
        	<input name="image" type="file" size="28" />
    	</td>
     <?php
	 		if ($image_value !== '1')
				{
		?>
        <td>
        	<input name="main_image" type="checkbox" value="1" /> Make image main image 
        </td>
        <?php
				}
		?>
        <td>
        	<input name="submit" type="submit" value="Add" />
        </td>
    </tr>
</table>
    	<input name="stamp" type="hidden" value="<?php echo $stamp ; ?>" />
</form>
</div>

<div class="full">
<table>
	<tr>
    	<th colspan="2">
        	<a href="?action=member&amp;process=info&amp;stamp=<?php echo $stamp;?>">Next step >></a>
        </th>
    </tr>
</table>
</div>
