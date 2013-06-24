<?php

/**
 * SrcmtActividadesIcm filter form base class.
 *
 * @package    srcmt
 * @subpackage filter
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSrcmtActividadesIcmFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo_tipo_actividad' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtTipoActividad'), 'add_empty' => true)),
      'actividad'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'responsable'           => new sfWidgetFormFilterInput(),
      'fecha'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'lugar'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'duracion'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion'           => new sfWidgetFormFilterInput(),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'milicianos_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtMilicianos')),
      'brigadistas_dado_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtBrigadistasDado')),
    ));

    $this->setValidators(array(
      'codigo_tipo_actividad' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SrcmtTipoActividad'), 'column' => 'codigo_tipo_actividad')),
      'actividad'             => new sfValidatorPass(array('required' => false)),
      'responsable'           => new sfValidatorPass(array('required' => false)),
      'fecha'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'lugar'                 => new sfValidatorPass(array('required' => false)),
      'duracion'              => new sfValidatorPass(array('required' => false)),
      'descripcion'           => new sfValidatorPass(array('required' => false)),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'milicianos_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtMilicianos', 'required' => false)),
      'brigadistas_dado_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtBrigadistasDado', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('srcmt_actividades_icm_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addMilicianosListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('SrcmtActividadIcmMiliciano.codigo_miliciano', $values)
    ;
  }

  public function addBrigadistasDadoListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('SrcmtActividadIcmBrigadistaDado.codigo_brigadista', $values)
    ;
  }

  public function getModelName()
  {
    return 'SrcmtActividadesIcm';
  }

  public function getFields()
  {
    return array(
      'codigo_actividad_icm'  => 'Number',
      'codigo_tipo_actividad' => 'ForeignKey',
      'actividad'             => 'Text',
      'responsable'           => 'Text',
      'fecha'                 => 'Date',
      'lugar'                 => 'Text',
      'duracion'              => 'Text',
      'descripcion'           => 'Text',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'milicianos_list'       => 'ManyKey',
      'brigadistas_dado_list' => 'ManyKey',
    );
  }
}
