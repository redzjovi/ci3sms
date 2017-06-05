<?php $this->load->view('backend/_layouts/header', ['title' => ucfirst(lang('edit')).' '.lang('goods')]); ?>
<?php $this->load->view('backend/_layouts/top_menu'); ?>

<div id="page-wrapper">
    <?php $this->load->view('backend/_partials/messages'); ?>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header"><?= ucfirst(lang('edit')).' '.lang('goods'); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= form_open(); ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?= ucfirst(lang('edit')).' '.lang('goods'); ?></div>
                <div class="panel-body">
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('product_name')).' (*)'); ?>
                        <?= form_input('nama_barang', set_value('nama_barang', $barang->nama_barang), array('class' => 'form-control')); ?>
                        <?= form_error('nama_barang', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('size')).' (*)'); ?>
                        <?= form_input('ukuran', set_value('ukuran', $barang->ukuran), array('class' => 'form-control')); ?>
                        <?= form_error('ukuran', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('price')).' (*)'); ?>
                        <?= form_input('harga', set_value('harga', $barang->harga), array('class' => 'form-control')); ?>
                        <?= form_error('harga', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('stock')).' (*)'); ?>
                        <?= form_input('stok', set_value('stok', $barang->stok), array('class' => 'form-control')); ?>
                        <?= form_error('stok', '<p class="text-danger">', '</p>'); ?>
                    </div>
                </div>
                <div class="panel-footer">
                    <?= form_hidden('id_barang', set_value('id_barang', $barang->id_barang)); ?>
                    <?= form_submit('save', ucfirst(lang('save')), ['class' => 'btn btn-primary btn-sm']); ?>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?php $this->load->view('backend/_layouts/footer'); ?>