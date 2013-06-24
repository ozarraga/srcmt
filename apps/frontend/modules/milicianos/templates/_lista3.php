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


<div id="selector-de-columna" title="Selecci&oacute;n de Columnas" class="ui-helper-hidden">
    <?php include_partial('brigest_checkboxes', array('checkBoxesArray' => $casillas_de_campos)) ?>

</div>

<div id="filtro-de-impresion" title="Criterios a imprimir" style="display: none">
    <?php include_partial('filter', array('filterForm' => $formFilter)) ?>
    <!--    //aqui esta el problema-->
</div>


<span id="opcion-barra" class="opcion-barra ui-corner-all ">
    <button id="abre-dialogo" title="Facilita seleccionar las columnas a mostrarse">Selecci&oacute;n de Columnas</button>
    <button id="boton-a-nuevo-miliciano"  onclick="document.location.href = '<?php echo url_for('@milicianos_new') ?>'" title="Redirige al registro de nuevo Brigadista Estudiantil" >Nuevo Brigadista Estudiantil</button>
    <button id="imprimir-lista" title="Prepara una versi&oacute;n lista para imprimir" >Imprimir Lista</button>
    <button id="abre-graficos" onclick="document.location.href = '<?php echo url_for('@milicianos_grafico_set') ?>'"title="Muestra los Gr&aacute;ficos" >Gr&aacute;ficos</button>
</span>
<div>
    <!--	un pequeño espacio entre la barra de opciones y la tabla-->
    &nbsp;
</div>

<table id="example" class="td-milicianos display" >
    <thead>
        <tr>
<th title="C&oacute;digo" >C&oacute;d</th>
            
            <th title="Nacionalidad" >Nac</th>
            <th title="C&eacute;dula de Identidad" >C&eacute;dula Identidad</th>
            <th title="Primer Apellido" >Primer Apellido</th>
            <th title="Segundo Apellido" >Segundo Apellido</th>
            <th title="Primer Nombre" >Primer Nombre</th>
            <th title="Segundo Nombre" >Segundo Nombre</th>
            <th title="Sexo" >Sexo</th>
            <th title="Fecha de Nacimiento" >Fecha Nacimiento</th>
            <th title="Estado Civil" >Estado Civil</th>
            <th title="Grupo Sangu&iacute;neo" >Grupo Sangu&iacute;neo</th>
            <th title="Estado" >Estado</th>
            <th title="Municipio" >Municipio</th>
            <th title="Parroquia" >Parroquia</th>
            <th title="Ciudad" >Ciudad</th>
            <th title="Direcci&oacute;n" >Direcci&oacute;n</th>
            <th title="Tel&eacute;fono Local" >Tel&eacute;fono Local</th>
            <th title="Tel&eacute;fono M&oacute;vil (Celular)" >M&oacute;vil</th>
            <th title="Correo Electr&oacute;nico" >Correo Electr&oacute;nico</th>
            <th title="Direcci&oacute;n de Emergencia" >Direcci&oacute;n Emergencia</th>
            <th title="Tel&eacute;fono de emergencia" >Tel&eacute;fono emergencia</th>
            <th title="Grado de Instrucci&oacute;n" >Grado Instrucci&oacute;n</th>
            <th title="Especialidad" >Especialidad</th>
            <th title="Idiomas" >Idiomas</th>
            <th title="Nivel de Dominio del Idioma" >Dominio Idioma</th>
            <th title="Programa de Formaci&oacute;n de Grado" >Programa de Formaci&oacute;n de Grado</th>
            <th title="Trayecto" >Trayecto</th>
            <th title="Tramo" >Tramo</th>
            <th title="Aldea" >Aldea</th>
            <th title="Sede" >Sede</th>
            <th title="Profesi&oacute;n" >Profesi&oacute;n</th>
            <th title="Oficio" >Oficio</th>
            <th title="Trabaja si/no" >Trabaja si/no</th>
            <th title="Empresa" >Empresa</th>
            <th title="Direcci&oacute;n del Trabajo u Oficina" >Direcci&oacute;n Trabajo/Oficina</th>
            <th title="Tel&eacute;fono del Trabajo u Oficina" >Tel&eacute;fono Trabajo/Oficina</th>
            <th title="Posee Veh&iacute;culo si/no" >Pos&eacute;e Veh&iacute;culo</th>
            <th title="Tipo de Veh&iacute;culo" >Tipo Veh&iacute;culo</th>
            <th title="Modelo del Veh&iacute;culo" >Modelo Veh&iacute;culo</th>
            <th title="N&uacute;mero de Placa del veh&iacute;culo" >Numero Placa</th>
            <th title="Posee Licencia" >Posee Licencia</th>
            <th title="Grado de la Licencia" >Grado Licencia</th>
            <th title="Posee Porte de Armas si/no" >Porte Armas</th>
            <th title="Numero de Porte de armas" >Numero de Porte</th>
            <th title="Tipo de Armamento" >Tipo de Armamento</th>
            <th title="Calibre del Armamento" >Calibre Armamento</th>
            <th title="Signos Particulares" >Signos Particulares</th>
            <th title="Talla del Uniforme" >Uniforme Talla</th>
            <th title="Talla de Calzado" >Calzado Talla</th>
            <th title="Estatura" >Estatura</th>
            <th title="Peso en Kg." >Peso en Kg.</th>
            <th title="Color del Cabello" >Color Cabello</th>
            <th title="Color de la Piel" >Color Piel</th>
            <th title="Discapacidad" >Discapacidad</th>
            <th title="Alergias" >Alergias</th>
            <th title="Dominio de la Mano (Diestro, Siniestro)" >Dominio Mano</th>
            <th title="Practica Deporte si/no" >Practica Deporte</th>
            <th title="Deportes que practica" >Deportes</th>
            <th title="Participa en Actividades Culturales si/no" >Participa Actividad Cultural</th>
            <th title="Actividad(es) Cultural(es) de las que participa" >Actividad(es) Cultural(es)</th>
            <th title="Agrupaci&oacute;n(es) Social(es) en las que participa" >Agrupaci&oacute;n(es) Social(es)</th>
            <th title="Misiones" >Misiones</th>
            <th title="Cooperativas" >Cooperativas</th>
            <th title="Apellidos del Beneficiario" >Apellidos Beneficiario</th>
            <th title="Nombres del Beneficiario" >Nombres Beneficiario</th>
            <th title="C&eacute;dula del Beneficiario" >C&eacute;dula Beneficiario</th>
            <th title="Tel&eacute;fono del Beneficiario" >Tel&eacute;fono Beneficiario</th>
            <th title="Fecha de Creaci&oacute;n" >Fecha Creaci&oacute;n</th>
            <th title="Fecha de Actualizac&oacute;n" >Fecha Actualizac&oacute;n</th>
        </tr>
    </thead>
    <tbody  class="ui-widget ui-widget-content">
    </tbody>
</table>

