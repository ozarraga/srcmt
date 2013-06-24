<?php

class ImprimirListaAction extends sfAction
{

    public function execute($request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin())
            {
                if (!$this->getUser()->hasPermission('Recuperar Actividades Academicas'))
                {
                    $this->redirect('@sf_guard_secure');
                }
            }
        }
        else
        {
            $this->redirect('@sf_guard_secure');
        }




        //almacena una relacion de titulos y campos
        $titulos_y_campos = SrcmtActividadesAcademicas::getArregloTitulosCampos();

        $this->formFilter = new SrcmtActividadesAcademicasFormFilter(
                        array(),
                        array(),
                        sfConfig::get('sf_csrf_secret'));

        $srcmt_actividades_academicas_filter = $request->getParameter($this->formFilter->getName());

        /*
         * Conectando al formulario de filtro local, y los valores de la petición
         * guardados en el arreglo.
         */
        if ($request->hasParameter($this->formFilter->getName()))
        {
            $this->formFilter->bind($srcmt_actividades_academicas_filter);
        }
        else
        {

            $this->getUser()->setFlash('error', 'Ha ocurrido un error');
            $this->forward('homepage', 'index');
        }

        $query= new Doctrine_Query;
        /*
         * Validación del formulario de filtro y construcción de la consulta base
         */
        if ($this->formFilter->isValid())
        {
            $query = $this->formFilter->buildQuery(
                    $this->formFilter->getValues()
            );
        }
        else
        {
            $error = $this->formFilter->getErrorSchema()->getMessage();
            $this->getUser()->setFlash('error', 'Ha ocurrido un error: ' . $error);
            $this->forward('homepage', 'index');
        }



        // variables para subtitulos de fechas "desde" y "hasta"
        $fecha_act = $srcmt_actividades_academicas_filter['fecha'];
        $createdAt = $srcmt_actividades_academicas_filter['created_at'];
        $updatedAt = $srcmt_actividades_academicas_filter['updated_at'];
        $fechaDesde = '';
        $fechaHasta = '';

        $CreadoDesdeFecha = '';
        $CreadoHastaFecha = '';
        $ActualizadoDesdeFecha = '';
        $ActualizadoHastaFecha = '';

        // Titulo dinamico fecha de actividad "Desde"
        if (isset($fecha_act['from']))
        {
            if (($fecha_act['from']['year'] != false)
                    && ($fecha_act['from']['month'] != false)
                    && ($fecha_act['from']['day']) != false)
            {

                $fecha = new DateTime($fecha_act['from']['year'] . '-' . $fecha_act['from']['month'] . '-' . $fecha_act['from']['day']);
                $fechaDesde = "desde el " . $fecha->format('d/m/Y');
            }
        }

        // Titulo dinamico fecha de actividad "Hasta"
        if (isset($fecha_act['to']))
        {
            if (($fecha_act['to']['year'] != false)
                    && ($fecha_act['to']['month'] != false)
                    && ($fecha_act['to']['day'] != false))
            {
                $fecha = new DateTime($fecha_act['to']['year'] . '-' . $fecha_act['to']['month'] . '-' . $fecha_act['to']['day']);
                $fechaHasta = "hasta el " . $fecha->format('d/m/Y');
            }
        }


        // Titulo dinamico fecha de creacion "Desde"
        if (isset($createdAt['from']))
        {
            if (($createdAt['from']['year'] != false)
                    && ($createdAt['from']['month'] != false)
                    && ($createdAt['from']['day']) != false)
            {

                $fecha = new DateTime($createdAt['from']['year'] . '-' . $createdAt['from']['month'] . '-' . $createdAt['from']['day']);
                $CreadoDesdeFecha = "desde el " . $fecha->format('d/m/Y');
            }
        }

        // Titulo dinamico fecha de creacion "Hasta"
        if (isset($createdAt['to']))
        {
            if (($createdAt['to']['year'] != false)
                    && ($createdAt['to']['month'] != false)
                    && ($createdAt['to']['day'] != false))
            {
                $fecha = new DateTime($createdAt['to']['year'] . '-' . $createdAt['to']['month'] . '-' . $createdAt['to']['day']);
                $CreadoHastaFecha = "hasta el " . $fecha->format('d/m/Y');
            }
        }

        // Titulo dinamico fecha de actualizacion "Desde"
        if (isset($updatedAt['from']))
        {
            if (($updatedAt['from']['year'] != false)
                    && ($updatedAt['from']['month'] != false)
                    && ($updatedAt['from']['day'] != false))
            {
                $fecha = new DateTime($updatedAt['from']['year'] . '-' . $updatedAt['from']['month'] . '-' . $updatedAt['from']['day']);
                $ActualizadoDesdeFecha = "desde el " . $fecha->format('d/m/Y');
            }
        }

        // Titulo dinamico fecha de actualizacion "Hasta"
        if (isset($updatedAt['to']))
        {
            if (($updatedAt['to']['year'] != false)
                    && ($updatedAt['to']['month'] != false)
                    && ($updatedAt['to']['day'] != false))
            {
                $fecha = new DateTime($updatedAt['to']['year'] . '-' . $updatedAt['to']['month'] . '-' . $updatedAt['to']['day']);
                $ActualizadoHastaFecha = "hasta el " . $fecha->format('d/m/Y');
            }
        }

        $TituloFechaActividad = '';

        if (!(($fechaDesde == '') && ($fechaHasta == '')))
        {
            $TituloFechaActividad = "Realizadas " . $fechaDesde . " " . $fechaHasta;
        }

        $TituloCreado = '';

        if (!(($CreadoDesdeFecha == '') && ($CreadoHastaFecha == '')))
        {
            $TituloCreado = "Registradas " . $CreadoDesdeFecha . " " . $CreadoHastaFecha;
        }

        $TituloActualizado = '';

        if (!(($ActualizadoDesdeFecha == '') && ($ActualizadoHastaFecha == '')))
        {
            $TituloActualizado = "Actualizadas " . $ActualizadoDesdeFecha . " " . $ActualizadoHastaFecha;
        }

        $config = sfTCPDFPluginConfigHandler::loadConfig('Srcmt_config_horizontal');

        sfTCPDFPluginConfigHandler::includeLangFile('es');

        $autor = $this->getUser()->getName();
        $doc_title = "Listado de Actividades de Integraci&oacute;n C&iacute;vico Militar";
        $doc_subject = "ListadodeActividades de Integraci&oacute;n C&iacute;vico Militar";
        $doc_keywords = "Actividades de Integraci&oacute;n C&iacute;vico Militar";


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
                PDF_MARGIN_LEFT, 25, PDF_MARGIN_RIGHT
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
        $pdf->SetFont(PDF_FONT_NAME_DATA, '', 7);

        $tituloReporte = $doc_title;

        $titulos_y_campos = SrcmtActividadesIcm::getArregloTitulosCampos();

        $this->ActividadesICM = $query->execute();

        $output = array();
        $titulosEncabezados = array();
        foreach ($this->ActividadesICM as $i => $aRow)
        {
            $row = array();
            // Add the row ID and class to the object
            //for ($i = 0; $i < count($seleccion); $i++) {
            foreach ($aRow as $campo => $value)
            {
                $titulosEncabezados[$campo] = array_search($campo, $titulos_y_campos);

                switch ($campo)
                {
                    case 'codigo_actividad_icm':

                        $row[$campo] = $aRow->getCodigoActividadIcm();
                        break;
                    case 'fecha':
                        $row[$campo] = $aRow->getFechaFormateado();
                        break;
                    case 'codigo_tipo_actividad':

                        $row[$campo] = $aRow->getSrcmtTipoActividad()->getTipoActividad();
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

        $this->ActividadesICM = $output;
        unset($output);

        $margins = $pdf->getMargins();
        $pdf->SetMargins($margins['left'], 70);
        $paddings = $pdf->getCellPaddings();
        $pdf->setCellPaddings(1, $paddings['T'], 1, 1);

        $Mifont = $pdf->getFontFamily();
        $MiStylo = $pdf->getFontStyle();
        $MiFontSize = $pdf->getFontSizePt();

        $AnchoImprimible = $pdf->AnchoImprimible(); //Ancho del sector imprimible que excluye los márgenes
        $AltoImprimible = $pdf->AltoImprimible(); //Alto del sector imprimible que excluye los márgenes
        $MaxColumnas = count($titulosEncabezados); //Máximo número de columnas en el reporte

        $NumCampos = count($titulosEncabezados); //Cuenta el definitivo número de campos seleccionado.
        $AnchoMinimoDeColumna = $AnchoImprimible / $MaxColumnas;
        $AnchoMaximoDeColumna = $AnchoImprimible / $NumCampos;

        //Codigo para determinar el ancho de las columnas y elalto de las filas
        $ancho_columnas = array();
        $alto_filas = array();


        foreach ($this->ActividadesICM as $claveObjeto => $Registro)
        {
            $indice = 0;
            $temp_alto_filas = array();
            foreach ($titulosEncabezados as $campo => $titulo)
            {

                if (!$Registro[$campo])
                {
                    //$Registro[$campo]='.';
                    $this->ActividadesICM[$claveObjeto][$campo] = '';
                }

                if ($indice >= $MaxColumnas)
                {
                    break;
                }
                $AnchoCampo = $pdf->GetStringWidth(html_entity_decode($Registro[$campo], ENT_QUOTES, 'UTF-8'), $Mifont, $MiStylo, $MiFontSize);

                if ($AnchoCampo > $AnchoMaximoDeColumna)
                {
                    $ancho_columnas[$indice] = $AnchoMaximoDeColumna;
                }
                elseif ($AnchoCampo < $AnchoMinimoDeColumna)
                {
                    $ancho_columnas[$indice] = $AnchoMinimoDeColumna;
                }
                else
                {
                    if (isset($ancho_columnas[$indice]))
                    {
                        if ($AnchoCampo > $ancho_columnas[$indice])
                        {
                            $ancho_columnas[$indice] = $AnchoCampo;
                        }
                    }
                    else
                    {
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

        if ($AnchoMinimoDeColumna > $AnchoMaximoDeColumna)
        {
            //$this->getUser()->setFlash('notice', 'La cantidad de caracteres de los campos seleccionados sobrepasa el ancho del informe, reduzca los campos seleccionados');
            $this->redirect('SrcmtActividadesIcm/index');
        };

        // Encabezado
        $pdf->__set('encabezado_tituloReporte', $tituloReporte);
        $pdf->__set('encabezado_tituloFechaActividad', $TituloFechaActividad);
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
        $pdf->__set('seleccion', $titulosEncabezados);

        $pdf->headerCallback = function ($pdf)
                {
                    $tituloReporte = $pdf->__get('encabezado_tituloReporte');
                    $TituloFechaActividad = $pdf->__get('encabezado_tituloFechaActividad');
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
                    // Titulos html_entity_decode($contenido, ENT_QUOTES, 'UTF-8')
                    $pdf->Cell(0, 5, html_entity_decode($tituloReporte, ENT_QUOTES, 'UTF-8'), 0, false, 'C', 0, '', 0, false, 'M', 'M');
                    $pdf->Ln();
                    $pdf->Cell(0, 5, html_entity_decode($TituloFechaActividad, ENT_QUOTES, 'UTF-8'), 0, false, 'C', 0, '', 0, false, 'M', 'M');
                    $pdf->Ln();
                    $pdf->Cell(0, 5, html_entity_decode($TituloCreado, ENT_QUOTES, 'UTF-8'), 0, false, 'C', 0, '', 0, false, 'M', 'M');
                    $pdf->Ln();
                    $pdf->Cell(0, 5, html_entity_decode($TituloActualizado, ENT_QUOTES, 'UTF-8'), 0, false, 'C', 0, '', 0, false, 'M', 'M');
                    $pdf->Ln();

                    $y = $pdf->getY();
                    $indice = 0;
                    // Asignar fuente
                    $pdf->SetFont('verdana', 'B', 7);

                    foreach ($titulosEncabezados as $key => $contenido)
                    {
                        if ($indice >= $MaxColumnas)
                        {
                            break;
                        }
                        if (!isset($ancho_columnas[$indice]))
                        {
                            $ancho_columnas[$indice] = $AnchoMinimoDeColumna;
                        }
                        $pdf->MultiCell($ancho_columnas[$indice], 10, html_entity_decode($contenido, ENT_QUOTES, 'UTF-8'), 1, 'C', false, 0, '', '', true, 0, false, true, 0, 'T', false);
                        $indice++;
                    }
                    $pdf->Ln();
                };
        $pdf->footerCallback = function ($pdf)
                {
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
                    if ($pdf->getRTL())
                    {
                        $pdf->SetX($Margenes['right']);
                        $pdf->Cell(0, 0, $pagenumtxt, 0, 0, 'L');
                        //$pdf->Cell($w, $h, $txt, $border, $ln, $align, $fill, $link, $stretch, $ignore_min_height, $calign, $valign);
                    }
                    else
                    {
                        $pdf->SetX($Margenes['right']);
                        $pdf->Cell(0, 0, $pdf->getAliasRightShift() . $pagenumtxt, 0, 0, 'R');
                    }
                };
// add a page
        $pdf->AddPage();


        $y = $pdf->getY();
        $indice = 0;
        // Asignar fuente
        $pdf->SetFont($Mifont, $MiStylo, $MiFontSize);

        foreach ($this->ActividadesICM as $claveObjeto => $Registro)
        {
            $pdf->Fila($Registro, $alto_filas[$claveObjeto]);
            $pdf->Ln();
        }


        // Asegura que no se use un layout
        $this->setLayout(false);
        // Close and output PDF document
        $pdf->Output('Brigadistas_dado_individual.pdf', 'I');

        // Stop symfony process
        throw new sfStopException();
    }

}
