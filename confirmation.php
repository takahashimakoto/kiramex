<?php

$name = "";
$address = "";
$name = "";
$address = "";
$phone = "";
$mailaddress = "";
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$mailaddress = $_POST['mailaddress'];
//echo $name."<br>";
//echo $address."<br>";
//echo $mailaddress."<br>";

//// curt check start
session_start();
$connect = mysql_connect("localhost","root","");
$db = "musubi";
//SQLをUTF8形式で書くよ、という意味
mysql_query("SET NAMES utf8",$connect);

//ここでおにぎりのデータベース情報をデータベースから取る
$i = 1;
$result1 = mysql_db_query("musubi","SELECT * from items");

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
.
//ここからお米のデータベース情報をデータベースから取る
$i = 1;
$result2 = mysql_db_query("musubi","SELECT * from rices");

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
$result3 = mysql_db_query("musubi","SELECT * from noris");

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
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $webpay = new WebPay('test_secret_dHh2fLeBJ80menecnFf863Et');
  $result = $webpay->charge->create(array(
    'amount' => $_POST['amount'],
    'currency' => 'jpy',
    'card' => $_POST['webpay-token'],
  ));
}
*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $webpay = new WebPay('test_secret_dHh2fLeBJ80menecnFf863Et');
  $amount = "";
  $webpay_token = "";

  if(isset($_POST['amount'])) {
    $amount = $_POST['amount'];
  }
  if(isset($_POST['webpay-token'])) {
    $webpay_token = $_POST['webpay-token'];
  }

  if(!empty($amount) && !empty($webpay_token)){
  	$result = $webpay->charge->create(array(
      'amount' => $amount,
      'currency' => 'jpy',
      'card' => $webpay_token
  ));
  }
}



//// webpay end

//// mailer start
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if(!empty($amount) && !empty($webpay_token)){

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

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //$mailaddress = "";
    //$name = "";

    if(isset($_POST['mailaddress'])) {
      $mailaddress = $_POST['mailaddress'];
    }
    if(isset($_POST['name'])) {
      $name = $_POST['name'];
    }

    if(!empty($mailaddress) && !empty($name)){
      $mail->addAddress($mailaddress, $name);     // Add a recipient
    }
  }

//  $mail->addAddress($mailaddress, $name);
  $mail->From = 'musubi151515@gmail.com';
  $mail->FromName = 'musubi-staff';
  //$mail->addAddress('musubi151515@gmail.com', 'musubi-staff');     // Add a recipient
  //$mail->addAddress('ellen@example.com');               // Name is optional
  //$mail->addReplyTo('musubi151515@gmail.com', 'Information');
  $mail->addCC('musubi151515@gmail.com');
  //$mail->addBCC('bcc@example.com');

  //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(false);                                  // Set email format to HTML
  mb_language("ja");
  mb_internal_encoding("UTF-8");
//  $mailbody = file_get_contents('completion_mail.php');
  $ordermails = $_POST['ordermails'];
  $mail_sums = $_POST['mail_sums'];
  $mailbody = <<< EOM
$name 様

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
 $address
 〒113-0034 東京都文京区湯島1-6-3湯島1丁目ビル7F
[電話番号]
 $phone
[ご予約者]
 $name
 株式会社シー・コネクト　加藤竜也　様

────────────────────────────────
■出荷商品情報
────────────────────────────────
○注文商品番号1505266235-07（◆進行状況：予約完了・入金確認済）
 $ordermails

 【合計金額】
 $mail_sums 円

 【備考】
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
  $mail->SMTPoptions = array (
    'ssl' => array(
      'verify_peer' => false
    )
  );
  //$mail->AltBody = $mailbody;

  if(!$mail->send()) {
    echo("メール送信できませんでした。エラー：".$mail->ErrorInfo);
    //header('location: confirmation.php');
    //exit();
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
      $im = 0;
      $ordermail = "";
      $ordermails = "";
      $mail_sums = "";
      foreach ($_SESSION["order"] as $orders) {
      /*  echo $orders['具']; */
        $i++;
        $im++;
        echo "<br><br>【注文".$i."】<br>" ;
        $gu =  $orders['具'];
          echo $items[$gu]['item_name']." / ";
//          $mail_gu = $items[$gu]['item_name'];
        $kome =  $orders['米'];
          echo $rices[$kome]['rice_name']." / ";
//          $mail_kome = $rices[$kome]['rice_name'];
        $nori =  $orders['海苔'];
          echo $noris[$nori]['nori_name']." / ";
//          $mail_nori = $noris[$nori]['nori_name'];
        echo $num =$orders['数']."個"." / ";
//          $mail_num = $orders['数'];
        $price = $orders['合計'];
          echo "金額".$price*$orders['数']."円"."<br>";
          $mail_sum = $price*$orders['数'];
        echo "<br>";
        echo "--------------------------------------------------------------------------";
        $mail_sums += $mail_sum;
      }
      echo "</pre>";
      //echo $ordermails;
      //echo $mail_sums;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$sql="INSERT into deals(deal_id,user_name,address)
  VALUES(NULL,'$name','$address')";
$rs = mysql_db_query($db, $sql);
          if(!$rs){
            echo mysql_error();
          }
$last_id = mysql_insert_id();
$sqli="INSERT into details(detail_id,item_id,item_num,rice_id,nori_id,deal_id)
  VALUES(NULL,'$gu','$num','$kome','$nori','$last_id')";
mysql_db_query($db, $sqli);


}
  
?>


<?php /*echo $mailbody;*/ ?>


  <p>合計金額：<?php echo $mail_sums ?>円</p><br>

  <form method="post">
    <input type='hidden' name='amount' value="<?php echo $mail_sums ?>">
    <input type='hidden' name='ordermails' value="<?php echo $ordermails ?>">
    <input type='hidden' name='mail_sums' value="<?php echo $mail_sums ?>">
    名前：<?php echo $name ?><br>
      <input type='hidden' name='name' value="<?php echo $name ?>">
    住所：<?php echo $address ?><br>
      <input type='hidden' name='address' value="<?php echo $address ?>">
    電話番号：<?php echo $phone ?><br>
      <input type='hidden' name='phone' value="<?php echo $phone ?>">
    メールアドレス：<?php echo $mailaddress ?><br><br>
      <input type='hidden' name='mailaddress' value="<?php echo $mailaddress ?>">
    <script src="https://checkout.webpay.jp/v2/" class="webpay-button" data-key="test_public_ccOfYo3DJ4lH9bObjBefN56v" data-submit-text="注文を確定する" data-lang="ja"></script>
  </form>

</body>
</html>