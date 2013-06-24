<?php

class ImprimirActividadesAction extends sfAction
{

    public function execute($request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            //accion autenticado
            if (!$this->getUser()->isSuperAdmin())
            {
                if (!$this->getUser()->hasPermission('Recuperar Brigadistas Estudiantiles'))
                {
                    $this->redirect('@sf_guard_secure');
                }
            }
        }
        else
        {
            $this->redirect('@sf_guard_secure');
        }
        $this->miliciano = $this->getRoute()->getObject();

        $config = sfTCPDFPluginConfigHandler::loadConfig('Srcmt_config_horizontal');

        sfTCPDFPluginConfigHandler::includeLangFile('es');

        $autor = $this->getUser()->getName();
        $doc_title = "Registro de Actividades del Brigadista Estudiantil";
        $doc_subject = "Registro de Actividades del Brigadista Estudiantil";
        $doc_keywords = "Brigadistas Estudiantiles Registro Individual";


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
        $this->miliciano = $this->getRoute()->getObject();
        $miliciano = $this->miliciano;

        $titulos_y_campos_aa = SrcmtActividadesAcademicas::getArregloTitulosCampos();
        $titulos_y_campos_ai = SrcmtActividadesIcm::getArregloTitulosCampos();

        $aa_in = array();
        $MIL_AA_rel = $this->miliciano->getSrcmtActividadAcademicaMiliciano()->toArray();

        if (count($MIL_AA_rel) <= 0)
        {
            $this->ActividadesAcademicas = array();
        }
        else
        {
            foreach ($MIL_AA_rel as $key => $value)
            {
                $aa_in[] = $value['codigo_actividad_academica'];
            }
            $sQuery_AA = Doctrine_Core::getTable('SrcmtActividadesAcademicas')
                    ->createQuery('a')
                    ->where('a.codigo_actividad_academica in ?', array($aa_in))
                    ->orderBy('a.fecha desc, a.codigo_tipo_actividad asc')
            ;
            $this->ActividadesAcademicas = $sQuery_AA->execute();
        }



        $aicm_in = array();
        $MIL_AICM_rel = $this->miliciano->getSrcmtActividadIcmMiliciano()->toArray();
        if (count($MIL_AICM_rel) <= 0)
        {
            $this->ActividadesICM = array();
        }
        else
        {

            foreach ($MIL_AICM_rel as $key => $value)
            {
                $aicm_in[] = $value['codigo_actividad'];
            }
            $sQuery_AICM = Doctrine_Core::getTable('SrcmtActividadesIcm')
                    ->createQuery('a')
                    ->where('a.codigo_actividad_icm in ?', array($aicm_in))
                    ->orderBy('a.fecha desc, a.codigo_tipo_actividad asc')
            ;
            $this->ActividadesICM = $sQuery_AICM->execute();
        }
        //Evalua si el registro tiene una foto asociada para garantizar la renderizacion en PDF
        //$foto=(isEmpty($miliciano->getFoto())) ? '_blank.png' : $miliciano->getFoto();

        $foto = '';
        if (!$miliciano->getFoto())
        {
            $foto = '_blank.png';
        }
        elseif ($miliciano->getFoto() == '')
        {
            $foto = '_blank.png';
        }
        elseif ($miliciano->getFoto() == NULL)
        {
            $foto = '_blank.png';
        }
        else
        {
            $foto = $miliciano->getFoto();
        }

        $html = array();

        $style = file_get_contents('css/imprimir_pdf.css');
//        $style=$style . file_get_contents('css/srcmt.css');
        $style = '<style >' . $style . '</style>';


        $html[] =
                '<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Datos Personales</h3>
	<hr>
	<h6>&nbsp;</h6>
	<table border="0" class="ancho-horizontal-pdf colapsa-borde-tabla-pdf letra_verdana letra_doce">
		<tbody>
			<tr >
				<td rowspan="3" >
					<div class="ancho-foto-pdf">
						<img src="/uploads/fotocarnet/' . $foto . '" alt="Foto Carnet" class="ancho-foto-pdf" />
					</div>

				</td>
				<td class="basicos-col1-pdf">
					<strong class="letra_azul">Nombre: </strong><br />
					' . $miliciano->getPrimerApellido()
                . " " . $miliciano->getSegundoApellido()
                . " " . $miliciano->getPrimerNombre()
                . " " . $miliciano->getSegundoNombre()
                . '
				</td>
				<td class="basicos-col1-pdf">
					<strong class="letra_azul">C&eacute;dula de identidad: </strong><br />
					' . $miliciano->getNacionalidad() . "-" . $miliciano->getCedulaIdentidad() . '
				</td>
				<td class="basicos-col1-pdf">
					<strong class="letra_azul">Fecha de Nacimiento: </strong><br />
					' . $miliciano->getFechaNacimientoFormateado() . '
				</td>
				<td >
					<strong class="letra_azul">Sexo: </strong><br />
					' . $miliciano->getSexo() . '
				</td>

			</tr>

			<tr style="background-color: #F4F4F4; ">

				<td >
					<strong class="letra_azul">Estado Civil: </strong><br />
					' . $miliciano->getEstadoCivil() . '
				</td>

				<td >
					<strong class="letra_azul">Grupo Sangu&iacute;neo: </strong><br />
					' . $miliciano->getGrupoSanguineo() . '
				</td>

			</tr>
			<tr >


				<td>
					<strong class="letra_azul">C&oacute;digo Miliciano: </strong><br />
					' . $miliciano->getCodigoMiliciano() . '
				</td>


				<td>
					<strong class="letra_azul">Fecha de Creaci&oacute;n: </strong><br />
					' . $miliciano->getCreatedAtFormateado() . '
				</td>
				<td >
					<strong class="letra_azul">Fecha de Actualizaci&oacute;n: </strong><br />
					' . $miliciano->getUpdatedAtFormateado() . '
				</td>
				<td>
					&nbsp;
				</td>
			</tr>

		</tbody>
	</table>
	<h6>&nbsp;</h6>
	<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Actividades</h3>
	<hr>
	<span>&nbsp;</span>';

        $output = array();
        $titulosEncabezados_aa = array();
        foreach ($this->ActividadesAcademicas as $i => $aRow)
        {
            $row = array();
            // Add the row ID and class to the object
            //for ($i = 0; $i < count($seleccion); $i++) {
            foreach ($aRow as $campo => $value)
            {

                $titulosEncabezados_aa[$campo] = array_search($campo, $titulos_y_campos_aa);

                switch ($campo)
                {
                    case 'codigo_actividad_academica':

                        $row[$campo] = $aRow->getCodigoActividadAcademica();
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

        $this->ActividadesAcademicas = $output;

        $output = array();
        $titulosEncabezados_ai = array();
        foreach ($this->ActividadesICM as $i => $aRow)
        {
            $row = array();
            // Add the row ID and class to the object
            //for ($i = 0; $i < count($seleccion); $i++) {
            foreach ($aRow as $campo => $value)
            {
                $titulosEncabezados_ai[$campo] = array_search($campo, $titulos_y_campos_ai);

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


        if (count($titulosEncabezados_aa) <= 0)
        {
            $MaxColumnas = 1;
            $NumCampos = 1;
        }
        else
        {
            $MaxColumnas = count($titulosEncabezados_aa); //Máximo número de columnas en el reporte
            $NumCampos = count($titulosEncabezados_aa); //Cuenta el definitivo número de campos seleccionado.
        }

        $AnchoMinimoDeColumna = $AnchoImprimible / $MaxColumnas;
        $AnchoMaximoDeColumna = $AnchoImprimible / $NumCampos;

        //Codigo para determinar el ancho de las columnas y elalto de las filas
        $ancho_columnas = array();
        $alto_filas = array();

        foreach ($this->ActividadesAcademicas as $claveObjeto => $Registro)
        {
            $indice = 0;
            $temp_alto_filas = array();
            foreach ($titulosEncabezados_aa as $campo => $titulo)
            {

                if (!$Registro[$campo])
                {
                    //$Registro[$campo]='.';
                    $this->ActividadesAcademicas[$claveObjeto][$campo] = '';
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
            $this->redirect('milicianos/showActividades');
        };

        // Encabezado para las paginas siguientes
        $pdf->__set('encabezado_tituloReporte', $tituloReporte . ' ' . $this->miliciano->__toString());
        $pdf->__set('encabezado_titulosEncabezados_aa', $titulosEncabezados_aa);

        $pdf->__set('AnchoImprimible', $AnchoImprimible);
        $pdf->__set('AltoImprimible', $AltoImprimible);
        $pdf->__set('MaxColumnas', $MaxColumnas);
        $pdf->__set('NumCampos', $NumCampos);
        $pdf->__set('AnchoMinimoDeColumna', $AnchoMinimoDeColumna);
        $pdf->__set('AnchoMaximoDeColumna', $AnchoMaximoDeColumna);

        $pdf->__set('ancho_columnas', $ancho_columnas);
        $pdf->__set('alto_filas', $alto_filas);
        $pdf->__set('seleccion', $titulosEncabezados_aa);

        $pdf->headerCallback = function ($pdf)
                {
                    $tituloReporte = $pdf->__get('encabezado_tituloReporte');
                    $titulosEncabezados = $pdf->__get('encabezado_titulosEncabezados_aa');

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
                    $pdf->Cell(0, 5, html_entity_decode('Actividades Acad&eacute;micas', ENT_QUOTES, 'UTF-8'), 0, false, 'C', 0, '', 0, false, 'M', 'M');
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
        $pdf->Cell(0, 5, html_entity_decode('Actividades Acad&eacute;micas', ENT_QUOTES, 'UTF-8'), 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $pdf->Ln();

        $y = $pdf->getY();
        $indice = 0;
        // Asignar fuente
        $pdf->SetFont('verdana', 'B', 7);

        foreach ($titulosEncabezados_aa as $key => $contenido)
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

        if (count($this->ActividadesAcademicas) <= 0)
        {
            $pdf->SetFillColor(0, 173, 238);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->Cell(0, 5, html_entity_decode('No existen actividades registradas', ENT_QUOTES, 'UTF-8'), 0, 0, 'C', true, '', 0, false, 'M', 'M');
            $pdf->SetFillColor();
            $pdf->SetTextColor();
            $pdf->Ln();
        }
        else
        {
            foreach ($this->ActividadesAcademicas as $claveObjeto => $Registro)
            {
                $pdf->Fila($Registro, $alto_filas[$claveObjeto]);
                $pdf->Ln();
            }
        }

        $paddings = $pdf->getCellPaddings();
        $pdf->setCellPaddings(1, $paddings['T'], 1, 1);

        $Mifont = $pdf->getFontFamily();
        $MiStylo = $pdf->getFontStyle();
        $MiFontSize = $pdf->getFontSizePt();

        $AnchoImprimible = $pdf->AnchoImprimible(); //Ancho del sector imprimible que excluye los márgenes
        $AltoImprimible = $pdf->AltoImprimible(); //Alto del sector imprimible que excluye los márgenes

        if (count($titulosEncabezados_ai) <= 0)
        {
            $MaxColumnas = 1;
            $NumCampos = 1;
        }
        else
        {
            $MaxColumnas = count($titulosEncabezados_ai); //Máximo número de columnas en el reporte
            $NumCampos = count($titulosEncabezados_ai); //Cuenta el definitivo número de campos seleccionado.
        }

        $AnchoMinimoDeColumna = $AnchoImprimible / $MaxColumnas;
        $AnchoMaximoDeColumna = $AnchoImprimible / $NumCampos;

        //Codigo para determinar el ancho de las columnas y elalto de las filas
        $ancho_columnas = array();
        $alto_filas = array();

        foreach ($this->ActividadesICM as $claveObjeto => $Registro)
        {
            $indice = 0;
            $temp_alto_filas = array();
            foreach ($titulosEncabezados_ai as $campo => $titulo)
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
            $this->redirect('milicianos/showActividades');
        };
        // Encabezado para las paginas siguientes
        $pdf->__set('encabezado_tituloReporte', $tituloReporte . ' ' . $this->miliciano->__toString());
        //$pdf->__set('encabezado_tituloCreado', $TituloCreado);
        //$pdf->__set('encabezado_tituloActualizado', $TituloActualizado);
//		$pdf->__set('encabezado_titulosEncabezados_aa', $titulosEncabezados_aa);
        $pdf->__set('encabezado_titulosEncabezados_ai', $titulosEncabezados_ai);

        $pdf->__set('AnchoImprimible', $AnchoImprimible);
        $pdf->__set('AltoImprimible', $AltoImprimible);
        $pdf->__set('MaxColumnas', $MaxColumnas);
        $pdf->__set('NumCampos', $NumCampos);
        $pdf->__set('AnchoMinimoDeColumna', $AnchoMinimoDeColumna);
        $pdf->__set('AnchoMaximoDeColumna', $AnchoMaximoDeColumna);

        $pdf->__set('ancho_columnas', $ancho_columnas);
        $pdf->__set('alto_filas', $alto_filas);
        $pdf->__set('seleccion', $titulosEncabezados_ai);
        $pdf->headerCallback = function ($pdf)
                {
                    $tituloReporte = $pdf->__get('encabezado_tituloReporte');
//				$TituloCreado = $pdf->__get('encabezado_tituloCreado');
//				$TituloActualizado = $pdf->__get('encabezado_tituloActualizado');
                    $titulosEncabezados = $pdf->__get('encabezado_titulosEncabezados_ai');

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
                    $pdf->Cell(0, 5, html_entity_decode('Actividades de Integraci&oacute;n C&iacute;vico Militar', ENT_QUOTES, 'UTF-8'), 0, false, 'C', 0, '', 0, false, 'M', 'M');
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

        //Titulos Actividades Icm
        $pdf->Ln(4);
        $pdf->Cell(0, 5, html_entity_decode('Actividades de Integraci&oacute;n C&iacute;vico Militar', ENT_QUOTES, 'UTF-8'), 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $pdf->Ln();

        $y = $pdf->getY();
        $indice = 0;
        // Asignar fuente
        $pdf->SetFont('verdana', 'B', 7);

        foreach ($titulosEncabezados_ai as $key => $contenido)
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

        if (count($this->ActividadesICM) <= 0)
        {
            $pdf->SetFillColor(0, 173, 238);
            $pdf->SetTextColor(255, 255, 255);
            $pdf->Cell(0, 5, html_entity_decode('No existen actividades registradas', ENT_QUOTES, 'UTF-8'), 0, true, 'C', true, '', 0, false, 'M', 'M');
            $pdf->SetFillColor();
            $pdf->SetTextColor();
            $pdf->Ln();
        }
        else
        {
            foreach ($this->ActividadesICM as $claveObjeto => $Registro)
            {
                $pdf->Fila($Registro, $alto_filas[$claveObjeto]);
                $pdf->Ln();
            }
        }


        // Asegura que no se use un layout
        $this->setLayout(false);
        // Close and output PDF document
        $pdf->Output('miliciano_individual.pdf', 'I');

        // Stop symfony process
        throw new sfStopException();
    }

}
