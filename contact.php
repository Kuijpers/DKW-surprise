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
<?php

	//$contactform = "0";
	
	//$contactdetails = "1";
?>

<?php
if ($contactform == "1" && $contactdetails == "1")
	{
		echo "<div class='halve'>";	
	}
if ($contactform !== "1" || $contactdetails !== "1")
	{
		if ($contactform == "1" || $contactdetails == "1")
			{
				echo "<div class='driekwart'>";
			}
	}
if ($contactform=="1")
{
?>

<?php
	include ('includes/contact_script.php');
?>


<table>
	<tr>
    	<th colspan="3">
        	<h4>
            	<?php echo $CONTACT['form'] ; ?>
            </h4>
        </th>
    </tr>
	<tr>
    	<th colspan="3">
            <?php echo $CONTACT['all fields'] ; ?>
        </th>
    </tr>
	<tr>
    	<td>
        	<?php echo $CONTACT['stable'] ; ?>	
        </td>
        <td>
        	:
        </td>
        <td>
        	<input name="name" type="text" size="34" />
        </td>
    </tr>
    <tr>
    	<td>
        	<?php echo $CONTACT['email'] ; ?>
        </td>
        <td>
        	:
        </td>
        <td>
        	<input name="email" type="text" size="34" />
        </td>
    </tr>
    <tr>
    	<td>
        	<?php echo $CONTACT['subject'] ; ?>
        </td>
        <td>
        	:
        </td>
        <td>
        	<input name="subject" type="text" size="34" />
        </td>
    </tr>
    <tr>
    	<td valign="top">
        	<?php echo $CONTACT['message'] ; ?>
        </td>
        <td valign="top">
        	:
        </td>
        <td>
        	<textarea name="message" cols="26" rows="10"></textarea>
        </td>
    </tr>
    <tr>
    	<td>
        	<input name="reset" type="reset" value="<?php echo $CONTACT['reset'] ; ?>" />
        </td>
        <th colspan="2">
        	<input name="submit" type="submit" value="<?php echo $CONTACT['submit'] ; ?>" />
        </th>
    </tr>
</table>



<?php
}
if ($contactform == "1" && $contactdetails == "1")
	{	
		echo "</div>";
	}
if ($contactform == "1" && $contactdetails == "1")
	{
		echo "<div class='halve'>";	
	}
if ($contactdetails=="1")
{
?>	
	
	

<table>
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
</table>




<?php
}
if ($contactform !== "1" || $contactdetails !== "1")
	{
		if ($contactform == "1" || $contactdetails == "1")
			{
				echo "</div>";
			}
	}
if ($contactform == "1" && $contactdetails == "1")
	{
		echo "</div>";
	}
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