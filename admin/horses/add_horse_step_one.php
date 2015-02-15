<?php
		$stamp	=	time();
?>

    <fieldset>
    	<legend>
        	<b>
            	Add a horse
            </b>
        </legend>
        <h3>
        	Step 1 of 4
        </h3>
<form name="newad" enctype="multipart/form-data" action="?action=member&amp;process=addhorse" method="post">
        <table>
        	<tr>
            	<th colspan="2">
                	<h4>
                		Horse information:
                    </h4>
                </th>
            </tr>
            <tr>
            	<th colspan="2">
                	Fields with * are required to fill in.
                </th>
            </tr>
        	<tr>
            	<td>
                	<?php echo $HORSE['call']; ?> :
                </td>
                <td>
                	<input name="callname" type="text" size="50" />
                </td>
                <td>
                	*
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo $HORSE['full']; ?> :
                </td>
                <td>
                	<input name="fullname" type="text" size="50" />
                </td>
                <td>
                	*
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo $HORSE['gender']; ?> :
                </td>
                <td>
                	<select name="gender">
                    	<option selected="selected" value="0">&nbsp;</option>
                    	<option value="1"><?php echo $HORSE['stallion']; ?></option>
                        <option value="2"><?php echo $HORSE['mare']; ?></option>
                        <option value="3"><?php echo $HORSE['gelding']; ?></option>
                    </select>
                </td>
                <td>
                	*
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo $HORSE['dob']; ?> :
                </td>
                <td>
                <?php echo $ADM['day']; ?>: 
                	<select name="DOB_day">
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
                <?php echo $ADM['month']; ?>:
                	<select name="DOB_month">
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
                <?php echo $ADM['year']; ?>: 
                	<select name="DOB_year">
                   		<option selected="selected" value="0">&nbsp;</option>
                    	<?php
							yearselect_dob();
						?>
                    </select>
                </td>
                <td>
                	*
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo $HORSE['color']; ?>:
                </td>
                <td>
                	<input name="color" type="text" size="50" />
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo $HORSE['measuring']; ?>:
                </td>
                <td>
                	<input name="height" type="text" size="4" />
                    <select name="unit">
                    	<option value="">&nbsp;</option>
                        <option value="1"><?php echo $HORSE['measureunit1']; ?></option>
                        <option value="2"><?php echo $HORSE['measureunit2']; ?></option>
                        <option value="3"><?php echo $HORSE['measureunit3']; ?></option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo $HORSE['measurespot']; ?>:
                </td>
                <td>
                	<select name="spot">
                    	<option value="">&nbsp;</option>
                    	<option value="1"><?php echo $HORSE['measurespot1']; ?></option>
                        <option value="2"><?php echo $HORSE['measurespot2']; ?></option>
                    </select>
                </td>
            </tr>
            <tr>
            	<th colspan="2">
                	<h4>
                    	Bloodline:
                    </h4>
                </th>
            </tr>
            <tr>
            	<td>
                	<?php echo $HORSE['sire']; ?>:
                </td>
                <td>
                	<input name="sire" type="text" size="50" />
                </td>
                <td>
                	*
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo $HORSE['dam']; ?>: 
                </td>
                <td>
                	<input name="dam" type="text" size="50" />
                </td>
                <td>
                	*
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo $HORSE['fos']; ?>: 
                </td>
                <td>
                	<input name="fos" type="text" size="50" />
                </td>
                <td>
                	*
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo $HORSE['mos']; ?>:
                </td>
                <td>
                	<input name="mos" type="text" size="50" />
                </td>
                <td>
                	*
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo $HORSE['fod']; ?>: 
                </td>
                <td>
                	<input name="fod" type="text" size="50" />
                </td>
                <td>
                	*
                </td>
            </tr>
            <tr>
            	<td>
                	<?php echo $HORSE['mod']; ?>:
                </td>
                <td>
                	<input name="mod" type="text" size="50" />
                </td>
                <td>
                	*
                </td>
            </tr>
        	<tr>
            	<th colspan="2">
                	<input name="submit" type="submit" value="Next step" />
                </th>
            </tr>
    	</table>
        <input name="stamp" type="hidden" value="<?php echo $stamp; ?>" />
</form>
    </fieldset>
    
    
