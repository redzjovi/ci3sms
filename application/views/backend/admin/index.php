<?php $this->load->view('backend/_layouts/header', ['title' => ucfirst(lang('dashboard'))]); ?>
<?php $this->load->view('backend/_layouts/top_menu'); ?>

<div id="page-wrapper">
    <?php $this->load->view('backend/_partials/messages'); ?>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header"><?= ucfirst(lang('dashboard')); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?= ucfirst(lang('dashboard')); ?></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= $pelanggan_jumlah; ?></div>
                                            <div><?= ucfirst(lang('customers')); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= site_url('backend/pelanggan'); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left"><?= ucfirst(lang('view')).' '.lang('detail'); ?></span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-cubes fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= $barang_jumlah; ?></div>
                                            <div><?= ucfirst(lang('goods')); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= site_url('backend/barang'); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left"><?= ucfirst(lang('view')).' '.lang('detail'); ?></span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-money fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">12</div>
                                            <div>New Tasks!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= number_format($pembelian_total); ?></div>
                                            <div><?= ucfirst(lang('purchase')); ?> (<?= $pembelian_jumlah; ?>)</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= site_url('backend/pembelian'); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left"><?= ucfirst(lang('view')).' '.lang('detail'); ?></span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-money fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= number_format($pembelian_total_paid); ?></div>
                                            <div><?= ucfirst(lang('purchase')).' '.lang('paid'); ?> (<?= $pembelian_jumlah_paid; ?>)</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= site_url('backend/pembelian'); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left"><?= ucfirst(lang('view')).' '.lang('detail'); ?></span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-money fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= number_format($pembelian_total_unpaid); ?></div>
                                            <div><?= ucfirst(lang('purchase')).' '.lang('unpaid'); ?> (<?= $pembelian_jumlah_unpaid; ?>)</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= site_url('backend/pembelian'); ?>">
                                    <div class="panel-footer">
                                        <span class="pull-left"><?= ucfirst(lang('view')).' '.lang('detail'); ?></span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('backend/_layouts/footer'); ?>
