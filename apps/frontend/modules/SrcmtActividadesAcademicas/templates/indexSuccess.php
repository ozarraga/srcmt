<?php use_javascript('app/frontend/SrcmtActividadesAcademicas/index/ListaFiltrosFormas.js')       ?>

<h3 class="ui-widget-header  ui-corner-all">&nbsp;&nbsp; Actividades Acad&eacute;micas</h3>

<div id="filtro-de-impresion" title="Criterios a imprimir" style="display: none">
	<?php include_partial('filter', array('filterForm' => $formFilter)) ?>
</div>

<?php include_partial('lista', array('ActividadesAcademicas'=>$ActividadesAcademicas)) ?>

