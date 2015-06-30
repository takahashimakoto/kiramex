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

              <div class="bordlayoutp3 center">
                <table width="95%" border="0" cellpadding="0" cellspacing="0" class="border">
                  <tbody><tr class="backcolor1 center">
                    <td>品名</td>
                    <td>価格</td>
                    <td>数量</td>
                    <td>小計</td>
                  </tr>
                  <!-- カゴ中身 ループ ここから //-->
                                      <tr class="backcolor2">
                      <td class="center"><img src="/vol1blog/o/olympia.hc.shopserve.jp/docs/pic-labo/timg/100211-02.jpg" width="50" height="37"></td>
                      <td>ミニタブレット（フリュイブラン）                                            </td>
                      <td align="right">227円</td>
                      <td align="center">1個</td>
                      <td align="right">227円</td>
                    </tr>
                                                        <!-- カゴ中身 ループ ここまで //-->
                                                      <tr class="backcolor2">
                    <td colspan="4" align="right">商品合計</td>
                    <td align="right">227円</td>
                  </tr>
                </tbody></table>
              </div>
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
                          <div style="float:left;margin-top:12px;">姓：</div>
                          <div style="float:left">
                          <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position:
                           absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）山田</label><input type="text" name="name" class="validate required" style="width: 80px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: active;" maxlength="32" size="15" value="" required="" bind-placeholder-label="true">
                          </div>
                          <div style="float:left;margin-top:12px;">　名：</div>
                          <div style="float:left">
                          <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: 
                          absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）太郎</label><input type="text" name="name" class="validate required" style="width: 80px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: active;" maxlength="32" size="15" value="" bind-placeholder-label="true">
                          </div>
                          <div style="float:left;margin-top:12px;">
                          <div id="name" style="float:left"></div>
                          <label for="name" class="has-error" style="display: none;"></label>
                          </div>
                          </td>
                      </tr>
                    
                                          <tr align="center">
                        <td align="left" class="backcolor1">                           お名前(かな)
                           </td>
                        <td align="left" class="backcolor2">
                            <div style="float:left;margin-top:12px;">せい：</div>
                            <div style="float:left">
                              <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）やまだ</label><input type="text" class="validate" name="name_kana" style="width: 70px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: active;" maxlength="32" size="15" value="" bind-placeholder-label="true">
                            </div>
                            <div style="float:left;margin-top:12px;">　めい：</div>
                            <div style="float:left">
                              <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）たろう</label><input type="text" class="validate" name="name_kana" style="width: 70px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: active;" maxlength="32" size="15" value="" bind-placeholder-label="true">
                            </div>
                            <div style="float:left;margin-top:12px;">
                              <div id="name_kana" style="float:left"></div>
                              <label for="name_kana" class="has-error" style="display: none;"></label>
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
             
                  
　　　　　　　　　　
                    <input type = "submit" value ="次へ">
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