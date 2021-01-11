<?php Portal::send('title', 'Alunos') ?>
<section class="section">
	<div class="container">
		<h2 class="title">Alunos <?php echo $caching; ?></h2>
        <table class="table">
            <thead>
                <th>Nome</th>
                <th>Data</th>
            </thead>
            <tbody>
            	<?php foreach ($alunos as $aluno): ?>
                <tr>
                    <td><?php echo strtoupper($aluno->nome) ?></td>
                    <td><?php echo date('d/m/Y H:i:s', strtotime($aluno->created_at)) ?></td>
                </tr>
            	<?php endforeach ?>
            </tbody>
        </table>
	</div>
</section>