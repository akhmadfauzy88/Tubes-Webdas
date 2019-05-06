<?php session_start(); ?>

<?php
  if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($_SESSION['logged_in'])): ?>
      <title>Landing Page</title>
    <?php else: ?>
      <title>Login Page</title>
    <?php endif; ?>
    <style media="screen">
      @import url('https://fonts.googleapis.com/css?family=Roboto');
      body{
        font-family: Roboto;
        background: #f2f2f2;
        padding-top: 20%;
        height: 50vh;
        margin: 0;
		background-image: url(https://look.com.ua/pic/201209/2560x1440/look.com.ua-23890.jpg);
		background-size: cover;
      }
      h2{
        margin: 10px 0;
      }
      .login-form{
        background: white;
        border-radius: 10px;
        text-align: center;
        width: 350px;
        padding: 25px 20px;
        margin: auto;
      }
      .login-form input[type="text"], .login-form input[type="password"]{
        outline: none;
        width: 50%;
        margin: 5px;
        text-align: center;
        font-size: 15px;
        border: none;
        border-bottom: 2px solid #f2f2f2;
        transition: 0.5s;
      }
      .login-form input[type="text"]:focus, .login-form input[type="password"]:focus{
        outline: none;
        width: 90%;
        border: none;
        border-bottom: 2px solid lime;
      }
      .login-form input[type="submit"]{
        padding: 8px;
        margin: 5px;
        background: none;
        border: 2px solid #f2f2f2;
        border-radius: 5px;
      }
	  .login-form input[type=submit]{
		width: 260px;
		height: 35px;
		background: #fff;
		border: 1px solid #000000;
		cursor: pointer;
		border-radius: 2px;
		color: #a18d6c;
		font-family: 'Exo', sans-serif;
		font-size: 16px;
		font-weight: 400;
		padding: 6px;
		margin-top: 10px;
	  }
	  .login input[type=button]:hover{
		opacity: 0.8;
	  }
	  .login input[type=button]:active{
		opacity: 0.6;
	  }
	  .login input[type=button]:focus{
		outline: none;
	  }
    </style>
  </head>
  <body>
    <?php if (!isset($_POST['submit']) && !isset($_SESSION['logged_in'])): ?>
      <div class="login-form">
        <h2>LOGIN</h2>
        <form action="" method="post">
          <input type="text" name="username" placeholder="NIM" required>
          <br>
          <input type="password" name="password" placeholder="Password" required>
          <br>
          <input type="submit" name="submit" value="Login">
        </form>
      </div>
    <?php else: ?>
      <?php
        if (!isset($_SESSION['user']) && !isset($_SESSION['pass'])) {
          $user = $_POST['username'];
          $pass = md5($_POST['password']); //12345678

          if($user == "6702174072" && $pass == "25d55ad283aa400af464c76d713c07ad" || $user == "670217xxxx" && $pass == "25d55ad283aa400af464c76d713c07ad"){
            $_SESSION['logged_in'] = "True";
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            header("Location: login.php");
          }
		  else{
            echo "<script>alert('Username atau password salah !! \\n\\nUsername yang benar : 6702174072 \\nPassword yang benar : 12345678');window.location = 'login.php';</script>";
          }
        }
      ?>
      <style media="screen">
        body{
          padding: 10px;
        }
        h2{
          margin-top: 0;
        }
      </style>
      <h2>Landing Page</h2>
      <table>
        <tr>
          <td colspan="2">
            <form action="" method="post">
              <input type="submit" name="logout" value="Logout">
            </form>
          </td>
        </tr>
      </table>
    <?php endif; ?>
  </body>
</html>