<?php $this->load->view('backend/_layouts/header', ['title' => ucfirst(lang('history')).' '.lang('payment')]); ?>
<?php $this->load->view('backend/_layouts/top_menu'); ?>

<div id="page-wrapper">
    <?php $this->load->view('backend/_partials/messages'); ?>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header"><?= ucfirst(lang('history')).' '.lang('payment'); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?= ucfirst(lang('©')).' '.lang('purchase'); ?></div>
                <div class="panel-body">
                    <?= form_open('', ['class' => 'form-horizontal']); ?>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('purchase_date')), null, ['class' => 'col-sm-4']); ?>
                        <div class="col-sm-8">
                            <?= $pembelian->tanggal_pembelian; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('due_date')), null, ['class' => 'col-sm-4']); ?>
                        <div class="col-sm-8">
                            <?= $pembelian->tanggal_jatuh_tempo; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('customer')), null, ['class' => 'col-sm-4']); ?>
                        <div class="col-sm-8">
                            <?= $pembelian->nama; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('product_name')), null, ['class' => 'col-sm-4']); ?>
                        <div class="col-sm-8">
                            <?= $pembelian->nama_barang; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('price')), null, ['class' => 'col-sm-4']); ?>
                        <div class="col-sm-8">
                            <?= number_format($pembelian->harga); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('quantity')), null, ['class' => 'col-sm-4']); ?>
                        <div class="col-sm-8">
                            <?= number_format($pembelian->kuantitas); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('total')), null, ['class' => 'col-sm-4']); ?>
                        <div class="col-sm-8">
                            <?= number_format($pembelian->total); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('status')), null, ['class' => 'col-sm-4']); ?>
                        <div class="col-sm-8">
                            <?= $status[$pembelian->status]; ?>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?= ucfirst(lang('history')).' '.lang('payment'); ?></div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover table-striped" id="table" width="100%">
                        <thead>
                            <tr>
                                <th><?= ucfirst(lang('no')); ?></th>
                                <th><?= ucfirst(lang('payment_date')); ?></th>
                                <th><?= ucfirst(lang('total')); ?></th>
                                <th><?= ucfirst(lang('action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($pembayaran as $row) : ?>
                                <tr>
                                    <td></td>
                                    <td><?= $row->tanggal_pembayaran; ?></td>
                                    <td><?= number_format($row->total); ?></td>
                                    <td>
                                        <?= anchor(
                                            site_url('backend/pembayaran/delete/'.$row->id_pembayaran.'/'.$row->id_pembelian),
                                            ucfirst(lang('delete')),
                                            ['class' => 'btn btn-danger btn-sm']
                                        ); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?php if ($pembelian->status == '0') : ?>
                    <div class="panel-footer">
                        <?= form_open(); ?>
                        <div class="form-group">
                            <?= form_label(ucfirst(lang('payment_date')).' (*)'); ?>
                            <div class="input-group date">
                                <?= form_input('tanggal_pembayaran', set_value('tanggal_pembayaran'), array('class' => 'form-control', 'id' => 'tanggal_pembayaran')); ?>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <?= form_error('tanggal_pembayaran', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <?= form_label(ucfirst(lang('total')).' (*)'); ?>
                            <?= form_input([
                                'class' => 'form-control',
                                'id' => 'total',
                                'name' => 'total',
                                'value' => set_value('total')
                            ]); ?>
                            <?= form_error('total', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <?= form_hidden('id_pembelian', set_value('id_pembelian', $pembelian->id_pembelian)); ?>
                            <?= form_submit('pay', ucfirst(lang('pay')), ['class' => 'btn btn-primary btn-sm']); ?>
                        </div>
                        <?= form_close(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('backend/pembayaran/js'); ?>

<?php $this->load->view('backend/_layouts/footer'); ?>
