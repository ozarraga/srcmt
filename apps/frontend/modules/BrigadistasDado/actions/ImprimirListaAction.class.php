<?php

class ImprimirListaAction extends sfAction {

    public function execute($request) {
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

        //almacena una relacion de titulos y campos
        $titulos_y_campos = SrcmtBrigadistasDado::getArregloTitulosCampos();

        $this->formFilter = new SrcmtBrigadistasDadoFormFilter(
                        array(),
                        array('titulos_y_campos' => $titulos_y_campos, 'allow_extra_fields' => true),
                        sfConfig::get('sf_csrf_secret'));

        $srcmt_brigadistas_dado_filter = $request->getParameter($this->formFilter->getName());

        $columnas = array();
        if (array_key_exists('columnas', $srcmt_brigadistas_dado_filter)) {
            $columnas = $srcmt_brigadistas_dado_filter['columnas'];
            $temparray = array();
            foreach ($srcmt_brigadistas_dado_filter as $key => $value) {
                if ($key == 'columnas') {
                    continue;
                } else {
                    $temparray[$key] = $value;
                }
            }
            $srcmt_brigadistas_dado_filter = $temparray;
        }

        /*
         * Conectando al formulario de filtro local, y los valores de la petición
         * guardados en el arreglo.
         */
        if ($request->hasParameter($this->formFilter->getName())) {
            $this->formFilter->bind($srcmt_brigadistas_dado_filter);
        } else {

            $this->getUser()->setFlash('error', 'Ha ocurrido un error');
            $this->forward('homepage', 'index');
        }

        /*
         * Validación del formulario de filtro y construcción de la consulta base
         */
        if ($this->formFilter->isValid()) {
            $query = $this->formFilter->buildQuery(
                    $this->formFilter->getValues()
            );
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
        $rootalias = $query->getRootAlias();
        if (!$columnas == array()) {
            $index = 0;
            foreach ($columnas as $key => $value) {
                if ($index >= 10) {
                    break;
                }
                $query->addSelect($rootalias . '.' . $key);
                $titulosEncabezados[] = array_search($key, $titulos_y_campos);
                $index++;
            }
            $seleccion = $columnas;
        } else {
            $index = 0;
            foreach ($titulos_y_campos as $key => $value) {
                if ($index >= 10) {
                    break;
                }
                $query->addSelect($rootalias . '.' . $value);
                $titulosEncabezados[] = $key;
                $seleccion[$value] = $value;
                $index++;
            }
        }

        $tituloReporte = "Listado de Brigadistas Directivos, Administrativos, Docentes y Obreros.";

        $consulta = $query->getSqlQuery();

        $srcmt_brigadistas_dado = $query->execute();
        $output = array();
        foreach ($srcmt_brigadistas_dado as $i => $aRow) {
            $row = array();
            // Add the row ID and class to the object
            //for ($i = 0; $i < count($seleccion); $i++) {
            foreach ($seleccion as $campo => $value) {


                switch ($campo) {
                    case 'codigo_brigadista':

                        $row[$campo] = $aRow->getCodigoBrigadista();
                        break;
                    case 'cedula_identidad':
                        //$titulosEncabezados_mil[$campo] = array_search($campo, $titulos_y_campos_mil);
                        $row[$campo] = number_format($aRow->getCedulaIdentidad(), 0, ',', '.');
                        break;
                    case 'fecha_nacimiento':
                        $row[$campo] = $aRow->getFechaNacimientoFormateado();
                        break;
                    case 'codigo_estado':

                        $row[$campo] = mb_convert_case($aRow->getEstado(), MB_CASE_TITLE, "UTF-8");
                        break;
                    case 'codigo_municipio':

                        $row[$campo] = mb_convert_case($aRow->getMunicipio(), MB_CASE_TITLE, "UTF-8");
                        ;
                        break;
                    case 'codigo_parroquia':

                        $row[$campo] = mb_convert_case($aRow->getParroquia(), MB_CASE_TITLE, "UTF-8");
                        break;
                    case 'codigo_ciudad':

                        $row[$campo] = mb_convert_case($aRow->getCiudad(), MB_CASE_TITLE, "UTF-8");
                        ;
                        break;
                    case 'sedes':
                        $row[$campo] = $aRow->getSrcmtSedes()->getSedes();
                        break;
                    case 'created_at':
                        $row[$campo] = $aRow->getCreatedAtFormateado();
                        break;
                    case 'updated_at':
                        $row[$campo] = $aRow->getUpdatedAtFormateado();
                        break;
                    default:
                        $row[$campo] = $aRow->get($campo);
                        break;
                }
            }
            $output[] = $row;
        }

        $this->srcmt_brigadistas_dado = $output;
        unset($srcmt_brigadistas_dado, $output);

        // variables para subtitulos de fechas "desde" y "hasta"
        $createdAt = $srcmt_brigadistas_dado_filter['created_at'];
        $updatedAt = $srcmt_brigadistas_dado_filter['updated_at'];
        $CreadoDesdeFecha = '';
        $CreadoHastaFecha = '';
        $ActualizadoDesdeFecha = '';
        $ActualizadoHastaFecha = '';

        // Titulo dinamico fecha de creacion "Desde"
        if (isset($createdAt['from'])) {

            if (($createdAt['from']['year'] != false)
                    && ($createdAt['from']['month'] != false)
                    && ($createdAt['from']['day']) != false) {

                $fecha = new DateTime($createdAt['from']['year'] . '-' . $createdAt['from']['month'] . '-' . $createdAt['from']['day']);
                $CreadoDesdeFecha = "desde el " . $fecha->format('d/m/Y');
            }
        }

        // Titulo dinamico fecha de creacion "Hasta"
        if (isset($createdAt['to'])) {
            if (($createdAt['to']['year'] != false)
                    && ($createdAt['to']['month'] != false)
                    && ($createdAt['to']['day'] != false)) {
                $fecha = new DateTime($createdAt['to']['year'] . '-' . $createdAt['to']['month'] . '-' . $createdAt['to']['day']);
                $CreadoHastaFecha = "hasta el " . $fecha->format('d/m/Y');
            }
        }

        // Titulo dinamico fecha de actualizacion "Desde"
        if (isset($updatedAt['from'])) {
            if (($updatedAt['from']['year'] != false)
                    && ($updatedAt['from']['month'] != false)
                    && ($updatedAt['from']['day'] != false)) {
                $fecha = new DateTime($updatedAt['from']['year'] . '-' . $updatedAt['from']['month'] . '-' . $updatedAt['from']['day']);
                $ActualizadoDesdeFecha = "desde el " . $fecha->format('d/m/Y');
            }
        }

        // Titulo dinamico fecha de actualizacion "Hasta"
        if (isset($updatedAt['to'])) {
            if (($updatedAt['to']['year'] != false)
                    && ($updatedAt['to']['month'] != false)
                    && ($updatedAt['to']['day'] != false)) {
                $fecha = new DateTime($updatedAt['to']['year'] . '-' . $updatedAt['to']['month'] . '-' . $updatedAt['to']['day']);
                $ActualizadoHastaFecha = "hasta el " . $fecha->format('d/m/Y');
            }
        }

        $TituloCreado = '';

        if (!(($CreadoDesdeFecha == '') && ($CreadoHastaFecha == ''))) {
            $TituloCreado = "Registrados " . $CreadoDesdeFecha . " " . $CreadoHastaFecha;
        }

        $TituloActualizado = '';

        if (!(($ActualizadoDesdeFecha == '') && ($ActualizadoHastaFecha == ''))) {
            $TituloActualizado = "Actualizados " . $ActualizadoDesdeFecha . " " . $ActualizadoHastaFecha;
        }

        $config = sfTCPDFPluginConfigHandler::loadConfig('Srcmt_config_horizontal');

        sfTCPDFPluginConfigHandler::includeLangFile('es');

        $autor = $this->getUser()->getName();
        $doc_title = "Listado de Brigadistas DADO";
        $doc_subject = "Listado de Brigadistas DADO";
        $doc_keywords = "Brigadistas, Directivos, Administrativos, Docentes, Obreros";
        $html_content_titulos = $tituloReporte . "\n" . $TituloCreado . "\n" . $TituloActualizado;

        $aa = set_time_limit(120);

        //create new PDF document (document units are set by default to millimeters)
//		$pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);
        $pdf = new SrcmtTcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor($autor);
        $pdf->SetTitle($doc_title);
        $pdf->SetSubject($doc_subject);
        $pdf->SetKeywords($doc_keywords);

        $pdf->SetHeaderData(
                PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH
        );

        //set margins
        $pdf->SetMargins(
                PDF_MARGIN_LEFT, 75, PDF_MARGIN_RIGHT
        );

        //set auto page breaks
        $pdf->SetAutoPageBreak(
                true, PDF_MARGIN_BOTTOM
        );
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); //set image scale factor

        $pdf->setHeaderFont(Array(
            PDF_FONT_NAME_MAIN,
            '',
            PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(
            PDF_FONT_NAME_DATA,
            '',
            PDF_FONT_SIZE_DATA));
        $pdf->setFontSubsetting(false);
        $pdf->SetFont(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA);

        $paddings = $pdf->getCellPaddings();
        $pdf->setCellPaddings(1, $paddings['T'], 1, 1);

        $Mifont = $pdf->getFontFamily();
        $MiStylo = $pdf->getFontStyle();
        $MiFontSize = $pdf->getFontSizePt();

        $AnchoImprimible = $pdf->AnchoImprimible(); //Ancho del sector imprimible que excluye los márgenes
        $AltoImprimible = $pdf->AltoImprimible(); //Alto del sector imprimible que excluye los márgenes
        $MaxColumnas = 10; //Máximo número de columnas en el reporte
        $NumCampos = count($seleccion); //Cuenta el definitivo número de campos seleccionado.
        $AnchoMinimoDeColumna = $AnchoImprimible / $MaxColumnas;
        $AnchoMaximoDeColumna = $AnchoImprimible / $NumCampos;

        //Codigo para determinar el ancho de las columnas y elalto de las filas
        $ancho_columnas = array();
        $alto_filas = array();

        foreach ($this->srcmt_brigadistas_dado as $claveObjeto => $Registro) {
            $indice = 0;
            $temp_alto_filas = array();
            foreach ($seleccion as $campo => $titulo) {

                if (!$Registro[$campo]) {
                    //$Registro[$campo]='.';
                    $this->srcmt_brigadistas_dado[$claveObjeto][$campo] = '';
                }

                if ($indice >= $MaxColumnas) {
                    break;
                }
                $AnchoCampo = $pdf->GetStringWidth(html_entity_decode($Registro[$campo], ENT_QUOTES, 'UTF-8'), $Mifont, $MiStylo, $MiFontSize);

                if ($AnchoCampo > $AnchoMaximoDeColumna) {
                    $ancho_columnas[$indice] = $AnchoMaximoDeColumna;
                } elseif ($AnchoCampo < $AnchoMinimoDeColumna) {
                    $ancho_columnas[$indice] = $AnchoMinimoDeColumna;
                } else {
                    if (isset($ancho_columnas[$indice])) {
                        if ($AnchoCampo > $ancho_columnas[$indice]) {
                            $ancho_columnas[$indice] = $AnchoCampo;
                        }
                    } else {
                        $ancho_columnas[$indice] = $AnchoCampo;
                    }
                }
                $AltoCampo = $pdf->GetStringHeight($ancho_columnas[$indice], html_entity_decode($Registro[$campo], ENT_QUOTES, 'UTF-8'));

                $AltoCampo = round($AltoCampo, 0, PHP_ROUND_HALF_DOWN) + 1;
                $temp_alto_filas[$indice] = $AltoCampo;
                $indice++;
            }
            $alto_filas[$claveObjeto] = max($temp_alto_filas);
        }

        if ($AnchoMinimoDeColumna > $AnchoMaximoDeColumna) {
            $this->getUser()->setFlash('notice', 'La cantidad de caracteres de los campos seleccionados sobrepasa el ancho del informe, reduzca los campos seleccionados');
            $this->redirect('BrigadistasDado/index');
        };

        $pdf->__set('encabezado_tituloReporte', $tituloReporte);
        $pdf->__set('encabezado_tituloCreado', $TituloCreado);
        $pdf->__set('encabezado_tituloActualizado', $TituloActualizado);
        $pdf->__set('encabezado_titulosEncabezados', $titulosEncabezados);

        $pdf->__set('AnchoImprimible', $AnchoImprimible);
        $pdf->__set('AltoImprimible', $AltoImprimible);
        $pdf->__set('MaxColumnas', $MaxColumnas);
        $pdf->__set('NumCampos', $NumCampos);
        $pdf->__set('AnchoMinimoDeColumna', $AnchoMinimoDeColumna);
        $pdf->__set('AnchoMaximoDeColumna', $AnchoMaximoDeColumna);

        $pdf->__set('ancho_columnas', $ancho_columnas);
        $pdf->__set('alto_filas', $alto_filas);
        $pdf->__set('seleccion', $seleccion);

        $pdf->headerCallback = function ($pdf) {
                    $tituloReporte = $pdf->__get('encabezado_tituloReporte');
                    $TituloCreado = $pdf->__get('encabezado_tituloCreado');
                    $TituloActualizado = $pdf->__get('encabezado_tituloActualizado');
                    $titulosEncabezados = $pdf->__get('encabezado_titulosEncabezados');

                    $AnchoImprimible = $pdf->__get('AnchoImprimible');
                    $AltoImprimible = $pdf->__get('AltoImprimible');
                    $MaxColumnas = $pdf->__get('MaxColumnas');
                    $NumCampos = $pdf->__get('NumCampos');
                    $AnchoMinimoDeColumna = $pdf->__get('AnchoMinimoDeColumna');
                    $AnchoMaximoDeColumna = $pdf->__get('AnchoMaximoDeColumna');

                    $ancho_columnas = $pdf->__get('ancho_columnas');
                    $alto_filas = $pdf->__get('alto_filas');
                    $seleccion = $pdf->__get('seleccion');


                    // Logo
                    $image_file = K_PATH_IMAGES . PDF_HEADER_LOGO;
                    $pdf->Image($image_file, 10, 10, PDF_HEADER_LOGO_WIDTH, '', '', '', 'T', false, 300, 'C', false, false, 0, 'CB', false, false);
                    $pdf->Ln(30, true);

                    $pdf->SetFont('verdana', 'B', 10);
                    // Titulos
                    $pdf->Cell(0, 5, $tituloReporte, 0, false, 'C', 0, '', 0, false, 'M', 'M');
                    $pdf->Ln();
                    $pdf->Cell(0, 5, $TituloCreado, 0, false, 'C', 0, '', 0, false, 'M', 'M');
                    $pdf->Ln();
                    $pdf->Cell(0, 5, $TituloActualizado, 0, false, 'C', 0, '', 0, false, 'M', 'M');
                    $pdf->Ln();
                    $pdf->Ln();
                    $pdf->Ln();

                    $y = $pdf->getY();
                    $indice = 0;
                    // Asignar fuente
                    $pdf->SetFont('verdana', 'B', 7);

                    foreach ($titulosEncabezados as $key => $contenido) {
                        if ($indice >= $MaxColumnas) {
                            break;
                        }
                        if (!isset($ancho_columnas[$indice])) {
                            $ancho_columnas[$indice] = $AnchoMinimoDeColumna;
                        }
                        $pdf->MultiCell($ancho_columnas[$indice], 10, html_entity_decode($contenido, ENT_QUOTES, 'UTF-8'), 1, 'C', false, 0, '', '', true, 0, false, true, 0, 'T', false);
                        $indice++;
                    }
                };

        $pdf->footerCallback = function ($pdf) {
                    $Pie = 'La Revoluci&oacute;n en Esencia es Educaci&oacute;n, la Educaci&oacute;n es Luz de la Defensa...';

                    $Margenes = $pdf->getMargins();
                    $cur_y = $pdf->GetY();
                    $pdf->SetTextColor(0, 0, 0);
                    //set style for cell border
                    $line_width = 0.85 / $pdf->getScaleFactor();
                    $pdf->SetLineStyle(array('width' => $line_width, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));

                    $pagenumtxt = html_entity_decode('P&aacute;gina', ENT_QUOTES, 'UTF-8') . ' ' . $pdf->getAliasNumPage() . ' / ' . $pdf->getAliasNbPages();

                    $pdf->SetY($cur_y);

                    $pdf->SetX($Margenes['right']);

                    $pdf->Cell(0, 0, html_entity_decode($Pie, ENT_QUOTES, 'UTF-8'), 'T', 0, 'C');
                    $pdf->Ln();
                    //Print page number
                    if ($pdf->getRTL()) {
                        $pdf->SetX($Margenes['right']);
                        $pdf->Cell(0, 0, $pagenumtxt, 0, 0, 'L');
                        //$pdf->Cell($w, $h, $txt, $border, $ln, $align, $fill, $link, $stretch, $ignore_min_height, $calign, $valign);
                    } else {
                        $pdf->SetX($Margenes['right']);
                        $pdf->Cell(0, 0, $pdf->getAliasRightShift() . $pagenumtxt, 0, 0, 'R');
                    }
                };

        //initialize document
        $pdf->AddPage();

        $indice = 0;
        // Asignar fuente
        $pdf->SetFont(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA);

        foreach ($this->srcmt_brigadistas_dado as $claveObjeto => $Registro) {
            $pdf->Fila($Registro, $alto_filas[$claveObjeto]);
            $pdf->Ln();
        }
        // Asegura que no se use un layout
        $this->setLayout(false);
        // Close and output PDF document
        $pdf->Output('Brigadistas_dado.pdf', 'I');

        // Stop symfony process
        throw new sfStopException();
    }

}
