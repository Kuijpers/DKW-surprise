<?php

								if (!empty($_POST['stamp']))
									{
										$stamp			=	$_POST['stamp'];
									}
								if (!empty($_GET['stamp']))
									{
										$stamp			=	$_GET['stamp'];
									}
								
								//echo $stamp;
				
				//echo $stamp;

	$sql ="SELECT * FROM results WHERE stamp= ".$stamp." ORDER BY resyear DESC, resmonth DESC, resday DESC, organisation DESC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)!==0)
					{
					?>
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
    <td>
    
            &nbsp;
<a href="?action=member&amp;process=changeresult&amp;stamp=<?php echo $stamp  ?>&amp;regid=<?php echo $resid  ?>">
      			<img src="images/edit.gif" alt="<?php echo $ADM['changeinfo']; ?>" title="<?php echo $ADM['changeinfo']; ?>" />
      	</a>
    </td>
    <td>
<a href="?action=member&amp;process=deleteresult&amp;stamp=<?php echo $stamp  ?>&amp;regid=<?php echo $resid  ?>">
      			<img src="images/delete.gif" alt="<?php echo $ADM['deleteinfo']; ?>" title="<?php echo $ADM['deleteinfo']; ?>" />
      	</a>
    </td>
</tr>

<?php

						}
					}

?>
</table>

<form name="addresult" enctype="multipart/form-data" action="?action=member&amp;process=addresult" method="post">
<table>
	<tr>
    	<th colspan="3">
        	<h3>
        		Add result
            </h3>
        </th>
    </tr>
	<tr>
    	<td>
        	<b>
            	Date
            </b>
        </td>
        <td>
        	<select name="resday">
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
                <select name="resmonth">
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
                <select name="resyear">
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
        		Organisation
            </b>
        </td>
        <td>
        	<input name="organisation" type="text" size="32" />
        </td>
   </tr>
   <tr>
        <td>
        	<b>
            	Showname
            </b>
        </td>
        <td>
        	<input name="showname" type="text" size="32" />
        </td>
   </tr>
   <tr>
        <td>
        	<b>
            	Class
            </b>
        </td>
        <td>
        	<input name="showclass" type="text" size="32" />
        </td>
   </tr>
   <tr>        
        <td>
        	<b>
            	Result
            </b>
        </td>
        <td>
        	<input name="result" type="text" size="32" />
        </td>
    </tr>
    <tr>
    	<td>
        	<input type="hidden" name="stamp" value="<?php echo $stamp ; ?>"/>
            <input name="submit" type="submit" value="Add result" />
        </td>
    </tr>
</table>
</form>