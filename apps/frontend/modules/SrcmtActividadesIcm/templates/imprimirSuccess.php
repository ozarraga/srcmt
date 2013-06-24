<table>
  <tbody>
    <tr>
      <th>Codigo actividad icm:</th>
      <td><?php echo $ActividadICM->getCodigoActividadIcm() ?></td>
    </tr>
    <tr>
      <th>Codigo tipo actividad:</th>
      <td><?php echo $ActividadICM->getCodigoTipoActividad() ?></td>
    </tr>
    <tr>
      <th>Actividad:</th>
      <td><?php echo $ActividadICM->getActividad() ?></td>
    </tr>
    <tr>
      <th>Fecha:</th>
      <td><?php echo $ActividadICM->getFecha() ?></td>
    </tr>
    <tr>
      <th>Lugar:</th>
      <td><?php echo $ActividadICM->getLugar() ?></td>
    </tr>
    <tr>
      <th>Duracion:</th>
      <td><?php echo $ActividadICM->getDuracion() ?></td>
    </tr>
    <tr>
      <th>Fecha de Creaci&oacute;n:</th>
      <td><?php echo $ActividadICM->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>&Uacute;ltima Actualizaci&oacute;n:</th>
      <td><?php echo $ActividadICM->getUpdatedAt() ?></td>
    </tr>

  </tbody>
</table>

<hr />

<a href="<?php echo url_for('SrcmtActividadesIcm_edit', $ActividadICM) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('SrcmtActividadesIcm') ?>">List</a>
