
<?php
session_start();
	$signin = false;
	
	if( isset( $_GET[ 'signout' ] ) ) {
		unset( $_SESSION[ 'email' ] );
	}
	
	if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
		$dsn = 'mysql:dbname=id7817410_acount;host=localhost;port=3306';
		$username = 'id7817410_root';
		$password = 'mmskmmsk';
 
		try {
			$db = new PDO( $dsn, $username, $password );
			$db->exec( "SET CHARACTER SET utf8" );
		} catch( PDOException $e ) {
			die( 'رخداد خطا در هنگام ارتباط با پایگاه داده:<br>' . $e );
		}
 
		$stmt = $db->prepare( "SELECT * FROM users where email = ?" );
		$stmt->bindValue( 1, $_POST[ 'email' ] );
		$stmt->execute();
		$user = $stmt->fetch( PDO::FETCH_OBJ );
		
		if( $user && password_verify( $_POST[ 'password' ], $user->password ) ) {
			$signin = true;
			$_SESSION[ 'email' ] = $user->email;
		}
	}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>تیکتو </title>
    <link rel="icon" href="imgs/logo1.png">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="imgs/logo.png" alt="" style="width: 60px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item active mr-3 ml-3">
                    <a class="nav-link" href="#"><span class="blue-txt">صفحه اصلی </span><span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active mr-3 ml-3 ">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal"> <span class="blue-txt">فیلم‌ها </span></a>
                </li>
                <li class="nav-item active mr-3 ml-3 ">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal"> <span class="blue-txt">سینما‌ها</span></a>
                </li>
                <li class="nav-item active mr-3 ml-3 ">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal"><span class="blue-txt">جدول فروش </span></a>
                </li>
                <li class="nav-item active mr-3 ml-3 ">
                    <a class="nav-link" href="#contact"><span class="blue-txt">تماس با ما </span></a>
                </li>
            </ul>
            <a class="nav-link btn pt-2 pb-3 ml-2 pl-4 pr-4 round-btn purple-btn " href="login.php" target="_blank" role="button"
               style="padding-right:2%; padding-left:2%;"><strong>ورود</strong></a>

            <a class="nav-link btn  pr-3 pl-3 pt-2 pb-3 text-white round-btn blue-btn " target="_blank" href="ozviat.php"
                        target="_blank" role="button">عضویت</a>
        </div>
    </div>
</nav>


<div class="w-100" style="margin-top: 5%;">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inne ">
            <div class="carousel-item active">
                <img class="d-block w-100" src="imgs/latari.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="imgs/zanbur.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="imgs/tehran.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


<div class="w-100 content" style=" background-color: #eee;" id="pinned2">
    <div class="container">
        <div class="row text-justify" style="padding-top: 6%; padding-bottom: 8%;">
            <div class="col-md">
                <!--porforushtarin                -->
                <div class="row">
                    <div class="col-md">
                        <h6><i class="fas fa-icons1 fa-video pl-2"></i>
                            <strong> پر فروش ترین ها</strong>
                        </h6>
                    </div>
                </div>
                <div class="row pt-4 pb-3">
                    <div class="col-md-3">
                        <div class="card pb-1 pl-0">
                            <img class="card-img-top img-effect" src="imgs/Maghzha(2).jpg" alt="Card image cap">
                            <a class="card-link">
                                <div class="card-body pr-3">
                                    <p class="card-title" style="color: #1b1e21; font-size: 14px;"><strong>
                                        مغزهای کوچک زنگ زده
                                    </strong></p>
                                    <p class="card-text text-secondary" style="font-size: 12px;">
                                        هومن سیدی
                                    </p>
                                </div>
                                <button type="button"
                                        class="blue-btn float-left btn text-white first-item pr-3 pl-3 pt-1 pb-2 mb-2 ml-3"
                                        data-toggle="modal" data-target="#myModal" style="font-size: 12px;">خرید بلیت
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card pb-1 pl-0">
                            <img class="card-img-top img-effect" src="imgs/1000pa.jpg" alt="Card image cap">
                            <a class="card-link">
                                <div class="card-body pr-3">
                                    <p class="card-title" style="color: #1b1e21; font-size: 14px;"><strong>
                                        هزار پا
                                    </strong></p>
                                    <p class="card-text text-secondary" style="font-size: 12px;">
                                        ابوالحسن داودی
                                    </p>
                                </div>
                                <button type="button"
                                        class="blue-btn float-left btn text-white first-item pr-3 pl-3 pt-1 pb-2 mb-2 ml-3"
                                        data-toggle="modal" data-target="#myModal" style="font-size: 12px;">خرید بلیت
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card pb-1 pl-0">
                            <img class="card-img-top img-effect" src="imgs/Tange.jpg" alt="Card image cap">
                            <a class="card-link">
                                <div class="card-body pr-3">
                                    <p class="card-title" style="color: #1b1e21; font-size: 14px;"><strong>
                                        تنگه ابوقریب
                                    </strong></p>
                                    <p class="card-text text-secondary" style="font-size: 12px;">
                                        بهرام توکلی
                                    </p>
                                </div>
                                <button type="button"
                                        class="blue-btn float-left btn text-white first-item pr-3 pl-3 pt-1 pb-2 mb-2 ml-3"
                                        data-toggle="modal" data-target="#myModal" style="font-size: 12px;">خرید بلیت
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card pb-1 pl-0">
                            <img class="card-img-top img-effect" src="imgs/Jadeghadim.jpg" alt="Card image cap">
                            <a class="card-link">
                                <div class="card-body pr-3">
                                    <p class="card-title" style="color: #1b1e21; font-size: 14px;"><strong>
                                        جاده قدیم
                                    </strong></p>
                                    <p class="card-text text-secondary" style="font-size: 12px;">
                                        منیژه حکمت
                                    </p>
                                </div>
                                <button type="button"
                                        class="blue-btn float-left btn text-white first-item pr-3 pl-3 pt-1 pb-2 mb-2 ml-3"
                                        data-toggle="modal" data-target="#myModal" style="font-size: 12px;">خرید بلیت
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div style="padding-bottom: 4%;">
                    <hr class="my-4">
                </div>
                <!--jadidtarin                -->
                <div class="row">
                    <div class="col-md">
                        <h6><i class="fas fa-icons1 fa-video pl-2"></i>
                            <strong>جدید ترین ها</strong>
                        </h6>
                    </div>
                </div>
                <!--first row                -->
                <div class="row pt-4">
                    <div class="col-md-3">
                        <div class="card pb-1 pl-0">
                            <img class="card-img-top img-effect" src="imgs/AragheSard(1).jpg" alt="Card image cap">
                            <a class="card-link">
                                <div class="card-body pr-3">
                                    <p class="card-title" style="color: #1b1e21; font-size: 14px;"><strong>
                                        عرق سرد
                                    </strong></p>
                                    <p class="card-text text-secondary" style="font-size: 12px;">
                                        سهیل بیرقی
                                    </p>
                                </div>
                                <button type="button"
                                        class="blue-btn float-left btn text-white first-item pr-3 pl-3 pt-1 pb-2 mb-2 ml-3"
                                        data-toggle="modal" data-target="#myModal" style="font-size: 12px;">خرید بلیت
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card pb-1 pl-0">
                            <img class="card-img-top img-effect" src="imgs/Gamhayesheidaei.jpg" alt="Card image cap">
                            <a class="card-link">
                                <div class="card-body pr-3">
                                    <p class="card-title" style="color: #1b1e21; font-size: 14px;"><strong>
                                        گام های شیدایی
                                    </strong></p>
                                    <p class="card-text text-secondary" style="font-size: 12px;">
                                        حمید بهمنی
                                    </p>
                                </div>
                                <button type="button"
                                        class="blue-btn float-left btn text-white first-item pr-3 pl-3 pt-1 pb-2 mb-2 ml-3"
                                        data-toggle="modal" data-target="#myModal" style="font-size: 12px;">خرید بلیت
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card pb-1 pl-0">
                            <img class="card-img-top img-effect" src="imgs/Mahora.jpg" alt="Card image cap">
                            <a class="card-link">
                                <div class="card-body pr-3">
                                    <p class="card-title" style="color: #1b1e21; font-size: 14px;"><strong>
                                        ماهورا
                                    </strong></p>
                                    <p class="card-text text-secondary" style="font-size: 12px;">
                                        حمید زرگرنژاد
                                    </p>
                                </div>
                                <button type="button"
                                        class="blue-btn float-left btn text-white first-item pr-3 pl-3 pt-1 pb-2 mb-2 ml-3"
                                        data-toggle="modal" data-target="#myModal" style="font-size: 12px;">خرید بلیت
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card pb-1 pl-0">
                            <img class="card-img-top img-effect" src="imgs/Gorg.jpg" alt="Card image cap">
                            <a class="card-link">
                                <div class="card-body pr-3">
                                    <p class="card-title" style="color: #1b1e21; font-size: 14px;"><strong>
                                        گرگ بازی
                                    </strong></p>
                                    <p class="card-text text-secondary" style="font-size: 12px;">
                                        عباس نظام دوست
                                    </p>
                                </div>
                                <button type="button"
                                        class="blue-btn float-left btn text-white first-item pr-3 pl-3 pt-1 pb-2 mb-2 ml-3"
                                        data-toggle="modal" data-target="#myModal" style="font-size: 12px;">خرید بلیت
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <!--second row                -->
                <div class="row pt-4">
                    <div class="col-md-3">
                        <div class="card pb-1 pl-0">
                            <img class="card-img-top img-effect" src="imgs/Jadeghadim.jpg" alt="Card image cap">
                            <a class="card-link">
                                <div class="card-body pr-3">
                                    <p class="card-title" style="color: #1b1e21; font-size: 14px;"><strong>
                                        جاده قدیم
                                    </strong></p>
                                    <p class="card-text text-secondary" style="font-size: 12px;">
                                        منیژه حکمت
                                    </p>
                                </div>
                                <button type="button"
                                        class="blue-btn float-left btn text-white first-item pr-3 pl-3 pt-1 pb-2 mb-2 ml-3"
                                        data-toggle="modal" data-target="#myModal" style="font-size: 12px;">خرید بلیت
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card pb-1 pl-0">
                            <img class="card-img-top img-effect" src="imgs/Soofi.jpg" alt="Card image cap">
                            <a class="card-link">
                                <div class="card-body pr-3">
                                    <p class="card-title" style="color: #1b1e21; font-size: 14px;"><strong>
                                        سوفی و دیوانه
                                    </strong></p>
                                    <p class="card-text text-secondary" style="font-size: 12px;">
                                        مهدی کرم پور
                                    </p>
                                </div>
                                <button type="button"
                                        class="blue-btn float-left btn text-white first-item pr-3 pl-3 pt-1 pb-2 mb-2 ml-3"
                                        data-toggle="modal" data-target="#myModal" style="font-size: 12px;">خرید بلیت
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card pb-1 pl-0">
                            <img class="card-img-top img-effect" src="imgs/1000pa.jpg" alt="Card image cap">
                            <a class="card-link">
                                <div class="card-body pr-3">
                                    <p class="card-title" style="color: #1b1e21; font-size: 14px;"><strong>
                                        هزار پا
                                    </strong></p>
                                    <p class="card-text text-secondary" style="font-size: 12px;">
                                        ابوالحسن داودی
                                    </p>
                                </div>
                                <button type="button"
                                        class="blue-btn float-left btn text-white first-item pr-3 pl-3 pt-1 pb-2 mb-2 ml-3"
                                        data-toggle="modal" data-target="#myModal" style="font-size: 12px;">خرید بلیت
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="w-100 bg-white" id="contact">
    <div class="container-fluid">
        <div class="row justify-content-center pb-4" style="padding-top: 4%; ">
            <div class="col-md-3 text-justify" style=" line-height: 22px;">
                <a href="#"><img src="imgs/logo.png" class="img-fluid pl-1" alt=""
                                 style="width: 100px;"></a>
                <span style="color: rgb(124,91,208); font-size: 18px;"><strong>ارتباط با تیکتو:</strong></span>
            </div>
            <div class="col-md-3 text-justify" style="padding-top: 2.3%;">
                <p>
                    <i class="fas fa-map-marker-alt fa-icons2"></i>
                    <b> آدرس:</b>
                    تهران، سید خندان، دانشگاه خواجه نصیر
                </p>
            </div>
            <div class="col-md-3 text-justify " style="padding-top: 2.3%;">
                <p>
                    <i class="fas fa-phone fa-icons2"></i>
                    <b>شماره تماس با پشتیبانی:</b>
                    989126977637+
                </p>
            </div>
            <div class="col-md-3 text-justify " style="padding-top: 2.3%;">
                <p>
                    <i class="fas fa-envelope fa-icons2"></i>
                    <b>ایمیل:</b>
                    ticketto@kntu.ac.ir
                </p>
            </div>
        </div>
        <hr class="my-4">
        <div class="row justify-content-center pt-3 pb-3">
            <p>کلیه حقوق مادی و معنوی این وبسایت محفوظ و مربوط به تیکتو می باشد.</p>
        </div>
    </div>
</div>

<!--Modal-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-secondary">!!!</h4>
            </div>
            <div class="modal-body">
                <p>این امکان هم اکنون در دسترس نمیباشد.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn blue-btn text-white" data-dismiss="modal">بستن</button>
            </div>
        </div>
    </div>
</div>


   

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>