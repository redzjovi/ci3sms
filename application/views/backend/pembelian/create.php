<?php $this->load->view('backend/_layouts/header', ['title' => ucfirst(lang('add')).' '.lang('purchase')]); ?>
<?php $this->load->view('backend/_layouts/top_menu'); ?>

<div id="page-wrapper">
    <?php $this->load->view('backend/_partials/messages'); ?>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header"><?= ucfirst(lang('add')).' '.lang('purchase'); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= form_open(); ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?= ucfirst(lang('add')).' '.lang('purchase'); ?></div>
                <div class="panel-body">
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('purchase_date')).' (*)'); ?>
                        <div class="input-group date">
                            <?= form_input('tanggal_pembelian', set_value('tanggal_pembelian', date('d/m/Y')), array('class' => 'form-control', 'id' => 'tanggal_pembelian')); ?>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        <?= form_error('tanggal_pembelian', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('due_date')).' (*)'); ?>
                        <div class="input-group date">
                            <?= form_input('tanggal_jatuh_tempo', set_value('tanggal_jatuh_tempo', $tanggal_jatuh_tempo), array('class' => 'form-control', 'id' => 'tanggal_jatuh_tempo')); ?>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        <?= form_error('tanggal_jatuh_tempo', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('customer')).' (*)'); ?>
                        <?php $data = ['' => '- '.sprintf(lang('select_with_param'), lang('customer')).' - '] +
                            array_column($pelanggan, 'nama', 'id_pelanggan'); ?>
                        <?= form_dropdown('id_pelanggan', $data, set_value('id_pelanggan'), array('class' => 'form-control', 'id' => 'id_pelanggan')); ?>
                        <?= form_error('id_pelanggan', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('product_name')).' (*)'); ?>
                        <?php $data = ['' => '- '.sprintf(lang('select_with_param'), lang('product_name')).' - '] +
                            array_column($barang, 'nama_barang', 'id_barang'); ?>
                        <?= form_dropdown('id_barang', $data, set_value('id_barang'), array('class' => 'form-control', 'id' => 'id_barang')); ?>
                        <?= form_error('id_barang', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('price')).' (*)'); ?>
                        <?= form_input([
                            'class' => 'form-control',
                            'id' => 'harga',
                            'name' => 'harga',
                            'readonly' => 'readonly',
                            'type' => 'number',
                            'value' => set_value('harga')
                        ]); ?>
                        <?= form_error('harga', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('quantity')).' (*)'); ?>
                        <?= form_input([
                            'class' => 'form-control',
                            'id' => 'kuantitas',
                            'name' => 'kuantitas',
                            'type' => 'number',
                            'value' => set_value('kuantitas')
                        ]); ?>
                        <?= form_error('kuantitas', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('total')).' (*)'); ?>
                        <?= form_input([
                            'class' => 'form-control',
                            'id' => 'total',
                            'name' => 'total',
                            'readonly' => 'readonly',
                            'value' => set_value('total', '0')
                        ]); ?>
                        <?= form_error('total', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('status')).' (*)'); ?>
                        <?= form_dropdown('status', $status, set_value('status'), array('class' => 'form-control')); ?>
                        <?= form_error('status', '<p class="text-danger">', '</p>'); ?>
                    </div>
                </div>
                <div class="panel-footer">
                    <?= form_submit('save', ucfirst(lang('save')), ['class' => 'btn btn-primary btn-sm']); ?>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?php $this->load->view('backend/pembelian/js'); ?>

<?php $this->load->view('backend/_layouts/footer'); ?>
