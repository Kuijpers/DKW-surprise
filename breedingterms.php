<?php

	$page_id = "Breeding"; // De tekst tussen de " " moet je veranderen voor de pagina titel ( <title></title> )
	
	$data_id = "breedterms";

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
?>

<div class="overall_body">


<!-- In dit onderstaande gedeelte komt de tekst en eventueel de foto's te staan welke je op de pagina wilt laten zien -->


   		<div id="body">
        	<div class="body_full">
<?php

// BEGIN VOORSTELLING
?>
	<h2>
    	<?php echo $HORSE["breedingterms"] ; ?>
    </h2>


<?php
		
				$tablename	=	"".$lang."_".$data_id."";
		
			$sql ="SELECT * FROM ".$tablename." ORDER BY id ASC";
    				$data = mysql_query($sql) or die(mysql_error());
					if (mysql_num_rows($data)==0)
					echo "No records available";
					else
						
						$sidecounter = 0;
					
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data )){
						$title = $info['title'];
    					$tekst = $info['text'];
						$tekst = nl2br ($tekst);
						$stamp = $info['stamp'];{
						
						$sql2 ="SELECT * FROM picture WHERE stamp=$stamp";
    					$data2 = mysql_query($sql2);
						$info2 = mysql_fetch_array( $data2 );
						
						
						$image = $info2['image'];
						$pic_id = $info2['id'];
						
						$sidecounter++;
						$side = ($sidecounter %2 == 0) ? 'left' : 'right';
		?>
        			<div class="textfield">
        <?php
				if (!empty($title) && !empty($tekst))
					{
					if (!empty($title))
						{
                    		echo "<h3>";
                    			echo $title;
                    		echo "</h3>";
						}
						if ($image != ''){
					?>
                    
                    <span class="<?php echo $side; ?>">
                    <a href="album/<?php echo $image;?>" title="<?php echo $title;?>" rel="foto">
                    	<img src="album/thumbs/thumb_<?php echo $image;?>" title="<?php echo $title;?>" alt="<?php echo $title;?>" />
                    </a>
                    	
                    </span>
                    <?php
					
						}
					?>
                    
                    	<?php echo $tekst;?>
                    </div>
                    <div class="seperator">
                    	&nbsp;
                    </div>
        
        
<?php
						}
					}
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