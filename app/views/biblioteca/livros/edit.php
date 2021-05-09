<?php Portal::send('title', 'Group') ?>
<section class="section">
	<div class="container">
		<h2 class="title">Group <?php echo $group->groupname ?></h2>
        <form action="" method="post">
			<input type="text" name="groupname" value="<?php echo @$group->groupname ?>">
			<input type="submit" name="Salvar">
		</form>
	</div>
</section>