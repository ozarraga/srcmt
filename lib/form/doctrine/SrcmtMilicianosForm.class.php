<?php

/**
 * SrcmtMilicianos form.
 *
 * @package    srcmt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SrcmtMilicianosForm extends BaseSrcmtMilicianosForm {

    public function configure() {

        foreach ($this->getValidatorSchema() as $value) {
            $this->validatorSchema[$key]->setMessages(array('invalid' => 'Incorrecto', 'requerido' => 'Requerido'));
        }
        $this->widgetSchema['nacionalidad'] = new sfWidgetFormChoice(array(
                    'choices' => array('' => '', 'V' => 'V', 'E' => 'E'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());
        $this->validatorSchema['nacionalidad'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array('V', 'E')
                ));

        $this->widgetSchema['sexo'] = new sfWidgetFormChoice(array(
                    'choices' => array('' => '', 'F' => 'Femenino', 'M' => 'Masculino'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());
        $this->validatorSchema['sexo'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array('F', 'M')
                ));

        $FechaDesde = date('Y') - 100; //define el año actual menos 100 para el comienzo
        $FechaHasta = date('Y'); //Define la fecha de hoy

        $years = range($FechaDesde, $FechaHasta); //Crea un arreglo con los limites establecidos


        $this->widgetSchema['fecha_nacimiento'] = new sfWidgetFormJQueryDate(array(
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

        $this->widgetSchema['estado_civil'] = new sfWidgetFormChoice(array(
                    'choices' => array(
                        '' => '',
                        'SOLTERO' => 'SOLTERO',
                        'CASADO' => 'CASADO',
                        'DIVORCIADO' => 'DIVORCIADO',
                        'VIUDO' => 'VIUDO',
                        'CONCUBINATO' => 'CONCUBINATO'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());

        $this->validatorSchema['estado_civil'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array('SOLTERO', 'CASADO', 'DIVORCIADO', 'VIUDO', 'CONCUBINATO')
                ));

        $this->widgetSchema['foto'] = new sfWidgetFormInputFileEditable(array(
                    'label' => 'Foto Carnet',
                    'file_src' => '/uploads/fotocarnet/' . $this->getObject()->getFoto(),
                    'is_image' => true,
                    'delete_label' => 'Suprimir el archivo de la imagen actual',
                    'edit_mode' => !$this->isNew(),
                    'template' => '<div width="">%file%<br />%input%<br />%delete% %delete_label%</div>'
                        ), array('width' => '100', '150'));
        $this->validatorSchema['foto_delete'] = new sfValidatorPass();

        $this->validatorSchema['foto'] = new sfValidatorFile(array(
                    'required' => false,
                    'path' => sfConfig::get('sf_upload_dir') . '/fotocarnet',
                    'max_size' => 71680,
                    'mime_types' => 'web_images'));

        $this->widgetSchema['grupo_sanguineo'] = new sfWidgetFormChoice(array(
                    'choices' => array('' => '', 'O+' => 'O+', 'O-' => 'O-', 'A-' => 'A-', 'A+' => 'A+', 'B-' => 'B-', 'B+' => 'B+', 'AB-' => 'AB-', 'AB+' => 'AB+'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());

        $this->validatorSchema['grupo_sanguineo'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array('O+', 'O-', 'A-', 'A+', 'B-', 'B+', 'AB-', 'AB+')
                ));

        /*
         * Esta area  debe manejar estado,municipio, parroquia y ciudad
         */

        $this->widgetSchema['codigo_estado'] = New sfWidgetFormDoctrineChoice(array(
                    'model' => 'SrcmtEstado',
                    'add_empty' => true,
                    'order_by' => array('codigo_estado', 'ASC'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());


        $this->validatorSchema['codigo_estado'] = new sfValidatorDoctrineChoice(array(
                    'model' => 'SrcmtEstado',
                    'required' => false
                ));

        $choices_codigo_municipio = array('' => 'Seleccione un Estado');
		$choices_codigo_parroquia = array('' => 'Seleccione un Municipio');
		$choices_codigo_ciudad = array('' => 'Seleccione un Municipio');
		if ($this->isNew) {
			$choices_codigo_municipio = array('' => 'Seleccione un Estado');
			$choices_codigo_parroquia = array('' => 'Seleccione un Municipio');
			$choices_codigo_ciudad = array('' => 'Seleccione un Municipio');
		} elseif ($this->isValid()) {
			$choices_codigo_municipio = array($this->taintedValues['codigo_municipio']);
			$choices_codigo_parroquia = array($this->taintedValues['codigo_parroquia']);
			$choices_codigo_ciudad = array($this->taintedValues['codigo_ciudad']);
		} else {
			$choices_codigo_municipio = array($this->object->getCodigoMunicipio() => $this->object->getMunicipio());
			$choices_codigo_parroquia = array($this->object->getCodigoParroquia() => $this->object->getParroquia());
			$choices_codigo_ciudad = array($this->object->getCodigoCiudad() => $this->object->getCiudad());
		}

		$this->widgetSchema['codigo_municipio'] = New sfWidgetFormChoice(array(
			    'choices' => $choices_codigo_municipio,
			    'multiple' => false,
			    'expanded' => false
				), array());

		$this->validatorSchema['codigo_municipio'] = new sfValidatorDoctrineChoice(array(
			    'model' => 'SrcmtMunicipio',
			    'required' => false
			));


		$this->widgetSchema['codigo_parroquia'] = New sfWidgetFormChoice(array(
			    'choices' => $choices_codigo_parroquia,
			    'multiple' => false,
			    'expanded' => false
				), array());

		$this->validatorSchema['codigo_parroquia'] = new sfValidatorDoctrineChoice(array(
			    'model' => 'SrcmtParroquia',
			    'required' => false
			));


		$this->widgetSchema['codigo_ciudad'] = New sfWidgetFormChoice(array(
			    'choices' => $choices_codigo_ciudad,
			    'multiple' => false,
			    'expanded' => false
				), array());


		$this->validatorSchema['codigo_ciudad'] = new sfValidatorDoctrineChoice(array(
			    'model' => 'SrcmtCiudad',
			    'required' => false
			));


        //fin de estado municipio parroquia y ciudad
        $this->validatorSchema['correo_electronico'] = new sfValidatorAnd(array(
                    new sfValidatorString(array('required' => false)),
                    new sfValidatorEmail(array(
                        'required' => false
                            ), array('invalid' => 'No parece un e-mail')),
                ));

        $this->widgetSchema['grado_instruccion'] = new sfWidgetFormChoice(array(
                    'choices' => array('' => '', 'Basico' => 'Basico',
                        'Medio' => 'Medio', 'Diversificado' => 'Diversificado', 'Universitario' => 'Universitario', 'Posgrado' => 'Posgrado', 'Doctorado' => 'Doctorado'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());
        $this->validatorSchema['grado_instruccion'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array('Basico', 'Medio', 'Diversificado', 'Universitario', 'Posgrado', 'Doctorado')
                ));

        $this->widgetSchema['nivel_dominio_idioma'] = new sfWidgetFormChoice(array(
                    'choices' => array('Basico' => 'Basico', 'Avanzado' => 'Avanzado'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());
        $this->validatorSchema['nivel_dominio_idioma'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array('Basico', 'Avanzado')
                ));

        $this->widgetSchema['trayecto'] = new sfWidgetFormChoice(array(
                    'choices' => array('' => '', 'I' => 'I', 'II' => 'II', 'III' => 'III', 'IV' => 'IV'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());
        $this->validatorSchema['trayecto'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array('I', 'II', 'III', 'IV')
                ));

        $this->widgetSchema['tramo'] = new sfWidgetFormChoice(array(
                    'choices' => array('' => '', 'I' => 'I', 'II' => 'II', 'III' => 'III'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());
        $this->validatorSchema['tramo'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array('I', 'II', 'III')
                ));

        $this->widgetSchema['trabaja_si_no'] = new sfWidgetFormChoice(array(
                    'choices' => array(0 => 'No', 1 => 'Si'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());
        $this->validatorSchema['trabaja_si_no'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array(0, 1)
                ));
        $this->widgetSchema['posee_vehiculo'] = new sfWidgetFormChoice(array(
                    'choices' => array(0 => 'No', 1 => 'Si'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());
        $this->validatorSchema['posee_vehiculo'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array(0, 1)
                ));

        $this->widgetSchema['posee_licencia'] = new sfWidgetFormChoice(array(
                    'choices' => array(0 => 'No', 1 => 'Si'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());
        $this->validatorSchema['posee_licencia'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array(0, 1)
                ));

        $this->widgetSchema['porte_armas'] = new sfWidgetFormChoice(array(
                    'choices' => array(0 => 'No', 1 => 'Si'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());
        $this->validatorSchema['porte_armas'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array(0, 1)
                ));

        $this->widgetSchema['talla_uniforme'] = new sfWidgetFormChoice(array(
                    'choices' => array(
                        '' => '',
                        'SS' => 'SS',
                        'SL' => 'SL',
                        'SR' => 'SR',
                        'MR' => 'MR',
                        'ML' => 'ML',
                        'LL' => 'LL',
                        'LM' => 'LM',
                        'LR' => 'LR',
                        'XL' => 'XL',
                        'XXL' => 'XXL'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());
        $this->validatorSchema['talla_uniforme'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array('', 'SS', 'SL', 'SR', 'MR', 'ML', 'LL', 'LM', 'LR', 'XL', 'XXL')
                ));


        $this->validatorSchema['alergias'] = new sfValidatorString(array('required' => TRUE));

        $this->widgetSchema['dominio_mano'] = new sfWidgetFormChoice(array(
                    'choices' => array('' => '', 'Diestro' => 'Diestro', 'Siniestro' => 'Siniestro', 'Ambidiestro' => 'Ambidiestro'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());
        $this->validatorSchema['dominio_mano'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array('Diestro', 'Siniestro', 'Ambidiestro')
                ));

        $this->widgetSchema['practica_deporte'] = new sfWidgetFormChoice(array(
                    'choices' => array(0 => 'No', 1 => 'Si'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());
        $this->validatorSchema['practica_deporte'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array(0, 1)
                ));

        $this->widgetSchema['participa_actividad_cultural'] = new sfWidgetFormChoice(array(
                    'choices' => array(0 => 'No', 1 => 'Si'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());
        $this->validatorSchema['participa_actividad_cultural'] = new sfValidatorChoice(array(
                    'required' => true,
                    'choices' => array(0, 1)
                ));

        $this->widgetSchema['actividad_academica_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['actividad_academica_list']->setLabel('Actividades Acad&eacute;micas');
        $this->widgetSchema['actividad_icm_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['actividad_icm_list']->setLabel('Actividades de Integraci&oacute;n C&iacute;vico Militar');


        $this->widgetSchema['programa_formacion_grado']->setOption('add_empty', true);

        $this->widgetSchema['sedes']->setOption('add_empty', true);
        $this->widgetSchema['sedes']->setLabel('Sede');

        $this->widgetSchema['practica_deporte']->setLabel('Practica deportes?');
        $this->widgetSchema['deporte']->setLabel('Cu&aacute;les deportes?');
        $this->widgetSchema['participa_actividad_cultural']->setLabel('participa en actividades culturales?');
        $this->widgetSchema['actividad_cultural']->setLabel('Actividad o actividades culturales');
        $this->widgetSchema['agrupacion_social']->setLabel('Agrupaciones Sociales');
        $this->widgetSchema['misiones']->setLabel('Misiones Sociales');
        $this->widgetSchema['signos_particulares']->setLabel('Se&ntilde;ales particulares');
        $this->widgetSchema['peso']->setLabel('Peso en Kg');
        $this->widgetSchema['estatura']->setLabel('Estatura en Metros');

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