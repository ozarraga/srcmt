<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>
            <?php if (!include_slot('title')): ?>
                <?php echo 'Sistema de Registo y Control de Brigadistas de Integraci&oacute;n C&iacute;vico-Militar' ?>
            <?php endif ?>
        </title>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php //include_title() ?>
        <!--<link rel="shortcut icon" href="images/Escudo.png" />-->
        <link rel="shortcut icon" href="/images/Escudo.png" />

        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <div id="contenedor" >
            <table  style="width: 1024px; margin: 0 auto;"   border="0" cellpadding="0" cellspacing="0" >
                <thead>
                    <tr>
                        <td>
                            <div id="encabezado">
                                <table  style="width: 100%; height: 55px;"  border="0" cellpadding="0" cellspacing="0" >
                                    <tbody>
                                        <tr>
                                            <td colspan="4" style="width: 714px; height: 50px;" >
                                                <div style="margin-left: 0%">
                                                    <?php echo image_tag('topbandera.png', 'alt="top bandera" style="margin-left: 0%"') ?>
                                                    <!--<img src="/images/topbandera.png" alt="top bandera" style="margin-left: 0%" />-->
                                                </div>

                                            </td>
                                            <td style="width: 86px; height: 50px;">
                                                <div style="margin-right: 100%">
                                                    <?php echo image_tag('esdetodos.png', 'alt="es de todos" style="margin-right: 100%"') ?>
                                                    <!--<img src="/images/esdetodos.png" alt="es de todos" style="margin-right: 100%" />-->
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  colspan="5" style="height: 5px; background-color: #ed1427; "></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" >
                                                <div id="div-ajuste-banner">
                                                    <table id="banner-identificacion" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td id="banner-izquierdo">
                                                                    <?php echo image_tag('Escudo.png', 'id="img-logo-bolivariana" style="width: 150px; heigth: 120px;" alt="cintillo"') ?>
                                                                    <!--<img id="img-logo-bolivariana" style="width: 150px; heigth: 120px;"  class="" src="/images/Escudo.png" alt="cintillo" />-->
                                                                </td>
                                                                <td id="banner-central">
                                                                    <?php echo image_tag('Titulo-Sistema.png','id="img-titulo-sistema" alt="Titulo-Sistema.png"') ?>
                                                                    <!--<img id="img-titulo-sistema" src="/images/Titulo-Sistema.png" alt="Titulo-Sistema.png" />-->
                                                                </td>
                                                                <td id="banner-derecho">
                                                                    <?php echo image_tag('dgcm.png','id="img-logo-dgcm" style="width: 130px; heigth: 120px;" alt="cintillo"') ?>
                                                                    <!--<img id="img-logo-dgcm" style="width: 130px; heigth: 120px;" class=""   src="/images/dgcm.png" alt="cintillo" />-->
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <?php echo image_tag('bannerDGCM2', array('id' => 'img-banner-dgcm', 'alt' => 'bannerDGCM2')) ?>
<!--												<img id="img-banner-dgcm" src="/images/bannerDGCM2.png" />-->
                                                </div>
                                            </td>
                                        </tr>
                                        <?php if ($sf_user->isAuthenticated()): ?>
                                            <tr>
                                                <td colspan="5" style="text-align: center">
                                                    <div id="menu" style="text-align: center">
                                                        <?php echo include_partial('homepage/menu_homepage') ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>
                            <div id="pie">
                            </div>
                        </td>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td class="top-valign" >
                            <div style="padding: 10px"></div>
                            <div id="contenido">
                                <?php echo $sf_content ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
