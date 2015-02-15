
<?php
$horse			=	array(
				
	// form information
	
	
	"1"			=>	"Stallion",
	
	"2"			=>	"Mare",
	
	"3"			=>	"Gelding",
	
	);
							
							
							$stamp	=	$_POST['stamp'];
							
					$sql1 ="SELECT * FROM offspring WHERE stamp= ".$stamp." ORDER BY dobyear DESC";
    				$data = mysql_query($sql1);
					if (mysql_num_rows($data)==0)
					{
?>
						<table>
							<tr>
    							<td>
        							<h4>
        								Current offspring
           							</h4>
        						</td>
    						</tr>
                            <tr>
                            	<td>
                                	No offspring in database
                                </td>
                            </tr>
                       </table>
<?php
					}
					else
					{
?>
<div class="full">
<table>
	<tr>
    	<th colspan="5">
        	<h4>
        		Current offspring
            </h4>
        </th>
    </tr>
    <tr>
    	<td>
        	<b>
				Name
            </b>
        </td>
    	<td>
        	<b>
				Date of birth
            </b>
        </td>
        <td>
        	<b>
        		Gender
            </b>
        </td>
        <td>
        	<b>
        		2nd parent
            </b>
        </td>
        <td>
        	<b>
        		Results
            </b>
        </td>
    </tr>
<?php
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$offspringid	=	$info['id'];
							$name 			= 	$info['name'];
    						$gender 		= 	$info['gender'];
							$dobday			=	$info['dobday'];
							$dobmonth		=	$info['dobmonth'];
							$dobyear		=	$info['dobyear'];
							$parent			=	$info['parent'];
							$results		=	$info['results'];
							$results 		= 	nl2br ($results);
							$stamp 			= 	$info['stamp'];

			
?>
	<tr class="listing">
    	<td valign="top">
			<?php echo $name ; ?>
        </td>
    	<td valign="top">
			<?php echo $dobday ; ?> - <?php echo $DATE["$dobmonth"] ; ?> - <?php echo $dobyear ; ?>
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
        	<td valign="top" >
            &nbsp;
<a href="?action=member&amp;process=changeoffspring&amp;stamp=<?php echo $stamp  ?>&amp;regid=<?php echo $offspringid  ?>">
      			<img src="images/edit.gif" alt="<?php echo $ADM['changeinfo']; ?>" title="<?php echo $ADM['changeinfo']; ?>" />
      	</a>
      		</td>
    		<td valign="top" >
            &nbsp;
<a href="?action=member&amp;process=deleteoffspring&amp;stamp=<?php echo $stamp  ?>&amp;regid=<?php echo $offspringid  ?>">
      			<img src="images/delete.gif" alt="<?php echo $ADM['deleteinfo']; ?>" title="<?php echo $ADM['deleteinfo']; ?>" />
      	</a>
      </td>
    </tr>

<?php

						}
?>	
</table>
<hr />

</div>
<?php				
					}


							if (!empty($_POST['offspring']))
								{
									$offspring	=	$_POST['offspring'];
								}
							else
								{
									$offspring	=	'';
								}
							
							
						$tablename	=	"horses";
			
						$sql2 ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp."";
    						$data = mysql_query($sql2);
							if (mysql_num_rows($data)!==0)
								{
									$info = mysql_fetch_array( $data );
					
									
									$fullname	=	$info['fullname'];
									$geslacht	=	$info['gender'];
								}

?>
<form name="offspring" enctype="multipart/form-data" action="?action=member&amp;process=addoffspring" method="post">
<div class="full">
<table>
    <?php
	if (empty($offspring))
		{
    ?>
	<tr>
    	<th colspan="3">
        	<h4>
        		<?php echo $fullname ; ?>
            </h4>
        </th>
	</tr>
    <tr>
		<td>
        	<b>
            	Horsename 
            </b>
        </td>
        <td>
        	:
        </td>
		<td>
            	<input name="name" type="text" size="30" />
        </td>
    </tr>
    <tr>
        <td>
        	<b>
        		Date of birth 
           	</b>
        </td>
        <td>
        	:
        </td>
        <td>
        		<select name="dobday">
                    	<option selected="selected" value="0">&nbsp;</option>
                    	<option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <?php
							dayselect();
						?>
                </select>
                -
                <select name="dobmonth">
                    	<option selected="selected" value="0">&nbsp;</option>
                    	<option value="01"><?php echo $DATE['1']; ?></option>
                        <option value="02"><?php echo $DATE['2']; ?></option>
                        <option value="03"><?php echo $DATE['3']; ?></option>
                        <option value="04"><?php echo $DATE['4']; ?></option>
                        <option value="05"><?php echo $DATE['5']; ?></option>
                        <option value="06"><?php echo $DATE['6']; ?></option>
                        <option value="07"><?php echo $DATE['7']; ?></option>
                        <option value="08"><?php echo $DATE['8']; ?></option>
                        <option value="09"><?php echo $DATE['9']; ?></option>
                        <option value="10"><?php echo $DATE['10']; ?></option>
                        <option value="11"><?php echo $DATE['11']; ?></option>
                    	<option value="12"><?php echo $DATE['12']; ?></option>
                </select>
                -
                <select name="dobyear">
                   		<option selected="selected" value="0">&nbsp;</option>
                    	<?php
							yearselect_dob();
						?>
                    </select>
        </td>
    </tr>
    <tr>
        <td>
        	<b>
        		Gender 
           	</b>
        </td>
        <td>
        	:
        </td>
        <td>
            	<select name="gender">
                    	<option selected="selected" value="0">&nbsp;</option>
                    	<option value="1"><?php echo $HORSE['stallion']; ?></option>
                        <option value="2"><?php echo $HORSE['mare']; ?></option>
                        <option value="3"><?php echo $HORSE['gelding']; ?></option>
                    </select>
        </td>
    </tr>
    <tr>
        <td>
            	<b>
            	<?php
					if ($geslacht == '1' || $geslacht == '3')
						echo "Dam ";
					if ($geslacht == '2')
						echo "Sire ";
				?>
                </b>
        </td>
        <td>
        	:
        </td>
        <td>
            	<input name="parent" type="text" size="30" />
        </td>
    </tr>
    <tr>
        <td>
        	<b>
        		Result 
            </b>
        </td>
        <td>
        	:
        </td>
        <td>
            	<textarea name="results" cols="25" rows="5" ></textarea>
        </td>
    </tr>
    <?php
		}
	else
		{
						$tablename	=	"horses";
			
						$sql ="SELECT * FROM ".$tablename." WHERE id= ".$offspring."";
    						$data = mysql_query($sql);
							if (mysql_num_rows($data)!==0)
								{
									$info = mysql_fetch_array( $data );
					
									$offspringname	=	$info['fullname'];
									$gender			=	$info['gender'];
									$dobday			=	$info['dobday'];
									$dobmonth		=	$info['dobmonth'];
									$dobyear		=	$info['dobyear'];
									$sire			=	$info['sire'];
									$dam			=	$info['dam'];
								}
	
	
							

	
	?>
    
    <tr>
    	<th colspan="3">
        	<h4>
            	<?php echo $fullname ; ?>
            </h4>
        </th>
	</tr>
    <tr>
		<td>
        	<b>
            	Horsename 
            </b>
        </td>
        <td>
        	:
        </td>
		<td>
           <input name="name" type="text" readonly="readonly" value=" <?php echo $offspringname ; ?>" />
        </td>
    </tr>
    <tr>
        <td>
        	<b>
        		Date of birth 
           	</b>
        </td>
        <td>
        	:
        </td>
        <td>
        		<input name="dobday" type="text" readonly="readonly" size="1" value=" <?php echo $dobday ; ?>" />
                -
                <input name="dobmonth" type="hidden" value=" <?php echo $dobmonth ; ?>" />
                <input type="text" readonly="readonly" size="10" value=" <?php echo $DATE["$dobmonth"] ; ?>" />
                -
              	<input name="dobyear" type="text" readonly="readonly" size="2" value=" <?php echo $dobyear ; ?>" />
        </td>
    </tr>
    <tr>
        <td>
        	<b>
        		Gender 
           	</b>
        </td>
        <td>
        	:
        </td>
        <td>
            	
                    	<input name="gender" type="text" readonly="readonly" value=" <?php echo $horse["$gender"]; ?>" />
                    
        </td>
    </tr>
    <tr>
        <td>
            	<b>
            	<?php
					if ($geslacht == '1' || $geslacht == '3')
						echo "Dam ";
					if ($geslacht == '2')
						echo "Sire ";
				?>
                </b>
        </td>
        <td>
        	:
        </td>
        <td>
		<?php
				
				if ($geslacht !== '2')
				{
					?>
               <input name="parent" type="text" readonly="readonly" value="  <?php echo $dam ; ?>" />
        <?php
				}
				else
				{
					?>
            	<input name="parent" type="text" readonly="readonly" value=" <?php echo $sire ; ?>" />
       	<?php
				}
				?>
        </td>
    </tr>
    <tr>
        <td>
        	<b>
        		Result 
            </b>
        </td>
    </tr>
    <tr>
        <th colspan="3">
            	<textarea name="results" cols="25" rows="5" ></textarea>
        </th>
    </tr>
    <?php
		}
	?>
    <tr>
    	<td>
        
        </td>
    	<th colspan="2">
        	<a href="?action=member&amp;process=selectlistoffspring&amp;s=<?php echo $stamp ; ?>">Select currently owned horse >></a>
        </th>
    </tr>
    <tr>
    	<th colspan="2">
        	<input name="stamp" type="hidden" value="<?php echo $stamp ; ?>"  />
    		<input name="submit" type="submit" value="Add to database" />
        </th>
    </tr>
</table>
</div>
</form>
