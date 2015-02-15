
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

?>
<form name="newad" enctype="multipart/form-data" action="?action=member&amp;process=delete" method="post">
<table>
	<tr>
    	<th colspan="2">
        	<b>
        		<?php echo $fullname ; ?>
            </b>
        </th>
    </tr>
    <tr>
    	<th colspan="2">
        	<?php echo $callname ; ?>
        </th>
    </tr>
    <tr>
    	<th colspan="2">
        	<i>
        		Are you sure you want to delete this horse ?
            </i>
        </th>
    </tr>
    <tr>
    	<td>
        	<input name="surecheck" type="radio" value="1" /> Yes
        </td>
        <td>
        	<input name="surecheck" type="radio" value="0" checked="checked" />No
        </td>
    </tr>
    <tr>
    	<th colspan="2">
        	<i>
        		Do you want to keep the images for your gallery ?
            </i>
        </th>
    </tr>
    <tr>
    	<td>
        	<input name="gallery" type="radio" value="1" checked="checked" /> Yes
        </td>
        <td>
        	<input name="gallery" type="radio" value="0" />No
        </td>
    </tr>
    <tr>
    	<td>
        <input name="horse_id" type="hidden" value="<?php echo $id ; ?>" />
        <input name="stamp" type="hidden" value="<?php echo $stamp ; ?>" />
        <input name="submit" type="submit" value="Continue" />
        </td>
    </tr>
</table>
</form>
<?php
								}
?>