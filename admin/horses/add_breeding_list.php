	
<?php
						
									$stamp	=	$_GET['s'];
								
?>							

<?php


						$tablename	=	"horses";
						
						$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp."";
    						$data = mysql_query($sql);
							if (mysql_num_rows($data)!==0)
								{
									$info = mysql_fetch_array( $data );
					
									$name			=	$info['fullname'];
									$gender			=	$info['gender'];
								}
								
								if ($gender == "1")
									{
										$selectgender	=	"2" ;
									}
								else
									{
										$selectgender	=	"1" ;
									}

						
			$sql ="SELECT * FROM ".$tablename." WHERE gender=".$selectgender." ORDER BY id ASC";
			
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					{
						
					}
					else
					{
?>
<div class="full">
<form name="selectoffspring" enctype="multipart/form-data" action="?action=member&amp;process=currentbreeding" method="post"> 
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
									$fullname	=	$info['fullname'];
									$horsestamp	=	$info['stamp'];

if ($stamp !== $horsestamp)
						{
?>

	<tr>
    	<td>
			<input name="breeding" type="radio" value="<?php echo $id ?>" />
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