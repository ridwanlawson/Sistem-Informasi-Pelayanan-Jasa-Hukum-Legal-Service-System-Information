
<?php 
  if (@$_SESSION['level']=='admin') {
?>
          <ul class="sidebar-menu">
            <li class="menu-header"></li>
            <li class="<?php if (empty($_GET['hd']) && empty($_GET['fd'])) {echo 'active';} ?>"><a class="nav-link" href="index.php" ><i class="fas fa-home"></i><span>Dashboard</span></a></li>

            <li class="<?php if (@$_GET['hd']=='profil' && @$_GET['fd']=='perusahaan') {echo 'active';} ?>"><a class="nav-link" href="index.php?hd=profil&fd=perusahaan"><i class="fas fa-user"></i><span>Profil</span></a></li>

            <li class="<?php if (@$_GET['hd']=='master' && @$_GET['fd']=='pengumuman') {echo 'active';} ?>"><a class="nav-link" href="index.php?hd=master&fd=pengumuman"><i class="fas fa-bullhorn" aria-hidden="true"></i><span>Pemberitahuan</span></a></li>
            
            <li <?php if (@$_GET['fd']=='perkembangan') {echo 'class=active';} ?>>
              <a class="nav-link" href="index.php?hd=user&fd=perkembangan">
                <i class="fas fa-chart-line"></i>
                <span>Perkembangan Kasus</span>
              </a>
            </li>
            <li <?php if (@$_GET['fd']=='jadwal') {echo 'class=active';} ?>>
              <a class="nav-link" href="index.php?hd=user&fd=jadwal">
                <i class="fas fa-clock"></i>
                <span>Jadwal Konsultasi</span>
              </a>
            </li>

            <li class="menu-header">Master</li>
            <!-- <li class="<?php if ($_GET['hd'] == 'chat') {echo 'active';} ?>"><a class="nav-link" href="status.php?hd=chat" ><i class="fas fa-envelope"></i><span>Chat</span></a></li> -->
            <li class="dropdown <?php if (@$_GET['hd']=='master') {echo 'active';} ?>">
              <a href="index.php#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master</span></a>
              <ul class="dropdown-menu">
                <li <?php if (@$_GET['fd']=='file') {echo 'class=active';} ?>><a class="nav-link" href="index.php?hd=master&fd=file">Pembiayaan</a></li>
                <li <?php if (@$_GET['fd']=='banner') {echo 'class=active';} ?>><a class="nav-link" href="index.php?hd=master&fd=banner">Banner</a></li>
                <li <?php if (@$_GET['fd']=='jenis') {echo 'class=active';} ?>><a class="nav-link" href="index.php?hd=master&fd=jenis">Jenis</a></li>
                <li <?php if (@$_GET['fd']=='user') {echo 'class=active';} ?>><a class="nav-link" href="index.php?hd=master&fd=user">User</a></li>
              </ul>
            </li>
            <li <?php if (@$_GET['fd']=='selesai') {echo 'class=active';} ?>><a class="nav-link" href="index.php?hd=transaksi&fd=selesai"><i class="fas fa-check"></i><span>Laporan Kasus Selesai</span></a></li>
<?php
  }elseif (@$_SESSION['level']=='user'){
?>
          <ul class="sidebar-menu">
            <li class="menu-header"></li>
            <li class="<?php if (empty($_GET['hd']) && empty($_GET['fd'])) {echo 'active';} ?>"><a class="nav-link" href="index.php" ><i class="fas fa-home"></i><span>Dashboard</span></a></li>
            <li class="menu-header">User Menu</li>

            <li <?php if (@$_GET['fd']=='perkembangan') {echo 'class=active';} ?>>
              <a class="nav-link" href="index.php?hd=user&fd=perkembangan">
                <i class="fas fa-chart-line"></i>
                <span>Perkembangan Kasus</span>
              </a>
            </li>
            <li <?php if (@$_GET['fd']=='jadwal') {echo 'class=active';} ?>>
              <a class="nav-link" href="index.php?hd=user&fd=jadwal">
                <i class="fas fa-clock"></i>
                <span>Jadwal Konsultasi</span>
              </a>
            </li>
            <li <?php if (@$_GET['fd']=='pembiayaan') {echo 'class=active';} ?>>
              <a class="nav-link" href="index.php?hd=user&fd=pembiayaan">
                <i class="fas fa-dollar-sign"></i>
                <span>Pembiayaan Perkasus</span>
              </a>
            </li>
<?php    
  }elseif (@$_SESSION['level']=='hukum'){
?>
          <ul class="sidebar-menu">
            <li class="menu-header"></li>
            <li class="<?php if (empty($_GET['hd']) && empty($_GET['fd'])) {echo 'active';} ?>"><a class="nav-link" href="index.php" ><i class="fas fa-home"></i><span>Dashboard</span></a></li>
            <li class="menu-header">Starter</li>

            <li <?php if (@$_GET['fd']=='jadwal') {echo 'class=active';} ?>><a class="nav-link" href="index.php?hd=user&fd=jadwal"><i class="fas fa-clock"></i><span>Jadwal Konsultasi</span></a></li>            

            <li <?php if (@$_GET['fd']=='pembiayaan') {echo 'class=active';} ?>><a class="nav-link" href="index.php?hd=user&fd=pembiayaan"><i class="fas fa-dollar-sign"></i><span>Pembiayaan Perkasus</span></a></li>
            
            <li <?php if (@$_GET['fd']=='perkembangan') {echo 'class=active';} ?>><a class="nav-link" href="index.php?hd=user&fd=perkembangan"><i class="fas fa-chart-line"></i><span>Perkembangan Kasus</span></a></li>
            
            <li <?php if (@$_GET['fd']=='selesai') {echo 'class=active';} ?>><a class="nav-link" href="index.php?hd=transaksi&fd=selesai"><i class="fas fa-check"></i><span>Laporan Kasus Selesai</span></a></li>
<?php    
  }else{
?>
          <ul class="sidebar-menu">
            <li class="menu-header"></li>
            <li class="<?php if (empty($_GET['hd']) && empty($_GET['fd'])) {echo 'active';} ?>"><a class="nav-link" href="index.php" ><i class="fas fa-home"></i><span>Dashboard</span></a></li>
<!--             <li class="menu-header">User Menu</li>

            <li <?php if (@$_GET['fd']=='jadwal') {echo 'class=active';} ?>>
              <a class="nav-link" href="index.php?hd=user&fd=jadwal">
                <i class="fas fa-clock"></i>
                <span>Jadwal Konsultasi</span>
              </a>
            </li>
            <li <?php if (@$_GET['fd']=='pembiayaan') {echo 'class=active';} ?>>
              <a class="nav-link" href="index.php?hd=user&fd=pembiayaan">
                <i class="fas fa-dollar-sign"></i>
                <span>Pembiayaan Perkasus</span>
              </a>
            </li> -->
<?php    
  }
?>