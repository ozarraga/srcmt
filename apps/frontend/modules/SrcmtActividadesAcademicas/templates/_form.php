<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<script>
    $(document).ready(function() {
        $("input:button, input:submit, #botonSuprimir").button();
        
        $(function() {
            $( "#tabs" ).tabs();
        });
    });



</script>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Actividades Acad&eacute;micas</a></li>
        <li><a href="#tabs-2">Participantes Brigadistas DADO</a></li>
        <li><a href="#tabs-3">Participantes Brigadistas Estudiantiles</a></li>
    </ul>
    <div class="ui-widget ui-widget-content ui-corner-all">

        <?php echo form_tag_for($form, '@SrcmtActividadesAcademicas') ?>
        <?php if (!$form->getObject()->isNew()): ?>
            <input type="hidden" name="sf_method" value="put" />
        <?php endif; ?>
        <?php echo $form['_csrf_token'] ?>
        <?php echo $form->renderHiddenFields() ?>
        <?php echo $form->renderglobalerrors() ?>
        <table class="srcmt-dimension-forma" >
            <tfoot>
                <tr>
                    <td colspan="3">
                        <?php echo $form->renderHiddenFields(false) ?>
                        &nbsp;<?php echo button_to('Listado de Actividades Academicas', '@SrcmtActividadesAcademicas') ?>

                        <?php if (!$form->getObject()->isNew()): ?>
                            &nbsp;<?php echo button_to('Imprimir', '@SrcmtActividadesAcademicas_imprimir_brigadistas?codigo_actividad_academica=' . $form->getObject()->getCodigoActividadAcademica()) ?>
                            &nbsp;<?php echo link_to('Suprimir', '@SrcmtActividadesAcademicas_delete?codigo_actividad_academica=' . $form->getObject()->getCodigoActividadAcademica(), array('method' => 'delete','id'=>'botonSuprimir', 'confirm' => 'Hace usted lo correcto?')) ?>
                            &nbsp;<?php echo button_to('Nueva Actividad Academica', '@SrcmtActividadesAcademicas_new') ?>
                        <?php endif; ?>
                        <input type="submit" value="Guardar" />
                    </td>
                </tr>
            </tfoot>   
            <tbody>
                <tr>
                    <td>
                        <div id ="tabs-1">
                            <table class="srcmt-dimension-forma" border="0" cellpadding="0">

                                <tbody>
                                    <tr>
                                        <td colspan="4">

                                            <span class="obligatorio">&nbsp;Los Campos Con <strong>(*)</strong> Son Obligatorios</span>

                                        </td>
                                    </tr>
                                    <?php echo $form->renderGlobalErrors() ?>
                                    <tr>
                                        <td>
                                            <?php echo $form['codigo_tipo_actividad']->renderError() ?><br />
                                            <?php echo $form['codigo_tipo_actividad']->renderLabel() ?><br />
                                            <?php echo $form['codigo_tipo_actividad'] ?>
                                        </td>
                                        <td><?php echo $form['actividad']->renderError() ?><br />
                                            <?php echo $form['actividad']->renderLabel() ?><br />
                                            <?php echo $form['actividad'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td><?php echo $form['responsable']->renderError() ?><br />
                                            <?php echo $form['responsable']->renderLabel() ?><br />
                                            <?php echo $form['responsable'] ?>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><?php echo $form['fecha']->renderError() ?><br />
                                            <?php echo $form['fecha']->renderLabel() ?><br />
                                            <?php echo $form['fecha'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td><?php echo $form['lugar']->renderError() ?><br />
                                            <?php echo $form['lugar']->renderLabel() ?><br />
                                            <?php echo $form['lugar'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                        <td><?php echo $form['duracion']->renderError() ?><br />
                                            <?php echo $form['duracion']->renderLabel() ?><br />
                                            <?php echo $form['duracion'] ?>
                                            <span class="obligatorio">&nbsp;*</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $form['descripcion']->renderError() ?><br />
                                            <?php echo $form['descripcion']->renderLabel() ?><br />
                                            <?php echo $form['descripcion'] ?>
                                        </td>
                                        <td>Fecha de Creaci&oacute;n<br />
                                            <?php echo $form->getObject()->getCreatedAt() ?>
                                        </td>
                                        <td>&Uacute;ltima Actualizaci&oacute;n<br />
                                            <?php echo $form->getObject()->getCreatedAt() ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">




                                        </td>
                                    </tr>

                                </tbody>
                            </table>   
                        </div>
                        <div id="tabs-2">
                            <p><?php echo $form['brigadistas_dado_list']->renderError() ?><br />
                                <?php echo $form['brigadistas_dado_list']->renderLabel() ?><br />
                                <?php echo $form['brigadistas_dado_list'] ?></p>
                        </div>
                        <div id="tabs-3">
                            <p><?php echo $form['milicianos_list']->renderError() ?><br />
                                <?php echo $form['milicianos_list']->renderLabel() ?><br />
                                <?php echo $form['milicianos_list'] ?></p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>



        </form>
    </div>
</div>  