<?php
require_once("vendor/phpmailer/phpmailer/PHPMailerAutoload.php");      //���C�u�����ǂݍ���
mb_language("japanese");           //����(���{��)
mb_internal_encoding("UTF-8");     //�����G���R�[�f�B���O(UTF-8)

$to = "musubi151515@gmail.com";      //����
$subject = "test";         //����
$body = "testtesttest";      //�{��
$from = "musubi151515@gmail.com";      //���o�l
$fromname = "musubimaru";      //�����o���l��
//$attachfile = "./file.zip";        //�Y�t�t�@�C���p�X

$mail = new PHPMailer();           //PHPMailer�̃C���X�^���X����
$mail->CharSet = "iso-2022-jp";    //�����R�[�h�ݒ�
$mail->Encoding = "7bit";          //�G���R�[�f�B���O

$mail->AddAddress($to);                                                               //����(To)���Z�b�g
$mail->From = $from;                                                                  //���o�l(From)���Z�b�g
$mail->FromName = mb_encode_mimeheader(mb_convert_encoding($fromname,"JIS","UTF-8")); //���o�l(From��)���Z�b�g
$mail->Subject = mb_encode_mimeheader(mb_convert_encoding($subject,"JIS","UTF-8"));   //����(Subject)���Z�b�g
$mail->Body  = mb_convert_encoding($body,"JIS","UTF-8");                              //�{��(Body)���Z�b�g
//$mail->AddAttachment($attachfile);                                                   //�Y�t�t�@�C�����Z�b�g

//���[���𑗐M
if (!$mail->Send()){
    echo("Failed to send mail. Error:".$mail->ErrorInfo);
    }else{
        echo("Send mail OK.");
}
