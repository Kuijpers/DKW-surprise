<?php

	$page_id = "Gallery"; // De tekst tussen de " " moet je veranderen voor de pagina titel ( <title></title> )

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
			$thumb_path		=	"album/thumbs/thumb_";
			$full_path		=	"album/";
			
			

			
			$tablename	=	"picture";
			
			$sql ="SELECT * FROM ".$tablename." WHERE gallery=1 ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
						{
							echo "<table><tr><td>";
							echo "No records available";
							echo "</td></tr></table>";
						}
					else
					{
						
?>
<table>
	
<?php

					$counter = 0;
					
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$image	 	= 	$info['image'];
							$stamp 		= 	$info['stamp'];
							
							$thumb_image	=	"".$thumb_path."".$image."";
							$full_image		=	"".$full_path."".$image."";
							
							
if($counter==0)
	{  
		echo '<tr>';							
	}
?>	
<td align="center">	
	<a href="album/<?php echo $image;?>" title="<?php echo $image;?>" rel="foto">
    	<img src="album/thumbs/thumb_<?php echo $image;?>" title="<?php echo $image;?>" alt="<?php echo $image;?>" />
    	</a>
</td>

<?php
$counter+=1;

if($counter >= 4){ 
		$counter = 0; 
		echo '</tr>';
		continue;
	}


						}
?>

</table>
	</div>
</div>
<?php
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