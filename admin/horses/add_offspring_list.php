
<?php
						
									$stamp	=	$_GET['s'];
								
?>							

<?php


						$tablename	=	"horses";


			$sql ="SELECT * FROM ".$tablename." ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					{
						
					}
					else
					{
?>
<div class="full">
<form name="selectoffspring" enctype="multipart/form-data" action="?action=member&amp;process=offspring" method="post"> 
<table>
	<tr>
    	<td>
        	<input name="offspring" type="radio" value="" checked="checked"/>
        </td>
        <td>
        	No horse
        </td>
    </tr>
<?php
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
					
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
									$horsestamp	=	$info['stamp'];

if ($stamp !== $horsestamp)
						{
?>

	<tr>
    	<td>
			<input name="offspring" type="radio" value="<?php echo $id ?>" />
        </td>
    	<td>
			<?php echo $fullname ; ?>
        </td>
    </tr>


<?php
						}	
						}
?>
	<tr>
    	<td>
        	<input name="stamp" type="hidden" value="<?php echo $stamp ; ?>" />
        	<input name="submit" type="submit" value="Add" />
        </td>
    </tr>
</table>
</form>
</div>
<?php				
					}


?>