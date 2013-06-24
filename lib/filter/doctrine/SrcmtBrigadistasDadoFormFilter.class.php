<?php

/**
 * SrcmtBrigadistasDado filter form.
 *
 * @package    srcmt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SrcmtBrigadistasDadoFormFilter extends BaseSrcmtBrigadistasDadoFormFilter {

    /**
     * Constructor.
     *
     * @param array  $defaults    An array of field default values
     * @param array  $options     An array of options
     * @param string $CSRFSecret  A CSRF secret
     */
    public function configure() {

        if (!$this->getOption('titulos_y_campos')) {
            //si NO EXISTE, codigo se ejecuta
        } else {
            //si SI EXISTE, ejecuta codigo

            $this->getValidatorSchema()->setOption('allow_extra_fields', true);

            $this->titulos_y_campos = $this->getOption('titulos_y_campos');
            $tempFilterForm = new sfFormFilter(array(), array(), sfConfig::get('sf_csrf_secret'));
            foreach ($this->titulos_y_campos as $titulo => $campo) {
                $tempFilterForm->widgetSchema[$campo] = new sfWidgetFormChoice(array(
                            'choices' => array(1 => $titulo),
                            'multiple' => true,
                            'expanded' => true
                                ),
                                array('class' => 'datatables-checkboxes'));

                $tempFilterForm->validatorSchema[$campo] = new sfValidatorChoice(array(
                            'choices' => array(1, 0, ''),
                            'required' => false
                        ));

                $tempFilterForm->widgetSchema[$campo]->setLabel($titulo);
            }
            $this->embedForm('columnas', $tempFilterForm);
        }

        $this->widgetSchema['nacionalidad'] = new sfWidgetFormChoice(array(
                    'choices' => array('' => '', 'V' => 'V', 'E' => 'E'),
                    'multiple' => false,
                    'expanded' => false
                ));


        $this->widgetSchema['sexo'] = new sfWidgetFormChoice(array(
                    'choices' => array('' => '', 'F' => 'Femenino', 'M' => 'Masculino'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());

        $FechaDesde = date('Y') - 100; //define el año actual menos 100 para el comienzo
        $FechaHasta = date('Y'); //Define la fecha de hoy

        $years = range($FechaDesde, $FechaHasta); //Crea un arreglo con los limites establecidos

        $fromDate = new sfWidgetFormJQueryDate(array(
                    'config' => '{minDate: new Date(' . $FechaDesde . ', 1 - 1, 1),
                                  yearRange: \'' . $FechaDesde . ':' . $FechaHasta . '\',
                                  changeMonth: true,
                                  changeYear: true,
                                  showWeek: true}',
                    'date_widget' => new sfWidgetFormDate(array(
                        'years' => array_combine($years, $years),
                        'format' => '%day%/%month%/%year%'), array()),
                    'culture' => 'es',
                    'image' => 'images/icon_calendario.gif'), array());

        $toDate = new sfWidgetFormJQueryDate(array(
                    'config' => '{minDate: new Date(' . $FechaDesde . ', 1 - 1, 1),
                                  yearRange: \'' . $FechaDesde . ':' . $FechaHasta . '\',
                                  changeMonth: true,
                                  changeYear: true,
                                  showWeek: true}',
                    'date_widget' => new sfWidgetFormDate(array(
                        'years' => array_combine($years, $years),
                        'format' => '%day%/%month%/%year%'), array()),
                    'culture' => 'es',
                    'image' => 'images/icon_calendario.gif'), array());

        $this->widgetSchema['fecha_nacimiento'] = new sfWidgetFormFilterDate(
                        array(
                            'from_date' => $fromDate,
                            'to_date' => $toDate,
                            'template' => 'desde %from_date%<br />hasta %to_date%',
                            'with_empty' => false
                ));

        $this->widgetSchema['created_at']->setLabel('Fecha de creaci&oacute;n');
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

        $this->widgetSchema['created_at']->setLabel('Fecha de creaci&oacute;n');
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
        $this->widgetSchema['updated_at']->setLabel('Fecha de actualizaci&oacute;n');



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
                ));

        $this->widgetSchema['grupo_sanguineo'] = new sfWidgetFormChoice(array(
                    'choices' => array('' => '', 'O+' => 'O+', 'O-' => 'O-', 'A-' => 'A-', 'A+' => 'A+', 'B-' => 'B-', 'B+' => 'B+', 'AB-' => 'AB-', 'AB+' => 'AB+'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());

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

        $this->widgetSchema['codigo_municipio'] = New sfWidgetFormChoice(array(
                    'choices' => array('' => 'Seleccione un Estado'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());


        $this->validatorSchema['codigo_municipio'] = new sfValidatorDoctrineChoice(array(
                    'model' => 'SrcmtMunicipio',
                    'required' => false
                ));


        $this->widgetSchema['codigo_parroquia'] = New sfWidgetFormChoice(array(
                    'choices' => array('' => 'Seleccione un Municipio'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());

        $this->validatorSchema['codigo_parroquia'] = new sfValidatorDoctrineChoice(array(
                    'model' => 'SrcmtParroquia',
                    'required' => false
                ));


        $this->widgetSchema['codigo_ciudad'] = New sfWidgetFormChoice(array(
                    'choices' => array('' => 'Seleccione un Municipio'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());

        $this->validatorSchema['codigo_ciudad'] = new sfValidatorDoctrineChoice(array(
                    'model' => 'SrcmtCiudad',
                    'required' => false
                ));


        $this->widgetSchema['perfil_empleado'] = new sfWidgetFormChoice(array(
                    'choices' => array('' => '', 'Directivo' => 'Directivo', 'Administrativo' => 'Administrativo', 'Docente' => 'Docente', 'Obrero' => 'Obrero'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());

        $this->widgetSchema['grado_instruccion'] = new sfWidgetFormChoice(array(
                    'choices' => array(
                        '' => '',
                        'Basico' => 'Basico',
                        'Medio' => 'Medio',
                        'Diversificado' => 'Diversificado',
                        'Universitario' => 'Universitario',
                        'Posgrado' => 'Posgrado',
                        'Doctorado' => 'Doctorado'
                    ),
                    'multiple' => false,
                    'expanded' => false
                        ), array());

        $this->validatorSchema['alergias'] = new sfValidatorString(array('required' => false));

        $this->widgetSchema['dominio_mano'] = new sfWidgetFormChoice(array(
                    'choices' => array('' => '', 'Diestro' => 'Diestro', 'Siniestro' => 'Siniestro', 'Ambidiestro' => 'Ambidiestro'),
                    'multiple' => false,
                    'expanded' => false
                        ), array());

        $this->widgetSchema['actividad_academica_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['actividad_academica_list']->setLabel('Actividades Acad&eacute;micas');
        $this->widgetSchema['actividad_icm_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
        $this->widgetSchema['actividad_icm_list']->setLabel('Actividades de Integraci&oacute;n C&iacute;vico Militar');

        $this->widgetSchema['sedes']->setOption('add_empty', true);
        $this->widgetSchema['sedes']->setLabel('Sede');

        $this->removerCampos();
        $this->asignarMensajesValidadores();
        $this->removerCampos(); //Debe estar al final de la configuración del formulario
    }

    /*
     * La funcion removerCampos, flexibiliza la tarea de desincorporar campos innecesarios
     * del formulario delegando la tarea fuera del método de configuración.
     */

    protected function removerCampos() {
        unset(
                $this['foto']
        );
    }

    /*
     * Este método está sobreescrito para ofrecer mayor flexibilidad al proceso de construcción de la consulta de filtro.
     *
     */

 protected function addBooleanQuery(Doctrine_Query $query, $field, $value)
    {
        $fieldName = $this->getFieldName($field);
        $query->addWhere(sprintf('%s.%s = ?', $query->getRootAlias(), $fieldName), $value);
    }

    protected function addDateQuery(Doctrine_Query $query, $field, $values)
    {
        $fieldName = $this->getFieldName($field);

        if (isset($values['is_empty']) && $values['is_empty'])
        {
            $query->addWhere(sprintf('%s.%s IS NULL', $query->getRootAlias(), $fieldName));
        }
        else
        {
            if (null !== $values['from'] && null !== $values['to'])
            {
                $query->andWhere(sprintf('%s.%s >= ?', $query->getRootAlias(), $fieldName), $values['from']);
                $query->andWhere(sprintf('%s.%s <= ?', $query->getRootAlias(), $fieldName), $values['to']);
            }
            else if (null !== $values['from'])
            {
                $query->andWhere(sprintf('%s.%s >= ?', $query->getRootAlias(), $fieldName), $values['from']);
            }
            else if (null !== $values['to'])
            {
                $query->andWhere(sprintf('%s.%s <= ?', $query->getRootAlias(), $fieldName), $values['to']);
            }
        }
    }

    protected function addEnumQuery(Doctrine_Query $query, $field, $value)
    {
        $fieldName = $this->getFieldName($field);

        $query->addWhere(sprintf('%s.%s = ?', $query->getRootAlias(), $fieldName), $value);
    }

    protected function addForeignKeyQuery(Doctrine_Query $query, $field, $value)
    {
        $fieldName = $this->getFieldName($field);

        if (is_array($value))
        {
            $query->andWhereIn(sprintf('%s.%s', $query->getRootAlias(), $fieldName), $value);
        }
        else
        {
            $query->addWhere(sprintf('%s.%s = ?', $query->getRootAlias(), $fieldName), $value);
        }
    }

    protected function addNumberQuery(Doctrine_Query $query, $field, $values)
    {
        $fieldName = $this->getFieldName($field);

        if (is_array($values) && isset($values['is_empty']) && $values['is_empty'])
        {
            $query->addWhere(sprintf('(%s.%s IS NULL OR %1$s.%2$s = ?)', $query->getRootAlias(), $fieldName), array(''));
        }
        else if (is_array($values) && isset($values['text']) && '' !== $values['text'])
        {
            $query->addWhere(sprintf('%s.%s = ?', $query->getRootAlias(), $fieldName), $values['text']);
        }
        else if (is_string($values))
        {
            settype($values, "integer");
            $this->addForeignKeyQuery($query, $field, $values);
        }
    }

    protected function addTextQuery(Doctrine_Query $query, $field, $values)
    {
        $fieldName = $this->getFieldName($field);

        if (is_array($values) && isset($values['is_empty']) && $values['is_empty'])
        {
            $query->addWhere(sprintf('(%s.%s IS NULL OR %1$s.%2$s = ?)', $query->getRootAlias(), $fieldName), array(''));
        }
        else if (is_array($values) && isset($values['text']) && '' != $values['text'])
        {
            $query->addWhere(sprintf('%s.%s LIKE ?', $query->getRootAlias(), $fieldName), '%' . $values['text'] . '%');
        }
    }

}
