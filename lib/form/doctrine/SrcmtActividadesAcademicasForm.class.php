<?php

/**
 * SrcmtActividadesAcademicas form.
 *
 * @package    srcmt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SrcmtActividadesAcademicasForm extends BaseSrcmtActividadesAcademicasForm {

    public function configure() {
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

    protected function asignarMensajesValidadores() {
        //
        $this->sfValidatorSchemaMensajesError = array(
            'required' => 'Requerido',
            'invalid' => 'Invalido',
            'extra_fields' => 'Campo de formulario extra inesperado de nombre "%field%".',
            'post_max_size' => 'La solicitud del formulario nopuede ser procesada. Esto puede indicar que ha intentado almacenar un archivo demasiado grande'
        );

        $this->getValidatorSchema()->setMessages($this->sfValidatorSchemaMensajesError)

        ;
        foreach ($this->getValidatorSchema()->getFields() as $key => $value) {

            if ($value instanceof sfValidatorBase) {
                $this->validatorSchema[$key]->setMessages(array('invalid' => 'Inv&aacute;lido', 'required' => 'Requerido'));
            }

            if ($value instanceof sfValidatorString) {

                $this->validatorSchema[$key]->setMessages(
                        array_merge($this->validatorSchema[$key]->getMessages(), array(
                            'max_length' => '"%value%" es muy largo (m&aacute;ximo %max_length% caracteres).',
                            'min_length' => '"%value%" es muy corto (m&iacute;nimo %min_length% caracteres).',
                        )));
            }

            if ($value instanceof sfValidatorInteger) {
                $this->validatorSchema[$key]->setMessages(array(
                    'invalid' => '"%value%" no es un entero',
                    'required' => 'Requerido',
                    'max' => '"%value%" debe ser solo hasta %max%.',
                    'min' => '"%value%" debe ser al menos %min%.',
                ));
            }

            if ($value instanceof sfValidatorDate) {
                $this->validatorSchema[$key]->setMessages(
                        array_merge($this->validatorSchema[$key]->getMessages(), array(
                            'bad_format' => '"%value%" no se ajusta al formato de fecha (%date_format%).',
                            'max' => 'La fecha debe ser anterior a %max%.',
                            'min' => 'La fecha debe ser posterior a %min%.',
                        )));
            }

            if ($value instanceof sfValidatorDoctrineChoice) {
                $this->validatorSchema[$key]->setMessages(
                        array_merge($this->validatorSchema[$key]->getMessages(), array(
                            'max' => 'Como m&aacute;ximo %max% valores deben ser seleccionados (%count% valores seleccionados).',
                            'min' => 'Como m&iacute;nimo %min% valores deben ser seleccionados (%count% valores seleccionados).',
                        )));
            }

            if ($value instanceof sfValidatorNumber) {

                $this->validatorSchema[$key]->setMessages(
                        array_merge($this->validatorSchema[$key]->getMessages(), array(
                            'max' => '"%value%" debe ser solo hasta %max%.',
                            'min' => '"%value%" debe ser al menos %min%.',
                        )));
            }
        }
    }

}
