<?php

/**
 * SrcmtBrigadistasDado filter form base class.
 *
 * @package    srcmt
 * @subpackage filter
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSrcmtBrigadistasDadoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nacionalidad'               => new sfWidgetFormChoice(array('choices' => array('' => '', 'V' => 'V', 'E' => 'E'))),
      'cedula_identidad'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'religion'                   => new sfWidgetFormFilterInput(),
      'primer_apellido'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'segundo_apellido'           => new sfWidgetFormFilterInput(),
      'primer_nombre'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'segundo_nombre'             => new sfWidgetFormFilterInput(),
      'sexo'                       => new sfWidgetFormChoice(array('choices' => array('' => '', 'F' => 'F', 'M' => 'M'))),
      'fecha_nacimiento'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'lugar_de_nacimiento'        => new sfWidgetFormFilterInput(),
      'estado_civil'               => new sfWidgetFormChoice(array('choices' => array('' => '', 'SOLTERO' => 'SOLTERO', 'CASADO' => 'CASADO', 'DIVORCIADO' => 'DIVORCIADO', 'VIUDO' => 'VIUDO', 'CONCUBINATO' => 'CONCUBINATO'))),
      'foto'                       => new sfWidgetFormFilterInput(),
      'grupo_sanguineo'            => new sfWidgetFormChoice(array('choices' => array('' => '', 'O+' => 'O+', 'O-' => 'O-', 'A-' => 'A-', 'A+' => 'A+', 'B-' => 'B-', 'B+' => 'B+', 'AB-' => 'AB-', 'AB+' => 'AB+'))),
      'codigo_estado'              => new sfWidgetFormFilterInput(),
      'codigo_municipio'           => new sfWidgetFormFilterInput(),
      'codigo_parroquia'           => new sfWidgetFormFilterInput(),
      'codigo_ciudad'              => new sfWidgetFormFilterInput(),
      'direccion_domiciliaria'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono_domicilio'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono_movil'             => new sfWidgetFormFilterInput(),
      'correo_electronico'         => new sfWidgetFormFilterInput(),
      'direccion_emergencia'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono_emergencia'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'unidad_adscripcion_laboral' => new sfWidgetFormFilterInput(),
      'extension_interna'          => new sfWidgetFormFilterInput(),
      'perfil_empleado'            => new sfWidgetFormChoice(array('choices' => array('' => '', 'Directivo' => 'Directivo', 'Administrativo' => 'Administrativo', 'Docente' => 'Docente', 'Obrero' => 'Obrero'))),
      'jefe_sector'                => new sfWidgetFormFilterInput(),
      'grado_instruccion'          => new sfWidgetFormChoice(array('choices' => array('' => '', 'Basico' => 'Basico', 'Medio' => 'Medio', 'Diversificado' => 'Diversificado', 'Universitario' => 'Universitario', 'Posgrado' => 'Posgrado', 'Doctorado' => 'Doctorado'))),
      'especialidad'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sedes'                      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtSedes'), 'add_empty' => true)),
      'jerarquia'                  => new sfWidgetFormFilterInput(),
      'profesion'                  => new sfWidgetFormFilterInput(),
      'oficio'                     => new sfWidgetFormFilterInput(),
      'centro_votacion_cne'        => new sfWidgetFormFilterInput(),
      'direccion_oficina'          => new sfWidgetFormFilterInput(),
      'talla_pantalon'             => new sfWidgetFormFilterInput(),
      'talla_camisa'               => new sfWidgetFormFilterInput(),
      'talla_calzado'              => new sfWidgetFormFilterInput(),
      'talla_gorra'                => new sfWidgetFormFilterInput(),
      'estatura'                   => new sfWidgetFormFilterInput(),
      'peso'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'color_cabello'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'color_piel'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'discapacidad'               => new sfWidgetFormFilterInput(),
      'alergias'                   => new sfWidgetFormFilterInput(),
      'dominio_mano'               => new sfWidgetFormChoice(array('choices' => array('' => '', 'Diestro' => 'Diestro', 'Siniestro' => 'Siniestro', 'Ambidiestro' => 'Ambidiestro'))),
      'deporte'                    => new sfWidgetFormFilterInput(),
      'actividades_culturales'     => new sfWidgetFormFilterInput(),
      'apellidos_beneficiario'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombres_beneficiario'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cedula_beneficiario'        => new sfWidgetFormFilterInput(),
      'telefono_beneficiario'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'actividad_academica_list'   => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesAcademicas')),
      'actividad_icm_list'         => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesIcm')),
    ));

    $this->setValidators(array(
      'nacionalidad'               => new sfValidatorChoice(array('required' => false, 'choices' => array('V' => 'V', 'E' => 'E'))),
      'cedula_identidad'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'religion'                   => new sfValidatorPass(array('required' => false)),
      'primer_apellido'            => new sfValidatorPass(array('required' => false)),
      'segundo_apellido'           => new sfValidatorPass(array('required' => false)),
      'primer_nombre'              => new sfValidatorPass(array('required' => false)),
      'segundo_nombre'             => new sfValidatorPass(array('required' => false)),
      'sexo'                       => new sfValidatorChoice(array('required' => false, 'choices' => array('F' => 'F', 'M' => 'M'))),
      'fecha_nacimiento'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'lugar_de_nacimiento'        => new sfValidatorPass(array('required' => false)),
      'estado_civil'               => new sfValidatorChoice(array('required' => false, 'choices' => array('SOLTERO' => 'SOLTERO', 'CASADO' => 'CASADO', 'DIVORCIADO' => 'DIVORCIADO', 'VIUDO' => 'VIUDO', 'CONCUBINATO' => 'CONCUBINATO'))),
      'foto'                       => new sfValidatorPass(array('required' => false)),
      'grupo_sanguineo'            => new sfValidatorChoice(array('required' => false, 'choices' => array('O+' => 'O+', 'O-' => 'O-', 'A-' => 'A-', 'A+' => 'A+', 'B-' => 'B-', 'B+' => 'B+', 'AB-' => 'AB-', 'AB+' => 'AB+'))),
      'codigo_estado'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'codigo_municipio'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'codigo_parroquia'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'codigo_ciudad'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'direccion_domiciliaria'     => new sfValidatorPass(array('required' => false)),
      'telefono_domicilio'         => new sfValidatorPass(array('required' => false)),
      'telefono_movil'             => new sfValidatorPass(array('required' => false)),
      'correo_electronico'         => new sfValidatorPass(array('required' => false)),
      'direccion_emergencia'       => new sfValidatorPass(array('required' => false)),
      'telefono_emergencia'        => new sfValidatorPass(array('required' => false)),
      'unidad_adscripcion_laboral' => new sfValidatorPass(array('required' => false)),
      'extension_interna'          => new sfValidatorPass(array('required' => false)),
      'perfil_empleado'            => new sfValidatorChoice(array('required' => false, 'choices' => array('' => '', 'Directivo' => 'Directivo', 'Administrativo' => 'Administrativo', 'Docente' => 'Docente', 'Obrero' => 'Obrero'))),
      'jefe_sector'                => new sfValidatorPass(array('required' => false)),
      'grado_instruccion'          => new sfValidatorChoice(array('required' => false, 'choices' => array('' => '', 'Basico' => 'Basico', 'Medio' => 'Medio', 'Diversificado' => 'Diversificado', 'Universitario' => 'Universitario', 'Posgrado' => 'Posgrado', 'Doctorado' => 'Doctorado'))),
      'especialidad'               => new sfValidatorPass(array('required' => false)),
      'sedes'                      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SrcmtSedes'), 'column' => 'id_sedes')),
      'jerarquia'                  => new sfValidatorPass(array('required' => false)),
      'profesion'                  => new sfValidatorPass(array('required' => false)),
      'oficio'                     => new sfValidatorPass(array('required' => false)),
      'centro_votacion_cne'        => new sfValidatorPass(array('required' => false)),
      'direccion_oficina'          => new sfValidatorPass(array('required' => false)),
      'talla_pantalon'             => new sfValidatorPass(array('required' => false)),
      'talla_camisa'               => new sfValidatorPass(array('required' => false)),
      'talla_calzado'              => new sfValidatorPass(array('required' => false)),
      'talla_gorra'                => new sfValidatorPass(array('required' => false)),
      'estatura'                   => new sfValidatorPass(array('required' => false)),
      'peso'                       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'color_cabello'              => new sfValidatorPass(array('required' => false)),
      'color_piel'                 => new sfValidatorPass(array('required' => false)),
      'discapacidad'               => new sfValidatorPass(array('required' => false)),
      'alergias'                   => new sfValidatorPass(array('required' => false)),
      'dominio_mano'               => new sfValidatorChoice(array('required' => false, 'choices' => array('' => '', 'Diestro' => 'Diestro', 'Siniestro' => 'Siniestro', 'Ambidiestro' => 'Ambidiestro'))),
      'deporte'                    => new sfValidatorPass(array('required' => false)),
      'actividades_culturales'     => new sfValidatorPass(array('required' => false)),
      'apellidos_beneficiario'     => new sfValidatorPass(array('required' => false)),
      'nombres_beneficiario'       => new sfValidatorPass(array('required' => false)),
      'cedula_beneficiario'        => new sfValidatorPass(array('required' => false)),
      'telefono_beneficiario'      => new sfValidatorPass(array('required' => false)),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'actividad_academica_list'   => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesAcademicas', 'required' => false)),
      'actividad_icm_list'         => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesIcm', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('srcmt_brigadistas_dado_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addActividadAcademicaListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.SrcmtActividadAcademicaBrigadistaDado SrcmtActividadAcademicaBrigadistaDado')
      ->andWhereIn('SrcmtActividadAcademicaBrigadistaDado.codigo_actividad_academica', $values)
    ;
  }

  public function addActividadIcmListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.SrcmtActividadIcmBrigadistaDado SrcmtActividadIcmBrigadistaDado')
      ->andWhereIn('SrcmtActividadIcmBrigadistaDado.codigo_actividad', $values)
    ;
  }

  public function getModelName()
  {
    return 'SrcmtBrigadistasDado';
  }

  public function getFields()
  {
    return array(
      'codigo_brigadista'          => 'Number',
      'nacionalidad'               => 'Enum',
      'cedula_identidad'           => 'Number',
      'religion'                   => 'Text',
      'primer_apellido'            => 'Text',
      'segundo_apellido'           => 'Text',
      'primer_nombre'              => 'Text',
      'segundo_nombre'             => 'Text',
      'sexo'                       => 'Enum',
      'fecha_nacimiento'           => 'Date',
      'lugar_de_nacimiento'        => 'Text',
      'estado_civil'               => 'Enum',
      'foto'                       => 'Text',
      'grupo_sanguineo'            => 'Enum',
      'codigo_estado'              => 'Number',
      'codigo_municipio'           => 'Number',
      'codigo_parroquia'           => 'Number',
      'codigo_ciudad'              => 'Number',
      'direccion_domiciliaria'     => 'Text',
      'telefono_domicilio'         => 'Text',
      'telefono_movil'             => 'Text',
      'correo_electronico'         => 'Text',
      'direccion_emergencia'       => 'Text',
      'telefono_emergencia'        => 'Text',
      'unidad_adscripcion_laboral' => 'Text',
      'extension_interna'          => 'Text',
      'perfil_empleado'            => 'Enum',
      'jefe_sector'                => 'Text',
      'grado_instruccion'          => 'Enum',
      'especialidad'               => 'Text',
      'sedes'                      => 'ForeignKey',
      'jerarquia'                  => 'Text',
      'profesion'                  => 'Text',
      'oficio'                     => 'Text',
      'centro_votacion_cne'        => 'Text',
      'direccion_oficina'          => 'Text',
      'talla_pantalon'             => 'Text',
      'talla_camisa'               => 'Text',
      'talla_calzado'              => 'Text',
      'talla_gorra'                => 'Text',
      'estatura'                   => 'Text',
      'peso'                       => 'Number',
      'color_cabello'              => 'Text',
      'color_piel'                 => 'Text',
      'discapacidad'               => 'Text',
      'alergias'                   => 'Text',
      'dominio_mano'               => 'Enum',
      'deporte'                    => 'Text',
      'actividades_culturales'     => 'Text',
      'apellidos_beneficiario'     => 'Text',
      'nombres_beneficiario'       => 'Text',
      'cedula_beneficiario'        => 'Text',
      'telefono_beneficiario'      => 'Text',
      'created_at'                 => 'Date',
      'updated_at'                 => 'Date',
      'actividad_academica_list'   => 'ManyKey',
      'actividad_icm_list'         => 'ManyKey',
    );
  }
}
