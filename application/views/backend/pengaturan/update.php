<?php $this->load->view('backend/_layouts/header', ['title' => ucfirst(lang('edit')).' '.lang('setting')]); ?>
<?php $this->load->view('backend/_layouts/top_menu'); ?>

<div id="page-wrapper">
    <?php $this->load->view('backend/_partials/messages'); ?>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header"><?= ucfirst(lang('edit')).' '.lang('setting'); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= form_open(); ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?= ucfirst(lang('edit')).' '.lang('setting'); ?></div>
                <div class="panel-body">
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('type')).' (*)'); ?>
                        <?= form_input('tipe', set_value('tipe', $pengaturan->tipe), array('class' => 'form-control')); ?>
                        <?= form_error('tipe', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('message')).' (*)'); ?>
                        <?= form_textarea('pesan', set_value('pesan', $pengaturan->pesan), array('class' => 'form-control')); ?>
                        <?= form_error('pesan', '<p class="text-danger">', '</p>'); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label(ucfirst(lang('due_date')).' (*)'); ?>
                        <?= form_input('jatuh_tempo', set_value('jatuh_tempo', $pengaturan->jatuh_tempo), array('class' => 'form-control')); ?>
                        <?= form_error('jatuh_tempo', '<p class="text-danger">', '</p>'); ?>
                    </div>
                </div>
                <div class="panel-footer">
                    <?= form_hidden('id', set_value('id', $pengaturan->id)); ?>
                    <?= form_submit('save', ucfirst(lang('save')), ['class' => 'btn btn-primary btn-sm']); ?>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?php $this->load->view('backend/_layouts/footer'); ?>