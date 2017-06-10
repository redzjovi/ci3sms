<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= site_url('backend/admin'); ?>">SB Admin v2.0</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    <a href="<?= site_url('backend/admin/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> <?= ucfirst(lang('logout')); ?></a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?= site_url('backend/admin'); ?>"><i class="fa fa-dashboard"></i> <?= ucfirst(lang('dashboard')); ?></a>
                </li>
                <li>
                    <a href="<?= site_url('backend/pelanggan'); ?>"><i class="fa fa-users"></i> <?= ucfirst(lang('customer')); ?></a>
                </li>
                <li>
                    <a href="<?= site_url('backend/barang'); ?>"><i class="fa fa-cubes"></i> <?= ucfirst(lang('goods')); ?></a>
                </li>
                <li>
                    <a href="<?= site_url('backend/pembelian'); ?>"><i class="fa fa-shopping-cart"></i> <?= ucfirst(lang('purchases')); ?></a>
                </li>
                <li>
                    <a href="<?= site_url('backend/pembayaran'); ?>"><i class="fa fa-money"></i> <?= ucfirst(lang('payment')); ?></a>
                </li>
                <li>
                    <a href="<?= site_url('backend/laporan'); ?>"><i class="fa fa-table"></i> <?= ucfirst(lang('report')); ?></a>
                </li>
                <li>
                    <a href="<?= site_url('backend/pengaturan'); ?>"><i class="fa fa-wrench"></i> <?= ucfirst(lang('settings')); ?></a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
