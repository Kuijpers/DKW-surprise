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


##### Controle of iets een integer is ##########

function validateint($inData) {
  $intRetVal = -1;

  $IntValue = intval($inData);
  $StrValue = strval($IntValue);
  if($StrValue == $inData) {
    $intRetVal = $IntValue;
  }

  return $intRetVal;
}




?>