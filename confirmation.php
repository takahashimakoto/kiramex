<?php
$name = $_POST['name'];
$address = $_POST['address'];

echo $name;
echo $address;


//// curt check start
session_start();
$connect = mysql_connect("localhost","root","");
$db = "musubi";
//SQLをUTF8形式で書くよ、という意味
mysql_query("SET NAMES utf8",$connect);

//ここでおにぎりのデータベース情報をデータベースから取る
$i = 1;
$result1=mysql_db_query("musubi","SELECT * from items");

while(true){
      $kekka1 = mysql_fetch_assoc($result1);
      if($kekka1 == null) {
        break;
      } else {
        $i++;
          // echo"<br>";
            $items[$kekka1['item_id']] = $kekka1;
          //  echo"<br>"; 
      }
}

//ここからお米のデータベース情報をデータベースから取る
$i = 1;
$result2=mysql_db_query("musubi","SELECT * from rices");

while(true) {
      $kekka2 = mysql_fetch_assoc($result2);
      if($kekka2 == null) {
        break;
      } else {
        $i++;
          // echo"<br>";
            $rices[$kekka2['rice_id']] = $kekka2;
          //  echo"<br>";
      }
}

//ここからのりのデータベース情報をデータベースから取る
$i = 1;
$result3=mysql_db_query("musubi","SELECT * from noris");

while(true) {
      $kekka3 = mysql_fetch_assoc($result3);
      if($kekka3 == null) {
        break;
      } else {
        $i++;
          // echo"<br>";
            $noris[$kekka3['nori_id']] = $kekka3;
          //  echo"<br>";
      }
}
//// curt check end


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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php'; //read mailer
  require 'config_sample.php'; // read host, username and password

  //$mail->SMTPDebug = 3;                               // Enable verbose debug output
  $mail->isSMTP();                                      // Set mailer to use SMTP
  //$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  //$mail->Username = 'user@example.com';                 // SMTP username
  //$mail->Password = 'secret';                           // SMTP password
  //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  //$mail->Port = 587;                                    // TCP port to connect to

  $mail->From = 'musubi151515@gmail.com';
  $mail->FromName = 'musubi-staff';
  $mail->addAddress('musubi151515@gmail.com', 'musubi-staff');     // Add a recipient
  //$mail->addAddress('ellen@example.com');               // Name is optional
  //$mail->addReplyTo('musubi151515@gmail.com', 'Information');
  //$mail->addCC('cc@example.com');
  //$mail->addBCC('bcc@example.com');

  //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(false);                                  // Set email format to HTML
  mb_language("ja");
  mb_internal_encoding("UTF-8");
//  $mailbody = file_get_contents('completion_mail.php');
  $mailbody = <<< EOM
○○ 様

┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
┃注文番号　：　　1505266235
┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

こんにちは。1to1おにぎりのMUSUBIです。

このたびはMUSUBIをご利用いただき、誠にありがとうございました。
ご注文いただいておりました下記の商品につきまして、
本日予約が完了いたしましたのでご報告申し上げます。

今後もMUSUBIを宜しくお願いいたします。

────────────────────────────────
■予約情報 1
────────────────────────────────
[ご住所]
 〒113-0034 東京都文京区湯島1-6-3湯島1丁目ビル7F
[ご予約者]
 株式会社シー・コネクト　加藤竜也　様

────────────────────────────────
■出荷商品情報
────────────────────────────────
○注文商品番号1505266235-07（◆進行状況：予約完了・入金確認済）
 [具　　　材]　$mail_gu
 [お　　　米]　$mail_kome
 [海　　　苔]　$mail_nori
 [個　　　数]　$mail_num
 [合　計　額]　$mail_sum
 [予　約　日]　受付日確定から5日以内
 [製　造　元]　MUSUBI.LLC

────────────────────────────────
■納品書の発行について
────────────────────────────────
納品書はマイページより発行を承っております。
お手数ですがお客様でダウンロードしていただきますよう
お願いいたします。

1. ログインした状態で、以下のURLをクリック
http://#

2. 該当商品の「納品書発行」ボタンをクリック
3. 表示された納品書をプリントアウト

◆ご登録情報
[メールアドレス]　（セキュリティのため非表示）
[パスワード]　　 （セキュリティのため非表示）

◆マイページ
http://#

上記URLからメールアドレスとパスワードを入力すれば、
専用のマイページにログインすることができます。


------------------------------------------------------------------

配信専用メールアドレスから配信しております。
ご質問等がある場合は以下のご連絡用メールアドレスまでご連絡ください。
musubi151515@gmail.com

------------------------------------------------------------------


------------------------------------------------------------------

このメールに覚えがない場合は、誠に恐れ入りますが
以下までご連絡をいただいた上、メールを破棄していただけますと幸いです。
https://#

※本メールに関する「お問い合わせ」も上記の連絡先にお願いいたします。
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
MUSUBIは"自分だけのカスタマイズおにぎり"を目指しています。
使いづらい、わかりにくいなどございましたらこちらからお教えください。
https://#

「1to1おにぎり」MUSUBI（むすび）
http://#
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EOM;
  $mail->Subject = mb_encode_mimeheader('[MUSUBI]ご注文いただきありがとうございます');
  $mail->Body    = $mailbody;
  //$mail->AltBody = $mailbody;

  if(!$mail->send()) {
    header('location: confrimation.php');
    exit();
  } else {
    header('location: completion.php');
    exit();
  }
}
//// mailer end

?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
</head>

<body>
  <h1>確認画面</h1>
  <ul>
    <li><a href="purchase.php">【←】購入画面に戻る</a></li>
  </ul>

  <h3>カートの中身</h3>

<?php
      echo "<pre>";
      echo "--------------------------------------------------------------------------";
      $i = 0;
      foreach ($_SESSION["order"] as $orders) {
      /*  echo $orders['具']; */
        $i++;
        echo "<br>【注文".$i."】<br>" ;
        $gu =  $orders['具'];
          echo $items[$gu]['item_name']." / ";
          $mail_gu = $items[$gu]['item_name'];
        $kome =  $orders['米'];
          echo $rices[$kome]['rice_name']." / ";
          $mail_kome = $rices[$kome]['rice_name'];
        $nori =  $orders['海苔'];
          echo $noris[$nori]['nori_name']." / ";
          $mail_nori = $noris[$nori]['nori_name'];
        echo $orders['数']."個"." / ";
          $mail_num = $orders['数'];
        $price = $orders['合計'];
          echo "金額".$price*$orders['数']."円"."<br>";
          $mail_sum = $price*$orders['数'];
        echo "--------------------------------------------------------------------------";
        echo "<br>";
      }
      echo "</pre>";
?>

  <form method="post">
    金額：<input type='text' name='amount'><br>
    <script src="https://checkout.webpay.jp/v2/" class="webpay-button" data-key="test_public_ccOfYo3DJ4lH9bObjBefN56v" data-submit-text="注文を確定する" data-lang="ja"></script>
  </form>
</body>
</html>