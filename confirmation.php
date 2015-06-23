<!doctype html>
<html>

<head>
  <meta content="text/html" charset="UTF-8">
</head>

<body>
<?php

require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php'; //read mailer
require 'config_sample.php'; // read host, username and password

//// webpay start
require 'vendor/autoload.php';
use WebPay\WebPay;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $webpay = new WebPay('test_secret_dHh2fLeBJ80menecnFf863Et');
  $result = $webpay->charge->create(array(
    'amount' => $_POST['amount'],
    'currency' => 'jpy',
    'card' => $_POST['webpay-token'],
  ));
}
//// webpay end

//// mailer start

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
//$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
//$mail->Username = 'user@example.com';                 // SMTP username
//$mail->Password = 'secret';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'musubi151515@gmail.com';
$mail->FromName = 'from-musubi';
$mail->addAddress('musubi151515@gmail.com', 'Joe User');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('musubi151515@gmail.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
//// mailer end
?>

  <h1>確認画面</h1>
  <ul>
    <li><a href="purchase.php">【←】購入画面に戻る</a></li>
  </ul>

  <p>この辺にいろいろ確認情報が出る予定</p>

  <form action="completion.php" method="post">
    <script src="https://checkout.webpay.jp/v2/" class="webpay-button" data-key="test_public_ccOfYo3DJ4lH9bObjBefN56v" data-lang="ja"></script>
  </form>

</body>
</html>