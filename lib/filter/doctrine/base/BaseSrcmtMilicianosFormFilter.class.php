<?php

/**
 * SrcmtMilicianos filter form base class.
 *
 * @package    srcmt
 * @subpackage filter
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSrcmtMilicianosFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nacionalidad'                 => new sfWidgetFormChoice(array('choices' => array('' => '', 'V' => 'V', 'E' => 'E'))),
      'cedula_identidad'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'primer_apellido'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'segundo_apellido'             => new sfWidgetFormFilterInput(),
      'primer_nombre'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'segundo_nombre'               => new sfWidgetFormFilterInput(),
      'sexo'                         => new sfWidgetFormChoice(array('choices' => array('' => '', 'F' => 'F', 'M' => 'M'))),
      'fecha_nacimiento'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'estado_civil'                 => new sfWidgetFormChoice(array('choices' => array('' => '', 'SOLTERO' => 'SOLTERO', 'CASADO' => 'CASADO', 'DIVORCIADO' => 'DIVORCIADO', 'VIUDO' => 'VIUDO', 'CONCUBINATO' => 'CONCUBINATO'))),
      'foto'                         => new sfWidgetFormFilterInput(),
      'grupo_sanguineo'              => new sfWidgetFormChoice(array('choices' => array('' => '', 'O+' => 'O+', 'O-' => 'O-', 'A-' => 'A-', 'A+' => 'A+', 'B-' => 'B-', 'B+' => 'B+', 'AB-' => 'AB-', 'AB+' => 'AB+'))),
      'codigo_estado'                => new sfWidgetFormFilterInput(),
      'codigo_municipio'             => new sfWidgetFormFilterInput(),
      'codigo_parroquia'             => new sfWidgetFormFilterInput(),
      'codigo_ciudad'                => new sfWidgetFormFilterInput(),
      'direccion'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono_local'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'movil'                        => new sfWidgetFormFilterInput(),
      'correo_electronico'           => new sfWidgetFormFilterInput(),
      'direccion_emergencia'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono_emergencia'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'grado_instruccion'            => new sfWidgetFormChoice(array('choices' => array('' => '', 'Basico' => 'Basico', 'Medio' => 'Medio', 'Diversificado' => 'Diversificado', 'Universitario' => 'Universitario', 'Posgrado' => 'Posgrado', 'Doctorado' => 'Doctorado'))),
      'especialidad'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'idiomas'                      => new sfWidgetFormFilterInput(),
      'nivel_dominio_idioma'         => new sfWidgetFormChoice(array('choices' => array('' => '', 'Basico' => 'Basico', 'Avanzado' => 'Avanzado'))),
      'programa_formacion_grado'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtPfg'), 'add_empty' => true)),
      'trayecto'                     => new sfWidgetFormChoice(array('choices' => array('' => '', 'I' => 'I', 'II' => 'II', 'III' => 'III', 'IV' => 'IV'))),
      'tramo'                        => new sfWidgetFormChoice(array('choices' => array('' => '', 'I' => 'I', 'II' => 'II', 'III' => 'III'))),
      'aldea'                        => new sfWidgetFormFilterInput(),
      'sedes'                        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtSedes'), 'add_empty' => true)),
      'componente'                   => new sfWidgetFormFilterInput(),
      'jerarquia'                    => new sfWidgetFormFilterInput(),
      'contingente'                  => new sfWidgetFormFilterInput(),
      'arma_servicio'                => new sfWidgetFormFilterInput(),
      'batallon_unidad_origen'       => new sfWidgetFormFilterInput(),
      'profesion'                    => new sfWidgetFormFilterInput(),
      'oficio'                       => new sfWidgetFormFilterInput(),
      'trabaja_si_no'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'nombre_empresa'               => new sfWidgetFormFilterInput(),
      'direccion_oficina'            => new sfWidgetFormFilterInput(),
      'telefono_oficina'             => new sfWidgetFormFilterInput(),
      'posee_vehiculo'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'tipo_vehiculo'                => new sfWidgetFormFilterInput(),
      'modelo_vehiculo'              => new sfWidgetFormFilterInput(),
      'numero_placa'                 => new sfWidgetFormFilterInput(),
      'posee_licencia'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'grado_licencia'               => new sfWidgetFormFilterInput(),
      'porte_armas'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'numero_porte_armas'           => new sfWidgetFormFilterInput(),
      'tipo_armamento'               => new sfWidgetFormFilterInput(),
      'calibre_armamento'            => new sfWidgetFormFilterInput(),
      'signos_particulares'          => new sfWidgetFormFilterInput(),
      'talla_uniforme'               => new sfWidgetFormChoice(array('choices' => array('' => '', 'SS' => 'SS', 'SL' => 'SL', 'SR' => 'SR', 'MR' => 'MR', 'ML' => 'ML', 'LL' => 'LL', 'LM' => 'LM', 'LR' => 'LR', 'XL' => 'XL', 'XXL' => 'XXL'))),
      'talla_calzado'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estatura'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'peso'                         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'color_cabello'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'color_piel'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'discapacidad'                 => new sfWidgetFormFilterInput(),
      'alergias'                     => new sfWidgetFormFilterInput(),
      'dominio_mano'                 => new sfWidgetFormChoice(array('choices' => array('' => '', 'Diestro' => 'Diestro', 'Siniestro' => 'Siniestro', 'Ambidiestro' => 'Ambidiestro'))),
      'practica_deporte'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'deporte'                      => new sfWidgetFormFilterInput(),
      'participa_actividad_cultural' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'actividad_cultural'           => new sfWidgetFormFilterInput(),
      'agrupacion_social'            => new sfWidgetFormFilterInput(),
      'misiones'                     => new sfWidgetFormFilterInput(),
      'cooperativas'                 => new sfWidgetFormFilterInput(),
      'apellidos_beneficiario'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombres_beneficiario'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cedula_beneficiario'          => new sfWidgetFormFilterInput(),
      'telefono_beneficiario'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'actividad_academica_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesAcademicas')),
      'actividad_icm_list'           => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesIcm')),
    ));

    $this->setValidators(array(
      'nacionalidad'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('V' => 'V', 'E' => 'E'))),
      'cedula_identidad'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'primer_apellido'              => new sfValidatorPass(array('required' => false)),
      'segundo_apellido'             => new sfValidatorPass(array('required' => false)),
      'primer_nombre'                => new sfValidatorPass(array('required' => false)),
      'segundo_nombre'               => new sfValidatorPass(array('required' => false)),
      'sexo'                         => new sfValidatorChoice(array('required' => false, 'choices' => array('F' => 'F', 'M' => 'M'))),
      'fecha_nacimiento'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'estado_civil'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('SOLTERO' => 'SOLTERO', 'CASADO' => 'CASADO', 'DIVORCIADO' => 'DIVORCIADO', 'VIUDO' => 'VIUDO', 'CONCUBINATO' => 'CONCUBINATO'))),
      'foto'                         => new sfValidatorPass(array('required' => false)),
      'grupo_sanguineo'              => new sfValidatorChoice(array('required' => false, 'choices' => array('O+' => 'O+', 'O-' => 'O-', 'A-' => 'A-', 'A+' => 'A+', 'B-' => 'B-', 'B+' => 'B+', 'AB-' => 'AB-', 'AB+' => 'AB+'))),
      'codigo_estado'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'codigo_municipio'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'codigo_parroquia'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'codigo_ciudad'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'direccion'                    => new sfValidatorPass(array('required' => false)),
      'telefono_local'               => new sfValidatorPass(array('required' => false)),
      'movil'                        => new sfValidatorPass(array('required' => false)),
      'correo_electronico'           => new sfValidatorPass(array('required' => false)),
      'direccion_emergencia'         => new sfValidatorPass(array('required' => false)),
      'telefono_emergencia'          => new sfValidatorPass(array('required' => false)),
      'grado_instruccion'            => new sfValidatorChoice(array('required' => false, 'choices' => array('' => '', 'Basico' => 'Basico', 'Medio' => 'Medio', 'Diversificado' => 'Diversificado', 'Universitario' => 'Universitario', 'Posgrado' => 'Posgrado', 'Doctorado' => 'Doctorado'))),
      'especialidad'                 => new sfValidatorPass(array('required' => false)),
      'idiomas'                      => new sfValidatorPass(array('required' => false)),
      'nivel_dominio_idioma'         => new sfValidatorChoice(array('required' => false, 'choices' => array('Basico' => 'Basico', 'Avanzado' => 'Avanzado'))),
      'programa_formacion_grado'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SrcmtPfg'), 'column' => 'id_pfg')),
      'trayecto'                     => new sfValidatorChoice(array('required' => false, 'choices' => array('' => '', 'I' => 'I', 'II' => 'II', 'III' => 'III', 'IV' => 'IV'))),
      'tramo'                        => new sfValidatorChoice(array('required' => false, 'choices' => array('' => '', 'I' => 'I', 'II' => 'II', 'III' => 'III'))),
      'aldea'                        => new sfValidatorPass(array('required' => false)),
      'sedes'                        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SrcmtSedes'), 'column' => 'id_sedes')),
      'componente'                   => new sfValidatorPass(array('required' => false)),
      'jerarquia'                    => new sfValidatorPass(array('required' => false)),
      'contingente'                  => new sfValidatorPass(array('required' => false)),
      'arma_servicio'                => new sfValidatorPass(array('required' => false)),
      'batallon_unidad_origen'       => new sfValidatorPass(array('required' => false)),
      'profesion'                    => new sfValidatorPass(array('required' => false)),
      'oficio'                       => new sfValidatorPass(array('required' => false)),
      'trabaja_si_no'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'nombre_empresa'               => new sfValidatorPass(array('required' => false)),
      'direccion_oficina'            => new sfValidatorPass(array('required' => false)),
      'telefono_oficina'             => new sfValidatorPass(array('required' => false)),
      'posee_vehiculo'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'tipo_vehiculo'                => new sfValidatorPass(array('required' => false)),
      'modelo_vehiculo'              => new sfValidatorPass(array('required' => false)),
      'numero_placa'                 => new sfValidatorPass(array('required' => false)),
      'posee_licencia'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'grado_licencia'               => new sfValidatorPass(array('required' => false)),
      'porte_armas'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'numero_porte_armas'           => new sfValidatorPass(array('required' => false)),
      'tipo_armamento'               => new sfValidatorPass(array('required' => false)),
      'calibre_armamento'            => new sfValidatorPass(array('required' => false)),
      'signos_particulares'          => new sfValidatorPass(array('required' => false)),
      'talla_uniforme'               => new sfValidatorChoice(array('required' => false, 'choices' => array('' => '', 'SS' => 'SS', 'SL' => 'SL', 'SR' => 'SR', 'MR' => 'MR', 'ML' => 'ML', 'LL' => 'LL', 'LM' => 'LM', 'LR' => 'LR', 'XL' => 'XL', 'XXL' => 'XXL'))),
      'talla_calzado'                => new sfValidatorPass(array('required' => false)),
      'estatura'                     => new sfValidatorPass(array('required' => false)),
      'peso'                         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'color_cabello'                => new sfValidatorPass(array('required' => false)),
      'color_piel'                   => new sfValidatorPass(array('required' => false)),
      'discapacidad'                 => new sfValidatorPass(array('required' => false)),
      'alergias'                     => new sfValidatorPass(array('required' => false)),
      'dominio_mano'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('' => '', 'Diestro' => 'Diestro', 'Siniestro' => 'Siniestro', 'Ambidiestro' => 'Ambidiestro'))),
      'practica_deporte'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'deporte'                      => new sfValidatorPass(array('required' => false)),
      'participa_actividad_cultural' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'actividad_cultural'           => new sfValidatorPass(array('required' => false)),
      'agrupacion_social'            => new sfValidatorPass(array('required' => false)),
      'misiones'                     => new sfValidatorPass(array('required' => false)),
      'cooperativas'                 => new sfValidatorPass(array('required' => false)),
      'apellidos_beneficiario'       => new sfValidatorPass(array('required' => false)),
      'nombres_beneficiario'         => new sfValidatorPass(array('required' => false)),
      'cedula_beneficiario'          => new sfValidatorPass(array('required' => false)),
      'telefono_beneficiario'        => new sfValidatorPass(array('required' => false)),
      'created_at'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'actividad_academica_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesAcademicas', 'required' => false)),
      'actividad_icm_list'           => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtActividadesIcm', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('srcmt_milicianos_filters[%s]');

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
      ->leftJoin($query->getRootAlias().'.SrcmtActividadAcademicaMiliciano SrcmtActividadAcademicaMiliciano')
      ->andWhereIn('SrcmtActividadAcademicaMiliciano.codigo_actividad_academica', $values)
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
      ->leftJoin($query->getRootAlias().'.SrcmtActividadIcmMiliciano SrcmtActividadIcmMiliciano')
      ->andWhereIn('SrcmtActividadIcmMiliciano.codigo_actividad', $values)
    ;
  }

  public function getModelName()
  {
    return 'SrcmtMilicianos';
  }

  public function getFields()
  {
    return array(
      'codigo_miliciano'             => 'Number',
      'nacionalidad'                 => 'Enum',
      'cedula_identidad'             => 'Number',
      'primer_apellido'              => 'Text',
      'segundo_apellido'             => 'Text',
      'primer_nombre'                => 'Text',
      'segundo_nombre'               => 'Text',
      'sexo'                         => 'Enum',
      'fecha_nacimiento'             => 'Date',
      'estado_civil'                 => 'Enum',
      'foto'                         => 'Text',
      'grupo_sanguineo'              => 'Enum',
      'codigo_estado'                => 'Number',
      'codigo_municipio'             => 'Number',
      'codigo_parroquia'             => 'Number',
      'codigo_ciudad'                => 'Number',
      'direccion'                    => 'Text',
      'telefono_local'               => 'Text',
      'movil'                        => 'Text',
      'correo_electronico'           => 'Text',
      'direccion_emergencia'         => 'Text',
      'telefono_emergencia'          => 'Text',
      'grado_instruccion'            => 'Enum',
      'especialidad'                 => 'Text',
      'idiomas'                      => 'Text',
      'nivel_dominio_idioma'         => 'Enum',
      'programa_formacion_grado'     => 'ForeignKey',
      'trayecto'                     => 'Enum',
      'tramo'                        => 'Enum',
      'aldea'                        => 'Text',
      'sedes'                        => 'ForeignKey',
      'componente'                   => 'Text',
      'jerarquia'                    => 'Text',
      'contingente'                  => 'Text',
      'arma_servicio'                => 'Text',
      'batallon_unidad_origen'       => 'Text',
      'profesion'                    => 'Text',
      'oficio'                       => 'Text',
      'trabaja_si_no'                => 'Boolean',
      'nombre_empresa'               => 'Text',
      'direccion_oficina'            => 'Text',
      'telefono_oficina'             => 'Text',
      'posee_vehiculo'               => 'Boolean',
      'tipo_vehiculo'                => 'Text',
      'modelo_vehiculo'              => 'Text',
      'numero_placa'                 => 'Text',
      'posee_licencia'               => 'Boolean',
      'grado_licencia'               => 'Text',
      'porte_armas'                  => 'Boolean',
      'numero_porte_armas'           => 'Text',
      'tipo_armamento'               => 'Text',
      'calibre_armamento'            => 'Text',
      'signos_particulares'          => 'Text',
      'talla_uniforme'               => 'Enum',
      'talla_calzado'                => 'Text',
      'estatura'                     => 'Text',
      'peso'                         => 'Number',
      'color_cabello'                => 'Text',
      'color_piel'                   => 'Text',
      'discapacidad'                 => 'Text',
      'alergias'                     => 'Text',
      'dominio_mano'                 => 'Enum',
      'practica_deporte'             => 'Boolean',
      'deporte'                      => 'Text',
      'participa_actividad_cultural' => 'Boolean',
      'actividad_cultural'           => 'Text',
      'agrupacion_social'            => 'Text',
      'misiones'                     => 'Text',
      'cooperativas'                 => 'Text',
      'apellidos_beneficiario'       => 'Text',
      'nombres_beneficiario'         => 'Text',
      'cedula_beneficiario'          => 'Text',
      'telefono_beneficiario'        => 'Text',
      'created_at'                   => 'Date',
      'updated_at'                   => 'Date',
      'actividad_academica_list'     => 'ManyKey',
      'actividad_icm_list'           => 'ManyKey',
    );
  }
}
