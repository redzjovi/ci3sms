<?php $this->load->view('backend/_layouts/header', ['title' => ucfirst(lang('settings'))]); ?>
<?php $this->load->view('backend/_layouts/top_menu'); ?>

<div id="page-wrapper">
    <?php $this->load->view('backend/_partials/messages'); ?>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header"><?= ucfirst(lang('settings')); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?= ucfirst(lang('settings')); ?></div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover table-striped" id="table" width="100%">
                        <thead>
                            <tr>
                                <th><?= ucfirst(lang('no')); ?></th>
                                <th><?= ucfirst(lang('type')); ?></th>
                                <th><?= ucfirst(lang('message')); ?></th>
                                <th><?= ucfirst(lang('due_date')); ?></th>
                                <th><?= ucfirst(lang('action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengaturan->result() as $row) : ?>
                                <tr>
                                    <td></td>
                                    <td><?= $row->tipe; ?></td>
                                    <td><?= nl2br($row->pesan); ?></td>
                                    <td><?= $row->jatuh_tempo; ?></td>
                                    <td>
                                        <?= anchor(
                                            site_url('backend/pengaturan/update/'.$row->id),
                                            ucfirst(lang('edit')),
                                            ['class' => 'btn btn-sm btn-success']
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

<script>
$(function () {
    var t = $('#table').DataTable({
        'columns': [
            { 'orderable': false },
            null,
            null,
            null,
            { 'orderable': false },
        ],
        'responsive': true,
        'search': {
            'smart': false,
        },
    });
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
});
</script>

<?php $this->load->view('backend/_layouts/footer'); ?>