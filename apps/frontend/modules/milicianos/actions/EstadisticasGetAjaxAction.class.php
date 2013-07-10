<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class EstadisticasGetAjaxAction extends sfAction {

    public function execute($request) {
        if ($this->getUser()->isAuthenticated()) {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin()) {
                if (!$this->getUser()->hasPermission('Recuperar Brigadistas Estudiantiles')) {

                    $output = 'acceso denegado';

                    $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');

                    return $this->renderText(json_encode($output));
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }

        $titulos_y_campos = SrcmtMilicianos::getSelectTitulosCampos();
        $this->formFilter = new SrcmtMilicianosFormFilterAggregate(
                        Array(), Array('titulos_y_campos' => $titulos_y_campos, 'allow_extra_fields' => true),
                        sfConfig::get('sf_csrf_secret'));

        $this->milicianos = $this->getRoute()->getObjects();
        /* Total data set length */
        $iTotal = $this->milicianos->count();
        $temparray = $this->milicianos->getTable()->getFieldNames();

        $this->query = array();

        foreach ($temparray as $key => $value) {

            switch ($value) {
                case 'foto':
                    continue;
                    break;

                case 'codigo_miliciano':
                    continue;
                    break;
                case 'cedula_identidad':
                    continue;
                    break;

                case 'primer_apellido':
                    continue;
                    break;
                case 'segundo_apellido':
                    continue;
                    break;
                case 'primer_nombre':
                    continue;
                    break;
                case 'segundo_nombre':
                    continue;
                    break;

                case 'direccion':
                    continue;
                    break;
                case 'telefono_local':
                    continue;
                    break;
                case 'movil':
                    continue;
                    break;
                case 'correo_electronico':
                    continue;
                    break;
                case 'direccion_emergencia':
                    continue;
                    break;

                case 'telefono_emergencia':
                    continue;
                    break;

                case 'especialidad':
                    continue;
                    break;
                case 'idiomas':
                    continue;
                    break;

                case 'nivel_dominio_idioma':
                    continue;
                    break;

                case 'discapacidad':
                    continue;
                    break;
                case 'aldea':
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

                case 'profesion':
                    continue;
                    break;

                case 'oficio':
                    continue;
                    break;

                case 'nombre_empresa':
                    continue;
                    break;

                case 'direccion_oficina':
                    continue;
                    break;

                case 'telefono_oficina':
                    continue;
                    break;

                case 'tipo_vehiculo':
                    continue;
                    break;

                case 'modelo_vehiculo':
                    continue;
                    break;

                case 'numero_placa':
                    continue;
                    break;

                case 'grado_licencia':
                    continue;
                    break;

                case 'numero_porte_armas':
                    continue;
                    break;

                case 'tipo_armamento':
                    continue;
                    break;

                case 'calibre_armamento':
                    continue;
                    break;

                case 'signos_particulares':
                    continue;
                    break;

                case 'talla_calzado':
                    continue;
                    break;

                case 'estatura':
                    continue;
                    break;

                case 'peso':
                    continue;
                    break;

                case 'color_cabello':
                    continue;
                    break;

                case 'color_piel':
                    continue;
                    break;

                case 'alergias':
                    continue;
                    break;

                case 'agrupacion_social':
                    continue;
                    break;

                case 'misiones':
                    continue;
                    break;

                case 'cooperativas':
                    continue;
                    break;
                case 'deporte':
                    continue;
                    break;

                case 'actividad_cultural':
                    continue;
                    break;

                case 'apellidos_beneficiario':
                    continue;
                    break;

                case 'nombres_beneficiario':
                    continue;
                    break;

                case 'cedula_beneficiario':
                    continue;
                    break;
                case 'telefono_beneficiario':
                    continue;
                    break;
                case 'created_at':
                    continue;
                    break;

                case 'updated_at':
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

        $srcmt_milicianos_filter = $this->getUser()->getAttribute('srcmt_milicianos.filters', $this->getFilterDefaults(), 'modulo_milicianos');



        ////////////////////////////////////////////////////////////////////
        if (!(count($srcmt_milicianos_filter) <= 1)) {

            $columnas = array();
            if (array_key_exists('columnas', $srcmt_milicianos_filter)) {
                $columnas = $srcmt_milicianos_filter['columnas'];
                $temparray = array();
                foreach ($srcmt_milicianos_filter as $key => $value) {
                    if ($key == 'columnas') {
                        continue;
                    } else {
                        $temparray[$key] = $value;
                    }
                }
                $srcmt_milicianos_filter = $temparray;
                /*
                 * Conectando al formulario de filtro local, y los valores de la petición
                 * guardados en el arreglo.
                 */
                $this->formFilter->bind($srcmt_milicianos_filter);
            }

            /*
             * Validación del formulario de filtro y construcción de la consulta base
             */
            if ($this->formFilter->isValid()) {

                $this->query = Doctrine_Query::create()
                        ->select('count(a.codigo_miliciano)')
                        ->from('SrcmtMilicianos a')
                ;

                $consulta = $this->query->getSqlQuery();

//        $this->query = $this->formFilter->buildQuery(
//            $this->formFilter->getValues()
//        );
            } else {
                $error = $this->formFilter->getErrorSchema()->getMessage();
                $this->getUser()->setFlash('error', 'Ha ocurrido un error: ' . $error);
                $this->forward('homepage', 'index');
            }
            /*
             * Asignación de las columnas a seleccionar de la consulta
             * y definición de los encabezados por defecto y con filtros
             */

            $seleccion = array();
            $titulosEncabezados = array();
//            $rootalias = $this->query->getRootAlias();

 //           $this->query->addSelect(sprintf('count(%s.%s)', $this->query->getRootAlias(), 'codigo_miliciano'));

            if (!$columnas == array()) {

                foreach ($columnas as $key => $value) {

                    $this->query = $this->formFilter->addSelectGroupByParameter($this->query, $key);

//                    $this->query->addSelect($rootalias . '.' . $key);
                    $titulosEncabezados[] = array_search($key, $titulos_y_campos);
                }
                $seleccion = $columnas;
            } else {

                foreach ($titulos_y_campos as $key => $value) {

                    $this->query = $this->formFilter->addSelectGroupByParameter($this->query, $value);
//                    $this->query->addSelect($rootalias . '.' . $value);
                    $titulosEncabezados[] = $key;
                    $seleccion[$value] = $value;
                }
            }
            $sfQuery_sin_limit = $this->query; // usada posteriormente para obtener el número de registros coincidentes con los criterios

            $consulta = $this->query->getSqlQuery();


            $rResult = $this->query->execute();

            /* Data set length after filtering */
            $sfQuery_sin_limit->removeDqlQueryPart('limit')
                    ->removeDqlQueryPart('offset');

            $iFilteredTotal = $sfQuery_sin_limit->execute()->count();

            ////////////////////////////////////////////////////////////////////
        } else {

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
        }

        /*
         * Output
         */
        $this->output = array(
            'sEcho' => intval($request->getGetParameter('sEcho')),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aoColumns' => array(),
//                'sName' => array()
//            ),
            'aaData' => array()
        );

//        $titulos_data_table = array();
        for ($i = 0; $i < count($aColumns); $i++) {
            $this->output['aoColumns'][]['sName'] = array_search($aColumns[$i], $titulos_y_campos);
        }



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

        $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');

        return $this->renderText(json_encode($this->output));
    }

    protected function getFilterDefaults() {
        return array();
    }

}

?>
