    <?php
      if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: dashboard.php");
      }
    ?>

    <div class="menu">
      <div class="brand">
        PEMINJAMAN RUANGAN FIT | Hello <?php echo $_SESSION['nama_depan']." ".$_SESSION['nama_belakang'] ?>
      </div>
      <div class="item-menu">
        <ul>
          <li>
            <a href="dashboard.php">HOME</a>
          </li>
          <li>
            <a href="status.php">STATUS</a>
          </li>
          <li>
            <a href="history.php">HISTORY</a>
          </li>
          <li>
            <a href="feedback.php">FEEDBACK</a>
          </li>
          <li>
            <a href="?logout=TRUE">Logout</a>
          </li>
        </ul>
      </div>
    </div>
