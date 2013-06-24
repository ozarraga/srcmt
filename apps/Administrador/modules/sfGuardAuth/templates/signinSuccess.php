<?php use_helper('I18N') ?>
<?php use_javascript('jquery-1.5.1.min.js') ?>
<?php use_javascript('jquery-ui-1.8.13.custom.min.js') ?>
<?php //use_stylesheet('demo_page.css') ?>
<?php use_stylesheet('srcmt.css') ?>
<?php use_stylesheet('ubv/jquery-ui-1.8.13.custom.css') ?>
<script type="text/javascript">

    $(document).ready(function() {
        $("input:submit").button();

    });
</script>

<div style="padding: 10px; visibility: hidden">

</div>
<div class="ancho-alineacion">
    <div  style="text-align: center; padding-top: 4px; padding-bottom: 4px;" class="ui-widget ui-widget-header ui-corner-top ">
        <span >Administraci&oacute;n del Sistema</span>
    </div>

    <table border="1" class="ui-widget tabla-conectar" style="border-collapse: collapse; ">
        <thead>

            <tr>
                <td class="conectar ui-state-default" colspan="2">&nbsp;&nbsp;<?php echo __('Signin', null, 'sf_guard') ?></td>
            </tr>
        </thead>
        <tfoot >
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>

        </tfoot>
        <tbody class="ui-widget ui-widget-content">
            <tr>
                <td width="50%" style="text-align: center">
                    <p>
                        <?php echo image_tag('Escudo.png') ?>
                            <!--<img src="/images/Escudo.png" />-->
                    </p>
                    <p>
                        <span >
                            Escriba su nombre de usuario<br />
                            y contrase&ntilde;a para ingresar a la<br />
                            aplicaci&oacute;n de administraci&oacute;n<br />
                            del sistema
                        </span>
                    </p>

                </td>
                <td width="50%" >
                    <p style="text-align: center;">
                        <?php echo image_tag('adminMaster.png') ?>
                            <!--<img src="/images/adminMaster.png" />-->
                    </p>
                    <?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
                </td>
            </tr>

        </tbody>
    </table>
    <div style="text-align: center; padding-top: 4px; padding-bottom: 4px;" class="ui-widget ui-widget-header ui-corner-bottom">
        <span>&nbsp;</span>
    </div>
</div>
