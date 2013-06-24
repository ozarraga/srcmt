<?php

/**
 * SrcmtPfg form base class.
 *
 * @method SrcmtPfg getObject() Returns the current form's model object
 *
 * @package    srcmt
 * @subpackage form
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSrcmtPfgForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pfg' => new sfWidgetFormInputHidden(),
      'pfg'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_pfg' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_pfg')), 'empty_value' => $this->getObject()->get('id_pfg'), 'required' => false)),
      'pfg'    => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('srcmt_pfg[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtPfg';
  }

}
