<?php 
  require_once('connection.php');

  if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username)) {
      $error = 'username empty.';
    }elseif(empty($password)) {
      $error = 'password empty.';
    }else{
      $sql = "SELECT * FROM data WHERE username='$username'";
      $query = $conn->query($sql);
      $data = mysqli_fetch_assoc($query);

      var_dump($data);

      if(mysqli_num_rows($query) == 0) {
                $error = 'username wrong !';
            }elseif ($data['password'] != $password) {
                $error = 'Password wrong !';
            }else {
              session_start();
              $_SESSION['login'] = $data['id'];
              header('location:index.php');
        }
    }
  }

 ?>

<html>
  <head>
    <title>Login Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  </head>
  
  <body>
    <div id="container">
      <h1 id="main-title">Login</h1>
      
      <form method="POST">
        <input id="email" name="username" placeholder="Username" type="text">
        <br>
        <input id="password" name="password" placeholder="Password" type="password">
        <br>
        <?php
                if(isset($error)) {
                    echo $error;
                };
            ?>
        <input id="submit" name="submit" type="button" value="Submit">
        
      </form>
      
    </div>
  </body>
</html>