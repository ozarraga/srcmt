<?php //use_stylesheet('all.css')          ?>


<script>
    $(document).ready(function() {
        $("input:button, input:submit").button();
        $("#opcion-barra").buttonset();
	$( "#tabs-actividades" ).tabs();
    });

</script>

<h3 class="ui-widget-header ui-corner-all"><span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp;Brigadista Estudiantil <?php echo $miliciano->getPrimerApellido() . " " . $miliciano->getPrimerNombre() ?></h3>

<span id="opcion-barra" class="opcion-barra ui-corner-all ">
    <button id="" title="Redirige al Registro de Nuevo Brigadista Estudiantil" onclick="document.location.href='<?php echo url_for('@milicianos_new') ?>'">Nuevo Brigadista Estudiantil</button>
    <button id="" title="Editar Brigadista Estudiantil" onclick="document.location.href='<?php echo url_for('milicianos/edit?codigo_miliciano=' . $miliciano->getCodigoMiliciano() ) ?>'">Editar</button>
    <button id="" title="Muestra la Lista de Brigadistas Estudiantiles" onclick="document.location.href='<?php echo url_for('milicianos/index') ?>'">Listar</button>
    <button id="" title="Muestra los datos completos del Brigadista" onclick="document.location.href='<?php echo url_for('milicianos_show',$miliciano ) ?>'">Mostrar Registro</button>
    <button id="" title="Facilita la Impresi&oacute;n de un Brigadista Estudiantil" onclick="NuevoTag('<?php echo url_for('milicianos_imprimir_actividades', $miliciano) ?>')" >Imprimir</button>
</span>

<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Datos Personales</h3>
<div >
    <div class="data-frame  forma-fondo ui-corner-all">
        <div class="profile">
            <div class="photo"><img alt="" src="/uploads/fotocarnet/<?php echo $miliciano->getFoto() ?>" width="120"></div>
            <ul class="identity">                       
                <li class="even">
                    <div class="col1"><strong>Nombre</strong><?php echo $miliciano->getPrimerApellido() . " " . $miliciano->getSegundoApellido() . " " . $miliciano->getPrimerNombre() . " " . $miliciano->getSegundoNombre() ?></div>
                    <div class="col2"><strong>C&eacute;dula de Identidad</strong><?php echo $miliciano->getCedulaIdentidad() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Fecha de Nacimiento</strong><?php echo $miliciano->getFechaNacimiento() ?></div>
                    <div class="col2"><strong>Sexo</strong><?php echo $miliciano->getSexo() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Estado Civil</strong><?php echo $miliciano->getEstadoCivil() ?></div>
                    <div class="col2"><strong>Nacionalidad</strong><?php echo $miliciano->getNacionalidad() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Grupo Sanguineo</strong><?php echo $miliciano->getGrupoSanguineo() ?></div>
                    <div class="col2"><strong></strong></div>
                </li>
            </ul>
        </div>
    </div>

</div>
<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-gear" ></span>&nbsp;&nbsp; Actividades</h3>
<div id="tabs-actividades">
	<ul>
		<li><a href="#tabs-1">Actividades Acad&eacute;micas</a></li>
		<li><a href="#tabs-2">Actividades de Integraci&oacute;n C&iacute;vico Militar</a></li>

	</ul>
	<div id="tabs-1">

		<?php include_partial('SrcmtActividadesAcademicas/lista_brigadistas', array('ActividadesAcademicas'=>$ActividadesAcademicas)) ?>
	</div>
	<div id="tabs-2">

		<?php include_partial('SrcmtActividadesIcm/lista_brigadistas', array('ActividadesICM'=>$ActividadesICM)) ?>
	</div>

</div>

