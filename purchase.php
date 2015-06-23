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


<script type="text/javascript" language="javascript" src="/B1D671CF-E532-4481-99AA-19F420D90332/netdefender/hui/ndhui.js?0=0&amp;0=0&amp;0=0"></script>

  <td valign="top" class="center" id="center3">
			<!--ヘッダーフリーエリア-->
			
				<div class="header_area">&nbsp;</div>
			

			<!-- SHOP-PAGE CONTENT-AREA BEGIN -->
<script language="JavaScript" type="text/JavaScript">

    function _isValidKagoID() {
        var eachCookieValue    = document.cookie.split(";");
        var isValidKagoID    = false;
        var matchResult        = 0;
        var valueCookie        = '';

        // KAGOID を入れているはずのFORMが存在しない場合は true を返す
        if (document.NEXT == undefined) return true;
        var kagoid        = document.NEXT.KAGOID.value;


        for (var i = 0; i < eachCookieValue.length; i++) {
            unitCookie    = eachCookieValue[i].split("=");
            target = unitCookie[COOKIE_KEY].replace(/^\s+|\s+$/g, "");
            if (target != TARGET_COOKIE_NAME)  continue;

            // ----------------------------------
            // クッキー中の KAGOID の値を確認
            // ----------------------------------

            if (unitCookie.length < 2) break;

            valueCookie    = unitCookie[COOKIE_VALUE];
            if (valueCookie == undefined) break;
            if (valueCookie == '')        break;

            matchResult    = valueCookie.indexOf(kagoid, 0);
            if (matchResult == -1) break;

            // ----------------------------------
            // クッキーとPOSTされるKAGOIDが一致した場合
            // ----------------------------------
            isValidKagoID    = true;            
            break;
        }

        // 正常なKAGOIDの場合は、true を返す
        if (isValidKagoID == true) return true;

        // 異常なKAGOIDの場合は、カゴ画面に戻る
        _gotoKago();

        return false;
    }

function go_shop_page(url)
{
    var clickGaUrl = '/-/olympia-seika.jp/' +"_ga/" + url.replace(/http:\/\/\S+?\//,"");
     _gaq.push(['_trackPageview', { page : clickGaUrl } ]);
     _gaq.push(['_link', url]);
location.href = url;
return false;
}



    PageTracker     = function() { this._link = function(url) { _gaq.push(['_link', url]); } ; }
    var pageTracker = new PageTracker();
//-->
</script>

<!-- /KAGOIDログアウト確認JS -->

<script language="JavaScript" type="text/JavaScript">
<!--
    function showNgWord() {
        var currentDir  = document.URL;
        
        targetPath   = 'ngword.php';
        
        if (currentDir.match("REVIEW")) {
           targetPath   = '../ngword.php';
        }
        window.open(targetPath, "ngword","resizable=yes,scrollbars=yes,menubar=no,width=550,height=450");
    }
//-->
</script>

<style>
ul.option_style {
  list-style: none;
  padding:0;
  margin:0;
}
ul.option_style li { 
  padding-left: 1em; 
  text-indent: -0.9em;
}
ul.option_style li:before {
  content: "└ ";
}
td.border-none-bottom {
  border-bottom:none !important;
}
td.border-none-top {
  border-top:none !important;;
}
td.border-none-v {
  border-top:none !important;;
  border-bottom:none !important;;
}
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script language="javascript">
<!--
   function gonext(fname) {
       if (_isValidKagoID() == true) fname.submit();
   }

   function goback(fname) {
       if (_isValidKagoID() == true) fname.submit();
   }
function openWindow(url){
    var linkerUrl = url;

            if(typeof pageTracker === 'object'){
            linkerUrl =pageTracker._getLinkerUrl(url);
        }else{
            _gaq.push(function() {
                var pageTracker = _gat._getTrackerByName();
                linkerUrl = pageTracker._getLinkerUrl(url);
           });
        }
    
        window.open(linkerUrl,'_blank');
        return false;
}

var flagZipcode = 0;
function loadAddrForZip() {
    //if error, get zipcode values from post
    var err = '';
    if (flagZipcode < 2 && err == 'Array') {
        flagZipcode ++;
        return true;
    }
    var valzip1 = document.NEXT.ZIP1.value;
    var valzip2 = document.NEXT.ZIP2.value;
    if (valzip1.length == 3 && valzip2.length == 4) {
        var dataPost = 'ZIP1=' + valzip1 + '&ZIP2=' + valzip2;
        $.ajax({
                type: 'POST',
                url: 'seekzip_json.php',
                scriptCharset:"EUC-JP",
                data: dataPost,
                processData: false,
                success: dataParser
        });
    }
}
function dataParser(json){
    data = jQuery.parseJSON(json);
    if (data.error == 0) {
        if (document.NEXT.PREF.type == 'text') {
            $('select[name="PREF"]').val(data.pref);
        } else {
            $('select[name="PREF"]').val(data.pref).attr('selected', 'selected');
        }
        $('input[name="ADDR1"]').val(data.city);
        $('input[name="ADDR2"]').val(data.town);
    }
    if ($('input[name="ADDR1"]').val().length > 0){
        $('input[name="ADDR1"]').closest('div').find('label:first-child').css('display', 'none');
        $('input[name="ADDR1"]').closest('td').find('label.has-error').css('display', 'none');
    }
    if ($('input[name="ADDR2"]').val().length > 0){
        $('input[name="ADDR2"]').closest('div').find('label:first-child').css('display', 'none');
        $('input[name="ADDR2"]').closest('td').find('label.has-error').css('display', 'none');
        // #11381
        if( data.error == 0 ){
          toggleCheckAddr(true);
        }
    }
}
function checkEmailInput(element){
  var newVal = $(element).val();
  //Replace space 2 byte to 1 byte
  if (newVal.match(/　/g)) {
    $(element).val(newVal.replace("　", " "));
  }
  //trim string
  if (newVal.match(/^\s+|\s+$/g) != null) {
    $(element).val(newVal.replace(/^\s+|\s+$/g, ''));
  }
}

function confirmDelivMailWithPayMethod() {
    var mail   = document.getElementById('deliveryMailName').value;
    var normal = document.getElementById('deliveryNormal').value;
    var msg    = '選択した決済では'+mail+'は選択できませんので'+normal+'にします。よろしいですか？'
        return true;
}//End confirmDelivMailWithPayMethod

// #11381
function toggleCheckAddr(flag) {
    var checkAddr = $('#check_addr');

    if (flag == true) {
        checkAddr.css('display', 'inline');
    } else {
        checkAddr.css('display', 'none');
    }
}
-->
</script>

<script src="https://cart2.shopserve.jp/js/jquery.placeholder.label.js"></script>
<script src="https://cart2.shopserve.jp/js/jquery.validate.min.js"></script>
<script src="https://cart2.shopserve.jp/js/localization/messages_ja.js" charset="UTF-8"></script>
<script src="https://cart2.shopserve.jp/js/placeholder.js"></script>
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
                              <input type="button" value="戻る" onclick="JavaScript:goback(document.PREV)" class="regi_back">
                <!-- <input type="button" value="戻る" onClick="document.PREV.submit();" class="button1"> -->
                          </p>
            <!-- エラーメッセージ //-->
                                      <h4 style="display:inline;">▼ ご注文内容</h4>

              <div class="bordlayoutp3 center">
                <table width="95%" border="0" cellpadding="0" cellspacing="0" class="border">
                  <tbody><tr class="backcolor1 center">
                    <td style="width:54px;">画像</td>
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
              <form name="NEXT" method="POST" action="https://cart2.shopserve.jp/-/olympia-seika.jp/regi.php" novalidate="novalidate">
                <input type="hidden" name="STORENAME" value="olympia.hc">
                <input type="hidden" name="KAGOID" value="7c38b02d2268c6a3a9392615825c2ece">
                <input type="hidden" id="deliveryMailName" value="メール便">
                <input type="hidden" id="deliveryNormal" value="通常配送">
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
                          <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）山田</label><input type="text" name="LNAME" class="validate required" style="width: 80px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: active;" maxlength="32" size="15" value="塚本" required="" bind-placeholder-label="true">
                          </div>
                          <div style="float:left;margin-top:12px;">　名：</div>
                          <div style="float:left">
                          <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）太郎</label><input type="text" name="FNAME" class="validate required" style="width: 80px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: active;" maxlength="32" size="15" value="彩華" bind-placeholder-label="true">
                          </div>
                          <div style="float:left;margin-top:12px;">
                          <div id="NAME" style="float:left"></div>
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
                              <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）やまだ</label><input type="text" class="validate" name="LNAME_KANA" style="width: 70px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: active;" maxlength="32" size="15" value="つかもと" bind-placeholder-label="true">
                            </div>
                            <div style="float:left;margin-top:12px;">　めい：</div>
                            <div style="float:left">
                              <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）たろう</label><input type="text" class="validate" name="FNAME_KANA" style="width: 70px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: active;" maxlength="32" size="15" value="あやか" bind-placeholder-label="true">
                            </div>
                            <div style="float:left;margin-top:12px;">
                              <div id="NAME_KANA" style="float:left"></div>
                              <label for="name_kana" class="has-error" style="display: none;"></label>
                            </div>
                          </td>
                      </tr>
                                                              <tr align="center">
                        <td align="left" class="backcolor1">                           郵便番号
                          &nbsp;<span style="color: #FF0000; font-size: 80%;">必須</span> </td>
                        <td align="left" class="backcolor2">
                          <div style="float:left;margin-top:12px;"></div>
                          <div style="float:left">
                            <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）100</label><input type="text" class="validate required" style="width:50px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: disabled;" name="ZIP1" maxlength="3" value="236" onchange="loadAddrForZip()" bind-placeholder-label="true">
                          </div>
                          <div style="float:left;margin-top:12px;">&nbsp;-&nbsp;</div>
                          <div style="float:left">
                            <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）0000</label><input type="text" class="validate required" style="width:58px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: disabled;" name="ZIP2" maxlength="4" value="0052" onchange="loadAddrForZip()" bind-placeholder-label="true">
                          </div>
                          <div style="float:left;margin-top:12px;">
                            <div id="ZIP" style="float:left"></div>
                            <label for="zip" class="has-error" style="display: none;"></label>
                          </div>
                          </td>
                      </tr>
                    
                                          <!-- ご住所 //-->
                      <tr align="center">
                        <td align="left" class="backcolor1">                           都道府県
                          &nbsp;<span style="color: #FF0000; font-size: 80%;">必須</span> </td>
                        <td align="left" class="backcolor2">
                          <div>
                            <select name="PREF" class="ignore">
                                                              <option value="北海道">北海道</option>
                                                              <option value="青森県">青森県</option>
                                                              <option value="岩手県">岩手県</option>
                                                              <option value="宮城県">宮城県</option>
                                                              <option value="秋田県">秋田県</option>
                                                              <option value="山形県">山形県</option>
                                                              <option value="福島県">福島県</option>
                                                              <option value="茨城県">茨城県</option>
                                                              <option value="栃木県">栃木県</option>
                                                              <option value="群馬県">群馬県</option>
                                                              <option value="埼玉県">埼玉県</option>
                                                              <option value="千葉県">千葉県</option>
                                                              <option value="東京都">東京都</option>
                                                              <option value="神奈川県" selected="selected">神奈川県</option>
                                                              <option value="新潟県">新潟県</option>
                                                              <option value="富山県">富山県</option>
                                                              <option value="石川県">石川県</option>
                                                              <option value="福井県">福井県</option>
                                                              <option value="山梨県">山梨県</option>
                                                              <option value="長野県">長野県</option>
                                                              <option value="岐阜県">岐阜県</option>
                                                              <option value="静岡県">静岡県</option>
                                                              <option value="愛知県">愛知県</option>
                                                              <option value="三重県">三重県</option>
                                                              <option value="滋賀県">滋賀県</option>
                                                              <option value="京都府">京都府</option>
                                                              <option value="大阪府">大阪府</option>
                                                              <option value="兵庫県">兵庫県</option>
                                                              <option value="奈良県">奈良県</option>
                                                              <option value="和歌山県">和歌山県</option>
                                                              <option value="鳥取県">鳥取県</option>
                                                              <option value="島根県">島根県</option>
                                                              <option value="岡山県">岡山県</option>
                                                              <option value="広島県">広島県</option>
                                                              <option value="山口県">山口県</option>
                                                              <option value="徳島県">徳島県</option>
                                                              <option value="香川県">香川県</option>
                                                              <option value="愛媛県">愛媛県</option>
                                                              <option value="高知県">高知県</option>
                                                              <option value="福岡県">福岡県</option>
                                                              <option value="佐賀県">佐賀県</option>
                                                              <option value="長崎県">長崎県</option>
                                                              <option value="熊本県">熊本県</option>
                                                              <option value="大分県">大分県</option>
                                                              <option value="宮崎県">宮崎県</option>
                                                              <option value="鹿児島県">鹿児島県</option>
                                                              <option value="沖縄県">沖縄県</option>
                                                          </select>
                          </div>
                        </td>
                      </tr>
                      <tr align="center">
                        <td align="left" class="backcolor1">                           市区郡
                          &nbsp;<span style="color: #FF0000; font-size: 80%;">必須</span> </td>
                          <td align="left" class="backcolor2">
                            <div>
                              <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）新宿区</label><input type="text" class="validate required" style="width:220px;height:17px;;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: active;" name="ADDR1" maxlength="64" value="横浜市金沢区" bind-placeholder-label="true">
                            </div>
                          </td>
                      </tr>
                      <tr align="center">
                        <td align="left" class="backcolor1">                         町村字番地
                          &nbsp;<span style="color: #FF0000; font-size: 80%;">必須</span> </td>
                        <td align="left" class="backcolor2">
                          <div style="float:left;">
                            <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）西新宿1-1-1</label><input type="text" class="validate required" style="width:220px;height:17px;;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: active;" name="ADDR2" maxlength="64" value="富岡西7-16-1-309" onkeydown="toggleCheckAddr(false);" bind-placeholder-label="true">
                            <label id="check_addr" class="has-error" style="display: none;">番地が抜けていないかご確認ください。</label>
                          </div>
                        </td>
                      </tr>
                      <tr align="center">
                        <td align="left" class="backcolor1">建物名（部屋番号）</td>
                        <td align="left" class="backcolor2">
                          <div>
                            <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); font-size: 13.3333330154419px; display: block; margin-top: 12px; margin-left: 2px; padding-left: 5px; padding-right: 5px; background-color: rgb(255, 255, 255);">例）西新宿マンション204</label><input type="text" class="validate" style="width:220px;height:17px;;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: active;" name="ADDR3" maxlength="64" value="" bind-placeholder-label="true">
                          </div>
                        </td>
                      </tr>
                    
                                          <tr align="center">
                        <td align="left" class="backcolor1">                           お電話番号
                          &nbsp;<span style="color: #FF0000; font-size: 80%;">必須</span> </td>
                        <td align="left" class="backcolor2">
                          <div style="float:left;margin-top:12px;"></div>
                          <div style="float:left">
                            <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）03</label><input type="text" class="validate required" style="width:42px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: disabled;" name="TEL1" maxlength="5" value="080" bind-placeholder-label="true">
                          </div>
                          <div style="float:left;margin-top:12px;">&nbsp;-&nbsp;</div>
                          <div style="float:left">
                            <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）0000</label><input type="text" class="validate required" style="width:58px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: disabled;" name="TEL2" maxlength="5" value="4806" bind-placeholder-label="true">
                          </div>
                          <div style="float:left;margin-top:12px;">&nbsp;-&nbsp;</div>
                          <div style="float:left">
                            <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）0000</label><input type="text" class="validate required" style="width:58px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: disabled;" name="TEL3" maxlength="5" value="0240" bind-placeholder-label="true">
                          </div>
                          <div style="float:left;margin-top:12px;">
                          <div id="TEL" style="float:left"></div>
                          <label for="tel" class="has-error" style="display: none;"></label>
                          </div>
                          </td>
                      </tr>
                    
                                        <tr align="center">
                      <td align="left" class="backcolor1">                         メールアドレス
                        &nbsp;<span style="color: #FF0000; font-size: 80%;">必須</span> </td>
                      <td align="left" class="backcolor2">
                        <div>
                          <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）yamada@example.co.jp</label><input type="text" class="validate email required" style="width:177px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: inactive;" name="MAIL" maxlength="80" size="30" value="ayakam6002@gmail.com" onkeyup="checkEmailInput(this)" bind-placeholder-label="true">
                        </div>
                      </td>
                    </tr>
                    <tr align="center">
                      <td align="left" class="backcolor1">                         メールアドレス(確認)
                        &nbsp;<span style="color: #FF0000; font-size: 80%;">必須</span> </td>
                      <td align="left" class="backcolor2">
                        <span style="font-size: 89%">※注文確認メールを確実にお届けするため、メールアドレスを正確にご記入ください。</span><br>
                        <div>
                          <label style="font-family: 'ＭＳ Ｐゴシック', Osaka, monospace; position: absolute; cursor: initial; color: rgb(137, 137, 137); display: none; margin-left: 2px; padding-left: 5px; padding-right: 5px; margin-top: -2.94444433848063px; font-size: 13.3333330154419px; background-color: rgb(255, 255, 255);">例）yamada@example.co.jp</label><input type="text" class="validate required email" style="width:177px;height:17px;padding-left:7px;padding-top:2px;margin:10px 0;ime-mode: inactive;" name="MAIL_CONF" maxlength="80" value="ayakam6002@gmail.com" onkeyup="checkEmailInput(this)" bind-placeholder-label="true">
                        </div>
                      </td>
                    </tr>
                                        <!-- 会員住所保存　ここから //-->
                                          <tr>
                        <td colspan="2" align="left" class="backcolor2"><input type="checkbox" name="ADDRSAVE">
                          住所を保存する場合はチェックしてください </td>
                      </tr><tr>
                                      </tr></tbody></table>
                </div>
                <!-- 購入者情報　ここまで //-->
                <br>
                <!-- 送付先情報　ここから //-->
                <h4>▼ お届け先選択</h4>
                <p class="left" style="width:95%;margin:0 auto;">お届け先を選択してください</p>
                <div class="layoutp3 center">
                  <table cellpadding="0" cellspacing="0" border="0" class="border" style="width:95%;">
                    <tbody><tr>
                      <td class="backcolor2">
                        <table border="0" cellspacing="0" cellpadding="0" class="layoutp3">
                          <tbody><tr>
                            <td class="center" align="center"><input type="radio" id="DELIV_SW_ID1" name="DELIV_SW" value="0" checked="&quot;checked&quot;"></td>
                            <td colspan="2"><label for="DELIV_SW_ID1"><strong>購入者の住所へ送る</strong></label></td>
                          </tr>
                                                    <tr>
                            <td class="center" align="center"><input type="radio" id="DELIV_SW_ID2" name="DELIV_SW" value="1"></td>
                            <td colspan="2"><label for="DELIV_SW_ID2"><strong>別の住所へ送る（1か所）</strong>　※次ページでご入力ください。</label></td>
                          </tr>
                                                                              <!--
                                      <tr>
                                      <td colspan="3" align="center" background="../../../estore/imgs/line.gif" style="background-repeat:repeat-x "><img src="../../../estore/imgs/spacer.gif" width="1" height="5"></td>
                                      </tr>
                                      -->
                          <!--
                                      <tr>
                                      <td class="center"><input type="radio" name="to"></td>
                                      <td nowrap>ご購入者を含めた複数の住所へ送る</td>
                                      <td nowrap>複数の住所へ送る</td>
                                      <td rowspan="2" align="right" width="180">
                                      お届け先数：
                                      <select name="カード">
                                      <option selected>1ヶ所</option>
                                      <option>2ヶ所</option>
                                      <option>3ヶ所</option>
                                      </select>
                                      &nbsp;
                                      </td>
                                      </tr>
                                      -->
                    
                  <!-- 次へボタン　ここから //-->
                                                            <input type="button" class="regi_next" onclick="JavaScript:gonext(document.NEXT)" value="　 次へ　 ">
                                                        </div>
              </form>
                        <form name="PREV" method="POST" action="https://cart2.shopserve.jp/-/olympia-seika.jp/cart.php" novalidate="novalidate">
              <input type="hidden" name="KAGOID" value="7c38b02d2268c6a3a9392615825c2ece">
              <input type="hidden" name="STORENAME" value="olympia.hc">
            </form>
            <br>
            <div align="left" style="float:left;width:120px">
              <script src="https://seal.verisign.com/getseal?host_name=cart2.shopserve.jp&amp;size=M&amp;use_flash=NO&amp;use_transparent=YES&amp;lang=ja"></script><img name="seal" src="https://seal.websecurity.norton.com/getseal?at=0&amp;sealid=1&amp;dn=cart2.shopserve.jp&amp;lang=ja&amp;tpt=transparent" oncontextmenu="return false;" border="0" usemap="#sealmap_medium" alt=""> <map name="sealmap_medium" id="sealmap_medium"><area alt="Click to Verify - This site has chosen an SSL Certificate to improve Web site security" title="" href="javascript:vrsn_splash()" shape="rect" coords="0,0,115,58" tabindex="-1" style="outline:none;"><area alt="Click to Verify - This site has chosen an SSL Certificate to improve Web site security" title="" href="javascript:vrsn_splash()" shape="rect" coords="0,58,63,81" tabindex="-1" style="outline:none;"><area alt="" title="" href="javascript:symcBuySSL()" shape="rect" coords="63,58,115,81" style="outline:none;"></map>
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
<script language="JavaScript">
<!--
var ref;
ref = document.referrer;
ref = ref.replace(/&/ig,"%26").replace(/\'/ig,"%27");
ref = ref.replace(/\?/ig,"%3F");
var u = document.URL.replace(/&/ig,"%26").replace(/</ig,"%3C").replace(/\'/ig,"%27");
document.write("<img src='https://b.shopserve.jp/tracking/tracking.php?");
document.write("U="+u+"&S="+document.domain+"&W="+screen.width+"&H="+screen.height+"&");
document.write("V=21699&C=CHECKOUT&R="+ref+"' width=1 height=1>");
// -->
</script><img src="https://b.shopserve.jp/tracking/tracking.php?U=https://cart2.shopserve.jp/-/olympia-seika.jp/regi.php&amp;S=cart2.shopserve.jp&amp;W=1600&amp;H=900&amp;V=21699&amp;C=CHECKOUT&amp;R=https://cart2.shopserve.jp/-/olympia-seika.jp/cart.php" width="1" height="1">
</div>
			
		</td>
  </body>