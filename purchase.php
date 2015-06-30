<?php

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
      }else{
        $i++;
           // echo"<br>";
            $items[$kekka1['item_id']] = $kekka1;
          //  echo"<br>";
 
       }
} 
   //print_r($items);
//ここからお米のデータベース情報をデータベースから取る
$i = 1;
$result2=mysql_db_query("musubi","SELECT * from rices");

while(true){
      $kekka2 = mysql_fetch_assoc($result2);
      if($kekka2 == null) {
        break;
      }else{
        $i++;
           // echo"<br>";
            $rices[$kekka2['rice_id']] = $kekka2;
          //  echo"<br>";
    
    }
}

//ここからのりのデータベース情報をデータベースから取る
$i = 1;
$result3=mysql_db_query("musubi","SELECT * from noris");

while(true){
      $kekka3 = mysql_fetch_assoc($result3);
      if($kekka3 == null) {
        break;
      }else{
        $i++;
           // echo"<br>";
            $noris[$kekka3['nori_id']] = $kekka3;
          //  echo"<br>";
    
    }
}
?>


<!DOCTYPE html>
<html>

<head>
	<meta content="text/html" charset="UTF-8">
</head>

<body>
<h1>購入画面</h1>
<ul>
    <li><a href="cart.php">【←】カートの中身に戻る</a></li>
    <li><a href="confirmation.php">【→】確認画面に進む</a></li>
</ul>


<link rel="stylesheet" href="https://cart2.shopserve.jp/css/placeholder.css" type="text/css">



<table border="0" cellpadding="0" cellspacing="0">
  <tbody><tr>
    <!-- 中央コンテンツ -->
    <td id="center1"><!-- centerbox -->
      <div class="centerbox">
        <div class="mainCont">
          <div align="center" class="step_navi02"></div>
        </div>
        <h3 class="title1 no2">ショッピングカート</h3>
        <div class="mainFrame">
          <div class="mainCont">
            <p>必要事項を記入してください。各項目の入力が終わりましたら「次へ」ボタンをクリックしてください。</p>
            <p>
              <input type="button" value="戻る" onclick="cart.php" class="regi_back">
              <!-- <input type="button" value="戻る" onClick="document.PREV.submit();" class="button1"> -->
            </p>
            <!-- エラーメッセージ //-->

      <h4 style="display:inline;">▼ ご注文内容</h4>
      <?php
      $i = 0;
      echo "<p>カートの中身<p><br>";
      echo "<pre>";
      $mail_sums = "";
      foreach ($_SESSION["order"] as $orders) {
      /*  echo $orders['具']; */ 
        $i++;
        echo "注文".$i."<br>" ;
        //$order_id = $orders['注文番号'];
        //echo $orders[$id]['order_id']." / " ;
        $gu =  $orders['具'];
        echo $items[$gu]['item_name']." / ";
        $kome =  $orders['米'];
        echo $rices[$kome]['rice_name']." / ";
        $nori =  $orders['海苔'];
        echo $noris[$nori]['nori_name']." / ";
        echo $orders['数']."個"."           ";
        $price = $orders['合計'];
        echo "金額".$price*$orders['数']."円"."<br>";
        $mail_sum = $price*$orders['数'];

        echo "--------------------------------------------------------------------------";
        echo "<br>"."<br>";
        $mail_sums += $mail_sum;

      }
      echo "</pre>";

  ?>
  
             <p>合計金額：<?php echo $mail_sums ?>円</p><br>

              <form name="NEXT" method="POST" action="confirmation.php" novalidate="novalidate">
                <input type="hidden" name="KAGOID" value="7c38b02d2268c6a3a9392615825c2ece">
                <input type="hidden" name="CMD" value="ENQUETE">
                                <!-- 購入者情報　ここから //-->
                <br>
                <div style="width:95%;">
                  <h4 style="display:inline;">▼ 購入者情報</h4>
                <div class="bordlayoutp3 center">
                  <table width="95%" border="0" cellspacing="0" cellpadding="0">
                    
                    

                    
                                          <tbody><tr align="center">
                        <td align="left" class="backcolor1">                           お名前
                        &nbsp;<span style="color: #FF0000; font-size: 80%;">必須</span> </td>
                          <td align="left" class="backcolor2">
                            <div>
                              <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）新宿区</label><input type="text" class="validate required" style="width:220px;height:17px;;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: active;" name="address" maxlength="64" value="" bind-placeholder-label="true">
                            </div>
                          </td>
                      </tr>
                                           
                    
                                          <!-- ご住所 //-->
                      
                      <tr align="center">
                        <td align="left" class="backcolor1">                           ご住所
                          &nbsp;<span style="color: #FF0000; font-size: 80%;">必須</span> </td>
                          <td align="left" class="backcolor2">
                            <div>
                              <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）新宿区</label><input type="text" class="validate required" style="width:220px;height:17px;;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: active;" name="address" maxlength="64" value="" bind-placeholder-label="true">
                            </div>
                          </td>
                      </tr>
                      
                    
                                          <tr align="center">
                        <td align="left" class="backcolor1">                           お電話番号
                          &nbsp;<span style="color: #FF0000; font-size: 80%;">必須</span> </td>
                          <td align="left" class="backcolor2">
                            <div>
                              <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）新宿区</label><input type="text" class="validate required" style="width:220px;height:17px;;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: active;" name="address" maxlength="64" value="" bind-placeholder-label="true">
                            </div>
                          </td>
                      </tr>
                    
                                        <tr align="center">
                      <td align="left" class="backcolor1">                         メールアドレス
                        &nbsp;<span style="color: #FF0000; font-size: 80%;">必須</span> </td>
                      <td align="left" class="backcolor2">
                        <div>
                          <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）yamada@example.co.jp</label><input type="text" class="validate email required" style="width:177px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: inactive;" name="MAIL" maxlength="80" size="30" value="" onkeyup="checkEmailInput(this)" bind-placeholder-label="true">
                        </div>
                      </td>
                    </tr>
                    <tr align="center">
                      <td align="left" class="backcolor1">                         メールアドレス(確認)
                        &nbsp;<span style="color: #FF0000; font-size: 80%;">必須</span> </td>
                      <td align="left" class="backcolor2">
                        <span style="font-size: 89%">※注文確認メールを確実にお届けするため、メールアドレスを正確にご記入ください。</span><br>
                        <div>
                          <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）yamada@example.co.jp</label><input type="text" class="validate required email" style="width:177px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: inactive;" name="MAIL_CONF" maxlength="80" value="" onkeyup="checkEmailInput(this)" bind-placeholder-label="true">
                        </div>
                      </td>
                    </tr>
                                    </tbody></table>
                </div>
                <!-- 購入者情報　ここまで //-->
                <br>
                                       
                    
                  <!-- 次へボタン　ここから //-->
                                                            
                                                        </div>
             
                  
　　　　　　　　　　
                    <input type = "submit" value ="確認画面に進む">
                </form>
            <br>
            <div align="left" style="float:left;width:120px">
              <script src="https://seal.verisign.com/getseal?host_name=cart2.shopserve.jp&amp;size=M&amp;use_flash=NO&amp;use_transparent=YES&amp;lang=ja"></script>
             
            </div>
           
            <div style="clear:both"></div>
          </div>
          <!-- //mainCont -->
        </div>
        <!-- //mainFrame -->
      </div>
      <!-- //centerbox --></td>
    <!-- //中央コンテンツ -->
  </tr>
</tbody></table>

<!-- SHOP-PAGE CONTENT-AREA END -->


			<!--フッターフリーエリア-->
			
				<div class="footer_area">&nbsp;
<img src="https://b.shopserve.jp/tracking/tracking.php?U=https://cart2.shopserve.jp/-/olympia-seika.jp/regi.php&amp;S=cart2.shopserve.jp&amp;W=1600&amp;H=900&amp;V=21699&amp;C=CHECKOUT&amp;R=https://cart2.shopserve.jp/-/olympia-seika.jp/cart.php" width="1" height="1">
</div>
			
		</td>
  </body>