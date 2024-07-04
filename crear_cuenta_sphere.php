<?php /*header('Content-Type: text/html; charset=utf8'); error_reporting(E_ERROR | E_WARNING | E_PARSE); */?>


<?php

/*
 * PHP Account Creator v 1.3
 * for use with the Sphere Ultima Online emulator version 55i
 *
 * (c) 2003 Ron Custer
 *
 *
 * Adaptado para UA-Sphere por Azoun y Terrikate.
 *
 */

$token = array("a","b","c","d","e","f","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","0","1","2","3","4","5","6","7","8","9");
srand(); //Inicializamos el generador de semillas.
$pzzwurt = $token[rand(0, 34)] . $token[rand(0, 34)] . $token[rand(0, 34)] . $token[rand(0, 34)] . $token[rand(0, 34)] . $token[rand(0, 34)]; // generate password
$emails = array("ytjtyu@baflsgls.com");

//Si queremos hacer autenticas animaladas con la pass recomiendo usar la funcion md5().

include "config_new.php";

// Start security patch
if (ini_get('register_globals')){
	ini_set("register_globals",0);
}

if ($estado){
}else{
	echo "<p>El Sistema de Creación de Cuentas está inactivo temporalmente.</p>";
	echo "<p>Atentamente el Staff de Ultima Alianza.</p>";
	exit;
}

if ((isset($_GET['username']))||(isset($_GET['email']))||(isset($_GET['password']))){
   if ($keeplog){
	$time = date("Y/m/d H:i:s");
	if (getenv('HTTP_X_FORWARDED_FOR')) {
  		$ip = getenv('HTTP_X_FORWARD_FOR');
	} else {
		$ip = getenv('REMOTE_ADDR');
	}
     $fd = fopen ("$logfile", "a+");
     fwrite ($fd,"Hacking attempt detected on " . $time . " by " . $ip . "\n");
     exit;
   }
   exit;
}
// End security patch

@$cuentaaz =$_POST['account'];
@$email = $_POST['email'];
@$email2= $_POST['email2'];

$i=0;
if (isset($_POST['account'])){
	$time = date("Y/m/d H:i:s");
	if (getenv('HTTP_X_FORWARDED_FOR')) {
  		$ip = getenv('HTTP_X_FORWARD_FOR');
	}
	else {
		$ip = getenv('REMOTE_ADDR');
	}

    // Get all accounts out of accounts.scp and put them into $cuentaazs

 if (($cuentaaz=="")||($email=="")){
    die("<B>Debes rellenar todos los campos.</B><br/><a href='crear_cuenta.php'>Volver atrás</a>");
 } else {

	$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
	for ($i=0; $i<strlen($cuentaaz); $i++){
     if (strpos($permitidos, substr($cuentaaz,$i,1))===false){
        die("<B>Has utilizado caracters no permitidos.</B><br/><a href='crear_cuenta.php'>Volver atrás</a>");
     }
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("<B>El formato del e-mail es incorrecto.</B><br/><a href='crear_cuenta.php'>Volver atrás</a>");
    }
    //NUEVO
    if ($email!=$email2){
    	 die("<B>Los campos de 'Correo Asociado' no coinciden</B><br/><a href='crear_cuenta.php'>Volver atrás</a>");
    }
	//NUEVO
    while ($i<count($bannedhosts)){
      if (stristr($email,$bannedhosts[$i])){
            die("<B>Lo siento, no se aceptan cuentas desde $bannedhosts[$i].</B><br/><a href='crear_cuenta.php'>Volver atrás</a>");
      }
      $i++;
    }

 }

 $cuentaaz = strtolower($cuentaaz); // lowercase entered account
 $cuentaaz = "$num_login$cuentaaz"; // Añadimos Numero Login
 $cuentaaz = str_replace(" ","",$cuentaaz); // remove spaces

 $i = 0;

 // read existing accounts into $cuentaazs
 $fd = file ($sphereaccu);
 while ($i<count($fd)){
  if (stristr($fd[$i], "[")){
     $fd[$i]=trim($fd[$i]);
     $fd[$i]=strtolower($fd[$i]);
     array_push ($cuentaazs, $fd[$i]);
  }
 $i++;
 }

 // read existing emails into $emails
 $i=0;
 while ($i<count($fd)){
  if (stristr($fd[$i], "TAG.EMAIL=")){
     $fd[$i]=trim($fd[$i]);
     $fd[$i]=strtolower($fd[$i]);
     array_push ($emails, $fd[$i]);
  }
 $i++;
 }

 // read accounts awaiting to be activated into $cuentaazs
 $fd = file ($sphereacct);
 $i=0;
 while ($i<count($fd)){
  if (stristr($fd[$i], "[")){
     $fd[$i]=trim($fd[$i]);
     $fd[$i]=strtolower($fd[$i]);
     array_push ($cuentaazs, $fd[$i]);
  }
 $i++;
 }

 // read more emails into $emails
 $i=0;  // reset counter for next file
 while ($i<count($fd)){
  if (stristr($fd[$i], "TAG.EMAIL=")){
     $fd[$i]=trim($fd[$i]);
     $fd[$i]=strtolower($fd[$i]);
     array_push ($emails, $fd[$i]);
  }
 $i++;
 }

 // Leemos IPs
 $fd = file ($datos);
 $i=0;
 while ($i<count($fd)){
  $fd[$i]=trim($fd[$i]);
  $fd[$i]=strtolower($fd[$i]);
  array_push ($ips, $fd[$i]);
  $i++;
 }

 // look for entered account IP
 $b=0;
 $result=1;
 /*while ($b<count($ips)){
 $ips2="$ip";
  	if ($ips[$b]==$ips2){
      $b=count($ips)+1;
      $result=0;
      echo "$error_ip";
 	  exit; //La IP ya existe, asi que salimos del script para que no la cree.
    }else{
      $b++;
    }
 }*/

  // look for entered account name
 $b=0;
 while ($b<count($cuentaazs)){
 $cuentaaz2="[" . $cuentaaz . "]";
 if ($cuentaazs[$b]==$cuentaaz2){
     $b=count($cuentaazs)+1;
     $result=0;
     echo "$error_account";
	 exit; //La cuenta ya existe, asi que salimos del script para que no la cree.
   }else{
       $b++;
   }
 }

 // check emails :)
 $b=0;
 $result=1;
 while ($b<count($emails)){
 $email2="TAG.EMAIL=" . $email . "";
 if ($emails[$b]==$email2){
     $b=count($emails)+1;
     $result=0;
     echo "$error_email";
	 exit; //El EMAIL es no utilizable, asi que salimos del script para que no la cree.
    }else{
       $b++;
    }
 }
 // For ($i=0; $i<10; $i++){
 //	echo "" . $ips[$i] . "";
 // }

 if ($result){
   $fd = fopen ($sphereacct, "a+");
   fwrite ($fd,"\n[" . $cuentaaz . "]\n");
   fwrite ($fd,"PRIV=01000\n");
   fwrite ($fd,"PASSWORD=" . $pzzwurt . "\n");
   fwrite ($fd,"TAG.EMAIL=" . $email . "\n");
   fwrite ($fd,"FIRSTCONNECTDATE=" . $time . "\n");
   fwrite ($fd,"FIRSTIP=" . $ip . "\n");
   fwrite ($fd,"LASTCONNECTDATE=" . $time . "\n");
   fwrite ($fd,"\n");
   if ($useemail){
   	 print_email();
     //mail("$email","[$shardname] Creación de cuenta ($time)","$email_body","Content-type: text/html\n","From: $shardname <$shardemail>");
   }
   if ($keeplog){
     $fd = fopen ("$logfile", "a+");
     fwrite ($fd,"+ Cuenta " . $cuentaaz . " con el email " . $email . " creada el " . $time . " por " . $ip ."\n");
   }
   if ($limite_ip){
   	 $fd = fopen ("$datos", "a+");
	 fwrite ($fd,"$ip\n");
   }
   //CONTADOR
    $num_cuentas++;
    $fd = fopen ($contador, "r+");
   	fwrite ($fd,"$num_cuentas");
    fclose($fd);
   print_sucess();
 } else {
   print_form();
 }

}else{
 print_form();
}

?>