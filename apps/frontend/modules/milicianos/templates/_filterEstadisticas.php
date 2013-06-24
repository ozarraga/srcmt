<?php //use_javascript('dynamicForm.js)         ?>
<?php use_stylesheets_for_form($filterForm) ?>
<?php use_javascripts_for_form($filterForm) ?>

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


<form id="<?php echo $filterForm->getName() ?>" name="<?php echo $filterForm->getName() ?>" action="<?php echo url_for('milicianos_grafico_set') ?>"  method="POST">

    <?php echo $filterForm['_csrf_token'] ?>
    <?php echo $filterForm->renderHiddenFields() ?>
    <?php echo $filterForm->renderglobalerrors() ?>
    <div id="tabs-milicianos">
        <table>
            <tfoot class="tfoot-tr-td-input">
                <tr>
                    <td >
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>
                        <ul>
                            <li><a href="#tab-1" title="Seleccionar Criterios de Agrupamiento">Paso 1: </a></li>
                            <li><a href="#tab-2" title="Establecer Filtros al conjunto de Registros">Paso 2: </a></li>
                        </ul>
                        <div id="tab-1">
                            <?php $titulos_y_campos = $filterForm->getOption('titulos_y_campos') ?>
                            <?php $indice = 0 ?>
                            <?php $limite = 11 ?>

                            <fieldset id="fielset_input_select">
                                <ul class="datatables-checkboxes">
                                    <?php foreach ($titulos_y_campos as $titulo => $campo) : ?>

                                        <?php (float) $modulo = ($indice % $limite) ?>
                                        <?php if ($modulo == 0): ?>
                                        </ul>
                                    </fieldset >
                                    <fieldset >
                                        <ul class="datatables-checkboxes">
                                        <?php endif; ?>
                                        <li>
                                            <?php echo $filterForm['columnas'][$campo]->render() ?>
                                        </li>
                                        <?php $indice++ ?>
                                    <?php endforeach; ?>

                                </ul>
                            </fieldset >
                        </div>
                        <div id="tab-2">
                            <div id="seccs-grupos-milicianos">
                                <ul>
                                    <li><a href="#seccs-1">Datos Personales</a></li>
                                    <li><a href="#seccs-2">Ubicaci&oacute;n</a></li>
                                    <li><a href="#seccs-3">Datos Acad&eacute;micos</a></li>
                                    <li><a href="#seccs-4">Inserci&oacute;n Social</a></li>
                                    <li><a href="#seccs-5">Movilidad y Defensa</a></li>
                                    <li><a href="#seccs-6">Se&ntilde;ales Fision&oacute;micas</a></li>
                                    <li><a href="#seccs-7">Datos Laborales</a></li>
                                    <li><a href="#seccs-8">Beneficiario</a></li>
                                    <li><a href="#seccs-9">Actividades Acad&eacute;micas</a></li>
                                    <li><a href="#seccs-10">Actividades ICM</a></li>

                                </ul>
                                <div id="seccs-1">
                                    <table class="srcmt-dimension-forma" border="0"  cellpadding="0">
                                        <caption>
                                            <h3>Datos personales</h3>
                                        </caption>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php echo $filterForm['cedula_identidad']->renderError() ?><br />
                                                    <?php echo $filterForm['cedula_identidad']->renderLabel() ?><br />
                                                    <?php echo $filterForm['cedula_identidad'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $filterForm['primer_apellido']->renderError() ?><br />
                                                    <?php echo $filterForm['primer_apellido']->renderLabel() ?><br />
                                                    <?php echo $filterForm['primer_apellido'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $filterForm['grupo_sanguineo']->renderError() ?><br />
                                                    <?php echo $filterForm['grupo_sanguineo']->renderLabel() ?><br />
                                                    <?php echo $filterForm['grupo_sanguineo'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php echo $filterForm['nacionalidad']->renderError() ?><br />
                                                    <?php echo $filterForm['nacionalidad']->renderLabel() ?><br />
                                                    <?php echo $filterForm['nacionalidad'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $filterForm['segundo_apellido']->renderError() ?><br />
                                                    <?php echo $filterForm['segundo_apellido']->renderLabel() ?><br />
                                                    <?php echo $filterForm['segundo_apellido'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $filterForm['fecha_nacimiento']->renderError() ?><br />
                                                    <?php echo $filterForm['fecha_nacimiento']->renderLabel() ?><br />
                                                    <?php echo $filterForm['fecha_nacimiento'] ?>
                                                </td>


                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php echo $filterForm['estado_civil']->renderError() ?><br />
                                                    <?php echo $filterForm['estado_civil']->renderLabel() ?><br />
                                                    <?php echo $filterForm['estado_civil'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $filterForm['primer_nombre']->renderError() ?><br />
                                                    <?php echo $filterForm['primer_nombre']->renderLabel() ?><br />
                                                    <?php echo $filterForm['primer_nombre'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $filterForm['created_at']->renderLabel() ?><br />
                                                    <?php echo $filterForm['created_at'] ?>
                                                </td>


                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php echo $filterForm['sexo']->renderError() ?><br />
                                                    <?php echo $filterForm['sexo']->renderLabel() ?><br />
                                                    <?php echo $filterForm['sexo'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $filterForm['segundo_nombre']->renderError() ?><br />
                                                    <?php echo $filterForm['segundo_nombre']->renderLabel() ?><br />
                                                    <?php echo $filterForm['segundo_nombre'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $filterForm['updated_at']->renderLabel() ?><br />
                                                    <?php echo $filterForm['updated_at'] ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="seccs-2">

                                    <script>
                                        $(document).ready(function() {
                                            $("#srcmt_milicianos_codigo_estado").bind("change", this, function(event) {
                                                var c_estado = this;
                                                var select_municipio = document.getElementById("srcmt_milicianos_codigo_municipio");
                                                select_municipio.options.length = 0;
                                                select_municipio.options[select_municipio.options.length] = new Option('Seleccione un Municipio', '');
                                                jQuery.ajax({
                                                    url: "<?php echo url_for('FuncionesComunes/ObtenerMunicipio') ?>",
                                                    data: {
                                                        codigo_estado: c_estado.value

                                                    },
                                                    dataType: "json",
                                                    type: "POST",
                                                    success: function(data, textStatus, jqXHR) {

                                                        $.map(data, function(item) {
                                                            select_municipio.options[select_municipio.options.length] = new Option(item.municipio, item.codigo_municipio);
                                                        })
                                                    }
                                                })
                                            })
                                        });
                                    </script>
                                    <script>
                                        $(document).ready(function() {
                                            $("#srcmt_milicianos_codigo_municipio").bind("change", this, function(event) {
                                                var c_estado = document.getElementById("srcmt_milicianos_codigo_estado");
                                                var c_municipio = document.getElementById("srcmt_milicianos_codigo_municipio");

                                                var select_parroquia = document.getElementById("srcmt_milicianos_codigo_parroquia");
                                                var select_ciudad = document.getElementById("srcmt_milicianos_codigo_ciudad");

                                                select_parroquia.options.length = 0;
                                                select_parroquia.options[select_parroquia.options.length] = new Option('Seleccione una Parroquia', '');

                                                select_ciudad.options.length = 0;
                                                select_ciudad.options[select_ciudad.options.length] = new Option('Seleccione una Ciudad', '');

                                                jQuery.ajax({
                                                    url: "<?php //echo url_for('FuncionesComunes/ObtenerParroquia')                                    ?>",
                                                    data: {
                                                        codigo_estado: c_estado.value,
                                                        codigo_municipio: c_municipio.value

                                                    },
                                                    dataType: "json",
                                                    type: "POST",
                                                    success: function(data, textStatus, jqXHR) {

                                                        $.map(data, function(item) {
                                                            select_parroquia.options[select_parroquia.options.length] = new Option(item.parroquia, item.codigo_parroquia);
                                                        })
                                                    }
                                                })///final de ajax
                                                jQuery.ajax({
                                                    url: "<?php //echo url_for('FuncionesComunes/ObtenerCiudad')                                    ?>",
                                                    data: {
                                                        codigo_estado: c_estado.value,
                                                        codigo_municipio: c_municipio.value

                                                    },
                                                    dataType: "json",
                                                    type: "POST",
                                                    success: function(data, textStatus, jqXHR) {

                                                        $.map(data, function(item) {
                                                            select_ciudad.options[select_ciudad.options.length] = new Option(item.ciudad, item.codigo_ciudad);
                                                        })
                                                    }
                                                })///final de ajax
                                            })///final de bind
                                        });
                                    </script>

                                    <table border="0">
                                        <caption>
                                            <h3>
                                                Ubicaci&oacute;n
                                            </h3>
                                        </caption>
                                        <thead>
                                            <tr>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php echo $filterForm['codigo_estado']->renderError() ?><br />
                                                    <?php echo $filterForm['codigo_estado']->renderLabel() ?><br />
                                                    <?php echo $filterForm['codigo_estado']->render() ?>

                                                </td>
                                                <td>
                                                    <?php echo $filterForm['codigo_municipio']->renderError() ?><br />
                                                    <?php echo $filterForm['codigo_municipio']->renderLabel() ?><br />
                                                    <?php echo $filterForm['codigo_municipio']->render() ?>
                                                </td>
                                                <td>
                                                    <?php echo $filterForm['codigo_parroquia']->renderError() ?><br />
                                                    <?php echo $filterForm['codigo_parroquia']->renderLabel() ?><br />
                                                    <?php echo $filterForm['codigo_parroquia'] ?>


                                                </td>
                                                <td>
                                                    <?php echo $filterForm['codigo_ciudad']->renderError() ?><br />
                                                    <?php echo $filterForm['codigo_ciudad']->renderLabel() ?><br />
                                                    <?php echo $filterForm['codigo_ciudad'] ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <?php echo $filterForm['direccion']->renderError() ?><br />
                                    <?php echo $filterForm['direccion']->renderLabel() ?><br />
                                    <?php echo $filterForm['direccion']->render(array('cols' => 21, 'rows' => 3)) ?>


                                    <?php echo $filterForm['telefono_local']->renderError() ?><br />
                                    <?php echo $filterForm['telefono_local']->renderLabel() ?><br />
                                    <?php echo $filterForm['telefono_local'] ?>


                                    <?php echo $filterForm['movil']->renderError() ?><br />
                                    <?php echo $filterForm['movil']->renderLabel() ?><br />
                                    <?php echo $filterForm['movil'] ?>

                                    <?php echo $filterForm['correo_electronico']->renderError() ?><br />
                                    <?php echo $filterForm['correo_electronico']->renderLabel() ?><br />
                                    <?php echo $filterForm['correo_electronico'] ?>


                                    <?php echo $filterForm['direccion_emergencia']->renderError() ?><br />
                                    <?php echo $filterForm['direccion_emergencia']->renderLabel() ?><br />
                                    <?php echo $filterForm['direccion_emergencia']->render(array('cols' => 21, 'rows' => 3)) ?>

                                    <?php echo $filterForm['telefono_emergencia']->renderError() ?><br />
                                    <?php echo $filterForm['telefono_emergencia']->renderLabel() ?><br />
                                    <?php echo $filterForm['telefono_emergencia'] ?>
                                </div>
                                <div id="seccs-3">
                                    <p>
                                        Datos Acad&eacute;micos
                                    </p>

                                    <?php echo $filterForm['grado_instruccion']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['grado_instruccion']->renderLabel() ?><br />
                                    <?php echo $filterForm['grado_instruccion'] ?>


                                    <?php echo $filterForm['especialidad']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['especialidad']->renderLabel() ?><br />
                                    <?php echo $filterForm['especialidad']->render(array('cols' => 21, 'rows' => 3)) ?>


                                    <?php echo $filterForm['idiomas']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['idiomas']->renderLabel() ?><br />
                                    <?php echo $filterForm['idiomas'] ?>

                                    <?php echo $filterForm['nivel_dominio_idioma']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['nivel_dominio_idioma']->renderLabel() ?><br />
                                    <?php echo $filterForm['nivel_dominio_idioma'] ?>

                                    <?php echo $filterForm['programa_formacion_grado']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['programa_formacion_grado']->renderLabel() ?><br/>
                                    <?php echo $filterForm['programa_formacion_grado'] ?>


                                    <?php echo $filterForm['trayecto']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['trayecto']->renderLabel() ?><br />
                                    <?php echo $filterForm['trayecto'] ?>


                                    <?php echo $filterForm['tramo']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['tramo']->renderLabel() ?><br />
                                    <?php echo $filterForm['tramo'] ?>


                                    <?php echo $filterForm['sedes']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['sedes']->renderLabel() ?><br />
                                    <?php echo $filterForm['sedes'] ?>


                                    <?php echo $filterForm['aldea']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['aldea']->renderLabel() ?><br />
                                    <?php echo $filterForm['aldea']->render(array('cols' => 21, 'rows' => 3)) ?>
                                </div>
                                <div id="seccs-4">
                                    <p>
                                        Inserci&oacute;n Social
                                    </p>

                                    <?php echo $filterForm['practica_deporte']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['practica_deporte']->renderLabel() ?><br />
                                    <?php echo $filterForm['practica_deporte'] ?>

                                    <?php echo $filterForm['deporte']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['deporte']->renderLabel() ?><br />
                                    <?php echo $filterForm['deporte'] ?>

                                    <?php echo $filterForm['participa_actividad_cultural']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['participa_actividad_cultural']->renderLabel() ?><br />
                                    <?php echo $filterForm['participa_actividad_cultural'] ?>

                                    <?php echo $filterForm['actividad_cultural']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['actividad_cultural']->renderLabel() ?><br />
                                    <?php echo $filterForm['actividad_cultural'] ?>

                                    <?php echo $filterForm['agrupacion_social']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['agrupacion_social']->renderLabel() ?><br />
                                    <?php echo $filterForm['agrupacion_social']->render(array('cols' => 21, 'rows' => 3)) ?>

                                    <?php echo $filterForm['misiones']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['misiones']->renderLabel() ?><br />
                                    <?php echo $filterForm['misiones']->render(array('cols' => 21, 'rows' => 3)) ?>

                                </div>
                                <div id="seccs-5">
                                    <p>
                                        Movilidad y Defensa
                                    </p>

                                    <?php echo $filterForm['posee_vehiculo']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['posee_vehiculo']->renderLabel() ?><br />
                                    <?php echo $filterForm['posee_vehiculo'] ?>

                                    <?php echo $filterForm['tipo_vehiculo']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['tipo_vehiculo']->renderLabel() ?><br />
                                    <?php echo $filterForm['tipo_vehiculo'] ?>

                                    <?php echo $filterForm['modelo_vehiculo']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['modelo_vehiculo']->renderLabel() ?><br />
                                    <?php echo $filterForm['modelo_vehiculo'] ?>

                                    <?php echo $filterForm['numero_placa']->renderError() ?>&nbsp;
                                    <?php echo $filterForm['numero_placa']->renderLabel() ?><br />
                                    <?php echo $filterForm['numero_placa'] ?>

                                    <?php echo $filterForm['posee_licencia']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['posee_licencia']->renderLabel() ?><br />
                                    <?php echo $filterForm['posee_licencia'] ?>

                                    <?php echo $filterForm['grado_licencia']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['grado_licencia']->renderLabel() ?><br />
                                    <?php echo $filterForm['grado_licencia'] ?>

                                    <?php echo $filterForm['porte_armas']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['porte_armas']->renderLabel() ?><br />
                                    <?php echo $filterForm['porte_armas'] ?>

                                    <?php echo $filterForm['numero_porte_armas']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['numero_porte_armas']->renderLabel() ?><br />
                                    <?php echo $filterForm['numero_porte_armas'] ?>

                                    <?php echo $filterForm['tipo_armamento']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['tipo_armamento']->renderLabel() ?><br />
                                    <?php echo $filterForm['tipo_armamento'] ?>

                                    <?php echo $filterForm['calibre_armamento']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['calibre_armamento']->renderLabel() ?><br />
                                    <?php echo $filterForm['calibre_armamento'] ?>
                                </div>
                                <div id="seccs-6">
                                    <p>
                                        Se&ntilde;ales Fision&oacute;micas
                                    </p>

                                    <?php echo $filterForm['signos_particulares']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['signos_particulares']->renderLabel() ?><br />
                                    <?php echo $filterForm['signos_particulares']->render(array('cols' => 21, 'rows' => 3)) ?>

                                    <?php echo $filterForm['talla_uniforme']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['talla_uniforme']->renderLabel() ?><br />
                                    <?php echo $filterForm['talla_uniforme'] ?>


                                    <?php echo $filterForm['talla_calzado']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['talla_calzado']->renderLabel() ?><br />
                                    <?php echo $filterForm['talla_calzado'] ?>


                                    <?php echo $filterForm['estatura']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['estatura']->renderLabel() ?><br />
                                    <?php echo $filterForm['estatura'] ?>


                                    <?php echo $filterForm['peso']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['peso']->renderLabel() ?><br />
                                    <?php echo $filterForm['peso'] ?>


                                    <?php echo $filterForm['color_cabello']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['color_cabello']->renderLabel() ?><br />
                                    <?php echo $filterForm['color_cabello'] ?>


                                    <?php echo $filterForm['color_piel']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['color_piel']->renderLabel() ?><br />
                                    <?php echo $filterForm['color_piel'] ?>


                                    <?php echo $filterForm['discapacidad']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['discapacidad']->renderLabel() ?><br />
                                    <?php echo $filterForm['discapacidad']->render(array('cols' => 21, 'rows' => 3)) ?>

                                    <?php echo $filterForm['alergias']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['alergias']->renderLabel() ?><br />
                                    <?php echo $filterForm['alergias']->render(array('cols' => 21, 'rows' => 3)) ?>


                                    <?php echo $filterForm['dominio_mano']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['dominio_mano']->renderLabel() ?><br />
                                    <?php echo $filterForm['dominio_mano'] ?>
                                </div>
                                <div id="seccs-7">
                                    <p>
                                        Datos Laborales
                                    </p>

                                    <?php echo $filterForm['profesion']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['profesion']->renderLabel() ?><br />
                                    <?php echo $filterForm['profesion'] ?>

                                    <?php echo $filterForm['oficio']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['oficio']->renderLabel() ?><br />
                                    <?php echo $filterForm['oficio'] ?>

                                    <?php echo $filterForm['trabaja_si_no']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['trabaja_si_no']->renderLabel() ?><br />
                                    <?php echo $filterForm['trabaja_si_no'] ?>

                                    <?php echo $filterForm['nombre_empresa']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['nombre_empresa']->renderLabel() ?><br />
                                    <?php echo $filterForm['nombre_empresa'] ?>

                                    <?php echo $filterForm['direccion_oficina']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['direccion_oficina']->renderLabel() ?><br />
                                    <?php echo $filterForm['direccion_oficina']->render(array('cols' => 21, 'rows' => 3)) ?>

                                    <?php echo $filterForm['telefono_oficina']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['telefono_oficina']->renderLabel() ?><br />
                                    <?php echo $filterForm['telefono_oficina'] ?>
                                </div>
                                <div id="seccs-8">
                                    <p>
                                        Beneficiario
                                    </p>

                                    <?php echo $filterForm['apellidos_beneficiario']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['apellidos_beneficiario']->renderLabel() ?><br />
                                    <?php echo $filterForm['apellidos_beneficiario'] ?>


                                    <?php echo $filterForm['nombres_beneficiario']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['nombres_beneficiario']->renderLabel() ?><br />
                                    <?php echo $filterForm['nombres_beneficiario'] ?>


                                    <?php echo $filterForm['cedula_beneficiario']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['cedula_beneficiario']->renderLabel() ?><br />
                                    <?php echo $filterForm['cedula_beneficiario'] ?>


                                    <?php echo $filterForm['telefono_beneficiario']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['telefono_beneficiario']->renderLabel() ?><br />
                                    <?php echo $filterForm['telefono_beneficiario'] ?>
                                </div>
                                <div id="seccs-9">
                                    <p>
                                        Actividades Acad&eacute;micas
                                    </p>
                                    <?php echo $filterForm['actividad_academica_list']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['actividad_academica_list']->renderLabel() ?><br />
                                    <?php echo $filterForm['actividad_academica_list'] ?>
                                </div>
                                <div id="seccs-10">
                                    <p>
                                        Actividades ICM
                                    </p>
                                    <?php echo $filterForm['actividad_icm_list']->renderError() ?>&nbsp;<br />
                                    <?php echo $filterForm['actividad_icm_list']->renderLabel() ?><br />
                                    <?php echo $filterForm['actividad_icm_list'] ?>
                                </div>
                            </div>

                        </div>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</form>