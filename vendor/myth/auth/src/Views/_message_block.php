<?php if (session()->has('message')) : ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<?= session('message') ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif ?>

<?php if (session()->has('error-dismiss')) : ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?= session('error-dismiss') ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif ?>

<?php if (session()->has('error')) : ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?= session('error') ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php endif ?>

<?php if (session()->has('errors')) : ?>
	<ul class="alert alert-danger " role="alert">
	<?php foreach (session('errors') as $error) : ?>
		<li class="ml-1"><?= $error ?></li>
	<?php endforeach ?>
	</ul>
<?php endif ?>

