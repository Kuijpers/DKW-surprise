<?php
	
	ob_start();//this just buffers the header so that you dont recieve an error for returning to the same page

	$page_id = "Contact"; // De tekst tussen de " " moet je veranderen voor de pagina titel ( <title></title> )
	
	$section_id	=	"Settings";	// Hiermee bepaal je onder welke noemer de pagina valt.
	
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
				if ($section_id == "Settings")
					{
						include ('includes/submenu_settings.html');
					}

			?>
            <span class="submenu_right">&nbsp;</span>
        </div>
        
        <div class="time">
                	<a href="?action=logout">Log out</a>
        </div>

		<div id="body">
        	<div class="body">
				<div class="admin_menu">
        			<?php
						if ( $page_id !== "Settings")
							{
								include ('includes/settingmenu.html');
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
    
			
			$tablename	=	"general_contact";
			
			$sql ="SELECT * FROM ".$tablename." ";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					echo "No records available";
					else
						{
						$info = mysql_fetch_array( $data );	
								
								$stable			=	$info['stable'];
								$name			=	$info['name'];
								$adres			=	$info['adres'];
								$postcode		=	$info['postcode'];
								$city			=	$info['city'];
								$state			=	$info['state'];
								$country		=	$info['country'];
								$tel			=	$info['tel'];
								$cell			=	$info['cell'];
								$fax			=	$info['fax'];
								$email			=	$info['email'];
								$web			=	$info['web'];
								$contactdetails	=	$info['contactdetails'];
								$contactform	=	$info['contactform'];
						}
?>
<table>
	<tr>
    	<td>
        	<h4>
            	Current information
            </h4>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $stable ; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $name ; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $adres ; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $postcode ; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $city ; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $state ; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $country ; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $tel ; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $cell ; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $fax ; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $email ; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php echo $web ; ?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php 	if ($contactdetails == "1") { echo "Your contact details will be shown on the website" ;} 
					else { echo "Your contact details will not be shown on the website" ;} 
			?>
        </td>
    </tr>
	<tr>
    	<td>
        	<?php 	if ($contactform == "1") { echo "You will have a contact form on your website" ;} 
					else { echo "You will not have a contact form on your website" ;} 
			?>
        </td>
    </tr>

</table>


	
<?php
break;


case 'add':
?>               
<form name="newad" enctype="multipart/form-data" action="?action=member&amp;process=addinfo" method="post">               
        			<table>
                    	<tr>
                    		<th colspan="3">
                            	<h4>
                            		Hier komt de contact informatie:
                                </h4>
                            </th>
                        </tr>
                        <tr>
                        	<td>
                            	Stalnaam
                            </td>
                            <td>
                            	:
                            </td>
                            <td>
                            	<input name="stable" type="text" size="50" />
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Naam
                            </td>
                            <td>
                            	:
                            </td>
                            <td>
                            	<input name="name" type="text" size="50" />
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Adres
                            </td>
                            <td>
                            	:
                            </td>
                            <td>
                            	<input name="adres" type="text" size="50" />
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Postcode
                            </td>
                            <td>
                            	:
                            </td>
                            <td>
                            	<input name="postcode" type="text" size="50" />
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Plaats
                            </td>
                            <td>
                            	:
                            </td>
                            <td>
                            	<input name="city" type="text" size="50" />
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Staat/ provincie
                            </td>
                            <td>
                            	:
                            </td>
                            <td>
                            	<input name="state" type="text" size="50" />
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Land
                            </td>
                            <td>
                            	:
                            </td>
                            <td>
                            	<input name="country" type="text" size="50" />
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Tel
                            </td>
                            <td>
                            	:
                            </td>
                            <td>
                            	<input name="tel" type="text" size="50" />
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Cell
                            </td>
                            <td>
                            	:
                            </td>
                            <td>
                            	<input name="cell" type="text" size="50" />
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Fax
                            </td>
                            <td>
                            	:
                            </td>
                            <td>
                            	<input name="fax" type="text" size="50" />
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Email
                            </td>
                            <td>
                            	:
                            </td>
                            <td>
                            	<input name="email" type="text" size="50" />
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	Website
                            </td>
                            <td>
                            	:
                            </td>
                            <td>
                            	<input name="web" type="text" size="50" />
                            </td>
                        </tr>
                        <tr>
                        	<th colspan="3">
                            	Do you want contact details on the website :
                            </th>
                            <td>
                            	<input name="contactdetails" type="radio" value="1" checked="checked" /> Yes
                                <input name="contactdetails" type="radio" value="0" /> No
                            </td>
                        </tr>
                        <tr>
                        	<th colspan="3">
                            	Do you want a contactform on the website :
                            </th>
                            <td>
                            	<input name="contactform" type="radio" value="1" checked="checked" /> Yes
                                <input name="contactform" type="radio" value="0" /> No
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<input name="submit" type="submit" value="Update info" />
                            </td>
                        </tr>
                    </table>
</form>               
                    
<?php

break;


case 'addinfo':

								$stable			=	$_POST['stable'];
								$name			=	$_POST['name'];
								$adres			=	$_POST['adres'];
								$postcode		=	$_POST['postcode'];
								$city			=	$_POST['city'];
								$state			=	$_POST['state'];
								$country		=	$_POST['country'];
								$tel			=	$_POST['tel'];
								$cell			=	$_POST['cell'];
								$fax			=	$_POST['fax'];
								$email			=	$_POST['email'];
								$web			=	$_POST['web'];
								$contactdetails	=	$_POST['contactdetails'];
								$contactform	=	$_POST['contactform'];


							$stable			=	mysql_real_escape_string($stable);
							$name			=	mysql_real_escape_string($name);
							$adres			=	mysql_real_escape_string($adres);
							$postcode		=	mysql_real_escape_string($postcode);
							$city			=	mysql_real_escape_string($city);
							$state			=	mysql_real_escape_string($state);
							$country		=	mysql_real_escape_string($country);
							$tel			=	mysql_real_escape_string($tel);
							$cell			=	mysql_real_escape_string($cell);
							$fax			=	mysql_real_escape_string($fax);
							$email			=	mysql_real_escape_string($email);
							$web			=	mysql_real_escape_string($web);


$sql = "INSERT INTO general_contact (stable, name, adres, postcode, city, state, country, tel, cell, fax, email, web, contactdetails, contactform) 
	VALUES ('" . $stable . "','" . $name . "','" . $adres . "','" . $postcode . "','" . $city . "','" . $state . "','" . $country . "','" . $tel . "','" . $cell . "','" . $fax . "','" . $email . "','" . $web . "','" . $contactdetails . "','" . $contactform . "')";
			
	echo $sql;
	
	mysql_query($sql);
	header ('location: home_horses.php?action=member');



break;


case 'change':

			$tablename	=	"general_contact";
			
			$sql ="SELECT * FROM ".$tablename." ";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					echo "No records available";
					else
						{
						$info = mysql_fetch_array( $data );	
								
								$id				=	$info['id'];
								$stable			=	$info['stable'];
								$name			=	$info['name'];
								$adres			=	$info['adres'];
								$postcode		=	$info['postcode'];
								$city			=	$info['city'];
								$state			=	$info['state'];
								$country		=	$info['country'];
								$tel			=	$info['tel'];
								$cell			=	$info['cell'];
								$fax			=	$info['fax'];
								$email			=	$info['email'];
								$web			=	$info['web'];
								$contactdetails	=	$info['contactdetails'];
								$contactform	=	$info['contactform'];
								
							$stable			=	stripslashes($stable);
							$name			=	stripslashes($name);
							$adres			=	stripslashes($adres);
							$postcode		=	stripslashes($postcode);
							$city			=	stripslashes($city);
							$state			=	stripslashes($state);
							$country		=	stripslashes($country);
							$tel			=	stripslashes($tel);
							$cell			=	stripslashes($cell);
							$fax			=	stripslashes($fax);
							$email			=	stripslashes($email);
							$web			=	stripslashes($web);
						}
?>
<form name="newad" enctype="multipart/form-data" action="?action=member&amp;process=updateinfo" method="post">
<table>
	<tr>
    	<td>
        	Stalnaam :
        </td>
    	<td>
        	<input name="stable" type="text" size="50" value="<?php echo $stable ; ?>"/>
        </td>
    </tr>
	<tr>
    	<td>
        	Naam :
        </td>
    	<td>
        	<input name="name" type="text" size="50" value="<?php echo $name ; ?>"/>
        </td>
    </tr>
	<tr>
    	<td>
        	Adres :
        </td>
    	<td>
        	<input name="adres" type="text" size="50" value="<?php echo $adres ; ?>"/>
        </td>
    </tr>
	<tr>
    	<td>
        	Postcode :
        </td>
    	<td>
        	<input name="postcode" type="text" size="50" value="<?php echo $postcode ; ?>"/>
        </td>
    </tr>
	<tr>
    	<td>
        	Stad :
        </td>
    	<td>
        	<input name="city" type="text" size="50" value="<?php echo $city ; ?>"/>
        </td>
    </tr>
	<tr>
    	<td>
        	State / provincie :
        </td>
    	<td>
        	<input name="state" type="text" size="50" value="<?php echo $state ; ?>"/>
        </td>
    </tr>
	<tr>
    	<td>
        	Land :
        </td>
    	<td>
        	<input name="country" type="text" size="50" value="<?php echo $country ; ?>"/>
        </td>
    </tr>
	<tr>
    	<td>
        	Tel :
        </td>
    	<td>
        	<input name="tel" type="text" size="50" value="<?php echo $tel ; ?>"/>
        </td>
    </tr>
	<tr>
    	<td>
        	Cell :
        </td>
    	<td>
        	<input name="cell" type="text" size="50" value="<?php echo $cell ; ?>"/>
        </td>
    </tr>
	<tr>
    	<td>
        	Fax :
        </td>
    	<td>
        	<input name="fax" type="text" size="50" value="<?php echo $fax ; ?>"/>
        </td>
    </tr>
	<tr>
    	<td>
        	Email :
        </td>
    	<td>
        	<input name="email" type="text" size="50" value="<?php echo $email ; ?>"/>
        </td>
    </tr>
	<tr>
    	<td>
        	Website :
        </td>
    	<td>
        	<input name="web" type="text" size="50" value="<?php echo $web ; ?>"/>
        </td>
    </tr>
	<tr>
    	<th colspan="2">
        	Do you want contact details on the website :
        </th>
    	<td>
        	<input name="contactdetails" type="radio" value="1" <?php if ($contactdetails == "1") echo "checked='checked'"; ?> /> Yes
           	<input name="contactdetails" type="radio" value="0" <?php if ($contactdetails !== "1") echo "checked='checked'"; ?>/> No
        </td>
    </tr>
	<tr>
    	<th colspan="2">
        	Do you want a contactform on the website :
        </th>
    	<td>
        	<input name="contactform" type="radio" value="1" <?php if ($contactform == "1") echo "checked='checked'"; ?> /> Yes
           	<input name="contactform" type="radio" value="0" <?php if ($contactform !== "1") echo "checked='checked'"; ?>/> No
        </td>
    </tr>
	<tr>
    	<td>
        	<input name="id" type="hidden" value="<?php echo $id ; ?>" />
        	<input name="submit" type="submit" value="Update info" />
        </td>
    </tr>
</table>
</form>



<?php

break;

case 'updateinfo':

								$tablename	=	"general_contact";
								
								$id				=	$_POST['id'];
								$stable			=	$_POST['stable'];
								$name			=	$_POST['name'];
								$adres			=	$_POST['adres'];
								$postcode		=	$_POST['postcode'];
								$city			=	$_POST['city'];
								$state			=	$_POST['state'];
								$country		=	$_POST['country'];
								$tel			=	$_POST['tel'];
								$cell			=	$_POST['cell'];
								$fax			=	$_POST['fax'];
								$email			=	$_POST['email'];
								$web			=	$_POST['web'];
								$contactdetails	=	$_POST['contactdetails'];
								$contactform	=	$_POST['contactform'];


							$stable			=	mysql_real_escape_string($stable);
							$name			=	mysql_real_escape_string($name);
							$adres			=	mysql_real_escape_string($adres);
							$postcode		=	mysql_real_escape_string($postcode);
							$city			=	mysql_real_escape_string($city);
							$state			=	mysql_real_escape_string($state);
							$country		=	mysql_real_escape_string($country);
							$tel			=	mysql_real_escape_string($tel);
							$cell			=	mysql_real_escape_string($cell);
							$fax			=	mysql_real_escape_string($fax);
							$email			=	mysql_real_escape_string($email);
							$web			=	mysql_real_escape_string($web);


$sql = "UPDATE ".$tablename." SET stable = '".$stable."', 
									name = '".$name."', 
									adres = '".$adres."', 
									postcode = '".$postcode."', 
									city = '".$city."', 
									state = '".$state."', 
									country = '".$country."', 
									tel = '".$tel."', 
									cell = '".$cell."', 
									fax = '".$fax."', 
									email = '".$email."', 
									web = '".$web."', 
									contactdetails = '".$contactdetails."', 
									contactform = '".$contactform."' 
									WHERE `id` = ".$id.";";
				
				//echo $sql;
				mysql_query ($sql);
				
				header("Refresh: 0; URL=\"?action=member\"");



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