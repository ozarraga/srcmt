<?php

/**
 * SrcmtMilicianos form base class.
 *
 * @method SrcmtMilicianos getObject() Returns the current form's model object
 *
 * @package    srcmt
 * @subpackage form
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSrcmtMilicianosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo_miliciano'             => new sfWidgetFormInputHidden(),
      'nacionalidad'                 => new sfWidgetFormChoice(array('choices' => array('V' => 'V', 'E' => 'E'))),
      'cedula_identidad'             => new sfWidgetFormInputText(),
      'primer_apellido'              => new sfWidgetFormInputText(),
      'segundo_apellido'             => new sfWidgetFormInputText(),
      'primer_nombre'                => new sfWidgetFormInputText(),
      'segundo_nombre'               => new sfWidgetFormInputText(),
      'sexo'                         => new sfWidgetFormChoice(array('choices' => array('F' => 'F', 'M' => 'M'))),
      'fecha_nacimiento'             => new sfWidgetFormDate(),
      'estado_civil'                 => new sfWidgetFormChoice(array('choices' => array('SOLTERO' => 'SOLTERO', 'CASADO' => 'CASADO', 'DIVORCIADO' => 'DIVORCIADO', 'VIUDO' => 'VIUDO', 'CONCUBINATO' => 'CONCUBINATO'))),
      'foto'                         => new sfWidgetFormInputText(),
      'grupo_sanguineo'              => new sfWidgetFormChoice(array('choices' => array('O+' => 'O+', 'O-' => 'O-', 'A-' => 'A-', 'A+' => 'A+', 'B-' => 'B-', 'B+' => 'B+', 'AB-' => 'AB-', 'AB+' => 'AB+'))),
      'codigo_estado'                => new sfWidgetFormInputText(),
      'codigo_municipio'             => new sfWidgetFormInputText(),
      'codigo_parroquia'             => new sfWidgetFormInputText(),
      'codigo_ciudad'                => new sfWidgetFormInputText(),
      'direccion'                    => new sfWidgetFormTextarea(),
      'telefono_local'               => new sfWidgetFormInputText(),
      'movil'                        => new sfWidgetFormInputText(),
      'correo_electronico'           => new sfWidgetFormTextarea(),
      'direccion_emergencia'         => new sfWidgetFormTextarea(),
      'telefono_emergencia'          => new sfWidgetFormInputText(),
      'grado_instruccion'            => new sfWidgetFormChoice(array('choices' => array('' => '', 'Basico' => 'Basico', 'Medio' => 'Medio', 'Diversificado' => 'Diversificado', 'Universitario' => 'Universitario', 'Posgrado' => 'Posgrado', 'Doctorado' => 'Doctorado'))),
      'especialidad'                 => new sfWidgetFormTextarea(),
      'idiomas'                      => new sfWidgetFormInputText(),
      'nivel_dominio_idioma'         => new sfWidgetFormChoice(array('choices' => array('Basico' => 'Basico', 'Avanzado' => 'Avanzado'))),
      'programa_formacion_grado'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtPfg'), 'add_empty' => false)),
      'trayecto'                     => new sfWidgetFormChoice(array('choices' => array('' => '', 'I' => 'I', 'II' => 'II', 'III' => 'III', 'IV' => 'IV'))),
      'tramo'                        => new sfWidgetFormChoice(array('choices' => array('' => '', 'I' => 'I', 'II' => 'II', 'III' => 'III'))),
      'aldea'                        => new sfWidgetFormTextarea(),
      'sedes'                        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtSedes'), 'add_empty' => false)),
      'componente'                   => new sfWidgetFormInputText(),
      'jerarquia'                    => new sfWidgetFormInputText(),
      'contingente'                  => new sfWidgetFormInputText(),
      'arma_servicio'                => new sfWidgetFormTextarea(),
      'batallon_unidad_origen'       => new sfWidgetFormInputText(),
      'profesion'                    => new sfWidgetFormInputText(),
      'oficio'                       => new sfWidgetFormInputText(),
      'trabaja_si_no'                => new sfWidgetFormInputCheckbox(),
      'nombre_empresa'               => new sfWidgetFormInputText(),
      'direccion_oficina'            => new sfWidgetFormTextarea(),
      'telefono_oficina'             => new sfWidgetFormInputText(),
      'posee_vehiculo'               => new sfWidgetFormInputCheckbox(),
      'tipo_vehiculo'                => new sfWidgetFormInputText(),
      'modelo_vehiculo'              => new sfWidgetFormInputText(),
      'numero_placa'                 => new sfWidgetFormInputText(),
      'posee_licencia'               => new sfWidgetFormInputCheckbox(),
      'grado_licencia'               => new sfWidgetFormInputText(),
      'porte_armas'                  => new sfWidgetFormInputCheckbox(),
      'numero_porte_armas'           => new sfWidgetFormInputText(),
      'tipo_armamento'               => new sfWidgetFormInputText(),
      'calibre_armamento'            => new sfWidgetFormInputText(),
      'signos_particulares'          => new sfWidgetFormTextarea(),
      'talla_uniforme'               => new sfWidgetFormChoice(array('choices' => array('' => '', 'SS' => 'SS', 'SL' => 'SL', 'SR' => 'SR', 'MR' => 'MR', 'ML' => 'ML', 'LL' => 'LL', 'LM' => 'LM', 'LR' => 'LR', 'XL' => 'XL', 'XXL' => 'XXL'))),
      'talla_calzado'                => new sfWidgetFormInputText(),
      'estatura'                     => new sfWidgetFormInputText(),
      'peso'                         => new sfWidgetFormInputText(),
      'color_cabello'                => new sfWidgetFormInputText(),
      'color_piel'                   => new sfWidgetFormInputText(),
      'discapacidad'                 => new sfWidgetFormTextarea(),
      'alergias'                     => new sfWidgetFormTextarea(),
      'dominio_mano'                 => new sfWidgetFormChoice(array('choices' => array('' => '', 'Diestro' => 'Diestro', 'Siniestro' => 'Siniestro', 'Ambidiestro' => 'Ambidiestro'))),
      'practica_deporte'             => new sfWidgetFormInputCheckbox(),
      'deporte'                      => new sfWidgetFormInputText(),
      'participa_actividad_cultural' => new sfWidgetFormInputCheckbox(),
      'actividad_cultural'           => new sfWidgetFormInputText(),
      'agrupacion_social'            => new sfWidgetFormTextarea(),
      'misiones'                     => new sfWidgetFormTextarea(),
      'cooperativas'                 => new sfWidgetFormTextarea(),
      'apellidos_beneficiario'       => new sfWidgetFormInputText(),
      'nombres_beneficiario'         => new sfWidgetFormInputText(),
      'cedula_beneficiario'          => new sfWidgetFormInputText(),
      'telefono_beneficiario'        => new sfWidgetFormInputText(),
      'created_at'                   => new sfWidgetFormDateTime(),
      'updated_at'                   => new sfWidgetFormDateTime(),
      'actividad_academica_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesAcademicas')),
      'actividad_icm_list'           => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesIcm')),
    ));

    $this->setValidators(array(
      'codigo_miliciano'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('codigo_miliciano')), 'empty_value' => $this->getObject()->get('codigo_miliciano'), 'required' => false)),
      'nacionalidad'                 => new sfValidatorChoice(array('choices' => array(0 => 'V', 1 => 'E'))),
      'cedula_identidad'             => new sfValidatorInteger(),
      'primer_apellido'              => new sfValidatorString(array('max_length' => 30)),
      'segundo_apellido'             => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'primer_nombre'                => new sfValidatorString(array('max_length' => 30)),
      'segundo_nombre'               => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'sexo'                         => new sfValidatorChoice(array('choices' => array(0 => 'F', 1 => 'M'))),
      'fecha_nacimiento'             => new sfValidatorDate(),
      'estado_civil'                 => new sfValidatorChoice(array('choices' => array(0 => 'SOLTERO', 1 => 'CASADO', 2 => 'DIVORCIADO', 3 => 'VIUDO', 4 => 'CONCUBINATO'), 'required' => false)),
      'foto'                         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'grupo_sanguineo'              => new sfValidatorChoice(array('choices' => array(0 => 'O+', 1 => 'O-', 2 => 'A-', 3 => 'A+', 4 => 'B-', 5 => 'B+', 6 => 'AB-', 7 => 'AB+'))),
      'codigo_estado'                => new sfValidatorInteger(array('required' => false)),
      'codigo_municipio'             => new sfValidatorInteger(array('required' => false)),
      'codigo_parroquia'             => new sfValidatorInteger(array('required' => false)),
      'codigo_ciudad'                => new sfValidatorInteger(array('required' => false)),
      'direccion'                    => new sfValidatorString(),
      'telefono_local'               => new sfValidatorString(array('max_length' => 20)),
      'movil'                        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'correo_electronico'           => new sfValidatorString(array('required' => false)),
      'direccion_emergencia'         => new sfValidatorString(),
      'telefono_emergencia'          => new sfValidatorString(array('max_length' => 20)),
      'grado_instruccion'            => new sfValidatorChoice(array('choices' => array(0 => '', 1 => 'Basico', 2 => 'Medio', 3 => 'Diversificado', 4 => 'Universitario', 5 => 'Posgrado', 6 => 'Doctorado'))),
      'especialidad'                 => new sfValidatorString(),
      'idiomas'                      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'nivel_dominio_idioma'         => new sfValidatorChoice(array('choices' => array(0 => 'Basico', 1 => 'Avanzado'), 'required' => false)),
      'programa_formacion_grado'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtPfg'))),
      'trayecto'                     => new sfValidatorChoice(array('choices' => array(0 => '', 1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV'))),
      'tramo'                        => new sfValidatorChoice(array('choices' => array(0 => '', 1 => 'I', 2 => 'II', 3 => 'III'))),
      'aldea'                        => new sfValidatorString(array('required' => false)),
      'sedes'                        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtSedes'))),
      'componente'                   => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'jerarquia'                    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'contingente'                  => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'arma_servicio'                => new sfValidatorString(array('required' => false)),
      'batallon_unidad_origen'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'profesion'                    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'oficio'                       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'trabaja_si_no'                => new sfValidatorBoolean(array('required' => false)),
      'nombre_empresa'               => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'direccion_oficina'            => new sfValidatorString(array('required' => false)),
      'telefono_oficina'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'posee_vehiculo'               => new sfValidatorBoolean(array('required' => false)),
      'tipo_vehiculo'                => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'modelo_vehiculo'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'numero_placa'                 => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'posee_licencia'               => new sfValidatorBoolean(array('required' => false)),
      'grado_licencia'               => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'porte_armas'                  => new sfValidatorBoolean(array('required' => false)),
      'numero_porte_armas'           => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'tipo_armamento'               => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'calibre_armamento'            => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'signos_particulares'          => new sfValidatorString(array('required' => false)),
      'talla_uniforme'               => new sfValidatorChoice(array('choices' => array(0 => '', 1 => 'SS', 2 => 'SL', 3 => 'SR', 4 => 'MR', 5 => 'ML', 6 => 'LL', 7 => 'LM', 8 => 'LR', 9 => 'XL', 10 => 'XXL'))),
      'talla_calzado'                => new sfValidatorString(array('max_length' => 2)),
      'estatura'                     => new sfValidatorString(array('max_length' => 4)),
      'peso'                         => new sfValidatorNumber(),
      'color_cabello'                => new sfValidatorString(array('max_length' => 10)),
      'color_piel'                   => new sfValidatorString(array('max_length' => 20)),
      'discapacidad'                 => new sfValidatorString(array('required' => false)),
      'alergias'                     => new sfValidatorString(array('required' => false)),
      'dominio_mano'                 => new sfValidatorChoice(array('choices' => array(0 => '', 1 => 'Diestro', 2 => 'Siniestro', 3 => 'Ambidiestro'), 'required' => false)),
      'practica_deporte'             => new sfValidatorBoolean(array('required' => false)),
      'deporte'                      => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'participa_actividad_cultural' => new sfValidatorBoolean(array('required' => false)),
      'actividad_cultural'           => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'agrupacion_social'            => new sfValidatorString(array('required' => false)),
      'misiones'                     => new sfValidatorString(array('required' => false)),
      'cooperativas'                 => new sfValidatorString(array('required' => false)),
      'apellidos_beneficiario'       => new sfValidatorString(array('max_length' => 60)),
      'nombres_beneficiario'         => new sfValidatorString(array('max_length' => 60)),
      'cedula_beneficiario'          => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'telefono_beneficiario'        => new sfValidatorString(array('max_length' => 20)),
      'created_at'                   => new sfValidatorDateTime(),
      'updated_at'                   => new sfValidatorDateTime(),
      'actividad_academica_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesAcademicas', 'required' => false)),
      'actividad_icm_list'           => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesIcm', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'SrcmtMilicianos', 'column' => array('cedula_identidad')))
    );

    $this->widgetSchema->setNameFormat('srcmt_milicianos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtMilicianos';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['actividad_academica_list']))
    {
      $this->setDefault('actividad_academica_list', $this->object->actividad_academica->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['actividad_icm_list']))
    {
      $this->setDefault('actividad_icm_list', $this->object->actividad_icm->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveactividad_academicaList($con);
    $this->saveactividad_icmList($con);

    parent::doSave($con);
  }

  public function saveactividad_academicaList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['actividad_academica_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->actividad_academica->getPrimaryKeys();
    $values = $this->getValue('actividad_academica_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('actividad_academica', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('actividad_academica', array_values($link));
    }
  }

  public function saveactividad_icmList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['actividad_icm_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->actividad_icm->getPrimaryKeys();
    $values = $this->getValue('actividad_icm_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('actividad_icm', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('actividad_icm', array_values($link));
    }
  }

}
