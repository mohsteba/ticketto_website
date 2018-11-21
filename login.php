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


<!--html code -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login-style.css">

    <title>ورود</title>
    <link rel="icon" href="imgs/logo1.png">

</head>

<body>
    <?php if( ! isset( $_SESSION[ 'email' ] ) ) : ?>
    <form method="POST">
        <div class="w-100">
            <div class="container pt-4">
                <div class="row justify-content-center pb-4">
                    <div>
                        <a href="index.php"><img src="imgs/logo1.png" class="img-fluid" alt="" style="width: 130px;"></a>

                    </div>
                </div>
                <div class="row justify-content-center ">
                    <div class="col-md-5 text-center pt-5 pb-5 pr-4 pl-4 form1">
                        <div class="text-justify text-white">
                            <p>
                                خوش آمدید :)
                            </p>
                            <hr class="my-3">
                        </div>
                        <form>
                            <div class="form-group pb-3 pt-2">
                                <input type="text" class="form-control pr-3 pb-4 pt-3" placeholder="ایمیل" name="email">
                            </div>
                            <div class="form-group pb-3">
                                <input type="password" class="form-control pr-3 pb-4 pt-3" placeholder="گذرواژه" name="password">
                            </div>
                            <button type="submit" class="btn purple-btn pl-4 pr-4 pt-1 pb-2"><strong>ورود</strong></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
    </form>
    <?php else: ?>
    <?php echo $_SESSION[ 'email' ]; ?>
   <script>
      window.location.href = 'userlogin.php';
    </script>
    <?php endif; ?>

</body>

</html>
