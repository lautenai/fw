<?php Portal::send('title', 'Groups') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Groups
    <!-- <small>it all starts here</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Groups</a></li>
    <li class="active">List</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <!-- <div class="box-header with-border">
        <h3 class="box-title">Groups</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div> -->
    <div class="box-body">
        <table class="table table-hover table-bordered">
            <thead>
                <th>Nome</th>
                <!-- <th>Data</th> -->
                <th style="width: 101px;"></th>
            </thead>
            <tbody>
                <?php foreach ($groups as $group): ?>
                <tr>
                    <td><?php echo strtoupper($group->groupname) ?></td>
                    <!-- <td><?php echo date('d/m/Y H:i:s', strtotime($group->created_at)) ?></td> -->
                    <!-- <td><a href="<?php echo to('groups/edit/'.$group->id) ?>">Edit</a></td> -->
                    <td>
                        <a href="<?php echo to('groups/view/'.$group->id) ?>" title="Exibir"><span class="label label-success"><i class="fa fa-fw fa-eye"></i></span></a>
                        <a href="<?php echo to('groups/edit/'.$group->id) ?>" title="Editar"><span class="label label-warning"><i class="fa fa-fw fa-edit"></i></span></a>
                        <a href="<?php echo to('groups/delete/'.$group->id) ?>" onclick="return confirm('Tem certeza?')" title="Excluir"><span class="label label-danger"><i class="fa fa-fw fa-remove"></i></span></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <ul class="pagination pagination-sm no-margin pull-right">
        <?php echo $paginator->links(); ?>
      </ul>
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->