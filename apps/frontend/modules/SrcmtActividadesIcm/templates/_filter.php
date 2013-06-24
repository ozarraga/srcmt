<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php use_stylesheets_for_form($filterForm) ?>
<?php use_javascripts_for_form($filterForm) ?>
<?php use_javascript('/sfFormExtraPlugin/js/double_list.js') ?>

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
        <li><a href="#tabs-1">Actividades ICM</a></li>
        <li><a href="#tabs-2">Participantes Brigadistas DADO</a></li>
        <li><a href="#tabs-3">Participantes Brigadistas Estudiantiles</a></li>
    </ul>
    <div class="ui-widget ui-widget-content ui-corner-all">
        <form id="<?php echo $filterForm->getName() ?>" name="<?php echo $filterForm->getName() ?>" action="<?php echo url_for('SrcmtActividadesIcm_imprimir_lista') ?>"  target="_blank" method="POST">

            <?php echo $filterForm['_csrf_token'] ?>
            <?php echo $filterForm->renderHiddenFields() ?>
            <?php echo $filterForm->renderglobalerrors() ?>
            <table class="srcmt-dimension-forma">
                <tbody>
                    <tr>
                        <td>
                            <div id="tabs-1">
                                <table class="srcmt-dimension-forma">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php echo $filterForm['codigo_tipo_actividad']->renderError() ?><br />
                                                <?php echo $filterForm['codigo_tipo_actividad']->renderLabel() ?><br />
                                                <?php echo $filterForm['codigo_tipo_actividad'] ?>
                                            </td>
                                            <td>
                                                <?php echo $filterForm['actividad']->renderError() ?><br />
                                                <?php echo $filterForm['actividad']->renderLabel() ?><br />
                                                <?php echo $filterForm['actividad'] ?>

                                            </td>
                                            <td>
                                                <?php echo $filterForm['responsable']->renderError() ?><br />
                                                <?php echo $filterForm['responsable']->renderLabel() ?><br />
                                                <?php echo $filterForm['responsable'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php echo $filterForm['fecha']->renderError() ?><br />
                                                <?php echo $filterForm['fecha']->renderLabel() ?><br />
                                                <?php echo $filterForm['fecha'] ?>

                                            </td>
                                            <td>
                                                <?php echo $filterForm['lugar']->renderError() ?><br />
                                                <?php echo $filterForm['lugar']->renderLabel() ?><br />
                                                <?php echo $filterForm['lugar'] ?>

                                            </td>
                                            <td>
                                                <?php echo $filterForm['duracion']->renderError() ?><br />
                                                <?php echo $filterForm['duracion']->renderLabel() ?><br />
                                                <?php echo $filterForm['duracion'] ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php echo $filterForm['descripcion']->renderError() ?><br />
                                                <?php echo $filterForm['descripcion']->renderLabel() ?><br />
                                                <?php echo $filterForm['descripcion'] ?>
                                            </td>
                                            <td>
                                                <?php echo $filterForm['created_at']->renderError() ?><br />
                                                <?php echo $filterForm['created_at']->renderLabel() ?><br />
                                                <?php echo $filterForm['created_at'] ?>
                                            </td>
                                            <td>
                                                <?php echo $filterForm['updated_at']->renderError() ?><br />
                                                <?php echo $filterForm['updated_at']->renderLabel() ?><br />
                                                <?php echo $filterForm['updated_at'] ?>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                            <div id="tabs-2">
                                <p>
                                    <?php echo $filterForm['brigadistas_dado_list']->renderError() ?><br />
                                    <?php echo $filterForm['brigadistas_dado_list']->renderLabel() ?><br />
                                    <?php echo $filterForm['brigadistas_dado_list'] ?>
                                </p>
                            </div>
                            <div id="tabs-3">
                                <p>
                                    <?php echo $filterForm['milicianos_list']->renderError() ?><br />
                                    <?php echo $filterForm['milicianos_list']->renderLabel() ?><br />
                                    <?php echo $filterForm['milicianos_list'] ?>
                                </p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>