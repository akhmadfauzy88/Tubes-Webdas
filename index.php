<?php
  include 'db.php';

  session_name("Spicy_Chicken_Wings");
  session_start();

  if (isset($_POST['login'])) {
    $user = htmlspecialchars($_POST['username']);
    $pass = md5(htmlspecialchars($_POST['password']));

    //Cek Mahasiswa
    $query = $sql->prepare("select * from mhs where username = ? and password = ?");
    $query->bind_param('ss', $user, $pass);

    if ($query->execute()) {
      $hasil = $query->get_result();

      foreach ($hasil as $key => $value) {
        $_SESSION['id'] = $value['id'];
        $_SESSION['nim'] = $value['nim'];
        $_SESSION['nama_depan'] = $value['nama_depan'];
        $_SESSION['nama_belakang'] = $value['nama_belakang'];
        $_SESSION['email'] = $value['email'];
        $_SESSION['is_login_peminjaman'] = TRUE;
      }

    }
    $query->close();

    //Cek Dosen
    $query = $sql->prepare("select * from dosen where username = ? and password = ?");
    $query->bind_param('ss', $user, $pass);

    if ($query->execute()) {
      $hasil = $query->get_result();

      foreach ($hasil as $key => $value) {
        $_SESSION['id'] = $value['id'];
        $_SESSION['nip'] = $value['nip'];
        $_SESSION['nama_belakang'] = $value['nama_belakang'];
        $_SESSION['email'] = $value['email'];
        $_SESSION['is_login_peminjaman'] = TRUE;
      }

    }
    $query->close();

    echo $_SESSION['is_login_peminjaman'];

  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page | Peminjaman Kelas</title>
    <link rel="stylesheet" href="Assets/Login.css">
  </head>
  <body>
    <div class="background">
      <div class="container">
        <div class="row">
          <div class="form" style="height:100%;padding:10% 0px;">
            <h2>LOGIN FORM</h2>
            <form action="" method="post" onsubmit="return front_defense();">
              <input type="text" name="username" id="user" placeholder="Username" required />
              <input type="password" name="password" id="pass" placeholder="Password" required />
              <input type="submit" name="login" value="LOGIN" />
            </form>
            <hr>
            <p>
              Please Login with your SSO account!
            </p>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function front_defense(){
        var user = document.getElementById('user').value;
        var pattern_user = /([A-Za-z0-9\-\_])+$/;

        if (!(pattern_user.test(user))) {
          alert("Format Username Salah!");
          return false;
        }
      }
    </script>
  </body>
</html>
