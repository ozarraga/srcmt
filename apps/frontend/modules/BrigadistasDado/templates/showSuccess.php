<?php //use_stylesheet('all.css')                  ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("input:button, input:submit").button();
        $("#opcion-barra").buttonset();


    });

</script>

<h3 class="ui-widget-header ui-corner-all"><span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp;Brigadista DADO <?php echo $srcmt_brigadistas_dado->getPrimerApellido() . " " . $srcmt_brigadistas_dado->getPrimerNombre() ?></h3>

<span id="opcion-barra" class="opcion-barra ui-corner-all ">
    <button  title="Redirige al Registro de Nuevo Brigadista DADO" onclick="document.location.href='<?php echo url_for('BrigadistasDado_new') ?>'">Nuevo Brigadista DADO</button>
    <button  title="Editar Brigadista DADO" onclick="document.location.href='<?php echo url_for('BrigadistasDado_edit', $srcmt_brigadistas_dado) ?>'">Editar</button>
    <button  title="Muestra la Lista de Brigadistas DADO" onclick="document.location.href='<?php echo url_for('@BrigadistasDado') ?>'">Listar</button>
    <button  title="Muestra los datos b&aacute;sicos del Brigadista con las Actividades donde ha participado"  onclick="document.location.href='<?php echo url_for('BrigadistasDado_show_actividades', $srcmt_brigadistas_dado) ?>'">Mostrar Actividades</button>
    <button  title="Facilita la Impresi&oacute;n de un Brigadista"  onclick="NuevoTag('<?php echo url_for('BrigadistasDado_imprimir_sencillo', $srcmt_brigadistas_dado) ?>')">Imprimir Registro</button>

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
<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Ubicaci&oacute;n</h3>
<div>
    <div class="data-frame forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <ul class="identity">
                <li class="even">
                    <div class="col1"><strong>Estado</strong><?php echo mb_convert_case($srcmt_brigadistas_dado->getEstado(), MB_CASE_TITLE, "UTF-8") ?></div>
                    <div class="col2"><strong>Municipio</strong><?php echo mb_convert_case($srcmt_brigadistas_dado->getMunicipio(), MB_CASE_TITLE, "UTF-8") ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Parroquia</strong><?php echo mb_convert_case($srcmt_brigadistas_dado->getParroquia(), MB_CASE_TITLE, "UTF-8") ?></div>
                    <div class="col2"><strong>Ciudad</strong><?php echo mb_convert_case($srcmt_brigadistas_dado->getCiudad(), MB_CASE_TITLE, "UTF-8") ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Direcci&oacute;n</strong><?php echo $srcmt_brigadistas_dado->getDireccionDomiciliaria() ?></div>
                    <div class="col2"><strong>Telefono Local</strong><?php echo $srcmt_brigadistas_dado->getTelefonoDomicilio() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Movil</strong><?php echo $srcmt_brigadistas_dado->getTelefonoMovil() ?></div>
                    <div class="col2"><strong>Correo Electronico</strong><?php echo $srcmt_brigadistas_dado->getCorreoElectronico() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Direcci&oacute;n Emergencia</strong><?php echo $srcmt_brigadistas_dado->getDireccionEmergencia() ?></div>
                    <div class="col2"><strong>Telefono Emergencia</strong><?php echo $srcmt_brigadistas_dado->getTelefonoEmergencia() ?></div>
                </li>
            </ul>
            <div class="photo">
                <?php echo image_tag('radar-md.png', 'alt="redar" width="120"') ?>
                <!--<img alt="redar" src="/images/radar-md.png" width="120">-->
            </div>
        </div>
    </div>
</div>
<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp;Aspectos Profesionales</h3>
<div>
    <div class="data-frame forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <div class="photo">
                <?php echo image_tag('trabajador.jpg', 'img alt="trabajador" width="120"') ?>
                <!--<img alt="" src="/images/trabajador.jpg" width="120">-->
            </div>
            <ul class="identity">
                <li class="even">
                    <div class="col1"><strong>Unidad de Adscripcion laboral</strong><?php echo $srcmt_brigadistas_dado->getUnidadAdscripcionLaboral() ?></div>
                    <div class="col2"><strong>Extension Interna</strong><?php echo $srcmt_brigadistas_dado->getExtensionInterna() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Perfil Empleado</strong><?php echo $srcmt_brigadistas_dado->getPerfilEmpleado() ?></div>
                    <div class="col2"><strong>Jefe Sector</strong><?php echo $srcmt_brigadistas_dado->getJefeSector() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Especialidad</strong><?php echo $srcmt_brigadistas_dado->getEspecialidad() ?></div>
                    <div class="col2"><strong>Sedes</strong><?php echo $srcmt_brigadistas_dado->getSrcmtSedes() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Jerarquia</strong><?php echo $srcmt_brigadistas_dado->getJerarquia() ?></div>
                    <div class="col2"><strong>Profesi&oacute;n</strong><?php echo $srcmt_brigadistas_dado->getProfesion() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Oficio</strong><?php echo $srcmt_brigadistas_dado->getOficio() ?></div>
                    <div class="col2"><strong>Centro de Votaci&oacute;n CNE</strong><?php echo $srcmt_brigadistas_dado->getCentroVotacionCne() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Direcci&oacute;n Oficina</strong><?php echo $srcmt_brigadistas_dado->getDireccionOficina() ?></div>
                    <div class="col2"><strong></strong></div>
                </li>
            </ul>
        </div>
    </div>
</div>
<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Se&ntilde;ales Particulares;</h3>
<div>
    <div class="data-frame forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <ul class="identity">
                <li class="even">
                    <div class="col1"><strong>Estatura</strong><?php echo $srcmt_brigadistas_dado->getEstatura() ?></div>
                    <div class="col2"><strong>Peso Kg</strong><?php echo $srcmt_brigadistas_dado->getPeso() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Color Cabello</strong><?php echo $srcmt_brigadistas_dado->getColorCabello() ?></div>
                    <div class="col2"><strong>Color Piel</strong><?php echo $srcmt_brigadistas_dado->getColorPiel() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Talla Pantal&oacute;n</strong><?php echo $srcmt_brigadistas_dado->getTallaPantalon() ?></div>
                    <div class="col2"><strong>Talla Camisa</strong><?php echo $srcmt_brigadistas_dado->getTallaCamisa() ?></div>
                </li>
                <li >
                    <div class="col1"><strong>Talla Calzado</strong><?php echo $srcmt_brigadistas_dado->getTallaCalzado() ?></div>
                    <div class="col2"><strong>Talla Gorra</strong><?php echo $srcmt_brigadistas_dado->getTallaGorra() ?></div>
                </li>
                <li class="even">
                    <div class="col1"><strong>Discapacidad</strong><?php echo $srcmt_brigadistas_dado->getDiscapacidad() ?></div>
                    <div class="col2"><strong>Alergias</strong><?php echo $srcmt_brigadistas_dado->getAlergias() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Dominio Mano</strong><?php echo $srcmt_brigadistas_dado->getDominioMano() ?></div>
                    <div class="col2"><strong></strong></div>
                </li>
            </ul>
            <div class="photo">
                <?php echo image_tag('estatura.jpg', ' alt="estatura" width="120"') ?>
                <!--<img alt="" src="/images/estatura.jpg" width="120">-->
            </div>
        </div>
    </div>
</div>
<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Inserci&oacute;n Social</h3>
<div>
    <div class="data-frame forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <div class="photo">
                <?php echo image_tag('insercion-social.png', 'alt="inserci&oacute;n social" width="120"') ?>
                <!--<img alt="" src="/images/insercion-social.png" width="120">-->
            </div>
            <ul class="identity">
                <li class="even">
                    <div class="col1"><strong>Deporte</strong><?php echo $srcmt_brigadistas_dado->getDeporte() ?></div>
                    <div class="col2"><strong>Actividades Culturales</strong><?php echo $srcmt_brigadistas_dado->getActividadesCulturales() ?></div>
                </li>
            </ul>
        </div>
    </div>
</div>
<h3 class="ui-corner-all titulos-show">&nbsp;&nbsp;<span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp; Beneficiario</h3>
<div>
    <div class="data-frame forma-fondo ui-corner-all ui-widget ui-widget-content">
        <div class="profile">
            <ul class="identity">
                <li class="even">
                    <div class="col1"><strong>Apellidos Beneficiario</strong><?php echo $srcmt_brigadistas_dado->getApellidosBeneficiario() ?></div>
                    <div class="col2"><strong>Nombres Beneficiario</strong><?php echo $srcmt_brigadistas_dado->getNombresBeneficiario() ?></div>
                </li>
                <li>
                    <div class="col1"><strong>Cedula Beneficiario</strong><?php echo $srcmt_brigadistas_dado->getCedulaBeneficiario() ?></div>
                    <div class="col2"><strong>Telefono Beneficiario</strong><?php echo $srcmt_brigadistas_dado->getTelefonoBeneficiario() ?></div>
                </li>
            </ul>
            <div class="photo">
                <?php echo image_tag('beneficiarios.jpg', 'alt="beneficiarios" width="120"') ?>
                <!--<img alt="" src="/images/beneficiarios.jpg" width="120">-->
            </div>
        </div>
    </div>
</div>












