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
        <form action="auth" method="post">
          <div class="user-box">
            <input type="text" name="username" required="">
            <label>Nome de Usuário</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" required="">
            <label>Senha</label>
          </div>
        </form>
        <img src="<?php echo $g->getUrl('otpProject1010', 'otpProject1010.com', $secret) ?>" />
        <input type="submit" name="token" value="token">
        <h1>2º fator</h1>
        <form method="post">
          <input type="text" name="token"/>
          <button type="submit">Autenticar</button>
        </form>
    </div>
  </body>
</html>