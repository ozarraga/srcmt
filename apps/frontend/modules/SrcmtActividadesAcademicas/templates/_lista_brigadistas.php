<?php use_javascript('jquery.dataTables.js') ?>
<?php //use_javascript('jquery.dataTables.min.js')        ?>
<?php //use_stylesheet('demo_page.css')          ?>
<?php //use_stylesheet('demo_table.css')          ?>
<?php //use_stylesheet('main.css')    ?>
<?php use_stylesheet('demo_table_jui.css') ?>


<style>


	/*	http://trirand.com/blog/jqgrid/jqgrid.html*/
</style>
<script>

	$(document).ready(function() {


		var aSelected = [];

		/* Click event handler */
		$('#example tbody tr').live('click', function () {
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

<div class="ui-corner-top bordes-adorno" style="">
	<!--	un pequeño espacio entre la barra de opciones y la tabla-->
	&nbsp;
</div>

<table id="example" class="td-actividades-academicas td-fondo-blanco display">
	<thead class="th-actividades-academicas">
		<tr>
			<th>Codigo Actividad Acad&eacute;mica</th>
			<th>Tipo de Actividad</th>
			<th>Actividad</th>
			<th>Responsable</th>
			<th>Fecha</th>
			<th>Lugar</th>
			<th>Duraci&oacute;n</th>
			<th>Descripci&oacute;n</th>
			<th>Fecha de Creaci&oacute;n</th>
			<th>&Uacute;ltima Actualizaci&oacute;n</th>

		</tr>
	</thead>
	<tbody class="ui-widget ui-widget-content">
		<?php foreach ($ActividadesAcademicas as $ActividadAcademica): ?>
			<tr>
				<td >
					<?php echo link_to($ActividadAcademica->getCodigoActividadAcademica(), '@SrcmtActividadesAcademicas_show?codigo_actividad_academica=' . $ActividadAcademica->getCodigoActividadAcademica()) ?><br />
				</td>
				<td><?php echo $ActividadAcademica->getSrcmtTipoActividad()->getTipoActividad() ?></td>
				<td><?php echo $ActividadAcademica->getActividad() ?></td>
				<td><?php echo $ActividadAcademica->getResponsable() ?></td>
				<td><?php echo $ActividadAcademica->getFechaFormateado() ?></td>
				<td><?php echo $ActividadAcademica->getLugar() ?></td>
				<td><?php echo $ActividadAcademica->getDuracion() ?></td>
				<td><?php echo $ActividadAcademica->getDescripcion() ?></td>
				<td><?php echo $ActividadAcademica->getCreatedAtFormateado() ?></td>
				<td><?php echo $ActividadAcademica->getUpdatedAtFormateado() ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
