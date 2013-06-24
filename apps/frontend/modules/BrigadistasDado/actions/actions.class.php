<?php

/**
 * BrigadistasDado actions.
 *
 * @package    srcmt
 * @subpackage BrigadistasDado
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 *
 *
 */
class BrigadistasDadoActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {

        if ($this->getUser()->isAuthenticated()) {
//accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Recuperar Brigadistas DADO')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }


        $titulosCampos = SrcmtBrigadistasDado::getTitulosCampos();
        $titulos_y_campos = SrcmtBrigadistasDado::getArregloTitulosCampos();

        $this->casillas_de_campos = Array();
        foreach ($titulosCampos as $key => $titulo) {
            $this->casillas_de_campos[$key] = new checkBoxClass($titulo, $titulo, $titulo, $titulo);
        }

        $this->formFilter = new SrcmtBrigadistasDadoFormFilter(
                        Array(),
                        Array('titulos_y_campos' => $titulos_y_campos, 'allow_extra_fields' => true),
                        sfConfig::get('sf_csrf_secret'));

        //  $this->srcmt_brigadistas_dados = $this->getRoute()->getObjects();
    }

    public function executeIndexAjax(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
//accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Recuperar Brigadistas DADO')) {

                    $output = 'acceso denegado';

                    $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');

                    return $this->renderText(json_encode($output));
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }


        $this->srcmt_brigadistas_dados = $this->getRoute()->getObjects();

        $temparray = $this->srcmt_brigadistas_dados->getTable()->getFieldNames();

        foreach ($temparray as $key => $value) {

            if ($value != 'foto') {
                $newarray[] = $value;
            }
        }

        $aColumns = $newarray; // almacena los nombres de las columnas de la tabla
        unset($temparray, $newarray);

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = 'codigo_brigadista';

        /* DB table to use */
        $sTable = 'SrcmtBrigadistasDado';

        $sfQuery = Doctrine::getTable($sTable)
                ->createQuery('a')
        ;

        /*
         * Paging
         */

        $iDisplayStart = $request->getGetParameter('iDisplayStart');
        $iDisplayLength = $request->getGetParameter('iDisplayLength');

        $sLimit = "";
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sfQuery->limit($iDisplayLength)
                    ->offset($iDisplayStart)
            ;
        }

        /*
         * Ordering
         */
        $iSortCol_0 = $request->getGetParameter('iSortCol_0');

        if (isset($iSortCol_0)) {
            $sOrder = "ORDER BY  "; // presente informativamente, doctrine no lo usa
            for ($i = 0; $i < intval($request->getGetParameter('iSortingCols')); $i++) {
                if ($request->getGetParameter('bSortable_' . intval($request->getGetParameter('iSortCol_' . $i) == "true"))) {
                    $sfQuery->addOrderBy($sfQuery->getRootAlias() . "." . $aColumns[intval($request->getGetParameter('iSortCol_' . $i))] . " " . $request->getGetParameter('sSortDir_' . $i))
                    ;
                }
            }
        }
        $this->setOrderBy($sfQuery->getDqlPart('orderby'));

        /*
         * Filtering
         */
        $sWhere = "";
        if ($request->getGetParameter('sSearch') != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {

                $sfQuery->orWhere('quote_literal(' . $sfQuery->getRootAlias() . '.' . $aColumns[$i] . ')' . ' ILIKE \'%' . pg_escape_string($request->getGetParameter('sSearch')) . '%\'');
            }
        }

        /* Individual column filtering */
        for ($i = 0; $i < count($aColumns); $i++) {
            if ($request->getGetParameter('bSearchable_' . $i) == "true" && $request->getGetParameter('sSearch_' . $i) != '') {

                $sfQuery->addWhere('quote_literal(' . $sfQuery->getRootAlias() . '.' . $aColumns[$i] . ')' . ' ILIKE \'%' . pg_escape_string($request->getGetParameter('sSearch')) . '%\'');
            }
        }

        /*
         * SQL queries
         * Get data to display
         */

        $sfQuery_sin_limit = $sfQuery; // usada posteriormente para obtener el número de registros coincidentes con los criterios

        $rResult = $sfQuery->execute();

        /* Data set length after filtering */
        $sfQuery_sin_limit->removeDqlQueryPart('limit')
                ->removeDqlQueryPart('offset');

//        $this->setFilters($sfQuery_sin_limit);
///

        $iFilteredTotal = $sfQuery_sin_limit->execute()->count();




        /* Total data set length */
        $iTotal = $this->srcmt_brigadistas_dados->count();

        /*
         * Output
         */
        $output = array(
            'sEcho' => intval($request->getGetParameter('sEcho')),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );

        foreach ($rResult as $i => $aRow) {
            $row = array();
// Add the row ID and class to the object
            $row['DT_RowId'] = 'row_' . $aRow['codigo_brigadista'];

            for ($i = 0; $i < count($aColumns); $i++) {

                switch ($aColumns[$i]) {
                    case 'codigo_brigadista':
                        
                        $row[] = '<a href="' . $this->generateUrl('BrigadistasDado_show', $aRow) . '" >' . $aRow[$aColumns[$i]] . '</a>';
                        break;
                    case 'fecha_nacimiento':
                        $row[] = $aRow->getFechaNacimientoFormateado();
                        break;
                    case 'cedula_identidad':
                        $row[] = $aRow->getCedulaIdentidadFormateada();
                        break;
                    case 'codigo_estado':
                        $row[] = $aRow->getEstado();
                        break;
                    case 'codigo_municipio':
                        $row[] = $aRow->getMunicipio();
                        break;
                    case 'codigo_parroquia':
                        $row[] = $aRow->getParroquia();
                        break;
                    case 'codigo_ciudad':
                        $row[] = $aRow->getCiudad();
                        break;
                    case 'sedes':
                        $row[] = $aRow->getSrcmtSedes()->getSedes();
                        break;
                    case 'created_at':
                        $row[] = $aRow->getCreatedAtFormateado();
                        break;
                    case 'updated_at':
                        $row[] = $aRow->getUpdatedAtFormateado();
                        break;
                    default:
                        $row[] = $aRow[$aColumns[$i]];
                        break;
                }
            }
            $output['aaData'][] = $row;
        }
//		$this->setTemplate(false);
//		$this->setLayout(false);

        $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');

        return $this->renderText(json_encode($output));
    }

    public function executeShow(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
//accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Recuperar Brigadistas DADO')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }


        $this->srcmt_brigadistas_dado = $this->getRoute()->getObject();
    }

 

    public function executeShowActividades(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Recuperar Brigadistas DADO')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }

        $this->srcmt_brigadistas_dado = $this->getRoute()->getObject();

        $aa_in = array(0 => 0);
        $BD_AA_rel = $this->srcmt_brigadistas_dado->getSrcmtActividadAcademicaBrigadistaDado()->toArray();
        foreach ($BD_AA_rel as $key => $value) {
            $aa_in[] = $value['codigo_actividad_academica'];
        }
        $sQuery_AA = Doctrine_Core::getTable('SrcmtActividadesAcademicas')
                ->createQuery('a')
                ->where('a.codigo_actividad_academica in ?', array($aa_in))
                ->orderBy('a.fecha desc, a.codigo_tipo_actividad asc')
        ;
        $this->ActividadesAcademicas = $sQuery_AA->execute();

        $aicm_in = array(0 => 0);
        $BD_AICM_rel = $this->srcmt_brigadistas_dado->getSrcmtActividadIcmBrigadistaDado()->toArray();
        foreach ($BD_AICM_rel as $key => $value) {
            $aicm_in[] = $value['codigo_actividad'];
        }
        $sQuery_AICM = Doctrine_Core::getTable('SrcmtActividadesIcm')
                ->createQuery('a')
                ->where('a.codigo_actividad_icm in ?', array($aicm_in))
                ->orderBy('a.fecha desc, a.codigo_tipo_actividad asc')
        ;
        $this->ActividadesICM = $sQuery_AICM->execute();
    }

    public function executeNew(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Crear Brigadistas DADO')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }
        $this->form = new SrcmtBrigadistasDadoForm();
    }

    public function executeCreate(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Crear Brigadistas DADO')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }

        $this->form = new SrcmtBrigadistasDadoForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Suprimir Brigadistas DADO')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }

        $brigdado = $this->getRoute()->getObject();

        $this->form = new SrcmtBrigadistasDadoForm(
                        $brigdado,
                        array('codigo_estado' => $brigdado->getCodigoEstado(),
                            'codigo_municipio' => $brigdado->getCodigoMunicipio())
        );
    }

    public function executeUpdate(sfWebRequest $request) {

        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Actualizar Brigadistas DADO')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }


        $this->form = new SrcmtBrigadistasDadoForm($this->getRoute()->getObject());

        $this->processForm($request, $this->form);
        //$this->redirect($request->getReferer());

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Suprimir Brigadistas DADO')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }

        $request->checkCSRFProtection();

        $this->brigadista_dado = $this->getRoute()->getObject();
        $this->ActividadesIcm = $this->brigadista_dado->getSrcmtActividadIcmBrigadistaDado();

        if ($this->ActividadesIcm->count() > 0) {
            $this->getUser()->setFlash('notice', 'El brigadista Dado "' . $this->brigadista_dado . '" no se puede borrar porque tiene asignadas actividades de Integracion Civico-Militar');
            $this->redirect($request->getReferer());
        }
        $this->ActividadesAcademicas = $this->brigadista_dado->getSrcmtActividadAcademicaBrigadistaDado();
        if ($this->ActividadesAcademicas->count() > 0) {
            $this->getUser()->setFlash('notice', 'El brigadista Dado "' . $this->brigadista_dado . '" no se puede borrar porque tiene asignadas actividades Acad&eacute;micas');
            $this->redirect($request->getReferer());
        }
        $this->brigadista_dado->delete();

        $this->redirect('@BrigadistasDado');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $srcmt_brigadistas_dado = $form->save();

            $this->getUser()->setFlash('notice', 'El registro se ha guardado satisfactoriamente', false);
            $this->form = $form;
            //$this->redirect('@BrigadistasDado_edit?codigo_brigadista=' . $srcmt_brigadistas_dado->getCodigoBrigadista());
        } else {

            $this->getUser()->setFlash('error', 'Se detectaron errores al guardar!', false);
        }
    }

    protected function setOrderBy(array $orderBy) {
        return $this->getUser()->setAttribute('srcmt_brigadistas_dado.filters', $orderBy, 'modulo_BrigadistasDado');
    }

    protected function getOrderBy() {
        return $this->getUser()->getAttribute('srcmt_brigadistas_dado.filters', $this->getOrderByDefaults(), 'modulo_BrigadistasDado');
    }

    protected function getFilters() {
        return $this->getUser()->getAttribute('srcmt_brigadistas_dado.filters', $this->getFilterDefaults(), 'modulo_BrigadistasDado');
    }

    protected function setFilters(array $filters) {
        return $this->getUser()->setAttribute('srcmt_brigadistas_dado.filters', $filters, 'modulo_BrigadistasDado');
    }

    protected function getFilterDefaults() {
        return array();
    }

    protected function getOrderByDefaults() {
        return array();
    }

}
