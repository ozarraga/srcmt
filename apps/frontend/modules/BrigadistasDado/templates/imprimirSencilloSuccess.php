<?php use_stylesheet('imprimir_pdf.css') ?>

imprimir sencillo!!!!!!!

<table border="0" cellspacing="2" cellpadding="2" class="ancho-vertical-pdf letra_verdana colapsa-borde-tabla-pdf" >
    <tbody>
        <tr style="background-color: #F4F4F4; ">
            <td><strong class="letra_azul">Estatura:</strong><br /><?php echo $srcmt_brigadistas_dado->getEstatura() ?></td>
            <td><strong class="letra_azul">Color Cabello:</strong><br /><?php echo $srcmt_brigadistas_dado->getColorCabello() ?></td>
            <td><strong class="letra_azul">Peso Kg:</strong><br /><?php echo $srcmt_brigadistas_dado->getPeso() ?></td>
            <td><strong class="letra_azul">Color Piel:</strong><br /><?php echo $srcmt_brigadistas_dado->getColorPiel() ?></td>
        </tr>
        <tr>
            <td><strong class="letra_azul">Talla Pantal&oacute;n:</strong><br /><?php echo $srcmt_brigadistas_dado->getTallaPantalon() ?></td>
            <td><strong class="letra_azul">Talla Camisa:</strong><br /><?php echo $srcmt_brigadistas_dado->getTallaCamisa() ?></td>
            <td><strong class="letra_azul">Talla Calzado:</strong><br /><?php echo $srcmt_brigadistas_dado->getTallaCalzado() ?></td>
            <td><strong class="letra_azul">Talla Gorra:</strong><br /><?php echo $srcmt_brigadistas_dado->getTallaGorra() ?></td>
        </tr>
        <tr style="background-color: #F4F4F4; ">
            <td><strong class="letra_azul">Discapacidad:</strong><br /><?php echo $srcmt_brigadistas_dado->getDominioMano() ?></td>
            <td><strong class="letra_azul">Alergias:</strong><br /><?php echo $srcmt_brigadistas_dado->getAlergias() ?></td>
            <td><strong class="letra_azul">Dominio Mano:</strong><br /><?php echo $srcmt_brigadistas_dado->getDominioMano() ?></td>

            <td></td>
        </tr>
    </tbody>
</table>

<span>&nbsp;</span>
<table border="0" cellspacing="2" cellpadding="2" class="ancho-vertical-pdf letra_verdana colapsa-borde-tabla-pdf" >
    <tbody>
        <tr style="background-color: #F4F4F4; ">
            <td><strong class="letra_azul">Deporte:</strong><br /><?php echo $srcmt_brigadistas_dado->getDeporte() ?></td>
            <td><strong class="letra_azul">Actividades Culturales:</strong><br /><?php echo $srcmt_brigadistas_dado->getActividadesCulturales() ?></td>

        </tr>

    </tbody>
</table>
<span>&nbsp;</span>
<table border="0" cellspacing="2" cellpadding="2" class="ancho-vertical-pdf letra_verdana colapsa-borde-tabla-pdf" >
    <tbody>
        <tr style="background-color: #F4F4F4; ">
            <td><strong class="letra_azul">Apellidos Beneficiario:</strong><br /><?php echo $srcmt_brigadistas_dado->getApellidosBeneficiario() ?></td>
            <td><strong class="letra_azul">Nombres Beneficiario:</strong><br /><?php echo $srcmt_brigadistas_dado->getNombresBeneficiario() ?></td>
            <td><strong class="letra_azul">C&eacute;dula Beneficiario:</strong><br /><?php echo $srcmt_brigadistas_dado->getCedulaBeneficiario() ?></td>
            <td><strong class="letra_azul">Tel&eacute;fono Beneficiario:</strong><br /><?php echo $srcmt_brigadistas_dado->getTelefonoBeneficiario() ?></td>
        </tr>

    </tbody>
</table>

<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Beneficiario</h3>
<div>
    <div class="data-frame forma-fondo ui-corner-all">
        <div class="profile">
            <ul class="identity">
                <li class="even">
                    <div class="col1"></div>
                    <div class="col2"></div>
                </li>
                <li>
                    <div class="col1"></div>
                    <div class="col2"></div>
                </li>
            </ul>
            <div class="photo">
                <?php echo image_tag('beneficiarios.jpg') ?>
                <!--<img alt="" src="/images/beneficiarios.jpg" width="120">-->
            </div>
        </div>
    </div>
</div>












