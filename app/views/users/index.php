<?php Portal::send('title', 'Users') ?>

<h2 class="title">Users <?php echo $caching; ?> <a href="<?php echo to('users/create') ?>">Create</a></h2>
<table class="table">
    <thead>
        <th>Nome</th>
        <!-- <th>Data</th> -->
        <th>#</th>
    </thead>
    <tbody>
    	<?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo strtoupper($user->username) ?></td>
            <!-- <td><?php echo date('d/m/Y H:i:s', strtotime($user->created_at)) ?></td> -->
            <td><a href="<?php echo to('users/edit/'.$user->id) ?>">Edit</a></td>
        </tr>
    	<?php endforeach ?>
    </tbody>
</table>