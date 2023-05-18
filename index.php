<?php 
include_once 'vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';
 
$g = new \Google\Authenticator\GoogleAuthenticator();

$secret = 'XVQ2UIGO75XRUKJO';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Página de Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

    <div class="login-box">
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
        <div class="user-box">
          <input type="text" name="otp" required="">
          <label>Código OTP</label>
        </div>
        <img src="<?php echo $g->getUrl('otpProject1010', 'otpProject1010.com', $secret) ?>"/>
        <input type="submit" name="" value="token">
      </form>
    </div>
  </body>
</html>