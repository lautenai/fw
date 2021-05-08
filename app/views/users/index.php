<?php Portal::send('title', 'Users') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Users
    <!-- <small>it all starts here</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Users</a></li>
    <li class="active">List</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <!-- <div class="box-header with-border">
      <h3 class="box-title">Users</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
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
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo strtoupper($user->username) ?></td>
                    <!-- <td><?php echo date('d/m/Y H:i:s', strtotime($user->created_at)) ?></td> -->
                    <!-- <td><a href="<?php echo to('users/edit/'.$user->id) ?>">Edit</a></td> -->
                    <td>
                        <a href="<?php echo to('users/view/'.$user->id) ?>" title="Exibir"><span class="label label-success"><i class="fa fa-fw fa-eye"></i></span></a>
                        <a href="<?php echo to('users/edit/'.$user->id) ?>" title="Editar"><span class="label label-warning"><i class="fa fa-fw fa-edit"></i></span></a>
                        <a href="<?php echo to('users/delete/'.$user->id) ?>" onclick="return confirm('Tem certeza?')" title="Excluir"><span class="label label-danger"><i class="fa fa-fw fa-remove"></i></span></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>      
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->
</section>
<!-- /.content -->