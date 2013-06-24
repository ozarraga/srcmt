<?php use_stylesheet('demo_table_jui.css', '', array('media' => 'all')) ?>
<?php use_javascript('app/frontend/BrigadistaDado/index/ListaFiltrosFormas.js', '', array('media'=>'all')) ?>
<?php use_javascript('jquery.dataTables.js', '', array('media' => 'all')) ?>
<?php use_javascript('../sfFormExtraPlugin/js/double_list.js', '', array('media' => 'all')) ?>


<h3 class="ui-widget-header ui-corner-all"><span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp;Lista de Brigadistas DADO</h3>

<!-- $srcmt_brigadistas_dado  -->

<?php include_partial('lista3', array( 
    'casillas_de_campos' => $casillas_de_campos, 
    'formFilter' => $formFilter)) ?>