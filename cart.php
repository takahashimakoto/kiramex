<html>
<body>
            <li>
              <a href="index.php">【←】商品ページに戻る</a>
              <a href="kiramex.0618.tsukamoto.html">【→】購入画面に進む</a>
            </li>


			<?php

			session_start();

			echo "<p>カートの中身<p><br>";

			echo "<pre>";
			print_r($_SESSION["order"]);
			echo "</pre>";
			
			?>




</body>
</html>