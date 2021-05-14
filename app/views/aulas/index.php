<?php Portal::send('title', 'Aulas') ?>
<section class="content-header">
  <h1>Aulas (<?php echo $total ?>)</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Aulas</a></li>
    <li class="active">List</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-body">
        <table class="table table-hover table-bordered">
            <thead>
                <th>Id</th>
                <th>Escola</th>
                <th>Turma</th>
                <th>Disciplina</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Objeto de Conhecimento (Conteúdo)</th>
                <th style="width: 1px;"></th>
                <th style="width: 1px;"></th>
                <th style="width: 101px;"></th>
            </thead>
            <tbody>
                <?php foreach ($aulas as $aula): ?>
                <tr>
                    <td><?php echo strtoupper($aula->id) ?></td>
                    <td><?php //echo $aula->escola_nome ?></td>
                    <td><?php echo $aula->turma_nome ?></td>
                    <td><?php echo $aula->disciplina_nome ?></td>
                    <td><?php echo date('d/m/Y', strtotime($aula->inicio)) ?></td>
                    <td><?php echo date('d/m/Y', strtotime($aula->fim)) ?></td>
                    <td><?php echo $aula->objeto_de_conhecimento_conteudo ?></td>
                    <td><a href="<?php echo to('aulas/view/'.$aula->id) ?>" title="Exibir"><span class="label label-primary"><i class="fa fa-fw fa-link"></i></span></a></td>
                    <td><a href="<?php echo to('aulas/view/'.$aula->id) ?>" title="Exibir"><span class="label label-default"><i class="fa fa-fw fa-file-pdf-o"></i></span></a></td>
                    <td>
                        <a href="<?php echo to('aulas/view/'.$aula->id) ?>" title="Exibir"><span class="label label-success"><i class="fa fa-fw fa-eye"></i></span></a>
                        <a href="<?php echo to('aulas/edit/'.$aula->id) ?>" title="Editar"><span class="label label-warning"><i class="fa fa-fw fa-edit"></i></span></a>
                        <a href="<?php echo to('aulas/delete/'.$aula->id) ?>" onclick="return confirm('Tem certeza?')" title="Excluir"><span class="label label-danger"><i class="fa fa-fw fa-remove"></i></span></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>      
    </div>
    <div class="box-footer">
      <ul class="pagination pagination-sm no-margin pull-right">
        <?php echo $paginator->links(); ?>
      </ul>
    </div>
  </div>
</section>