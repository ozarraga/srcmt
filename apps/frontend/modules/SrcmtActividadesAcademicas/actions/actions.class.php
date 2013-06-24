<?php

/**
 * SrcmtActividadesAcademicas actions.
 *
 * @package    srcmt
 * @subpackage SrcmtActividadesAcademicas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SrcmtActividadesAcademicasActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Recuperar Actividades Academicas')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }

        $this->ActividadesAcademicas = $this->getRoute()->getObjects();
        
        $this->formFilter = new SrcmtActividadesAcademicasFormFilter(
                        Array(),
                        Array(),
                        sfConfig::get('sf_csrf_secret'));
    }

    public function executeIndexAjax(sfWebRequest $request) {

        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Recuperar Actividades Academicas')) {

                    $output = 'acceso denegado';

                    $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');

                    return $this->renderText(json_encode($output));
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }

        $this->ActividadesAcademicas = $this->getRoute()->getObjects();
        $aColumns = $this->ActividadesAcademicas->getTable()->getFieldNames(); // almacena los nombres de las columnas de la tabla

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = 'codigo_actividad_academica';

        /* DB table to use */
        $sTable = 'SrcmtActividadesAcademicas';

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
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($request->getGetParameter('iSortingCols')); $i++) {
                if ($request->getGetParameter('bSortable_' . intval($request->getGetParameter('iSortCol_' . $i) == "true"))) {
                    $sfQuery->addOrderBy($sfQuery->getRootAlias() . "." . $aColumns[intval($request->getGetParameter('iSortCol_' . $i))] . " " . $request->getGetParameter('sSortDir_' . $i))
                    ;
                }
            }
        }


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

        $iFilteredTotal = $sfQuery_sin_limit->execute()->count();

        /* Total data set length */
        $iTotal = $this->ActividadesAcademicas->count();

        /*
         * Output
         */
        $this->output = array(
            'sEcho' => intval($request->getGetParameter('sEcho')),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );

        foreach ($rResult as $i => $aRow) {
            $row = array();
            // Add the row ID and class to the object
            $row['DT_RowId'] = 'row_' . $aRow['codigo_actividad_academica'];

            for ($i = 0; $i < count($aColumns); $i++) {

                switch ($aColumns[$i]) {
                    case 'fecha':
                        $row[] = $aRow->getFechaFormateado();
                        break;
                    case 'codigo_actividad_academica':

                        $row[] = '<a href=\'' . $this->generateUrl('SrcmtActividadesAcademicas_show', $aRow) . '\'>' . $aRow[$aColumns[$i]] . '</a>';
                        break;
                    case 'codigo_tipo_actividad':
                        $row[] = $aRow->getSrcmtTipoActividad()->getTipoActividad();
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
            $this->output['aaData'][] = $row;
        }
        $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');

        return $this->renderText(json_encode($this->output));
    }

    public function executeShow(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Recuperar Actividades Academicas')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }


        
        $this->ActividadAcademica = $this->getRoute()->getObject();
        $bd_in =array(0=>0);
        $BD_AA_rel = $this->ActividadAcademica->getSrcmtActividadAcademicaBrigadistaDado()->toArray();

        foreach ($BD_AA_rel as $key => $value)
        {
            $bd_in[] = $value['codigo_brigadista'];
        }

        $sQuery_BD = Doctrine_Core::getTable('SrcmtBrigadistasDado')
                ->createQuery('a')
                ->where('a.codigo_brigadista in ?', array($bd_in))
                ->orderBy('a.nacionalidad asc, a.cedula_identidad asc')
        ;
        $this->srcmt_brigadistas_dado = $sQuery_BD->execute();

        $mil_in =array(0=>0);
        $MIL_AA_rel = $this->ActividadAcademica->getSrcmtActividadAcademicaMiliciano()->toArray();

        foreach ($MIL_AA_rel as $key => $value)
        {
            $mil_in[] = $value['codigo_miliciano'];
        }

        $sQuery_MIL = Doctrine_Core::getTable('SrcmtMilicianos')
                ->createQuery('a')
                ->where('a.codigo_miliciano in ?', array($mil_in))
                ->orderBy('a.nacionalidad asc, a.cedula_identidad asc')
        ;
        $this->srcmt_milicianos = $sQuery_MIL->execute();
    }

    public function executeImprimirLista(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Recuperar Actividades Academicas')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }

        
        $this->ActividadAcademica = $this->getRoute()->getObject();
    }

    public function executeImprimirBrigadistas(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Recuperar Actividades Academicas')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }

        
        $this->ActividadAcademica = $this->getRoute()->getObject();
    }

    public function executeNew(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Crear Actividades Academicas')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }

        
        $this->form = new SrcmtActividadesAcademicasForm();
    }

    public function executeCreate(sfWebRequest $request) {
        
         if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Crear Actividades Academicas')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }

        $this->form = new SrcmtActividadesAcademicasForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Suprimir Actividades Academicas')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }

        
        $this->form = new SrcmtActividadesAcademicasForm($this->getRoute()->getObject());
    }

    public function executeUpdate(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Actualizar Actividades Academicas')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }

        
        $this->form = new SrcmtActividadesAcademicasForm($this->getRoute()->getObject());

        $this->processForm($request, $this->form);
        $this->redirect($request->getReferer());

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Suprimir Actividades Academicas')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }
        
        $request->checkCSRFProtection();

        $url = $request->getReferer();
//        $this->getRoute()->getObject()->delete();
        $this->actividad_academica = $this->getRoute()->getObject();
        $this->BrigadistasDado = $this->actividad_academica->getSrcmtActividadAcademicaBrigadistaDado();

        if ($this->BrigadistasDado->count() > 0) {
            $this->getUser()->setFlash('notice', 'La actividad "' . $this->actividad_academica . '" no se puede borrar porque tiene asignados Brigadistas Dado');

            $this->redirect($url);
        }
        $this->milicianos = $this->actividad_academica->getSrcmtActividadAcademicaMiliciano();
        if ($this->milicianos->count() > 0) {
            $this->getUser()->setFlash('notice', 'La actividad "' . $this->actividad_academica . '" no se puede borrar porque tiene asignados Brigadistas Estudiantiles');
            $this->redirect($url);
        }
        $this->actividad_academica->delete();

        $this->redirect('@SrcmtActividadesAcademicas');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $ActividadAcademica = $form->save();
            $this->getUser()->setFlash('notice', 'El registro se ha guardado satisfactoriamente', false);
//            $this->redirect('@SrcmtActividadesAcademicas_edit?codigo_actividad_academica=' . $ActividadAcademica->getCodigoActividadAcademica());
        } else {

            $this->getUser()->setFlash('error', 'Se detectaron errores al guardar!', false);
        }
    }

}
