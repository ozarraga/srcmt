<?php

/**
 * SrcmtActividadesAcademicas filter form.
 *
 * @package    srcmt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SrcmtActividadesAcademicasFormFilter extends BaseSrcmtActividadesAcademicasFormFilter {

    public function configure() {
        $FechaDesde = date('Y') - 20; //define el año actual menos 1 para el comienzo
        $FechaHasta = date('Y')+1; //Define la fecha de hoy

        $years = range($FechaDesde, $FechaHasta); //Crea un arreglo con los limites establecidos


        $this->widgetSchema['fecha'] = new sfWidgetFormFilterDate(
                        array(
                            'from_date' => new sfWidgetFormJQueryDate(array(
                                'culture' => 'es',
                                'image' => 'images/icon_calendario.gif',
                                'date_widget' => new sfWidgetFormDate(array(
                                    'years' => array_combine($years, $years),
                                    'format' => '%day%/%month%/%year%'))
                            )),
                            'to_date' => new sfWidgetFormJQueryDate(array(
                                'culture' => 'es',
                                'image' => 'images/icon_calendario.gif',
                                'date_widget' => new sfWidgetFormDate(array(
                                    'years' => array_combine($years, $years),
                                    'format' => '%day%/%month%/%year%'))
                            )),
                            'template' => 'desde %from_date%<br />hasta %to_date%',
                            'with_empty' => false
                ));

       $this->widgetSchema['created_at'] = new sfWidgetFormFilterDate(
                        array(
                            'from_date' => new sfWidgetFormJQueryDate(array(
                                'culture' => 'es',
                                'image' => 'images/icon_calendario.gif',
                                'date_widget' => new sfWidgetFormDate(array(
                                    'years' => array_combine($years, $years),
                                    'format' => '%day%/%month%/%year%'))
                            )),
                            'to_date' => new sfWidgetFormJQueryDate(array(
                                'culture' => 'es',
                                'image' => 'images/icon_calendario.gif',
                                'date_widget' => new sfWidgetFormDate(array(
                                    'years' => array_combine($years, $years),
                                    'format' => '%day%/%month%/%year%'))
                            )),
                            'template' => 'desde %from_date%<br />hasta %to_date%',
                            'with_empty' => false
                ));


        $this->widgetSchema['updated_at'] = new sfWidgetFormFilterDate(
                        array(
                            'from_date' => new sfWidgetFormJQueryDate(array(
                                'culture' => 'es',
                                'image' => 'images/icon_calendario.gif',
                                'date_widget' => new sfWidgetFormDate(array(
                                    'years' => array_combine($years, $years),
                                    'format' => '%day%/%month%/%year%'))
                            )),
                            'to_date' => new sfWidgetFormJQueryDate(array(
                                'culture' => 'es',
                                'image' => 'images/icon_calendario.gif',
                                'date_widget' => new sfWidgetFormDate(array(
                                    'years' => array_combine($years, $years),
                                    'format' => '%day%/%month%/%year%'))
                            )),
                            'template' => 'desde %from_date%<br />hasta %to_date%',
                            'with_empty' => false
                ));

        $this->validatorSchema['created_at'] = new sfValidatorDateRange(
                        array(
                            'required' => false,
                            'from_date' => new sfValidatorDateTime(array(
                                'required' => false,
                                'datetime_output' => 'd-m-y 00:00:00')),
                            'to_date' => new sfValidatorDateTime(array(
                                'required' => false,
                                'datetime_output' => 'd-m-y 23:59:59'))));

        $this->validatorSchema['updated_at'] = new sfValidatorDateRange(
                        array(
                            'required' => false,
                            'from_date' => new sfValidatorDateTime(array(
                                'required' => false,
                                'datetime_output' => 'd-m-y 00:00:00')),
                            'to_date' => new sfValidatorDateTime(array(
                                'required' => false,
                                'datetime_output' => 'd-m-y 23:59:59'))));


        $this->widgetSchema['created_at']->setLabel('Fecha de creaci&oacute;n');
        $this->widgetSchema['updated_at']->setLabel('Fecha de actualizaci&oacute;n');

        $this->widgetSchema['milicianos_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['brigadistas_dado_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');

        $this->widgetSchema['milicianos_list']->setLabel('Brigadistas Estudiantiles');
        $this->widgetSchema['brigadistas_dado_list']->setLabel('Brigadistas DADO');




        $this->asignarMensajesValidadores();
        $this->removerCampos(); //Debe estar al final de la configuración del formulario
    }

    protected function removerCampos() {
//        unset(
//        );
    }


}
