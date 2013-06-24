<?php //use_stylesheet('all.css')           ?>

<script>
    $(document).ready(function() {
        $("input:button, input:submit").button();
        $("#opcion-barra").buttonset();
    });

</script>

<h3 class="ui-widget-header ui-corner-all"><span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp;Brigadista Estudiantil <?php echo $miliciano ?></h3>

<span id="opcion-barra" class="opcion-barra ui-corner-all ">
    <button id="" title="Redirige al Registro de Nuevo Brigadista Estudiantil" onclick="document.location.href='<?php echo url_for('@milicianos_new') ?>'">Nuevo Brigadista Estudiantil</button>
    <button id="" title="Editar Brigadista Estudiantil" onclick="document.location.href='<?php echo url_for('milicianos/edit?codigo_miliciano=' . $miliciano->getCodigoMiliciano()) ?>'">Editar</button>
    <button id="" title="Muestra la Lista de Brigadistas Estudiantiles" onclick="document.location.href='<?php echo url_for('milicianos/index') ?>'">Listar</button>
    <button id="" title="Muestra los datos b&aacute;sicos del Brigadista Estudiantil con las Actividades donde ha participado" onclick="document.location.href='<?php echo url_for('milicianos_show_actividades', $miliciano) ?>'">Mostrar Actividades</button>
    <button id="" title="Facilita la Impresi&oacute;n de un Brigadista Estudiantil" onclick="NuevoTag('<?php echo url_for('milicianos_imprimir_sencillo', $miliciano) ?>')" >Imprimir Registro</button>
</span>


<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Datos Personales</h3>
<div >
    <div class="data-frame  forma-fondo ui-corner-all ui-widget ui-widget-content">
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
<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Ubicaci&oacute;n</h3>
<div>
    <div class="data-frame  forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <ul class="identity">
                <li class="even">
                    <div class="col1"><strong>Estado</strong><?php echo $miliciano->getEstado() ?></div>
                    <div class="col2"><strong>Municipio</strong><?php echo $miliciano->getMunicipio() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Parroquia</strong><?php echo $miliciano->getParroquia() ?></div>
                    <div class="col2"><strong>Ciudad</strong><?php echo $miliciano->getCiudad() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Direcci&oacute;n</strong><?php echo $miliciano->getDireccion() ?></div>
                    <div class="col2"><strong>Telefono Local</strong><?php echo $miliciano->getTelefonoLocal() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Movil</strong><?php echo $miliciano->getMovil() ?></div>
                    <div class="col2"><strong>Correo Electronico</strong><?php echo $miliciano->getCorreoElectronico() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Direcci&oacute;n Emergencia</strong><?php echo $miliciano->getDireccionEmergencia() ?></div>
                    <div class="col2"><strong>Telefono Emergencia</strong><?php echo $miliciano->getTelefonoEmergencia() ?></div>
                </li>
            </ul>
            <div class="photo">
                <?php echo image_tag('radar-md.png', 'alt="radar"  width="120"') ?>
                <!--<img alt="" src="/images/radar-md.png" width="120">-->
            </div>
        </div>
    </div>
</div>
<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Datos Acad&eacute;micos</h3>
<div>
    <div class="data-frame  forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <div class="photo">
                <?php echo image_tag('graduation-hat-md.png', 'alt="graduado" width="120"') ?>
                <!--<img alt="" src="/images/graduation-hat-md.png" width="120">-->
            </div>
            <ul class="identity">
                <li class="even">
                    <div class="col1"><strong>Grado Instruccion</strong><?php echo $miliciano->getGradoInstruccion() ?></div>
                    <div class="col2"><strong>Especialidad</strong><?php echo $miliciano->getEspecialidad() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Idioma</strong><?php echo $miliciano->getIdiomas() ?></div>
                    <div class="col2"><strong>Nivel</strong><?php echo $miliciano->getNivelDominioIdioma() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Trayecto</strong><?php echo $miliciano->getTrayecto() ?></div>
                    <div class="col2"><strong>Tramo</strong><?php echo $miliciano->getTramo() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Sedes</strong><?php echo $miliciano->getSrcmtSedes() ?></div>
                    <div class="col2"><strong>Aldea</strong><?php echo $miliciano->getAldea() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>PFG</strong><?php echo $miliciano->getSrcmtPfg() ?></div>
                    <div class="col2"><strong></strong></div>
                </li>
            </ul>
        </div>
    </div>
</div>
<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Inserci&oacute;n Social</h3>
<div>
    <div class="data-frame  forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <ul class="identity">
                <li class="even">
                    <div class="col1"><strong>Deporte</strong><?php echo $miliciano->getPracticaDeporte() ?></div>
                    <div class="col2"><strong>Tipos de Deporte</strong><?php echo $miliciano->getDeporte() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Participa en Actividades Culturales?</strong><?php echo $miliciano->getParticipaActividadCultural() ?></div>
                    <div class="col2"><strong>Actividades Culturales</strong><?php echo $miliciano->getActividadCultural() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Agrupaciones Sociales</strong><?php echo $miliciano->getAgrupacionSocial() ?></div>
                    <div class="col2"><strong>Misiones Sociales</strong><?php echo $miliciano->getMisiones() ?></div>
                </li>
            </ul>
            <div class="photo">
                <?php echo image_tag('insercion-social.png', 'alt="insercion social" width="120"') ?>
                <!--<img alt="" src="/images/insercion-social.png" width="120">-->
            </div>
        </div>
    </div>
</div>
<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Movilidad y Defensa</h3>
<div>
    <div class="data-frame  forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <div class="photo">
                <?php echo image_tag('movilidad.jpg', 'alt="movilidad" width="120"') ?>
                <!--<img alt="" src="/images/movilidad.jpg" width="120">-->
            </div>
            <ul class="identity">
                <li class="even">
                    <div class="col1"><strong>Posee Vehiculo</strong><?php echo $miliciano->getPoseeVehiculo() ?></div>
                    <div class="col2"><strong>Tipo Vehiculo</strong><?php echo $miliciano->getTipoVehiculo() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Modelo Vehiculo</strong><?php echo $miliciano->getModeloVehiculo() ?></div>
                    <div class="col2"><strong>Numero de Placa</strong><?php echo $miliciano->getNumeroPlaca() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Posee Licencia?</strong><?php echo $miliciano->getPoseeLicencia() ?></div>
                    <div class="col2"><strong>Grado de Licencia</strong><?php echo $miliciano->getGradoLicencia() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Porte de Armas</strong><?php echo $miliciano->getPorteArmas() ?></div>
                    <div class="col2"><strong>Numero Porte Armas</strong><?php echo $miliciano->getNumeroPorteArmas() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Tipo de Armamento</strong><?php echo $miliciano->getTipoArmamento() ?></div>
                    <div class="col2"><strong>Calibre Armamento</strong><?php echo $miliciano->getCalibreArmamento() ?></div>
                </li>
            </ul>
        </div>
    </div>
</div>
<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Se&ntilde;ales Fision&oacute;micas</h3>
<div>
    <div class="data-frame  forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <ul class="identity">
                <li class="even">
                    <div class="col1"><strong>Se&ntilde;ales Particulares</strong><?php echo $miliciano->getSignosParticulares() ?></div>
                    <div class="col2"><strong>Talla Uniforme</strong><?php echo $miliciano->getTallaUniforme() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Talla Calzado</strong><?php echo $miliciano->getTallaCalzado() ?></div>
                    <div class="col2"><strong>Estatura</strong><?php echo $miliciano->getEstatura() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Peso en Kg</strong><?php echo $miliciano->getPeso() ?></div>
                    <div class="col2"><strong>Color Cabello</strong><?php echo $miliciano->getColorCabello() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Color Piel</strong><?php echo $miliciano->getColorPiel() ?></div>
                    <div class="col2"><strong>Discapacidad</strong><?php echo $miliciano->getDiscapacidad() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Alergias</strong><?php echo $miliciano->getAlergias() ?></div>
                    <div class="col2"><strong>Dominio Mano</strong><?php echo $miliciano->getDominioMano() ?></div>
                </li>
            </ul>
            <div class="photo">
                <?php echo image_tag('estatura.jpg', 'alt="estatura" width="120"') ?>
                <!--<img alt="" src="/images/estatura.jpg" width="120">-->
            </div>
        </div>
    </div>
</div>
<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Datos Laborales</h3>
<div>
    <div class="data-frame  forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <div class="photo">
                <?php echo image_tag('trabajador.jpg', 'alt="trabajador" width="120"') ?>
                <!--<img alt="" src="/images/trabajador.jpg" width="120">-->
            </div>
            <ul class="identity">
                <li class="even">
                    <div class="col1"><strong>Profesion</strong><?php echo $miliciano->getProfesion() ?></div>
                    <div class="col2"><strong>Oficio</strong><?php echo $miliciano->getOficio() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Trabaja Si o No</strong><?php echo $miliciano->getTrabajaSiNo() ?></div>
                    <div class="col2"><strong>Nombre Empresa</strong><?php echo $miliciano->getNombreEmpresa() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Direcci&oacute;n Oficina</strong><?php echo $miliciano->getDireccionOficina() ?></div>
                    <div class="col2"><strong>Telefono Oficina</strong><?php echo $miliciano->getTelefonoOficina() ?></div>
                </li>
            </ul>
        </div>
    </div>
</div>
<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Beneficiario</h3>
<div>
    <div class="data-frame  forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <ul class="identity">
                <li class="even">
                    <div class="col1"><strong>Apellidos Beneficiario</strong><?php echo $miliciano->getApellidosBeneficiario() ?></div>
                    <div class="col2"><strong>Nombres Beneficiario</strong><?php echo $miliciano->getNombresBeneficiario() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Cedula Beneficiario</strong><?php echo $miliciano->getCedulaBeneficiario() ?></div>
                    <div class="col2"><strong>Telefono Beneficiario</strong><?php echo $miliciano->getTelefonoBeneficiario() ?></div>
                </li>
            </ul>
            <div class="photo">
                <?php echo image_tag('beneficiarios.jpg', 'alt="beneficiarios" width="120"') ?>
                <!--<img alt="" src="/images/beneficiarios.jpg" width="120">-->
            </div>
        </div>
    </div>
</div>


