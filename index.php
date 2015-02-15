<?php

	$page_id = "Index"; // De tekst tussen de " " moet je veranderen voor de pagina titel ( <title></title> )
	$image_page	=	"1"; 	// 1 = image on  page
							// 2 = text from DB on page

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

if ($image_page == "2")
{

// BEGIN VOORSTELLING
	

				$tablename	=	"".$lang."_".$page_id."";
		
			$sql ="SELECT * FROM ".$tablename." ORDER BY id ASC";
    				$data = mysql_query($sql);
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
                    		echo "<h2>";
                    			echo $title;
                    		echo "</h2>";
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

// EINDE VOORSTELLING
}

if ($image_page == "1")
{
?>
<span class="center">	
	<img src="images/index.jpg" alt="The Surprise Stables" title="The Surprise Stables" />
</span>
<?php
}

?>
   </div>
   </div>
   


</div>

<?php

include ('templates/footer.html');

?>