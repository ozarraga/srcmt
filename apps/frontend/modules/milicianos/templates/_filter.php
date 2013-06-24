<?php //use_javascript('dynamicForm.js')     ?>
<?php //use_stylesheets_for_form($filterForm)        ?>
<?php use_javascripts_for_form($filterForm) ?>


<form id="<?php echo $filterForm->getName() ?>" name="<?php echo $filterForm->getName() ?>" action="<?php echo url_for('milicianos_imprimir_lista') ?>" target="_blank" method="POST">


    <?php echo $filterForm['_csrf_token'] ?>
    <?php echo $filterForm->renderHiddenFields() ?>
    <?php echo $filterForm->renderglobalerrors() ?>
    <div id="tabs-milicianos">
        <table>
            <tfoot class="tfoot-tr-td-input">
                <tr>
                    <td colspan="2">
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>

                        <ul>
                            <li><a href="#tab-11">Campos a mostrar</a></li>
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
                                            <?php echo $filterForm['nacionalidad']->renderError() ?><br />
                                            <?php echo $filterForm['nacionalidad']->renderLabel() ?><br />
                                            <?php echo $filterForm['nacionalidad'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td>
                                            <?php echo $filterForm['cedula_identidad']->renderError() ?><br />
                                            <?php echo $filterForm['cedula_identidad']->renderLabel() ?><br />
                                            <?php echo $filterForm['cedula_identidad'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td>
                                            <?php echo $filterForm['estado_civil']->renderError() ?><br />
                                            <?php echo $filterForm['estado_civil']->renderLabel() ?><br />
                                            <?php echo $filterForm['estado_civil'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $filterForm['primer_apellido']->renderError() ?><br />
                                            <?php echo $filterForm['primer_apellido']->renderLabel() ?><br />
                                            <?php echo $filterForm['primer_apellido'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td>
                                            <?php echo $filterForm['segundo_apellido']->renderError() ?><br />
                                            <?php echo $filterForm['segundo_apellido']->renderLabel() ?><br />
                                            <?php echo $filterForm['segundo_apellido'] ?>
                                        </td>
                                        <td>
                                            <?php echo $filterForm['primer_nombre']->renderError() ?><br />
                                            <?php echo $filterForm['primer_nombre']->renderLabel() ?><br />
                                            <?php echo $filterForm['primer_nombre'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td>
                                            <?php echo $filterForm['segundo_nombre']->renderError() ?><br />
                                            <?php echo $filterForm['segundo_nombre']->renderLabel() ?><br />
                                            <?php echo $filterForm['segundo_nombre'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $filterForm['fecha_nacimiento']->renderError() ?><br />
                                            <?php echo $filterForm['fecha_nacimiento']->renderLabel() ?><br />
                                            <?php echo $filterForm['fecha_nacimiento'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td>
                                            <?php echo $filterForm['sexo']->renderError() ?><br />
                                            <?php echo $filterForm['sexo']->renderLabel() ?><br />
                                            <?php echo $filterForm['sexo'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td>
                                            <?php echo $filterForm['grupo_sanguineo']->renderError() ?><br />
                                            <?php echo $filterForm['grupo_sanguineo']->renderLabel() ?><br />
                                            <?php echo $filterForm['grupo_sanguineo'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">

                                            <?php echo $filterForm['created_at']->renderLabel() ?><br />
                                            <?php echo $filterForm['created_at'] ?>
                                        </td>

                                        <td colspan="2">

                                            <?php echo $filterForm['updated_at']->renderLabel() ?><br />
                                            <?php echo $filterForm['updated_at'] ?>
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
                                            <?php echo $filterForm['codigo_estado']->renderError() ?><br />
                                            <?php echo $filterForm['codigo_estado']->renderLabel() ?><br />
                                            <?php echo $filterForm['codigo_estado']->render() ?>
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
                                                            url: "<?php //echo url_for('FuncionesComunes/ObtenerParroquia')  ?>",
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
                                                            url: "<?php //echo url_for('FuncionesComunes/ObtenerCiudad')  ?>",
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
                                        <td>
                                            <?php echo $filterForm['direccion']->renderError() ?><br />
                                            <?php echo $filterForm['direccion']->renderLabel() ?><br />
                                            <?php echo $filterForm['direccion']->render(array('cols' => 21, 'rows' => 3)) ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td>
                                            <?php echo $filterForm['telefono_local']->renderError() ?><br />
                                            <?php echo $filterForm['telefono_local']->renderLabel() ?><br />
                                            <?php echo $filterForm['telefono_local'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td>
                                            <?php echo $filterForm['movil']->renderError() ?><br />
                                            <?php echo $filterForm['movil']->renderLabel() ?><br />
                                            <?php echo $filterForm['movil'] ?>
                                        </td>

                                        <td>
                                            <?php echo $filterForm['correo_electronico']->renderError() ?><br />
                                            <?php echo $filterForm['correo_electronico']->renderLabel() ?><br />
                                            <?php echo $filterForm['correo_electronico'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $filterForm['direccion_emergencia']->renderError() ?><br />
                                            <?php echo $filterForm['direccion_emergencia']->renderLabel() ?><br />
                                            <?php echo $filterForm['direccion_emergencia']->render(array('cols' => 21, 'rows' => 3)) ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td>
                                            <?php echo $filterForm['telefono_emergencia']->renderError() ?><br />
                                            <?php echo $filterForm['telefono_emergencia']->renderLabel() ?><br />
                                            <?php echo $filterForm['telefono_emergencia'] ?>
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
                                            <?php echo $filterForm['grado_instruccion']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['grado_instruccion']->renderLabel() ?><br />
                                            <?php echo $filterForm['grado_instruccion'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['especialidad']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['especialidad']->renderLabel() ?><br />
                                            <?php echo $filterForm['especialidad']->render(array('cols' => 21, 'rows' => 3)) ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['idiomas']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['idiomas']->renderLabel() ?><br />
                                            <?php echo $filterForm['idiomas'] ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['nivel_dominio_idioma']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['nivel_dominio_idioma']->renderLabel() ?><br />
                                            <?php echo $filterForm['nivel_dominio_idioma'] ?>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                            <table class="srcmt-dimension-forma"   border="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $filterForm['programa_formacion_grado']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['programa_formacion_grado']->renderLabel() ?><br/>
                                            <?php echo $filterForm['programa_formacion_grado'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="4">
                                            <?php echo $filterForm['trayecto']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['trayecto']->renderLabel() ?><br />
                                            <?php echo $filterForm['trayecto'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['tramo']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['tramo']->renderLabel() ?><br />
                                            <?php echo $filterForm['tramo'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['sedes']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['sedes']->renderLabel() ?><br />
                                            <?php echo $filterForm['sedes'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['aldea']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['aldea']->renderLabel() ?><br />
                                            <?php echo $filterForm['aldea']->render(array('cols' => 21, 'rows' => 3)) ?>
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
                                            <?php echo $filterForm['practica_deporte']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['practica_deporte']->renderLabel() ?><br />
                                            <?php echo $filterForm['practica_deporte'] ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['deporte']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['deporte']->renderLabel() ?><br />
                                            <?php echo $filterForm['deporte'] ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['participa_actividad_cultural']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['participa_actividad_cultural']->renderLabel() ?><br />
                                            <?php echo $filterForm['participa_actividad_cultural'] ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['actividad_cultural']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['actividad_cultural']->renderLabel() ?><br />
                                            <?php echo $filterForm['actividad_cultural'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $filterForm['agrupacion_social']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['agrupacion_social']->renderLabel() ?><br />
                                            <?php echo $filterForm['agrupacion_social']->render(array('cols' => 21, 'rows' => 3)) ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['misiones']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['misiones']->renderLabel() ?><br />
                                            <?php echo $filterForm['misiones']->render(array('cols' => 21, 'rows' => 3)) ?>
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
                                            <?php echo $filterForm['posee_vehiculo']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['posee_vehiculo']->renderLabel() ?><br />
                                            <?php echo $filterForm['posee_vehiculo'] ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['tipo_vehiculo']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['tipo_vehiculo']->renderLabel() ?><br />
                                            <?php echo $filterForm['tipo_vehiculo'] ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['modelo_vehiculo']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['modelo_vehiculo']->renderLabel() ?><br />
                                            <?php echo $filterForm['modelo_vehiculo'] ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['numero_placa']->renderError() ?>&nbsp;
                                            <?php echo $filterForm['numero_placa']->renderLabel() ?><br />
                                            <?php echo $filterForm['numero_placa'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $filterForm['posee_licencia']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['posee_licencia']->renderLabel() ?><br />
                                            <?php echo $filterForm['posee_licencia'] ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['grado_licencia']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['grado_licencia']->renderLabel() ?><br />
                                            <?php echo $filterForm['grado_licencia'] ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['porte_armas']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['porte_armas']->renderLabel() ?><br />
                                            <?php echo $filterForm['porte_armas'] ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['numero_porte_armas']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['numero_porte_armas']->renderLabel() ?><br />
                                            <?php echo $filterForm['numero_porte_armas'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $filterForm['tipo_armamento']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['tipo_armamento']->renderLabel() ?><br />
                                            <?php echo $filterForm['tipo_armamento'] ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['calibre_armamento']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['calibre_armamento']->renderLabel() ?><br />
                                            <?php echo $filterForm['calibre_armamento'] ?>
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
                                            <?php echo $filterForm['signos_particulares']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['signos_particulares']->renderLabel() ?><br />
                                            <?php echo $filterForm['signos_particulares']->render(array('cols' => 21, 'rows' => 3)) ?>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['talla_uniforme']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['talla_uniforme']->renderLabel() ?><br />
                                            <?php echo $filterForm['talla_uniforme'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['talla_calzado']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['talla_calzado']->renderLabel() ?><br />
                                            <?php echo $filterForm['talla_calzado'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['estatura']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['estatura']->renderLabel() ?><br />
                                            <?php echo $filterForm['estatura'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $filterForm['peso']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['peso']->renderLabel() ?><br />
                                            <?php echo $filterForm['peso'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['color_cabello']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['color_cabello']->renderLabel() ?><br />
                                            <?php echo $filterForm['color_cabello'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['color_piel']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['color_piel']->renderLabel() ?><br />
                                            <?php echo $filterForm['color_piel'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td colspan="2">
                                            <?php echo $filterForm['discapacidad']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['discapacidad']->renderLabel() ?><br />
                                            <?php echo $filterForm['discapacidad']->render(array('cols' => 21, 'rows' => 3)) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $filterForm['alergias']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['alergias']->renderLabel() ?><br />
                                            <?php echo $filterForm['alergias']->render(array('cols' => 21, 'rows' => 3)) ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['dominio_mano']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['dominio_mano']->renderLabel() ?><br />
                                            <?php echo $filterForm['dominio_mano'] ?>
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
                                            <?php echo $filterForm['profesion']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['profesion']->renderLabel() ?><br />
                                            <?php echo $filterForm['profesion'] ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['oficio']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['oficio']->renderLabel() ?><br />
                                            <?php echo $filterForm['oficio'] ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['trabaja_si_no']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['trabaja_si_no']->renderLabel() ?><br />
                                            <?php echo $filterForm['trabaja_si_no'] ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['nombre_empresa']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['nombre_empresa']->renderLabel() ?><br />
                                            <?php echo $filterForm['nombre_empresa'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $filterForm['direccion_oficina']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['direccion_oficina']->renderLabel() ?><br />
                                            <?php echo $filterForm['direccion_oficina']->render(array('cols' => 21, 'rows' => 3)) ?>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['telefono_oficina']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['telefono_oficina']->renderLabel() ?><br />
                                            <?php echo $filterForm['telefono_oficina'] ?>
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
                                            <?php echo $filterForm['apellidos_beneficiario']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['apellidos_beneficiario']->renderLabel() ?><br />
                                            <?php echo $filterForm['apellidos_beneficiario'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['nombres_beneficiario']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['nombres_beneficiario']->renderLabel() ?><br />
                                            <?php echo $filterForm['nombres_beneficiario'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['cedula_beneficiario']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['cedula_beneficiario']->renderLabel() ?><br />
                                            <?php echo $filterForm['cedula_beneficiario'] ?>

                                        </td>

                                        <td colspan="2">
                                            <?php echo $filterForm['telefono_beneficiario']->renderError() ?>&nbsp;<br />
                                            <?php echo $filterForm['telefono_beneficiario']->renderLabel() ?><br />
                                            <?php echo $filterForm['telefono_beneficiario'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="tab-9">
                            <fieldset>
                                <?php echo $filterForm['actividad_academica_list']->renderError() ?>&nbsp;<br />
                                <?php echo $filterForm['actividad_academica_list']->renderLabel() ?><br />
                                <?php echo $filterForm['actividad_academica_list'] ?>
                            </fieldset>
                        </div>
                        <div id="tab-10">
                            <fieldset>
                                <?php echo $filterForm['actividad_icm_list']->renderError() ?>&nbsp;<br />
                                <?php echo $filterForm['actividad_icm_list']->renderLabel() ?><br />
                                <?php echo $filterForm['actividad_icm_list'] ?>
                            </fieldset>
                        </div>

                        <div id="tab-11">
                            <?php include_partial('brigest_filter_checkboxes', array('filterForm' => $filterForm)) ?>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
