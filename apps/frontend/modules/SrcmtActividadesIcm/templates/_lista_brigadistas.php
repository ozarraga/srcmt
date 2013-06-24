<?php use_javascript('jquery.dataTables.js') ?>
<?php //use_javascript('jquery.dataTables.min.js')        ?>
<?php //use_stylesheet('demo_page.css')          ?>
<?php //use_stylesheet('demo_table.css')          ?>
<?php //use_stylesheet('main.css')    ?>
<?php use_stylesheet('demo_table_jui.css') ?>

<script>

	$(document).ready(function() {


		var aSelected = [];

		/* Click event handler */
		$('#example2 tbody tr').live('click', function () {
			var id = this.id;
			var index = jQuery.inArray(id, aSelected);

			if ( index === -1 ) {
				aSelected.push( id );
			} else {
				aSelected.splice( index, 1 );
			}
			$(this).toggleClass('row_selected');
		});
	});

</script>


<div  class="bordes-adorno ui-corner-top">
	<!--	un pequeño espacio entre la barra de opciones y la tabla-->
	&nbsp;
</div>

<table id="example2" class="td-actividades-icm td-fondo-blanco display">
	<thead class="th-actividades-icm">
		<tr>
			<th>C&oacute;digo Actividad ICM</th>
			<th>Tipo de Actividad</th>
			<th>Actividad</th>
			<th>Responsable</th>
			<th>Fecha</th>
			<th>Lugar</th>
			<th>Duraci&oacute;n</th>
			<th>Descripci&oacuten</th>
			<th>Fecha de Creaci&oacute;n</th>
			<th>&Uacute;ltima Actualizaci&oacute;n</th>
		</tr>
	</thead>
	<tbody class="ui-widget ui-widget-content">
				<?php foreach ($ActividadesICM as $ActividadICM): ?>
			<tr>
				<td >
					<?php echo link_to($ActividadICM->getCodigoActividadIcm(), '@SrcmtActividadesIcm_show?codigo_actividad_icm=' . $ActividadICM->getCodigoActividadICM()) ?><br />
				</td>
				<td><?php echo $ActividadICM->getSrcmtTipoActividad()->getTipoActividad() ?></td>
				<td><?php echo $ActividadICM->getActividad() ?></td>
				<td><?php echo $ActividadICM->getResponsable() ?></td>
				<td><?php echo $ActividadICM->getFechaFormateado() ?></td>
				<td><?php echo $ActividadICM->getLugar() ?></td>
				<td><?php echo $ActividadICM->getDuracion() ?></td>
				<td><?php echo $ActividadICM->getDescripcion() ?></td>
				<td><?php echo $ActividadICM->getCreatedAtFormateado() ?></td>
				<td><?php echo $ActividadICM->getUpdatedAtFormateado() ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<!--</div>-->