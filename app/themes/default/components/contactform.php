<section class="section is-medium">
  <div class="container">
		<?php if(isset($_POST['message'])){?>
			Your message was sent :-)<br/>
			<?=htmlspecialchars($_POST['message']) ?>
		<?php } ?>
		<form method="post">
			<input type="text" name="message" />
			<input type="submit" value="send" />
		</form>
	</div>
</section>
