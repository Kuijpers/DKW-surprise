
<?php

					$stamp		=	$_GET['stamp'];
					$imageid	=	$_GET['imageid'];

			
					$tablename	=	"picture";
			
			$sql ="SELECT * FROM ".$tablename." WHERE id= ".$imageid." ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
						{
							echo	"<div class='image'>";
							echo 	"<img src='images/no_image.png' alt='No image availlable'/>";
							echo	"</div>";
						}
					else
					{
						$info = mysql_fetch_array( $data );
						
						
							$image_name 		= 	$info['image'];
							$main_image			=	$info['main_image'];
							
							
								$thumb_path		=	"../album/thumbs/thumb_";
								$full_path		=	"../album/";

								$thumb_image	=	"".$thumb_path."".$image_name."";
								$full_image		=	"".$full_path."".$image_name."";
			?>	
<form name="deleteimage" enctype="multipart/form-data" action="?action=member&amp;process=horseimagedelete" method="post">		
            	<table>
                	<tr>
                    	<td>
							<img src="<?php echo $thumb_image ; ?>" alt="Images"/>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Are you sure you want to delete this image ?
                        </td>
                        <td>
                        	<input name="surecheck" type="radio" value="1" /> Yes
                        </td>
                        <td>
                        	<input name="surecheck" type="radio" value="0" checked="checked" /> No
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Do you want to keep the image for your gallery ?
                        </td>
                        <td>
                        	<input name="gallery" type="radio" value="1" /> Yes
                        </td>
                        <td>
                        	<input name="gallery" type="radio" value="0" checked="checked" /> No
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<input name="stamp" type="hidden" value="<?php echo $stamp ; ?>" />
                            <input name="imageid" type="hidden" value="<?php echo $imageid ; ?>" />
                        	<input name="submit" type="submit" value="Next step"/>
                        </td>
                    </tr>
                </table>
</form> 
            <?php
					}

?>
