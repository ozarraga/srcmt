<?php

/**
 * SrcmtActividadAcademicaMiliciano filter form base class.
 *
 * @package    srcmt
 * @subpackage filter
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSrcmtActividadAcademicaMilicianoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo_miliciano'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtMilicianos'), 'add_empty' => true)),
      'codigo_actividad_academica' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtActividadesAcademicas'), 'add_empty' => true)),
      'created_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'codigo_miliciano'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SrcmtMilicianos'), 'column' => 'codigo_miliciano')),
      'codigo_actividad_academica' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SrcmtActividadesAcademicas'), 'column' => 'codigo_actividad_academica')),
      'created_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('srcmt_actividad_academica_miliciano_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtActividadAcademicaMiliciano';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'codigo_miliciano'           => 'ForeignKey',
      'codigo_actividad_academica' => 'ForeignKey',
      'created_at'                 => 'Date',
      'updated_at'                 => 'Date',
    );
  }
}
