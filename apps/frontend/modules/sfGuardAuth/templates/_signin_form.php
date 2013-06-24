<?php use_helper('I18N') ?>
<?php use_javascript('jquery-1.5.1.min.js') ?>
<?php use_javascript('jquery-ui-1.8.13.custom.min.js')?>
<?php //use_stylesheet('demo_page.css')?>
<?php use_stylesheet('srcmt.css')?>
<?php use_stylesheet('ubv/jquery-ui-1.8.13.custom.css') ?>
<div id="contenedor-autenticacion" class="ui-corner-all">
	<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
					
		<fieldset id="fieldset-autentication" class="ui-corner-all ui-widget ui-widget-content ">

			<?php echo $form->renderHiddenFields() ?>
			<?php if ($form->hasGlobalErrors()): ?>
			<div class="ui-widget">
				<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">

					<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
					<p>
						<strong>Alerta:</strong>
						<?php echo $form->renderglobalerrors() ?>
					</p>
					<div style="padding: 5px"></div>
				</div>
			</div>

			<?php endif ?>

			<?php echo $form['username']->rendererror() ?><br />
			<div style="padding: 5px"></div>
			<?php echo $form['username']->renderLabelName() ?><br />
			<?php echo $form['username']->render(array('class' => '', 'size' => "40")) ?>
			<?php echo $form['password']->rendererror() ?><br />
			<div style="padding: 5px"></div>
			<?php echo $form['password']->renderLabelName() ?><br />
			<?php echo $form['password']->render(array('class' => '', 'size' => "40")) ?>
			<p>
				<input type="submit" value="<?php echo __('Signin', null, 'sf_guard') ?>" />
			</p>

			<?php $routes = $sf_context->getRouting()->getRoutes() ?>
			<?php if (isset($routes['sf_guard_forgot_password'])): ?>
				<a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
			<?php endif; ?>

			<?php if (isset($routes['sf_guard_register'])): ?>
				&nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
			<?php endif; ?>
		</fieldset>
	</form>
</div>
