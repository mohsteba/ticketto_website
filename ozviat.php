<?php
	$errors = array();
	$signup = false;
	
	if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
 
		
		if( trim( $_POST[ 'name' ] ) == '' ) {
			$errors[] = 'وارد کردن نام الزامی است';
		}
        if( trim( $_POST[ 'familyname' ] ) == '' ) {
			$errors[] = 'وارد کردن نام خانوادگی الزامی است';
		}		
		if( trim( $_POST[ 'password' ] ) == '' ) {
			$errors[] = 'وارد کردن گذرواژه الزامی است';
		}
        	
		if( $_POST[ 'password' ] !== $_POST[ 'password_confirmation' ] ) {
			$errors[] = 'گذرواژه‌های وارد شده یکسان نیستند';
		}
		
		if( trim( $_POST[ 'email' ] ) == '' ) {
			$errors[] = 'وارد کردن ایمیل الزامی است';
		}
	
		
		if( count( $errors ) == 0 ) {
			$dsn = 'mysql:dbname=id7817410_acount;host=localhost;port=3306';
			$username = 'id7817410_root';
			$password = 'mmskmmsk';
			try {
				$db = new PDO($dsn,$username,$password);
				$db->exec( "SET CHARACTER SET utf8" );
			} catch( PDOException $e ) {
				die( 'رخداد خطا در هنگام ارتباط با پایگاه داده:<br>' . $e );
			}
			
			$stmt = $db->prepare( "INSERT INTO users ( name,familyname,password,email) VALUES ( ?, ? ,?,?)" );
			$stmt->bindValue( 1, $_POST[ 'name' ] );
            $stmt->bindValue( 2, $_POST[ 'familyname' ] );
            $stmt->bindValue( 3, password_hash( $_POST[ 'password' ], PASSWORD_BCRYPT ) );
            $stmt->bindValue( 4, $_POST[ 'email' ] );
			$stmt->execute();
			
			$signup = true;
		}
	}
?>
<!--------------------------->
<!--kosar feyzi html body-->

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
    <link rel="stylesheet" href="css/login-style.css">

    <title>عضویت در تیکتو</title>   
    <link rel="icon" href="imgs/logo1.png">

</head>

<body>
    <?php if( $signup == false ) : ?>
		
		<?php
			foreach( $errors as $error ) {
				echo "<p>{$error}</p>";
			}
		?>
		
    <form method="POST">
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
                <div class="text-justify text-white">
                    <p>
                        به جمع ما خوش آمدید :)
                    </p>
                    <hr class="my-3">
                </div>
                <form>
                    <div class="form-group pb-3 pt-2">
                        <input type="text" class="form-control pr-3 pb-4 pt-3" placeholder="نام" name="name" >
                    </div>
                    <div class="form-group pb-3">
                        <input type="text" class="form-control pr-3 pb-4 pt-3" placeholder="نام خانوادگی" name="familyname">
                    </div>
                    <div class="form-group pb-3">
                        <input type="email" class="form-control pr-3 pb-4 pt-3" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="ایمیل" name="email">
                    </div>
                    <div class="form-group pb-4">
                        <input type="password" class="form-control pr-3 pb-4 pt-3" id="exampleInputPassword1"
                               placeholder="رمز ورود" name="password">
                    </div>
                    <div class="form-group pb-4">
                        <input type="password" class="form-control pr-3 pb-4 pt-3" id="exampleInputPassword12"
                               placeholder="تکرار رمز ورود" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn purple-btn pl-4 pr-4 pt-1 pb-2"><strong>عضویت</strong></button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
    </form >
    <?php else: ?>
		<script>
      window.location.href = 'userreg.php';
    </script>
	<?php endif; ?>
    
</body>

</html>