<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SrcmtActividadAcademicaBrigadistaDado', 'doctrine');

/**
 * BaseSrcmtActividadAcademicaBrigadistaDado
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $codigo_brigadista
 * @property integer $codigo_actividad_academica
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property SrcmtActividadesAcademicas $SrcmtActividadesAcademicas
 * @property SrcmtBrigadistasDado $SrcmtBrigadistasDado
 * 
 * @method integer                               getId()                         Returns the current record's "id" value
 * @method integer                               getCodigoBrigadista()           Returns the current record's "codigo_brigadista" value
 * @method integer                               getCodigoActividadAcademica()   Returns the current record's "codigo_actividad_academica" value
 * @method timestamp                             getCreatedAt()                  Returns the current record's "created_at" value
 * @method timestamp                             getUpdatedAt()                  Returns the current record's "updated_at" value
 * @method SrcmtActividadesAcademicas            getSrcmtActividadesAcademicas() Returns the current record's "SrcmtActividadesAcademicas" value
 * @method SrcmtBrigadistasDado                  getSrcmtBrigadistasDado()       Returns the current record's "SrcmtBrigadistasDado" value
 * @method SrcmtActividadAcademicaBrigadistaDado setId()                         Sets the current record's "id" value
 * @method SrcmtActividadAcademicaBrigadistaDado setCodigoBrigadista()           Sets the current record's "codigo_brigadista" value
 * @method SrcmtActividadAcademicaBrigadistaDado setCodigoActividadAcademica()   Sets the current record's "codigo_actividad_academica" value
 * @method SrcmtActividadAcademicaBrigadistaDado setCreatedAt()                  Sets the current record's "created_at" value
 * @method SrcmtActividadAcademicaBrigadistaDado setUpdatedAt()                  Sets the current record's "updated_at" value
 * @method SrcmtActividadAcademicaBrigadistaDado setSrcmtActividadesAcademicas() Sets the current record's "SrcmtActividadesAcademicas" value
 * @method SrcmtActividadAcademicaBrigadistaDado setSrcmtBrigadistasDado()       Sets the current record's "SrcmtBrigadistasDado" value
 * 
 * @package    srcmt
 * @subpackage model
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSrcmtActividadAcademicaBrigadistaDado extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('srcmt_actividad_academica_brigadista_dado');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'srcmt_actividad_academica_brigadista_dado_id',
             'length' => 4,
             ));
        $this->hasColumn('codigo_brigadista', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 4,
             ));
        $this->hasColumn('codigo_actividad_academica', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 4,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'default' => '(\'now\'::text)::timestamp without time zone',
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'default' => '(\'now\'::text)::timestamp without time zone',
             'primary' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('SrcmtActividadesAcademicas', array(
             'local' => 'codigo_actividad_academica',
             'foreign' => 'codigo_actividad_academica'));

        $this->hasOne('SrcmtBrigadistasDado', array(
             'local' => 'codigo_brigadista',
             'foreign' => 'codigo_brigadista'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}