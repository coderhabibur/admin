<?php 
	require_once('connection.php');

	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$date_pickup = date("Y-m-d h:i:sa");

		// username exist query
		$sql 		= "SELECT * FROM data WHERE username='$username'";
		$user_query = $conn->query($sql);
		$data   	= mysqli_fetch_assoc($user_query);

		// Count Email
	    if(empty($name)) {
	      $name_error = 'Name empty.';
	    }elseif(empty($username)) {
	      $username_error = 'Username empty.';
	    }elseif(mysqli_num_rows($user_query) != 0) {
           $username_error = 'Username not available !';
        }elseif(empty($email)) {
	      $email_error = 'Email empty.';
	    }elseif(empty($password)) {
	      $password_error = 'Password empty.';
	    }else{
	    	 $insert_data = "INSERT INTO data(name,username,email,gender,address,password,registration_date) VALUES('$name','$username','$email','male','madilahat','$password','$date_pickup')";
	    	 $insert_query = $conn->query($insert_data);
	    	 header('location:signin.php');
	    }
	}

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

	<title>Sign Up | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Get started</h1>							
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="POST">
										<div class="mb-3">
											<label class="form-label">Name</label>
											<input class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" />
											<p class="text-center">
						                        <?php if(isset($name_error)) {
						                        echo $name_error;
						                      } ?>
						                    </p>
										</div>
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your Username" />
											<p class="text-center">
						                        <?php if(isset($username_error)) {
						                        echo $username_error;
						                      } ?>
						                    </p>
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
											<p class="text-center">
						                        <?php if(isset($email_error)) {
						                        echo $email_error;
						                      } ?>
						                    </p>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
											<p class="text-center">
						                        <?php if(isset($password_error)) {
						                        echo $password_error;
						                      } ?>

						                    </p>
										</div>
										<div class="text-center mt-3">
											<button type="submit" name="submit" class="btn btn-lg btn-primary">Sign up</button>
											<p class="mt-3">Already have an account ? <a href="signin.php">Log In</a></p>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>