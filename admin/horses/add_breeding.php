
<table>
    <tr>
    	<td>
        	<b>
        		Stallion
            </b>
        </td>
        <td>&nbsp;
        	
        </td>
        <td>
        	<b>
        		Mare
           	</b>
        </td>
        <th colspan="2">
        	<b>
        		Expected date
            </b>
        </th>
    </tr>
<?php
							if (!empty($_POST['stamp']))
								{
									$stamp	=	$_POST['stamp'];
								}
							else
								{
									$stamp	=	$_GET['stamp'];	
								}
							
							
							
							
							
							
							$tablename	=	"horses";
							
							if (!empty($_POST['breeding']))
								{
									$sql ="SELECT * FROM ".$tablename." WHERE id= ".$_POST['breeding']."";
    								$data = mysql_query($sql);
										if (mysql_num_rows($data)!==0)
											{
												$info = mysql_fetch_array( $data );
					
												$breedname			=	$info['fullname'];
											}
								}
							
							
							
			
						$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp."";
    						$data = mysql_query($sql);
							if (mysql_num_rows($data)!==0)
								{
									$info = mysql_fetch_array( $data );
					
									$name			=	$info['fullname'];
									$gender			=	$info['gender'];
								}
						
$sql1 ="SELECT * FROM breeding WHERE stamp= ".$stamp." ORDER BY breedyear ASC";
    				$data = mysql_query($sql1);
					if (mysql_num_rows($data)!==0)
					{
						//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$breedingid	=	$info['id'];
							$stallion	= 	$info['stallion'];
    						$mare 		= 	$info['mare'];
							$breedmonth	=	$info['breedmonth'];
							$breedyear	=	$info['breedyear'];
						?>
<tr>
	<td>
		<?php echo $stallion ; ?>
	</td>
    <td>
    	&nbsp; X &nbsp;
    </td>
	<td>
		<?php echo $mare ; ?>
	</td>
	<td>
		<?php echo $DATE["$breedmonth"] ; ?>
	</td>
	<td>
	<?php echo $breedyear ; ?>
	</td>
	<td valign="top" >
            &nbsp;
<a href="?action=member&amp;process=changebreeding&amp;stamp=<?php echo $stamp  ?>&amp;regid=<?php echo $breedingid  ?>">
      			<img src="images/edit.gif" alt="<?php echo $ADM['changeinfo']; ?>" title="<?php echo $ADM['changeinfo']; ?>" />
      	</a>
	</td>
	<td valign="top" >
            &nbsp;
<a href="?action=member&amp;process=deletebreeding&amp;stamp=<?php echo $stamp  ?>&amp;regid=<?php echo $breedingid  ?>">
      			<img src="images/delete.gif" alt="<?php echo $ADM['deleteinfo']; ?>" title="<?php echo $ADM['deleteinfo']; ?>" />
      	</a>
	</td>
</tr>	
						
					<?php
						}
					}


if ($gender=="1" || ($gender=="2" && empty($breedingid)))
	{

?>
<form name="breeding" enctype="multipart/form-data" action="?action=member&amp;process=addbreeding" method="post">				
                	<tr>
                    	<?php
							if ($gender == "1")	// when gender of horse is stallion
								{
						?>
                    	<td>
							<input name="stallion" type="text" size="30" readonly="readonly" value="  <?php echo $name; ?> "/>
						</td>
    <td>
    	&nbsp; X &nbsp;
    </td>
                    	<td>
                        	<?php
							
							if (empty($breedname))
							{
                        	?>
								<input name="mare" type="text" size="30" />
                            <?php
							}
							else
							{
							?>
								<input name="mare" readonly="readonly" type="text" size="30" value="<?php echo $breedname ; ?> " />
                            <?php	
							}
							?>
						</td>
                        <?php
								}
							else 	// when gender of horse is mare
								{
						?>
                    	<td>
                        	<?php
							
							if (empty($breedname))
							{
                        	?>
								<input name="stallion" type="text" size="30" />
                            <?php
							}
							else
							{
							?>
								<input name="stallion" readonly="readonly" type="text" size="30" value="<?php echo $breedname ; ?> " />
                            <?php	
							}
							?>
						</td>
    <td>
    	&nbsp; X &nbsp;
    </td>
                    	<td>
							<input name="mare" type="text" size="30" readonly="readonly" value="  <?php echo $name; ?> "/>
						</td>
                        <?php
								}
						?>
                        
                    	<td>
                        	<select name="breedmonth">
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
                        </td>
                        <td>
                        	<?php
								$year1	=	date('Y');
								$year2	=	$year1+1;
								
							?>
                            <select name="breedyear">
                            	<option value="0">&nbsp;</option>
                            	<option value="<?php echo $year1 ; ?>"><?php echo $year1 ; ?></option>
                                <option value="<?php echo $year2 ; ?>"><?php echo $year2 ; ?></option>
                            </select>
                        </td>
                        <td>
                        	<input name="stamp" type="hidden" value="<?php echo $stamp ; ?>" />
                        	<input name="submit" type="image" src="images/save.gif" />
                        </td>
                    </tr>
</form>
                    <tr>
                    	<td>
                        	<a href="?action=member&amp;process=selectlistbreeding&amp;s=<?php echo $stamp ; ?>">Select currently owned horse >></a>
                        </td>
                    </tr>
                    
<?php
			  
	}
?>
                    
                    
				</table>