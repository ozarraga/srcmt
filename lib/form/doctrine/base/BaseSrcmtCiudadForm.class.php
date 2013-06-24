<?php

/**
 * SrcmtCiudad form base class.
 *
 * @method SrcmtCiudad getObject() Returns the current form's model object
 *
 * @package    srcmt
 * @subpackage form
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSrcmtCiudadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo_ciudad'    => new sfWidgetFormInputHidden(),
      'codigo_estado'    => new sfWidgetFormInputHidden(),
      'codigo_municipio' => new sfWidgetFormInputHidden(),
      'ciudad'           => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'codigo_ciudad'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('codigo_ciudad')), 'empty_value' => $this->getObject()->get('codigo_ciudad'), 'required' => false)),
      'codigo_estado'    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('codigo_estado')), 'empty_value' => $this->getObject()->get('codigo_estado'), 'required' => false)),
      'codigo_municipio' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('codigo_municipio')), 'empty_value' => $this->getObject()->get('codigo_municipio'), 'required' => false)),
      'ciudad'           => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('srcmt_ciudad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtCiudad';
  }

}
