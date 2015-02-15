<?php
$horse			=	array(
				
	// form information
	
	
	"1"			=>	"Stallion",
	
	"2"			=>	"Mare",
	
	"3"			=>	"Gelding",
	
	);
						if (!empty($_POST['stamp']))	
							{
								$stamp	=	$_POST['stamp'];
							}
						if (empty($_POST['stamp']))	
							{
								$stamp	=	$_GET['stamp'];
							}
							
							$regid		=	$_GET['regid'];
							
					$sql1 ="SELECT * FROM offspring WHERE stamp= ".$stamp." ORDER BY dobyear DESC";
    				$data = mysql_query($sql1);
					if (mysql_num_rows($data)==0)
					{
						echo "No data available";
					}
					else
					{
?>
<div class="full">
<form name="offspringupdate" enctype="multipart/form-data" action="?action=member&amp;process=updateoffspring" method="post">
<table>
	<tr>
    	<th colspan="5">
        	<h4>
        		Change current offspring
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
							$resultschange	=	$results;
							$results		=	nl2br($results);
							$stamp 			= 	$info['stamp'];

	if ($regid !== $offspringid)
		{
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
	else
			{
				?>
				
			
    	<td valign="top">
			<input name="name" type="text" value="<?php echo $name ; ?>" size="15" />
        </td>
    	<td valign="top">
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
            	<option value="01" <?php if ($dobmonth == '01')echo "selected='selected'";?>><?php echo $DATE['1']; ?></option>
            	<option value="02" <?php if ($dobmonth == '02')echo "selected='selected'";?>><?php echo $DATE['2']; ?></option>
            	<option value="03" <?php if ($dobmonth == '03')echo "selected='selected'";?>><?php echo $DATE['3']; ?></option>
            	<option value="04" <?php if ($dobmonth == '04')echo "selected='selected'";?>><?php echo $DATE['4']; ?></option>
            	<option value="05" <?php if ($dobmonth == '05')echo "selected='selected'";?>><?php echo $DATE['5']; ?></option>
            	<option value="06" <?php if ($dobmonth == '06')echo "selected='selected'";?>><?php echo $DATE['6']; ?></option>
            	<option value="07" <?php if ($dobmonth == '07')echo "selected='selected'";?>><?php echo $DATE['7']; ?></option>
            	<option value="08" <?php if ($dobmonth == '08')echo "selected='selected'";?>><?php echo $DATE['8']; ?></option>
            	<option value="09" <?php if ($dobmonth == '09')echo "selected='selected'";?>><?php echo $DATE['9']; ?></option>
            	<option value="10" <?php if ($dobmonth == '10')echo "selected='selected'";?>><?php echo $DATE['10']; ?></option>
            	<option value="11" <?php if ($dobmonth == '11')echo "selected='selected'";?>><?php echo $DATE['11']; ?></option>
            	<option value="12" <?php if ($dobmonth == '12')echo "selected='selected'";?>><?php echo $DATE['12']; ?></option>            
            </select>
             - 
             <select name="dobyear">
             <?php
        	$current_year = date(Y);
			$end_year = $current_year-=35; // for a different selection of years in the past adjust the five in the amount of years as desired.
	
			for ($year= date(Y);$year>=$end_year;$year--)
					{
			?>
						<option value="<?php echo $year; ?>"<?php if ($dobyear == $year)echo "selected='selected'";?>><?php echo $year ; ?></option>	
			<?php
            		}
			?>
            </select>
        </td>
        <td valign="top">
       				<select name="gender">
                    	<option value="1" <?php if ($gender == '1') echo "selected='selected'" ;?>><?php echo $HORSE['stallion']; ?></option>
                        <option value="2" <?php if ($gender == '2') echo "selected='selected'" ;?>><?php echo $HORSE['mare']; ?></option>
                        <option value="3" <?php if ($gender == '3') echo "selected='selected'" ;?>><?php echo $HORSE['gelding']; ?></option>
                    </select>
        </td>
        <td valign="top">
        	<input name="parent" type="text" value="<?php echo $parent ; ?>" size="15" />
        </td>
        <td>
        	<textarea name="results" cols="18" rows="5"><?php echo $resultschange ; ?></textarea>
        </td>
        <td>
        	<input name="regid" type="hidden" value="<?php echo $offspringid ; ?>" />
			<input name="stamp" type="hidden" value="<?php echo $stamp ;?>" />
    		<input name="submit" type="image" value="submit" src="images/save.gif" alt="submit" />
        </td>
				
<?php				
			}
						
						
						
						}
?>	
</table>
</form>
<hr />

</div>
<?php				
					}



							
							if (!empty($_POST['offspring']))
								{
									$offspring	=	$_POST['offspring'];
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
					
									$regid			=	$info['id'];
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
            	<input name="horsename" type="text" size="30"  value="<?php echo $offspringname ; ?>"/>
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
        		<input name="dobday" type="text" size="1" value="<?php echo $dobday ; ?>"/>
                -
                <input name="dobmonth" type="text" size="1" value="<?php echo $dobmonth ; ?>"/>
                -
                <input name="dobyear" type="text" size="1" value="<?php echo $dobyear ; ?>"/>
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
                    	<option value="1" <?php if ($gender == '1') echo "selected='selected'"?>><?php echo $HORSE['stallion']; ?></option>
                        <option value="2" <?php if ($gender == '2') echo "selected='selected'"?>><?php echo $HORSE['mare']; ?></option>
                        <option value="3" <?php if ($gender == '3') echo "selected='selected'"?>><?php echo $HORSE['gelding']; ?></option>
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
		<?php
				
				if ($geslacht !== '2')
				{
					?>
                <input name="parent" type="text" size="27" value="<?php echo $dam ; ?>"/>
        <?php
				}
				else
				{
					?>
            	<input name="parent" type="text" size="27" value="<?php echo $sire ; ?>"/>
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
        	<input name="regid" type="hidden" value="<?php echo $offspringid ; ?>"  />
        	<input name="stamp" type="hidden" value="<?php echo $stamp ; ?>"  />
    		<input name="submit" type="submit" value="Add to database" />
        </th>
    </tr>
</table>
</div>
</form>