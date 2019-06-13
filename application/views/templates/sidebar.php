<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Syo Store</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Query Menu -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = " SELECT user_menu.id, menu 
                               FROM user_menu JOIN user_access_menu 
                               ON user_menu.id = user_access_menu.menu_id
                               WHERE user_access_menu.role_id = $role_id
                            ORDER BY user_access_menu.menu_id ASC
                            ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- Looping Menu -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!-- jika Sub Menu lebih dari 1-->
        <?php if ($m['menu'] == "Transaksi") : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>
                        <?= $m['menu']; ?>
                    </span>
                </a>
            <?php elseif ($m['menu'] == "Laporan") : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>
                        <?= $m['menu']; ?>
                    </span>
                </a>
            <?php endif; ?>

            <!-- Looping Sub-Menu sesuai Menu -->
            <?php
            $menuId = $m['id'];
            $query_sub_menu =  " SELECT * 
                                      FROM user_sub_menu 
                                      WHERE menu_id = $menuId
                                      AND is_active = 1
                                   ";
            $subMenu = $this->db->query($query_sub_menu)->result_array();
            ?>

            <?php foreach ($subMenu as $sm) : ?>
                <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>

                <!-- jika Sub Menu lebih dari 1 lanjutan -->
                <?php if ($m['menu'] == "Transaksi") : ?>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url($sm['url']); ?>">
                                <i class="<?= $sm['icon']; ?>"></i>
                                <span><?= $sm['title']; ?></span>
                            </a>
                        </div>
                    </div>
                </li>
            <?php elseif ($m['menu'] == "Laporan") : ?>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['title']; ?></span>
                        </a>
                    </div>
                </div>
                </li>
            <?php else : ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span>
                </a>
            <?php endif; ?>
            </li>
        <?php endforeach ?>
        <!-- Divider -->
        <hr class="sidebar-divider mt-3">
    <?php endforeach; ?>

    <div class=" sidebar-heading">
        Logout
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<div id="content-wrapper">

    <div class="container-fluid">