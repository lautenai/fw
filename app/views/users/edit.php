<?php Portal::send('title', 'Users') ?>
<div class="content-wrapper">
<section class="section">
	<div class="container">
		<h2 class="title">User <?php echo $user->username ?></h2>
        <form action="" method="post">
        	<label>Username</label>
			<input type="text" name="username" value="<?php echo @$user->username ?>">
			<label>Password</label>
			<input type="text" name="password" value="">
			<input type="submit" name="Salvar">
		</form>
	</div>
</section>
</div>