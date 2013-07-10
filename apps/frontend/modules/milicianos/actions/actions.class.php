<?php

/**
 * milicianos actions.
 *
 * @package    srcmt
 * @subpackage milicianos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class milicianosActions extends sfActions {

  public function executeIndex(sfWebRequest $request) {
    if ($this->getUser()->isAuthenticated()) {
      //accion autenticado
      if (!$this->getUser()->isSuperAdmin()) {
        if (!$this->getUser()->hasPermission('Recuperar Brigadistas Estudiantiles')) {
          $this->redirect('@sf_guard_secure');
        }
      }
    } else {
      $this->redirect('@sf_guard_secure');
    }
    $titulos_y_campos = SrcmtMilicianos::getArregloTitulosCampos();

    $this->milicianos = $this->getRoute()->getObjects();
    $titulosCampos = SrcmtMilicianos::getTitulosCampos();

    $this->casillas_de_campos = Array();
    foreach ($titulosCampos as $key => $titulo) {
      $this->casillas_de_campos[$key] = new checkBoxClass($titulo, $titulo,
          $titulo, $titulo);
    }

    $this->formFilter = new SrcmtMilicianosFormFilter(
        Array(),
        Array('titulos_y_campos' => $titulos_y_campos, 'allow_extra_fields' => true),
        sfConfig::get('sf_csrf_secret'));
  }

  public function executeIndexAjax(sfWebRequest $request) {
    if ($this->getUser()->isAuthenticated()) {
      //accion autenticado
      if (!$this->getUser()->isSuperAdmin()) {
        if (!$this->getUser()->hasPermission('Recuperar Brigadistas Estudiantiles')) {

          $output = 'acceso denegado';

          $this->getResponse()->setHttpHeader('Content-Type',
              'application/json; charset=utf-8');

          return $this->renderText(json_encode($output));
        }
      }
    } else {
      $this->redirect('@sf_guard_secure');
    }


    $this->milicianos = $this->getRoute()->getObjects();
    /* Total data set length */
    $iTotal = $this->milicianos->count();
    $temparray = $this->milicianos->getTable()->getFieldNames();

    foreach ($temparray as $key => $value) {

      switch ($value) {
        case 'foto':
          continue;
          break;
        case 'componente':
          continue;
          break;
        case 'jerarquia':
          continue;
          break;
        case 'contingente':
          continue;
          break;
        case 'arma_servicio':
          continue;
          break;
        case 'batallon_unidad_origen':
          continue;
          break;
        default:
          $newarray[] = $value;
          break;
      }
    }

    $aColumns = $newarray; // almacena los nombres de las columnas de la tabla
    unset($temparray, $newarray);

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = 'codigo_miliciano';

    /* DB table to use */
    $sTable = 'SrcmtMilicianos';

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
        if ($request->getGetParameter('bSortable_' . intval($request->getGetParameter('iSortCol_' . $i)
                    == "true"))) {
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
      if ($request->getGetParameter('bSearchable_' . $i) == "true" && $request->getGetParameter('sSearch_' . $i)
          != '') {

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
      $row['DT_RowId'] = 'row_' . $aRow['codigo_miliciano'];

      for ($i = 0; $i < count($aColumns); $i++) {

        switch ($aColumns[$i]) {
          case 'fecha_nacimiento':
            $row[] = $aRow->getFechaNacimientoFormateado();
            break;
          case 'codigo_miliciano':

            $row[] = '<a href=\'' . $this->generateUrl('milicianos_show', $aRow) . '\'>' . $aRow[$aColumns[$i]] . '</a>';
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
          case 'programa_formacion_grado':
            $row[] = $aRow->getSrcmtPfg()->getPfg();
            break;
          case 'sedes':
            $row[] = $aRow->getSrcmtSedes()->getSedes();
            break;
          case 'porte_armas':
            $row[] = $aRow->getPorteArmasFormateado();
            break;
          case 'posee_licencia':
            $row[] = $aRow->getPoseeLicenciaFormateado();
            break;
          case 'posee_vehiculo':
            $row[] = $aRow->getPoseeVehiculoFormateado();
            break;
          case 'practica_deporte':
            $row[] = $aRow->getPracticaDeporteFormateado();
            break;
          case 'participa_actividad_cultural':
            $row[] = $aRow->getParticipaActividadCulturalFormateado();
            break;
          case 'trabaja_si_no':
            $row[] = $aRow->getTrabajaSiNoFormateado();
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
    $this->getResponse()->setHttpHeader('Content-Type',
        'application/json; charset=utf-8');

    return $this->renderText(json_encode($this->output));
  }

  public function executeShow(sfWebRequest $request) {
    if ($this->getUser()->isAuthenticated()) {
      //accion autenticado
      if (!$this->getUser()->isSuperAdmin()) {
        if (!$this->getUser()->hasPermission('Recuperar Brigadistas Estudiantiles')) {
          $this->redirect('@sf_guard_secure');
        }
      }
    } else {
      $this->redirect('@sf_guard_secure');
    }

    $this->miliciano = $this->getRoute()->getObject();
  }

  public function executeShowActividades(sfWebRequest $request) {
    if ($this->getUser()->isAuthenticated()) {
      //accion autenticado
      if (!$this->getUser()->isSuperAdmin()) {
        if (!$this->getUser()->hasPermission('Recuperar Brigadistas Estudiantiles')) {
          $this->redirect('@sf_guard_secure');
        }
      }
    } else {
      $this->redirect('@sf_guard_secure');
    }

    $this->miliciano = $this->getRoute()->getObject();

    $aa_in = array(0 => 0);
    $MIL_AA_rel = $this->miliciano->getSrcmtActividadAcademicaMiliciano()->toArray();
    foreach ($MIL_AA_rel as $key => $value) {
      $aa_in[] = $value['codigo_actividad_academica'];
    }
    $sQuery_AA = Doctrine_Core::getTable('SrcmtActividadesAcademicas')
        ->createQuery('a')
        ->where('a.codigo_actividad_academica in ?', array($aa_in))
        ->orderBy('a.fecha desc, a.codigo_tipo_actividad asc')
    ;
    $this->ActividadesAcademicas = $sQuery_AA->execute();

    $aicm_in = array(0 => 0);
    $MIL_AICM_rel = $this->miliciano->getSrcmtActividadIcmMiliciano()->toArray();
    foreach ($MIL_AICM_rel as $key => $value) {
      $aicm_in[] = $value['codigo_actividad'];
    }
    $sQuery_AICM = Doctrine_Core::getTable('SrcmtActividadesIcm')
        ->createQuery('a')
        ->where('a.codigo_actividad_icm in ?', array($aicm_in))
        ->orderBy('a.fecha desc, a.codigo_tipo_actividad asc')
    ;
    $this->ActividadesICM = $sQuery_AICM->execute();
  }

  public function executeImprimirActividades(sfWebRequest $request) {
    if ($this->getUser()->isAuthenticated()) {
      //accion autenticado
      if (!$this->getUser()->isSuperAdmin()) {
        if (!$this->getUser()->hasPermission('Recuperar Brigadistas Estudiantiles')) {
          $this->redirect('@sf_guard_secure');
        }
      }
    } else {
      $this->redirect('@sf_guard_secure');
    }


    $this->miliciano = Doctrine_Core::getTable('SrcmtMilicianos')->find(array($request->getParameter('codigo_miliciano')));
    $this->forward404Unless($this->miliciano);
  }

  public function executeNew(sfWebRequest $request) {
    if ($this->getUser()->isAuthenticated()) {
      //accion autenticado
      if (!$this->getUser()->isSuperAdmin()) {
        if (!$this->getUser()->hasPermission('Crear Brigadista Estudiantil')) {
          $this->redirect('@sf_guard_secure');
        }
      }
    } else {
      $this->redirect('@sf_guard_secure');
    }


    $this->form = new SrcmtMilicianosForm();
  }

  public function executeCreate(sfWebRequest $request) {
    if ($this->getUser()->isAuthenticated()) {
      //accion autenticado
      if (!$this->getUser()->isSuperAdmin()) {
        if (!$this->getUser()->hasPermission('Crear Brigadista Estudiantil')) {
          $this->redirect('@sf_guard_secure');
        }
      }
    } else {
      $this->redirect('@sf_guard_secure');
    }


    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SrcmtMilicianosForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request) {
    if ($this->getUser()->isAuthenticated()) {
      //accion autenticado
      if (!$this->getUser()->isSuperAdmin()) {
        if (!$this->getUser()->hasPermission('Actualizar Brigadistas Estudiantiles')) {
          $this->redirect('@sf_guard_secure');
        }
      }
    } else {
      $this->redirect('@sf_guard_secure');
    }


    $miliciano = $this->getRoute()->getObject();

    $this->form = new SrcmtMilicianosForm(
        $miliciano,
        array('codigo_estado' => $miliciano->getCodigoEstado(),
      'codigo_municipio' => $miliciano->getCodigoMunicipio())
    );
  }

  public function executeUpdate(sfWebRequest $request) {
    if ($this->getUser()->isAuthenticated()) {
      //accion autenticado
      if (!$this->getUser()->isSuperAdmin()) {
        if (!$this->getUser()->hasPermission('Actualizar Brigadistas Estudiantiles')) {
          $this->redirect('@sf_guard_secure');
        }
      }
    } else {
      $this->redirect('@sf_guard_secure');
    }



    $miliciano = $this->getRoute()->getObject();

    $this->form = new SrcmtMilicianosForm(
        $miliciano,
        array('codigo_estado' => $miliciano->getCodigoEstado(),
      'codigo_municipio' => $miliciano->getCodigoMunicipio())
    );

    $this->processForm($request, $this->form);
    // $this->redirect($request->getReferer());

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request) {
    if ($this->getUser()->isAuthenticated()) {
      //accion autenticado
      if (!$this->getUser()->isSuperAdmin()) {
        if (!$this->getUser()->hasPermission('Suprimir Brigadistas Estudiantiles')) {
          $this->redirect('@sf_guard_secure');
        }
      }
    } else {
      $this->redirect('@sf_guard_secure');
    }


    $request->checkCSRFProtection();

//        $this->getRoute()->getObject()->delete();
    $this->miliciano = $this->getRoute()->getObject();
    $this->ActividadesIcm = $this->miliciano->getSrcmtActividadIcmMiliciano();

    if ($this->ActividadesIcm->count() > 0) {
      $this->getUser()->setFlash('notice',
          'El brigadista estudiantil "' . $this->miliciano . '" no se puede borrar porque tiene asignadas actividades de Integracion Civico-Militar');
      $this->redirect($request->getReferer());
    }
    $this->ActividadesAcademicas = $this->miliciano->getSrcmtActividadAcademicaMiliciano();
    if ($this->ActividadesAcademicas->count() > 0) {
      $this->getUser()->setFlash('notice',
          'El brigadista estudiantil "' . $this->miliciano . '" no se puede borrar porque tiene asignadas actividades Acad&eacute;micas');
      $this->redirect($request->getReferer());
    }
    $this->miliciano->delete();

    $this->redirect('@milicianos');
  }

  public function executeEstadisticasSet(sfWebRequest $request) {



    if ($this->getUser()->isAuthenticated()) {
//accion autenticado
      if (!$this->getUser()->isSuperAdmin()) {
        if (!$this->getUser()->hasPermission('Recuperar Brigadistas Estudiantiles')) {
          $this->redirect('@sf_guard_secure');
        }
      }
    } else {
      $this->redirect('@sf_guard_secure');
    }
//el codigo siguientes es unicamente de prueba. hay que modificarlo
    $titulos_y_campos = SrcmtMilicianos::getSelectTitulosCampos();

    $this->formFilter = new SrcmtMilicianosFormFilterAggregate(
        Array(),
        Array('titulos_y_campos' => $titulos_y_campos, 'allow_extra_fields' => true),
        sfConfig::get('sf_csrf_secret'));

    if ($this->getRequest()->getMethod() == sfRequest::POST) {
      $srcmt_milicianos_filter = $request->getParameter($this->formFilter->getName());

      $this->setFilters($srcmt_milicianos_filter);
    }
  }

  protected function processForm(sfWebRequest $request, sfForm $form) {
    $form->bind($request->getParameter($form->getName()),
        $request->getFiles($form->getName()));
    if ($form->isValid()) {
      $miliciano = $form->save();
      $this->getUser()->setFlash('notice',
          'El registro se ha guardado satisfactoriamente', false);
      //            $this->redirect('milicianos/edit?codigo_miliciano=' . $miliciano->getCodigoMiliciano());
    } else {

      $this->getUser()->setFlash('error', 'Se detectaron errores al guardar!',
          false);
    }
  }

  protected function getOrderBy() {
    return $this->getUser()->getAttribute('srcmt_milicianos.filters',
            $this->getOrderByDefaults(), 'modulo_milicianos');
  }

  protected function getFilters() {
    return $this->getUser()->getAttribute('srcmt_milicianos.filters',
            $this->getFilterDefaults(), 'modulo_milicianos');
  }

  protected function setFilters(array $filters) {
    return $this->getUser()->setAttribute('srcmt_milicianos.filters', $filters,
            'modulo_milicianos');
  }

  protected function getFilterDefaults() {
    return array();
  }

  protected function getOrderByDefaults() {
    return array();
  }

//
}
