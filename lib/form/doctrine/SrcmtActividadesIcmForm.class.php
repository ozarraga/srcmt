<?php

/**
 * SrcmtActividadesIcm form.
 *
 * @package    srcmt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SrcmtActividadesIcmForm extends BaseSrcmtActividadesIcmForm
{
  public function configure()
  {

      $FechaDesde = date('Y') - 1; //define el año actual menos 1 para el comienzo
        $FechaHasta = date('Y'); //Define la fecha de hoy

        $years = range($FechaDesde, $FechaHasta); //Crea un arreglo con los limites establecidos


        $this->widgetSchema['fecha'] = new sfWidgetFormJQueryDate(array(
                    'config' => '{minDate: new Date(' . $FechaDesde . ', 1 - 1, 1),
                                  yearRange: \'' . $FechaDesde . ':' . $FechaHasta . '\',
                                  changeMonth: true,
                                  changeYear: true,
                                  showWeek: true}',
                    'date_widget' => new sfWidgetFormDate(array(
                        'years' => array_combine($years, $years),
                        'format' => '%day%/%month%/%year%'
                            ), array()),
                    'culture' => 'es',
                    'image' => 'images/icon_calendario.gif'), array());

        $this->widgetSchema['milicianos_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
	$this->widgetSchema['brigadistas_dado_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');

        $this->widgetSchema['milicianos_list']->setLabel('Brigadistas Estudiantiles');
	$this->widgetSchema['brigadistas_dado_list']->setLabel('Brigadistas DADO');

         $this->asignarMensajesValidadores();
        $this->removerCampos(); //Debe estar al final de la configuración del formulario
    }

    protected function removerCampos() {
        unset($this['created_at'], $this['updated_at']
        );
    }
}
