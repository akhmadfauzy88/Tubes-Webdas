<?php
  include '../db.php';

  session_name("Spicy_Chicken_Wings");
  session_start();

  if (!isset($_SESSION['is_login_peminjaman'])) {
    header("Location: ../index.php");
  }

  $idx = $_SESSION['id'];

  $query = "select *, transaksi.id as t_id, laboratory.kode as ruang, dosen.kode as kdosen from transaksi join laboratory on transaksi.ruangan = laboratory.id join dosen on transaksi.kode_dosen = dosen.id where (status = 'pending' OR status = 'approved') AND keterangan = 'kelas' AND peminjam = $idx";
  $transaksi = $sql->query($query);

  $query = "select *, transaksi.id as t_id, laboratory.kode as ruang, dosen.kode as kdosen from transaksi join laboratory on transaksi.ruangan = laboratory.id join dosen on transaksi.kode_dosen = dosen.id where (status = 'pending' OR status = 'approved') AND keterangan = 'praktikum' AND peminjam = $idx";
  $transaksi_praktikum = $sql->query($query);

  $sql->close();

  if (isset($_GET['batalkan'])) {
    //UPDATE 'transaksi' SET 'status' = 'canceled' WHERE 'transaksi'.'id' = 30;
    include '../db.php';
    $idn = $_GET['id'];

    $query = "Update transaksi SET status = 'canceled' WHERE id = ?";
    $q = $sql->prepare($query);

    $q->bind_param("s", $idn);

    $q->execute();

    $query = "Update penjadwalan SET status = 'canceled' WHERE idx = ?";
    $q = $sql->prepare($query);

    $q->bind_param("s", $idn);

    $q->execute();
    header("Location: status.php");
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Status Peminjaman | Peminjaman Ruangan FIT</title>
    <link rel="stylesheet" href="../Assets/Dashboard.css">
  </head>
  <body>
    <!-- Template Header -->
        <?php include 'Template/Header.php'; ?>
    <!-- Disini Batas Template -->
    <div class="konten">
      <h2>Status Peminjaman</h2>
      <hr>
      <br>
      <h2>Status Peminjaman Ruang Kelas</h2>
      <div style="overflow:auto">
        <table border="1" width=100%>
          <thead>
            <tr>
              <th>Ruangan</th>
              <th>Jam Masuk</th>
              <th>Jumlah Jam</th>
              <th>Mata Kuliah</th>
              <th>Kode Dosen</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($transaksi as $val): ?>
              <tr>
                <td><?php echo $val['ruang']; ?></td>
                <td><?php echo $val['jam_masuk']; ?></td>
                <td><?php echo $val['jumlah_jam']; ?></td>
                <td><?php echo $val['matakuliah']; ?></td>
                <td><?php echo $val['kdosen']; ?></td>
                <td><?php echo $val['tanggal']; ?></td>
                <td><?php echo $val['status']; ?></td>
                <td>
                  <a href="?batalkan=TRUE&id=<?php echo $val['t_id'] ?>">Batalkan</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <br>
      <br>
      <h2>History Peminjaman Ruang Praktikum</h2>
      <div style="overflow:auto">
        <table border="1" width=100%>
          <thead>
            <tr>
              <th>Ruangan</th>
              <th>Jam Masuk</th>
              <th>Jumlah Jam</th>
              <th>Mata Kuliah</th>
              <th>Kode Dosen</th>
              <th>Tanggal</th>
              <th>Kebutuhan Alat</th>
              <th>Bukti</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($transaksi_praktikum as $val): ?>
              <tr>
                <td><?php echo $val['ruang']; ?></td>
                <td><?php echo $val['jam_masuk']; ?></td>
                <td><?php echo $val['jumlah_jam']; ?></td>
                <td><?php echo $val['matakuliah']; ?></td>
                <td><?php echo $val['kdosen']; ?></td>
                <td><?php echo $val['tanggal']; ?></td>
                <td><?php echo $val['kebutuhan']; ?></td>
                <td><?php echo $val['bukti']; ?></td>
                <td><?php echo $val['status']; ?></td>
                <td>
                  <a href="?batalkan=TRUE&id=<?php echo $val['t_id'] ?>">Batalkan</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
  </body>
</html>
