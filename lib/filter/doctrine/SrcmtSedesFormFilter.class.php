<?php

/**
 * SrcmtSedes filter form.
 *
 * @package    srcmt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SrcmtSedesFormFilter extends BaseSrcmtSedesFormFilter
{
  public function configure()
  {
//      'sedes'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
//      'direccion' => new sfWidgetFormFilterInput(),
      $this->widgetSchema['sedes']->setOption('empty_label','campo vac&iacute;o');
      $this->widgetSchema['direccion']->setOption('empty_label','campo vac&iacute;o');
  }
}
