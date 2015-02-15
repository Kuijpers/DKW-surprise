<?php
	
	ob_start();//this just buffers the header so that you dont recieve an error for returning to the same page

	$page_id = "Horses"; // De tekst tussen de " " moet je veranderen voor de pagina titel ( <title></title> )
	
	$data_id = "horses";
	
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
                	<a href="?action=logout">Log out</a>
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

// LIST WITH HORSES THAT ARE IN DATABASE

case 'list':
?>


<?php

include ('horses/list.php');

?>


<?php
break;

case 'add':
?>

<?php

include ('horses/add_horse_step_one.php');

?>

<?php
   	break;

case 'addhorse':
?>

<?php

include ('horses/add_horse_step_one_sql.php');

?>


<?php						
break;

case 'registration';

?>

<?php

include ('horses/add_horse_step_two.php');

?>


<?php							
break;

case 'addregistration';
?>

<?php

include ('horses/add_horse_step_two_sql.php');

?>


<?php							
break;

case 'image';
?>

<?php

include ('horses/add_horse_step_three.php');

?>

<?php
break;

case 'uploadimage':
?>

<?php

include ('horses/add_horse_step_three_sql.php');

?>

<?php						
break;

case 'info':
?>

<?php

include ('horses/add_horse_step_four.php');

?>


<?php
break;

case 'addhorseinfo':
?>

<?php

include ('horses/add_horse_step_four_sql.php');

?>


<?php
break;

// Finalize is the complete list of information that has been added. 2 more options are available: Current breeding & Offspring

case 'finalize':
?>

<?php

include ('horses/finalize.php');

?>

<?php
break;

// Change is the place where all changes take place about the selected horse.

case 'change':
?>

<?php

include ('horses/change.php');

?>


<?php
break;

case 'more':
?>	

<?php

include ('horses/more.php');

?>

<?php
break;

case 'changehorse':
?>

<?php

include ('horses/change_horse_sql.php');

?>


<?php
break;

case 'addextrareg':
?>	

<?php

include ('horses/add_extra_reg_sql.php');

?>

<?php
break;

case 'deletereg':
?>	

<?php

include ('horses/delete_reg_sql.php');

?>

<?php
break;

case 'changereg':
?>

<?php

include ('horses/change_reg.php');

?>

<?php
break;

case 'updatereg':
?>

<?php

include ('horses/change_reg_sql.php');

?>

<?php
break;

case 'horseimagedeletecheck':
?>	

<?php

include ('horses/delete_horseimage_check.php');

?>

<?php
break;

case 'horseimagedelete':
?>	

<?php

include ('horses/delete_horseimage_sql.php');

?>

<?php
break;

case 'horseimageadd':
?>

<?php

include ('horses/add_horseimage_sql.php');

?>

<?php						
break;

case 'mainimageupdate':
?>

<?php

include ('horses/change_mainimage_sql.php');

?>

<?php
break;

case 'horseinfodeletecheck':
?>

<?php

include ('horses/delete_horseinfo_check.php');

?> 

<?php
break;

case 'horseinfodelete':
?>	

<?php

include ('horses/delete_horseinfo_sql.php');

?>

<?php
break;

case 'horseinfoupdate':
?>

<?php

include ('horses/change_horseinfo.php');

?>

<?php
break;
       
case 'infoupdate':
?>	

<?php

include ('horses/change_horseinfo_sql.php');

?>

<?php
break;

case 'horseinfoadd':
?>

<?php

include ('horses/add_horseinfo.php');

?>

<?php
break;
     
case 'horseinfoextra':
?>

<?php

include ('horses/add_horseinfo_sql.php');

?>

<?php
break;
         
case 'deletefull':
?>	

<?php

include ('horses/delete_horse_check.php');

?>

<?php
break;
         
case 'delete':
?>	

<?php

include ('horses/delete_horse_sql.php');

?>

<?php
break;

case 'offspring':
?>	

<?php

include ('horses/add_offspring.php');

?>

<?php
break;

case 'selectlistoffspring':
?>	

<?php

include ('horses/add_offspring_list.php');

?>

<?php
break;

case 'addoffspring':
?>	

<?php

include ('horses/add_offspring_sql.php');

?>

<?php
break;

// Delete the offspring information from database

case 'deleteoffspring':
?>
	
<?php

include ('horses/delete_offspring_sql.php');

?>

<?php
break;

// Change offspring information in database

case 'changeoffspring':
?>	

<?php

include ('horses/change_offspring.php');

?>

<?php
break;

case 'updateoffspring':
?>	

<?php

include ('horses/change_offspring_sql.php');

?>

<?php
break;
            
case 'currentbreeding':
?>

<?php

include ('horses/add_breeding.php');

?>

<?php
break;

case 'selectlistbreeding':
?>

<?php

include ('horses/add_breeding_list.php');

?>

<?php
break;

case 'addbreeding':
?>

<?php

include ('horses/add_breeding_sql.php');

?>

<?php
break;
   
case 'changebreeding':
?>

<?php

include ('horses/change_breeding.php');

?>

<?php
break;
    
case 'updatebreeding':
?>	

<?php

include ('horses/change_breeding_sql.php');

?>

<?php
break;
  
case 'deletebreeding':
?>	

<?php

include ('horses/delete_breeding_sql.php');

?>

<?php
break; 
case 'results':
?>

<?php

include ('horses/add_results.php');

?>

<?php
break;

case 'addresult':
?>	

<?php

include ('horses/add_results_sql.php');

?>

<?php
break;

case 'deleteresult':
?>

<?php

include ('horses/delete_results.php');

?>

<?php
break;

case 'changeresult':
?>	

<?php

include ('horses/change_results.php');

?>

<?php
break;
 
case 'updateresult':
?>

<?php

include ('horses/change_results_sql.php');

?>

<?php
break;
 
case 'deletemultiple':
?>	

<?php
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