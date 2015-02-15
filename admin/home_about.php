<?php
	
	ob_start();//this just buffers the header so that you dont recieve an error for returning to the same page

	$page_id = "About"; // De tekst tussen de " " moet je veranderen voor de pagina titel ( <title></title> )
	
	$data_id = "about";
	
	$section_id	=	"Home";	// Hiermee bepaal je onder welke noemer de pagina valt.
	
	if (!empty($_GET['lang']))
		{
			$lang		=	$_GET['lang']; // Kijk of er een taal geselecteerd is
		}
		


include ('includes/incl.php');

include ('templates/header.html');


if (isset($_GET['action']) && $_GET['action'])
	{
		$action = $_GET['action'];
	}
else
	{
		$action = '';
	}


switch($action)
	{
   		default:
			header("Refresh: 0; URL=\"?action=member\"");
		break;		
		case 'member':
			//checks cookies to make sure they are logged in 
 				if(isset($_COOKIE['ID_my_site'])) 
 					{ 
 						$username = $_COOKIE['ID_my_site']; 
 						$pass = $_COOKIE['Key_my_site']; 
 	 					$check = mysql_query("SELECT * FROM members WHERE login = '$username'")or die(mysql_error()); 
 					while($info = mysql_fetch_array( $check )) 	 
 						{ 
 
 				//if the cookie has the wrong password, they are taken to the login page 
 						if ($pass != $info['pass']) 
 							{ 			
								header("Location: ?action=login"); 
 							} 
 
 				//otherwise they are shown the admin area	 
 					else 
 							{
 			 					
#######################################################################################################################
#
#	Vanaf hier is de indeling van de webpagina !!!!!!!!!!!!!!!
#
#######################################################################################################################
?>
<div class="container">
	<div class="menu">
	<?php
				include ('includes/menu.html');

	?>
    </div>
    	<div class="submenu">
        	<span class="submenu_left">&nbsp;</span>
            <?php
				if ($section_id == "Home")
					{
						include ('includes/submenu_home.html');
					}

			?>
            <span class="submenu_right">&nbsp;</span>
        </div>
        
        <div class="time">
                	<a href="?action=logout"><?php echo $ADM['logout']; ?></a>
        </div>

		<div id="body">
        	<div class="body">
				<div class="admin_menu">
        			<?php
						if ( $page_id !== "Main")
							{
								include ('includes/standardmenu.html');
							}

					?>
        		</div>
        		<div class="admin_body">
        			
                    <?php
                    	if (isset($_GET['process']) && $_GET['process'])
							{
								$process = $_GET['process'];
							}
						else
    						{
        						$process = '';
    						}
					switch($process)
						{
default:
                    			echo "Default dus hier komt alle informatie";
								
								
break;

case 'list':
?>
<div class="body_field">

<?php

		$dir = "./lang/";

		$dh = opendir($dir);

		while (($file = readdir($dh)) !== false) {
			// Gets the File Extension
			$extension = substr($file, strrpos($file, '.'));
			
			
			// checks if the extension is .php or the file name is  . or .. if so it will be shown as an exclusion
			if($extension !== ".php" && $file !== "." && $file !== ".." && $file !== "index.html")
			
			
			if (!empty($file))
			{
?>
			<fieldset>
			<legend> <b><?php echo $ADM['listview']; echo $language[$file]; ?> </b></legend>
						<table>
<?php
			
			$tablename	=	"".$file."_".$data_id."";
			
			$sql ="SELECT * FROM ".$tablename." ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					echo "No records available";
					else
					{
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id		=	$info['id'];
							$title 	= 	$info['title'];
    						$tekst 	= 	$info['text'];
							$tekst 	= 	nl2br ($tekst);
							$stamp = $info['stamp'];
?>
							
						
                        	<tr class="listing">
                    			<td class="title">
                        			<?php echo $title; ?>
                        		</td>
                        		<td class="picks">
                        			<a href="?action=member&amp;process=change&amp;lang=<?php echo $lang; ?>&amp;stamp=<?php echo $stamp  ?>">
                        			<img src="images/edit.gif" alt="<?php echo $ADM['changeinfo']; ?>" title="<?php echo $ADM['changeinfo']; ?>" />
                        			</a>
                       		 </td>
                       		 <td class="picks">
                        			<a href="?action=member&amp;process=deletecheck&amp;lang=<?php echo $lang; ?>&amp;stamp=<?php echo $stamp  ?>">
                        			<img src="images/delete.gif" alt="<?php echo $ADM['deleteinfo']; ?>" title="<?php echo $ADM['deleteinfo']; ?>" />
                        			</a>
                        		</td>
                    			<td class="picks">
                        			<a href="?action=member&amp;process=more&amp;lang=<?php echo $lang; ?>&amp;stamp=<?php echo $stamp  ?>">
                        			<img src="images/more.gif" alt="<?php echo $ADM['moreinfo']; ?>" title="<?php echo $ADM['moreinfo']; ?>" />
                        			</a>
                       		 	</td>
                   		 </tr>
                       	
 <?php
						}
?>
						</table>
                        </fieldset>
<?php
					}
			}
		}
?>
	
</div>




<?php							
break;

case 'more':
?>
	<div class="body_field">
<?php
							
		$stamp	=	$_GET['stamp'];

		
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
			
						$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp."";
    						$data = mysql_query($sql);
							if (mysql_num_rows($data)!==0)
								{
									$info = mysql_fetch_array( $data );
					
									$id		=	$info['id'];
									$title 	= 	$info['title'];
    								$tekst 	= 	$info['text'];
									$tekst 	= 	nl2br ($tekst);
									$dbstamp	=	$info['stamp'];
								}
						$sql2 ="SELECT * FROM picture WHERE stamp=".$dbstamp."";
    						$data2 = mysql_query($sql2);
							if (mysql_num_rows($data2)!==0)					
								{
									$info2 = mysql_fetch_array( $data2 );
						
									$image = $info2['image'];
									$pic_id = $info2['id'];
								}
			
?>
<fieldset>
	<legend>
		<?php echo $language[$file] ;?>
		<img src='lang/<?php echo  $file ; ?>/<?php echo  $file ; ?>.png' alt='<?php echo $language[$file] ; ?>' title='<?php echo $language[$file] ?>'/>
	</legend>
	<h2><?php echo $title ; ?></h2>
	<?php echo $tekst ; ?>
	<br />
	<?php
		if (!empty($image))
			{
	?>
				<img src='../album/thumbs/thumb_<?php echo $image ;?>' alt='<?php echo $title ; ?>' title='<?php echo $title ; ?>'/>
	<?php
			}
	?>
	
</fieldset>
<?php		
			}
			
		}


		closedir($dh);
?>

<table>
  <tr>
    <td class="picks">
      <a href="?action=member&amp;process=change&amp;lang=<?php echo $lang; ?>&amp;stamp=<?php echo $stamp  ?>">
      	<img src="images/edit.gif" alt="<?php echo $ADM['changeinfo']; ?>" title="<?php echo $ADM['changeinfo']; ?>" />
      </a>
      </td>
    <td class="picks">
      <a href="?action=member&amp;process=deletecheck&amp;lang=<?php echo $lang; ?>&amp;stamp=<?php echo $stamp  ?>">
      	<img src="images/delete.gif" alt="<?php echo $ADM['deleteinfo']; ?>" title="<?php echo $ADM['deleteinfo']; ?>" />
      </a>
      </td>
    </tr>
  
</table>
	</div>
<?php
break;

case 'add':


?>
<form name="newad" enctype="multipart/form-data" action="?lang=<?php echo $lang ?>&amp;action=member&amp;process=upload" method="post">
<?php
		
		$stamp	=	time();
		
		
		$dir = "./lang/";

		$dh = opendir($dir);

		while (($file = readdir($dh)) !== false) 
		{
			// Gets the File Extension
			$extension = substr($file, strrpos($file, '.'));
			
			
			// checks if the extension is .php or the file name is  . or .. if so it will be shown as an exclusion
			if($extension !== ".php" && $file !== "." && $file !== ".." && $file !== "index.html")
			
			
			
			

echo "
<fieldset>
	<legend>
		$language[$file]
		<img src='lang/$file/$file.png' alt='$language[$file]' title='$language[$file]'/>
	</legend>
	$ADM[title]
	<input name='title_$file' type='text' size='42' />
	<br />
	$ADM[descrip]
	<br />
	<textarea name='text_$file' cols='95' rows='12'></textarea>
</fieldset>";
			
		}


		closedir($dh);
?>
	<input name="stamp" type="hidden" value="<?php echo $stamp; ?>" />
<table>
	<tr>
    	<td>
        	<?php echo $ADM['fileadd'];?>
        </td>
        <td>
        	<input name="image" type="file" size="28" /><br />
        </td>
    </tr>
	<tr>
    	<td>
        	<input type="reset" value="<?php echo $ADM['reset'];?>" />
        </td>
        <td>
        	<input type="submit" value="<?php echo $ADM['submit'];?>" />
        </td>
    </tr>
</table>

</form>


<?php
   	break;

case 'upload':
		
	
//define a maxim size for the uploaded images
define ("MAX_SIZE","10000");
// define the width and height for the thumbnail
// note that theese dimmensions are considered the maximum dimmension and are not fixed,
// because we have to keep the image ratio intact or it will be deformed
define ("WIDTH","200");
define ("HEIGHT","150");

// this is the function that will create the thumbnail image from the uploaded image
// the resize will be done considering the width and height defined, but without deforming the image
function make_thumb($img_name,$filename,$new_w,$new_h)
{
//get image extension.
$ext=getExtension($img_name);
//creates the new image using the appropriate function from gd library
if(!strcmp("jpg",$ext) || !strcmp("jpeg",$ext))
$src_img=imagecreatefromjpeg($img_name);

if(!strcmp("png",$ext))
$src_img=imagecreatefrompng($img_name);

//gets the dimmensions of the image
$old_x=imageSX($src_img);
$old_y=imageSY($src_img);

// next we will calculate the new dimmensions for the thumbnail image
// the next steps will be taken:
// 1. calculate the ratio by dividing the old dimmensions with the new ones
// 2. if the ratio for the width is higher, the width will remain the one define in WIDTH variable
// and the height will be calculated so the image ratio will not change
// 3. otherwise we will use the height ratio for the image
// as a result, only one of the dimmensions will be from the fixed ones
$ratio1=$old_x/$new_w;
$ratio2=$old_y/$new_h;
if($ratio1>$ratio2) {
$thumb_w=$new_w;
$thumb_h=$old_y/$ratio1;
}
else {
$thumb_h=$new_h;
$thumb_w=$old_x/$ratio2;
}

// we create a new image with the new dimmensions
$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);

// resize the big image to the new created one
imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);

// output the created image to the file. Now we will have the thumbnail into the file named by $filename
if(!strcmp("png",$ext))
imagepng($dst_img,$filename);
else
imagejpeg($dst_img,$filename);

//destroys source and destination images.
imagedestroy($dst_img);
imagedestroy($src_img);
}

// This function reads the extension of the file.
// It is used to determine if the file is an image by checking the extension.
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}

// This variable is used as a flag. The value is initialized with 0 (meaning no error found)
// and it will be changed to 1 if an errro occures. If the error occures the file will not be uploaded.
$errors=0;
// checks if the form has been submitted
//if(isset($_POST['Submit']))
//	{
		//reads the name of the file the user submitted for uploading
		$image=$_FILES['image']['name'];
		// if it is not empty
		if ($image)
			{
				// get the original name of the file from the clients machine
				$filename = stripslashes($_FILES['image']['name']);

				// get the extension of the file in a lower case format
				$extension = getExtension($filename);
				$extension = strtolower($extension);
				// if it is not a known extension, we will suppose it is an error, print an error message
				//and will not upload the file, otherwise we continue
					if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png"))
						{
							echo	"<table>";
							echo	"<tr>";
							echo 	"<td>";
							echo	$ADM['extension'];
							echo	"</td>";
							echo	"</tr>";
							echo	"</table>";
							$errors=1;
						}
					else
						{
							// get the size of the image in bytes
							// $_FILES[\'image\'][\'tmp_name\'] is the temporary filename of the file in which the uploaded 
							// file was stored on the server
							$size=getimagesize($_FILES['image']['tmp_name']);
							$sizekb=filesize($_FILES['image']['tmp_name']);

								//compare the size with the maxim size we defined and print error if bigger
								if ($sizekb > MAX_SIZE*1024)
									{
										echo	"<table>";
										echo	"<tr>";
										echo 	"<td>";
										echo	$ADM['sizelimit'];
										echo	"</td>";
										echo	"</tr>";
										echo	"</table>";
										$errors=1;
									}

							//we will give an unique name, for example the time in unix time format
							$image_name=time().'.'.$extension;
							//the new name will be containing the full path where will be stored (images folder)
							$newname="../album/".$image_name;
							$copied = copy($_FILES['image']['tmp_name'], $newname);
							//we verify if the image has been uploaded, and print error instead
								if (!$copied)
									{
										echo	"<table>";
										echo	"<tr>";
										echo 	"<td>";
										echo	$ADM['nosucces'];
										echo	"</td>";
										echo	"</tr>";
										echo	"</table>";
										$errors=1;
									}
								else
									{
										// the new thumbnail image will be placed in images/thumbs/ folder
										$thumb_name='../album/thumbs/thumb_'.$image_name;
										// call the function that will create the thumbnail. The function will get as parameters
										// the image name, the thumbnail name and the width and height desired for the thumbnail
										$thumb=make_thumb($newname,$thumb_name,WIDTH,HEIGHT);
									}
						}
			}
//	}

// Plaatsen van de image gegevens in de database

	$stamp		=	$_POST["stamp"];

$sql1 = "INSERT INTO picture (image,stamp) VALUES ('" . $image_name . "','" . $stamp . "')";
		mysql_query($sql1);

// Plaatsen van de text gegevens in de database
		
		$dir = "./lang/";

		$dh = opendir($dir);

		while (($file = readdir($dh)) !== false) 
			{
				// Gets the File Extension
				$extension = substr($file, strrpos($file, '.'));
			
			
				// checks if the extension is .php or the file name is  . or .. if so it will be shown as an exclusion
				if($extension !== ".php" && $file !== "." && $file !== "..")
			
				
					if (!empty($_POST))
					
						{
			
						
							
							$tablename	=	$file._.$data_id ;
						
									$sql1 = "CREATE TABLE IF NOT EXISTS ".$tablename." \n"
    									. " (\n"
    									. " id mediumint(9) NOT NULL AUTO_INCREMENT,\n"
    									. " title varchar(60) COLLATE utf8_bin NOT NULL,\n"
    									. " text TEXT COLLATE utf8_bin NOT NULL,\n"
										. " stamp int(11) NOT NULL,\n"
    									. " PRIMARY KEY (`id`)\n"
    									. " ) \n"
    									. " ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=0 ;";

									mysql_query($sql1);	
									
								$title		=	$_POST["title_$file"];
								$text		=	$_POST["text_$file"];
								$stamp		=	$_POST["stamp"];
					
									$sql2 = "INSERT INTO ".$tablename." (title, text, stamp) 
													VALUES (
															'" . $title . "',
															'" . $text . "',
															'" . $stamp . "')";
									mysql_query($sql2);
							
						}
			
			}

//If no errors registered, print the success message and show the thumbnail image created
	if(
	   //isset($_POST['Submit']) && 
	   !$errors)
		{
			//echo "<h1>Thumbnail created Successfully!</h1>";
			//echo '<img src="'.$thumb_name.'">';

			//done take me back to the main page
    		//header('location: ?lang=$lang&amp;action=member');
			//header('Location: '.$_SERVER['PHP_SELF']);
			header ('location: home_about.php');
		}



break;

case 'change':
?>
<div class="body_field">

<form name="update" enctype="multipart/form-data" action="?lang=<?php echo $lang ?>&amp;action=member&amp;process=update" method="post">

<?php
				
		$stamp	=	$_GET['stamp'];

		
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
			
						$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp."";
    						$data = mysql_query($sql);
							if (mysql_num_rows($data)!==0)
								{
									$info = mysql_fetch_array( $data );
					
									$id		=	$info['id'];
									$title 	= 	$info['title'];
    								$tekst 	= 	$info['text'];
									//$tekst 	= 	nl2br ($tekst);
									$dbstamp	=	$info['stamp'];
								}
						
			
echo "
<fieldset>
	<legend>
		$language[$file]
		<img src='lang/$file/$file.png' alt='$language[$file]' title='$language[$file]'/>
	</legend>
	$ADM[title]
	<input name='title_$file' type='text' size='42' value='$title'/>
	<br />
	$ADM[descrip]
	<br />
	<textarea name='text_$file' cols='95' rows='12'>$tekst</textarea>
</fieldset>";
		
			}
			
		}


		closedir($dh);
		$sql2 ="SELECT * FROM picture WHERE stamp=".$stamp."";
    						$data2 = mysql_query($sql2);
							if (mysql_num_rows($data2)!==0)					
								{
									$info2 = mysql_fetch_array( $data2 );
						
									$image = $info2['image'];
									$pic_id = $info2['id'];
								}
?>
<input name="stamp" type="hidden" value="<?php echo $stamp; ?>" />
<table>
	<tr>
    	<td>
          <img src="../album/thumbs/thumb_<?php echo	$image;?>" alt="Image" />
        </td>
    </tr>
    <tr>
    	<td>
        	<?php echo $ADM['update']; ?>
        </td>
        <td>
        	<input name="update_image" type="radio" value="1" />
            <?php echo $ADM['yes']; ?>
            <input name="update_image" type="radio" value="0" checked="checked" />
            <?php echo $ADM['no']; ?>
        </td>
    </tr>
    <tr>
    	<td>
        	<?php echo $ADM['yesupdate']; ?>
        </td>
        <td>
        	<input name="image" type="file" size="35" />
        </td>
    </tr>

</table>

		


<table>
  <tr>
    <td class="picks">
     	<input name="submit" type="submit" value="Update the page" />
      </td>
    </tr>
  
</table>
</form>
	</div>
<?php							
break;

case 'update';

	
			$update_image	=	$_POST['update_image'];
			$stamp			=	$_POST['stamp'];
			//$image		=	$_POST['image'];
			
			
		$dir = "./lang/";

		$dh = opendir($dir);

		while (($file = readdir($dh)) !== false) 
			{
				// Gets the File Extension
				$extension = substr($file, strrpos($file, '.'));
			
			
				// checks if the extension is .php or the file name is  . or .. if so it will be shown as an exclusion
				if($extension !== ".php" && $file !== "." && $file !== "..")
			
				
					if (!empty($_POST))
					
						{
			
						
							
							$tablename	=	$file._.$data_id ;
														
								$title		=	$_POST["title_$file"];
								$text		=	$_POST["text_$file"];
					
									
									$sql = "UPDATE ".$tablename." SET title = '".$title."', text = '".$text."' WHERE `stamp` = ".$stamp.";";
									mysql_query($sql);
									
									
							
						}
			
			}
			
			
	if ($image_update !== 0)
		{
			
			if (empty($_FILES['image']['name']))
				// Wanneer er geen nieuwe foto uitgekozen is.
			
				{
					echo	"<table>";
					echo	"<tr>";
					echo	"<td>";
					echo	$ADM['noupload']; // error
					echo	"</td>";
					echo	"</tr>";
					echo	"</table>";
					$error	=	1;
				}
			else
				{
					// delete picture from folder
				
					$sql2 ="SELECT * FROM picture WHERE stamp = ".$stamp.";";
    					$data = mysql_query($sql2);
						$info = mysql_fetch_array( $data );
					
							$image_name = $info['image'];
						
								$thumb_path		=	"../album/thumbs/thumb_";
								$full_path		=	"../album/";

								$thumb_image	=	"".$thumb_path."".$image_name."";
								$full_image		=	"".$full_path."".$image_name."";

							unlink ($full_image) ;
							unlink ($thumb_image);
				
						// delete picture info from database
				
						$sql3 = "DELETE FROM picture WHERE stamp= ".$stamp." ";
						mysql_query ($sql3);
						$deleted	=	mysql_query ($sql3);
					
				
						if (!$deleted)	// Wanneer de gegevens niet uit de database verwijderd zijn.
							{
							
								echo	"<table>";
								echo	"<tr>";
								echo	"<td>";
								echo	$ADM['nodelete']; // error
								echo	"</td>";
								echo	"</tr>";
								echo	"</table>";
								$error	=	1;
							
							}
						else	// Wanneer de gegevens uit de database verwijderd zijn.
							{
//define a maxim size for the uploaded images
define ("MAX_SIZE","10000");
// define the width and height for the thumbnail
// note that theese dimmensions are considered the maximum dimmension and are not fixed,
// because we have to keep the image ratio intact or it will be deformed
define ("WIDTH","200");
define ("HEIGHT","150");

// this is the function that will create the thumbnail image from the uploaded image
// the resize will be done considering the width and height defined, but without deforming the image
function make_thumb($img_name,$filename,$new_w,$new_h)
{
//get image extension.
$ext=getExtension($img_name);
//creates the new image using the appropriate function from gd library
if(!strcmp("jpg",$ext) || !strcmp("jpeg",$ext))
$src_img=imagecreatefromjpeg($img_name);

if(!strcmp("png",$ext))
$src_img=imagecreatefrompng($img_name);

//gets the dimmensions of the image
$old_x=imageSX($src_img);
$old_y=imageSY($src_img);

// next we will calculate the new dimmensions for the thumbnail image
// the next steps will be taken:
// 1. calculate the ratio by dividing the old dimmensions with the new ones
// 2. if the ratio for the width is higher, the width will remain the one define in WIDTH variable
// and the height will be calculated so the image ratio will not change
// 3. otherwise we will use the height ratio for the image
// as a result, only one of the dimmensions will be from the fixed ones
$ratio1=$old_x/$new_w;
$ratio2=$old_y/$new_h;
if($ratio1>$ratio2) {
$thumb_w=$new_w;
$thumb_h=$old_y/$ratio1;
}
else {
$thumb_h=$new_h;
$thumb_w=$old_x/$ratio2;
}

// we create a new image with the new dimmensions
$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);

// resize the big image to the new created one
imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);

// output the created image to the file. Now we will have the thumbnail into the file named by $filename
if(!strcmp("png",$ext))
imagepng($dst_img,$filename);
else
imagejpeg($dst_img,$filename);

//destroys source and destination images.
imagedestroy($dst_img);
imagedestroy($src_img);
}

// This function reads the extension of the file.
// It is used to determine if the file is an image by checking the extension.
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}

// This variable is used as a flag. The value is initialized with 0 (meaning no error found)
// and it will be changed to 1 if an errro occures. If the error occures the file will not be uploaded.
$errors=0;
// checks if the form has been submitted
//if(isset($_POST['Submit']))
//	{
		//reads the name of the file the user submitted for uploading
		$image=$_FILES['image']['name'];
		// if it is not empty
		if ($image)
			{
				// get the original name of the file from the clients machine
				$filename = stripslashes($_FILES['image']['name']);

				// get the extension of the file in a lower case format
				$extension = getExtension($filename);
				$extension = strtolower($extension);
				// if it is not a known extension, we will suppose it is an error, print an error message
				//and will not upload the file, otherwise we continue
					if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png"))
						{
							
							echo	"<table>";
							echo	"<tr>";
							echo	"<td>";
							echo	$ADM['extension']; // error
							echo	"</td>";
							echo	"</tr>";
							echo	"</table>";
							$errors=1;
						}
					else
						{
							// get the size of the image in bytes
							// $_FILES[\'image\'][\'tmp_name\'] is the temporary filename of the file in which the uploaded 
							// file was stored on the server
							$size=getimagesize($_FILES['image']['tmp_name']);
							$sizekb=filesize($_FILES['image']['tmp_name']);

								//compare the size with the maxim size we defined and print error if bigger
								if ($sizekb > MAX_SIZE*1024)
									{
										
										echo	"<table>";
										echo	"<tr>";
										echo	"<td>";
										echo	$ADM['sizelimit']; // error
										echo	"</td>";
										echo	"</tr>";
										echo	"</table>";
										$errors=1;
									}

							//we will give an unique name, for example the time in unix time format
							$image_name=time().'.'.$extension;
							//the new name will be containing the full path where will be stored (images folder)
							$newname="../album/".$image_name;
							$copied = copy($_FILES['image']['tmp_name'], $newname);
							//we verify if the image has been uploaded, and print error instead
								if (!$copied)
									{
										echo	"<table>";
										echo	"<tr>";
										echo	"<td>";
										echo	$ADM['nosucces']; // error
										echo	"</td>";
										echo	"</tr>";
										echo	"</table>";
										$errors=1;
									}
								else
									{
										// the new thumbnail image will be placed in images/thumbs/ folder
										$thumb_name='../album/thumbs/thumb_'.$image_name;
										// call the function that will create the thumbnail. The function will get as parameters
										// the image name, the thumbnail name and the width and height desired for the thumbnail
										$thumb=make_thumb($newname,$thumb_name,WIDTH,HEIGHT);
									}
						}
			}
//	}

// Plaatsen van de image gegevens in de database



$sql1 = "INSERT INTO picture (image,stamp) VALUES ('" . $image_name . "','" . $stamp . "')";
		mysql_query($sql1);
								
								
							}
				
				
				
				}
		if ($errors	== 0)
			{
				header ('location: home_about.php?action=member&process=list');
			}
		else
			{
					echo	"<table>";
					echo	"<tr>";
					echo	"<td>";
					echo	$ADM['oneerror']; // error
					echo	"</td>";
					echo	"</tr>";
					echo	"<tr>";
					echo	"<td>";
					echo	$ADM['startover']; // error
					echo	"</td>";
					echo	"</tr>";
					echo	"</table>";
				
			}
		}







break;

case 'deletecheck':
					$stamp	=	$_GET['stamp'];	
					
								
								$tablename	=	"".$lang."_".$data_id."";
			
						$sql ="SELECT * FROM ".$tablename." WHERE stamp= ".$stamp."";
    						$data = mysql_query($sql);
							if (mysql_num_rows($data)!==0)
								{
									$info = mysql_fetch_array( $data );
					
									$id		=	$info['id'];
									$title 	= 	$info['title'];
    								$tekst 	= 	$info['text'];
									$tekst 	= 	nl2br ($tekst);
									$dbstamp	=	$info['stamp'];
								}
						$sql2 ="SELECT * FROM picture WHERE stamp=".$dbstamp."";
    						$data2 = mysql_query($sql2);
							if (mysql_num_rows($data2)!==0)					
								{
									$info2 = mysql_fetch_array( $data2 );
						
									$image = $info2['image'];
									$pic_id = $info2['id'];
						}
?>					
			<form action="?action=member&amp;process=delete&amp;lang=<?php echo $lang; ?>" method="post" enctype="multipart/form-data" name="delete">
                
					<table>
                    	<tr>
                        	<th colspan="2">
                            	<i>
                            		<?php echo $ADM['deletecheck']; ?>
                               	</i>
                            </th>
                        </tr>		
						<tr>
                        	<td>
                            	<b>
                            		<?php echo $ADM['title']; ?>
                                </b>
                            </td>	
                          <td>
                          	<?php echo $title; ?>
                          </td>      
                        </tr>
                        <tr>
                        	<td>
                            	<b>
                            		<?php echo $ADM['deltitle']; ?>
                                </b>
                        	</td>
                            <td>
                            	<input name="sure" type="radio" value="1"/>
                                Yes
                                <input name="sure" type="radio" value="0" checked="checked"  />
                                No
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<b>
                            		<?php echo $ADM['dellang']; ?>
                                </b>
                            </td>
                            <td>
                            	<input name="all_lang" type="radio" value="1" checked="checked" />
                                <?php echo $ADM['yes']; ?>
                                <input name="all_lang" type="radio" value="0" />
                                <?php echo $ADM['no']; ?>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<img src="../album/thumbs/thumb_<?php echo $image; ?>" alt="<?php echo $title;?>" title="<?php echo $title; ?>"/>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<b>
                                	<?php echo $ADM['keepimage']; ?>
                                </b>
                            </td>
                            <td>
                            	<input name="image_gall" type="radio" value="1" />
                                <?php echo $ADM['yes']; ?>
                                <input name="image_gall" type="radio" value="0" checked="checked" />
                                <?php echo $ADM['no']; ?>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<input name="stamp" type="hidden" value="<?php echo $stamp; ?>" />
                                
                                <input type="button" value="Go Back" onclick="history.go(-1)" />
                        	</td>
                            <td>
                            	<input value="Next Step" type="submit" />
                            </td>
                        </tr>
                    </table>            
               </form>
<?php						
break;

case 'delete':
							$sure		=	$_POST['sure'];
							$all_lang	=	$_POST['all_lang'];
							$image_gall	=	$_POST['image_gall'];
							$stamp		=	$_POST['stamp'];
							
							// echo	$sure;
							// echo	$all_lang;
							// echo	$image_gall;
							// echo	$stamp;
							
							if ($sure !== '1')// controleer of de informatie daadwerkelijk verwijderd moet worden.
								{	// wanneer er geen bevestiging is gegeven.
									header('refresh:5;url=?action=member&process=list');
									echo '<table>';
									echo '<tr>';
									echo '<td>';
									echo $ADM['noselectyes'];
									echo '</td>';
									echo '</tr>';
									echo '<tr>';
									echo '<td>';									
									echo $ADM['redirect5'];
									echo '</td>';
									echo '</tr>';
									echo '<tr>';
									echo '<td>';									
									echo $ADM['infonotdeleted'];
									echo '</td>';
									echo '</tr>';
									echo '</table>';
									
									exit;
								}
							else
								{
										if ($all_lang == '1')// controleren of alle talen verwijderd moeten worden
											{
		

		
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
						mysql_query ($sql);
					}
			}
			
			
		if ($image_gall !== '1') // kijken of de image bewaard moet blijven voor de gallery
			{	// Wanneer de image niet bewaard hoeft te blijven
			
			
				// delete picture from folder
				
				$sql2 ="SELECT * FROM picture WHERE stamp = ".$stamp.";";
    				$data = mysql_query($sql2);
					$info = mysql_fetch_array( $data );
					
						$image_name = $info['image'];
						
							$thumb_path		=	"../album/thumbs/thumb_";
							$full_path		=	"../album/";

							$thumb_image	=	"".$thumb_path."".$image_name."";
							$full_image		=	"".$full_path."".$image_name."";
						
						unlink ($full_image);
						unlink ($thumb_image);
				
				// delete picture info from database
				
				$sql3 = "DELETE FROM picture WHERE stamp= ".$stamp." ";
				mysql_query ($sql3);
			
			}
		else	// wanneer de image bewaard moet blijven voor de gallery
			{
				// pas de main_image instelling aan
				$sql4 = "UPDATE picture SET main_image = '0' WHERE `stamp` = $stamp ;";
						mysql_query ($sql4);
				
			}
		
			
		// wanneer alles gebeurd is ga naar:
		
		header ('location: home_about.php?action=member&process=list');
												
											}
										else
											{
														
echo	"<form action='?action=member&amp;process=deletemultiple' method='post' enctype='multipart/form-data' name='delete'>";										
echo	"<table>";
echo	"<tr>";
echo	"<th colspan='3'>";
echo	$ADM['selectlangdelete'];
echo	"</th>";
echo	"</tr>";
echo	"<tr>";
echo	"<th colspan='3'>";
echo	$ADM['keepimageoption'];
echo	"</th>";
echo	"</tr>";
echo	"<tr>";
echo	"<th colspan='3'>";
echo 	"<input name='stamp' type='hidden' value='";
echo 	$stamp;
echo 	"'/>";
echo	"</th>";
echo	"</tr>";

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
						?>
							<tr>
								<td>
									<input name="language[]" type="checkbox" value="<?php echo $file; ?>" />
								</td>
								<td>
									<?php echo $file; ?>
								</td>
								<td>
									<?php echo $language[$file]; ?>
								</td>
							</tr>
<?php
					}
						
			}
echo "<tr>";
echo "<th colspan='3'>";
echo "<input type='submit' value='$ADM[nextstep]' />";
echo "</th>";
echo "</tr>";
echo "</table>";
echo "</form>";
												
											}
								}
break;

case 'deletemultiple':
	
	$stamp		=	$_POST['stamp'];
	$alanguage 	= 	$_POST['language'];
  
  
  		if(empty($alanguage)) // controleer of er languages geselecteerd zijn
		// wanneer er geen languages geselecteerd zijn
  			{
				echo	"<table>";
				echo	"<tr>";
				echo	"<td>";
    			echo	$ADM['nolangselect'];
				echo	"</td>";
				echo	"</tr>";
				echo	"<tr>";
				echo	"<td>";
				echo	"<input type='button' value='$ADM[back]' onclick='history.go(-1)' />";
				echo	"</td>";
				echo	"</tr>";
				echo	"</table>";
  			} 
 		else 
		//wanneer er languages geselecteerd zijn
  			{
    			$N = count($alanguage); // tel het aantal aangevinkte languages

    			for($i=0; $i < $N; $i++)
    				{
    				
						$sql = "UPDATE ".$alanguage[$i]."_".$data_id." SET title = '', text = '' WHERE `stamp` = ".$stamp.";";
						mysql_query($sql);
					}
  			}
		header ('location: home_about.php?action=member&process=list');

	


break;
                    
						}
                    ?>
        		</div>
            </div>
		</div>

<?php

include ('templates/footer.html');

#######################################################################################################
#
#	Hier is het einde van de webpagina !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
#
#######################################################################################################
 							} 
 						} 
 					} 
 				else 
 
 					//if the cookie does not exist, they are taken to the login screen 
 					{			 
 						header("Location: ?action=login"); 
 					} 
		

    	break;
		case 'login':
			
			 	//Checks if there is a login cookie
 				if(isset($_COOKIE['ID_my_site']))
					//if there is, it logs you in and directes you to the members page
 					{ 	
						$username = $_COOKIE['ID_my_site']; 
 						$pass = $_COOKIE['Key_my_site'];
 	 					$check = mysql_query("SELECT * FROM members WHERE login = '$username'")or die(mysql_error());
 					
						while($info = mysql_fetch_array( $check )) 	
 							{
 								if ($pass != $info['pass']) 
 								{
 			 					}
 								else
 								{
 									header("Location: ?action=member");
 
 								}
 							}
					}
					
					
 				//if the login form is submitted 
 				if (isset($_POST['submit'])) 
					{ // if form has been submitted
 
 						// makes sure they filled it in
 						if(!$_POST['username'] | !$_POST['pass']) 
							{
 								echo
										'<div id="logcontainer">
 											<h3 class="red">
    											Error
   						 					</h3>
    										<table class="done">
    											<tr>
        											<td>';
													
    							echo						$ADM['notcompletereq'];
            					echo				'</td>
        										</tr>
        										<tr>
        											<td>';
        						echo					$ADM['tryagain'];
            					echo				'</td>
        										</tr>
    										</table>
 										</div>
										</body>
										</html>';

  
  										header("Refresh: 3; URL=\"?action=login\"");
       									exit;
 							}
 						// checks it against the database
 
 					if (!get_magic_quotes_gpc()) 
						{
 							$_POST['email'] = addslashes($_POST['email']);
 						}
 					$check = mysql_query("SELECT * FROM members WHERE login = '".$_POST['username']."'")or die(mysql_error());
 
 					//Gives error if user dosen't exist
 					$check2 = mysql_num_rows($check);
 						if ($check2 == 0) 
							{
								echo
					
										'<div id="logcontainer">
 											<h3 class="red">
    											Error
   						 					</h3>
    										<table class="done">
    											<tr>
        											<td>';
    							echo					$ADM['usernoexist'];
            					echo				'</td>
        										</tr>
        										<tr>
        											<td>';
        						echo					$ADM['plregfirst'];
            					echo				'</td>
        										</tr>
    										</table>
 										</div>
										</body>
										</html>';

  
  										header("Refresh: 3; URL=\"?action=reg\"");
       									exit;
 							}
 						while($info = mysql_fetch_array( $check )) 	
 							{
 								$_POST['pass'] = stripslashes($_POST['pass']);
 								$info['pass'] = stripslashes($info['pass']);
 								$_POST['pass'] = md5($_POST['pass']);
 
 									//gives error if the password is wrong
 									if ($_POST['pass'] != $info['pass']) 
										{
											echo
													'<div id="logcontainer">
 														<h3 class="red">';
    										echo			$ADM['error'];
   						 					echo		'</h3>
    												<table class="done">
    													<tr>
        													<td>';
    										echo				$ADM['nomatch'];
            								echo			'</td>
        												</tr>
        												<tr>
        													<td>';
        									echo				$ADM['tryagain'];
            								echo			'</td>
        												</tr>
    												</table>
 													</div>
												</body>
											</html>';

  
  										header("Refresh: 3; URL=\"?action=login\"");
       									exit;
 										}
	 								else 
 										{ 
											// if login is ok then we add a cookie 
 	 										$_POST['username'] = stripslashes($_POST['username']); 
 	 										$hour = time() + 3600; 
 											setcookie(ID_my_site, $_POST['username'], $hour); 
 											setcookie(Key_my_site, $_POST['pass'], $hour);	 
 
 												//then redirect them to the members area 
												 header("Location: ?action=member"); 
 										} 
 							} 
 						} 
					else 
 						{	 
 
 						// if they are not logged in 
 						?> 
 							<div id="logcontainer">
								<h3>
    								Log in
    							</h3>
   								<form action="" method="post">
									<table>
    									<tr>
        									<td>
            									<b><?php echo $ADM['user']; ?></b>
            								</td>
            								<td>
            									<input name="username" type="text" />
            								</td>
										</tr>
    									<tr>
        									<td>
            									<b><?php echo $ADM['password']; ?></b>
            								</td>
            								<td>
            									<input name="pass" type="password" />
            								</td>
										</tr>
        								<tr>
        									<td colspan="2" align="center">
            									<input value="Reset" type="reset" />
            									<input type="submit" name="submit" value="login" />
            								</td>
										</tr>
    								</table>
    							</form>
    							<h6>
                                	Designed &amp; Scripted by Divigo Design.
                                </h6>
							</div> 
 <?php 
 						} 
 

			
			
		break;
		case 'reg':
			if ($registration == 0)
				{
					echo
					
							'<div id="logcontainer">
 								<h3 class="red">';
    				echo			$ADM['error'];
   					echo 		'</h3>
    							<table class="done">
    								<tr>
        								<td>
											<b>';
    				echo						$ADM['noreg'];
					echo					'</b>
            							</td>
        							</tr>
    							</table>
 							</div>
							</body>
							</html>';

  
  						header("Refresh: 3; URL=\"?action=login\"");
       					exit;
				
				
				
				}
			if ($registration == 1)
				{
		
					//This code runs if the form has been submitted
 					if (isset($_POST['submit'])) 
 						{ 
	
							$login	=	$_POST['username'];
							$pass1	=	$_POST['pass'];
							$pass2	=	$_POST['pass2'];
 
 							//This makes sure they did not leave any fields blank
 							if (!$login | !$pass1 | !$pass2 ) 
								{
									echo
											'<div id="logcontainer">
 												<h3 class="red">';
    								echo			$ADM['error'];
   						 			echo		'</h3>
    											<table class="done">
    												<tr>
        												<td>';
    								echo					$ADM['notcompletereq'];
            						echo				'</td>
        											</tr>
        											<tr>
        												<td>';
        							echo					$ADM['tryagain'];
            						echo				'</td>
        											</tr>
    											</table>
 											</div>'
										;

  
  										header("Refresh: 3; URL=\"?action=reg\"");
       									exit;
 								}
 
 							// checks if the username is in use
 							if (!get_magic_quotes_gpc()) 
								{
 									$login = addslashes($login);
 								}
			
			
 								$usercheck = $login;
 								$check = mysql_query("SELECT login FROM members WHERE login = '$usercheck'")or die(mysql_error());
 								$check2 = mysql_num_rows($check);
 
 							//if the name exists it gives an error
 							if ($check2 != 0) 
								{
 									echo
											'<div id="logcontainer">
 												<h3 class="red">
    												Error
   						 						</h3>
    											<table class="done">
    												<tr>
        												<td>';
    								echo					$ADM['nameinvalid'];
            						echo				'</td>
        											</tr>
        											<tr>
        												<td>';
        							echo					$ADM['difname'];
            						echo				'</td>
        											</tr>
    											</table>
 											</div>';

  
  										header("Refresh: 3; URL=\"?action=reg\"");
       									exit;

 								}
			
 							// this makes sure both passwords entered match
 							if ($pass1 != $pass2)
								{
 									echo
											'<div id="logcontainer">
 												<h3 class="red">';
    								echo			$ADM['error'];
   						 			echo		'</h3>
												<table class="done">
													<tr>
        												<td>';
    								echo					$ADM['passnomatch'];
            						echo				'</td>
        											</tr>
        											<tr>
        												<td>';
        							echo					$ADM['tryagain'];
            						echo				'</td>
        											</tr>
    											</table>
 											</div>'
										;

  
  										header("Refresh: 3; URL=\"?action=reg\"");
       									exit;

 								}
 
 							// here we encrypt the password and add slashes if needed
 							$pass = md5($pass1);
 							if (!get_magic_quotes_gpc()) 
								{
 									$pass = addslashes($pass);
 									$login = addslashes($login);
 								}
 
 							// now we insert it into the database
 								$insert = "INSERT INTO members 
																(
																	login, 
																	pass
																)
 														VALUES 
																(
							 										'".$login."',
							 										'".$pass."'
							 									)";
 								$add_member = mysql_query($insert);

 							echo
                    				'<div id="logcontainer">
 										<h3>';
    						echo			$ADM['registered'];
    						echo		'</h3>
    									<table class="done">
    										<tr>
        										<td>';
    						echo					$ADM['tyreg'];
            				echo				'</td>
        									</tr>
        									<tr>
        										<td>';
        					echo					$ADM['maylog'];
            				echo				'</td>
        									</tr>
    									</table>
										<h6>';
                        	echo			$ADM['designandscript'];
                        	echo		'</h6>
 									</div>';
									
									
									header("Refresh: 3; URL=\"?action=login\"");
       								exit;
  						}
 					else 
						{	 
?>
							 <div id="logcontainer">
 								<h3>
    								<?php echo $ADM['register']; ?>
    							</h3>
 								<form action="" method="post">
 									<table border="0">
 										<tr>
        									<td>
            									<?php echo $ADM['user']; ?>
            								</td>
           									 <td>
 												<input type="text" name="username" maxlength="60" />
 											</td>
        								</tr>
 										<tr>
        									<td>
            									<?php echo $ADM['password']; ?>
            								</td>
            								<td>
												<input type="password" name="pass" maxlength="10" />
 											</td>
 										</tr>
 										<tr>
 											<td>
 												<?php echo $ADM['passwordconfirm']; ?>
            								</td>
            								<td>
 												<input type="password" name="pass2" maxlength="10" />
 											</td>
        								</tr>
 										<tr>
        									<th colspan="2">
            									<input value="Reset" type="reset" />
            									<input type="submit" name="submit" value="Register" />
            								</th>
       									 </tr>
 									</table>
 								</form>
 							</div>
 
 <?php
						}
				}
		break;
		case 'logout':
			
			 $past = time() - 100; 
			 //this makes the time in the past to destroy the cookie 
 				setcookie(ID_my_site, gone, $past); 
 				setcookie(Key_my_site, gone, $past); 
 				header("Location: ?action=login"); 
			
		break;
   
	}//end the switch



?>




</body>
</html>
 <?php
ob_flush();?>