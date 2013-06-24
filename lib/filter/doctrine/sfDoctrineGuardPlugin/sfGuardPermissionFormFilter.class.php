<?php

/**
 * sfGuardPermission filter form.
 *
 * @package    srcmt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardPermissionFormFilter extends PluginsfGuardPermissionFormFilter {

    public function configure() {
        $this->widgetSchema['name']->setOption('empty_label', 'campo vac&iacute;o');
        $this->widgetSchema['description']->setOption('empty_label', 'campo vac&iacute;o');
        $this->widgetSchema['created_at'] = new sfWidgetFormFilterDate(
                        array(
                            'from_date' => new sfWidgetFormJQueryDate(array('culture' => 'es', 'image' => 'images/icon_calendario.gif')),
                            'to_date' => new sfWidgetFormJQueryDate(array('culture' => 'es', 'image' => 'images/icon_calendario.gif')),
                            'template' => '<p>desde %from_date%</p><br /> <p>hasta %to_date%</p>',
                            'with_empty' => false
                ));


        $this->widgetSchema['updated_at'] = new sfWidgetFormFilterDate(
                        array(
                            'from_date' => new sfWidgetFormJQueryDate(array('culture' => 'es', 'image' => 'images/icon_calendario.gif')),
                            'to_date' => new sfWidgetFormJQueryDate(array('culture' => 'es', 'image' => 'images/icon_calendario.gif')),
                            'template' => '<p>desde %from_date%</p><br /> <p>hasta %to_date%</p>',
                            'with_empty' => false
                ));
        $this->widgetSchema['groups_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['users_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');

        $this->asignarEtiquetas();
        $this->removerCampos();
        $this->asignarMensajesValidadores();
    }

    protected function asignarEtiquetas() {

        $this->widgetSchema['name']->setLabel('Permisos');
        $this->widgetSchema['description']->setLabel('Texto descriptivo');
        $this->widgetSchema['created_at']->setLabel('Creado el');
        $this->widgetSchema['updated_at']->setLabel('Actualizado el');
        $this->widgetSchema['users_list']->setLabel('Usuarios');
        $this->widgetSchema['groups_list']->setLabel('Grupos');
    }

    protected function removerCampos() {
        unset($this['algorithm'], $this['password'], $this['salt']
        );
    }

    protected function asignarMensajesValidadores() {
        //
        $this->sfValidatorSchemaMensajesError = array(
            'required' => 'Obligatorio',
            'invalid' => 'Invalido',
            'extra_fields' => 'Campo de formulario extra inesperado de nombre "%field%".',
            'post_max_size' => 'La solicitud del formulario no puede ser procesada. Esto puede indicar que ha intentado almacenar un archivo demasiado grande'
        );

        $this->getValidatorSchema()->setMessages($this->sfValidatorSchemaMensajesError)

        ;
        foreach ($this->getValidatorSchema()->getFields() as $key => $value) {

            if ($value instanceof sfValidatorBase) {
                $this->validatorSchema[$key]->setMessages(array('invalid' => 'Inv&aacute;lido', 'required' => 'Obligatorio'));
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
                    'required' => 'Obligatorio',
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
            if ($value instanceof sfValidatorFile) {

                $this->validatorSchema[$key]->setMessages(
                        array_merge($this->validatorSchema[$key]->getMessages(), array(
                            'max_size' => 'Archivo es muy grande (m&aacute;ximo %max_size% bytes).',
                            'mime_types' => 'Tipo mime inv&aacute;lido (%mime_type%).',
                            'partial' => 'El archivo subido, subi&oacute; parcialmente',
                            'no_tmp_dir' => 'Carpeta temporal desconocida',
                            'cant_write' => 'Falla al escribir archivo en disco.',
                            'extension' => 'Subida de archivos detenidad por extensi&oacute'
                        )));
            }
        }
        if ($this->getValidatorSchema()->getPostValidator() instanceof sfValidatorDoctrineUnique) {

            $this->getValidatorSchema()->getPostValidator()->setMessages(
                    array_merge($this->getValidatorSchema()->getPostValidator()->getMessages(), array(
                        'invalid' => 'Ya existe un objeto con "%column%" id&eacute;ntico'
                    )));
        }
    }

}
