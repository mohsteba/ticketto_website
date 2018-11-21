<?php
session_start();
	$signin = false;
	
	// بررسی درخواست خروج از سایت
	if( isset( $_GET[ 'signout' ] ) ) {
		unset( $_SESSION[ 'email' ] );
	}
	
	if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
		$dsn = 'mysql:dbname=acount;host=localhost;port=3306';
		$username = 'root';
		$password = '';
 
		try {
			$db = new PDO( $dsn, $username, $password );
			$db->exec( "SET CHARACTER SET utf8" );
		} catch( PDOException $e ) {
			die( 'رخداد خطا در هنگام ارتباط با پایگاه داده:<br>' . $e );
		}
 
		// جستجوی کاربران با نام کاربری وارد شده
		$stmt = $db->prepare( "SELECT * FROM users where email = ?" );
		$stmt->bindValue( 1, $_POST[ 'email' ] );
		$stmt->execute();
		$user = $stmt->fetch( PDO::FETCH_OBJ );
		
		// بررسی گذرواژه‌ی وارد شده با گذرواژه ی موجود در پایگاه داده
		if( $user && password_verify( $_POST[ 'password' ], $user->password ) ) {
			$signin = true;
			$_SESSION[ 'email' ] = $user->email;
		}
	}
?>
<!doctype html>
<html lang="fa">
<head>
	<meta charset="UTF-8">
	<title>ورود به سایت تیکتو </title>
	<style>
		body {
			direction: rtl;
			font: 12px tahoma;
		}
		
		input {
			border: 1px solid #008;
		}
		
		form {
			padding: 2em;
			margin: 2em;
			background-color: #eee;
		}
	</style>
</head>
<body>
	<!-- اگر کاربر قبلا در سایت وارد نشده باشد -->
	<?php if( ! isset( $_SESSION[ 'email' ] ) ) : ?>
		<form method="POST">
			<table>
				<tr>
					<td>ایمیل </td><td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td>گذرواژه</td><td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="ورود به سایت"></td>
				</tr>
                	<a  href="index.php" 
               style="padding-:20%; padding-left:2%;"><strong>بازگشت به سایت</strong></a>
         
            </table>
		</form>
	<?php else: ?>
		<!-- نمایش نام کاربر اگر در سایت وارد شده باشد -->
		<?php echo $_SESSION[ 'email' ]; ?>
		خوش آمدید
		<hr>
		<!-- لینک به صفحه ی خروج از سایت -->
		<a href="?signout">خروج </a>
    <hr>
        <a href="index.php">بازگشت به سایت </a>
    
	<?php endif; ?>
</body>
</html>