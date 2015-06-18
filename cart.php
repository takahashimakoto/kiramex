<html>
<body>
            <li>
              <a href="index.php">もどる</a>
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