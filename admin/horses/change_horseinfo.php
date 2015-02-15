
<div class="section">
<?php
							$stamp				=	$_GET['stamp'];
							$horse_info_id		=	$_GET['id'];
							$horse_info_type	=	$_GET['type'];
		
		$dir = "./lang/";

		$dh = opendir($dir);

		while (($file = readdir($dh)) !== false) 
		{
			// Gets the File Extension
			$extension = substr($file, strrpos($file, '.'));
			
			
			// checks if the extension is .php or the file name is  . or .. if so it will be shown as an exclusion
			if($extension !== ".php" && $file !== "." && $file !== ".." && $file !== "index.html")
			{
			
			
						
			
			
?>
<div class="halve">
<table>
	<tr>
    	<td>
			<h3>
				<?php echo $language[$file] ; ?>
			</h3>
        </td>
    </tr>
</table>
</div>

<?php

						$tablename	=	"".$file."_".$data_id."";


			$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp." ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					echo "No records available";
					else
					{
						?>
				<div class="horseinfochange">	
               <?php
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{	
							$id			=	$info['id'];
							$title 		= 	$info['title'];
    						$tekst 		= 	$info['text'];
							$tekstok 	= 	nl2br ($tekst);
							$stamp 	= $info['stamp'];
						
						
						if ($horse_info_type !== $file ||  $horse_info_id !== $id)
							{
?>
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
											<?php echo $tekstok ; ?>
        								</td>
    								</tr>
								</table>
								<hr />
                             
	
<?php

							}
						else
							{	
								?>
                                
<form name="horseinfoupdate" enctype="multipart/form-data" action="?action=member&amp;process=infoupdate" method="post">                    
                                	<table>
                                    	<tr>
                                        	<td>
                                            	Titel:
                                            </td>
                                        	<td>
                                            	<input name="title" type="text" value="<?php echo $title ; ?>" />
                                            </td>
                                        </tr>
                                    	<tr>
                                        	<th colspan="2">
                                            	<textarea name="tekst" cols="70" rows="10"><?php echo $tekst ; ?></textarea>
                                            </th>
                                        </tr>
                                        <tr>
                                        	<td>
                                            	<input name="stamp" type="hidden" value="<?php echo $stamp ; ?>" />
                                                <input name="tablename" type="hidden" value="<?php echo $tablename ; ?>" />
                                                <input name="id" type="hidden" value="<?php echo $id ; ?>" />
                                                <input name="submit" type="image" src="images/save.gif" />
                                            </td>
                                        </tr>
                                    </table>
</form>
						<?php		
							}
						}
					?>	
					</div>
			<?php
				}
?>




<?php
			}
		}


		closedir($dh);
?>
</div>
