
<style>
    @media all {
        #feedback { font-size: 1.4em; }
        #miforma fieldset,
        #srcmt_brigadistas_dado_filters fieldset
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

</style>


<div id="selector-de-columna" title="Selecci&oacute;n de Columnas" style="display: none">
    <?php include_partial('brigdado_checkboxes', array('checkBoxesArray' => $casillas_de_campos)) ?>

</div>

<div id="filtro-de-impresion" title="Criterios a imprimir" style="display: none">
    <?php include_partial('filter', array('filterForm' => $formFilter)) ?>
</div>


<span id="opcion-barra" class="opcion-barra ui-corner-all ">
    <button id="abre-dialogo" title="Facilita seleccionar las columnas a mostrarse">Selecci&oacute;n de Columnas</button>
    <button id="boton-a-nuevo-BrigadistaDado"  onclick="document.location.href='<?php echo url_for('@BrigadistasDado_new') ?>' " title="Redirige al registro de nuevo Brigadista DADO" >Nuevo Brigadista DADO</button>
    <button id="imprimir-lista" title="Prepara una versi&oacute;n lista para imprimir" >Imprimir Lista</button>
</span>
<div>
    <!--	un pequeño espacio entre la barra de opciones y la tabla-->
    &nbsp;
</div>

<table id="example" class="td-brigadistas-dado display" >
    <thead>
        <tr >
            <th title="C&oacute;digo">C&oacute;d</th>
            <th title="Nacionalidad">Nac</th>
            <th title="C&eacute;dula de identidad">C&eacute;dula Identidad</th>
            <th title="Religi&oacute;n">Religi&oacute;n</th>
            <th title="Primer apellido">Primer Apellido</th>
            <th title="Segundo apellido">Segundo Apellido</th>
            <th title="Primer nombre">Primer Nombre</th>
            <th title="Segundo nombre">Segundo Nombre</th>
            <th title="Sexo">Sexo</th>
            <th title="Fecha de nacimiento">Fecha de Nacimiento</th>
            <th title="Lugar de nacimiento">Lugar de Nacimiento</th>
            <th title="Estado civil">Estado Civil</th>
            <th title="Grupo sangu&iacute;neo">Grupo Sangu&iacute;neo</th>
            <th title="Estado">Estado</th>
            <th title="Municipio">Municipio</th>
            <th title="Parroquia">Parroquia</th>
            <th title="Ciudad">Ciudad</th>
            <th title="Direcci&oacute;n domiciliaria">Direcci&oacute;n Domiciliaria</th>
            <th title="Tel&eacute;fono de domicilio">Tel&eacute;fono Domicilio</th>
            <th title="Tel&eacute;fono m&oacute;vil (Celular)">Tel&eacute;fono M&oacute;vil</th>
            <th title="Correo electr&oacute;nico">Correo Electr&oacute;nico</th>
            <th title="Direcci&oacute;n de emergencia">Direcci&oacute;n Emergencia</th>
            <th title="Tel&eacute;fono de emergencia">Tel&eacute;fono Emergencia</th>
            <th title="Unidad de adscripci&oacute;n laboral">Unidad Adscripci&oacute;n Laboral</th>
            <th title="Extensi&oacute;n interna">Extensi&oacute;n Interna</th>
            <th title="Perfil de empleado">Perfil Empleado</th>
            <th title="Jefe de sector">Jefe de Sector</th>
            <th title="Grado de instrucci&oacute;n">Grado Instrucci&oacute;n</th>
            <th title="Especialidad">Especialidad</th>
            <th title="Sede UBV">Sede</th>
            <th title="Jerarquia">Jerarquia</th>
            <th title="Profesi&oacute;n">Profesi&oacute;n</th>
            <th title="Oficio">Oficio</th>
            <th title="Centro de votaci&oacute;n del CNE">Centro Votaci&oacute;n CNE</th>
            <th title="Direcci&oacute;n de oficina">Direcci&oacute;n Oficina</th>
            <th title="Talla de pantal&oacute;n">Talla Pantal&oacute;n</th>
            <th title="Talla de camisa">Talla Camisa</th>
            <th title="Talla de calzado">Talla Calzado</th>
            <th title="Talla de gorra">Talla Gorra</th>
            <th title="Estatura">Estatura</th>
            <th title="Peso">Peso</th>
            <th title="Color del cabello">Color Cabello</th>
            <th title="Color de la piel">Color Piel</th>
            <th title="Discapacidad">Discapacidad</th>
            <th title="Alergias">Alergias</th>
            <th title="Dominio de la mano (Diestro, Siniestro)">Dominio Mano</th>
            <th title="Deporte">Deporte</th>
            <th title="Actividades culturales">Actividades Culturales</th>
            <th title="Apellidos del beneficiario">Apellidos Beneficiario</th>
            <th title="Nombres del beneficiario">Nombres Beneficiario</th>
            <th title="C&eacute;dula del beneficiario">C&eacute;dula Beneficiario</th>
            <th title="Tel&eacute;fono del beneficiario">Tel&eacute;fono Beneficiario</th>
            <th title="Fecha de Creaci&oacute;n">Fecha de Creaci&oacute;n</th>
            <th title="Fecha de Actualizaci&oacute;n">Fecha de Actualizaci&oacute;n</th>
        </tr>
    </thead>
    <tbody  class="ui-widget ui-widget-content">
    </tbody>
</table>

