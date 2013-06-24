<?php use_stylesheet('demo_table_jui.css', '', array('media' => 'all')) ?>
<?php use_javascript('app/frontend/milicianos/index/ListaFiltrosFormas.js', '', array('media'=>'all')) ?>
<?php use_javascript('jquery.dataTables.js', '', array('media' => 'all')) ?>
<?php use_javascript('../sfFormExtraPlugin/js/double_list.js', '', array('media' => 'all')) ?>

<h3 class="ui-widget-header ui-corner-all"><span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp;Lista de Brigadistas Estudiantiles</h3>

<!-- $milicianos  -->

<?php include_partial('lista3', array('milicianos' => $milicianos, 
    'casillas_de_campos'=>$casillas_de_campos, 
    'formFilter' => $formFilter
    ))?>  