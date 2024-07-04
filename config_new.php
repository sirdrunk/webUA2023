<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// General Configuration
// =====================
ini_set('memory_limit' ,'25M');

// Registro de IPs ? y límite cuenta por día e IP ? (Terrikate)
$limite_ip = 1;
$datos = "c:\\UA\\Servidor\\Sphere\\Oficial\\accounts\\ips.log";
$error_ip = "<p>Sólo se permite registrar una cuenta por semana e IP.</p><p>Envía un email a <a href='mailto:uasphere@ultima-alianza.com'>uasphere@ultima-alianza.com</a> si no te llega email alguno de creación de cuenta y estás viendo este mensaje. Indica un Login y un Correo electrónico al cual asociar la cuenta.</p>";
$ips= array ();

// Sistema de Encendido/Apagado
$fich_estado="c:\\UA\\Servidor\\Sphere\\Web\\cuenta\\estado.txt";
$login="c:\\UA\\Servidor\\Sphere\\Web\\cuenta\\login.txt";
$contador="c:\\UA\\Servidor\\Sphere\\Web\\cuenta\\contador.txt";
$time = date("Y/m/d H:i:s");

$fd = file ($contador);
$num_cuentas= $fd[0];
//fclose($fd);

$fd = file ($login);
$num_login=$fd[0];
//fclose($fd);

$fd = file ($fich_estado);
$estado=$fd[0];
//fclose($fd);

// Your shard's name
$shardname = "Ultima Alianza";

// Your shard's webpage
$shardweb = "https://ultima-alianza.com";

// The shard Admin's email
$shardemail = "uasphere@ultima-alianza.com";

// location to sphereaccu.scp (remember to double escape \'s (\\)
$sphereaccu = "c:\\UA\\Servidor\\Sphere\\Oficial\\accounts\\sphereaccu.scp";

// location to sphereacct.scp (remember to double escape \'s (\\)
$sphereacct = "c:\\UA\\Servidor\\Sphere\\Oficial\\accounts\\sphereacct.scp";

// keep a log file? 1=yes, 0=no
$keeplog = 1;

// Location of log file (if you are keeping one; be sure to double escape \'s (\\))
$logfile = "c:\\UA\\Servidor\\Sphere\\Oficial\\accounts\\accounts.log";

// known accounts, add to list if you have certain names you don't want used
$cuentaazs = array("[administrator]","[administrador]","[eof]","[admin]","[plevel]","[add]","[update]","[unused]","[.]","[GM]");

// On-screen error message displayed when there is an account name error
$error_account = "<p>El nombre de cuenta que has introducido no puede ser utilizado.</p>";

// On-screen error message displayed when there is an email duplication error
$error_email = "<p>El email que has introducido no puede ser utilizado.</p>";

// Email Configuration
// ===================

// use the email feature? 1 = yes, 0 = no; be sure to have your mail() function setup with PHP.
// if you are unsure how to do this, consult the documentation on php.net.
$useemail = 1;

// Array of banned email hosts.  To use, simply uncomment this variable (remove //'s) and add/remove hosts
// following the pattern as you desire.
 $bannedhosts = array("fghdfgre.net"); //Por poner algo.

// Actual body of email message, needed only if you're using email feature
//
// VARIABLES:
// $shardname = your shard's name as defined above.
// $shardweb = your shard's website as defined above.
// $cuentaaz = account name.
// $pzzwurt = system generated password.
function print_email(){
GLOBAL $pzzwurt, $cuentaaz, $email, $time, $shardname, $shardemail; // Leave this line alone as it allows you to use those two variables!!!

$email_body="<HTML>
<HEAD>
	<META HTTP-EQUIV='CONTENT-TYPE' CONTENT='text/html; charset=windows-1252'>
	<TITLE>Creación de Cuentas</TITLE>
</HEAD>
<BODY LANG='es-ES' DIR='LTR'>
<CENTER>
	<TABLE WIDTH=586 BORDER=1 BORDERCOLOR='#993300' CELLPADDING=2 CELLSPACING=3 RULES=NONE STYLE='page-break-before: always'>
		<COL WIDTH=36>
		<COL WIDTH=53>
		<COL WIDTH=451>
		<COL WIDTH=13>
		<TR>
			<TD COLSPAN=4 WIDTH=574 BORDERCOLOR='#FFFFFF'>
				<P><SPAN ID='Marco1' DIR='LTR' STYLE='float: right; width: 15.22cm; height: 0.89cm; border: none; padding: 0cm; background: #cccc00'>
					<P><FONT SIZE=7><FONT COLOR='#ffffff'>B</FONT></FONT>ienvenid@ a
					<STRONG>Ultima Alianza,</STRONG></P>
				</SPAN><BR><BR>
				</P>
				<P ALIGN=LEFT><FONT SIZE=2>La cuenta solicitada est&aacute; en
				proceso de creaci&oacute;n. Dicho proceso no suele exceder m&aacute;s de hora
				y media, si transcurrido ese tiempo ve que su cuenta no ha sido
				aun activada p&oacute;ngase en contacto con nosotros atrav&eacute;s
				de este correo electr&oacute;nico:</FONT></P>
				<P ALIGN=LEFT STYLE='margin-left: 1cm; margin-right: 1cm'><STRONG><A HREF='mailto:uasphere@ultima-alianza.com'><FONT SIZE=2 STYLE='font-size: 9pt'><FONT COLOR='#000000'>uasphere@ultima-alianza.com</FONT></FONT></A></STRONG></P>
				<P ALIGN=LEFT><FONT SIZE=2>Los datos de su cuenta son:</FONT></P>
			</TD>
		</TR>
		<TR>
			<TD ROWSPAN=3 WIDTH=36 VALIGN=TOP BORDERCOLOR='#FFFFFF'></TD>
			<TD WIDTH=53>
				<P ALIGN=LEFT><STRONG><EM><FONT SIZE=2>Login</FONT></EM></STRONG></P>
			</TD>
			<TD WIDTH=451>
				<P ALIGN=LEFT>$cuentaaz</P>
			</TD>
			<TD ROWSPAN=3 WIDTH=13 VALIGN=TOP BORDERCOLOR='#FFFFFF'></TD>
		</TR>
		<TR>
			<TD WIDTH=53>
				<P ALIGN=LEFT><STRONG><EM><FONT SIZE=2>Password</FONT></EM></STRONG></P>
			</TD>
			<TD WIDTH=451>
				<P ALIGN=LEFT>$pzzwurt</P>
			</TD>
		</TR>
		<TR>
			<TD WIDTH=53 BORDERCOLOR='#FFFFFF'>
				<P ALIGN=LEFT><STRONG><EM><FONT SIZE=2>Correo</FONT></EM></STRONG></P>
			</TD>
			<TD WIDTH=451>
				<P ALIGN=LEFT>$email</P>
			</TD>
		</TR>
		<TR>
			<TD COLSPAN=4 WIDTH=574 BORDERCOLOR='#FFFFFF'>
				<P><BR>
				</P>
				<P><FONT SIZE=2>Recuerde visitar nuestra p&aacute;gina web donde
				puede encontrar una </FONT><STRONG><FONT SIZE=2>Wiki</FONT></STRONG>
				<FONT SIZE=2>con las preguntas m&aacute;s frecuentes acerca del
				servidor, comandos del mismo, posibilidad de recuperar la clave
				de su cuenta&nbsp;y lo m&aacute;s importante los archivos
				necesarios para poder jugar. Tiene una gu&iacute;a de instalaci&oacute;n
				que se recomienda leer y seguir.</FONT>
				</P>
				<P><FONT SIZE=2>Tambi&eacute;n recomendamos que participe en los
				foros de la comunidad donde podr&aacute; obtener valiosa
				informaci&oacute;n. </FONT>
				</P>
				<P ALIGN=LEFT><FONT SIZE=2>Atentamente el Staff de Ultima Alianza. </FONT>
				</P>
				<HR>
			</TD>
		</TR>
		<TR>
			<TD COLSPAN=3 WIDTH=554 BORDERCOLOR='#FFFFFF'>
				<P ALIGN=LEFT><I><FONT SIZE=2>Web Ultima Alianza:</FONT></I><A HREF='https://ultima-alianza.com/'>
				<I><FONT SIZE=2><FONT COLOR='#800000'>https://ultima-alianza.com</FONT></FONT></I></A></P>
			</TD>
			<TD ROWSPAN=3 WIDTH=13 VALIGN=TOP BORDERCOLOR='#FFFFFF'></TD>
		</TR>
		<TR>
			<TD COLSPAN=4 WIDTH=574 BORDERCOLOR='#FFFFFF'></TD>
		</TR>
	</TABLE>
</CENTER>
<P><BR><BR>
</P>
</BODY>
</HTML>";

//mail("$email","[UA-Sphere] Creacion de cuenta","$email_body","Content-type: text/html\n","From: $shardname <$shardemail>");

	require_once("C://UA//Servidor//Sphere//Web//cuenta//phpmailer//PHPMailerAutoload.php");

	$mail = new PHPMailer();

	$mail->IsSMTP();                                      // set mailer to use SMTP
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;     // turn on SMTP authentication
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587;
	$mail->Username = "foroua@ultima-alianza.com";  // SMTP username
	$mail->Password = "ua2021ua!"; // SMTP password

	$mail->setFrom("foroua@ultima-alianza.com");
	$mail->FromName = "Cuentas UA-Sphere";

	$email=str_replace("\"","", $email);
	$mail->AddAddress($email);

	$mail->IsHTML(true);                                  // set email format to HTML
	
	$mail->Subject = "[UA] Creacion de cuenta";
	$mail->Body    = "$email_body";
	$mail->AltBody = "$email_body";
	$mail->Priority = 1;
	$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
				)
			);
			
	$mail->Send();
}

//"Bienvenido a $shardname!\n\n Account: $cuentaaz \n Password: $pzzwurt \n\n Please visit the website ($shardweb) to get the required files and information on how to connect (new player page).
//\n\n\n If you have received this message in error, it means someone is using this email address to register;  Please disregard this message and accept our apologies.";

// called when the account is created successfully, change depending on whether you're using email or not
function print_sucess(){
GLOBAL $pzzwurt, $cuentaaz; // Leave this line alone as it allows you to use those two variables!!!
?>
<p><strong>¡Bienvenid@ a Ultima Alianza: La Conquista!</strong></p>
<p>Estos son los datos de tu cuenta</p>

<?php echo "
<table border=\"0\">
  <tr>
    <td bgcolor=#CCCCCC>Login</td>
	<td>".$cuentaaz."</td>
  </tr>
  <tr>
    <td bgcolor=#CCCCCC>Password</td>
	<td>".$pzzwurt."</td>
  </tr>
</table>";?>

<p>Para poder jugar necesitas tener instalados los ficheros MulsUA, los puedes encontrar en la sección Jugar de la <a href="https://ultima-alianza.com">página web</a> del servidor.</p>

<p>Información adicional:</p>
<ul>
<li>Las cuentas se actualizan cuando se guarda el estado del juego, aproximadamente cada hora y media.</li>
<li>Una vez dentro del juego podréis cambiar la contraseña usando el comando correspondiente, mencionado en la web.</li>
<li>Si una cuenta no se utiliza en un plazo de 30 dias es borrada automáticamente.</li>
<li>Para resolver las dudas que puedas tener existe un foro llamado "<a href="https://ultima-alianza.com/foro/dudas-y-preguntas-f40/">Dudas y preguntas</a>" donde te pueden ayudar.</li>
</ul>

<!-- Google Code for CrearCuenta Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 855139307;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "SknSCJ3wpXAQ68fhlwM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/855139307/?label=SknSCJ3wpXAQ68fhlwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<?php
}

// MISC CONFIGURATION
// ==================

// function called when we first load page or when there is an error, defines the input form.
function print_form(){
?>

	<form method="post" name="signup" action="crear_cuenta.php" class="w-200">
		<div class="mb-2">
			<label>Nombre de la cuenta:</label>
			<input type="text" name="account" maxlength="14" />
		</div>
		<div class="mb-2">
			<label>Correo asociado:</label>
			<input type="text" name="email"/>
		</div>
		<div class="mb-2">
			<label>Repetir correo asociado:</label>
			<input type="text" name="email2"/>
		</div>
			<div class="text-center">
			<input type="submit" value="Crear" name="submit" class="btn btn-primary" />
		</div>
	</form>
<?php

}

?>
