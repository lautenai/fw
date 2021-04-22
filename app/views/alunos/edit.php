<?php Portal::send('title', 'Users') ?>
<section class="section">
	<div class="container">
		<h2 class="title">Aluno <?php echo $aluno->nome ?></h2>
        <form action="" method="post">
			<input type="text" name="nome" value="<?php echo @$aluno->nome ?>" required>
			<input type="submit" name="Salvar">
		</form>
	</div>
</section>