<?php
  include '../db.php';

  session_name("Spicy_Chicken_Wings");
  session_start();

  if (!isset($_SESSION['is_login_peminjaman'])) {
    header("Location: ../index.php");
  }

  $idx = $_SESSION['id'];
  $kelas = $_SESSION['kelas'];

  $query = "select * from laboratory";
  $transaksi = $sql->query($query);

  $query = "select * from dosen";
  $dosen = $sql->query($query);

  if (isset($_POST['submit'])) {

    $ruang = $_POST['ruang'];
    $jam_masuk = $_POST['jam_masuk'];
    $jumlah_jam = $_POST['pinjamruangan'];
    $matakuliah = $_POST['matakuliah'];
    $kode_dosen = $_POST['kode_dosen'];
    $tanggal = $_POST['tanggal'];
    $kebutuhan = $_POST['kebutuhan'];
    $bukti = $_POST['bukti'];

    $query = "insert into transaksi (id,peminjam,ruangan,jam_masuk,jumlah_jam,matakuliah,kode_dosen,tanggal,kebutuhan,bukti,status,keterangan) values (NULL,?,?,?,?,?,?,?,?,?,'pending','praktikum')";
    $q = $sql->prepare($query);
    $q->bind_param("sssssssss", $idx, $ruang, $jam_masuk, $jumlah_jam, $matakuliah, $kode_dosen, $tanggal, $kebutuhan, $bukti);

    $q->execute();

    $q = "select * from transaksi order by id DESC limit 1";
    $fff = $sql->query($q);
    foreach ($fff as $key => $value) {
      $idk = $value['id'];
    }

    $jm = $jam_masuk;

    if ($jumlah_jam > 1) {
      //INSERT INTO `penjadwalan`(`id`, `tanggal`, `jam`, `ruang`, `kelas`, `status`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
      $q = "insert into penjadwalan (id,tanggal,jam,ruang,kelas,status,idx) values (NULL, '$tanggal', '$jam_masuk', '$ruang', '$kelas', 'pending', '$idk')";
      //echo $q;
      $sql->query($q);
      for($i=1;$i<$jumlah_jam;$i++){
        $tambahjam = strtotime($jm) + 60*60;
        $jm = date('H:i:s', $tambahjam);
        $dat = array(
          'tanggal' => $tanggal,
          'jam' => $jm,
          'ruang' => $ruang,
          'kelas' => $kelas,
          'status' => 'pending'
        );

        $q = "insert into penjadwalan (id,tanggal,jam,ruang,kelas,status,idx) values (NULL, '$dat[tanggal]', '$dat[jam]', '$dat[ruang]', '$dat[kelas]', 'pending', $idk)";
        $sql->query($q);
      }
    }else{
      $dat = array(
        'tanggal' => $tanggal,
        'jam' => $jam_masuk,
        'ruang' => $ruang,
        'kelas' => $kelas,
        'status' => 'pending'
      );
      $q = "insert into penjadwalan (id,tanggal,jam,ruang,kelas,status,idx) values (NULL, '$dat[tanggal]', '$dat[jam]', '$dat[ruang]', '$dat[kelas]', 'pending', $idk)";
      $sql->query($q);
    }

  }

  $sql->close();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Peminjaman Ruang Praktikum | Peminjaman Ruangan FIT</title>
    <link rel="stylesheet" href="../Assets/Dashboard.css">
  </head>
  <body>
    <!-- Template Header -->
        <?php include 'Template/Header.php'; ?>
    <!-- Disini Batas Template -->
    <div class="konten">
      <h2>Peminjaman Ruang Praktikum</h2>
      <hr>
      <div class="kelas">
        <form class="" action="" method="post">
          <label for="">Ruangan</label>
          <select class="form-control" name="ruang" required>
            <?php foreach ($transaksi as $val): ?>
              <?php if ($val['lab_name'] != "-"): ?>
                <option value="<?php echo $val['id']; ?>"><?php echo $val['nama']." - ".$val['kode']; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
          <label for="">Jam Masuk</label>
          <select class="form-control" name="jam_masuk" required>
            <option value="08:00:00">08:00</option>
            <option value="09:00:00">09:00</option>
            <option value="10:00:00">10:00</option>
            <option value="11:00:00">11:00</option>
            <option value="12:00:00">12:00</option>
            <option value="13:00:00">13:00</option>
            <option value="14:00:00">14:00</option>
            <option value="15:00:00">15:00</option>
            <option value="16:00:00">16:00</option>
            <option value="17:00:00">17:00</option>
            <option value="18:00:00">18:00</option>
            <option value="19:00:00">19:00</option>
          </select>
          <label for="">Jumlah Jam</label>
          <br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pinjamruangan" id="inlineRadio1" value="1" required>
            <label class="form-check-label" for="inlineRadio1">1</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pinjamruangan" id="inlineRadio1" value="2" required>
            <label class="form-check-label" for="inlineRadio1">2</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pinjamruangan" id="inlineRadio1" value="3" required>
            <label class="form-check-label" for="inlineRadio1">3</label>
          </div>
          <label for="">Mata Kuliah</label>
          <input type="text" name="matakuliah" value="" class="form-control" required>
          <label for="">Kode Dosen</label>
          <select class="form-control" name="kode_dosen" required>
            <?php foreach ($dosen as $val): ?>
              <option value="<?php echo $val['id']; ?>"><?php echo $val['nama_depan']." ".$val['nama_belakang']." - ".$val['kode']; ?></option>
            <?php endforeach; ?>
          </select>
          <label for="">Tanggal</label>
          <input type="date" name="tanggal" value="" class="form-control" required>
          <label for="">Kebutuhan</label>
          <textarea name="kebutuhan" style="width:100%" required></textarea>
          <label for="">Bukti Peminjaman</label>
          <input type="file" name="bukti" / required>
          <input type="submit" name="submit" value="SUBMIT" class="form-control" style="margin-top:10px;">
        </form>
      </div>
    </div>
  </body>
</html>
