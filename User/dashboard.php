<?php
  include '../db.php';

  session_name("Spicy_Chicken_Wings");
  session_start();

  if (!isset($_SESSION['is_login_peminjaman'])) {
    header("Location: ../index.php");
  }

  $query = "select * from penjadwalan join laboratory on penjadwalan.ruang = laboratory.id join kelas on penjadwalan.kelas = kelas.id WHERE penjadwalan.status != 'canceled' and penjadwalan.status != 'declined'";
  $transaksi = $sql->query($query);

  if (isset($_GET['reset'])) {
    header("Location: dashboard.php");
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard | Peminjaman Ruangan FIT</title>
    <link rel="stylesheet" href="../Assets/Dashboard.css">
  </head>
  <body>
<!-- Template Header -->
    <?php include 'Template/Header.php'; ?>
<!-- Disini Batas Template -->

    <?php
      date_default_timezone_set("Asia/Jakarta");
      if (isset($_GET['sub'])) {
        $tanggal = $_GET['tgl'];
      }else {
        $tanggal = date("Y-m-d");
      }
    ?>

    <div class="menu" style="margin: 10px 0;">
      <div class="filter">
        <form action="" method="get">
          <input type="date" name="tgl" />
          <input type="submit" name="sub" value="FILTER">
          <input type="submit" name="reset" value="RESET">
        </form>
      </div>
      <div class="pinjam">
        <a href="kelas.php">[+] Pinjam Ruang Kelas</a>
        <a href="praktikum.php">[+] Pinjam Ruang Praktikum</a>
      </div>
    </div>

    <div class="konten">
      <h2>Jadwal Peminjaman <?php echo date("Y M d", strtotime($tanggal)) ?> </h2>
      <hr>
      <div style="overflow:auto;">
        <table border="1" class="jadwal-ruangan" align="center">
          <tr>
            <td>Jam \ Ruangan</td>
            <td>A1</td>
            <td>A2</td>
            <td>A7</td>
            <td>B1</td>
            <td>B2</td>
            <td>D2</td>
            <td>D3</td>
            <td>D5</td>
            <td>E4</td>
            <td>G2</td>
          </tr>
          <tr>
            <td>08:00</td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "08:00:00" && $value['kode'] == "A1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "08:00:00" && $value['kode'] == "A2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "08:00:00" && $value['kode'] == "A7" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "08:00:00" && $value['kode'] == "B1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "08:00:00" && $value['kode'] == "B2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "08:00:00" && $value['kode'] == "D2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "08:00:00" && $value['kode'] == "D3" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "08:00:00" && $value['kode'] == "D5" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "08:00:00" && $value['kode'] == "E4" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "08:00:00" && $value['kode'] == "G2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <td>09:00</td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "09:00:00" && $value['kode'] == "A1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "09:00:00" && $value['kode'] == "A2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "09:00:00" && $value['kode'] == "A7" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "09:00:00" && $value['kode'] == "B1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td><td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "09:00:00" && $value['kode'] == "B2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "09:00:00" && $value['kode'] == "D2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td><td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "09:00:00" && $value['kode'] == "D3" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "09:00:00" && $value['kode'] == "D5" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td><td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "09:00:00" && $value['kode'] == "E4" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "09:00:00" && $value['kode'] == "G2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <td>10:00</td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "10:00:00" && $value['kode'] == "A1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "10:00:00" && $value['kode'] == "A2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "10:00:00" && $value['kode'] == "A7" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "10:00:00" && $value['kode'] == "B1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "10:00:00" && $value['kode'] == "B2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "10:00:00" && $value['kode'] == "D2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "10:00:00" && $value['kode'] == "D3" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "10:00:00" && $value['kode'] == "D5" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "10:00:00" && $value['kode'] == "E4" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "10:00:00" && $value['kode'] == "G2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <td>11:00</td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "11:00:00" && $value['kode'] == "A1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "11:00:00" && $value['kode'] == "A2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "11:00:00" && $value['kode'] == "A7" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "11:00:00" && $value['kode'] == "B1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "11:00:00" && $value['kode'] == "B2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "11:00:00" && $value['kode'] == "D2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "11:00:00" && $value['kode'] == "D3" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "11:00:00" && $value['kode'] == "D5" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "11:00:00" && $value['kode'] == "E4" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "11:00:00" && $value['kode'] == "G2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <td>12:00</td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "12:00:00" && $value['kode'] == "A1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "12:00:00" && $value['kode'] == "A2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "12:00:00" && $value['kode'] == "A7" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "12:00:00" && $value['kode'] == "B1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "12:00:00" && $value['kode'] == "B2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "12:00:00" && $value['kode'] == "D2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "12:00:00" && $value['kode'] == "D3" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "12:00:00" && $value['kode'] == "D5" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "12:00:00" && $value['kode'] == "E4" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "12:00:00" && $value['kode'] == "G2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <td>13:00</td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "13:00:00" && $value['kode'] == "A1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "13:00:00" && $value['kode'] == "A2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "13:00:00" && $value['kode'] == "A7" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "13:00:00" && $value['kode'] == "B1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "13:00:00" && $value['kode'] == "B2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "13:00:00" && $value['kode'] == "D2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "13:00:00" && $value['kode'] == "D3" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "13:00:00" && $value['kode'] == "D5" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "13:00:00" && $value['kode'] == "E4" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "13:00:00" && $value['kode'] == "G2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <td>14:00</td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "14:00:00" && $value['kode'] == "A1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "14:00:00" && $value['kode'] == "A2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "14:00:00" && $value['kode'] == "A7" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "14:00:00" && $value['kode'] == "B1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "14:00:00" && $value['kode'] == "B2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "14:00:00" && $value['kode'] == "D2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "14:00:00" && $value['kode'] == "D3" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "14:00:00" && $value['kode'] == "D5" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "14:00:00" && $value['kode'] == "E4" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "14:00:00" && $value['kode'] == "G2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <td>15:00</td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "15:00:00" && $value['kode'] == "A1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "15:00:00" && $value['kode'] == "A2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "15:00:00" && $value['kode'] == "A7" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "15:00:00" && $value['kode'] == "B1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "15:00:00" && $value['kode'] == "B2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "15:00:00" && $value['kode'] == "D2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "15:00:00" && $value['kode'] == "D3" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "15:00:00" && $value['kode'] == "D5" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "15:00:00" && $value['kode'] == "E4" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "15:00:00" && $value['kode'] == "G2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <td>16:00</td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "16:00:00" && $value['kode'] == "A1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "16:00:00" && $value['kode'] == "A2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "16:00:00" && $value['kode'] == "A7" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "16:00:00" && $value['kode'] == "B1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "16:00:00" && $value['kode'] == "B2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "16:00:00" && $value['kode'] == "D2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "16:00:00" && $value['kode'] == "D3" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "16:00:00" && $value['kode'] == "D5" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "16:00:00" && $value['kode'] == "E4" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "16:00:00" && $value['kode'] == "G2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <td>17:00</td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "17:00:00" && $value['kode'] == "A1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "17:00:00" && $value['kode'] == "A2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "17:00:00" && $value['kode'] == "A7" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "17:00:00" && $value['kode'] == "B1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "17:00:00" && $value['kode'] == "B2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "17:00:00" && $value['kode'] == "D2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "17:00:00" && $value['kode'] == "D3" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "17:00:00" && $value['kode'] == "D5" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "17:00:00" && $value['kode'] == "E4" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "17:00:00" && $value['kode'] == "G2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
          </tr>
          <tr>
            <td>18:00</td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "18:00:00" && $value['kode'] == "A1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "18:00:00" && $value['kode'] == "A2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "18:00:00" && $value['kode'] == "A7" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "18:00:00" && $value['kode'] == "B1" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "18:00:00" && $value['kode'] == "B2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "18:00:00" && $value['kode'] == "D2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "18:00:00" && $value['kode'] == "D3" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "18:00:00" && $value['kode'] == "D5" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "18:00:00" && $value['kode'] == "E4" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <?php foreach ($transaksi as $value): ?>
                <?php if ($value['jam'] == "18:00:00" && $value['kode'] == "G2" && $value['tanggal'] == $tanggal): ?>
                  <?php echo $value['nama_kelas'] ?>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>
