<html>

<head>
	<meta content="text/html" charset="UTF-8">
</head>

<body>
	<h1>カートの中身</h1>
	<ul>
		<li><a href="index.php">【←】商品ページに戻る</a></li>
		<li><a href="purchase.php">【→】購入画面に進む</a></li>
	</ul>

	<br>

	<?php

	session_start();

	echo "<pre>";
	print_r($_SESSION["order"]);
	echo "</pre>";

	?>
</body>

</html>