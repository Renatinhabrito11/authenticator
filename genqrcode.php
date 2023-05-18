<?php 
include_once 'vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';

$g = new \Google\Authenticator\GoogleAuthenticator();
$secret = 'XVQ2UIGO75XRUKJO';
//Você pode usar o $g->generateSecret() para gerar o secret
//$secret = $g->generateSecret();

//o método "getUrl" recebe como parâmetro: "username", "host" e a chave "secret"
echo '<img src="'.$g->getURL('rafaelwendel', 'rafaelwendel.com', $secret).'" />';

?>