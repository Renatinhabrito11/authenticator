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
    <title>Página de Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
      <h2>Autenticação em Dois Fatores</h2>
        <div class="user-box">
          <label>E-mail</label>
          <input type="text" name="username" required="">  
        </div>
        <div class="user-box">
          <label>Senha</label>
          <input type="password" name="password" required="">
        </div>
        <h1>Token de 2º fator</h1>
        <img src="<?php echo $g->getUrl('otpProject1010', 'otpProject1010.com', $secret) ?>" />
        <form action="auth" method="post">
          <input type="text" name="token"/>
          <button type="submit">Autenticar</button>
      </form>
    </div>
  </body>
</html>