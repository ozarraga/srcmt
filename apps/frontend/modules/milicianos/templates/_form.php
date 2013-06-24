<?php use_javascript('dynamicForm.js') ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_javascript('/sfFormExtraPlugin/js/double_list.js') ?>

<script>
    $(document).ready(function() {
        $( "#tabs-miliciano" ).tabs();
        $("input:button, input:submit, #botonSuprimir").button();
    });

</script>
<form action="<?php echo url_for('milicianos/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?codigo_miliciano=' . $form->getObject()->getCodigoMiliciano() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>


    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <?php echo $form['_csrf_token'] ?>
    <?php echo $form->renderHiddenFields() ?>
    <?php echo $form->renderglobalerrors() ?>
    <div id="tabs-miliciano">
        <table>
            <tfoot class="tfoot-tr-td-input">
                <tr>
                    <td colspan="2">
                        &nbsp;<?php echo button_to('Listado de Brigadistas Estudiantiles', '@milicianos') ?>
                        <?php if (!$form->getObject()->isNew()): ?>

                            &nbsp;<?php echo button_to('Imprimir', '@milicianos_imprimir_sencillo?codigo_miliciano=' . $form->getObject()->getCodigoMiliciano()) ?>
                            &nbsp;<?php echo link_to('Suprimir', '@milicianos_delete?codigo_miliciano=' . $form->getObject()->getCodigoMiliciano(), array('id' => 'botonSuprimir', 'method' => 'delete', 'confirm' => 'Hace usted lo correcto?')) ?>
                            &nbsp;<?php echo button_to('Nuevo Brigadista Estudiantil', '@milicianos_new') ?>
                        <?php endif; ?>
                        <input type="submit" value="Guardar registro" />
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>

                        <ul>
                            <li><a href="#tab-1">Datos Personales</a></li>
                            <li><a href="#tab-2">Ubicaci&oacute;n</a></li>
                            <li><a href="#tab-3">Datos Acad&eacute;micos</a></li>
                            <li><a href="#tab-4">Inserci&oacute;n Social</a></li>
                            <li><a href="#tab-5">Movilidad y Defensa</a></li>
                            <li><a href="#tab-6">Se&ntilde;ales Fision&oacute;micas</a></li>
                            <li><a href="#tab-7">Datos Laborales</a></li>
                            <li><a href="#tab-8">Beneficiario</a></li>
                            <li><a href="#tab-9">Asignar Actividades Acad&eacute;micas</a></li>
                            <li><a href="#tab-10">Asignar Actividades ICM</a></li>

                        </ul>
                        <div  id="tab-1">
                            <table  class="srcmt-dimension-forma" border="0"  cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td colspan="4">

                                            <span class="obligatorio">&nbsp;Los Campos Con <strong>(*)</strong> Son Obligatorios</span>

                                        </td>
                                    </tr>
                                    <tr >
                                        <td>
                                            <?php echo $form['nacionalidad']->renderError() ?><br />
                                            <?php echo $form['nacionalidad']->renderLabel() ?><br />
                                            <?php echo $form['nacionalidad'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td>
                                            <?php echo $form['cedula_identidad']->renderError() ?><br />
                                            <?php echo $form['cedula_identidad']->renderLabel() ?><br />
                                            <?php echo $form['cedula_identidad'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td>
                                            <?php echo $form['estado_civil']->renderError() ?><br />
                                            <?php echo $form['estado_civil']->renderLabel() ?><br />
                                            <?php echo $form['estado_civil'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td>
                                            <?php echo $form['foto']->renderError() ?><br />
                                            <?php echo $form['foto']->renderLabel() ?><br />
                                            <?php echo $form['foto'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $form['primer_apellido']->renderError() ?><br />
                                            <?php echo $form['primer_apellido']->renderLabel() ?><br />
                                            <?php echo $form['primer_apellido'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td>
                                            <?php echo $form['segundo_apellido']->renderError() ?><br />
                                            <?php echo $form['segundo_apellido']->renderLabel() ?><br />
                                            <?php echo $form['segundo_apellido'] ?>
                                        </td>
                                        <td>
                                            <?php echo $form['primer_nombre']->renderError() ?><br />
                                            <?php echo $form['primer_nombre']->renderLabel() ?><br />
                                            <?php echo $form['primer_nombre'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td>
                                            <?php echo $form['segundo_nombre']->renderError() ?><br />
                                            <?php echo $form['segundo_nombre']->renderLabel() ?><br />
                                            <?php echo $form['segundo_nombre'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $form['fecha_nacimiento']->renderError() ?><br />
                                            <?php echo $form['fecha_nacimiento']->renderLabel() ?><br />
                                            <?php echo $form['fecha_nacimiento'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td>
                                            <?php echo $form['sexo']->renderError() ?><br />
                                            <?php echo $form['sexo']->renderLabel() ?><br />
                                            <?php echo $form['sexo'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td>
                                            <?php echo $form['grupo_sanguineo']->renderError() ?><br />
                                            <?php echo $form['grupo_sanguineo']->renderLabel() ?><br />
                                            <?php echo $form['grupo_sanguineo'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab-2">
                            <table class="srcmt-dimension-forma" border="0" cellpadding="0"  >
                                <tbody>
                                    <tr>
                                        <td colspan="4">

                                            <span class="obligatorio">&nbsp;Los Campos Con <strong>(*)</strong> Son Obligatorios</span>

                                        </td>
                                    </tr>
                                    <tr >
                                        <td>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#srcmt_milicianos_codigo_estado").bind("change", this, function (event){
                                                        var c_estado=this;
                                                        var select_municipio = document.getElementById("srcmt_milicianos_codigo_municipio");
                                                        select_municipio.options.length = 0;
                                                        select_municipio.options[select_municipio.options.length]=new Option('Seleccione un Municipio', '');
                                                        jQuery.ajax({
                                                            url: "<?php echo url_for('FuncionesComunes/ObtenerMunicipio') ?>",
                                                            data: {
                                                                codigo_estado: c_estado.value

                                                            },
                                                            dataType: "json",
                                                            type: "POST",
                                                            success: function(data, textStatus, jqXHR){

                                                                $.map(data, function(item){
                                                                    select_municipio.options[select_municipio.options.length]=new Option(item.municipio, item.codigo_municipio);
                                                                })
                                                            }
                                                        })
                                                    })
                                                });
                                            </script>
                                            <?php echo $form['codigo_estado']->renderError() ?><br />
                                            <?php echo $form['codigo_estado']->renderLabel() ?><br />
                                            <?php echo $form['codigo_estado']->render() ?>
                                        </td>

                                        <td>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#srcmt_milicianos_codigo_municipio").bind("change", this, function (event){
                                                        var c_estado=document.getElementById("srcmt_milicianos_codigo_estado");
                                                        var c_municipio = document.getElementById("srcmt_milicianos_codigo_municipio");

                                                        var select_parroquia = document.getElementById("srcmt_milicianos_codigo_parroquia");
                                                        var select_ciudad = document.getElementById("srcmt_milicianos_codigo_ciudad");

                                                        select_parroquia.options.length = 0;
                                                        select_parroquia.options[select_parroquia.options.length]=new Option('Seleccione una Parroquia', '');

                                                        select_ciudad.options.length = 0;
                                                        select_ciudad.options[select_ciudad.options.length]=new Option('Seleccione una Ciudad', '');

                                                        jQuery.ajax({
                                                            url: "<?php echo url_for('FuncionesComunes/ObtenerParroquia') ?>",
                                                            data: {
                                                                codigo_estado: c_estado.value,
                                                                codigo_municipio: c_municipio.value

                                                            },
                                                            dataType: "json",
                                                            type: "POST",
                                                            success: function(data, textStatus, jqXHR){

                                                                $.map(data, function(item){
                                                                    select_parroquia.options[select_parroquia.options.length] = new Option(item.parroquia, item.codigo_parroquia);
                                                                })
                                                            }
                                                        })///final de ajax
                                                                                                                jQuery.ajax({
                                                            url: "<?php echo url_for('FuncionesComunes/ObtenerCiudad') ?>",
                                                            data: {
                                                                codigo_estado: c_estado.value,
                                                                codigo_municipio: c_municipio.value

                                                            },
                                                            dataType: "json",
                                                            type: "POST",
                                                            success: function(data, textStatus, jqXHR){

                                                                $.map(data, function(item){
                                                                    select_ciudad.options[select_ciudad.options.length] = new Option(item.ciudad, item.codigo_ciudad);
                                                                })
                                                            }
                                                        })///final de ajax
                                                    })///final de bind
                                                });
                                            </script>
                                            <?php echo $form['codigo_municipio']->renderError() ?><br />
                                            <?php echo $form['codigo_municipio']->renderLabel() ?><br />
                                            <?php echo $form['codigo_municipio']->render() ?>
                                        </td>

                                        <td>
                                            <?php echo $form['codigo_parroquia']->renderError() ?><br />
                                            <?php echo $form['codigo_parroquia']->renderLabel() ?><br />
                                            <?php echo $form['codigo_parroquia'] ?>
                                        </td>

                                        <td>
                                            <?php echo $form['codigo_ciudad']->renderError() ?><br />
                                            <?php echo $form['codigo_ciudad']->renderLabel() ?><br />
                                            <?php echo $form['codigo_ciudad'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $form['direccion']->renderError() ?><br />
                                            <?php echo $form['direccion']->renderLabel() ?><br />
                                            <?php echo $form['direccion']->render(array('cols' => 21, 'rows' => 3)) ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td>
                                            <?php echo $form['telefono_local']->renderError() ?><br />
                                            <?php echo $form['telefono_local']->renderLabel() ?><br />
                                            <?php echo $form['telefono_local'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td>
                                            <?php echo $form['movil']->renderError() ?><br />
                                            <?php echo $form['movil']->renderLabel() ?><br />
                                            <?php echo $form['movil'] ?>
                                        </td>

                                        <td>
                                            <?php echo $form['correo_electronico']->renderError() ?><br />
                                            <?php echo $form['correo_electronico']->renderLabel() ?><br />
                                            <?php echo $form['correo_electronico'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $form['direccion_emergencia']->renderError() ?><br />
                                            <?php echo $form['direccion_emergencia']->renderLabel() ?><br />
                                            <?php echo $form['direccion_emergencia']->render(array('cols' => 21, 'rows' => 3)) ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td>
                                            <?php echo $form['telefono_emergencia']->renderError() ?><br />
                                            <?php echo $form['telefono_emergencia']->renderLabel() ?><br />
                                            <?php echo $form['telefono_emergencia'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab-3">
                            <table class="srcmt-dimension-forma" border="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td colspan="4">

                                            <span class="obligatorio">&nbsp;Los Campos Con <strong>(*)</strong> Son Obligatorios</span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $form['grado_instruccion']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['grado_instruccion']->renderLabel() ?><br />
                                            <?php echo $form['grado_instruccion'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['especialidad']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['especialidad']->renderLabel() ?><br />
                                            <?php echo $form['especialidad']->render(array('cols' => 21, 'rows' => 3)) ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['idiomas']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['idiomas']->renderLabel() ?><br />
                                            <?php echo $form['idiomas'] ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['nivel_dominio_idioma']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['nivel_dominio_idioma']->renderLabel() ?><br />
                                            <?php echo $form['nivel_dominio_idioma'] ?>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                            <table class="srcmt-dimension-forma"   border="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $form['programa_formacion_grado']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['programa_formacion_grado']->renderLabel() ?><br/>
                                            <?php echo $form['programa_formacion_grado'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="4">
                                            <?php echo $form['trayecto']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['trayecto']->renderLabel() ?><br />
                                            <?php echo $form['trayecto'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['tramo']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['tramo']->renderLabel() ?><br />
                                            <?php echo $form['tramo'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['sedes']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['sedes']->renderLabel() ?><br />
                                            <?php echo $form['sedes'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['aldea']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['aldea']->renderLabel() ?><br />
                                            <?php echo $form['aldea']->render(array('cols' => 21, 'rows' => 3)) ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab-4">
                            <table class="srcmt-dimension-forma" border="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td colspan="4">

                                            <span class="obligatorio">&nbsp;Los Campos Con <strong>(*)</strong> Son Obligatorios</span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $form['practica_deporte']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['practica_deporte']->renderLabel() ?><br />
                                            <?php echo $form['practica_deporte'] ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['deporte']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['deporte']->renderLabel() ?><br />
                                            <?php echo $form['deporte'] ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['participa_actividad_cultural']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['participa_actividad_cultural']->renderLabel() ?><br />
                                            <?php echo $form['participa_actividad_cultural'] ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['actividad_cultural']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['actividad_cultural']->renderLabel() ?><br />
                                            <?php echo $form['actividad_cultural'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $form['agrupacion_social']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['agrupacion_social']->renderLabel() ?><br />
                                            <?php echo $form['agrupacion_social']->render(array('cols' => 21, 'rows' => 3)) ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['misiones']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['misiones']->renderLabel() ?><br />
                                            <?php echo $form['misiones']->render(array('cols' => 21, 'rows' => 3)) ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab-5">
                            <table class="srcmt-dimension-forma" border="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td colspan="4">

                                            <span class="obligatorio">&nbsp;Los Campos Con <strong>(*)</strong> Son Obligatorios</span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $form['posee_vehiculo']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['posee_vehiculo']->renderLabel() ?><br />
                                            <?php echo $form['posee_vehiculo'] ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['tipo_vehiculo']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['tipo_vehiculo']->renderLabel() ?><br />
                                            <?php echo $form['tipo_vehiculo'] ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['modelo_vehiculo']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['modelo_vehiculo']->renderLabel() ?><br />
                                            <?php echo $form['modelo_vehiculo'] ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['numero_placa']->renderError() ?>&nbsp;
                                            <?php echo $form['numero_placa']->renderLabel() ?><br />
                                            <?php echo $form['numero_placa'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $form['posee_licencia']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['posee_licencia']->renderLabel() ?><br />
                                            <?php echo $form['posee_licencia'] ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['grado_licencia']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['grado_licencia']->renderLabel() ?><br />
                                            <?php echo $form['grado_licencia'] ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['porte_armas']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['porte_armas']->renderLabel() ?><br />
                                            <?php echo $form['porte_armas'] ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['numero_porte_armas']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['numero_porte_armas']->renderLabel() ?><br />
                                            <?php echo $form['numero_porte_armas'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $form['tipo_armamento']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['tipo_armamento']->renderLabel() ?><br />
                                            <?php echo $form['tipo_armamento'] ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['calibre_armamento']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['calibre_armamento']->renderLabel() ?><br />
                                            <?php echo $form['calibre_armamento'] ?>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab-6">
                            <table class="srcmt-dimension-forma" border="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td colspan="4">

                                            <span class="obligatorio">&nbsp;Los Campos Con <strong>(*)</strong> Son Obligatorios</span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $form['signos_particulares']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['signos_particulares']->renderLabel() ?><br />
                                            <?php echo $form['signos_particulares']->render(array('cols' => 21, 'rows' => 3)) ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['talla_uniforme']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['talla_uniforme']->renderLabel() ?><br />
                                            <?php echo $form['talla_uniforme'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['talla_calzado']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['talla_calzado']->renderLabel() ?><br />
                                            <?php echo $form['talla_calzado'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['estatura']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['estatura']->renderLabel() ?><br />
                                            <?php echo $form['estatura'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $form['peso']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['peso']->renderLabel() ?><br />
                                            <?php echo $form['peso'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['color_cabello']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['color_cabello']->renderLabel() ?><br />
                                            <?php echo $form['color_cabello'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['color_piel']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['color_piel']->renderLabel() ?><br />
                                            <?php echo $form['color_piel'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $form['discapacidad']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['discapacidad']->renderLabel() ?><br />
                                            <?php echo $form['discapacidad']->render(array('cols' => 21, 'rows' => 3)) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $form['alergias']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['alergias']->renderLabel() ?><br />
                                            <?php echo $form['alergias']->render(array('cols' => 21, 'rows' => 3)) ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['dominio_mano']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['dominio_mano']->renderLabel() ?><br />
                                            <?php echo $form['dominio_mano'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab-7">
                            <table class="srcmt-dimension-forma" border="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td colspan="4">

                                            <span class="obligatorio">&nbsp;Los Campos Con <strong>(*)</strong> Son Obligatorios</span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $form['profesion']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['profesion']->renderLabel() ?><br />
                                            <?php echo $form['profesion'] ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['oficio']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['oficio']->renderLabel() ?><br />
                                            <?php echo $form['oficio'] ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['trabaja_si_no']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['trabaja_si_no']->renderLabel() ?><br />
                                            <?php echo $form['trabaja_si_no'] ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['nombre_empresa']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['nombre_empresa']->renderLabel() ?><br />
                                            <?php echo $form['nombre_empresa'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $form['direccion_oficina']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['direccion_oficina']->renderLabel() ?><br />
                                            <?php echo $form['direccion_oficina']->render(array('cols' => 21, 'rows' => 3)) ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['telefono_oficina']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['telefono_oficina']->renderLabel() ?><br />
                                            <?php echo $form['telefono_oficina'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab-8">
                            <table class="srcmt-dimension-forma" border="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td colspan="4">

                                            <span class="obligatorio">&nbsp;Los Campos Con <strong>(*)</strong> Son Obligatorios</span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $form['apellidos_beneficiario']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['apellidos_beneficiario']->renderLabel() ?><br />
                                            <?php echo $form['apellidos_beneficiario'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['nombres_beneficiario']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['nombres_beneficiario']->renderLabel() ?><br />
                                            <?php echo $form['nombres_beneficiario'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['cedula_beneficiario']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['cedula_beneficiario']->renderLabel() ?><br />
                                            <?php echo $form['cedula_beneficiario'] ?>

                                        </td>

                                        <td colspan="2">
                                            <?php echo $form['telefono_beneficiario']->renderError() ?>&nbsp;<br />
                                            <?php echo $form['telefono_beneficiario']->renderLabel() ?><br />
                                            <?php echo $form['telefono_beneficiario'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab-9">
                            <fieldset>
                                <?php echo $form['actividad_academica_list']->renderError() ?>&nbsp;<br />
                                <?php echo $form['actividad_academica_list']->renderLabel() ?><br />
                                <?php echo $form['actividad_academica_list'] ?>
                            </fieldset>
                        </div>
                        <div id="tab-10">
                            <fieldset>
                                <?php echo $form['actividad_icm_list']->renderError() ?>&nbsp;<br />
                                <?php echo $form['actividad_icm_list']->renderLabel() ?><br />
                                <?php echo $form['actividad_icm_list'] ?>
                            </fieldset>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
