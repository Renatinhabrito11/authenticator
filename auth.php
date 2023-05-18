<?php 
include_once 'vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';
 
$g = new \Google\Authenticator\GoogleAuthenticator();
$secret = 'XVQ2UIGO75XRUKJO';

if(isset($_POST['token'])) {
	$token = $_POST['token'];
  
  if($g->checkCode($secret, $token)) {
    echo 'Autorizado!';
  }
  else {
    echo 'Código incorreto ou expirado!';
  }
  die();
}
?>
<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <title>google auth</title>
</head>
<body>
  <h1>2º fator</h1>
  <form method="post">
  <input type="text" name="token"/>
  <button type="submit">Autenticar</button>
  </form>
</body>
</html>
