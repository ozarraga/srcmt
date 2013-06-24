<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SrcmtTcpdf
 *
 * @author ozarraga
 * Extiende la clase TCPDF para usar en Symfony
 *
 */
include_once(dirname(__FILE__) . '/../plugins/sfTCPDFPlugin/lib/tcpdf/config/lang/spa.php');
include_once(dirname(__FILE__) . '/../plugins/sfTCPDFPlugin/lib/tcpdf/tcpdf.php');

class SrcmtTcpdf extends sfTCPDF {
    
    function Fila($Registro, $Altura) {

//        $tituloReporte = $this->__get('encabezado_tituloReporte');
//        $TituloCreado = $this->__get('encabezado_tituloCreado');
//        $TituloActualizado = $this->__get('encabezado_tituloActualizado');
//        $titulosEncabezados = $this->__get('encabezado_titulosEncabezados');
//        $AnchoImprimible = $this->__get('AnchoImprimible');
        $MaxColumnas = $this->__get('MaxColumnas');
//        $NumCampos = $this->__get('NumCampos');
        $AnchoMinimoDeColumna = $this->__get('AnchoMinimoDeColumna');
//        $AnchoMaximoDeColumna = $this->__get('AnchoMaximoDeColumna');

        $ancho_columnas = $this->__get('ancho_columnas');
//        $alto_filas=$this->__get('alto_filas');
        $seleccion = $this->__get('seleccion');

        $indice = 0;

        //$seleccionII = $this->userData['seleccion'];
//        $ArrayHeight = array();

        $Salto_pagina = $this->checkPageBreak($Altura);
        $indice = 0;
        foreach ($seleccion as $campo => $contenido) {

            if ($indice >= $MaxColumnas) {
                break;
            }
            if (!isset($ancho_columnas[$indice])) {
                $ancho_columnas[$indice] = $AnchoMinimoDeColumna;
            }
            if (!isset($Registro[$campo])) {
                break;
            }
//			$pdf->MultiCell($w, $h, $txt, $border, $align, $fill, $ln, $x, $y, $reseth, $stretch, $ishtml, $autopadding, $maxh, $valign, $fitcell);
            $this->MultiCell($ancho_columnas[$indice], $Altura, html_entity_decode($Registro[$campo], ENT_QUOTES, 'UTF-8'), 1, 'C', false, 0, '', '', true, 0, false, true, 0, 'T', false);

            $indice++;
        }
    }

    function AnchoImprimible($NumeroPagina = '') {
        $Margenes = $this->getMargins();
        $DimensionesDePagina = $this->getPageDimensions($NumeroPagina);
        $AnchoImprimible = $DimensionesDePagina['wk'] - ($Margenes['left'] + $Margenes['right']);
        return $AnchoImprimible;
    }

    function AltoImprimible($NumeroPagina = '') {

        $Margenes = $this->getMargins();

        $DimensionesDePagina = $this->getPageDimensions($NumeroPagina);
        $AltoImprimible = $DimensionesDePagina['hk'] - ($Margenes['top'] + $Margenes['bottom']);
        return $AltoImprimible;
    }

    function MargenSuperior() {
        $Margenes = $this->getMargins();
        return $Margenes['top'];
    }

    function MargenInferior() {
        $Margenes = $this->getMargins();
        return $Margenes['bottom'];
    }



}

?>
