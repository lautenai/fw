<?php Portal::send('title', 'Aula') ?>
<section class="content-header">
  <h1>Aula <?php echo strtoupper($aula->id) ?></h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Aula</a></li>
    <li class="active">View</li>
  </ol>
</section>
<section class="content">
  <div class="box">
    <div class="box-body">
    	<?php echo $aula->habilidades; ?>
    </div>
    <div class="box-footer">
    </div>
  </div>
</section>