<?php use_stylesheet('imprimir_pdf.css') ?>
<script>
    $(document).ready(function() {
        $("input:button, input:submit").button();
        $("#opcion-barra").buttonset();
        $( "#tabs-brigadistas" ).tabs();
        $('#example, #example2 ').dataTable({
            "sScrollX": "1024",
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "sDom": '<"H"Tfr>t<"F"ip>'


        } );
    });

</script>

<h3 class="ui-widget-header ui-corner-all">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-gear" ></span>&nbsp;&nbsp; Actividad ICM, <?php echo $ActividadICM ?></h3>


<span id="opcion-barra" class="opcion-barra ui-corner-all ">
    <button title="Redirige al Registro de una nueva Actividad de Integraci&oacute;n C&iacute;vico Militar" onclick="document.location.href='<?php echo url_for('SrcmtActividadesIcm_new') ?>'">Nuevo Actividad ICM</button>
    <button title="Editar la Actividad de Integraci&oacute;n C&iacute;vico Militar" onclick="document.location.href='<?php echo url_for('SrcmtActividadesIcm_edit', $ActividadICM) ?>'">Editar</button>
    <button title="Muestra la Lista de Actividades de Integraci&oacute;n C&iacute;vico Militar" onclick="document.location.href='<?php echo url_for('SrcmtActividadesIcm') ?>'">Listar</button>
    <button title="Facilita la Impresi&oacute;n de una Actividad de Integraci&oacute;n C&iacute;vico Militar con Participantes" onclick="NuevoTag('<?php echo url_for('SrcmtActividadesIcm_imprimir_brigadistas', $ActividadICM) ?>')">Imprimir</button>

</span>
<div style="padding: 5px"></div>

<div >
    <div class="data-frame forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <ul class="identity">
                <li class="even">
                    <div class="col1"><strong>Codigo Tipo Actividad</strong><?php echo $ActividadICM->getSrcmtTipoActividad()->getTipoActividad() ?></div>
                    <div class="col2"><strong>Actividad</strong><?php echo $ActividadICM->getActividad() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Responsable</strong></div>
                    <div class="col2"><strong>Fecha</strong><?php echo $ActividadICM->getFecha() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Lugar</strong><?php echo $ActividadICM->getLugar() ?></div>
                    <div class="col2"><strong>Duraci&oacute;n</strong><?php echo $ActividadICM->getDuracion() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Descripci&oacute;n</strong><?php echo $ActividadICM->getDescripcion() ?></div>
                    <div class="col2"><strong>Creado el:</strong><?php echo $ActividadICM->getCreatedAt() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Actualizado el:</strong><?php echo $ActividadICM->getUpdatedAt() ?></div>
                    <div class="col2"><strong></strong></div>
                </li>
            </ul>
        </div>
    </div>

</div>

<!--<br>-->

<!--<br>-->




<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Participantes</h3>
<div id="tabs-brigadistas">
    <ul>
        <li><a href="#tabs-1">Brigadistas Directivos, Administrativos, Docentes y Obreros</a></li>
        <li><a href="#tabs-2">Brigadistas Estudiantiles</a></li>

    </ul>
    <div id="tabs-1">

        <?php include_partial('BrigadistasDado/lista_actividades', array('srcmt_brigadistas_dado' => $srcmt_brigadistas_dado)) ?>
    </div>
    <div id="tabs-2">

        <?php include_partial('milicianos/lista_actividades', array('srcmt_milicianos' => $srcmt_milicianos)) ?>
    </div>

</div>






























