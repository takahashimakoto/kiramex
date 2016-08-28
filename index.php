<?php

session_start();

if (isset($_SESSION["order_id"]) && $_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION["order_id"]++;
} else if (!isset($_SESSION["order_id"])) {
  $_SESSION["order_id"] = 0;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

session_start();
if(!isset($_SESSION["order"])) {
    $_SESSION["order"] = array();
}
if(isset($_SESSION["order"])) {
//  $_SESSION["order"][] = @$_GET[item]." ".@$_GET[rice]." ".@$_GET[nori]." ".@$_GET[num]."個";
        $_SESSION["order"][] = array(
            '具' => @$_POST['item'],
            '米' => @$_POST['rice'],
            '海苔' => @$_POST['nori'],
            '数' => @$_POST['num'],
            '合計' => @$_POST['price'],
            '注文番号' => @$_SESSION['order_id']
        );
}
}


/*
echo "<pre>";
print_r($_SESSION["order"]);
echo "</pre>";
*/

$connect = mysql_connect("localhost","root","root");
$db = "musubi";
//SQLをUTF8形式で書くよ、という意味
mysql_query("SET NAMES utf8",$connect);


//ここでおにぎりのデータベース情報をデータベースから取る
$result1 = mysql_db_query("musubi","SELECT * from items");
$i = 1;
while(true) {
      $kekka1 = mysql_fetch_assoc($result1);
      if($kekka1 == null) {
        break;
      } else {
        $i++;
        
           echo"<br>";
            $items[] = $kekka1;
          //  echo"<br>";
       }
} 

//ここからお米のデータベース情報をデータベースから取る
$result2 = mysql_db_query("musubi","SELECT * from rices");

while(true) {
      $kekka2 = mysql_fetch_assoc($result2);
      if($kekka2 == null) {
        break;
      } else {
        $i++;
           // echo"<br>";
            $rices[] = $kekka2;
          //  echo"<br>";
    }
}

//ここからのりのデータベース情報をデータベースから取る
$result3 = mysql_db_query("musubi","SELECT * from noris");

while(true) {
      $kekka3 = mysql_fetch_assoc($result3);
      if($kekka3 == null) {
        break;
      } else {
        $i++;
           // echo"<br>";
            $noris[] = $kekka3;
          //  echo"<br>";   
    }
}

?>

<?php include "head.php"; ?>

<body>
    <!-- Navigation -->
    <?php include "hedder.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer" >

            <h1>MUSUBI</h1>
            <p>お米と具材にこだわった、手作りおにぎりのお店です。</p>
            <p><a class="btn btn-primary btn-large">Call to action!</a></p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>商品一覧</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
                    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>-->
        <div class="row text-center">

			<?php $j = 0; foreach($items as $item ) {  $j++;  ?>

				<div class="col-md-3 col-sm-6 hero-feature">
					<div class="thumbnail">
						<img src="<?php echo $item['image']; ?>" alt="<?php echo $item['item_name']; ?>">
						<div class="caption">
                        <p class = 'price'>料金:<?php echo $item['price']; ?></p>
                          
						<?php // echo $item['item_name']; ?>
							<form action="index.php" method="post">

                            <input type="hidden" name = "order_id" value = "<?php echo $j ; ?>" > 


							<input type="hidden" name="item" value="<?php echo $item['item_id'] ?>" >
                            <input type="hidden" name="price" value ="<?php echo $item['price'] ?>" >

								<p>米：<select name="rice">
									<?php foreach ($rices as $rice ) { ?>    
										<option value="<?php echo $rice['rice_id']; ?>" > <?php echo $rice['rice_name']; ?> </option>
									<?php } ?>
								</select></p>
								<p>のり：<select name="nori">
									<?php foreach($noris as $nori ){ ?>
										<option value="<?php echo $nori['nori_id']; ?>" > <?php echo $nori['nori_name']; ?> </option> 
									<?php } ?> 
								</select></p>
								<p>個数：<select name="num">
									<?php for($i = 1; $i < 6; $i++){ ?>
										<option value= "<?php echo $i; ?>" > <?php echo $i ; ?> </option>
									<?php } ?>
								</select>個</p>
								<p>
									<input type ="submit" class="btn btn-primary" value = "カートに入れる"/>
									<!--<a href="#" class="btn btn-primary">カートに入れる</a>-->
									<!--<a href="#" class="btn btn-default">More Info</a>-->
								</p>

                                
							</form>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>&copy; MUSUBI 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>