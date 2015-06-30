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

<form action="confirmation.php" method="POST">
	<p>名前：</p><input type="text" name="name" value="" placeholder="尾握 結">
	<p>住所：</p><input type="text" name="address" value="" placeholder="〒100-0001 東京都千代田区千代田1-1-1 MUSUBI.bldg.">
	<p>メールアドレス：</p><input type="text" name="mailaddress" value="" placeholder="メールアドレス">
	<br><br><br>
	<input type="submit" class="btn btn-primary" value="確認画面に進む">
</form>

</body>

</html>