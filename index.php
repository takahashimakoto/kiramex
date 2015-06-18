<!DOCTYPE html>
<html lang="en">
<!---->

<?php

session_start();

if(!isset($_SESSION["order"])){
    $_SESSION["order"] = array();
}

if(isset($_SESSION["order"])){
//  $_SESSION["order"][] = @$_GET[item]." ".@$_GET[rice]." ".@$_GET[nori]." ".@$_GET[num]."個";
    $_SESSION["order"][] = array(
        'item' => @$_POST['item'],
        'rice' => @$_POST['rice'],
        'nori' => @$_POST['nori'],
        'num' => @$_POST['num'],
        );
}
/*
echo "<pre>";
print_r($_SESSION["order"]);
echo "</pre>";
*/
?>


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
                        <a href="#">購入する</a>
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
            <p><a class="btn btn-primary btn-large">Call to action!</a>
            </p>
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
        <div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="/ccon15/onigiri.jpg" alt="">
                    <div class="caption">
                        <h3>梅</h3>
                    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>-->
                        <form action="index.php" method="post">
                        <input type="hidden" name="item" value="梅">
						<p>米：
						<select name="rice">
						<option value="白米">白米</option>
						<option value="玄米">玄米</option>
						<option value="五穀米">五穀米</option>
						<option value="タイ米">タイ米</option>
						</select></p>

						<p>のり：
						<select name="nori">
						<option value="焼きのり">焼きのり</option>
						<option value="味付け海苔">味付けのり</option>
						<option value="韓国のり">韓国のり</option>
						<option value="すんごいのり">すんごいのり</option>
						</select></p>


						<p>個数：
						<select name="num">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						</select>個</p>    

                        <p>
                        <input type ="submit" value = "カートに入れる">
                        <!--<a href="#" class="btn btn-primary">カートに入れる</a>-->
                        <!--<a href="#" class="btn btn-default">More Info</a>-->
                        </p>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="/ccon15/onigiri.jpg" alt="">
                    <div class="caption">
                        <h3>明太子</h3>
                        <form action="index.php" method="post">
                        <input type="hidden" name="item" value="明太子">
                        <p>米：
                        <select name="rice">
                        <option value="白米">白米</option>
                        <option value="玄米">玄米</option>
                        <option value="五穀米">五穀米</option>
                        <option value="タイ米">タイ米</option>
                        </select></p>

                        <p>のり：
                        <select name="nori">
                        <option value="焼きのり">焼きのり</option>
                        <option value="味付け海苔">味付けのり</option>
                        <option value="韓国のり">韓国のり</option>
                        <option value="すんごいのり">すんごいのり</option>
                        </select></p>


                        <p>個数：
                        <select name="num">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select>個</p>    

                        <p>
                        <input type ="submit" value = "カートに入れる">
                        <!--<a href="#" class="btn btn-primary">カートに入れる</a>-->
                        <!--<a href="#" class="btn btn-default">More Info</a>-->
                        </p>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="/ccon15/onigiri.jpg" alt="">
                    <div class="caption">
                        <h3>おかか</h3>
                        <form action="index.php" method="post">
                        <input type="hidden" name="item" value="おかか">
                        <p>米：
                        <select name="rice">
                        <option value="白米">白米</option>
                        <option value="玄米">玄米</option>
                        <option value="五穀米">五穀米</option>
                        <option value="タイ米">タイ米</option>
                        </select></p>

                        <p>のり：
                        <select name="nori">
                        <option value="焼きのり">焼きのり</option>
                        <option value="味付け海苔">味付けのり</option>
                        <option value="韓国のり">韓国のり</option>
                        <option value="すんごいのり">すんごいのり</option>
                        </select></p>


                        <p>個数：
                        <select name="num">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select>個</p>    

                        <p>
                        <input type ="submit" value = "カートに入れる">
                        <!--<a href="#" class="btn btn-primary">カートに入れる</a>-->
                        <!--<a href="#" class="btn btn-default">More Info</a>-->
                        </p>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="/ccon15/onigiri.jpg" alt="">
                    <div class="caption">
                        <h3>シーチキン</h3>
                        <form action="index.php" method="post">
                        <input type="hidden" name="item" value="シーチキン">
                        <p>米：
                        <select name="rice">
                        <option value="白米">白米</option>
                        <option value="玄米">玄米</option>
                        <option value="五穀米">五穀米</option>
                        <option value="タイ米">タイ米</option>
                        </select></p>

                        <p>のり：
                        <select name="nori">
                        <option value="焼きのり">焼きのり</option>
                        <option value="味付け海苔">味付けのり</option>
                        <option value="韓国のり">韓国のり</option>
                        <option value="すんごいのり">すんごいのり</option>
                        </select></p>


                        <p>個数：
                        <select name="num">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select>個</p>    

                        <p>
                        <input type ="submit" value = "カートに入れる">
                        <!--<a href="#" class="btn btn-primary">カートに入れる</a>-->
                        <!--<a href="#" class="btn btn-default">More Info</a>-->
                        </p>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
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
