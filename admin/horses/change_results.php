<?php

							$stamp	=	$_GET['stamp'];
							$id		=	$_GET['regid'];
							
							//echo $stamp;
							//echo "<br />";
							//echo $id;

?>
<?php

	$sql ="SELECT * FROM results WHERE stamp= ".$stamp." ORDER BY resyear DESC, resmonth DESC, resday DESC, organisation DESC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)!==0)
					{

?>
<form name="updateresult" enctype="multipart/form-data" action="?action=member&amp;process=updateresult" method="post">
<table>
	<tr>
    	<th colspan="4">
        	<h3>
            	Results
            </h3>
        </th>
    </tr>
	<tr>
		<th colspan="3">
        	<b>
         		Date
            </b>
    	</th>
		<td>
        	<b>
    			Organisation
            </b>
    	</td>
		<td>
        	<b>
    			Showname
            </b>
    	</td>
		<td>
        	<b>
    			Class
            </b>
    	</td>
		<td>
        	<b>
    			Result
            </b>
    	</td>
	</tr>                   
                    <?php
						//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$resid			=	$info['id'];
							$resday			=	$info['resday'];
							$resmonth		= 	$info['resmonth'];
    						$resyear		= 	$info['resyear'];
							$organisation	=	$info['organisation'];
							$showname		=	$info['showname'];
							$showclass		=	$info['showclass'];
							$result			=	$info['result'];


	if ($resid !== $id)
		{
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
	else
		{
?>	
	<tr>
    	<th colspan="2">
        	<b>
            	Date
            </b>
        </th>
        <th colspan="2">
        	<select name="resday">
                    	<option value="01" <?php if ($resday == '01')echo "selected='selected'";?>>01</option>
            			<option value="02" <?php if ($resday == '02')echo "selected='selected'";?>>02</option>
            			<option value="03" <?php if ($resday == '03')echo "selected='selected'";?>>03</option>
            			<option value="04" <?php if ($resday == '04')echo "selected='selected'";?>>04</option>
            			<option value="05" <?php if ($resday == '05')echo "selected='selected'";?>>05</option>
            			<option value="06" <?php if ($resday == '06')echo "selected='selected'";?>>06</option>
            			<option value="07" <?php if ($resday == '07')echo "selected='selected'";?>>07</option>
            			<option value="08" <?php if ($resday == '08')echo "selected='selected'";?>>08</option>
            			<option value="09" <?php if ($resday == '09')echo "selected='selected'";?>>09</option>
            			<option value="10" <?php if ($resday == '10')echo "selected='selected'";?>>10</option>
            			<option value="11" <?php if ($resday == '11')echo "selected='selected'";?>>11</option>
            			<option value="12" <?php if ($resday == '12')echo "selected='selected'";?>>12</option>
            			<option value="13" <?php if ($resday == '13')echo "selected='selected'";?>>13</option>
            			<option value="14" <?php if ($resday == '14')echo "selected='selected'";?>>14</option>
            			<option value="15" <?php if ($resday == '15')echo "selected='selected'";?>>15</option>
            			<option value="16" <?php if ($resday == '16')echo "selected='selected'";?>>16</option>
            			<option value="17" <?php if ($resday == '17')echo "selected='selected'";?>>17</option>
            			<option value="18" <?php if ($resday == '18')echo "selected='selected'";?>>18</option>
            			<option value="19" <?php if ($resday == '19')echo "selected='selected'";?>>19</option>
            			<option value="20" <?php if ($resday == '20')echo "selected='selected'";?>>20</option>
            			<option value="21" <?php if ($resday == '21')echo "selected='selected'";?>>21</option>
            			<option value="22" <?php if ($resday == '22')echo "selected='selected'";?>>22</option>
            			<option value="23" <?php if ($resday == '23')echo "selected='selected'";?>>23</option>
            			<option value="24" <?php if ($resday == '24')echo "selected='selected'";?>>24</option>
            			<option value="25" <?php if ($resday == '25')echo "selected='selected'";?>>25</option>
            			<option value="26" <?php if ($resday == '26')echo "selected='selected'";?>>26</option>
            			<option value="27" <?php if ($resday == '27')echo "selected='selected'";?>>27</option>
            			<option value="28" <?php if ($resday == '28')echo "selected='selected'";?>>28</option>
            			<option value="29" <?php if ($resday == '29')echo "selected='selected'";?>>29</option>
            			<option value="30" <?php if ($resday == '30')echo "selected='selected'";?>>30</option>
            			<option value="31" <?php if ($resday == '31')echo "selected='selected'";?>>31</option>
                </select>
                -
                <select name="resmonth">
            			<option value="01" <?php if ($resmonth == '01')echo "selected='selected'";?>><?php echo $DATE['1']; ?></option>
            			<option value="02" <?php if ($resmonth == '02')echo "selected='selected'";?>><?php echo $DATE['2']; ?></option>
            			<option value="03" <?php if ($resmonth == '03')echo "selected='selected'";?>><?php echo $DATE['3']; ?></option>
            			<option value="04" <?php if ($resmonth == '04')echo "selected='selected'";?>><?php echo $DATE['4']; ?></option>
            			<option value="05" <?php if ($resmonth == '05')echo "selected='selected'";?>><?php echo $DATE['5']; ?></option>
            			<option value="06" <?php if ($resmonth == '06')echo "selected='selected'";?>><?php echo $DATE['6']; ?></option>
            			<option value="07" <?php if ($resmonth == '07')echo "selected='selected'";?>><?php echo $DATE['7']; ?></option>
            			<option value="08" <?php if ($resmonth == '08')echo "selected='selected'";?>><?php echo $DATE['8']; ?></option>
            			<option value="09" <?php if ($resmonth == '09')echo "selected='selected'";?>><?php echo $DATE['9']; ?></option>
            			<option value="10" <?php if ($resmonth == '10')echo "selected='selected'";?>><?php echo $DATE['10']; ?></option>
            			<option value="11" <?php if ($resmonth == '11')echo "selected='selected'";?>><?php echo $DATE['11']; ?></option>
            			<option value="12" <?php if ($resmonth == '12')echo "selected='selected'";?>><?php echo $DATE['12']; ?></option> 
                </select>
                -
                <select name="resyear">
             	<?php
        			$current_year = date(Y);
					$end_year = $current_year-=35; // for a different selection of years in the past adjust the five in the amount of years as desired.
	
					for ($year= date(Y);$year>=$end_year;$year--)
						{
				?>
						<option value="<?php echo $year; ?>"<?php if ($resyear == $year)echo "selected='selected'";?>><?php echo $year ; ?></option>	
				<?php
            			}
				?>
            	</select>
        </th>
   </tr>
   <tr>
        <th colspan="2">
        	<b>
        		Organisation
            </b>
        </th>
        <th colspan="2">
        	<input name="organisation" type="text" size="32" value="<?php echo $organisation ; ?>"/>
        </th>
   </tr>
   <tr>
        <th colspan="2">
        	<b>
            	Showname
            </b>
        </th>
        <th colspan="2">
        	<input name="showname" type="text" size="32" value="<?php echo $showname ; ?>" />
        </th>
   </tr>
   <tr>
        <th colspan="2">
        	<b>
            	Class
            </b>
        </th>
        <th colspan="2">
        	<input name="showclass" type="text" size="32" value="<?php echo $showclass ; ?>" />
        </th>
   </tr>
   <tr>        
        <th colspan="2">
        	<b>
            	Result
            </b>
        </th>
        <th colspan="2">
        	<input name="result" type="text" size="32" value="<?php echo $result ; ?>" />
        </th>
    </tr>
    <tr>
    	<th colspan="2">
        	<input type="hidden" name="resid" value="<?php echo $id ; ?>"/>
        	<input type="hidden" name="stamp" value="<?php echo $stamp ; ?>"/>
            <input name="submit" type="submit" value="Update result" />
        </th>
    </tr>		
			
<?php		
		}

						}
					}

?>
</table>
</form>