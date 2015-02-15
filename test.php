<?php
								$image_name 	=	"testimage.jpg";
								
								$thumb_path		=	"../album/thumbs/thumb_";
								$full_path		=	"../album/";
								$newname		=	"../album/".$image_name;

								$thumb_image	=	"".$thumb_path."".$image_name."";
								$full_image		=	"".$full_path."".$image_name."";
								
								echo $thumb_image;
								echo "<br />";
								echo $full_image;
								echo "<br />";
								echo $newname;
								
//phpinfo();
?>
