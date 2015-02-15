
<?php	
								$stamp	=	$_POST['stamp'];

		
?>

<div class="full">
<h3> Add new information </h3>
<form name="newad" enctype="multipart/form-data" action="?action=member&amp;process=horseinfoextra" method="post">
<?php
		
		
		$dir = "./lang/";

		$dh = opendir($dir);

		while (($file = readdir($dh)) !== false) 
		{
			// Gets the File Extension
			$extension = substr($file, strrpos($file, '.'));
			
			
			// checks if the extension is .php or the file name is  . or .. if so it will be shown as an exclusion
			if($extension !== ".php" && $file !== "." && $file !== ".." && $file !== "index.html")
			
			
			
			

echo "
<fieldset>
	<legend>
		$language[$file]
		<img src='lang/$file/$file.png' alt='$language[$file]' title='$language[$file]'/>
	</legend>
	$ADM[title]
	<input name='title_$file' type='text' size='42' />
	<br />
	$ADM[descrip]
	<br />
	<textarea name='text_$file' cols='95' rows='12'></textarea>
</fieldset>";
			
		}


		closedir($dh);
?>
	<input name="stamp" type="hidden" value="<?php echo $stamp; ?>" />
<table>
	<tr>
    	<td>
        	<input type="reset" value="<?php echo $ADM['reset'];?>" />
        </td>
        <td>
        	<input type="submit" value="<?php echo $ADM['submit'];?>" />
        </td>
    </tr>
</table>

</form>
</div>

