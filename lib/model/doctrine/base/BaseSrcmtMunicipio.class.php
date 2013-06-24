<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SrcmtMunicipio', 'doctrine');

/**
 * BaseSrcmtMunicipio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $codigo_municipio
 * @property integer $codigo_estado
 * @property string $municipio
 * @property SrcmtEstado $SrcmtEstado
 * @property SrcmtCiudad $SrcmtCiudad
 * @property SrcmtParroquia $SrcmtParroquia
 * 
 * @method integer        getCodigoMunicipio()  Returns the current record's "codigo_municipio" value
 * @method integer        getCodigoEstado()     Returns the current record's "codigo_estado" value
 * @method string         getMunicipio()        Returns the current record's "municipio" value
 * @method SrcmtEstado    getSrcmtEstado()      Returns the current record's "SrcmtEstado" value
 * @method SrcmtCiudad    getSrcmtCiudad()      Returns the current record's "SrcmtCiudad" value
 * @method SrcmtParroquia getSrcmtParroquia()   Returns the current record's "SrcmtParroquia" value
 * @method SrcmtMunicipio setCodigoMunicipio()  Sets the current record's "codigo_municipio" value
 * @method SrcmtMunicipio setCodigoEstado()     Sets the current record's "codigo_estado" value
 * @method SrcmtMunicipio setMunicipio()        Sets the current record's "municipio" value
 * @method SrcmtMunicipio setSrcmtEstado()      Sets the current record's "SrcmtEstado" value
 * @method SrcmtMunicipio setSrcmtCiudad()      Sets the current record's "SrcmtCiudad" value
 * @method SrcmtMunicipio setSrcmtParroquia()   Sets the current record's "SrcmtParroquia" value
 * 
 * @package    srcmt
 * @subpackage model
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSrcmtMunicipio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('srcmt_municipio');
        $this->hasColumn('codigo_municipio', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('codigo_estado', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'length' => 4,
             ));
        $this->hasColumn('municipio', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('SrcmtEstado', array(
             'local' => 'codigo_estado',
             'foreign' => 'codigo_estado'));

        $this->hasOne('SrcmtCiudad', array(
             'local' => array(
             0 => 'codigo_estado',
             1 => 'codigo_municipio',
             ),
             'foreign' => array(
             0 => 'codigo_estado',
             1 => 'codigo_municipio',
             )));

        $this->hasOne('SrcmtParroquia', array(
             'local' => array(
             0 => 'codigo_estado',
             1 => 'codigo_municipio',
             ),
             'foreign' => array(
             0 => 'codigo_estado',
             1 => 'codigo_municipio',
             )));
    }
}