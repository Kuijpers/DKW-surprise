<?php

	//	Menu
$ADMMENU		=	array(
	 
	 // Main menu
	 
	 "home"				=>	"Home",
	 
	 "settings"			=>	"Settings",
	 
	 "cs"				=>	"Customer Service",
	 
	 "help"				=>	"Help",
	 
	 // Home section submenu
	 
	 "index"			=>	"Index",
	 
	 "about"			=>	"About us",
	 
	 "horses"			=>	"Horses",
	 
	 "shows"			=>	"Shows",
	 
	 "results"			=>	"Results",
	 
	 "calendar"			=>	"Calendar",
	 
	 "links"			=>	"Links",
	 
	 "media"			=>	"Media",
	 
	 "sale"				=>	"For sale",
	 
	 "contact"			=>	"Contact",
	 
	 "admin"			=>	"Admin",
	 
	 "breedingterms"	=>	"Breeding terms",
	 
	 
	);

if (isset($login) && $login)
	{
		$login = $login;
	}
else
	{
		$login = '';
	}
	
	// Form information
	
$ADM			=	array (
						   
	// Main part
	
								
	"submit"			=>	"Submit",
	
	"reset"				=>	"Reset",
	
	"yes"				=>	"Yes",
	
	"no"				=>	"No",
	
	"logout"			=>	"Log out",
	
	"tryagain"			=>	"Please try again.",
	
	"error"				=>	"Error",
	
	"user"				=>	"Username : ",
	
	"password"			=>	"Password : ",
	
	"passwordconfirm"	=>	"Confirm password : ",
	
	"nextstep"			=>	"Next step",
	
	"back"				=>	"Go back",
	
	"day"				=>	"Day",
	
	"month"				=>	"Month",
	
	"year"				=>	"Year",
	
	
	
	
	// Errors
	
	
	
	"extension"			=>	"Unknown extension ! ",
								
	"sizelimit"			=>	"You have exceeded the size limit ! ",
	
	"nosucces"			=>	"Copy unsuccessfull ! ",
	
	"noupload"			=>	"You didnt't upload an image.",
	
	"nodelete"			=>	"Previous image is not deleted.",
	
	"oneerror"			=>	"You have at least 1 error.",
	
	"nomatch"			=>	"User and password don't match.",
	
	"notcompletereq"	=>	"You did not complete all of the required fields.",
	
	"usernoexist"		=>	"That user does not exist in our database.",
	
	"passnomatch"		=>	"Sorry the passwords didn't match.",
	
	"didntfillin"		=>	"You didn't fill in : ",
	
	"didntselect"		=>	"You didn't select :",
	
	
	
	// Index and About
							   
	"title" 			=>	"Title:",
	
	"descrip" 			=>	"Description:",
	
	"fileadd"			=>	"Choose a file you like to add:",
	
	"listview"			=>	"List with items for ",
	
	"changeinfo"		=>	"Change information",
	
	"deleteinfo"		=>	"Delete information",
	
	"moreinfo"			=>	"More information",
	
	"update"			=>	"Do you want to update the picture ? ",
	
	"yesupdate"			=>	"If you selected yes for update please upload new image:",
	
	"startover"			=>	"Please start over again.",
	
	"deletecheck"		=>	"You are about to delete information from your website.
							<br />
							Please check if this is what you want to delete.",
								
	"deltitle"			=>	"Are you sure you want to delete this title: ",
	
	"dellang"			=>	"Delete all languages: ",
								
	"keepimage"			=>	"Do you want to keep the image for your gallery ? ",
	
	"noselectyes"		=>	"You didn't select yes to be sure to delete this information.",
	
	"redirect5"			=>	"You will be redirected in 5 seconds.",
	
	"infonotdeleted"	=>	"The information you selected will not be deleted.",
	
	"selectlangdelete"	=>	"Please select the languages that need to be deleted.",
	
	"keepimageoption"	=>	"With this option images will be kept.",
	
	"nolangselect"		=>	"You didn't select any language.",
	
	"plregfirst"		=>	"Please register first",
	
	"noreg"				=>	"You can not register for this website.",

	"nameinvalid"		=>	"Sorry, the username ".$login." is invalid.",
	
	"difname"			=>	"Please choose a different name.",
	
	"registered"		=>	"Registered",
	
	"tyreg"				=>	"Thank you, you have registered.",
	
	"maylog"			=>	"You may now log in.",
	
	"designandscript"	=>	"Designed &amp; Scripted by Divigo Design.",
	
	"register"			=>	"Sign up",
				 
);


$HORSE			=	array(
				
	// form information
	
	
	"call"				=>	"Callname",
	
	"full"				=>	"Fullname",
	
	"gender"			=>	"Gender",
	
	"stallion"			=>	"Stallion",
	
	"mare"				=>	"Mare",
	
	"gelding"			=>	"Gelding",
	
	"dob"				=>	"Date of birth",
	
	"sire"				=>	"Sire",
	
	"dam"				=>	"Dam",
	
	"fos"				=>	"Father of sire",
	
	"mos"				=>	"Mother of sire",
	
	"fod"				=>	"Father of dam",
	
	"mod"				=>	"Mother of dam",
	
	"color"				=>	"Color",
	
	"measuring"			=>	"Height",
	
	"measureunit1"		=>	"cm",
	
	"measureunit2"		=>	"inches",
	
	"measureunit3"		=>	"hands",
	
	"measurespot"		=>	"Measured on",
	
	"measurespot1"		=>	"Withers",
	
	"measurespot2"		=>	"Last hair of mane",
	
	
						  
						  
						  
						  
						  );






	//Date information

$DATE			=	array(
						  

	"1"					=>	"January",
	
	"2"					=>	"Februari",
	
	"3"					=>	"March",
	
	"4"					=>	"April",
	
	"5"					=>	"May",
	
	"6"					=>	"June",
	
	"7"					=>	"July",
	
	"8"					=>	"August",
	
	"9"					=>	"September",
	
	"10"				=>	"October",
	
	"11"				=>	"November",
	
	"12"				=>	"December",
						  
	 );

























?>