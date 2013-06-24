<?php

/**
 * SrcmtTipoActividad form base class.
 *
 * @method SrcmtTipoActividad getObject() Returns the current form's model object
 *
 * @package    srcmt
 * @subpackage form
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSrcmtTipoActividadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo_tipo_actividad' => new sfWidgetFormInputHidden(),
      'tipo_actividad'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'codigo_tipo_actividad' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('codigo_tipo_actividad')), 'empty_value' => $this->getObject()->get('codigo_tipo_actividad'), 'required' => false)),
      'tipo_actividad'        => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('srcmt_tipo_actividad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtTipoActividad';
  }

}
