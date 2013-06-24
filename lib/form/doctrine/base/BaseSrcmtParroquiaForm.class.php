<?php

/**
 * SrcmtParroquia form base class.
 *
 * @method SrcmtParroquia getObject() Returns the current form's model object
 *
 * @package    srcmt
 * @subpackage form
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSrcmtParroquiaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo_parroquia' => new sfWidgetFormInputHidden(),
      'parroquia'        => new sfWidgetFormTextarea(),
      'codigo_municipio' => new sfWidgetFormInputHidden(),
      'codigo_estado'    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'codigo_parroquia' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('codigo_parroquia')), 'empty_value' => $this->getObject()->get('codigo_parroquia'), 'required' => false)),
      'parroquia'        => new sfValidatorString(),
      'codigo_municipio' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('codigo_municipio')), 'empty_value' => $this->getObject()->get('codigo_municipio'), 'required' => false)),
      'codigo_estado'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('codigo_estado')), 'empty_value' => $this->getObject()->get('codigo_estado'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('srcmt_parroquia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtParroquia';
  }

}
