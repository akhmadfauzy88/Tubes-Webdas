    <?php
      if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: dashboard.php");
      }
    ?>

    <div class="menu">
      <div class="brand">
        CONTROL PANEL PEMINJAMAN RUANGAN FIT
      </div>
      <div class="item-menu">

      </div>
    </div>
