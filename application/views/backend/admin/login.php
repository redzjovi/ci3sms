<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <link href="<?= base_url('assets/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/startbootstrap-sb-admin-2-gh-pages/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/custom.css'); ?>" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <?php $this->load->view('backend/_partials/messages'); ?>
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?= form_open(); ?>
                            <fieldset>
                                <div class="form-group">
                                    <?= form_input('email', set_value('email'), ['autofocus' => true, 'class' => 'form-control', 'placeholder' => 'E-mail']); ?>
                                </div>
                                <div class="form-group">
                                    <?= form_input('password', set_value('password'), ['autofocus' => true, 'class' => 'form-control', 'placeholder' => 'Password']); ?>
                                </div>
                                <?= form_submit('login', 'Login', ['class' => 'btn btn-success btn-block']); ?>
                            </fieldset>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url('assets/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
</body>

</html>