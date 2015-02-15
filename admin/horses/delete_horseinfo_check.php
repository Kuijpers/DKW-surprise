	
<?php
									$stamp		=	$_GET['stamp'];
									$id			=	$_GET['id'];
									$file		=	$_GET['type'];

				$tablename	=	"".$file."_".$data_id."";


			$sql ="SELECT * FROM ".$tablename." WHERE id= ".$id." ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					echo "No records available";
					else
					{
					//here is the loop using the statement above
					$info = mysql_fetch_array( $data );
						
							$id		=	$info['id'];
							$title 	= 	$info['title'];
    						$tekst 	= 	$info['text'];
							$tekst 	= 	nl2br ($tekst);

			
?>
<form name="horseinfodelete" enctype="multipart/form-data" action="?action=member&amp;process=horseinfodelete" method="post">
<table>
	<tr>
    	<td>
			<h4>
				<?php echo $title ; ?>
			</h4>
        </td>
    </tr>
    <tr>
    	<td>
			<?php echo $tekst ; ?>
        </td>
    </tr>
    <tr>
    	<td>
        	<b>
        		Are you sure you want to delete this information ?
            </b>
        </td>
    </tr>
    <tr>
    	<td>
        	<input name="surecheck" type="radio" value="1" /> Yes &nbsp;<input name="surecheck" type="radio" value="0" checked="checked" /> No
        </td>
    </tr>
    <tr>
    	<td>
        <input name="id" type="hidden" value="<?php echo $id ; ?>" />
        <input name="stamp" type="hidden" value="<?php echo $stamp ; ?>" />
        <input name="tablename" type="hidden" value="<?php echo $tablename ; ?>" />
        <input name="submit" type="image" value="submit" src="images/save.gif" />
        </td>
    </tr>
</table>
</form>

<?php

					}

?>