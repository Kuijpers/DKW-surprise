
<?php 

					$stamp		=	$_POST['stamp'];
					$horse_id	=	$_POST['horse_id'];
					$surecheck	=	$_POST['surecheck'];
					$gallery	=	$_POST['gallery'];

if ($surecheck !== "1")
	{
		header("Refresh: 3; URL=\"?action=member&process=deletefull&stamp=$stamp\"");
						
		echo "<table>";
		echo	"<tr><td>";
		echo 	"You didn't check the button: Are you sure you want to delete this horse ?";
		echo	"</td></tr>";
		echo	"<tr><td><i>";
		echo	"You will be redirected in 3 seconds.";
		echo	"</i></td></tr>";
		echo	"</table>";						
	}
else
	{
		
	if ($gallery !== "1")
		{
							$thumb_path		=	"../album/thumbs/thumb_";
							$full_path		=	"../album/";
							
							
			
			$sql ="SELECT * FROM picture WHERE stamp = ".$stamp." ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)!==0)
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$image_name = $info['image'];
							$image_id	 = $info['id'];
							
							$thumb_image	=	"".$thumb_path."".$image_name."";
							$full_image		=	"".$full_path."".$image_name."";
							
						unlink ($full_image);
						unlink ($thumb_image);
							
						$sql2 = "DELETE FROM picture WHERE id= ".$image_id." ";
							
							//echo $sql2;
							//echo "<br />";
							//echo $image_id;
							//echo "<br />";
							mysql_query ($sql2);	

						}
					}
			}
		else
			{
				$sql = "UPDATE picture SET stamp = 0 WHERE stamp = ".$stamp."";
				
					//echo $sql;
					mysql_query($sql); 
			}
			
			$sql = "DELETE FROM registration WHERE stamp= ".$stamp." ";
			
				//echo $sql;
				mysql_query($sql);
				
			$sql = "DELETE FROM breeding WHERE stamp= ".$stamp." ";
			
				//echo $sql;
				mysql_query($sql);
			
			$sql = "DELETE FROM offspring WHERE stamp= ".$stamp." ";
			
				//echo $sql;
				mysql_query($sql);
				
			$sql = "DELETE FROM results WHERE stamp= ".$stamp." ";
			
				//echo $sql;
				mysql_query($sql);
				
			$dir = "./lang/";

			$dh = opendir($dir);

				while (($file = readdir($dh)) !== false) 
					{
						// Gets the File Extension
						$extension = substr($file, strrpos($file, '.'));
			
			
						// checks if the extension is .php or the file name is  . or .. or index.html if so it will be shown as an exclusion
						if($extension !== ".php" && $file !== "." && $file !== ".." && $file !== "index.html")
			
			
						if (!empty($file))
							{	
								$tablename	=	"".$file."_".$data_id."";
						
								$sql = "DELETE FROM ".$tablename." WHERE stamp= ".$stamp.";";
								
								//echo $sql;
								mysql_query ($sql);
							}
					}
			$sql = "DELETE FROM horses WHERE stamp= ".$stamp." ";
			
				//echo $sql;
				mysql_query($sql);
		header("Refresh: 3; URL=\"?action=member&process=list&stamp=$stamp\"");
	}
?>
