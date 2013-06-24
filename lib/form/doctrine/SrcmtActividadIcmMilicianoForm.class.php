<?php

/**
 * SrcmtActividadIcmMiliciano form.
 *
 * @package    srcmt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SrcmtActividadIcmMilicianoForm extends BaseSrcmtActividadIcmMilicianoForm
{
  public function configure()
  {
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
                        array_merge($this->validatorSchema[$key]->getMessages(),array(
                    'max' => 'Como m&aacute;ximo %max% valores deben ser seleccionados (%count% valores seleccionados).',
                    'min' => 'Como m&iacute;nimo %min% valores deben ser seleccionados (%count% valores seleccionados).',
                )));
            }

            if ($value instanceof sfValidatorNumber) {

                $this->validatorSchema[$key]->setMessages(
                        array_merge($this->validatorSchema[$key]->getMessages(),array(
                    'max' => '"%value%" debe ser solo hasta %max%.',
                    'min' => '"%value%" debe ser al menos %min%.',
                )));
            }
        }
    }
}
