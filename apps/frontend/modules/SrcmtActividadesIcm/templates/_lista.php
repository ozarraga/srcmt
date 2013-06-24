<?php use_javascript('jquery.dataTables.js') ?>
<?php //use_javascript('jquery.dataTables.min.js')        ?>
<?php //use_stylesheet('demo_page.css')          ?>
<?php //use_stylesheet('demo_table.css')          ?>
<?php //use_stylesheet('main.css')    ?>
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
	<button id="boton-a-nueva-actividad-icm"  onclick="document.location.href='<?php echo url_for('@SrcmtActividadesIcm_new') ?>' "title="Redirige al registro de una nueva Actividad de Integraci&oacute;n C&iacute;vico Militar" >Nueva Actividad ICM</button>
	<button id="imprimir-lista" title="Prepara una versi&oacute;n lista para imprimir">Imprimir Lista</button>
</span>
<div>
	<!--	un pequeño espacio entre la barra de opciones y la tabla-->
	&nbsp;
</div>

<table id="example" class="td-actividades-icm display">
	<thead>
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
	</tbody>
</table>
<!--</div>-->