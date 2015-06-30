<?php

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
            '合計' => @$_POST['price']
        );
}
}


/*
echo "<pre>";
print_r($_SESSION["order"]);
echo "</pre>";
*/

$connect = mysql_connect("localhost","root","");
$db = "musubi";
//SQLをUTF8形式で書くよ、という意味
mysql_query("SET NAMES utf8",$connect);


//ここでおにぎりのデータベース情報をデータベースから取る
$result1 = mysql_db_query("musubi","SELECT * from items");
$i = 1;
var_dump($result1);
while(true) {
      $kekka1 = mysql_fetch_assoc($result1);
      if($kekka1 == null) {
        break;
      } else {
        $i++;
        print_r($kekka1);
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


<!DOCTYPE html>
<html lang="ja-JP">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MUSUBI</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">MUSUBI</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggli5ng -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="cart.php">カートを見る</a>
                    </li>
                    <li>
                        <a href="purchase.php">購入する</a>
                    </li>
<!--                <li>
                        <a href="#">Contact</a>
                    </li>
-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->

        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
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
						<img src="<?php echo $item['image']; ?>" alt="">
						<div class="caption">
                        <p>料金:<?php echo $item['price']; ?></p>
                            <?php echo $j ; ?>
							<h3><?php echo $item['item_name']; ?></h3>
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
