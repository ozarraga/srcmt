<table>
  <tbody>
    <tr>
      <th>Codigo actividad academica:</th>
      <td><?php echo $ActividadAcademica->getCodigoActividadAcademica() ?></td>
    </tr>
    <tr>
      <th>Codigo tipo actividad:</th>
      <td><?php echo $ActividadAcademica->getCodigoTipoActividad() ?></td>
    </tr>
    <tr>
      <th>Actividad:</th>
      <td><?php echo $ActividadAcademica->getActividad() ?></td>
    </tr>
    <tr>
      <th>Fecha:</th>
      <td><?php echo $ActividadAcademica->getFecha() ?></td>
    </tr>
    <tr>
      <th>Lugar:</th>
      <td><?php echo $ActividadAcademica->getLugar() ?></td>
    </tr>
    <tr>
      <th>Duracion:</th>
      <td><?php echo $ActividadAcademica->getDuracion() ?></td>
    </tr>
    <tr>
      <th>Descripcion:</th>
      <td><?php echo $ActividadAcademica->getDescripcion() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $ActividadAcademica->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $ActividadAcademica->getUpdatedAt() ?></td>
    </tr>
    
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('SrcmtActividadesAcademicas_edit', $ActividadAcademica) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('SrcmtActividadesAcademicas') ?>">List</a>
