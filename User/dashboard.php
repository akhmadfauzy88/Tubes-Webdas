<?php
  include '../db.php';

  session_name("Spicy_Chicken_Wings");
  session_start();

  if (!isset($_SESSION['is_login_peminjaman'])) {
    header("Location: ../index.php");
  }

  $query = "select * from penjadwalan join laboratory on penjadwalan.ruang = laboratory.id join kelas on penjadwalan.kelas = kelas.id WHERE penjadwalan.status != 'canceled'";
  $hasil = $sql->query($query);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard | Peminjaman Ruangan FIT</title>
    <link rel="stylesheet" href="../Assets/Dashboard.css">
  </head>
  <body>
    <div class="menu">
      <div class="brand">
        PEMINJAMAN RUANGAN FIT
      </div>
      <div class="item-menu">
        <ul>
          <li>
            <a href="dashboard.php">HOME</a>
          </li>
          <li>
            <a href="#">STATUS</a>
          </li>
          <li>
            <a href="#">HISTORY</a>
          </li>
          <li>
            <a href="#">FEEDBACK</a>
          </li>
        </ul>
      </div>
    </div>
  </body>
</html>
