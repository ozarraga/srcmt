<?php use_javascript('app/frontend/SrcmtActividadesIcm/index/ListaFiltrosFormas.js', '', array('media' => 'all')) ?>


<h3 class="ui-widget-header  ui-corner-all">&nbsp;&nbsp; Actividades de Integraci&oacute;n C&iacute;vico Militar</h3>
<!--<div class="ui-widget-content ui-corner-bottom ">-->
<div id="filtro-de-impresion" title="Criterios a imprimir" style="display: none">
	<?php include_partial('filter', array('filterForm' => $formFilter)) ?>
</div>
<?php include_partial('lista', array('ActividadesICM' => $ActividadesICM )) ?>

