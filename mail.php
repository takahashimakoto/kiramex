<?php
require_once("vendor/phpmailer/phpmailer/PHPMailerAutoload.php");      //ライブラリ読み込み
mb_language("japanese");           //言語(日本語)
mb_internal_encoding("UTF-8");     //内部エンコーディング(UTF-8)

$to = "musubi151515@gmail.com";      //宛先
$subject = "test";         //件名
$body = "testtesttest";      //本文
$from = "musubi151515@gmail.com";      //差出人
$fromname = "musubimaru";      //差し出し人名
//$attachfile = "./file.zip";        //添付ファイルパス

$mail = new PHPMailer();           //PHPMailerのインスタンス生成
$mail->CharSet = "iso-2022-jp";    //文字コード設定
$mail->Encoding = "7bit";          //エンコーディング

$mail->AddAddress($to);                                                               //宛先(To)をセット
$mail->From = $from;                                                                  //差出人(From)をセット
$mail->FromName = mb_encode_mimeheader(mb_convert_encoding($fromname,"JIS","UTF-8")); //差出人(From名)をセット
$mail->Subject = mb_encode_mimeheader(mb_convert_encoding($subject,"JIS","UTF-8"));   //件名(Subject)をセット
$mail->Body  = mb_convert_encoding($body,"JIS","UTF-8");                              //本文(Body)をセット
//$mail->AddAttachment($attachfile);                                                   //添付ファイルをセット

//メールを送信
if (!$mail->Send()){
    echo("Failed to send mail. Error:".$mail->ErrorInfo);
    }else{
        echo("Send mail OK.");
}
