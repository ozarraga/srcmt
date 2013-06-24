<?php

/**
 * FuncionesComunes actions.
 *
 * @package    srcmt
 * @subpackage FuncionesComunes
 * @author     Oswaldo Zárraga
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 *
 *
 *
 */
class FuncionesComunesActions extends sfActions
{

    public function executeObtenerEstado(sfWebRequest $request)
    {
        $Estado = rtrim($request->getParameter('q'));
//		$Parroquia = rtrim($request->getParameter('parroquia'));
//		$Municipio = rtrim($request->getParameter('municipio'));
        $sQuery = Doctrine_Core::getTable('SrcmtEstado')
                ->createQuery('a')
        ;

        $sQuery->where('quote_literal(' . $sQuery->getRootAlias() .
                        '.estado) ILIKE \'%' . pg_escape_string(rtrim($Estado)) . '%\'')
                ->orderBy($sQuery->getRootAlias() . '.estado ASC');


        $sqlQuery = $sQuery->getSqlQuery();

        $Estados = $sQuery->execute();
        $CodigosEstado = Array();
        foreach ($Estados as $key => $Estado)
        {
            $CodigosEstado[$key] = mb_convert_case($Estado->getEstado(), MB_CASE_UPPER, "UTF-8");
        }
        $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');
        return $this->renderText(json_encode($CodigosEstado));
    }

    public function executeObtenerMunicipio(sfWebRequest $request)
    {
        $Estado = rtrim($request->getParameter('codigo_estado'));

        $sQuery = Doctrine_Query::create()
                ->select('r.municipio')
                ->distinct()
                ->from('SrcmtMunicipio r')
                ->where('r.codigo_estado = ?', array($Estado))
                ->orderBy('r' . '.municipio ASC')
        ;

        $sqlQuery = $sQuery->getSqlQuery();

        $Municipios = $sQuery->execute();
        $CodigosMunicipio = Array();
        foreach ($Municipios as $key => $Municipio)
        {
            $CodigosMunicipio[$key] = array(
                'codigo_municipio' => mb_convert_case($Municipio->getCodigoMunicipio(), MB_CASE_UPPER, "UTF-8"),
                'municipio' => mb_convert_case($Municipio->getMunicipio(), MB_CASE_UPPER, "UTF-8")
            );
        }
        $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');
        return $this->renderText(json_encode($CodigosMunicipio));
    }

    public function executeObtenerParroquia(sfWebRequest $request)
    {
        $Estado = rtrim($request->getParameter('codigo_estado'));
        $Municipio = rtrim($request->getParameter('codigo_municipio'));

        $sQuery = Doctrine_Core::getTable('SrcmtParroquia')
                ->createQuery('prq')
                ->where('prq.codigo_estado = ?', pg_escape_string(rtrim($Estado)))
                ->addWhere('prq.codigo_municipio = ?', pg_escape_string(rtrim($Municipio)))
                ->orderBy('prq.parroquia ASC')
        ;


        $sqlQuery = $sQuery->getSqlQuery();

        $Parroquias = $sQuery->execute();
        $CodigosParroquia = Array();
        foreach ($Parroquias as $key => $Parroquia)
        {
            $CodigosParroquia [$key] = array(
                'codigo_parroquia' => mb_convert_case($Parroquia->getCodigoParroquia(), MB_CASE_UPPER, "UTF-8"),
                'parroquia' => mb_convert_case($Parroquia->getParroquia(), MB_CASE_UPPER, "UTF-8")
            );
//            $CodigosParroquia [$key] = mb_convert_case($Parroquia->getParroquia(), MB_CASE_UPPER, "UTF-8");
        }
        $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');
        return $this->renderText(json_encode($CodigosParroquia));
    }

    public function executeObtenerCiudad(sfWebRequest $request)
    {
        $Estado = rtrim($request->getParameter('codigo_estado'));
        $Municipio = rtrim($request->getParameter('codigo_municipio'));
        $sQuery = Doctrine_Core::getTable('SrcmtCiudad')
                ->createQuery('prq')
                ->where('prq.codigo_estado = ?', pg_escape_string(rtrim($Estado)))
                ->addWhere('prq.codigo_municipio = ?', pg_escape_string(rtrim($Municipio)))
                ->orderBy('prq.ciudad ASC')
        ;
        $sqlQuery = $sQuery->getSqlQuery();
        $Ciudades = $sQuery->execute();
        $CodigosCiudades = Array();
        foreach ($Ciudades as $key => $Ciudad)
        {
            $CodigosCiudades [$key] = array(
                'codigo_ciudad'=>mb_convert_case($Ciudad->getCodigoCiudad(), MB_CASE_UPPER, "CP1252"),
                'ciudad'=>mb_convert_case($Ciudad->getCiudad(), MB_CASE_UPPER, "CP1252")
            );
        }
        $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');
        return $this->renderText(json_encode($CodigosCiudades));
    }

}
