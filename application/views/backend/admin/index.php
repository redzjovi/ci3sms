<?php $this->load->view('backend/_layouts/header'); ?>
<?php $this->load->view('backend/_layouts/top_menu'); ?>

<div id="page-wrapper">
    <?php $this->load->view('backend/_partials/messages'); ?>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header">Index</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Panel heading</div>
                <div class="panel-body">Panel body</div>
                <div class="panel-footer">Panel footer</div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('backend/_layouts/footer'); ?>