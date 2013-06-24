<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ImprimirSencilloAction extends sfAction {

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

        $config = sfTCPDFPluginConfigHandler::loadConfig('Srcmt_config_vertical');

        sfTCPDFPluginConfigHandler::includeLangFile('es');

        $autor = $this->getUser()->getName();
        $doc_title = "Registro Individual Brigadista Dado";
        $doc_subject = "Registro Individual Brigadista Dado";
        $doc_keywords = "Brigadistas, Directivos, Administrativos, Docentes, Obreros, Registro Individual";


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

        $tituloReporte = "Registro Individual de Brigadistas Directivos, Administrativos, Docentes y Obreros.";

        $pdf->__set('encabezado_tituloReporte', $tituloReporte);

        $pdf->headerCallback = function ($pdf) {
                    $tituloReporte = $pdf->__get('encabezado_tituloReporte');

// Logo
                    $image_file = K_PATH_IMAGES . PDF_HEADER_LOGO;
                    $pdf->Image($image_file, 10, 10, PDF_HEADER_LOGO_WIDTH, '', '', '', 'T', false, 300, 'C', false, false, 0, 'CB', false, false);
                    $pdf->Ln(30, true);

                    $pdf->SetFont('verdana', 'B', 10);
// Titulos
                    $pdf->Cell(0, 5, $tituloReporte, 0, false, 'C', 0, '', 0, false, 'M', 'M');
                    $pdf->Ln();
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

        $this->srcmt_brigadistas_dado = $this->getRoute()->getObject();
        $srcmt_brigadistas_dado = $this->srcmt_brigadistas_dado;

        //Evalua si el registro tiene una foto asociada para garantizar la renderizacion en PDF
        //$foto=(isEmpty($srcmt_brigadistas_dado->getFoto())) ? '_blank.png' : $srcmt_brigadistas_dado->getFoto();

        $foto = '';
        if (!$srcmt_brigadistas_dado->getFoto()) {
            $foto = '_blank.png';
        } elseif ($srcmt_brigadistas_dado->getFoto() == '') {
            $foto = '_blank.png';
        } elseif ($srcmt_brigadistas_dado->getFoto() == NULL) {
            $foto = '_blank.png';
        } else {
            $foto = $srcmt_brigadistas_dado->getFoto();
        }



        $html = array();

        $style = file_get_contents('css/imprimir_pdf.css');
//        $style=$style . file_get_contents('css/srcmt.css');
        $style = '<style >' . $style . '</style>';


        $html[] =
                '<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Datos Personales</h3>
	<hr>
	<span>&nbsp;</span>

	<table border="0" class="ancho-vertical-pdf colapsa-borde-tabla-pdf letra_verdana letra_doce">
		<tbody>
			<tr >
				<td rowspan="4" >
					<div class="ancho-foto-pdf">
						<img src="/uploads/fotocarnet/' . $foto . '" alt="Foto Carnet" class="ancho-foto-pdf" />
					</div>

				</td>
				<td class="basicos-col1-pdf">
					<strong class="letra_azul">Nombre: </strong><br />
					' . $srcmt_brigadistas_dado->getPrimerApellido()
                . " " . $srcmt_brigadistas_dado->getSegundoApellido()
                . " " . $srcmt_brigadistas_dado->getPrimerNombre()
                . " " . $srcmt_brigadistas_dado->getSegundoNombre()
                . '
				</td>
				<td class="basicos-col1-pdf">
					<strong class="letra_azul">C&eacute;dula de identidad: </strong><br />
					' . $srcmt_brigadistas_dado->getNacionalidad() . "-" . $srcmt_brigadistas_dado->getCedulaIdentidad() . '
				</td>
				<td class="basicos-col1-pdf">
					<strong class="letra_azul">Fecha de Nacimiento: </strong><br />
					' . $srcmt_brigadistas_dado->getFechaNacimientoFormateado() . '
				</td>

			</tr>

			<tr style="background-color: #F4F4F4; ">
				<td >
					<strong class="letra_azul">Sexo: </strong><br />
					' . $srcmt_brigadistas_dado->getSexo() . '
				</td>
				<td >
					<strong class="letra_azul">Estado Civil: </strong><br />
					' . $srcmt_brigadistas_dado->getEstadoCivil() . '
				</td>
				<td >
					<strong class="letra_azul">Lugar de Nacimiento: </strong><br />
					' . $srcmt_brigadistas_dado->getLugarDeNacimiento() . '
				</td>
			</tr>
			<tr >

				<td >
					<strong class="letra_azul">Grupo Sangu&iacute;neo: </strong><br />
					' . $srcmt_brigadistas_dado->getGrupoSanguineo() . '
				</td>
				<td >
					<strong class="letra_azul">Religi&oacute;n: </strong><br />
					' . $srcmt_brigadistas_dado->getReligion() . '
				</td>
				<td>
					<strong class="letra_azul">C&oacute;digo Brigadista: </strong><br />
					' . $srcmt_brigadistas_dado->getCodigoBrigadista() . '
				</td>
			</tr>

			<tr style="background-color: #F4F4F4; ">

				<td>
					<strong class="letra_azul">Fecha de Creaci&oacute;n: </strong><br />
					' . $srcmt_brigadistas_dado->getCreatedAtFormateado() . '
				</td>
				<td >
					<strong class="letra_azul">Fecha de Actualizaci&oacute;n: </strong><br />
					' . $srcmt_brigadistas_dado->getUpdatedAtFormateado() . '
				</td>
				<td>
					&nbsp;
				</td>
			</tr>
		</tbody>
	</table>';
//		$html[] = '<span>&nbsp;</span>';
        $html[] = '<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Ubicaci&oacute;n</h3>
	<hr>
	<span>&nbsp;</span>';
        $html[] = '
		<table border="0" cellspacing="1" cellpadding="1" class="ancho-vertical-pdf letra_verdana colapsa-borde-tabla-pdf">
			<tbody>
				<tr style="background-color: #F4F4F4; ">
					<td>
						<strong class="letra_azul">Estado:</strong><br />' . mb_convert_case($srcmt_brigadistas_dado->getEstado(), MB_CASE_TITLE, "UTF-8") . '

					</td>
					<td>
						<strong class="letra_azul" >Municipio:</strong><br />' . mb_convert_case($srcmt_brigadistas_dado->getMunicipio(), MB_CASE_TITLE, "UTF-8") . '
					</td>
					<td>
						<strong class="letra_azul" >Parroquia:</strong><br />' . mb_convert_case($srcmt_brigadistas_dado->getParroquia(), MB_CASE_TITLE, "UTF-8") . '
					</td>
					<td>
						<strong class="letra_azul" >Ciudad:</strong><br />' . mb_convert_case($srcmt_brigadistas_dado->getCiudad(), MB_CASE_TITLE, "UTF-8") . '
					</td>
				</tr>
				<tr>

					<td colspan="2">
						<p>
							<strong class="letra_azul" >Direcci&oacute;n:</strong><br />' . $srcmt_brigadistas_dado->getDireccionDomiciliaria() . '
						</p>

					</td>
					<td>
						<strong class="letra_azul" >Tel&eacute;fono Local:</strong><br />' . $srcmt_brigadistas_dado->getTelefonoDomicilio() . '
					</td>
					<td>
						<strong class="letra_azul" >Movil:</strong><br />' . $srcmt_brigadistas_dado->getTelefonoMovil() . '
					</td>
				</tr>
				<tr style="background-color: #F4F4F4; ">

					<td>
						<strong class="letra_azul" >Correo Electr&oacute;nico:</strong><br />' . $srcmt_brigadistas_dado->getCorreoElectronico() . '
					</td>
					<td>
						<strong class="letra_azul" >Tel&eacute;fono de Emergencia:</strong><br />' . $srcmt_brigadistas_dado->getTelefonoEmergencia() . '
					</td>
					<td colspan="2">
						<p>
							<strong class="letra_azul" >Direcci&oacute;n Emergencia:</strong><br />' . $srcmt_brigadistas_dado->getDireccionEmergencia() . '
						</p>
					</td>

				</tr>
			</tbody>
		</table>
	';
//		$html[] = '<span>&nbsp;</span>';
        $html[] = '<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Aspectos Profesionales</h3>
	<hr>
	<span>&nbsp;</span>';
        $html[] = '<table border="0" cellspacing="2" cellpadding="2" class="ancho-vertical-pdf letra_verdana colapsa-borde-tabla-pdf" >
	<tbody>
		<tr style="background-color: #F4F4F4; ">
			<td><strong class="letra_azul">Unidad de Adscripcion laboral:</strong><br />' . $srcmt_brigadistas_dado->getUnidadAdscripcionLaboral() . '</td>
			<td><strong class="letra_azul">Extension Interna:</strong><br />' . $srcmt_brigadistas_dado->getExtensionInterna() . '</td>
			<td><strong class="letra_azul">Perfil Empleado:</strong><br />' . $srcmt_brigadistas_dado->getPerfilEmpleado() . '</td>
			<td><strong class="letra_azul">Jefe Sector:</strong><br />' . $srcmt_brigadistas_dado->getJefeSector() . '</td>
		</tr>
		<tr>
			<td><strong class="letra_azul">Especialidad:</strong><br />' . $srcmt_brigadistas_dado->getEspecialidad() . '</td>
			<td><strong class="letra_azul">Sedes:</strong><br />' . $srcmt_brigadistas_dado->getSrcmtSedes() . '</td>
			<td><strong class="letra_azul">Jerarquia:</strong><br />' . $srcmt_brigadistas_dado->getJerarquia() . '</td>
			<td><strong class="letra_azul">Profesi&oacute;n:</strong><br />' . $srcmt_brigadistas_dado->getProfesion() . '</td>
		</tr>
		<tr style="background-color: #F4F4F4; ">
			<td><strong class="letra_azul">Oficio:</strong><br />' . $srcmt_brigadistas_dado->getOficio() . '</td>
			<td><strong class="letra_azul">Centro de Votaci&oacute;n CNE:</strong><br />' . $srcmt_brigadistas_dado->getCentroVotacionCne() . '</td>
			<td><strong class="letra_azul">Direcci&oacute;n Oficina:</strong><br />' . $srcmt_brigadistas_dado->getDireccionOficina() . '</td>
			<td><strong class="letra_azul"></strong><br /></td>
		</tr>
	</tbody>
</table>';
//		$html[] = '<span>&nbsp;</span>';
        $html[] = '<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Se&ntilde;ales particulares</h3>
	<hr>
	<span>&nbsp;</span>';
        $html[] = '<table border="0" cellspacing="2" cellpadding="2" class="ancho-vertical-pdf letra_verdana colapsa-borde-tabla-pdf" >
	<tbody>
		<tr style="background-color: #F4F4F4; ">
			<td><strong class="letra_azul">Estatura:</strong><br />' . $srcmt_brigadistas_dado->getEstatura() . '</td>
			<td><strong class="letra_azul">Color Cabello:</strong><br />' . $srcmt_brigadistas_dado->getColorCabello() . '</td>
			<td><strong class="letra_azul">Peso Kg:</strong><br />' . $srcmt_brigadistas_dado->getPeso() . '</td>
			<td><strong class="letra_azul">Color Piel:</strong><br />' . $srcmt_brigadistas_dado->getColorPiel() . '</td>
		</tr>
		<tr>
			<td><strong class="letra_azul">Talla Pantal&oacute;n:</strong><br />' . $srcmt_brigadistas_dado->getTallaPantalon() . '</td>
			<td><strong class="letra_azul">Talla Camisa:</strong><br />' . $srcmt_brigadistas_dado->getTallaCamisa() . '</td>
			<td><strong class="letra_azul">Talla Calzado:</strong><br />' . $srcmt_brigadistas_dado->getTallaCalzado() . '</td>
			<td><strong class="letra_azul">Talla Gorra:</strong><br />' . $srcmt_brigadistas_dado->getTallaGorra() . '</td>
		</tr>
		<tr style="background-color: #F4F4F4; ">
			<td><strong class="letra_azul">Discapacidad:</strong><br />' . $srcmt_brigadistas_dado->getDominioMano() . '</td>
			<td><strong class="letra_azul">Alergias:</strong><br />' . $srcmt_brigadistas_dado->getAlergias() . '</td>
			<td><strong class="letra_azul">Dominio Mano:</strong><br />' . $srcmt_brigadistas_dado->getDominioMano() . '</td>

			<td></td>
		</tr>
	</tbody>
</table>';
//$html[] = '<span>&nbsp;</span>';
        $html[] = '<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Inserci&oacute;n Social</h3>
	<hr>
	<span>&nbsp;</span>';
        $html[] = '<table border="0" cellspacing="2" cellpadding="2" class="ancho-vertical-pdf letra_verdana colapsa-borde-tabla-pdf" >
	<tbody>
		<tr style="background-color: #F4F4F4; ">
			<td><strong class="letra_azul">Deporte:</strong><br />' . $srcmt_brigadistas_dado->getDeporte() . '</td>
			<td><strong class="letra_azul">Actividades Culturales:</strong><br />' . $srcmt_brigadistas_dado->getActividadesCulturales() . '</td>

		</tr>

	</tbody>
</table>';
//                $html[] = '<span>&nbsp;</span>';
        $html[] = '<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Beneficiario</h3>
	<hr>
	<span>&nbsp;</span>';
        $html[] = '<table border="0" cellspacing="2" cellpadding="2" class="ancho-vertical-pdf letra_verdana colapsa-borde-tabla-pdf" >
	<tbody>
		<tr style="background-color: #F4F4F4; ">
			<td><strong class="letra_azul">Apellidos Beneficiario:</strong><br />' . $srcmt_brigadistas_dado->getApellidosBeneficiario() . '</td>
			<td><strong class="letra_azul">Nombres Beneficiario:</strong><br />' . $srcmt_brigadistas_dado->getNombresBeneficiario() . '</td>
                        <td><strong class="letra_azul">C&eacute;dula Beneficiario:</strong><br />' . $srcmt_brigadistas_dado->getCedulaBeneficiario() . '</td>
			<td><strong class="letra_azul">Tel&eacute;fono Beneficiario:</strong><br />' . $srcmt_brigadistas_dado->getTelefonoBeneficiario() . '</td>
		</tr>

	</tbody>
</table>';

        // add a page
        $pdf->AddPage();

// output the HTML content


        foreach ($html as $key => $value) {
            $pdf->writeHTML($style . $html[$key], true, false, true, false, '');
        }

        // Asegura que no se use un layout
        $this->setLayout(false);
        // Close and output PDF document
        $pdf->Output('Brigadistas_dado_individual.pdf', 'I');

        // Stop symfony process
        throw new sfStopException();
    }

}

?>
