<?php
											$stamp		=	$_POST['stamp'];
											$tablename	=	$_POST['tablename'];
											$id			=	$_POST['id'];
											$title		=	$_POST['title'];
											$tekst		=	$_POST['tekst'];
											
											$title		=	mysql_real_escape_string($title);
											$tekst		=	mysql_real_escape_string($tekst);
				
				
				
				$sql = "UPDATE ".$tablename." SET title = '".$title."', text = '".$tekst."' WHERE `id` = ".$id.";";
				
				//echo $sql;
				mysql_query ($sql);
				
				header("Refresh: 0; URL=\"?action=member&process=change&stamp=$stamp\"");
	
	
	
	
?>