<?php if ($this->session->flashdata('message_danger')) : ?>
	<div class="alert alert-danger alert-dismissible no-margin">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<?php echo $this->session->flashdata('message_danger'); ?>
	</div>
<?php endif; ?>

<?php if ($this->session->flashdata('message_info')) : ?>
	<div class="alert alert-info alert-dismissible no-margin">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<?php echo $this->session->flashdata('message_info'); ?>
	</div>
<?php endif; ?>


<?php if ($this->session->flashdata('message_success')) : ?>
	<div class="alert alert-success alert-dismissible no-margin">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<?php echo $this->session->flashdata('message_success'); ?>
	</div>
<?php endif; ?>

<?php if ($this->session->flashdata('message_warning')) : ?>
	<div class="alert alert-warning alert-dismissible no-margin">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<?php echo $this->session->flashdata('message_warning'); ?>
	</div>
<?php endif; ?>

<?php if (validation_errors()) : ?>
	<div class="alert alert-danger alert-dismissible no-margin">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<?php echo validation_errors(); ?>
	</div>
<?php endif; ?>