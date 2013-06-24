<?php //use_stylesheet('all.css')                ?>

<script>
    $(document).ready(function() {
        $("input:button, input:submit").button();
        $("#opcion-barra").buttonset();
	$( "#tabs-actividades" ).tabs();
    });

</script>

<h3 class="ui-widget-header ui-corner-all"><span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp;Brigadista DADO <?php echo $srcmt_brigadistas_dado->getPrimerApellido() . " " . $srcmt_brigadistas_dado->getPrimerNombre() ?></h3>

<span id="opcion-barra" class="opcion-barra ui-corner-all ">
    <button  title="Redirige al registro de nuevo Brigadista DADO" onclick="document.location.href='<?php echo url_for('BrigadistasDado_new') ?>'">Nuevo Brigadista DADO</button>
    <button  title="Editar Brigadista DADO" onclick="document.location.href='<?php echo url_for('BrigadistasDado_edit', $srcmt_brigadistas_dado) ?>'">Editar</button>
    <button  title="Muestra la lista de Brigadistas DADO" onclick="document.location.href='<?php echo url_for('@BrigadistasDado') ?>'">Listar</button>
    <button  title="Muestra los datos completos del Brigadista"  onclick="document.location.href='<?php echo url_for('BrigadistasDado_show',$srcmt_brigadistas_dado ) ?>'">Mostrar Registro</button>
    <button  title="Facilita la impresi&iacute;n de un Brigadista con las actividades donde ha participado" onclick="NuevoTag('<?php echo url_for('BrigadistasDado_imprimir_actividades',$srcmt_brigadistas_dado ) ?>')">Imprimir</button>
</span>
<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Datos Personales</h3>
<div >
    <div class="data-frame forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <div class="photo"><img alt="" src="/uploads/fotocarnet/<?php echo $srcmt_brigadistas_dado->getFoto() ?>" width="120"></div>
            <ul class="identity">
                <li class="even">
                    <div class="col1"><strong>Nombre</strong><?php echo $srcmt_brigadistas_dado->getPrimerApellido() . " " . $srcmt_brigadistas_dado->getSegundoApellido() . " " . $srcmt_brigadistas_dado->getPrimerNombre() . " " . $srcmt_brigadistas_dado->getSegundoNombre() ?></div>
                    <div class="col2"><strong>C&eacute;dula de Identidad</strong><?php echo $srcmt_brigadistas_dado->getCedulaIdentidad() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Fecha de Nacimiento</strong><?php echo $srcmt_brigadistas_dado->getFechaNacimientoFormateado() ?></div>
                    <div class="col2"><strong>Sexo</strong><?php echo $srcmt_brigadistas_dado->getSexo() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Estado Civil</strong><?php echo $srcmt_brigadistas_dado->getEstadoCivil() ?></div>
                    <div class="col2"><strong>Nacionalidad</strong><?php echo $srcmt_brigadistas_dado->getNacionalidad() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Lugar de Nacimiento</strong><?php echo $srcmt_brigadistas_dado->getLugarDeNacimiento() ?></div>
                    <div class="col2"><strong>Grupo Sanguineo</strong><?php echo $srcmt_brigadistas_dado->getGrupoSanguineo() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Religi&oacute;n</strong><?php echo $srcmt_brigadistas_dado->getReligion() ?></div>
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