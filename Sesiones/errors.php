<?php  if (count($errors) > 0) : ?>
	<div class="error1">
		<?php foreach ($errors as $error) : ?>
			<img src="img/error.png"> <p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>
