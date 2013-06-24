<?php

/**
 * SrcmtPfg filter form base class.
 *
 * @package    srcmt
 * @subpackage filter
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSrcmtPfgFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pfg'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'pfg'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('srcmt_pfg_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtPfg';
  }

  public function getFields()
  {
    return array(
      'id_pfg' => 'Number',
      'pfg'    => 'Text',
    );
  }
}
