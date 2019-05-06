<?php
  include '../db.php';

  session_name("Spicy_Chicken_Wings");
  session_start();

  if (!isset($_SESSION['is_login_peminjaman'])) {
    header("Location: ../index.php");
  }

  $query = "select * from laboratory";
  $transaksi = $sql->query($query);

  $sql->close();

  if (isset($_POST['submit_pesan'])) {
    include '../db.php';
    $user = $_POST['id'];
    $subject = $_POST['subject'];
    $pesan = $_POST['pesan'];

    $query = "insert into pesan (id, user,subject,pesan) values (NULL,?,?,?)";
    $q = $sql->prepare($query);
    $q->bind_param("sss", $user, $subject, $pesan);

    $q->execute();

    $log_sukses = TRUE;

    $q->close();
    $sql->close();
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Input Feedback | Peminjaman Ruangan FIT</title>
    <link rel="stylesheet" href="../Assets/Dashboard.css">
  </head>
  <body>
    <!-- Template Header -->
        <?php include 'Template/Header.php'; ?>
    <!-- Disini Batas Template -->
    <div class="konten">
      <h2>Input Feedback</h2>
      <hr>
      <?php if (isset($log_sukses)): ?>
        <div style="text-align:center;border:1px solid green;padding:5px; margin:5px 0;background:green;">
          <h2>Input Sukses</h2>
        </div>
      <?php endif; ?>
      <div class="feed">
        <form action="" method="post">
          <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
          <label>Nama</label>
          <input type="text" name="nama" value="<?php echo $_SESSION['nama_depan'] ?> <?php echo $_SESSION['nama_belakang'] ?>" disabled>
          <label>Email</label>
          <input type="text" name="" value="<?php echo $_SESSION['email'] ?>" disabled>
          <label>Subject</label>
          <select name="subject">
            <?php foreach ($transaksi as $key => $value): ?>
              <option value="<?php echo $value['id'] ?>"><?php echo $value['kode'] ?></option>
            <?php endforeach; ?>
          </select>
          <label>Pesan</label>
          <textarea name="pesan"></textarea>
          <input type="submit" name="submit_pesan" value="SUBMIT">
        </form>
      </div>
    </div>
  </body>
</html>
