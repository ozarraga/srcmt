
<?php use_javascript('jquery.dataTables.js') ?>

<?php //use_stylesheet('demo_page.css')         ?>
<?php //use_stylesheet('demo_table.css')         ?>
<?php //use_stylesheet('main.css')   ?>
<?php use_stylesheet('demo_table_jui.css') ?>
<style>
	#feedback { font-size: 1.4em; }
	#miforma fieldset{
		float: left;
		background-image: none;
		border-style: none
	}
	#columnas-seleccionables .ui-selecting {
		/*background: #FECA40;*/
		border: 1px solid #222963;
		background: #0a0ba3 url(css/images/ui-bg_glass_65_0a0ba3_1x400.png) 50% 50% repeat-x;
		font-weight: normal; color: #ffffff;
	}

	#columnas-seleccionables .ui-selected {
		/*	    background: #F39814;
			    color: white; */
		border: 1px solid #0a0ba3;
		background: #43aaef url(css/images/ui-bg_glass_75_43aaef_1x400.png) 50% 50% repeat-x;
		font-weight: normal; color: #ffffff;
	}
	#columnas-seleccionables {
		list-style-type: none;
		margin: auto;
		padding: 0;
		width: 60%; }
	#columnas-seleccionables li {
		margin: 3px;
		padding: 0.4em;
		font-size: 1.4em;
		height: 18px;
	}
	.dataTables_wrapper {
		width: 1024px;
		position: relative;
		min-height: 302px;
		_height: 302px;
		clear: both;
	}

	/*	http://trirand.com/blog/jqgrid/jqgrid.html*/
</style>




<span id="opcion-barra" class="opcion-barra ui-corner-all ">
	<button id="boton-a-nueva-actividad-academica"  onclick="document.location.href='<?php echo url_for('@SrcmtActividadesAcademicas_new') ?>'" title="Redirige al registro de nuevo Brigadista Estudiantil" >Nueva Actividad Acad&eacute;mica</button>
	<button id="imprimir-lista" title="Prepara una versi&oacute;n lista para imprimir">Imprimir Lista</button>
</span>
<div>
	<!--	un pequeño espacio entre la barra de opciones y la tabla-->
	&nbsp;	
</div>



<table id="example" class="td-actividades-academicas display">
	<thead>
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

	</tbody>
</table>
<!--        <?php //foreach ($ActividadesAcademicas as $ActividadAcademica):    ?>
			    <tr>
				<td >
<?php //echo link_to('Editar '.$ActividadAcademica->getCodigoActividadAcademica(), '@SrcmtActividadesAcademicas_edit?codigo_actividad_academica='.$ActividadAcademica->getCodigoActividadAcademica())  ?><br /> 
<?php //echo link_to('Asistentes', '@SrcmtActividadesAcademicas_show?codigo_actividad_academica='.$ActividadAcademica->getCodigoActividadAcademica())   ?><br />
<?php //echo link_to('Consultar', '@SrcmtActividadesAcademicas_show?codigo_actividad_academica='.$ActividadAcademica->getCodigoActividadAcademica())   ?><br />
				</td>
				<td><?php //echo $ActividadAcademica->getSrcmtTipoActividad()->getTipoActividad()    ?></td>
				<td><?php //echo $ActividadAcademica->getActividad()    ?></td>
				<td><?php //echo $ActividadAcademica->getResponsable()    ?></td>
				<td><?php //echo $ActividadAcademica->getFecha()    ?></td>
				<td><?php //echo $ActividadAcademica->getLugar()    ?></td>
				<td><?php //echo $ActividadAcademica->getDuracion()    ?></td>
				<td><?php //echo $ActividadAcademica->getDescripcion()    ?></td>
				<td><?php //echo $ActividadAcademica->getCreatedAt()    ?></td>
				<td><?php //echo $ActividadAcademica->getUpdatedAt()    ?></td>
		
			    </tr>-->
<?php
// endforeach; ?>