<?php
	
	ob_start();//this just buffers the header so that you dont recieve an error for returning to the same page

	$page_id = "Home"; // De tekst tussen de " " moet je veranderen voor de pagina titel ( <title></title> )
	
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
#	Vanaf hiet is de indeling van de webpagina !!!!!!!!!!!!!!!
#
#######################################################################################################################
?>
<div class="container">
	<a href="?action=logout">
    	Log out
    </a>
	<?php

		if ($menu_set == 1) // gegevens staan vermeld in config/config.php
			{
				include ('includes/menu.html');
			}

	?>

	<div class="overall_body">


		<?php

			if ($menu_set == 3) // gegevens staan vermeld in config/config.php
				{
					include ('templates/sidemenu.html');
				}

		?>



		<div id="body">
			
        
        	<div class="admin_menu">
        		Hier komt het sub menu.
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
?>
<form name="newad" enctype="multipart/form-data" action="?lang=<?php echo $lang ?>&amp;action=member&amp;process=upload" method="post">
	<table>
    	<tr>
        	<td>
				Title: 
            </td>
            <td>
                <input name="title" type="text" size="42" /><br />
            </td>
       </tr>
       <tr>
			<td>
            	Enter your text:
            </td>
       </tr>
       <tr>
       		<th colspan="2">
            	<textarea name="text" cols="44" rows="12"></textarea>
            </th>
       
       </tr>
       <tr>
        	<td>
				Choose a file: 
            </td>
            <td>
                <input name="image" type="file" size="28"/><br />
            </td>
       </tr>
       <tr>
       		<th colspan="2">
            	<input type="reset" value="Herstel" />
				<input name="submit" type="submit" value="Upload Info" />
            </th>
       </tr>
   </table>
  				
</form>



<?php

   	break;

	case 'upload':
		
		
			
			

	
			$title	=	$_POST['title'];
			$stamp	=	time();
			$text	=	$_POST['text'];
	
	
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
							echo '<h1>Unknown extension!</h1>';
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
										echo '<h1>You have exceeded the size limit!</h1>';
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
										echo '<h1>Copy unsuccessfull!</h1>';
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

$sql1 = "INSERT INTO picture (image,stamp) VALUES ('" . $image_name . "','" . $stamp . "')";
		mysql_query($sql1);
		
$sql2 = "INSERT INTO text (title, text, stamp) VALUES ('" . $title . "','" . $text . "','" . $stamp . "')";
		mysql_query($sql2);

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
			header ('location: home.php');
		}


		break;

		case 'show':	
		

						
					

		
			
		
		break;

		case 'deletecheck':
		
		
		
		
		
		break;
   
	}//end the switch

?>
        	</div>
	</div>

<?php

	if ($menu_set == 2) // gegevens staan vermeld in config/config.php
		{
			include ('templates/sidemenu.html');
		}

?>

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
 								print(
					
										'<div id="logcontainer">
 											<h3 class="red">
    											Error
   						 					</h3>
    										<table class="done">
    											<tr>
        											<td>
    													You did not complete all of the required fields.
            										</td>
        										</tr>
        										<tr>
        											<td>
        												Please try again.
            										</td>
        										</tr>
    										</table>
 										</div>
										</body>
										</html>');

  
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
								print(
					
										'<div id="logcontainer">
 											<h3 class="red">
    											Error
   						 					</h3>
    										<table class="done">
    											<tr>
        											<td>
    													That user does not exist in our database.
            										</td>
        										</tr>
        										<tr>
        											<td>
        												Please register first.
            										</td>
        										</tr>
    										</table>
 										</div>
										</body>
										</html>');

  
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
											print(
					
										'<div id="logcontainer">
 											<h3 class="red">
    											Error
   						 					</h3>
    										<table class="done">
    											<tr>
        											<td>
    													Incorrect password.
            										</td>
        										</tr>
        										<tr>
        											<td>
        												Please try again.
            										</td>
        										</tr>
    										</table>
 										</div>
										</body>
										</html>');

  
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
            									<b>Username:</b>
            								</td>
            								<td>
            									<input name="username" type="text" />
            								</td>
										</tr>
    									<tr>
        									<td>
            									<b>Password:</b>
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
					print(
					
							'<div id="logcontainer">
 								<h3 class="red">
    								Error
   						 		</h3>
    							<table class="done">
    								<tr>
        								<td>
											<b>
    											You can not register for this website.
											</b>
            							</td>
        							</tr>
    							</table>
 							</div>
							</body>
							</html>');

  
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
									print(
											'<div id="logcontainer">
 												<h3 class="red">
    												Error
   						 						</h3>
    											<table class="done">
    												<tr>
        												<td>
    														You did not complete all of the required fields.
            											</td>
        											</tr>
        											<tr>
        												<td>
        													Please try again.
            											</td>
        											</tr>
    											</table>
 											</div>'
										);

  
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
 									print(
											'<div id="logcontainer">
 												<h3 class="red">
    												Error
   						 						</h3>
    											<table class="done">
    												<tr>
        												<td>
    														Sorry, the username '.$login.' is invalid.
            											</td>
        											</tr>
        											<tr>
        												<td>
        													Please choose a different name.
            											</td>
        											</tr>
    											</table>
 											</div>'
										);

  
  										header("Refresh: 3; URL=\"?action=reg\"");
       									exit;

 								}
			
 							// this makes sure both passwords entered match
 							if ($pass1 != $pass2)
								{
 									print(
											'<div id="logcontainer">
 												<h3 class="red">
    												Error
   						 						</h3>
												<table class="done">
													<tr>
        												<td>
    														Sorry the passwords didn\'t match.
            											</td>
        											</tr>
        											<tr>
        												<td>
        													Please try again.
            											</td>
        											</tr>
    											</table>
 											</div>'
										);

  
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

 							print
								(
                    				'<div id="logcontainer">
 										<h3>
    										Registered
    									</h3>
    									<table class="done">
    										<tr>
        										<td>
    												Thank you, you have registered.
            									</td>
        									</tr>
        									<tr>
        										<td>
        											You may now login.
            									</td>
        									</tr>
    									</table>
										<h6>
                        					Designed &amp; Scripted by Divigo Design.
                        				</h6>
 									</div>'
								);
									header("Refresh: 3; URL=\"?action=login\"");
       								exit;
  						}
 					else 
						{	 
?>
							 <div id="logcontainer">
 								<h3>
    								Register
    							</h3>
 								<form action="" method="post">
 									<table border="0">
 										<tr>
        									<td>
            									Username:
            								</td>
           									 <td>
 												<input type="text" name="username" maxlength="60" />
 											</td>
        								</tr>
 										<tr>
        									<td>
            									Password:
            								</td>
            								<td>
												<input type="password" name="pass" maxlength="10" />
 											</td>
 										</tr>
 										<tr>
 											<td>
 												Confirm Password:
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