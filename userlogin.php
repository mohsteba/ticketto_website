<?php
session_start();
	
	
	if( isset( $_GET[ 'signout' ] ) ) {
		unset( $_SESSION[ 'email' ] );
        Redirect('index.php', false);
	}


function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}


?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login-style.css">

    <title>کاربر</title>   
    <link rel="icon" href="imgs/logo1.png">

</head>

<body>
<div class="w-100">
    <div class="container pt-4">
        <div class="row justify-content-center pb-4">
            <div>
               <a href="index.php"> <img src="imgs/logo1.png" class="img-fluid" alt=""
                                                style="width: 130px;"></a>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-md-5 text-center pt-5 pb-5 pr-4 pl-4 form1">
                <div class="justify-content-center text-white">
                    <p>
                ورود شما با موفقیت انجام گردید.
                    </p>
                    <hr class="my-3 mt-4 mb-4">
                    
                    <a class="nav-link btn pt-3 pb-3 mr-5 ml-5 mt-3 round-btn purple-btn " href="" role="button" data-toggle="modal" data-target="#myModal3">
                        <strong>پروفایل کاربری شما</strong></a>
                    <a class="nav-link btn pt-3 pb-3 mr-5 ml-5 mt-3 round-btn purple-btn " href="?signout" role="button">
                        <strong>خروج از پروفایل</strong></a>
                        
                </div>
                
            </div>
        </div>
    </div>
</div>
    
    <!--Modal-->
<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-secondary">!!!</h4>
            </div>
            <div class="modal-body">
                <p>پروفایل هم اکنون دردسترس نمیباشد.</p>
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