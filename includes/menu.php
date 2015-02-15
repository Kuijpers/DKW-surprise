<div class="topmenu">
<ul id="nav">
	<li class="top">
		<a href="index.php?lang=<?php echo $lang ?>" class="top_link"><span><?php echo $MM_home ;?></span></a>
	</li>
	<li class="top">
		<a href="about.php?lang=<?php echo $lang ?>" class="top_link"><span class="down"><?php echo $MM_about ;?></span></a>
	</li>
	<li class="top">
		<a href="#" class="top_link"><span class="down"><?php echo $MM_horses ;?></span></a>
			<ul class="sub">
            <?php
			
								$tablename	=	"horses";
			
			$sql ="SELECT * FROM ".$tablename." WHERE gender=1 AND ( sale=0 OR sale=1 ) ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					{}
					else
					{
						?>
				<li>
					<a href="#" class="fly"><?php echo $MM_stallions ;?></a>
						<ul>
               <?php         	
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$fullname	=	stripslashes($fullname);
							$stamp 		= $info['stamp'];
?>
                        			<li>
                        				<a href="horses.php?lang=<?php echo $lang ;?>&amp;stamp=<?php echo $stamp ;?>"><?php echo $fullname ; ?></a>
                        			</li>                   
 <?php
						}
?>
                        </ul>
				</li>
<?php
					}
					  
					  
?>
            <?php
			
								$tablename	=	"horses";
			
			$sql ="SELECT * FROM ".$tablename." WHERE gender=2 AND ( sale=0 OR sale=1 ) ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					{}
					else
					{
						?>
				<li>
					<a href="#nogo3.1" class="fly"><?php echo $MM_mares ;?></a>
						<ul>
               <?php         	
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$fullname	=	stripslashes($fullname);
							$stamp 		= $info['stamp'];
?>
                        			<li>
                        				<a href="horses.php?lang=<?php echo $lang ;?>&amp;stamp=<?php echo $stamp ;?>"><?php echo $fullname ; ?></a>
                        			</li>                   
 <?php
						}
?>
                        </ul>
				</li>
<?php
					}
					  
					  
?>
            <?php
			
								$tablename	=	"horses";
			
			$sql ="SELECT * FROM ".$tablename." WHERE gender=3 AND ( sale=0 OR sale=1 ) ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					{}
					else
					{
						?>
				<li>
					<a href="#nogo3.1" class="fly"><?php echo $MM_geldings ;?></a>
						<ul>
               <?php         	
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$fullname	=	stripslashes($fullname);
							$stamp 		= $info['stamp'];
?>
                        			<li>
                        				<a href="horses.php?lang=<?php echo $lang ;?>&amp;stamp=<?php echo $stamp ;?>"><?php echo $fullname ; ?></a>
                        			</li>                   
 <?php
						}
?>
                        </ul>
				</li>
<?php
					}
					  
					  
?>
            <?php
			
								$tablename	=	"horses";
								$year		=	date("Y");
			
			$sql ="SELECT * FROM ".$tablename." WHERE dobyear=$year ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					{}
					else
					{
						?>
				<li>
					<a href="#nogo3.1" class="fly"><?php echo $MM_foals ;?></a>
						<ul>
               <?php         	
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$fullname	=	stripslashes($fullname);
							$stamp 		= $info['stamp'];
?>
	
                        
                        
                        	<li>
                        		<a href="horses.php?lang=<?php echo $lang ;?>&amp;stamp=<?php echo $stamp ;?>"><?php echo $fullname ; ?></a>
                        	</li>
                            
                            
 <?php
						}
?>
                        </ul>
				</li>
<?php
					}
					  
					  
?>
			</ul>
	</li>
<!--
    <li class="top">
		<a href="#" class="top_link"><span><?php echo $MM_shows ;?></span></a>
	</li>
-->
<!--
 	<li class="top">
		<a href="#" class="top_link"><span><?php echo $MM_agenda ;?></span></a>
	</li>
-->
<!--
    <li class="top">
		<a href="#" class="top_link"><span><?php echo $MM_links ;?></span></a>
	</li>
-->
    <li class="top">
		<a href="#" class="top_link"><span><?php echo $MM_media ;?></span></a>
        <ul class="sub">
        	<li>
            	<a href="gallery.php?lang=<?php echo $lang ?>" class="fly"><span><?php echo $MM_pictures ;?></span></a>
            </li>
<!--
            <li>
            	<a href="#" class="top_link"><span><?php echo $MM_video ;?></span></a>
            </li>
-->
<!--
            <li>
            	<a href="#" class="top_link"><span><?php echo $MM_inmedia ;?></span></a>
            </li>
-->
        </ul>
	</li>
    <li class="top">
		<a href="#" class="top_link"><span><?php echo $MM_sale ;?></span></a>
        <ul class="sub">
         <?php
			
								$tablename	=	"horses";
			
			$sql ="SELECT * FROM ".$tablename." WHERE sale=1 OR sale=2 ORDER BY id ASC";
    				$data = mysql_query($sql);
					if (mysql_num_rows($data)==0)
					{}
					else
					{
						?>
				<li>
					<a href="#" class="fly"><?php echo $MM_horses ;?></a>
						<ul>
               <?php         	
					//here is the loop using the statement above
					while($info = mysql_fetch_array( $data ))
						{
							$id			=	$info['id'];
							$fullname 	= 	$info['fullname'];
							$fullname	=	stripslashes($fullname);
							$stamp 		= 	$info['stamp'];
							$sale		=	$info['sale'];
							$sold_date	=	$info['sold_date'];
							
?>
	
                        
                        
                        	<li>
                        		<a href="horses.php?lang=<?php echo $lang ;?>&amp;stamp=<?php echo $stamp ;?>"><?php echo $fullname ; ?></a>
                        	</li>
                            
                            
 <?php
						}
?>
                        </ul>
				</li>
<?php
					}
					  
					  
?>	
        </ul>
	</li>
	<li class="top">
		<a href="contact.php" class="top_link"><span><?php echo $MM_contact ;?></span></a>
	</li>
</ul>
</div>