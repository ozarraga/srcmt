<?php

/**
 * SrcmtActividadAcademicaMiliciano form base class.
 *
 * @method SrcmtActividadAcademicaMiliciano getObject() Returns the current form's model object
 *
 * @package    srcmt
 * @subpackage form
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSrcmtActividadAcademicaMilicianoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'codigo_miliciano'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtMilicianos'), 'add_empty' => false)),
      'codigo_actividad_academica' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtActividadesAcademicas'), 'add_empty' => false)),
      'created_at'                 => new sfWidgetFormDateTime(),
      'updated_at'                 => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'codigo_miliciano'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtMilicianos'))),
      'codigo_actividad_academica' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtActividadesAcademicas'))),
      'created_at'                 => new sfValidatorDateTime(),
      'updated_at'                 => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('srcmt_actividad_academica_miliciano[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtActividadAcademicaMiliciano';
  }

}
