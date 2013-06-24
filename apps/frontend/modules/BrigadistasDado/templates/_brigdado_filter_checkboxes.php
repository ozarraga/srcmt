<?php $titulos_y_campos = $filterForm->getOption('titulos_y_campos') ?>
<?php $indice = 0 ?>
<?php $limite = 18 ?>	

<fieldset >
	<ul class="datatables-checkboxes">
		<?php foreach ($titulos_y_campos as $titulo => $campo) : ?>
			
			<?php (float) $modulo = ($indice % $limite) ?>
			<?php if ($modulo == 0): ?>
			</ul>
		</fieldset >
		<fieldset >
			<ul class="datatables-checkboxes">
			<?php endif; ?>
			<li>
			<?php echo $filterForm['columnas'][$campo]->render() ?>
			</li>
				<?php $indice++ ?>
		<?php endforeach; ?>

	</ul>
</fieldset >