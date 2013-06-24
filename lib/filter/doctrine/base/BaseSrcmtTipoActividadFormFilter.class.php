<?php

/**
 * SrcmtTipoActividad filter form base class.
 *
 * @package    srcmt
 * @subpackage filter
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSrcmtTipoActividadFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo_actividad'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'tipo_actividad'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('srcmt_tipo_actividad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtTipoActividad';
  }

  public function getFields()
  {
    return array(
      'codigo_tipo_actividad' => 'Number',
      'tipo_actividad'        => 'Text',
    );
  }
}
