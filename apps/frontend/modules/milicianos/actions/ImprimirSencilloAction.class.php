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
                if (!$this->getUser()->hasPermission('Recuperar Brigadistas Estudiantiles')) {
                    $this->redirect('@sf_guard_secure');
                }
            }
        } else {
            $this->redirect('@sf_guard_secure');
        }

        $config = sfTCPDFPluginConfigHandler::loadConfig('Srcmt_config_vertical');

        sfTCPDFPluginConfigHandler::includeLangFile('es');

        $autor = $this->getUser()->getName();
        $doc_title = "Registro Individual Brigadista Estudiantil";
        $doc_subject = "Registro Individual Brigadista Estudiantil";
        $doc_keywords = "Brigadistas Estudiantiles, Registro Individual";


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

        $tituloReporte = "Registro Individual de Brigadistas Estudiantiles.";

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

        $this->miliciano = $this->getRoute()->getObject();
        $miliciano = $this->miliciano;

        //Evalua si el registro tiene una foto asociada para garantizar la renderizacion en PDF
        //$foto=(isEmpty($miliciano->getFoto())) ? '_blank.png' : $miliciano->getFoto();

        $foto = '';
        if (!$miliciano->getFoto()) {
            $foto = '_blank.png';
        } elseif ($miliciano->getFoto() == '') {
            $foto = '_blank.png';
        } elseif ($miliciano->getFoto() == NULL) {
            $foto = '_blank.png';
        } else {
            $foto = $miliciano->getFoto();
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

			</tr>

			<tr style="background-color: #F4F4F4; ">
				<td >
					<strong class="letra_azul">Sexo: </strong><br />
					' . $miliciano->getSexo() . '
				</td>
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
					<strong class="letra_azul">C&oacute;digo Brigadista: </strong><br />
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
				
			</tr>

			<tr style="background-color: #F4F4F4; ">

				
				<td>
					&nbsp;
				</td>
                                <td>
					&nbsp;
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
						<strong class="letra_azul">Estado:</strong><br />' . mb_convert_case($miliciano->getEstado(), MB_CASE_TITLE, "UTF-8") . '

					</td>
					<td>
						<strong class="letra_azul" >Municipio:</strong><br />' . mb_convert_case($miliciano->getMunicipio(), MB_CASE_TITLE, "UTF-8") . '
					</td>
					<td>
						<strong class="letra_azul" >Parroquia:</strong><br />' . mb_convert_case($miliciano->getParroquia(), MB_CASE_TITLE, "UTF-8") . '
					</td>
					<td>
						<strong class="letra_azul" >Ciudad:</strong><br />' . mb_convert_case($miliciano->getCiudad(), MB_CASE_TITLE, "UTF-8") . '
					</td>
				</tr>
				<tr>

					<td colspan="2">
						<p>
							<strong class="letra_azul" >Direcci&oacute;n:</strong><br /> '. $miliciano->getDireccion() .' 
						</p>

					</td>
					<td>
						<strong class="letra_azul" >Tel&eacute;fono Local:</strong><br />' . $miliciano->getTelefonoLocal() . '
					</td>
					<td>
						<strong class="letra_azul" >Movil:</strong><br />' . $miliciano->getMovil() . '
					</td>
				</tr>
				<tr style="background-color: #F4F4F4; ">

					<td>
						<strong class="letra_azul" >Correo Electr&oacute;nico:</strong><br />' . $miliciano->getCorreoElectronico() . '
					</td>
					<td>
						<strong class="letra_azul" >Tel&eacute;fono de Emergencia:</strong><br />' . $miliciano->getTelefonoEmergencia() . '
					</td>
					<td colspan="2">
						<p>
							<strong class="letra_azul" >Direcci&oacute;n Emergencia:</strong><br />' . $miliciano->getDireccionEmergencia() . '
						</p>
					</td>

				</tr>
			</tbody>
		</table>
	';
         $html[] = '<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Datos Acad&eacute;micos</h3>
	<hr>
	<span>&nbsp;</span>';
        $html[] = '
		<table border="0" cellspacing="1" cellpadding="1" class="ancho-vertical-pdf letra_verdana colapsa-borde-tabla-pdf">
			<tbody>
				<tr style="background-color: #F4F4F4; ">
					<td>
						<strong class="letra_azul">Grado de Instruccion:</strong><br />' . $miliciano->getGradoInstruccion() . '

					</td>
					<td>
						<strong class="letra_azul" >Especialidad:</strong><br />' .$miliciano->getEspecialidad() . '
					</td>
					<td>
						<strong class="letra_azul" >Idioma:</strong><br />' . $miliciano->getIdiomas() . '
					</td>
					<td>
						<strong class="letra_azul" >Nivel:</strong><br />' . $miliciano->getNivelDominioIdioma() . '
					</td>
                                        
				</tr>
				<tr>

					<td colspan="2">
						<p>
							<strong class="letra_azul" >Programa de Formaci&oacute;n de Grado:</strong><br /> '. $miliciano->getProgramaFormacionGrado() .' 
						</p>

					</td>
					<td>
						<strong class="letra_azul" >Trayecto:</strong><br />' . $miliciano->getTrayecto() . '
					</td>
					<td>
						<strong class="letra_azul" >Tramo:</strong><br />' . $miliciano->getTramo() . '
					</td>
				</tr>
				<tr style="background-color: #F4F4F4; ">

					<td>
						<strong class="letra_azul" >Aldea:</strong><br />' . $miliciano->getAldea() . '
					</td>
					<td>
						<strong class="letra_azul" >Sede:</strong><br />' . $miliciano->getSedes() . '
					</td>
					<td>
					&nbsp;
				</td>
                                <td>
					&nbsp;
				</td>
                                
				</tr>
			</tbody>
		</table>
	';
        
        $html[] = '<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Inserci&oacute;n Social</h3>
	<hr>
	<span>&nbsp;</span>';
        $html[] = '<table border="0" cellspacing="2" cellpadding="2" class="ancho-vertical-pdf letra_verdana colapsa-borde-tabla-pdf" >
	<tbody>
		<tr style="background-color: #F4F4F4; ">
			<td><strong class="letra_azul">Practica Deporte:</strong><br />' . $miliciano->getPracticaDeporte() . '</td>
                        <td><strong class="letra_azul">Deporte:</strong><br />' . $miliciano->getDeporte() . '</td>
                        <td><strong class="letra_azul">Participa Actividad Cultural:</strong><br />' . $miliciano->getParticipaActividadCultural() . '</td>
                        <td><strong class="letra_azul">Actividad Cultural:</strong><br />' . $miliciano->getActividadCultural() . '</td>
                        <td><strong class="letra_azul">Agrupaciones Sociales:</strong><br />' . $miliciano->getAgrupacionSocial() . '</td>
			<td><strong class="letra_azul">Misiones Sociales:</strong><br />' . $miliciano->getMisiones() . '</td>

		</tr>

	</tbody>
</table>';
        
         $html[] = '<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp;Movilidad y Defensa </h3>
	<hr>
	<span>&nbsp;</span>';
        $html[] = '
		<table border="0" cellspacing="1" cellpadding="1" class="ancho-vertical-pdf letra_verdana colapsa-borde-tabla-pdf">
			<tbody>
				<tr style="background-color: #F4F4F4; ">
					<td>
						<strong class="letra_azul">Posee Vehiculo:</strong><br />' . $miliciano->getPoseeVehiculo() . '

					</td>
					<td>
						<strong class="letra_azul" >Tipo de Vehiculo:</strong><br />' .$miliciano->getTipoVehiculo() . '
					</td>
					<td>
						<strong class="letra_azul" >Modelo de Vehiculo:</strong><br />' . $miliciano->getModeloVehiculo() . '
					</td>
					<td>
						<strong class="letra_azul" >Numero de Placa:</strong><br />' . $miliciano->getNumeroPlaca() . '
					</td>
                                        
				</tr>
				<tr>

					<td colspan="2">
						<p>
							<strong class="letra_azul" >Posee Licencia:</strong><br /> '. $miliciano->getPoseeLicencia() .' 
						</p>

					</td>
					<td>
						<strong class="letra_azul" >Grado de Licencia:</strong><br />' . $miliciano->getGradoLicencia() . '
					</td>
					<td>
						<strong class="letra_azul" >Porte de Armas:</strong><br />' . $miliciano->getPorteArmas() . '
					</td>
				</tr>
				<tr>
					<td>
						<strong class="letra_azul" >Numero Porte de Armas:</strong><br />' . $miliciano->getNumeroPorteArmas() . '
					</td>
					<td>
						<strong class="letra_azul" >Tipo de Armamento:</strong><br />' . $miliciano->getTipoArmamento() . '
					</td>
                                        <td>
						<strong class="letra_azul" >Calibre de Armamento:</strong><br />' . $miliciano->getCalibreArmamento() . '
					</td>

					<td>
					&nbsp;
				</td>
                                                               
				</tr>
			</tbody>
		</table>
	';
        
         
         $html[] = '<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Se&ntilde;ales Fisionomicas</h3>
	<hr>
	<span>&nbsp;</span>';
        $html[] = '<table border="0" cellspacing="2" cellpadding="2" class="ancho-vertical-pdf letra_verdana colapsa-borde-tabla-pdf" >
	<tbody>
		<tr style="background-color: #F4F4F4; ">
			<td><strong class="letra_azul">Estatura:</strong><br />' . $miliciano->getEstatura() . '</td>
			<td><strong class="letra_azul">Color Cabello:</strong><br />' . $miliciano->getColorCabello() . '</td>
			<td><strong class="letra_azul">Peso Kg:</strong><br />' . $miliciano->getPeso() . '</td>
			<td><strong class="letra_azul">Color Piel:</strong><br />' . $miliciano->getColorPiel() . '</td>
                        <td><strong class="letra_azul">Talla Uniforme:</strong><br />' . $miliciano->getTallaUniforme() . '</td>    
		</tr>
		<tr>
			
			<td><strong class="letra_azul">Talla Calzado:</strong><br />' . $miliciano->getTallaCalzado() . '</td>
                        <td><strong class="letra_azul">Discapacidad:</strong><br />' . $miliciano->getDominioMano() . '</td>
			<td><strong class="letra_azul">Alergias:</strong><br />' . $miliciano->getAlergias() . '</td>
                        <td><strong class="letra_azul">Dominio Mano:</strong><br />' . $miliciano->getDominioMano() . '</td>
                        <td>
					&nbsp;
				</td>    
		</tr>
		
	</tbody>
</table>';
        
        $html[] = '<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Datos Laborales</h3>
	<hr>
	<span>&nbsp;</span>';
        $html[] = '<table border="0" cellspacing="2" cellpadding="2" class="ancho-vertical-pdf letra_verdana colapsa-borde-tabla-pdf" >
	<tbody>
		<tr style="background-color: #F4F4F4; ">
			<td><strong class="letra_azul">Profesi&oacute;n:</strong><br /> ' . $miliciano->getProfesion() . ' </td>
			<td><strong class="letra_azul">Oficio:</strong><br /> ' . $miliciano->getOficio() . ' </td>
			<td><strong class="letra_azul">Trabaja Si o No:</strong><br />' . $miliciano->getTrabajaSiNo() . '</td>
			<td><strong class="letra_azul">Nombre Empresa:</strong><br />' . $miliciano->getNombreEmpresa() . '</td>
                        <td><strong class="letra_azul">Direcci&oacute;n Oficina:</strong><br />' . $miliciano->getDireccionOficina() . '</td>
			<td><strong class="letra_azul">Telefono Oficina:</strong><br />' . $miliciano->getTelefonoOficina() . '</td>           
		</tr>
		
		
	</tbody>
</table>';
        
       
        
//		$html[] = '<span>&nbsp;</span>';
       
//		$html[] = '<span>&nbsp;</span>';
       
//$html[] = '<span>&nbsp;</span>';
        
//                $html[] = '<span>&nbsp;</span>';
        $html[] = '<h3 class="letra_azul letra_verdana " style="background-color: #F4F4F4;">&nbsp;&nbsp; Beneficiario</h3>
	<hr>
	<span>&nbsp;</span>';
        $html[] = '<table border="0" cellspacing="2" cellpadding="2" class="ancho-vertical-pdf letra_verdana colapsa-borde-tabla-pdf" >
	<tbody>
		<tr style="background-color: #F4F4F4; ">
			<td><strong class="letra_azul">Apellidos Beneficiario:</strong><br />' . $miliciano->getApellidosBeneficiario() . '</td>
			<td><strong class="letra_azul">Nombres Beneficiario:</strong><br />' . $miliciano->getNombresBeneficiario() . '</td>
                        <td><strong class="letra_azul">C&eacute;dula Beneficiario:</strong><br />' . $miliciano->getCedulaBeneficiario() . '</td>
			<td><strong class="letra_azul">Tel&eacute;fono Beneficiario:</strong><br />' . $miliciano->getTelefonoBeneficiario() . '</td>
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
        $pdf->Output('Brigadistas_estudiantiles_individual.pdf', 'I');

        // Stop symfony process
        throw new sfStopException();
    }

}

?>
