<table>
	<tr class="listing">
		<th colspan="4">
        	<b>
				<?php echo $HORSE['stallion']; ?>
            </b>
        </th>
	</tr>
    
    	<?php
			
			$tablename	=	"horses";
			
			$sql ="SELECT * FROM ".$tablename." WHERE gender=1 ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					echo "No records available";
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$stamp 		= $info['stamp'];
?>
							
						
                        	<tr class="listing">
                    			<td class="title">
                        			<?php echo $fullname; ?>
                        		</td>
                        		<td class="picks">
                        			<a href="?action=member&amp;process=change&amp;stamp=<?php echo $stamp  ?>">
                        			<img src="images/edit.gif" alt="<?php echo $ADM['changeinfo']; ?>" title="<?php echo $ADM['changeinfo']; ?>" />
                        			</a>
                       		 	</td>
                       		 	<td class="picks">
                        			<a href="?action=member&amp;process=deletefull&amp;stamp=<?php echo $stamp  ?>">
                        			<img src="images/delete.gif" alt="<?php echo $ADM['deleteinfo']; ?>" title="<?php echo $ADM['deleteinfo']; ?>" />
                        			</a>
                        		</td>
                    			<td class="picks">
                        			<a href="?action=member&amp;process=more&amp;stamp=<?php echo $stamp  ?>">
                        			<img src="images/more.gif" alt="<?php echo $ADM['moreinfo']; ?>" title="<?php echo $ADM['moreinfo']; ?>" />
                        			</a>
                       		 	</td>
                   		 </tr>
    
    
    
    
    

<?php
						}
					}
?>
</table>
<table>

	<tr class="listing">
		<th colspan="4">
        	<b>
				<?php echo $HORSE['mare']; ?>
            </b>
        </th>
	</tr>
    
    	<?php
			
			$tablename	=	"horses";
			
			$sql ="SELECT * FROM ".$tablename." WHERE gender=2 ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					echo "No records available";
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$stamp 		= $info['stamp'];
?>
							
						
                        	<tr class="listing">
                    			<td class="title">
                        			<?php echo $fullname; ?>
                        		</td>
                        		<td class="picks">
                        			<a href="?action=member&amp;process=change&amp;stamp=<?php echo $stamp  ?>">
                        			<img src="images/edit.gif" alt="<?php echo $ADM['changeinfo']; ?>" title="<?php echo $ADM['changeinfo']; ?>" />
                        			</a>
                       		 	</td>
                       		 	<td class="picks">
                        			<a href="?action=member&amp;process=deletefull&amp;stamp=<?php echo $stamp  ?>">
                        			<img src="images/delete.gif" alt="<?php echo $ADM['deleteinfo']; ?>" title="<?php echo $ADM['deleteinfo']; ?>" />
                        			</a>
                        		</td>
                    			<td class="picks">
                        			<a href="?action=member&amp;process=more&amp;stamp=<?php echo $stamp  ?>">
                        			<img src="images/more.gif" alt="<?php echo $ADM['moreinfo']; ?>" title="<?php echo $ADM['moreinfo']; ?>" />
                        			</a>
                       		 	</td>
                   		 </tr>
    
    
    
    
    

<?php
						}
					}
?>
</table>
<table>

	<tr class="listing">
		<th colspan="4">
        	<b>
				<?php echo $HORSE['gelding']; ?>
            </b>
        </th>

	</tr>
    
    	<?php
			
			$tablename	=	"horses";
			
			$sql ="SELECT * FROM ".$tablename." WHERE gender=3 ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					
					echo 	"No records available";
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$stamp 		= $info['stamp'];
?>
							
						
                        	<tr class="listing">
                    			<td class="title">
                        			<?php echo $fullname; ?>
                        		</td>
                        		<td class="picks">
                        			<a href="?action=member&amp;process=change&amp;stamp=<?php echo $stamp  ?>">
                        			<img src="images/edit.gif" alt="<?php echo $ADM['changeinfo']; ?>" title="<?php echo $ADM['changeinfo']; ?>" />
                        			</a>
                       		 	</td>
                       		 	<td class="picks">
                        			<a href="?action=member&amp;process=deletefull&amp;stamp=<?php echo $stamp  ?>">
                        			<img src="images/delete.gif" alt="<?php echo $ADM['deleteinfo']; ?>" title="<?php echo $ADM['deleteinfo']; ?>" />
                        			</a>
                        		</td>
                    			<td class="picks">
                        			<a href="?action=member&amp;process=more&amp;stamp=<?php echo $stamp  ?>">
                        			<img src="images/more.gif" alt="<?php echo $ADM['moreinfo']; ?>" title="<?php echo $ADM['moreinfo']; ?>" />
                        			</a>
                       		 	</td>
                   		 </tr>
    
    
    
    
    

<?php
						}
					}
?>
</table>