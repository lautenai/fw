<?php Portal::send('title', 'Groups') ?>
<div class="content-wrapper">
<h2 class="title">Groups</h2>
<table class="table">
    <thead>
        <th>Nome</th>
        <th>#</th>
    </thead>
    <tbody>
    	<?php foreach ($groups as $group): ?>
        <tr>
            <td><?php echo strtoupper($group->group_name) ?></td>
            <td><a href="groups/edit/<?php echo $group->id ?>">Edit</a></td>
        </tr>
    	<?php endforeach ?>
    </tbody>
</table>
</div>