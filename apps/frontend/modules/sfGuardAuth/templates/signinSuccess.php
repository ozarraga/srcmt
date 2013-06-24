<?php use_helper('I18N') ?>
<?php use_javascript('jquery-1.5.1.min.js') ?>
<?php use_javascript('jquery-ui-1.8.13.custom.min.js') ?>
<?php //use_stylesheet('demo_page.css')  ?>
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
        <span >Sistema de Registro y Control de Brigadistas<br /> de Seguridad e Integraci&oacute;n C&iacute;vico Militar</span>
    </div>

    <table border="1" class="ui-widget " style="border-collapse: collapse; width: 99.9%">
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
                <td  style="text-align: center">
                    <p>
                        <?php echo image_tag('dgcm.png') ?>
                        <!--<img  src="/images/dgcm.png" />-->
                    </p>
                    <p>
                        <span width="auto">
                            Escriba su nombre de usuario<br />
                            y contrase&ntilde;a para ingresar al<br />
                            sistema
                        </span>
                    </p>

                </td>
                <td  >
                    <p style="text-align: center;">
                        <?php echo image_tag('user-login.png') ?>
                            <!--<img src="/images/user-login.png" />-->
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
