<?php

#####	Voorkom SQL injecties	#####

function sql_injec ()
{
	//This stops SQL Injection in POST vars							//	
  		foreach ($_POST as $key => $value) 							//
			{														//	
    			$_POST[$key] = mysql_real_escape_string($value);	//
  			}														//	Dit gedeelte is nodig om sql injecties te voorkomen
																	//	Het zet automatisch de POST en GET om naar strings met msql real escape strings
  	//This stops SQL Injection in GET vars							//
  		foreach ($_GET as $key => $value) 							//
			{														//
    			$_GET[$key] = mysql_real_escape_string($value);		//
  			} 														//
}



// Maak een option menu voor dagen maanden en jaren

function dayselect ()
{
	for ($day=10;$day<=31;$day++)
	{
		echo "	<option value=\"$day\">$day</option> \n";	
	}
}

function monthselect ()
{
	for ($month=1;$month<=12;$month++)
	{
		echo "	<option value=\"$month\">$month</option> \n";	
	}
}

function yearselect ()
{
	$current_year = date('Y');
	$end_year = $current_year+=5; // for a different selection of years in the future adjust the five in the amount of years as desired.
	
	for ($year= date('Y');$year<=$end_year;$year++)
	{
		echo "	<option value=\"$year\">$year</option> \n";	
	}	
	
}

function yearselect_dob ()
{
	$current_year = date('Y');
	$end_year = $current_year-=35; // for a different selection of years in the past adjust the five in the amount of years as desired.
	
	for ($year= date('Y');$year>=$end_year;$year--)
	{
		echo "	<option value=\"$year\">$year</option> \n";	
	}	
	
}






?>