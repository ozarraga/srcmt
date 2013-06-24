<h3 class="ui-widget-header ui-corner-all"><span class="iconos-de-titulos ui-icon ui-icon-person" ></span>&nbsp;&nbsp;Brigadista Estudiantil <?php echo $miliciano->getPrimerApellido()." ".$miliciano->getPrimerNombre()  ?>!!!!!!!!</h3>

<table>
  <tbody>
    <tr>
        <th title="C&oacute;digo Brigadista C&iacute;vico Militar">Codigo BCM:</th>
      <td><?php echo $miliciano->getCodigoMiliciano() ?></td>
    </tr>
    <tr>
      <th>Primer apellido:</th>
      <td><?php echo $miliciano->getPrimerApellido() ?></td>
    </tr>
    <tr>
      <th>Segundo apellido:</th>
      <td><?php echo $miliciano->getSegundoApellido() ?></td>
    </tr>
    <tr>
      <th>Primer nombre:</th>
      <td><?php echo $miliciano->getPrimerNombre() ?></td>
    </tr>
    <tr>
      <th>Cedula identidad:</th>
      <td><?php echo $miliciano->getCedulaIdentidad() ?></td>
    </tr>
    <tr>
      <th>Nacionalidad:</th>
      <td><?php echo $miliciano->getNacionalidad() ?></td>
    </tr>
    <tr>
      <th>Sexo:</th>
      <td><?php echo $miliciano->getSexo() ?></td>
    </tr>
    <tr>
      <th>Fecha nacimiento:</th>
      <td><?php echo $miliciano->getFechaNacimiento() ?></td>
    </tr>
    <tr>
      <th>Grupo sanguineo:</th>
      <td><?php echo $miliciano->getGrupoSanguineo() ?></td>
    </tr>
    <tr>
      <th>Codigo estado:</th>
      <td><?php echo $miliciano->getCodigoEstado() ?></td>
    </tr>
    <tr>
      <th>Codigo municipio:</th>
      <td><?php echo $miliciano->getCodigoMunicipio() ?></td>
    </tr>
    <tr>
      <th>Codigo ciudad:</th>
      <td><?php echo $miliciano->getCodigoCiudad() ?></td>
    </tr>
    <tr>
      <th>Segundo nombre:</th>
      <td><?php echo $miliciano->getSegundoNombre() ?></td>
    </tr>
    <tr>
      <th>Codigo parroquia:</th>
      <td><?php echo $miliciano->getCodigoParroquia() ?></td>
    </tr>
    <tr>
      <th>Direccion:</th>
      <td><?php echo $miliciano->getDireccion() ?></td>
    </tr>
    <tr>
      <th>Direccion emergencia:</th>
      <td><?php echo $miliciano->getDireccionEmergencia() ?></td>
    </tr>
    <tr>
      <th>Telefono local:</th>
      <td><?php echo $miliciano->getTelefonoLocal() ?></td>
    </tr>
    <tr>
      <th>Movil:</th>
      <td><?php echo $miliciano->getMovil() ?></td>
    </tr>
    <tr>
      <th>Telefono emergencia:</th>
      <td><?php echo $miliciano->getTelefonoEmergencia() ?></td>
    </tr>
    <tr>
      <th>Grado instruccion:</th>
      <td><?php echo $miliciano->getGradoInstruccion() ?></td>
    </tr>
    <tr>
      <th>Especialidad:</th>
      <td><?php echo $miliciano->getEspecialidad() ?></td>
    </tr>
    <tr>
      <th>Idiomas:</th>
      <td><?php echo $miliciano->getIdiomas() ?></td>
    </tr>
    <tr>
      <th>Nivel:</th>
      <td><?php echo $miliciano->getNivelDominioIdioma() ?></td>
    </tr>
    <tr>
      <th>Programa formacion grado:</th>
      <td><?php echo $miliciano->getProgramaFormacionGrado() ?></td>
    </tr>
    <tr>
      <th>Trayecto:</th>
      <td><?php echo $miliciano->getTrayecto() ?></td>
    </tr>
    <tr>
      <th>Tramo:</th>
      <td><?php echo $miliciano->getTramo() ?></td>
    </tr>
    <tr>
      <th>Aldea:</th>
      <td><?php echo $miliciano->getAldea() ?></td>
    </tr>
    <tr>
      <th>Sedes:</th>
      <td><?php echo $miliciano->getSedes() ?></td>
    </tr>
    <tr>
      <th>Componente:</th>
      <td><?php echo $miliciano->getComponente() ?></td>
    </tr>
    <tr>
      <th>Jerarquia:</th>
      <td><?php echo $miliciano->getJerarquia() ?></td>
    </tr>
    <tr>
      <th>Contigente:</th>
      <td><?php echo $miliciano->getContigente() ?></td>
    </tr>
    <tr>
      <th>Arma servicio:</th>
      <td><?php echo $miliciano->getArmaServicio() ?></td>
    </tr>
    <tr>
      <th>Batallon unidad origen:</th>
      <td><?php echo $miliciano->getBatallonUnidadOrigen() ?></td>
    </tr>
    <tr>
      <th>Profesion:</th>
      <td><?php echo $miliciano->getProfesion() ?></td>
    </tr>
    <tr>
      <th>Oficio:</th>
      <td><?php echo $miliciano->getOficio() ?></td>
    </tr>
    <tr>
        <th>Trabaja (S&iacute;, No):</th>
      <td><?php echo $miliciano->getTrabajaSiNo() ?></td>
    </tr>
    <tr>
      <th>Nombre empresa:</th>
      <td><?php echo $miliciano->getNombreEmpresa() ?></td>
    </tr>
    <tr>
      <th>Direccion oficina:</th>
      <td><?php echo $miliciano->getDireccionOficina() ?></td>
    </tr>
    <tr>
      <th>Telefono oficina:</th>
      <td><?php echo $miliciano->getTelefonoOficina() ?></td>
    </tr>
    <tr>
        <th>Posee Vehiculo (S&iacute;, No):</th>
      <td><?php echo $miliciano->getPoseeVehiculo() ?></td>
    </tr>
    <tr>
      <th>Tipo vehiculo:</th>
      <td><?php echo $miliciano->getTipoVehiculo() ?></td>
    </tr>
    <tr>
      <th>Modelo vehiculo:</th>
      <td><?php echo $miliciano->getModeloVehiculo() ?></td>
    </tr>
    <tr>
      <th>Numero placa:</th>
      <td><?php echo $miliciano->getNumeroPlaca() ?></td>
    </tr>
    <tr>
        <th>Posee Licencia (S&iacute;, No):</th>
      <td><?php echo $miliciano->getPoseeLicencia() ?></td>
    </tr>
    <tr>
      <th>Grado de la Licencia:</th>
      <td><?php echo $miliciano->getGradoLicencia() ?></td>
    </tr>
    <tr>
      <th>Porte armas:</th>
      <td><?php echo $miliciano->getPorteArmas() ?></td>
    </tr>
    <tr>
      <th>Tipo armamento:</th>
      <td><?php echo $miliciano->getTipoArmamento() ?></td>
    </tr>
    <tr>
      <th>Calibre armamento:</th>
      <td><?php echo $miliciano->getCalibreArmamento() ?></td>
    </tr>
    <tr>
      <th>Signos particulares:</th>
      <td><?php echo $miliciano->getSignosParticulares() ?></td>
    </tr>
    <tr>
      <th>Talla de uniforme:</th>
      <td><?php echo $miliciano->getTallaUniforme() ?></td>
    </tr>
    <tr>
      <th>Talla calzado:</th>
      <td><?php echo $miliciano->getTallaCalzado() ?></td>
    </tr>
    <tr>
      <th>Estatura:</th>
      <td><?php echo $miliciano->getEstatura() ?></td>
    </tr>
    <tr>
      <th>Peso:</th>
      <td><?php echo $miliciano->getPeso() ?></td>
    </tr>
    <tr>
      <th>Color cabello:</th>
      <td><?php echo $miliciano->getColorCabello() ?></td>
    </tr>
    <tr>
      <th>Color piel:</th>
      <td><?php echo $miliciano->getColorPiel() ?></td>
    </tr>
    <tr>
      <th>Discapacidad:</th>
      <td><?php echo $miliciano->getDiscapacidad() ?></td>
    </tr>
    <tr>
      <th>Alergias:</th>
      <td><?php echo $miliciano->getAlergias() ?></td>
    </tr>
    <tr>
      <th>Dominio mano:</th>
      <td><?php echo $miliciano->getDominioMano() ?></td>
    </tr>
    <tr>
        <th>Agrupaciones Sociales:</th>
      <td><?php echo $miliciano->getAgrupacionSocial() ?></td>
    </tr>
    <tr>
      <th>Mision:</th>
      <td><?php echo $miliciano->getMisiones() ?></td>
    </tr>
    <tr>
      <th>Cooperativas:</th>
      <td><?php echo $miliciano->getCooperativas() ?></td>
    </tr>
    <tr>
      <th>Apellidos beneficiario:</th>
      <td><?php echo $miliciano->getApellidosBeneficiario() ?></td>
    </tr>
    <tr>
      <th>Nombres beneficiario:</th>
      <td><?php echo $miliciano->getNombresBeneficiario() ?></td>
    </tr>
    <tr>
      <th>Cedula beneficiario:</th>
      <td><?php echo $miliciano->getCedulaBeneficiario() ?></td>
    </tr>
    <tr>
      <th>Telefono beneficiario:</th>
      <td><?php echo $miliciano->getTelefonoBeneficiario() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('milicianos/edit?codigo_miliciano='.$miliciano->getCodigoMiliciano()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('milicianos/index') ?>">List</a>
