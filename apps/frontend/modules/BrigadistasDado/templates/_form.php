<?php use_javascript('dynamicForm.js') ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<script>
    $(document).ready(function() {
        $( "#tabs-brigadistas-dado" ).tabs();
        $("input:button, input:submit, #botonSuprimir").button();
    });

</script>
<?php echo form_tag_for($form, '@BrigadistasDado') ?>
<?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<?php echo $form['_csrf_token'] ?>
<?php echo $form->renderHiddenFields() ?>
<?php echo $form->renderglobalerrors() ?>
<div id="tabs-brigadistas-dado" class="">

    <table class="srcmt-dimension-forma">
        <tfoot class="tfoot-tr-td-input">
            <tr>
                <td colspan="3">
                    &nbsp;<?php echo button_to('Listado de Brigadistas DADO', '@BrigadistasDado') ?>
                    <?php if (!$form->getObject()->isNew()): ?>

                        &nbsp;<?php echo button_to('Imprimir', '@BrigadistasDado_imprimir_sencillo?codigo_brigadista=' . $form->getObject()->getCodigoBrigadista()) ?>
                        &nbsp;<?php echo link_to('Suprimir', '@BrigadistasDado_delete?codigo_brigadista=' . $form->getObject()->getCodigoBrigadista(), array('id'=>'botonSuprimir','method' => 'delete', 'confirm' => 'Hace usted lo correcto?')) ?>
                        &nbsp;<?php echo button_to('Nuevo Brigadistas DADO', '@BrigadistasDado_new') ?>
                    <?php endif; ?>
                    <input type="submit" value="Guardar registro" />
                </td>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>

                    <ul class="srcmt-centra-ul-tab">
                        <li><a href="#tab-1">Datos Personales</a></li>
                        <li><a href="#tab-2">Ubicaci&oacute;n</a></li>
                        <li><a href="#tab-3">Aspectos Profesionales</a></li>
                        <li><a href="#tab-4">Se&ntilde;ales Fision&oacute;micas</a></li>
                        <li><a href="#tab-5">Inserci&oacute;n Social</a></li>
                        <li><a href="#tab-6">Beneficiario</a></li>
                        <li><a href="#tab-7">Asignar Actividades Academicas</a></li>
                        <li><a href="#tab-8">Asignar Actividades ICM</a></li>
                    </ul>

                    <div  id="tab-1">
                        <table  class="srcmt-dimension-forma" border="0"  cellpadding="0">
                            <tbody>
                                <tr>
                                    <td colspan="4">

                                        <span class="obligatorio">&nbsp;Los Campos Con <strong>(*)</strong> Son Obligatorios</span>

                                    </td>
                                </tr>
                                <tr>
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
                                        <?php echo $form['estado_civil']->render(array('text' => $form['estado_civil']->getValue(), 'value' => $form['estado_civil']->getValue())) ?>
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
                                        <?php echo $form['lugar_de_nacimiento']->renderError() ?><br />
                                        <?php echo $form['lugar_de_nacimiento']->renderLabel() ?><br />
                                        <?php echo $form['lugar_de_nacimiento'] ?>
                                    </td>

                                    <td>
                                        <?php echo $form['religion']->renderError() ?><br />
                                        <?php echo $form['religion']->renderLabel() ?><br />
                                        <?php echo $form['religion'] ?>
                                    </td>


                                    <td>
                                        <?php echo $form['sexo']->renderError() ?><br />
                                        <?php echo $form['sexo']->renderLabel() ?><br />
                                        <?php echo $form['sexo'] ?>
                                        <span class="obligatorio">&nbsp;*</span>
                                    </td>
                                </tr>
                                <tr>
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
                                                    $("#srcmt_brigadistas_dado_codigo_estado").bind("change", this, function (event){
                                                        var c_estado=this;
                                                        var select_municipio = document.getElementById("srcmt_brigadistas_dado_codigo_municipio");


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
                                        <?php echo $form['codigo_estado']->render(array('onchange' => 'eligeDPT("' . url_for('FuncionesComunes/obtenMunicipio', true) . '", this.options[this.selectedIndex].value ,\'srcmt_brigadistas_dado_codigo_municipio\')')) ?>
                                    </td>

                                    <td>
                                        <script>
                                                $(document).ready(function() {
                                                    $("#srcmt_brigadistas_dado_codigo_municipio").bind("change", this, function (event){
                                                        var c_estado=document.getElementById("srcmt_brigadistas_dado_codigo_estado");
                                                        var c_municipio = document.getElementById("srcmt_brigadistas_dado_codigo_municipio");

                                                        var select_parroquia = document.getElementById("srcmt_brigadistas_dado_codigo_parroquia");
                                                        var select_ciudad = document.getElementById("srcmt_brigadistas_dado_codigo_ciudad");

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
                                        <?php echo $form['codigo_municipio']->render(array('onchange' => 'getParroquiaYciudad("' . url_for('FuncionesComunes/obtenParroquia', true) . '","' . url_for('FuncionesComunes/obtenCiudad', true) . '", this.options[this.selectedIndex].value ,\'srcmt_brigadistas_dado_codigo_parroquia\',\'srcmt_brigadistas_dado_codigo_ciudad\',\'srcmt_brigadistas_dado_codigo_estado\')')) ?>
                                    </td>

                                    <td>
                                        <?php echo $form['codigo_parroquia']->renderError() ?><br />
                                        <?php echo $form['codigo_parroquia']->renderLabel() ?><br />
                                        <?php echo $form['codigo_parroquia']->render() ?>
                                    </td>

                                    <td>
                                        <?php echo $form['codigo_ciudad']->renderError() ?><br />
                                        <?php echo $form['codigo_ciudad']->renderLabel() ?><br />
                                        <?php echo $form['codigo_ciudad'] ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <?php echo $form['direccion_domiciliaria']->renderError() ?><br />
                                        <?php echo $form['direccion_domiciliaria']->renderLabel() ?><br />
                                        <?php echo $form['direccion_domiciliaria']->render(array('cols' => 21, 'rows' => 3)) ?>
                                        <span class="obligatorio">&nbsp;*</span>
                                    </td>

                                    <td>
                                        <?php echo $form['telefono_domicilio']->renderError() ?><br />
                                        <?php echo $form['telefono_domicilio']->renderLabel() ?><br />
                                        <?php echo $form['telefono_domicilio'] ?>
                                        <span class="obligatorio">&nbsp;*</span>
                                    </td>

                                    <td>
                                        <?php echo $form['telefono_movil']->renderError() ?><br />
                                        <?php echo $form['telefono_movil']->renderLabel() ?><br />
                                        <?php echo $form['telefono_movil'] ?>
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
                                        <?php echo $form['unidad_adscripcion_laboral']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['unidad_adscripcion_laboral']->renderLabel() ?><br />
                                        <?php echo $form['unidad_adscripcion_laboral'] ?>
                                    </td>

                                    <td colspan="2">
                                        <?php echo $form['extension_interna']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['extension_interna']->renderLabel() ?><br />
                                        <?php echo $form['extension_interna']->render(array('cols' => 21, 'rows' => 3)) ?>
                                    </td>


                                    <td colspan="2">
                                        <?php echo $form['perfil_empleado']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['perfil_empleado']->renderLabel() ?><br />
                                        <?php echo $form['perfil_empleado'] ?>
                                        <span class="obligatorio">&nbsp;*</span>
                                    </td>

                                    <td colspan="2">
                                        <?php echo $form['jefe_sector']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['jefe_sector']->renderLabel() ?><br />
                                        <?php echo $form['jefe_sector'] ?>
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
                                        <?php echo $form['sedes']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['sedes']->renderLabel() ?><br />
                                        <?php echo $form['sedes'] ?>
                                        <span class="obligatorio">&nbsp;*</span>
                                    </td>

                                    <td colspan="2">
                                        <?php echo $form['jerarquia']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['jerarquia']->renderLabel() ?><br />
                                        <?php echo $form['jerarquia'] ?>
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
                                        <?php echo $form['centro_votacion_cne']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['centro_votacion_cne']->renderLabel() ?><br />
                                        <?php echo $form['centro_votacion_cne'] ?>
                                    </td>

                                    <td colspan="2">
                                        <?php echo $form['direccion_oficina']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['direccion_oficina']->renderLabel() ?><br />
                                        <?php echo $form['direccion_oficina'] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="tab-4">
                        <table class="srcmt-dimension-forma"   border="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td colspan="4">

                                        <span class="obligatorio">&nbsp;Los Campos Con <strong>(*)</strong> Son Obligatorios</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php echo $form['estatura']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['estatura']->renderLabel() ?><br />
                                        <?php echo $form['estatura']->render(array('cols' => 21, 'rows' => 3)) ?>
                                    </td>

                                    <td colspan="2">
                                        <?php echo $form['peso']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['peso']->renderLabel() ?><br />
                                        <?php echo $form['peso']->render(array('cols' => 21, 'rows' => 3)) ?>
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
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php echo $form['talla_pantalon']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['talla_pantalon']->renderLabel() ?><br/>
                                        <?php echo $form['talla_pantalon'] ?>
                                    </td>
                                    <td colspan="2">
                                        <?php echo $form['talla_camisa']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['talla_camisa']->renderLabel() ?><br />
                                        <?php echo $form['talla_camisa'] ?>
                                    </td>

                                    <td colspan="2">
                                        <?php echo $form['talla_calzado']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['talla_calzado']->renderLabel() ?><br />
                                        <?php echo $form['talla_calzado'] ?>
                                    </td>

                                    <td colspan="2">
                                        <?php echo $form['talla_gorra']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['talla_gorra']->renderLabel() ?><br />
                                        <?php echo $form['talla_gorra'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php echo $form['discapacidad']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['discapacidad']->renderLabel() ?><br />
                                        <?php echo $form['discapacidad']->render(array('cols' => 21, 'rows' => 3)) ?>
                                    </td>
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
                    <div id="tab-5">
                        <table class="srcmt-dimension-forma" border="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td colspan="4">

                                        <span class="obligatorio">&nbsp;Los Campos Con <strong>(*)</strong> Son Obligatorios</span>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <?php echo $form['deporte']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['deporte']->renderLabel() ?><br />
                                        <?php echo $form['deporte'] ?>
                                    </td>

                                    <td colspan="4">
                                        <?php echo $form['actividades_culturales']->renderError() ?>&nbsp;<br />
                                        <?php echo $form['actividades_culturales']->renderLabel() ?><br />
                                        <?php echo $form['actividades_culturales'] ?>
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
                    <div id="tab-7">
                            <fieldset>
                                <?php echo $form['actividad_academica_list']->renderError() ?>&nbsp;<br />
                                <?php echo $form['actividad_academica_list']->renderLabel() ?><br />
                                <?php echo $form['actividad_academica_list'] ?>
                            </fieldset>
                        </div>
                        <div id="tab-8">
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









