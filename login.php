<?php
	session_start();
	if(isset($_SESSION['uid'])){
		header('location:admin/index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Ebukumenu</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap');
		* {
			padding:0;
			margin:0;
		}
		body {
			font-family: 'Nunito Sans', sans-serif;
			background-color: #F9F1F0;
		}
		a {
			color: inherit;
			text-decoration: none;
		}
		.container {
			width: 100%;
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.card-login {
			border:1px solid #ccc;
			background-color: #fff;
			width: 300px;
			padding: 25px 15px;
			box-sizing: border-box;
			border-radius: 5px;
		}
		.card-login h2 {
			margin-bottom: 10px;
		}
		.input-control {
			width: 100%;
			display: block;
			padding: 0.5rem 1rem;
			box-sizing: border-box;
			font-size: 1rem;
			margin-bottom: 8px;
		}
		.btn {
			display: block;
			width: 100%;
			padding: 0.5rem 1rem;
			cursor: pointer;
			font-size: 1rem;
		}

		.card-register {
			margin-top: 15px;
		}

		.card-register p a {
			text-decoration: none;
			font-weight: 500;
			color: #2563EB;
		}

		.card-register p a:hover {
			text-decoration: underline;
			color: #1D4ED8;
		}
	</style>
</head>
<body>

	<!-- login -->
	<div class="container">
		<div class="card-login">
			
			<h2>Login sebagai admin</h2>
			<form action="" method="post">
				<input type="text" name="user" placeholder="Username" class="input-control">
				<input type="password" name="pass" placeholder="Password" class="input-control">
				<button type="submit" name="login" class="btn">Login</button>
			</form>

			<?php

				// cek jika tombol login di tekan
				if(isset($_POST['login'])){

					include 'database.php';

					// cek data login
					$fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
					$username = mysqli_real_escape_string($conn, $_POST['user']);
					$password = $_POST['pass'];

					$query_select = "select * from users where username = '$username'";

					$run_query_select = mysqli_query($conn, $query_select);
					$d = mysqli_fetch_object($run_query_select);

					if ($d && password_verify($password, $d->password)) {
						
						// buat session
						$_SESSION['uid'] = $d->id;
						$_SESSION['fullName'] = $d->fullName;

						header('location:admin/index.php');

					}else{
						echo 'Username atau password salah';
					}

				}

			?>
			<div class="card-register">
				<p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
			</div>
		</div>

	</div>

</body>
</html>