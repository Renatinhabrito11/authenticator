<?php 
include_once 'vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';
 
$g = new \Google\Authenticator\GoogleAuthenticator();
$secret = 'XVQ2UIGO75XRUKJO';
 
$code = '#'; //código de 6 dígitos gerados pelo app do Google Authenticator
 
if($g->checkCode($secret, $code)){
	echo 'Autorizado!';
}
else{
	echo 'Código incorreto ou expirado!';
}

?>