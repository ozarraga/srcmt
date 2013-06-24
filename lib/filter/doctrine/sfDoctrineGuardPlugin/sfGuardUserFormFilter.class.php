<?php

/**
 * sfGuardUser filter form.
 *
 * @package    srcmt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserFormFilter extends PluginsfGuardUserFormFilter
{

    public function configure()
    {

        $this->widgetSchema['first_name'] = new sfWidgetFormFilterInput(
                        array(
                            'empty_label' => 'campo vac&iacute;o',
                ));
        $this->widgetSchema['last_name'] = new sfWidgetFormFilterInput(
                        array(
                            'empty_label' => 'campo vac&iacute;o',
                ));
//      'is_active'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
//      'is_super_admin'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
        $this->widgetSchema['is_active'] = new sfWidgetFormChoice(
                        array(
                            'choices' => array('' => 'si o no', 1 => 'si', 0 => 'no')
                ));
        $this->widgetSchema['is_super_admin'] = new sfWidgetFormChoice(
                        array(
                            'choices' => array('' => 'si o no', 1 => 'si', 0 => 'no')
                ));

        $this->widgetSchema['last_login'] = new sfWidgetFormFilterDate(
                        array(
                            'from_date' => new sfWidgetFormJQueryDate(array('culture' => 'es', 'image' => 'images/icon_calendario.gif')),
                            'to_date' => new sfWidgetFormJQueryDate(array('culture' => 'es', 'image' => 'images/icon_calendario.gif')),
                            'template' => '<p>desde %from_date%</p><br /> <p>hasta %to_date%</p>',
                            'with_empty' => false
                ));
//                $this->widgetSchema['fecha_carga'] = new sfWidgetFormFilterDate(
//                        array(
//                            'template' => 'desde %from_date%<br />hasta %to_date%',
//                            'from_date' => new sfWidgetFormJQueryDate(array(
//                                'config' => '{minDate: new Date(' . $FechaDesde . ', 1 - 1, 1),
//                                  maxDate: new Date(' . $FechaHasta . ', 12 - 1, 31),
//                                  yearRange: \'' . $FechaDesde . ':' . $FechaHasta . '\',
//                                  showWeek: true}',
//                                'date_widget' => new sfWidgetFormDate(array(
//                                    'years' => array_combine($years, $years),
//                                    'format' => '%day%/%month%/%year%'
//                                        ), array()),
//                                'culture' => 'es',
//                                'image' => '/images/icon_calendario.gif'), array()),
//                            'to_date' => new sfWidgetFormJQueryDate(array(
//                                'config' => '{minDate: new Date(' . $FechaDesde . ', 1 - 1, 1),
//                                  maxDate: new Date(' . $FechaHasta . ', 12 - 1, 31),
//                                  yearRange: \'' . $FechaDesde . ':' . $FechaHasta . '\',
//                                  showWeek: true}',
//                                'date_widget' => new sfWidgetFormDate(array(
//                                    'years' => array_combine($years, $years),
//                                    'format' => '%day%/%month%/%year%'
//                                        ), array()),
//                                'culture' => 'es',
//                                'image' => '/images/icon_calendario.gif'), array()),
//                            'with_empty' => false
//                ));

        $this->widgetSchema['created_at'] = new sfWidgetFormFilterDate(
                        array(
                            'from_date' => new sfWidgetFormJQueryDate(array(
                                'culture' => 'es',
                                'image' => 'images/icon_calendario.gif',
                                    'date_widget' => new sfWidgetFormDate(array(
//                                    'years' => array_combine($years, $years),
                                    'format' => '%day%/%month%/%year%'))
                                )),
                            'to_date' => new sfWidgetFormJQueryDate(array(
                                'culture' => 'es',
                                'image' => 'images/icon_calendario.gif',
                                'date_widget' => new sfWidgetFormDate(array(
//                                    'years' => array_combine($years, $years),
                                    'format' => '%day%/%month%/%year%'))
                                )),
                            'template' => '<p>desde %from_date%</p><br /> <p>hasta %to_date%</p>',
                            'with_empty' => false
                ));


        $this->widgetSchema['updated_at'] = new sfWidgetFormFilterDate(
                        array(
                            'from_date' => new sfWidgetFormJQueryDate(array(
                                'culture' => 'es',
                                'image' => 'images/icon_calendario.gif',
                                'date_widget' => new sfWidgetFormDate(array(
//                                    'years' => array_combine($years, $years),
                                    'format' => '%day%/%month%/%year%'))
                                )),
                            'to_date' => new sfWidgetFormJQueryDate(array(
                                'culture' => 'es',
                                'image' => 'images/icon_calendario.gif',
                                'date_widget' => new sfWidgetFormDate(array(
//                                    'years' => array_combine($years, $years),
                                    'format' => '%day%/%month%/%year%'))
                                )),
                            'template' => '<p>desde %from_date%</p><br /> <p>hasta %to_date%</p>',
                            'with_empty' => false
                ));

        $this->widgetSchema['groups_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['permissions_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');

        $this->asignarEtiquetas();
        $this->removerCampos();
        $this->asignarMensajesValidadores();
    }

    protected function asignarEtiquetas()
    {

//		$this->widgetSchema['id']->setLabel('ID');
        $this->widgetSchema['first_name']->setLabel('Nombre');
        $this->widgetSchema['last_name']->setLabel('Apellido');
        $this->widgetSchema['email_address']->setLabel('Correo Electr&oacute;nico');
        $this->widgetSchema['username']->setLabel('Usuario');
        $this->widgetSchema['algorithm']->setLabel('Algoritmo');
        $this->widgetSchema['salt']->setLabel('Bit de Sal');
        $this->widgetSchema['password']->setLabel('Contrase&ntilde;a');
        $this->widgetSchema['is_active']->setLabel('Est&aacute; Activo');
        $this->widgetSchema['is_super_admin']->setLabel('Es Super Administrador');
        $this->widgetSchema['last_login']->setLabel('&Uacute;ltimo Acceso ');
        $this->widgetSchema['created_at']->setLabel('Fecha de registro');
        $this->widgetSchema['updated_at']->setLabel('Fecha deActualizaci&oacute;n');
        $this->widgetSchema['groups_list']->setLabel('Lista de grupos');
        $this->widgetSchema['permissions_list']->setLabel('Lista de permisos');
    }

    protected function removerCampos()
    {
        unset($this['algorithm'], $this['password'], $this['salt']
        );
    }

    protected function asignarMensajesValidadores()
    {
        //
        $this->sfValidatorSchemaMensajesError = array(
            'required' => 'Obligatorio',
            'invalid' => 'Invalido',
            'extra_fields' => 'Campo de formulario extra inesperado de nombre "%field%".',
            'post_max_size' => 'La solicitud del formulario no puede ser procesada. Esto puede indicar que ha intentado almacenar un archivo demasiado grande'
        );

        $this->getValidatorSchema()->setMessages($this->sfValidatorSchemaMensajesError)

        ;
        foreach ($this->getValidatorSchema()->getFields() as $key => $value)
        {

            if ($value instanceof sfValidatorBase)
            {
                $this->validatorSchema[$key]->setMessages(array('invalid' => 'Inv&aacute;lido', 'required' => 'Obligatorio'));
            }

            if ($value instanceof sfValidatorString)
            {

                $this->validatorSchema[$key]->setMessages(
                        array_merge($this->validatorSchema[$key]->getMessages(), array(
                            'max_length' => '"%value%" es muy largo (m&aacute;ximo %max_length% caracteres).',
                            'min_length' => '"%value%" es muy corto (m&iacute;nimo %min_length% caracteres).',
                        )));
            }

            if ($value instanceof sfValidatorInteger)
            {
                $this->validatorSchema[$key]->setMessages(array(
                    'invalid' => '"%value%" no es un entero',
                    'required' => 'Obligatorio',
                    'max' => '"%value%" debe ser solo hasta %max%.',
                    'min' => '"%value%" debe ser al menos %min%.',
                ));
            }

            if ($value instanceof sfValidatorDate)
            {
                $this->validatorSchema[$key]->setMessages(
                        array_merge($this->validatorSchema[$key]->getMessages(), array(
                            'bad_format' => '"%value%" no se ajusta al formato de fecha (%date_format%).',
                            'max' => 'La fecha debe ser anterior a %max%.',
                            'min' => 'La fecha debe ser posterior a %min%.',
                        )));
            }

            if ($value instanceof sfValidatorDoctrineChoice)
            {
                $this->validatorSchema[$key]->setMessages(
                        array_merge($this->validatorSchema[$key]->getMessages(), array(
                            'max' => 'Como m&aacute;ximo %max% valores deben ser seleccionados (%count% valores seleccionados).',
                            'min' => 'Como m&iacute;nimo %min% valores deben ser seleccionados (%count% valores seleccionados).',
                        )));
            }

            if ($value instanceof sfValidatorNumber)
            {

                $this->validatorSchema[$key]->setMessages(
                        array_merge($this->validatorSchema[$key]->getMessages(), array(
                            'max' => '"%value%" debe ser solo hasta %max%.',
                            'min' => '"%value%" debe ser al menos %min%.',
                        )));
            }
            if ($value instanceof sfValidatorFile)
            {

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
        if ($this->getValidatorSchema()->getPostValidator() instanceof sfValidatorDoctrineUnique)
        {

            $this->getValidatorSchema()->getPostValidator()->setMessages(
                    array_merge($this->getValidatorSchema()->getPostValidator()->getMessages(), array(
                        'invalid' => 'Ya existe un objeto con "%column%" id&eacute;ntico'
                    )));
        }
    }

}
