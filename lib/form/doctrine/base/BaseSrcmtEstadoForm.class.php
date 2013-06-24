<?php

/**
 * SrcmtEstado form base class.
 *
 * @method SrcmtEstado getObject() Returns the current form's model object
 *
 * @package    srcmt
 * @subpackage form
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSrcmtEstadoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo_estado' => new sfWidgetFormInputHidden(),
      'estado'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'codigo_estado' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('codigo_estado')), 'empty_value' => $this->getObject()->get('codigo_estado'), 'required' => false)),
      'estado'        => new sfValidatorString(array('max_length' => 20)),
    ));

    $this->widgetSchema->setNameFormat('srcmt_estado[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtEstado';
  }

}
