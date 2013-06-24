<?php

/**
 * SrcmtActividadesIcm actions.
 *
 * @package    srcmt
 * @subpackage SrcmtActividadesIcm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SrcmtActividadesIcmActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin())
            {
                if (!$this->getUser()->hasPermission('Recuperar Actividades ICM'))
                {
                    $this->redirect('@sf_guard_secure');
                }
            }
        }
        else
        {
            $this->redirect('@sf_guard_secure');
        }


        $this->ActividadesICM = $this->getRoute()->getObjects();
        $this->formFilter = new SrcmtActividadesIcmFormFilter(
                        Array(),
                        Array(),
                        sfConfig::get('sf_csrf_secret'));
    }

    public function executeIndexAjax(sfWebRequest $request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin())
            {
                if (!$this->getUser()->hasPermission('Recuperar Actividades ICM'))
                {

                    $output = 'acceso denegado';

                    $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');

                    return $this->renderText(json_encode($output));
                }
            }
        }
        else
        {
            $this->redirect('@sf_guard_secure');
        }


        $this->ActividadesICM = $this->getRoute()->getObjects();

        $aColumns = $this->ActividadesICM->getTable()->getFieldNames(); // almacena los nombres de las columnas de la tabla

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = 'codigo_actividad_icm';

        /* DB table to use */
        $sTable = 'SrcmtActividadesIcm';

        $sfQuery = Doctrine::getTable($sTable)
                ->createQuery('a')
        ;

        /*
         * Paging
         */

        $iDisplayStart = $request->getGetParameter('iDisplayStart');
        $iDisplayLength = $request->getGetParameter('iDisplayLength');

        $sLimit = "";
        if (isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $sfQuery->limit($iDisplayLength)
                    ->offset($iDisplayStart)
            ;
        }

        /*
         * Ordering
         */
        $iSortCol_0 = $request->getGetParameter('iSortCol_0');

        if (isset($iSortCol_0))
        {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($request->getGetParameter('iSortingCols')); $i++)
            {
                if ($request->getGetParameter('bSortable_' . intval($request->getGetParameter('iSortCol_' . $i) == "true")))
                {
                    $sfQuery->addOrderBy($sfQuery->getRootAlias() . "." . $aColumns[intval($request->getGetParameter('iSortCol_' . $i))] . " " . $request->getGetParameter('sSortDir_' . $i))
                    ;
                }
            }
        }


        /*
         * Filtering
         */
        $sWhere = "";
        if ($request->getGetParameter('sSearch') != "")
        {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++)
            {

                $sfQuery->orWhere('quote_literal(' . $sfQuery->getRootAlias() . '.' . $aColumns[$i] . ')' . ' ILIKE \'%' . pg_escape_string($request->getGetParameter('sSearch')) . '%\'');
            }
        }

        /* Individual column filtering */
        for ($i = 0; $i < count($aColumns); $i++)
        {
            if ($request->getGetParameter('bSearchable_' . $i) == "true" && $request->getGetParameter('sSearch_' . $i) != '')
            {

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
        $iTotal = $this->ActividadesICM->count();

        /*
         * Output
         */
        $this->output = array(
            'sEcho' => intval($request->getGetParameter('sEcho')),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );

        foreach ($rResult as $i => $aRow)
        {
            $row = array();
            // Add the row ID and class to the object
            $row['DT_RowId'] = 'row_' . $aRow['codigo_actividad_icm'];

            for ($i = 0; $i < count($aColumns); $i++)
            {

                switch ($aColumns[$i])
                {
                    case 'fecha':
                        $row[] = $aRow->getFechaFormateado();
                        break;
                    case 'codigo_actividad_icm':

                        $row[] = '<a href=\'' . $this->generateUrl('SrcmtActividadesIcm_show', $aRow) . '\'>' . $aRow[$aColumns[$i]] . '</a>';
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

    public function executeShow(sfWebRequest $request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin())
            {
                if (!$this->getUser()->hasPermission('Recuperar Actividades ICM'))
                {
                    $this->redirect('@sf_guard_secure');
                }
            }
        }
        else
        {
            $this->redirect('@sf_guard_secure');
        }


        $this->ActividadICM = $this->getRoute()->getObject();

        $bd_in =array(0=>0);
        $BD_AICM_rel = $this->ActividadICM->getSrcmtActividadIcmBrigadistaDado()->toArray();

        foreach ($BD_AICM_rel as $key => $value)
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
        $MIL_AICM_rel = $this->ActividadICM->getSrcmtActividadIcmMiliciano()->toArray();

        foreach ($MIL_AICM_rel as $key => $value)
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


    public function executeNew(sfWebRequest $request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin())
            {
                if (!$this->getUser()->hasPermission('Crear Actividades ICM'))
                {
                    $this->redirect('@sf_guard_secure');
                }
            }
        }
        else
        {
            $this->redirect('@sf_guard_secure');
        }

        $this->form = new SrcmtActividadesIcmForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin())
            {
                if (!$this->getUser()->hasPermission('Crear Actividades ICM'))
                {
                    $this->redirect('@sf_guard_secure');
                }
            }
        }
        else
        {
            $this->redirect('@sf_guard_secure');
        }


        $this->form = new SrcmtActividadesIcmForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin())
            {
                if (!$this->getUser()->hasPermission('Suprimir Actividades ICM'))
                {
                    $this->redirect('@sf_guard_secure');
                }
            }
        }
        else
        {
            $this->redirect('@sf_guard_secure');
        }


        $this->form = new SrcmtActividadesIcmForm($this->getRoute()->getObject());
    }

    public function executeUpdate(sfWebRequest $request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin())
            {
                if (!$this->getUser()->hasPermission('Actualizar Actividades ICM'))
                {
                    $this->redirect('@sf_guard_secure');
                }
            }
        }
        else
        {
            $this->redirect('@sf_guard_secure');
        }

        $this->form = new SrcmtActividadesIcmForm($this->getRoute()->getObject());

        $this->processForm($request, $this->form);
        $this->redirect($request->getReferer());
        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin())
            {
                if (!$this->getUser()->hasPermission('Suprimir Actividades ICM'))
                {
                    $this->redirect('@sf_guard_secure');
                }
            }
        }
        else
        {
            $this->redirect('@sf_guard_secure');
        }


        $request->checkCSRFProtection();

//        $this->getRoute()->getObject()->delete();
        $url = $request->getReferer();
        $this->actividad_icm = $this->getRoute()->getObject();
        $this->BrigadistasDado = $this->actividad_icm->getSrcmtActividadIcmBrigadistaDado();

        if ($this->BrigadistasDado->count() > 0)
        {
            $this->getUser()->setFlash('notice', 'La actividad "' . $this->actividad_icm . '" no se puede borrar porque tiene asignados Brigadistas Dado');

            $this->redirect($url);
        }
        $this->milicianos = $this->actividad_icm->getSrcmtActividadIcmMiliciano();
        if ($this->milicianos->count() > 0)
        {
            $this->getUser()->setFlash('notice', 'La actividad "' . $this->actividad_icm . '" no se puede borrar porque tiene asignados Brigadistas Estudiantiles');
            $this->redirect($url);
        }
        $this->actividad_icm->delete();


        $this->redirect('@SrcmtActividadesIcm');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $ActividadICM = $form->save();
            $this->getUser()->setFlash('notice', 'El registro se ha guardado satisfactoriamente', false);
//			$this->redirect('@SrcmtActividadesIcm_edit?codigo_actividad_icm=' . $ActividadICM->getCodigoActividadIcm());
        }
        else
        {

            $this->getUser()->setFlash('error', 'Se detectaron errores al guardar!', false);
        }
    }

}
