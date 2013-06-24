<?php use_javascript('jquery.dataTables.js') ?>
<?php //use_javascript('jquery.dataTables.min.js')         ?>
<?php //use_stylesheet('demo_page.css')           ?>
<?php //use_stylesheet('demo_table.css')           ?>
<?php //use_stylesheet('main.css')     ?>
<?php use_stylesheet('demo_table_jui.css') ?>

<script>
    $(document).ready(function() {
        var aSelected = [];
        /* Click event handler */
        $('#example2 tbody tr').live('click', function () {
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

<div  class="bordes-adorno ui-corner-top">
	<!--	un pequeño espacio entre la barra de opciones y la tabla-->
	&nbsp;
</div>

<table id="example2" class="td-brigadistas-dado td-fondo-blanco display" >
    <thead>
        <tr class="th-brigadistas-dado">
            <th >C&oacute;digo</th>
            <th >Nacionalidad</th>
            <th >Cedula identidad</th>
            <th >Primer apellido</th>
            <th >Segundo apellido</th>
            <th >Primer nombre</th>
            <th >Segundo nombre</th>
            <th >Tel&eacute;fono m&oacute;vil</th>
            <th >Correo electr&oacute;nico</th>
            <th >Tel&eacute;fono emergencia</th>
        </tr>
    </thead>
    <tbody  class="ui-widget ui-widget-content">
        <?php foreach ($srcmt_milicianos as $brigadista): ?>
            <tr>
                <td >
                    <?php echo link_to($brigadista->getCodigoMiliciano(), '@milicianos_show?codigo_miliciano=' . $brigadista->getCodigoMiliciano()) ?><br />
                </td>
                <td><?php echo $brigadista->getNacionalidad() ?></td>
                <td><?php echo $brigadista->getCedulaIdentidad() ?></td>
                <td><?php echo $brigadista->getPrimerApellido() ?></td>
                <td><?php echo $brigadista->getSegundoApellido() ?></td>
                <td><?php echo $brigadista->getPrimerNombre() ?></td>
                <td><?php echo $brigadista->getSegundoNombre() ?></td>
                <td><?php echo $brigadista->getMovil() ?></td>
                <td><?php echo $brigadista->getCorreoElectronico() ?></td>
                <td><?php echo $brigadista->getTelefonoEmergencia() ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>