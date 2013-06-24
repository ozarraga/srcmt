<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SrcmtActividadesAcademicas', 'doctrine');

/**
 * BaseSrcmtActividadesAcademicas
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $codigo_actividad_academica
 * @property integer $codigo_tipo_actividad
 * @property string $actividad
 * @property string $responsable
 * @property date $fecha
 * @property string $lugar
 * @property string $duracion
 * @property string $descripcion
 * @property SrcmtTipoActividad $SrcmtTipoActividad
 * @property Doctrine_Collection $milicianos
 * @property Doctrine_Collection $brigadistas_dado
 * @property Doctrine_Collection $SrcmtActividadAcademicaBrigadistaDado
 * @property Doctrine_Collection $SrcmtActividadAcademicaMiliciano
 * 
 * @method integer                    getCodigoActividadAcademica()              Returns the current record's "codigo_actividad_academica" value
 * @method integer                    getCodigoTipoActividad()                   Returns the current record's "codigo_tipo_actividad" value
 * @method string                     getActividad()                             Returns the current record's "actividad" value
 * @method string                     getResponsable()                           Returns the current record's "responsable" value
 * @method date                       getFecha()                                 Returns the current record's "fecha" value
 * @method string                     getLugar()                                 Returns the current record's "lugar" value
 * @method string                     getDuracion()                              Returns the current record's "duracion" value
 * @method string                     getDescripcion()                           Returns the current record's "descripcion" value
 * @method SrcmtTipoActividad         getSrcmtTipoActividad()                    Returns the current record's "SrcmtTipoActividad" value
 * @method Doctrine_Collection        getMilicianos()                            Returns the current record's "milicianos" collection
 * @method Doctrine_Collection        getBrigadistasDado()                       Returns the current record's "brigadistas_dado" collection
 * @method Doctrine_Collection        getSrcmtActividadAcademicaBrigadistaDado() Returns the current record's "SrcmtActividadAcademicaBrigadistaDado" collection
 * @method Doctrine_Collection        getSrcmtActividadAcademicaMiliciano()      Returns the current record's "SrcmtActividadAcademicaMiliciano" collection
 * @method SrcmtActividadesAcademicas setCodigoActividadAcademica()              Sets the current record's "codigo_actividad_academica" value
 * @method SrcmtActividadesAcademicas setCodigoTipoActividad()                   Sets the current record's "codigo_tipo_actividad" value
 * @method SrcmtActividadesAcademicas setActividad()                             Sets the current record's "actividad" value
 * @method SrcmtActividadesAcademicas setResponsable()                           Sets the current record's "responsable" value
 * @method SrcmtActividadesAcademicas setFecha()                                 Sets the current record's "fecha" value
 * @method SrcmtActividadesAcademicas setLugar()                                 Sets the current record's "lugar" value
 * @method SrcmtActividadesAcademicas setDuracion()                              Sets the current record's "duracion" value
 * @method SrcmtActividadesAcademicas setDescripcion()                           Sets the current record's "descripcion" value
 * @method SrcmtActividadesAcademicas setSrcmtTipoActividad()                    Sets the current record's "SrcmtTipoActividad" value
 * @method SrcmtActividadesAcademicas setMilicianos()                            Sets the current record's "milicianos" collection
 * @method SrcmtActividadesAcademicas setBrigadistasDado()                       Sets the current record's "brigadistas_dado" collection
 * @method SrcmtActividadesAcademicas setSrcmtActividadAcademicaBrigadistaDado() Sets the current record's "SrcmtActividadAcademicaBrigadistaDado" collection
 * @method SrcmtActividadesAcademicas setSrcmtActividadAcademicaMiliciano()      Sets the current record's "SrcmtActividadAcademicaMiliciano" collection
 * 
 * @package    srcmt
 * @subpackage model
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSrcmtActividadesAcademicas extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('srcmt_actividades_academicas');
        $this->hasColumn('codigo_actividad_academica', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'srcmt_actividades_academicas_codigo_actividad_academica',
             'length' => 4,
             ));
        $this->hasColumn('codigo_tipo_actividad', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 4,
             ));
        $this->hasColumn('actividad', 'string', 255, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 255,
             ));
        $this->hasColumn('responsable', 'string', 255, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 255,
             ));
        $this->hasColumn('fecha', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('lugar', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 255,
             ));
        $this->hasColumn('duracion', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 50,
             ));
        $this->hasColumn('descripcion', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('SrcmtTipoActividad', array(
             'local' => 'codigo_tipo_actividad',
             'foreign' => 'codigo_tipo_actividad'));

        $this->hasMany('SrcmtMilicianos as milicianos', array(
             'refClass' => 'SrcmtActividadAcademicaMiliciano',
             'local' => 'codigo_actividad_academica',
             'foreign' => 'codigo_miliciano'));

        $this->hasMany('SrcmtBrigadistasDado as brigadistas_dado', array(
             'refClass' => 'SrcmtActividadAcademicaBrigadistaDado',
             'local' => 'codigo_actividad_academica',
             'foreign' => 'codigo_brigadista'));

        $this->hasMany('SrcmtActividadAcademicaBrigadistaDado', array(
             'local' => 'codigo_actividad_academica',
             'foreign' => 'codigo_actividad_academica'));

        $this->hasMany('SrcmtActividadAcademicaMiliciano', array(
             'local' => 'codigo_actividad_academica',
             'foreign' => 'codigo_actividad_academica'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}