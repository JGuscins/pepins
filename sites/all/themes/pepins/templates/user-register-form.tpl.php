<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="row">
				<div class="col-sm-12">
					<p><?php print render($intro_text); ?></p>
				</div>

				<div class="col-sm-12 user-register-form">
					<?php print drupal_render_children($form) ?>
				</div>
			</div>
		</div>
	</div>
</div>