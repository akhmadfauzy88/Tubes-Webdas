<?php
  include '../db.php';

  session_name("Spicy_Chicken_Wings");
  session_start();

  if (!isset($_SESSION['is_login_peminjaman_lak'])) {
    header("Location: ../index.php");
  }

  $query = "select *, transaksi.id as t_id, laboratory.kode as ruang, dosen.kode as kdosen from transaksi join laboratory on transaksi.ruangan = laboratory.id join dosen on transaksi.kode_dosen = dosen.id where (status = 'pending') AND keterangan = 'kelas'";
  $transaksi = $sql->query($query);

  $query = "select *, transaksi.id as t_id, laboratory.kode as ruang, dosen.kode as kdosen from transaksi join laboratory on transaksi.ruangan = laboratory.id join dosen on transaksi.kode_dosen = dosen.id where (status = 'pending') AND keterangan = 'praktikum'";
  $transaksi_praktikum = $sql->query($query);


  $query = "SELECT pesan.id as idnm, pesan, mhs.email as email, laboratory.kode as koda FROM pesan JOIN mhs ON pesan.user = mhs.id JOIN laboratory ON pesan.subject = laboratory.id";
  $pesan = $sql->query($query);

  $sql->close();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Control Panel | Peminjaman Ruangan FIT</title>
    <link rel="stylesheet" href="../Assets/Dashboard.css">
  </head>
  <body>
    <!-- Template Header -->
        <?php include 'Template/Header.php'; ?>
    <!-- Disini Batas Template -->
    <div class="konten">
      <h2>Control Panel</h2>
      <hr>
      <br>
      <h2>Peminjaman Ruang Kelas</h2>
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
                  <a href="?terima=TRUE&id=<?php echo $val['t_id'] ?>">Terima</a>
                  <a href="?tolak=TRUE&id=<?php echo $val['t_id'] ?>">Tolak</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <br>
      <h2>Pesan Masuk</h2>
      <div style="overflow:auto">
        <table border="1" width=100%>
          <tr>
            <td>No</td>
            <td>Email</td>
            <td>Ruangan</td>
            <td>Pesan</td>
          </tr>
          <?php foreach ($pesan as $key => $value): ?>
            <tr>
              <td><?php echo $value['idnm'] ?></td>
              <td><?php echo $value['email'] ?></td>
              <td><?php echo $value['koda'] ?></td>
              <td><?php echo $value['pesan'] ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </body>
</html>
