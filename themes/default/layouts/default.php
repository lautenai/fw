<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Default Page - <?=Portal::receive('title') ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<?=Portal::receive('css') ?>
		<?=Portal::receive('head') ?>
	</head>

	<body>
		<?=Component::render('navigation') ?>
		<?=Portal::receive('main') ?>
		<?=Component::render('footer', ['text' => 'Copyright 2019']) ?>
		<script src="/themes/default/assets/js/app.js"></script>
		<?=Portal::receive('js') ?>
	</body>

</html>
