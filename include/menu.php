<!-- Nav Item - Dashboard -->
<li class="nav-item 
        <?php if (!$_GET['page']) : ?>
            active
        <?php endif; ?>
">
    <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<?php if ($_SESSION['role'] == 'Admin') : ?>
    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item
        <?php if ($_GET['page'] == 'user') : ?>
            active
        <?php endif; ?>
">
        <a class="nav-link collapsed" href="?page=user">
            <i class="fas fa-fw fa-users"></i>
            <span>Daftar User</span>
        </a>
    </li>

<?php endif; ?>

<li class="nav-item">
    <a class="nav-link collapsed" href="logout.php">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span>
    </a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">



<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->
<div class="sidebar-card">
    <img class="sidebar-card-illustration mb-2" src="assets/img/undraw_rocket.svg" alt="">
    <p class="text-center mb-2"><strong>Source code project UTS</strong> bisa di download di github</p>
    <a class="btn btn-success btn-sm" target="_blank" rel="nofollow" href="https://startbootstrap.com/theme/sb-admin-pro">Lihat Code</a>
</div>