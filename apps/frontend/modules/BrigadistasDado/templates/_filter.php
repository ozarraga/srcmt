<?php //use_javascript('dynamicForm.js') ?>
<?php //use_stylesheets_for_form($filterForm)    ?>
<?php use_javascripts_for_form($filterForm)    ?>


<form id="<?php echo $filterForm->getName() ?>" name="<?php echo $filterForm->getName() ?>" action="<?php echo url_for('BrigadistasDado_imprimir_lista') ?>" target="_blank" method="POST">
	<?php //echo form_tag_for($filterForm, '@BrigadistasDado') ?>
	<?php //if (!$filterForm->getObject()->isNew()): ?>
<!--    <input type="hidden" name="sf_method" value="put" />-->
	<?php //endif; ?>
	<?php echo $filterForm['_csrf_token'] ?>
	<?php echo $filterForm->renderHiddenFields() ?>
	<?php echo $filterForm->renderglobalerrors() ?>
	<div id="tabs-brigadistas-dado" class="">

		<table class="srcmt-dimension-forma">
			<tfoot class="tfoot-tr-td-input">
				<tr>
					<td colspan="3">

					</td>
				</tr>
			</tfoot>
			<tbody>
				<tr>
					<td>

						<ul class="srcmt-centra-ul-tab">
							<li><a href="#tab-9">Campos a mostrar</a></li>
							<li><a href="#tab-1">Datos Personales</a></li>
							<li><a href="#tab-2">Ubicaci&oacute;n</a></li>
							<li><a href="#tab-3">Aspectos Profesionales</a></li>
							<li><a href="#tab-4">Se&ntilde;ales Fision&oacute;micas</a></li>
							<li><a href="#tab-5">Inserci&oacute;n Social</a></li>
							<li><a href="#tab-6">Beneficiario</a></li>
							<li><a href="#tab-7">Asignar Actividades Academicas</a></li>
							<li><a href="#tab-8">Asignar Actividades ICM</a></li>
						</ul>

						<div  id="tab-1">
							<table  class="srcmt-dimension-forma" border="0"  cellpadding="0">
								<tbody>
									<tr>
										<td>
											<?php echo $filterForm['nacionalidad']->renderError() ?><br />
											<?php echo $filterForm['nacionalidad']->renderLabel() ?><br />
											<?php echo $filterForm['nacionalidad'] ?>

										</td>

										<td>
											<?php echo $filterForm['cedula_identidad']->renderError() ?><br />
											<?php echo $filterForm['cedula_identidad']->renderLabel() ?><br />
											<?php echo $filterForm['cedula_identidad'] ?>

										</td>

										<td>
											<?php echo $filterForm['estado_civil']->renderError() ?><br />
											<?php echo $filterForm['estado_civil']->renderLabel() ?><br />
											<?php echo $filterForm['estado_civil']->render(array('text' => $filterForm['estado_civil']->getValue(), 'value' => $filterForm['estado_civil']->getValue())) ?>

										</td>

										<td>
											<?php echo $filterForm['fecha_nacimiento']->renderError() ?><br />
											<?php echo $filterForm['fecha_nacimiento']->renderLabel() ?><br />
											<?php echo $filterForm['fecha_nacimiento'] ?>

										</td>
									</tr>
									<tr>
										<td>
											<?php echo $filterForm['primer_apellido']->renderError() ?><br />
											<?php echo $filterForm['primer_apellido']->renderLabel() ?><br />
											<?php echo $filterForm['primer_apellido'] ?>

										</td>

										<td>
											<?php echo $filterForm['segundo_apellido']->renderError() ?><br />
											<?php echo $filterForm['segundo_apellido']->renderLabel() ?><br />
											<?php echo $filterForm['segundo_apellido'] ?>
										</td>

										<td>
											<?php echo $filterForm['primer_nombre']->renderError() ?><br />
											<?php echo $filterForm['primer_nombre']->renderLabel() ?><br />
											<?php echo $filterForm['primer_nombre'] ?>

										</td>

										<td>
											<?php echo $filterForm['segundo_nombre']->renderError() ?><br />
											<?php echo $filterForm['segundo_nombre']->renderLabel() ?><br />
											<?php echo $filterForm['segundo_nombre'] ?>
										</td>
									</tr>
									<tr>
										<td>
											<?php echo $filterForm['grupo_sanguineo']->renderError() ?><br />
											<?php echo $filterForm['grupo_sanguineo']->renderLabel() ?><br />
											<?php echo $filterForm['grupo_sanguineo'] ?>
										</td>

										<td>
											<?php echo $filterForm['lugar_de_nacimiento']->renderError() ?><br />
											<?php echo $filterForm['lugar_de_nacimiento']->renderLabel() ?><br />
											<?php echo $filterForm['lugar_de_nacimiento'] ?>
										</td>

										<td>
											<?php echo $filterForm['religion']->renderError() ?><br />
											<?php echo $filterForm['religion']->renderLabel() ?><br />
											<?php echo $filterForm['religion'] ?>
										</td>


										<td>
											<?php echo $filterForm['sexo']->renderError() ?><br />
											<?php echo $filterForm['sexo']->renderLabel() ?><br />
											<?php echo $filterForm['sexo'] ?>

										</td>
									</tr>

									<tr>
										<td colspan="2">

											<?php echo $filterForm['created_at']->renderLabel() ?><br />
											<?php echo $filterForm['created_at'] ?>
										</td>

										<td colspan="2">

											<?php echo $filterForm['updated_at']->renderLabel() ?><br />
											<?php echo $filterForm['updated_at'] ?>
										</td>
									</tr>

								</tbody>
							</table>
						</div>
						<div id="tab-2">
							<table class="srcmt-dimension-forma" border="0" cellpadding="0"  >
								<tbody>
									<tr >
										<td>

											<?php echo $filterForm['codigo_estado']->renderError() ?><br />
											<?php echo $filterForm['codigo_estado']->renderLabel() ?><br />
											<?php echo $filterForm['codigo_estado'] ?>
										</td>

										<td>

											<?php echo $filterForm['codigo_municipio']->renderError() ?><br />
											<?php echo $filterForm['codigo_municipio']->renderLabel() ?><br />
											<?php echo $filterForm['codigo_municipio'] ?>
										</td>

										<td>

											<?php echo $filterForm['codigo_parroquia']->renderError() ?><br />
											<?php echo $filterForm['codigo_parroquia']->renderLabel() ?><br />
											<?php echo $filterForm['codigo_parroquia']->render() ?>
										</td>

										<td>
											<?php echo $filterForm['codigo_ciudad']->renderError() ?><br />
											<?php echo $filterForm['codigo_ciudad']->renderLabel() ?><br />
											<?php echo $filterForm['codigo_ciudad'] ?>
										</td>
									</tr>

									<tr>
										<td>
											<?php echo $filterForm['direccion_domiciliaria']->renderError() ?><br />
											<?php echo $filterForm['direccion_domiciliaria']->renderLabel() ?><br />
											<?php echo $filterForm['direccion_domiciliaria']->render(array('cols' => 21, 'rows' => 3)) ?>

										</td>

										<td>
											<?php echo $filterForm['telefono_domicilio']->renderError() ?><br />
											<?php echo $filterForm['telefono_domicilio']->renderLabel() ?><br />
											<?php echo $filterForm['telefono_domicilio'] ?>

										</td>

										<td>
											<?php echo $filterForm['telefono_movil']->renderError() ?><br />
											<?php echo $filterForm['telefono_movil']->renderLabel() ?><br />
											<?php echo $filterForm['telefono_movil'] ?>
										</td>

										<td>
											<?php echo $filterForm['correo_electronico']->renderError() ?><br />
											<?php echo $filterForm['correo_electronico']->renderLabel() ?><br />
											<?php echo $filterForm['correo_electronico'] ?>

										</td>
									</tr>
									<tr>
										<td>
											<?php echo $filterForm['direccion_emergencia']->renderError() ?><br />
											<?php echo $filterForm['direccion_emergencia']->renderLabel() ?><br />
											<?php echo $filterForm['direccion_emergencia']->render(array('cols' => 21, 'rows' => 3)) ?>

										</td>

										<td>
											<?php echo $filterForm['telefono_emergencia']->renderError() ?><br />
											<?php echo $filterForm['telefono_emergencia']->renderLabel() ?><br />
											<?php echo $filterForm['telefono_emergencia'] ?>

										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<div id="tab-3">
							<table class="srcmt-dimension-forma" border="0" cellpadding="0">
								<tbody>

									<tr>
										<td colspan="2">
											<?php echo $filterForm['unidad_adscripcion_laboral']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['unidad_adscripcion_laboral']->renderLabel() ?><br />
											<?php echo $filterForm['unidad_adscripcion_laboral'] ?>
										</td>

										<td colspan="2">
											<?php echo $filterForm['extension_interna']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['extension_interna']->renderLabel() ?><br />
											<?php echo $filterForm['extension_interna']->render(array('cols' => 21, 'rows' => 3)) ?>
										</td>


										<td colspan="2">
											<?php echo $filterForm['perfil_empleado']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['perfil_empleado']->renderLabel() ?><br />
											<?php echo $filterForm['perfil_empleado'] ?>

										</td>

										<td colspan="2">
											<?php echo $filterForm['jefe_sector']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['jefe_sector']->renderLabel() ?><br />
											<?php echo $filterForm['jefe_sector'] ?>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<?php echo $filterForm['grado_instruccion']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['grado_instruccion']->renderLabel() ?><br />
											<?php echo $filterForm['grado_instruccion'] ?>

										</td>

										<td colspan="2">
											<?php echo $filterForm['especialidad']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['especialidad']->renderLabel() ?><br />
											<?php echo $filterForm['especialidad']->render(array('cols' => 21, 'rows' => 3)) ?>

										</td>

										<td colspan="2">
											<?php echo $filterForm['sedes']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['sedes']->renderLabel() ?><br />
											<?php echo $filterForm['sedes'] ?>

										</td>

										<td colspan="2">
											<?php echo $filterForm['jerarquia']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['jerarquia']->renderLabel() ?><br />
											<?php echo $filterForm['jerarquia'] ?>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<?php echo $filterForm['profesion']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['profesion']->renderLabel() ?><br />
											<?php echo $filterForm['profesion'] ?>
										</td>

										<td colspan="2">
											<?php echo $filterForm['oficio']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['oficio']->renderLabel() ?><br />
											<?php echo $filterForm['oficio'] ?>
										</td>

										<td colspan="2">
											<?php echo $filterForm['centro_votacion_cne']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['centro_votacion_cne']->renderLabel() ?><br />
											<?php echo $filterForm['centro_votacion_cne'] ?>
										</td>

										<td colspan="2">
											<?php echo $filterForm['direccion_oficina']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['direccion_oficina']->renderLabel() ?><br />
											<?php echo $filterForm['direccion_oficina'] ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<div id="tab-4">
							<table class="srcmt-dimension-forma"   border="0" cellpadding="0">
								<tbody>
									<tr>
										<td colspan="2">
											<?php echo $filterForm['estatura']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['estatura']->renderLabel() ?><br />
											<?php echo $filterForm['estatura']->render(array('cols' => 21, 'rows' => 3)) ?>
										</td>

										<td colspan="2">
											<?php echo $filterForm['peso']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['peso']->renderLabel() ?><br />
											<?php echo $filterForm['peso']->render(array('cols' => 21, 'rows' => 3)) ?>

										</td>

										<td colspan="2">
											<?php echo $filterForm['color_cabello']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['color_cabello']->renderLabel() ?><br />
											<?php echo $filterForm['color_cabello'] ?>

										</td>

										<td colspan="2">
											<?php echo $filterForm['color_piel']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['color_piel']->renderLabel() ?><br />
											<?php echo $filterForm['color_piel'] ?>

										</td>
									</tr>
									<tr>
										<td colspan="2">
											<?php echo $filterForm['talla_pantalon']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['talla_pantalon']->renderLabel() ?><br/>
											<?php echo $filterForm['talla_pantalon'] ?>
										</td>
										<td colspan="2">
											<?php echo $filterForm['talla_camisa']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['talla_camisa']->renderLabel() ?><br />
											<?php echo $filterForm['talla_camisa'] ?>
										</td>

										<td colspan="2">
											<?php echo $filterForm['talla_calzado']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['talla_calzado']->renderLabel() ?><br />
											<?php echo $filterForm['talla_calzado'] ?>
										</td>

										<td colspan="2">
											<?php echo $filterForm['talla_gorra']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['talla_gorra']->renderLabel() ?><br />
											<?php echo $filterForm['talla_gorra'] ?>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<?php echo $filterForm['discapacidad']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['discapacidad']->renderLabel() ?><br />
											<?php echo $filterForm['discapacidad']->render(array('cols' => 21, 'rows' => 3)) ?>
										</td>
										<td colspan="2">
											<?php echo $filterForm['alergias']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['alergias']->renderLabel() ?><br />
											<?php echo $filterForm['alergias']->render(array('cols' => 21, 'rows' => 3)) ?>

										</td>

										<td colspan="2">
											<?php echo $filterForm['dominio_mano']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['dominio_mano']->renderLabel() ?><br />
											<?php echo $filterForm['dominio_mano'] ?>

										</td>
									</tr>

								</tbody>
							</table>
						</div>
						<div id="tab-5">
							<table class="srcmt-dimension-forma" border="0" cellpadding="0">
								<tbody>

									<tr>
										<td colspan="4">
											<?php echo $filterForm['deporte']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['deporte']->renderLabel() ?><br />
											<?php echo $filterForm['deporte'] ?>
										</td>

										<td colspan="4">
											<?php echo $filterForm['actividades_culturales']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['actividades_culturales']->renderLabel() ?><br />
											<?php echo $filterForm['actividades_culturales'] ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div id="tab-6">
							<table class="srcmt-dimension-forma" border="0" cellpadding="0">
								<tbody>

									<tr>
										<td colspan="2">
											<?php echo $filterForm['apellidos_beneficiario']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['apellidos_beneficiario']->renderLabel() ?><br />
											<?php echo $filterForm['apellidos_beneficiario'] ?>

										</td>

										<td colspan="2">
											<?php echo $filterForm['nombres_beneficiario']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['nombres_beneficiario']->renderLabel() ?><br />
											<?php echo $filterForm['nombres_beneficiario'] ?>

										</td>

										<td colspan="2">
											<?php echo $filterForm['cedula_beneficiario']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['cedula_beneficiario']->renderLabel() ?><br />
											<?php echo $filterForm['cedula_beneficiario'] ?>

										</td>

										<td colspan="2">
											<?php echo $filterForm['telefono_beneficiario']->renderError() ?>&nbsp;<br />
											<?php echo $filterForm['telefono_beneficiario']->renderLabel() ?><br />
											<?php echo $filterForm['telefono_beneficiario'] ?>

										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div id="tab-7">
							<fieldset>
								<?php echo $filterForm['actividad_academica_list']->renderError() ?>&nbsp;<br />
								<?php echo $filterForm['actividad_academica_list']->renderLabel() ?><br />
								<?php echo $filterForm['actividad_academica_list'] ?>
							</fieldset>
						</div>
						<div id="tab-8">
							<fieldset>
								<?php echo $filterForm['actividad_icm_list']->renderError() ?>&nbsp;<br />
								<?php echo $filterForm['actividad_icm_list']->renderLabel() ?><br />
								<?php echo $filterForm['actividad_icm_list'] ?>
							</fieldset>
						</div>
						<div id="tab-9">
							<?php include_partial('brigdado_filter_checkboxes', array('filterForm' => $filterForm)) ?>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</form>