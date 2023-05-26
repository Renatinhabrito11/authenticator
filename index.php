<?php 
include_once 'vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';
 
$g = new \Google\Authenticator\GoogleAuthenticator();
$secret = 'XVQ2UIGO75XRUKJO';
$captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : null;

if(!is_null($captcha)){
	$res = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcH5j4mAAAAABLqX8Yv1miGGfWUEQnYsncuV_M2&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']));
	if($res->success === true){
		//CAPTCHA validado!!!
		echo 'Tudo certo =)';
	}
	else{
		echo 'Erro ao validar o captcha!!!';
	}
}
else{
	echo 'Captcha não preenchido!';
}

if(isset($_POST['token'])) {
  $token = $_POST['token'];

  if($g->checkCode($secret, $token)) {
    echo 'Autorizado!';
  }
  else {
    //
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
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <style>
    body {
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: #34495e;
}

.login-box {
  width: 280px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #fff;
}

.login-box h2 {
  text-align: center;
  font-size: 22px;
  margin-bottom: 20px;
}

.login-box input[type="email"],
.login-box input[type="password"] {
  border: none;
  border-bottom: 1px solid #fff;
  background: transparent;
  outline: none;
  height: 40px;
  color: #fff;
  font-size: 16px;
}

.login-box input[type="email"]::placeholder,
.login-box input[type="password"]::placeholder {
  color: rgba(255, 255, 255, 0.5);
}

.login-box input[type="submit"] {
  border: none;
  outline: none;
  height: 40px;
  background: #1c8adb;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;
}

.login-box input[type="submit"]:hover {
  cursor: pointer;
  background: #39dc79;
  color: #000;
}

.login-box label {
  position: absolute;
  top: 0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  pointer-events: none;
  transition: 0.5s;
}

.user-box {
  position: relative;
  margin-bottom: 30px;
}

.user-box input[type="email"]:focus ~ label,
.user-box input[type="email"]:valid ~ label,
.user-box input[type="password"]:focus ~ label,
.user-box input[type="password"]:valid ~ label

.user-box input[type="email"]:focus,
.user-box input[type="password"]:focus,
.user-box input
  </style>

  <body>
      <h2>Autenticação em Dois Fatores</h2>
      <div class="user-box">
        <input type="email" name="email" required="">
        <label>E-mail</Em></label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Senha</label>
      </div>
      <img src="<?php echo $g->getUrl('otpProject1010', 'otpProject1010.com', $secret) ?>" />
      <input type="submit" name="token" value="token">
      <h1>2º fator</h1>
      <form method="post" action="index.php">
        <input type="text" name="token"/>
        <div class="g-recaptcha" data-sitekey="6LcH5j4mAAAAAAXs-LprduzUT09t4FdV70PNXv9F"></div>
        <button type="submit">Autenticar</button>
      </form>
    </div>
  </body>
</html>
