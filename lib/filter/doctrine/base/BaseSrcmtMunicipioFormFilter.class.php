<?php

/**
 * SrcmtMunicipio filter form base class.
 *
 * @package    srcmt
 * @subpackage filter
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSrcmtMunicipioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'municipio'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'municipio'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('srcmt_municipio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtMunicipio';
  }

  public function getFields()
  {
    return array(
      'codigo_municipio' => 'Number',
      'codigo_estado'    => 'Number',
      'municipio'        => 'Text',
    );
  }
}
