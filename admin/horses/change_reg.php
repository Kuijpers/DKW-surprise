
<?php
			$stamp			=	$_GET['stamp'];
			$registrationid	=	$_GET['regid'];
			
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
            	Change horse information.
           	</h3>
        </td>
   </tr>
</table>
<div class="section">
<form name="newad" enctype="multipart/form-data" action="?action=member&amp;process=changehorse" method="post">
<div class="halve">
<table>
	<tr>
    	<td>
        	<input name="fullname" type="text" value="<?php echo $fullname; ?>" size="50" />
        </td>
    </tr>
	<tr>
    	<td>
        	<input name="callname" type="text" value="<?php echo $callname; ?>" size="50" />
        </td>
    </tr>
	<tr>
    	<td>
        	<select name="gender">
            	<option value="1" <?php if ($gender == '1')echo "selected='selected'";?>><?php echo $HORSE['stallion']; ?></option>
            	<option value="2" <?php if ($gender == '2')echo "selected='selected'";?>><?php echo $HORSE['mare']; ?></option>
            	<option value="3" <?php if ($gender == '3')echo "selected='selected'";?>><?php echo $HORSE['gelding']; ?></option>
            </select>
        </td>
	</tr>
	<tr>
    	<td>
        	<select name="dobday">
            	<option value="01" <?php if ($dobday == '01')echo "selected='selected'";?>>01</option>
            	<option value="02" <?php if ($dobday == '02')echo "selected='selected'";?>>02</option>
            	<option value="03" <?php if ($dobday == '03')echo "selected='selected'";?>>03</option>
            	<option value="04" <?php if ($dobday == '04')echo "selected='selected'";?>>04</option>
            	<option value="05" <?php if ($dobday == '05')echo "selected='selected'";?>>05</option>
            	<option value="06" <?php if ($dobday == '06')echo "selected='selected'";?>>06</option>
            	<option value="07" <?php if ($dobday == '07')echo "selected='selected'";?>>07</option>
            	<option value="08" <?php if ($dobday == '08')echo "selected='selected'";?>>08</option>
            	<option value="09" <?php if ($dobday == '09')echo "selected='selected'";?>>09</option>
            	<option value="10" <?php if ($dobday == '10')echo "selected='selected'";?>>10</option>
            	<option value="11" <?php if ($dobday == '11')echo "selected='selected'";?>>11</option>
            	<option value="12" <?php if ($dobday == '12')echo "selected='selected'";?>>12</option>
            	<option value="13" <?php if ($dobday == '13')echo "selected='selected'";?>>13</option>
            	<option value="14" <?php if ($dobday == '14')echo "selected='selected'";?>>14</option>
            	<option value="15" <?php if ($dobday == '15')echo "selected='selected'";?>>15</option>
            	<option value="16" <?php if ($dobday == '16')echo "selected='selected'";?>>16</option>
            	<option value="17" <?php if ($dobday == '17')echo "selected='selected'";?>>17</option>
            	<option value="18" <?php if ($dobday == '18')echo "selected='selected'";?>>18</option>
            	<option value="19" <?php if ($dobday == '19')echo "selected='selected'";?>>19</option>
            	<option value="20" <?php if ($dobday == '20')echo "selected='selected'";?>>20</option>
            	<option value="21" <?php if ($dobday == '21')echo "selected='selected'";?>>21</option>
            	<option value="22" <?php if ($dobday == '22')echo "selected='selected'";?>>22</option>
            	<option value="23" <?php if ($dobday == '23')echo "selected='selected'";?>>23</option>
            	<option value="24" <?php if ($dobday == '24')echo "selected='selected'";?>>24</option>
            	<option value="25" <?php if ($dobday == '25')echo "selected='selected'";?>>25</option>
            	<option value="26" <?php if ($dobday == '26')echo "selected='selected'";?>>26</option>
            	<option value="27" <?php if ($dobday == '27')echo "selected='selected'";?>>27</option>
            	<option value="28" <?php if ($dobday == '28')echo "selected='selected'";?>>28</option>
            	<option value="29" <?php if ($dobday == '29')echo "selected='selected'";?>>29</option>
            	<option value="30" <?php if ($dobday == '30')echo "selected='selected'";?>>30</option>
            	<option value="31" <?php if ($dobday == '31')echo "selected='selected'";?>>31</option>
            
            </select>
             - 
             <select name="dobmonth">
            	<option value="01" <?php if ($dobday == '01')echo "selected='selected'";?>><?php echo $DATE['1']; ?></option>
            	<option value="02" <?php if ($dobday == '02')echo "selected='selected'";?>><?php echo $DATE['2']; ?></option>
            	<option value="03" <?php if ($dobday == '03')echo "selected='selected'";?>><?php echo $DATE['3']; ?></option>
            	<option value="04" <?php if ($dobday == '04')echo "selected='selected'";?>><?php echo $DATE['4']; ?></option>
            	<option value="05" <?php if ($dobday == '05')echo "selected='selected'";?>><?php echo $DATE['5']; ?></option>
            	<option value="06" <?php if ($dobday == '06')echo "selected='selected'";?>><?php echo $DATE['6']; ?></option>
            	<option value="07" <?php if ($dobday == '07')echo "selected='selected'";?>><?php echo $DATE['7']; ?></option>
            	<option value="08" <?php if ($dobday == '08')echo "selected='selected'";?>><?php echo $DATE['8']; ?></option>
            	<option value="09" <?php if ($dobday == '09')echo "selected='selected'";?>><?php echo $DATE['9']; ?></option>
            	<option value="10" <?php if ($dobday == '10')echo "selected='selected'";?>><?php echo $DATE['10']; ?></option>
            	<option value="11" <?php if ($dobday == '11')echo "selected='selected'";?>><?php echo $DATE['11']; ?></option>
            	<option value="12" <?php if ($dobday == '12')echo "selected='selected'";?>><?php echo $DATE['12']; ?></option>            
            </select>
             - 
             <select name="dobyear">
             <?php
        	$current_year = date('Y');
			$end_year = $current_year-=35; // for a different selection of years in the past adjust the five in the amount of years as desired.
	
			for ($year= date('Y');$year>=$end_year;$year--)
					{
			?>
						<option value="<?php echo $year; ?>"<?php if ($dobyear == $year)echo "selected='selected'";?>><?php echo $year ; ?></option>	
			<?php
            		}
			?>
            </select>
        </td>
   	</tr>
    <tr>
        <td>
        	<input name="color" type="text" value="<?php echo $color; ?>" size="50" />
        </td>
   	</tr>
    <tr>
    	<td>
        	<input name="height" type="text" value="<?php echo $height; ?>" size="4" />
                    <select name="unit">
                    	<option value="">&nbsp;</option>
                        <option value="1" <?php if ($unit == "1"){ echo "selected='selected'";} ?> ><?php echo $HORSE['measureunit1']; ?></option>
                        <option value="2" <?php if ($unit == "2"){ echo "selected='selected'";} ?> ><?php echo $HORSE['measureunit2']; ?></option>
                        <option value="3" <?php if ($unit == "3"){ echo "selected='selected'";} ?> ><?php echo $HORSE['measureunit3']; ?></option>
                    </select>
        </td>
    </tr>
    <tr>
    	<td>
        	<select name="spot">
            	<option value="">&nbsp;</option>
            	<option value="1" <?php if ($spot == "1"){ echo "selected='selected'";} ?> ><?php echo $HORSE['measurespot1']; ?></option>
            	<option value="2" <?php if ($spot == "2"){ echo "selected='selected'";} ?> ><?php echo $HORSE['measurespot2']; ?></option>
           	</select>
        </td>
    </tr>
</table>
</div>


<div class="full">
<table>
    <tr class="listing">
    	<td>&nbsp;
        
    	</td>
        <td>
        	<input name="fofs" type="text" value="<?php echo $fofs ; ?>" size="50" />
        </td>
    </tr>
    <tr class="listing">
        <td>
        	<input name="sire" type="text" value="<?php echo $sire ; ?>" size="50" />
        </td>
    	<td>&nbsp;
        
    	</td>
    </tr>
    <tr class="listing">
    	<td>&nbsp;
        
    	</td>
        <td>
        	<input name="mofs" type="text" value="<?php echo $mofs ; ?>" size="50" />
        </td>
    </tr>
    <tr class="listing">
    	<td>&nbsp;
        
    	</td>
        <td>
        	<input name="fofd" type="text" value="<?php echo $fofd ; ?>" size="50" />
        </td>
    </tr>
    <tr class="listing">
        <td>
        	<input name="dam" type="text" value="<?php echo $dam ; ?>" size="50" />
        </td>
    	<td>&nbsp;
        
    	</td>
    </tr>
    <tr class="listing">
    	<td>&nbsp;
        
    	</td>
        <td>
        	<input name="mofd" type="text" value="<?php echo $mofd ; ?>" size="50" />
        </td>
    </tr>
</table>

</div>


<div class="halve">
<table>
	<tr>
    	<td>
			<input name="stamp" type="hidden" value="<?php echo $stamp ;?>" />
    		<input name="submit" type="image" value="submit" src="images/save.gif" alt="submit" />
       	</td>
    </tr>
</table>
</div>
</form>
</div>

<div class="section">
<div class="full">
<form name="updatereg" enctype="multipart/form-data" action="?action=member&amp;process=updatereg" method="post">
<table>
    <tr>
        	<th colspan="2">
            	<b>
            		Registrations
                </b>
            </th>
        </tr>
        <tr>
        	<td>
            	Organisation &nbsp;
        	</td>
            <td>
            	Registration number
            </td>
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
							$regid				=	$info['id'];
							$organisation 		= 	$info['organisation'];
							$registration 		= $info['registration'];
							
					if ($registrationid !== $regid)
						{
?>
		<tr>
        	<td>
            	<?php echo $organisation ; ?>
            </td>
            <td>
            	<?php echo $registration ; ?>
            </td>
        	<td >
            &nbsp;
      	<a href="?action=member&amp;process=changereg&amp;stamp=<?php echo $stamp  ?>&amp;regid=<?php echo $regid  ?>">
      			<img src="images/edit.gif" alt="<?php echo $ADM['changeinfo']; ?>" title="<?php echo $ADM['changeinfo']; ?>" />
      	</a>
      		</td>
    		<td >
            &nbsp;
      	<a href="?action=member&amp;process=deletereg&amp;stamp=<?php echo $stamp  ?>&amp;regid=<?php echo $regid  ?>">
      			<img src="images/delete.gif" alt="<?php echo $ADM['deleteinfo']; ?>" title="<?php echo $ADM['deleteinfo']; ?>" />
      	</a>
      </td>
        </tr>
        <?php
						}
					else
						{
		?>				<tr>
        					<td>
                            	<input name='organisation' type='text' size='20' value="<?php echo $organisation ; ?>" />
            				</td>
            				<td>
                            	<input name='registration' type='text' size='42' value="<?php echo $registration ; ?>"/>
           					</td>
                            <td>
        						<input name="stamp" type="hidden" value="<?php echo $stamp ; ?>" />
                                <input name="regid" type="hidden" value="<?php echo $regid; ?>" />
    							<input name="submit" type="image" value="submit" src="images/save.gif" alt="submit" />
        					</td>
        				</tr>
		<?php				
						}
						
						
						}
					}
	?>
</table>
</form>

<form name="newreg" enctype="multipart/form-data" action="?action=member&amp;process=addextrareg" method="post">
<table>
	<tr>
    	<th colspan="2">
        	<b>
        		Add new registration
            </b>
        </th>
    </tr>
	<tr>
    	<td>
        	Organisation
        </td>
        <td>
        	Registration number
        </td>
	</tr>
    <tr>
		<td>
        	<input name='organisation' type='text' size='20' />
    	</td>
        <td>
        	<input name='registration' type='text' size='42' />
        </td>
        <td>
        	<input name="stamp" type="hidden" value="<?php echo $stamp ; ?>" />
        	<input name="submit" type="submit" value="Add" />
        </td>
    </tr>
</table>
</form>
</div>
</div>

<div class="section">
<div class="horseimagechange">
	<table>
    	<tr>
        	<td>
            	<b>
            		Delete images or change main image.
                </b>
            </td>
        </tr>
    </table>
	
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
							$image_id			=	$info['id'];
							$image_name 		= 	$info['image'];
							$main_image			=	$info['main_image'];
							
							
								$thumb_path		=	"../album/thumbs/thumb_";
								$full_path		=	"../album/";

								$thumb_image	=	"".$thumb_path."".$image_name."";
								$full_image		=	"".$full_path."".$image_name."";
								
								$image_value	=	"1";
?>
	<div class="horseimage">
            	<img src="<?php echo $thumb_image ; ?>" alt="Images"/>
		<div class="small">
		<a href="?action=member&amp;process=deletereg&amp;stamp=<?php echo $stamp  ?>&amp;regid=<?php echo $regid  ?>">
			<img src="images/delete.gif" alt="<?php echo $ADM['deleteinfo']; ?>" title="<?php echo $ADM['deleteinfo']; ?>" />
		</a>
        Delete
		</div>
        <div class="small">
        	<input name="main_image" type="radio" <?php if ($main_image == 1)echo "checked='checked'"; ?> value="<?php echo $image_id ; ?>" /> 
        	Main image
        </div>
	</div>
        <?php
		
						}
					}
	?>
</div>
<div class="full">
<table>
	<tr>
    	<td>
			<input type="hidden" value="<?php echo $stamp ;?>" />
    		<input name="submit" type="image" value="submit" src="images/save.gif" alt="save" />
       	</td>
    </tr>
</table>
</div>
</div>

<div class="section">  
<div class="full">
	<table>
    	<tr>
        	<td>
            	<b>
            		Add image.
                </b>
            </td>
        </tr>
    </table>
<form name="newimage" enctype="multipart/form-data" action="?action=member&amp;process=horseimageadd" method="post"> 
<table>
	<tr>
    	<td>
        	Add new image for this horse :  
        </td>
    	<td>
        	<input name="image" type="file" size="28" />
        </td>
     </tr>
     <tr>  
    	<td>
        	&nbsp;	
			<input type="hidden" value="<?php echo $stamp ;?>" />
    		<input name="submit" type="image" value="submit" src="images/save.gif" alt="save" />
       	</td>
    </tr>
</table> 

</form> 
</div>
</div>


<div class="section">
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
</div>
