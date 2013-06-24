<?php

/**
 * SrcmtSedes form base class.
 *
 * @method SrcmtSedes getObject() Returns the current form's model object
 *
 * @package    srcmt
 * @subpackage form
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSrcmtSedesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_sedes'  => new sfWidgetFormInputHidden(),
      'sedes'     => new sfWidgetFormInputText(),
      'direccion' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_sedes'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_sedes')), 'empty_value' => $this->getObject()->get('id_sedes'), 'required' => false)),
      'sedes'     => new sfValidatorString(array('max_length' => 50)),
      'direccion' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('srcmt_sedes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtSedes';
  }

}
