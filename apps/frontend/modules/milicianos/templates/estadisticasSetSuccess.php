


--------------------------------
<?php //use_stylesheet('basic.css', '', array('media' => 'all')) ?>
<?php use_stylesheet('visualize.css', '', array('media' => 'all')) ?>

<?php use_stylesheet('demo_table_jui.css', '', array('media' => 'all')) ?>


<?php use_javascript('jquery.dataTables.js', '', array('media' => 'all')) ?>
<?php use_javascript('excanvas.js', '', array('media' => 'all')) ?>
<?php use_javascript('visualize.jQuery.js', '', array('media' => 'all')) ?>
<?php use_javascript('../sfFormExtraPlugin/js/double_list.js', '', array('media' => 'all')) ?>
<?php use_javascript('app/frontend/milicianos/estadisticas/FiltrosFormas.js', '', array('media' => 'all')) ?>

<style>
    @media all {
        #feedback { font-size: 1.4em; }
        #miforma fieldset,
        #srcmt_milicianos_filters fieldset
        {
            float: left;
            background-image: none;
            border-style: none;
            text-align: justify;
            margin-left: 0px;


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
        #columnas-seleccionables
        {
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
    }


    /*	http://trirand.com/blog/jqgrid/jqgrid.html*/
</style>
<h3 class="ui-widget-header ui-corner-all"><span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp;Gr&aacute;ficos de Brigadistas Estudiantiles</h3>

<!-- $milicianos  -->

<span id="opcion-barra" class="opcion-barra ui-corner-all ">


    <button id="seleccionar-criterios" title="Permite seleccionar el conjunto de datos para el informe estad&iacute;stico" >Seleccionar Criterios</button>
    <button id="abre-grafico" title="Permite permite visualizar las estad&iacute;sticas" >Visualizar Gr&aacute;fico</button>
</span>
<div>
    <!--	un pequeño espacio entre la barra de opciones y la tabla-->
    &nbsp;
</div>

<div id="seleccion-de-criterios" title="Criterios a considerar" style="display: none">
    <?php include_partial('filterEstadisticas', array('filterForm' => $formFilter)) ?>
    <!--    //aqui esta el problema-->
</div>

<div id="dialogo-grafico" title="Gr&aacute;fico" style="display: none">
    <?php use_stylesheet('visualize-light.css', '', array('media' => 'all')) ?>
    <div id="lugar-grafico"></div>
</div>



<!--<table  width="100%" >
    <tbody >
        <tr>
            <td >
                <div style="padding: 10px"></div>
<?php //echo image_tag('bolivariana1.jpg', 'width="100%" height="500" alt="Bicentenario"') ?>
            <img width="100%" height="500" src="/images/bolivariana1.jpg" alt="Bicentenario" />
            </td>
        </tr>
    </tbody>
</table>-->
<table id="example" class="td-milicianos display" >
    <thead>
        <tr id="tr_th">
            <th title="Nacionalidad" >Nac</th>
            <th title="Sexo" >Sexo</th>
            <th title="Fecha de Nacimiento" >Fecha Nacimiento</th>
            <th title="Estado Civil" >Estado Civil</th>
            <th title="Grupo Sangu&iacute;neo" >Grupo Sangu&iacute;neo</th>
            <th title="Estado" >Estado</th>
            <th title="Municipio" >Municipio</th>
            <th title="Parroquia" >Parroquia</th>
            <th title="Ciudad" >Ciudad</th>
            <th title="Grado de Instrucci&oacute;n" >Grado Instrucci&oacute;n</th>
            <th title="Programa de Formaci&oacute;n de Grado" >Programa de Formaci&oacute;n de Grado</th>
            <th title="Trayecto" >Trayecto</th>
            <th title="Tramo" >Tramo</th>
            <th title="Sede" >Sede</th>
            <th title="Trabaja si/no" >Trabaja si/no</th>
            <th title="Posee Veh&iacute;culo si/no" >Pos&eacute;e Veh&iacute;culo</th>
            <th title="Posee Licencia" >Posee Licencia</th>
            <th title="Posee Porte de Armas si/no" >Porte Armas</th>
            <th title="Talla del Uniforme" >Uniforme Talla</th>
            <th title="Dominio de la Mano (Diestro, Siniestro)" >Dominio Mano</th>
            <th title="Practica Deporte si/no" >Practica Deporte</th>
            <th title="Participa en Actividades Culturales si/no" >Participa Actividad Cultural</th>
        </tr>
    </thead>
    <tbody  class="ui-widget ui-widget-content">
    </tbody>
</table>


