<div class="content-wrapper">
<section class="content-header">
  <h1>
    Homepage
    <small>it all starts here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
  </ol>
</section>
<!-- <section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Title</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
    </div>
    <div class="box-footer">
      Footer
    </div>
  </div>
</section> -->
</div>

<?php Portal::send('title', 'Homepage') ?>

<!-- <?=Component::render('hero', [
    'title'=> 'simplePHPPages',
    'subtitle'=> 'Basic concepts for low level PHP page building'
]) ?>

<?=Component::render('text', [
    'title'=> 'Lorem ipsum',
    'text'=> 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.'
]) ?> -->
<!-- <section class="container"> 
	<div class="content">
		<form action="?a=submit" method="POST">
			<?php echo Csrf::getInputToken('home') ?>
			<input type="text" name="name">
			<button>Submit!</button>
		</form>
	</div>
</section> -->