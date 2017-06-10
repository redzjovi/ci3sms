<?php $this->load->view('backend/_layouts/header', ['title' => ucfirst(lang('report'))]); ?>
<?php $this->load->view('backend/_layouts/top_menu'); ?>

<div id="page-wrapper">
    <?php $this->load->view('backend/_partials/messages'); ?>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header"><?= ucfirst(lang('report')); ?></h1>
        </div>
    </div>

    <?= form_open('', ['class' => 'form-inline']); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <?= form_label(ucfirst(lang('start_date'))); ?>
                <?= form_input('tanggal_awal', set_value('tanggal_awal'), ['class' => 'form-control', 'id' => 'tanggal_awal']); ?>
            </div>
            <div class="form-group">
                <?= form_label(ucfirst(lang('end_date'))); ?>
                <?= form_input('tanggal_akhir', set_value('tanggal_akhir'), ['class' => 'form-control', 'id' => 'tanggal_akhir']); ?>
            </div>
            <div class="form-group">
                <?= form_label(ucfirst(lang('status'))); ?>
                <?php $status = ['' => ''] + $status; ?>
                <?= form_dropdown('status', $status, set_value('status'), array('class' => 'form-control')); ?>
            </div>
            <div class="form-group">
                <?= form_submit('filter', ucfirst(lang('filter')), ['class' => 'btn btn-primary btn-sm']); ?>
            </div>
        </div>
    </div>
    <?= form_close(); ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?= ucfirst(lang('report')); ?></div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover table-striped" id="table" width="100%">
                        <thead>
                            <tr>
                                <th><?= ucfirst(lang('no')); ?></th>
                                <th><?= ucfirst(lang('purchase_date')); ?></th>
                                <th><?= ucfirst(lang('due_date')); ?></th>
                                <th><?= ucfirst(lang('name')); ?></th>
                                <th><?= ucfirst(lang('product_name')); ?></th>
                                <th><?= ucfirst(lang('price')); ?></th>
                                <th><?= ucfirst(lang('quantity')); ?></th>
                                <th><?= ucfirst(lang('total')); ?></th>
                                <th><?= ucfirst(lang('status')); ?></th>
                                <th><?= ucfirst(lang('action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($laporan->result() as $row) : ?>
                                <tr>
                                    <td></td>
                                    <td><?= $row->tanggal_pembelian; ?></td>
                                    <td><?= $row->tanggal_jatuh_tempo; ?></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->nama_barang; ?></td>
                                    <td><?= number_format($row->harga); ?></td>
                                    <td><?= number_format($row->kuantitas); ?></td>
                                    <td><?= number_format($row->total); ?></td>
                                    <td><?= $status[$row->status]; ?></td>
                                    <td>
                                        <?= anchor(
                                            site_url('backend/pembayaran/history/'.$row->id_pembelian),
                                            ucfirst(lang('history')),
                                            ['class' => 'btn btn-sm btn-success', 'target' => '_blank']
                                        ); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('backend/laporan/js'); ?>

<?php $this->load->view('backend/_layouts/footer'); ?>
