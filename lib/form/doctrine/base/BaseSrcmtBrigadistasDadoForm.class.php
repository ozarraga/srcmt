<?php

/**
 * SrcmtBrigadistasDado form base class.
 *
 * @method SrcmtBrigadistasDado getObject() Returns the current form's model object
 *
 * @package    srcmt
 * @subpackage form
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSrcmtBrigadistasDadoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo_brigadista'          => new sfWidgetFormInputHidden(),
      'nacionalidad'               => new sfWidgetFormChoice(array('choices' => array('V' => 'V', 'E' => 'E'))),
      'cedula_identidad'           => new sfWidgetFormInputText(),
      'religion'                   => new sfWidgetFormInputText(),
      'primer_apellido'            => new sfWidgetFormInputText(),
      'segundo_apellido'           => new sfWidgetFormInputText(),
      'primer_nombre'              => new sfWidgetFormInputText(),
      'segundo_nombre'             => new sfWidgetFormInputText(),
      'sexo'                       => new sfWidgetFormChoice(array('choices' => array('F' => 'F', 'M' => 'M'))),
      'fecha_nacimiento'           => new sfWidgetFormDate(),
      'lugar_de_nacimiento'        => new sfWidgetFormInputText(),
      'estado_civil'               => new sfWidgetFormChoice(array('choices' => array('SOLTERO' => 'SOLTERO', 'CASADO' => 'CASADO', 'DIVORCIADO' => 'DIVORCIADO', 'VIUDO' => 'VIUDO', 'CONCUBINATO' => 'CONCUBINATO'))),
      'foto'                       => new sfWidgetFormInputText(),
      'grupo_sanguineo'            => new sfWidgetFormChoice(array('choices' => array('O+' => 'O+', 'O-' => 'O-', 'A-' => 'A-', 'A+' => 'A+', 'B-' => 'B-', 'B+' => 'B+', 'AB-' => 'AB-', 'AB+' => 'AB+'))),
      'codigo_estado'              => new sfWidgetFormInputText(),
      'codigo_municipio'           => new sfWidgetFormInputText(),
      'codigo_parroquia'           => new sfWidgetFormInputText(),
      'codigo_ciudad'              => new sfWidgetFormInputText(),
      'direccion_domiciliaria'     => new sfWidgetFormTextarea(),
      'telefono_domicilio'         => new sfWidgetFormInputText(),
      'telefono_movil'             => new sfWidgetFormInputText(),
      'correo_electronico'         => new sfWidgetFormTextarea(),
      'direccion_emergencia'       => new sfWidgetFormTextarea(),
      'telefono_emergencia'        => new sfWidgetFormInputText(),
      'unidad_adscripcion_laboral' => new sfWidgetFormInputText(),
      'extension_interna'          => new sfWidgetFormInputText(),
      'perfil_empleado'            => new sfWidgetFormChoice(array('choices' => array('' => '', 'Directivo' => 'Directivo', 'Administrativo' => 'Administrativo', 'Docente' => 'Docente', 'Obrero' => 'Obrero'))),
      'jefe_sector'                => new sfWidgetFormInputText(),
      'grado_instruccion'          => new sfWidgetFormChoice(array('choices' => array('' => '', 'Basico' => 'Basico', 'Medio' => 'Medio', 'Diversificado' => 'Diversificado', 'Universitario' => 'Universitario', 'Posgrado' => 'Posgrado', 'Doctorado' => 'Doctorado'))),
      'especialidad'               => new sfWidgetFormTextarea(),
      'sedes'                      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtSedes'), 'add_empty' => false)),
      'jerarquia'                  => new sfWidgetFormInputText(),
      'profesion'                  => new sfWidgetFormInputText(),
      'oficio'                     => new sfWidgetFormInputText(),
      'centro_votacion_cne'        => new sfWidgetFormInputText(),
      'direccion_oficina'          => new sfWidgetFormTextarea(),
      'talla_pantalon'             => new sfWidgetFormInputText(),
      'talla_camisa'               => new sfWidgetFormInputText(),
      'talla_calzado'              => new sfWidgetFormInputText(),
      'talla_gorra'                => new sfWidgetFormInputText(),
      'estatura'                   => new sfWidgetFormInputText(),
      'peso'                       => new sfWidgetFormInputText(),
      'color_cabello'              => new sfWidgetFormInputText(),
      'color_piel'                 => new sfWidgetFormInputText(),
      'discapacidad'               => new sfWidgetFormTextarea(),
      'alergias'                   => new sfWidgetFormTextarea(),
      'dominio_mano'               => new sfWidgetFormChoice(array('choices' => array('' => '', 'Diestro' => 'Diestro', 'Siniestro' => 'Siniestro', 'Ambidiestro' => 'Ambidiestro'))),
      'deporte'                    => new sfWidgetFormInputText(),
      'actividades_culturales'     => new sfWidgetFormInputText(),
      'apellidos_beneficiario'     => new sfWidgetFormInputText(),
      'nombres_beneficiario'       => new sfWidgetFormInputText(),
      'cedula_beneficiario'        => new sfWidgetFormInputText(),
      'telefono_beneficiario'      => new sfWidgetFormInputText(),
      'created_at'                 => new sfWidgetFormDateTime(),
      'updated_at'                 => new sfWidgetFormDateTime(),
      'actividad_academica_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesAcademicas')),
      'actividad_icm_list'         => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesIcm')),
    ));

    $this->setValidators(array(
      'codigo_brigadista'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('codigo_brigadista')), 'empty_value' => $this->getObject()->get('codigo_brigadista'), 'required' => false)),
      'nacionalidad'               => new sfValidatorChoice(array('choices' => array(0 => 'V', 1 => 'E'))),
      'cedula_identidad'           => new sfValidatorInteger(),
      'religion'                   => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'primer_apellido'            => new sfValidatorString(array('max_length' => 30)),
      'segundo_apellido'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'primer_nombre'              => new sfValidatorString(array('max_length' => 30)),
      'segundo_nombre'             => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'sexo'                       => new sfValidatorChoice(array('choices' => array(0 => 'F', 1 => 'M'))),
      'fecha_nacimiento'           => new sfValidatorDate(),
      'lugar_de_nacimiento'        => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'estado_civil'               => new sfValidatorChoice(array('choices' => array(0 => 'SOLTERO', 1 => 'CASADO', 2 => 'DIVORCIADO', 3 => 'VIUDO', 4 => 'CONCUBINATO'), 'required' => false)),
      'foto'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'grupo_sanguineo'            => new sfValidatorChoice(array('choices' => array(0 => 'O+', 1 => 'O-', 2 => 'A-', 3 => 'A+', 4 => 'B-', 5 => 'B+', 6 => 'AB-', 7 => 'AB+'))),
      'codigo_estado'              => new sfValidatorInteger(array('required' => false)),
      'codigo_municipio'           => new sfValidatorInteger(array('required' => false)),
      'codigo_parroquia'           => new sfValidatorInteger(array('required' => false)),
      'codigo_ciudad'              => new sfValidatorInteger(array('required' => false)),
      'direccion_domiciliaria'     => new sfValidatorString(),
      'telefono_domicilio'         => new sfValidatorString(array('max_length' => 20)),
      'telefono_movil'             => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'correo_electronico'         => new sfValidatorString(array('required' => false)),
      'direccion_emergencia'       => new sfValidatorString(),
      'telefono_emergencia'        => new sfValidatorString(array('max_length' => 20)),
      'unidad_adscripcion_laboral' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'extension_interna'          => new sfValidatorString(array('max_length' => 6, 'required' => false)),
      'perfil_empleado'            => new sfValidatorChoice(array('choices' => array(0 => '', 1 => 'Directivo', 2 => 'Administrativo', 3 => 'Docente', 4 => 'Obrero'), 'required' => false)),
      'jefe_sector'                => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'grado_instruccion'          => new sfValidatorChoice(array('choices' => array(0 => '', 1 => 'Basico', 2 => 'Medio', 3 => 'Diversificado', 4 => 'Universitario', 5 => 'Posgrado', 6 => 'Doctorado'))),
      'especialidad'               => new sfValidatorString(),
      'sedes'                      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtSedes'))),
      'jerarquia'                  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'profesion'                  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'oficio'                     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'centro_votacion_cne'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'direccion_oficina'          => new sfValidatorString(array('required' => false)),
      'talla_pantalon'             => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'talla_camisa'               => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'talla_calzado'              => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'talla_gorra'                => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'estatura'                   => new sfValidatorString(array('max_length' => 4, 'required' => false)),
      'peso'                       => new sfValidatorNumber(),
      'color_cabello'              => new sfValidatorString(array('max_length' => 10)),
      'color_piel'                 => new sfValidatorString(array('max_length' => 20)),
      'discapacidad'               => new sfValidatorString(array('required' => false)),
      'alergias'                   => new sfValidatorString(array('required' => false)),
      'dominio_mano'               => new sfValidatorChoice(array('choices' => array(0 => '', 1 => 'Diestro', 2 => 'Siniestro', 3 => 'Ambidiestro'), 'required' => false)),
      'deporte'                    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'actividades_culturales'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'apellidos_beneficiario'     => new sfValidatorString(array('max_length' => 60)),
      'nombres_beneficiario'       => new sfValidatorString(array('max_length' => 60)),
      'cedula_beneficiario'        => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'telefono_beneficiario'      => new sfValidatorString(array('max_length' => 20)),
      'created_at'                 => new sfValidatorDateTime(),
      'updated_at'                 => new sfValidatorDateTime(),
      'actividad_academica_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesAcademicas', 'required' => false)),
      'actividad_icm_list'         => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesIcm', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'SrcmtBrigadistasDado', 'column' => array('cedula_identidad')))
    );

    $this->widgetSchema->setNameFormat('srcmt_brigadistas_dado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtBrigadistasDado';
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
