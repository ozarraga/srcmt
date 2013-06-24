<?php

/**
 * SrcmtActividadesIcm form base class.
 *
 * @method SrcmtActividadesIcm getObject() Returns the current form's model object
 *
 * @package    srcmt
 * @subpackage form
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSrcmtActividadesIcmForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'codigo_actividad_icm'  => new sfWidgetFormInputHidden(),
      'codigo_tipo_actividad' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtTipoActividad'), 'add_empty' => false)),
      'actividad'             => new sfWidgetFormInputText(),
      'responsable'           => new sfWidgetFormInputText(),
      'fecha'                 => new sfWidgetFormDate(),
      'lugar'                 => new sfWidgetFormInputText(),
      'duracion'              => new sfWidgetFormInputText(),
      'descripcion'           => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
      'milicianos_list'       => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtMilicianos')),
      'brigadistas_dado_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtBrigadistasDado')),
    ));

    $this->setValidators(array(
      'codigo_actividad_icm'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('codigo_actividad_icm')), 'empty_value' => $this->getObject()->get('codigo_actividad_icm'), 'required' => false)),
      'codigo_tipo_actividad' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SrcmtTipoActividad'))),
      'actividad'             => new sfValidatorString(array('max_length' => 255)),
      'responsable'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fecha'                 => new sfValidatorDate(),
      'lugar'                 => new sfValidatorString(array('max_length' => 255)),
      'duracion'              => new sfValidatorString(array('max_length' => 50)),
      'descripcion'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
      'milicianos_list'       => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtMilicianos', 'required' => false)),
      'brigadistas_dado_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SrcmtBrigadistasDado', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('srcmt_actividades_icm[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SrcmtActividadesIcm';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['milicianos_list']))
    {
      $this->setDefault('milicianos_list', $this->object->milicianos->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['brigadistas_dado_list']))
    {
      $this->setDefault('brigadistas_dado_list', $this->object->brigadistas_dado->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savemilicianosList($con);
    $this->savebrigadistas_dadoList($con);

    parent::doSave($con);
  }

  public function savemilicianosList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['milicianos_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->milicianos->getPrimaryKeys();
    $values = $this->getValue('milicianos_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('milicianos', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('milicianos', array_values($link));
    }
  }

  public function savebrigadistas_dadoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['brigadistas_dado_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->brigadistas_dado->getPrimaryKeys();
    $values = $this->getValue('brigadistas_dado_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('brigadistas_dado', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('brigadistas_dado', array_values($link));
    }
  }

}
