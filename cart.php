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
   print_r($items);
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



			echo "<p>カートの中身<p><br>";
			echo "<pre>";
			$i = 0;
			foreach ($_SESSION["order"] as $orders) {
			/*	echo $orders['具']; */
				$i++;
				echo "注文".$i."<br>" ;
				$gu =  $orders['具'];
				echo $items[$gu]['item_name']."<br>";
				$kome =  $orders['米'];
				echo $rices[$kome]['rice_name']."<br>";
				$nori =  $orders['海苔'];
				echo $noris[$nori]['nori_name']."<br>";


			}
			echo "</pre>";
	?>
</body>

</html>