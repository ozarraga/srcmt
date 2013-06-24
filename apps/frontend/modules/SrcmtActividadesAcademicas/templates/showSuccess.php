<?php //use_stylesheet('all.css')                 ?>

<script>
    $(document).ready(function() {
        $("input:button, input:submit").button();
        $("#opcion-barra").buttonset()
        $( "#tabs-brigadistas" ).tabs();
        $('#example, #example2 ').dataTable({
            "sScrollX": "1024",
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "sDom": '<"H"Tfr>t<"F"ip>'


        } );
    });

</script>


<h3 class="ui-widget-header ui-corner-all">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-gear" ></span>&nbsp;&nbsp; Actividad Acad&eacute;mica, <?php echo $ActividadAcademica ?></h3>

<span id="opcion-barra" class="opcion-barra ui-corner-all ">
    <button id="" title="Redirige al registro de una Nueva Actividad Acad&eacute;mica" onclick="document.location.href='<?php echo url_for('SrcmtActividadesAcademicas_new') ?>'">Nueva Actividad Acad&eacute;mica</button>
    <button id="" title="Editar la Actividad Acad&eacute;emica" onclick="document.location.href='<?php echo url_for('SrcmtActividadesAcademicas_edit', $ActividadAcademica) ?>'">Editar</button>
    <button id="" title="Muestra la Lista de Actividades Acad&eacute;emicas" onclick="document.location.href='<?php echo url_for('SrcmtActividadesAcademicas') ?>'">Listar</button>
    <button id="" title="Facilita la Impresi&oacute;n de una Actividad Acad&eacute;emica con Participantes" onclick="NuevoTag('<?php echo url_for('SrcmtActividadesAcademicas_imprimir_brigadistas',$ActividadAcademica ) ?>')">Imprimir</button>

</span>

<div style="padding: 5px"></div>
<div >
    <div class="data-frame forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <ul class="identity">                       
                <li class="even">
                    <div class="col1"><strong>Tipo de Actividad</strong><?php echo $ActividadAcademica->getSrcmtTipoActividad() ?></div>
                    <div class="col2"><strong>Actividad</strong><?php echo $ActividadAcademica->getActividad() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Responsable</strong><?php echo $ActividadAcademica->getResponsable() ?></div>
                    <div class="col2"><strong>Fecha</strong><?php echo $ActividadAcademica->getFechaFormateado() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Lugar</strong><?php echo $ActividadAcademica->getLugar() ?></div>
                    <div class="col2"><strong>Duraci&oacute;n</strong><?php echo $ActividadAcademica->getDuracion() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Descripci&oacute;n</strong><?php echo $ActividadAcademica->getDescripcion() ?></div>
                    <div class="col2"><strong></strong></div>

                </li>
                <li><div class="col1"><strong>Creado el:</strong><?php echo $ActividadAcademica->getCreatedAtFormateado() ?></div>
                    <div class="col2"><strong>Actualizado el:</strong><?php echo $ActividadAcademica->getUpdatedAtFormateado() ?></div>

                </li>
            </ul>
        </div>
    </div>

</div>

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













































