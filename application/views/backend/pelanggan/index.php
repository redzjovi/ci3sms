<?php $this->load->view('backend/_layouts/header'); ?>
<?php $this->load->view('backend/_layouts/top_menu'); ?>

<div id="page-wrapper">
    <?php $this->load->view('backend/_partials/messages'); ?>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header"><?= ucfirst(lang('pelanggan')); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= anchor(
                site_url('backend/pelanggan/create'),
                ucfirst(lang('add')),
                ['class' => 'btn btn-primary btn-sm']
            ); ?>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?= ucfirst(lang('pelanggan')); ?></div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover table-striped" id="table" width="100%">
                        <thead>
                            <tr>
                                <th><?= ucfirst(lang('no')); ?></th>
                                <th><?= ucfirst(lang('name')); ?></th>
                                <th><?= ucfirst(lang('phone_number')); ?></th>
                                <th><?= ucfirst(lang('handphone_number')); ?></th>
                                <th><?= ucfirst(lang('address')); ?></th>
                                <th><?= ucfirst(lang('email')); ?></th>
                                <th><?= ucfirst(lang('action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pelanggan->result() as $row) : ?>
                                <tr>
                                    <td></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->nomor_telepon; ?></td>
                                    <td><?= $row->nomor_handphone; ?></td>
                                    <td><?= $row->alamat; ?></td>
                                    <td><?= $row->email; ?></td>
                                    <td>
                                        <?= anchor(
                                            site_url('backend/pelanggan/update/'.$row->id_pelanggan),
                                            ucfirst(lang('edit')),
                                            ['class' => 'btn btn-sm btn-success']
                                        ); ?>
                                        <?= anchor(
                                            site_url('backend/pelanggan/delete/'.$row->id_pelanggan),
                                            ucfirst(lang('delete')),
                                            ['class' => 'btn btn-danger btn-sm']
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