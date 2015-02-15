<?php  
  
#########################  
# Start Configuration #  
#########################  

$sWebsitenaam = $web; //vul hier de naam van jouw website in  

$sMail = $email; //Het e-mailadres waarnaar de mail word gestuurd. Voor meerdere adressen, scheid de emailadressen met een comma.  
$bHTML = TRUE; //Bij TRUE word er een HTML-mail gestuurd. Bij FALSE een plain-text-mail  
$sOnderwerp = $ionderwerp; //Vul hier een onderwerp in. Dit word het onderwerp wanneer er geen ondewerp is opgegeven of als $bOnderwerp op TRUE staat  
$bOnderwerp = FALSE; //TRUE als bovenstaand onderwerp altijd gebruikt zal worden. FALSE wordt er eerst gekeken of er een onderwerp in het formulier voor komt  

$bBedanktmail = TRUE; //Moet er een bedankt mailtje gestuurd worden aan die gene die verstuurde? (e-mail invoerveld is dan dus verplicht)  
$sBedanktmail = $ibedanktmail; 
 
 //de tekst van het bedank mailtje  
$sBedanktfrom = $ibedanktfrom; //vanaf welk adres moet dit bedankmailtje verstuurd worden?  
$sBedanktsubj = $ibedanktsubj; //dit is het onderwerp van het bedanktmailtje  

$bBedanktTxt = TRUE; //TRUE als onderstaande tekst als bedankje moet worden weergegeven, FALSE als er moet worden doorgestuurd naar de pagina welke hieronder is aangegeven  
$sBedanktTxt = $ibedankttext; //bedankt text  
$sBedanktURL = "";; //bedankt url  


#########################  
# End Configuration #  
#########################  

if (count($_POST) > 0)  
{  
//controleer of de $bHTML wel fatsoenlijk is ingesteld  
if(!is_bool($bHTML))  
{  
print("De configuratie is onjuist. Zorg dat je bij <font color=blue><i>$bHTML</i></font> een booleaanse waarde (TRUE of FALSE) hebt ingevuld. Letop: Hier moeten geen quotes ( \" of ') omheen!");  
exit;  
}  
$errors = array();//definieer arrray voor de errormeldingen  
$aKeys = array_keys($_POST); //pak alle arraykeys in een arraytje  
foreach($_POST as $key=>$value)  
{  
$_POST[$key] = trim($value); //maak alle waarden netjes  
}  
foreach($aKeys as $key=>$value)  
{  
$aKeys[$key]=strtolower($value);//maak alle waarden in kleine letters  
}  

$aMail = explode(",",$sMail);  
$aDomein = explode("@",$sMail[0]);  
$sDomein = $aMail[1];  

//mail detectie  
if (in_array("mail",$aKeys)) { $sFrom = $_POST['mail']; }  
elseif (in_array("email",$aKeys)) { $sFrom = $_POST['email']; }  
elseif (in_array("e-mail",$aKeys)) { $sFrom = $_POST['e-mail']; }  
elseif (in_array("1mail",$aKeys)) { $sFrom = $_POST['1mail']; }  
elseif (in_array("1email",$aKeys)) { $sFrom = $_POST['1email']; }  
elseif (in_array("1e-mail",$aKeys)) { $sFrom = $_POST['1e-mail']; }  
else  
{  
$sFrom = "postmaster@".$sDomein;  
$bBedanktmail = FALSE;  
}  

if ($bOnderwerp)  
{  
$sSubject = $sOnderwerp;  
}  
else  
{  
if (in_array("onderwerp",$aKeys)) { $sSubject = $_POST['onderwerp']; }  
elseif (in_array("subject",$aKeys)) { $sSubject = $_POST['subject']; }  
elseif (in_array("1onderwerp",$aKeys)) { $sSubject = $_POST['1onderwerp']; }  
elseif (in_array("1subject",$aKeys)) { $sSubject = $_POST['1subject']; }  
else { $sSubject = $sOnderwerp; }  
}  



//controle emailadres  
if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$",$sFrom))  
{  
$error[] = "Het email adres is incorrect.";  
}  
//check alle verplichte velden  
foreach($_POST AS $key => $value)  
{  
if(substr($key,0,1) == 1)  
{  
if (empty($_POST[$key]))  
{  
$name = substr($key,1);  
$error[] = "Het veld <i>'".$name."'</i> moet nog ingevuld worden.";  
}  
}  
}  

//als er een error was  
if (isset($error) && count($error) > 0)  
{  
//poep alle errors uit  
print("<ul style=\"list-style: none; color: red;\">\n");  
foreach($error as $value)  
{  
print("\t<li>".$value."</li>\n");  
}  
print("</ul>");  
}  
else  
{  
$headers = "MIME-Version: 1.0\n";  
$headers .= "From: ".$sWebsitenaam." <".$sFrom.">\n";  
$headers .= "Reply-to: ".$sWebsitenaam." <noreply@".$sDomein.">\n";  
$headers .= ($bHTML) ? "Content-Type: text/html; charset=iso-8859-1\n" : "Content-Type: text/plain; charset=iso-8859-1\n";  

$sContent = "Dit is een automatisch gegenereerd e-mailbericht die vanaf je site is verstuurd.\n\n";  
foreach($_POST as $key => $value)  
{  
if (substr($key,0,1) == 1) { $key = substr($key,1); }  
$sContent .= ucfirst(strtolower($key)).": ".$value."\n\n";  
}  
$sContent .= "IP: ".$_SERVER['REMOTE_ADDR']."\n\n";  
$sContent .= "Tijdstip: ".date("D j M, Y G:i")."\n\n";  

$enter = "  
";  
$sContent = ($bHTML) ? nl2br(htmlspecialchars($sContent)) : str_replace("\n",$enter,$sContent) ;  

foreach ($aMail as $sMailAdress)  
{  
mail(trim($sMailAdress),$sSubject,$sContent,$headers);  
}  

if ($bBedanktmail)  
{  
$sBedanktmail = ($bHTML) ? nl2br(htmlspecialchars($sBedanktmail)) : str_replace("\n",$enter,$sBedanktmail) ;  
mail($sFrom,$sBedanktsubj,$sBedanktmail,$headers);  
}  



if (isset($bBedanktTxt) && $bBedanktTxt == TRUE)  
{  
print($sBedanktTxt);  
}  
else  
{  
ob_clean();  
header("location: $sBedanktURL");  
print('<meta http-equiv=refresh content="0; url='.$sBedanktURL.'">');  
}  
}  
}  
else  
{  
print("<form action=\"".$_SERVER['REQUEST_URI']."\" method=\"post\"/>\n"); ?>  

<?php } ?> 

