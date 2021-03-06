<?php 
  require_once('connection.php');

  if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)) {
      $username_error = 'Username empty.';
    }elseif(empty($password)) {
      $password_error = 'Password empty.';
    }else{
      $sql    = "SELECT * FROM data WHERE username='$username'";
      $query  = $conn->query($sql);
      $data   = mysqli_fetch_assoc($query);

      if(mysqli_num_rows($query) == 0) {
                $username_error = 'username wrong !';
            }elseif ($data['password'] != $password) {
                $password_error = 'Password wrong !';
            }else {
              session_start();
              $_SESSION['login'] = $data['id'];
              header('location:index.php');
        }
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

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Sign In | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										
									</div>
									<form method="POST">
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your username" />
                      <p class="text-center">
                        <?php if(isset($username_error)) {
                        echo $username_error;
                      } ?>
                    </p>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
                      <p class="text-center">
                        <?php 
                          if(isset($password_error)) {
                            echo $password_error;
                          }
                         ?>
                      </p>
											<small>
                        <a href="index.html">Forgot password?</a>
                      </small>
										</div>
										<div>
											<label class="form-check">
                      <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
                      <span class="form-check-label">
                        Remember me next time
                      </span>
                    </label>
										</div>
										<div class="text-center mt-3">
                       <?php
                            if(isset($error)) {
                                echo $error;
                            };
                        ?>
											<button type="submit" name="submit" class="btn btn-lg btn-primary">Sign in</button>
											<p class="mt-3">Don't have an account ? <a href="signup.php">Sign Up here</a></p>
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