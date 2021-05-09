<?php Portal::send('title', 'Livros') ?>
<section class="content-header">
  <h1>Livros (<?php echo $total ?>)</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Livros</a></li>
    <li class="active">List</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-body">
        <table class="table table-hover table-bordered">
            <thead>
                <th>Título</th>
                <th>Autores</th>
                <th style="width: 101px;"></th>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro): ?>
                <tr>
                    <td><?php echo $livro->titulo ?></td>
                    <td><?php echo $livro->autores ?></td>
                    <td>
                        <a href="<?php echo to('livros/view/'.$livro->id) ?>" title="Exibir"><span class="label label-success"><i class="fa fa-fw fa-eye"></i></span></a>
                        <a href="<?php echo to('livros/edit/'.$livro->id) ?>" title="Editar"><span class="label label-warning"><i class="fa fa-fw fa-edit"></i></span></a>
                        <a href="<?php echo to('livros/delete/'.$livro->id) ?>" onclick="return confirm('Tem certeza?')" title="Excluir"><span class="label label-danger"><i class="fa fa-fw fa-remove"></i></span></a>
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