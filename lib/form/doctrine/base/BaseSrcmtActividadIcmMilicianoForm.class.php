<?php

/**
 * SrcmtActividadIcmMiliciano form base class.
 *
 * @method SrcmtActividadIcmMiliciano getObject() Returns the current form's model object
 *
 * @package    srcmt
 * @subpackage form
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSrcmtActividadIcmMilicianoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'codigo_miliciano' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtMilicianos'), 'add_empty' => false)),
      'codigo_actividad' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtActividadesIcm'), 'add_empty' => false)),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'codigo_miliciano' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtMilicianos'))),
      'codigo_actividad' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtActividadesIcm'))),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('srcmt_actividad_icm_miliciano[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtActividadIcmMiliciano';
  }

}
