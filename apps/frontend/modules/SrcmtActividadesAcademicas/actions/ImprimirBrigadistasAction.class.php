<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ImprimirBrigadistasAction extends sfAction
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

        $titulosCampos_bd = SrcmtBrigadistasDado::getTitulosCampos();
        $titulos_y_campos_bd = SrcmtBrigadistasDado::getArregloTitulosCampos();

        $titulosCampos_mil = SrcmtMilicianos::getTitulosCampos();
        $titulos_y_campos_mil = SrcmtMilicianos::getArregloTitulosCampos();

        $config = sfTCPDFPluginConfigHandler::loadConfig('Srcmt_config_horizontal');

        sfTCPDFPluginConfigHandler::includeLangFile('es');

        $autor = $this->getUser()->getName();
        $doc_title = "Registro de Participantes de la Actividad";
        $doc_subject = "Registro de Participantes de la Actividad";
        $doc_keywords = "Actividades Academicas, Integración Cívico Militar, Participantes";


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
                PDF_MARGIN_LEFT, 45, PDF_MARGIN_RIGHT
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
        $pdf->SetFont(PDF_FONT_NAME_DATA, '', 8);

        $tituloReporte = $doc_title;

        $pdf->__set('encabezado_tituloReporte', $tituloReporte);

        $pdf->headerCallback = function ($pdf)
                {
                    $tituloReporte = html_entity_decode($pdf->__get('encabezado_tituloReporte'), ENT_QUOTES, 'UTF-8');

// Logo
                    $image_file = K_PATH_IMAGES . PDF_HEADER_LOGO;
                    $pdf->Image($image_file, 10, 10, PDF_HEADER_LOGO_WIDTH, '', '', '', 'T', false, 300, 'C', false, false, 0, 'CB', false, false);
                    $pdf->Ln(30, true);

                    $pdf->SetFont('verdana', 'B', 10);
// Titulos
                    $pdf->Cell(0, 5, $tituloReporte, 0, false, 'C', 0, '', 0, false, 'M', 'M');
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

        // Captura el objeto de registro individual
        $this->ActividadAcademica = $this->getRoute()->getObject();
        $ActividadAcademica = $this->ActividadAcademica;

        $titulos_y_campos_bd = SrcmtBrigadistasDado::getArregloTitulosCampos();
        $titulos_y_campos_mil = SrcmtMilicianos::getArregloTitulosCampos();

        // Obteniendo los BrigadistasDado relacionados con esta actividad ICM
        $bd_in = array();
        $AICM_BD_rel = $this->ActividadAcademica->getSrcmtActividadAcademicaBrigadistaDado()->toArray();
        foreach ($AICM_BD_rel as $key => $value)
        {
            $bd_in[] = $value['codigo_brigadista'];
        }
        $sQuery_BD = Doctrine_Core::getTable('SrcmtBrigadistasDado')
                ->createQuery('a')
                ->where('a.codigo_brigadista in ?', array($bd_in))
                ->orderBy('a.cedula_identidad asc')
        ;
        $this->srcmt_brigadistas_dado = $sQuery_BD->execute();

        // Obteniendo los Milicianos relacionados con esta actividad ICM
        $mil_in = array();
        $AICM_MIL_rel = $this->ActividadAcademica->getSrcmtActividadAcademicaMiliciano()->toArray();
        foreach ($AICM_MIL_rel as $key => $value)
        {
            $mil_in[] = $value['codigo_miliciano'];
        }
        $sQuery_MIL = Doctrine_Core::getTable('SrcmtMilicianos')
                ->createQuery('a')
                ->where('a.codigo_miliciano in ?', array($mil_in))
                ->orderBy('a.cedula_identidad asc')
        ;
        $this->srcmt_milicianos = $sQuery_MIL->execute();

        $html = array();

        $style = file_get_contents('css/imprimir_pdf.css');
//        $style=$style . file_get_contents('css/srcmt.css');
        $style = '<style >' . $style . '</style>';

        $html[] =
                '<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Actividad Acad&eacute;mica</h3>
<hr>
<h6>&nbsp;</h6>
<table border="0" class="ancho-horizontal-pdf colapsa-borde-tabla-pdf letra_verdana letra_doce">
    <tbody>
        <tr >
            <td >
                <strong class="letra_azul">Tipo: </strong><br />
                ' . $ActividadAcademica->getSrcmtTipoActividad()->getTipoActividad() . '
            </td>
            <td class="basicos-col1-pdf">
                <strong class="letra_azul">Actividad: </strong><br />
                ' . $ActividadAcademica->getActividad() . '
            </td>
            <td class="basicos-col1-pdf">
                <strong class="letra_azul">Lugar: </strong><br />
                ' . $ActividadAcademica->getLugar() . '
            </td>
            <td class="basicos-col1-pdf">
                <strong class="letra_azul">Responsable: </strong><br />
                ' . $ActividadAcademica->getResponsable() . '
            </td>


        </tr>

        <tr style="background-color: #F4F4F4; ">

            <td colspan="2">
                <strong class="letra_azul">Descripci&oacute;n: </strong><br />
                ' . $ActividadAcademica->getDescripcion() . '
            </td>
            <td >
                <strong class="letra_azul">Lugar:  </strong><br />
                ' . $ActividadAcademica->getLugar() . '
            </td>
            <td >
                <strong class="letra_azul">Duraci&oacute;n: </strong><br />
                ' . $ActividadAcademica->getDuracion() . '
            </td>

        </tr>
        <tr >
            <td colspan="2">
                <strong class="letra_azul">Creada el: </strong><br />
                ' . $ActividadAcademica->getCreatedAt() . '
            </td>
            <td colspan="2">
                <strong class="letra_azul">Actualizada el: </strong><br />
                ' . $ActividadAcademica->getUpdatedAt() . '
            </td>
        </tr>
    </tbody>
</table>
<h6>&nbsp;</h6>
<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Brigadistas</h3>
<hr>
<span>&nbsp;</span>';
        //________________________________________________________________________________________

        $output = array();
        $titulosEncabezados_bd = array();
        foreach ($this->srcmt_brigadistas_dado as $i => $aRow)
        {
            $row = array();
            // Add the row ID and class to the object
            //for ($i = 0; $i < count($seleccion); $i++) {
            foreach ($aRow as $campo => $value)
            {

//                $titulosEncabezados_bd[$campo] = array_search($campo, $titulos_y_campos_bd);

                switch ($campo)
                {
                    case 'codigo_brigadista':
                        $titulosEncabezados_bd[$campo] = array_search($campo, $titulos_y_campos_bd);
                        $row[$campo] = $aRow->getCodigoBrigadista();
                        break;
                    case 'cedula_identidad':
//number_format ( float $number , int $decimals = 0 , string $dec_point = '.' , string $thousands_sep = ',' )
                        $titulosEncabezados_bd[$campo] = array_search($campo, $titulos_y_campos_bd);
                        $row[$campo] = $aRow->getNacionalidad() . '-' . number_format($aRow->getCedulaIdentidad(), 0, ',', '.');
                        break;
                    case 'primer_apellido':
                        $titulosEncabezados_bd[$campo] = array_search($campo, $titulos_y_campos_bd);
                        $row[$campo] = $aRow->getPrimerApellido();
                        break;

                    case 'segundo_apellido':
                        $titulosEncabezados_bd[$campo] = array_search($campo, $titulos_y_campos_bd);
                        $row[$campo] = $aRow->getSegundoApellido();
                        break;

                    case 'primer_nombre':
                        $titulosEncabezados_bd[$campo] = array_search($campo, $titulos_y_campos_bd);
                        $row[$campo] = $aRow->getPrimerNombre();
                        break;
                    case 'segundo_nombre':
                        $titulosEncabezados_bd[$campo] = array_search($campo, $titulos_y_campos_bd);
                        $row[$campo] = $aRow->getSegundoNombre();
                        break;
                    case 'telefono_movil':
                        $titulosEncabezados_bd[$campo] = array_search($campo, $titulos_y_campos_bd);
                        $row[$campo] = $aRow->getTelefonoMovil();
                        break;
                    case 'correo_electronico':
                        $titulosEncabezados_bd[$campo] = array_search($campo, $titulos_y_campos_bd);
                        $row[$campo] = $aRow->getCorreoElectronico();
                        break;
                    case 'telefono_emergencia':
                        $titulosEncabezados_bd[$campo] = array_search($campo, $titulos_y_campos_bd);
                        $row[$campo] = $aRow->getTelefonoEmergencia();
                        break;
                    default:
                        //$row[$campo] = $aRow->get($campo);
                        break;
                }
            }
            $output[] = $row;
        }

        $this->srcmt_brigadistas_dado = $output;

        $output = array();
        $titulosEncabezados_mil = array();
        foreach ($this->srcmt_milicianos as $i => $aRow)
        {
            $row = array();
            // Add the row ID and class to the object
            //for ($i = 0; $i < count($seleccion); $i++) {
            foreach ($aRow as $campo => $value)
            {
//                $titulosEncabezados_mil[$campo] = array_search($campo, $titulos_y_campos_mil);

                switch ($campo)
                {
                    case 'codigo_miliciano':
                        $titulosEncabezados_mil[$campo] = array_search($campo, $titulos_y_campos_mil);
                        $row[$campo] = $aRow->getCodigoMiliciano();
                        break;

                   case 'cedula_identidad':

                        $titulosEncabezados_mil[$campo] = array_search($campo, $titulos_y_campos_mil);
                        $row[$campo] = $aRow->getNacionalidad() . '-' . number_format($aRow->getCedulaIdentidad(), 0, ',', '.');
                        break;
                    
                    case 'primer_apellido':
                        $titulosEncabezados_mil[$campo] = array_search($campo, $titulos_y_campos_mil);
                        $row[$campo] = $aRow->getPrimerApellido();
                        break;

                    case 'segundo_apellido':
                        $titulosEncabezados_mil[$campo] = array_search($campo, $titulos_y_campos_mil);
                        $row[$campo] = $aRow->getSegundoApellido();
                        break;

                    case 'primer_nombre':
                        $titulosEncabezados_mil[$campo] = array_search($campo, $titulos_y_campos_mil);
                        $row[$campo] = $aRow->getPrimerNombre();
                        break;
                    case 'segundo_nombre':
                        $titulosEncabezados_mil[$campo] = array_search($campo, $titulos_y_campos_mil);
                        $row[$campo] = $aRow->getSegundoNombre();
                        break;
                    case 'movil':
                        $titulosEncabezados_mil[$campo] = array_search($campo, $titulos_y_campos_mil);
                        $row[$campo] = $aRow->getMovil();
                        break;
                    case 'correo_electronico':
                        $titulosEncabezados_mil[$campo] = array_search($campo, $titulos_y_campos_mil);
                        $row[$campo] = $aRow->getCorreoElectronico();
                        break;
                    case 'telefono_emergencia':
                        $titulosEncabezados_mil[$campo] = array_search($campo, $titulos_y_campos_mil);
                        $row[$campo] = $aRow->getTelefonoEmergencia();
                        break;
                    default:
                        //$row[$campo] = $aRow->get($campo);
                        break;
                }
            }
            $output[] = $row;
        }

        $this->srcmt_milicianos = $output;
        unset($output);

        // add a page
        $pdf->AddPage();

        // output the HTML content

        foreach ($html as $key => $value)
        {
            $pdf->writeHTML($style . $html[$key], true, false, true, false, '');
        }
        $margins = $pdf->getMargins();
        $pdf->SetMargins($margins['left'], 60);
        $paddings = $pdf->getCellPaddings();
        $pdf->setCellPaddings(1, $paddings['T'], 1, 1);

        $Mifont = $pdf->getFontFamily();
        $MiStylo = $pdf->getFontStyle();
        $MiFontSize = $pdf->getFontSizePt();

        $AnchoImprimible = $pdf->AnchoImprimible(); //Ancho del sector imprimible que excluye los márgenes
        $AltoImprimible = $pdf->AltoImprimible(); //Alto del sector imprimible que excluye los márgenes
        $MaxColumnas = 9; //Máximo número de columnas en el reporte

        $NumCampos = 9; //Cuenta el definitivo número de campos seleccionado.
        $AnchoMinimoDeColumna = $AnchoImprimible / $MaxColumnas;
        $AnchoMaximoDeColumna = $AnchoImprimible / $NumCampos;

        //Codigo para determinar el ancho de las columnas y elalto de las filas
        $ancho_columnas = array();
        $alto_filas = array();

        foreach ($this->srcmt_brigadistas_dado as $claveObjeto => $Registro)
        {
            $indice = 0;
            $temp_alto_filas = array();
            foreach ($titulosEncabezados_bd as $campo => $titulo)
            {

                if (!$Registro[$campo])
                {
                    //$Registro[$campo]='.';
                    $this->srcmt_brigadistas_dado[$claveObjeto][$campo] = '';
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
            $this->redirect('SrcmtActividadesAcademicas/showActividades');
        };

        // Encabezado para las paginas siguientes
        $pdf->__set('encabezado_tituloReporte', $tituloReporte);
        $pdf->__set('encabezado_titulosEncabezados', $titulosEncabezados_bd);

        $pdf->__set('AnchoImprimible', $AnchoImprimible);
        $pdf->__set('AltoImprimible', $AltoImprimible);
        $pdf->__set('MaxColumnas', $MaxColumnas);
        $pdf->__set('NumCampos', $NumCampos);
        $pdf->__set('AnchoMinimoDeColumna', $AnchoMinimoDeColumna);
        $pdf->__set('AnchoMaximoDeColumna', $AnchoMaximoDeColumna);

        $pdf->__set('ancho_columnas', $ancho_columnas);
        $pdf->__set('alto_filas', $alto_filas);
        $pdf->__set('seleccion', $titulosEncabezados_bd);

        $pdf->headerCallback = function ($pdf)
                {
                    $tituloReporte = $pdf->__get('encabezado_tituloReporte');
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
                    $pdf->SetFont('verdana', 'B', 7);
                    $pdf->Cell(0, 5, html_entity_decode('Brigadistas Dado', ENT_QUOTES, 'UTF-8'), 0, false, 'C', 0, '', 0, false, 'M', 'M');
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
                };

// salida del encabezado de actividades academicas
        // Titulos
        $pdf->Cell(0, 5, html_entity_decode('Brigadistas Dado', ENT_QUOTES, 'UTF-8'), 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $pdf->Ln();

        $y = $pdf->getY();
        $indice = 0;
        // Asignar fuente
        $pdf->SetFont('verdana', 'B', 7);

        foreach ($titulosEncabezados_bd as $key => $contenido)
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
        $pdf->SetFont($Mifont, $MiStylo, $MiFontSize);

        foreach ($this->srcmt_brigadistas_dado as $claveObjeto => $Registro)
        {
            $pdf->Fila($Registro, $alto_filas[$claveObjeto]);
            $pdf->Ln();
        }

        $paddings = $pdf->getCellPaddings();
        $pdf->setCellPaddings(1, $paddings['T'], 1, 1);

        $Mifont = $pdf->getFontFamily();
        $MiStylo = $pdf->getFontStyle();
        $MiFontSize = $pdf->getFontSizePt();

        $AnchoImprimible = $pdf->AnchoImprimible(); //Ancho del sector imprimible que excluye los márgenes
        $AltoImprimible = $pdf->AltoImprimible(); //Alto del sector imprimible que excluye los márgenes
        $MaxColumnas = 9; //Máximo número de columnas en el reporte



        $NumCampos = 9; //Cuenta el definitivo número de campos seleccionado.
        $AnchoMinimoDeColumna = $AnchoImprimible / $MaxColumnas;
        $AnchoMaximoDeColumna = $AnchoImprimible / $NumCampos;

        //Codigo para determinar el ancho de las columnas y elalto de las filas
        $ancho_columnas = array();
        $alto_filas = array();

        foreach ($this->srcmt_milicianos as $claveObjeto => $Registro)
        {
            $indice = 0;
            $temp_alto_filas = array();
            foreach ($titulosEncabezados_mil as $campo => $titulo)
            {
                if (!$Registro[$campo])
                {
                    //$Registro[$campo]='.';
                    $this->srcmt_milicianos[$claveObjeto][$campo] = '';
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
            $this->redirect('SrcmtActividadesAcademicas/showActividades');
        };
        // Encabezado para las paginas siguientes
        $pdf->__set('encabezado_tituloReporte', $tituloReporte);
//        $pdf->__set('encabezado_tituloCreado', $TituloCreado);
//        $pdf->__set('encabezado_tituloActualizado', $TituloActualizado);
//		$pdf->__set('encabezado_titulosEncabezados_aa', $titulosEncabezados_aa);
        $pdf->__set('encabezado_titulosEncabezados', $titulosEncabezados_mil);

        $pdf->__set('AnchoImprimible', $AnchoImprimible);
        $pdf->__set('AltoImprimible', $AltoImprimible);
        $pdf->__set('MaxColumnas', $MaxColumnas);
        $pdf->__set('NumCampos', $NumCampos);
        $pdf->__set('AnchoMinimoDeColumna', $AnchoMinimoDeColumna);
        $pdf->__set('AnchoMaximoDeColumna', $AnchoMaximoDeColumna);

        $pdf->__set('ancho_columnas', $ancho_columnas);
        $pdf->__set('alto_filas', $alto_filas);
        $pdf->__set('seleccion', $titulosEncabezados_mil);
        $pdf->headerCallback = function ($pdf)
                {
                    $tituloReporte = $pdf->__get('encabezado_tituloReporte');
//				$TituloCreado = $pdf->__get('encabezado_tituloCreado');
//				$TituloActualizado = $pdf->__get('encabezado_tituloActualizado');
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
                    $pdf->SetFont('verdana', 'B', 7);
                    $pdf->Cell(0, 5, html_entity_decode('Brigadistas Estudiantiles', ENT_QUOTES, 'UTF-8'), 0, false, 'C', 0, '', 0, false, 'M', 'M');
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
                };

        $MargenSuperior = $pdf->MargenSuperior();
//                $AlturaPagina=$pdf->getLastH();
//                $AltoImprimible=$pdf->AltoImprimible($pdf->getPage());
        $CoordenadaY = $pdf->GetY();

//                $pageAltura=$pdf->getPageHeight($pdf->getPage());

        if ($MargenSuperior < $CoordenadaY)
        {
            //Titulos Actividades Icm
            $pdf->Ln(4);
            $pdf->Cell(0, 5, html_entity_decode('Brigadistas Estudiantiles', ENT_QUOTES, 'UTF-8'), 0, false, 'C', 0, '', 0, false, 'M', 'M');
            $pdf->Ln();

            $y = $pdf->getY();
            $indice = 0;
            // Asignar fuente
            $pdf->SetFont('verdana', 'B', 7);

            foreach ($titulosEncabezados_mil as $key => $contenido)
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
        }

        $pdf->SetFont($Mifont, $MiStylo, $MiFontSize);

        foreach ($this->srcmt_milicianos as $claveObjeto => $Registro)
        {
            $pdf->Fila($Registro, $alto_filas[$claveObjeto]);
            $pdf->Ln();
        }

        // Asegura que no se use un layout
        $this->setLayout(false);
        // Close and output PDF document
        $pdf->Output('Actividades_ICM_con_Brigadistas.pdf', 'I');

        // Stop symfony process
        throw new sfStopException();
    }

}
