<?php

/**
 * SrcmtSedes filter form base class.
 *
 * @package    srcmt
 * @subpackage filter
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSrcmtSedesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sedes'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'direccion' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'sedes'     => new sfValidatorPass(array('required' => false)),
      'direccion' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('srcmt_sedes_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtSedes';
  }

  public function getFields()
  {
    return array(
      'id_sedes'  => 'Number',
      'sedes'     => 'Text',
      'direccion' => 'Text',
    );
  }
}
