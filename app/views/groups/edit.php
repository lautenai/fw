<?php Portal::send('title', 'Users') ?>
<section class="section">
	<div class="container">
		<h2 class="title">User <?php echo $user->username ?></h2>
        <form action="" method="post">
			<input type="text" name="username" value="<?php echo @$user->username ?>">
			<input type="submit" name="Salvar">
		</form>
	</div>
</section>