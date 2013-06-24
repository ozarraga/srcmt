<?php

/**
 * SrcmtParroquia filter form base class.
 *
 * @package    srcmt
 * @subpackage filter
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSrcmtParroquiaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'parroquia'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'parroquia'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('srcmt_parroquia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtParroquia';
  }

  public function getFields()
  {
    return array(
      'codigo_parroquia' => 'Number',
      'parroquia'        => 'Text',
      'codigo_municipio' => 'Number',
      'codigo_estado'    => 'Number',
    );
  }
}
