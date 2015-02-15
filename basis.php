<?php

	$page_id = "Index"; // De tekst tussen de " " moet je veranderen voor de pagina titel ( <title></title> )

	if (!empty($_GET['stamp']))
		{
			$stamp		=	$_GET['stamp']; // Kijk of er een taal geselecteerd is
		}
	if (!empty($_POST['stamp']))
		{
			$stamp		=	$_POST['stamp']; // Kijk of er een taal geselecteerd is
		}	
	if (!empty($_GET['lang']))
		{
			$lang		=	$_GET['lang']; // Kijk of er een taal geselecteerd is
		}


include ('includes/incl.php');

include ('templates/header.html');
include ('templates/top.html');
include ('templates/lang.html');
if ($menu_set == 1) // gegevens staan vermeld in config/config.php
		{
			include ('includes/menu.php');
		}


?>

<div class="overall_body">


<!-- In dit onderstaande gedeelte komt de tekst en eventueel de foto's te staan welke je op de pagina wilt laten zien -->


   		<div id="body">
        	<div class="body_full">
<?php

// BEGIN VOORSTELLING
?>







<?php				
// EINDE VOORSTELLING
?>
   </div>
   </div>
   


</div>

<?php

include ('templates/footer.html');

?>