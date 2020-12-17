<?php
   include("connect.php");
   session_start();
   $error = '';
   $active = '';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         if($myusername == 'admin') {
         header("location: welcome.php");
       } else {
         header("location: pacjentform.php");
       }
      }else {
         $error = " Incorrect data";
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style media="screen">
    .login-form {
      width: 50%;
      margin: 0 auto;
      margin-top: 10%;
      padding: 5%;
      background: #0062cc;
      box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }

    .login-form h3 {
      text-align: center;
      color: #fff;
    }

    .login-container form {
      padding: 10%;
    }

    .btnSubmit {
      width: 50%;
      border-radius: 1rem;
      padding: 1.5%;
      border: none;
      cursor: pointer;
    }

    .login-form .btnSubmit {
      font-weight: 600;
      color: #0062cc;
      background-color: #fff;
    }

    .login-form .newAcc {
      color: #fff;
      font-weight: 600;
      text-decoration: none;
    }
  </style>
  <title>Login</title>
</head>

<body>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <div class="container login-container">
    <div class="login-form">
      <h3>Login</h3>
      <form action="" method="post">
        <div class="form-group">
          <input type="text" name="username" class="form-control" placeholder="Login *" value="" />
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password *" value="" />
        </div>
        <div class="form-group">
          <input id="button" type="submit" class="btnSubmit" value="Login" />
        </div>
        <div class="form-group">
          <div style="font-size:20px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
          <a href="register.php" class="newAcc" value="newAcc"> Create an account </a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>