<?php

require_once dirname(__FILE__) . '/../lib/SrcmtTipoActividadGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/SrcmtTipoActividadGeneratorHelper.class.php';

/**
 * SrcmtTipoActividad actions.
 *
 * @package    srcmt
 * @subpackage SrcmtTipoActividad
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SrcmtTipoActividadActions extends autoSrcmtTipoActividadActions {

    protected function executeBatchDelete(sfWebRequest $request) {
        $ids = $request->getParameter('ids');

        $collectionTipoActividad = Doctrine_Query::create()
                ->from('SrcmtTipoActividad')
                ->whereIn('codigo_tipo_actividad', $ids)
                ->execute();

        foreach ($collectionTipoActividad as $clave => $tipo) {

            $this->srcmt_actividades_icm = $tipo->getSrcmtActividadesIcm();

            if ($this->srcmt_actividades_icm->count() > 0) {
                $this->getUser()->setFlash('notice', 'El tipo de actividad "' . $tipo . '" no se puede borrar porque tiene actividades ICM asociadas');
                $this->redirect('@srcmt_tipo_actividad');
            }
            $this->srcmt_actividades_academicas = $tipo->getSrcmtActividadesAcademicas();

            if ($this->srcmt_actividades_academicas->count() > 0) {
                $this->getUser()->setFlash('notice', 'El tipo de  actividad "' . $tipo . '" no se puede borrar porque tiene actividades academicas asignados');
                $this->redirect('@srcmt_tipo_actividad');
            }
        }

        $errorMessage = '';
        try {
            $count = Doctrine_Query::create()
                    ->delete()
                    ->from('SrcmtTipoActividad')
                    ->whereIn('codigo_tipo_actividad', $ids)
                    ->execute();
        } catch (Exception $exc) {
            $errorMessage = $exc->getMessage();
        }


        if ($count >= count($ids)) {
            $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
        } else {
            $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items. "' . $errorMessage . '"');
        }

        $this->redirect('@srcmt_tipo_actividad');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->srcmt_tipo_actividad = $this->getRoute()->getObject();
        $this->srcmt_actividades_icm =   $this->srcmt_tipo_actividad->getSrcmtActividadesIcm();

            if ($this->srcmt_actividades_icm->count() > 0) {
                $this->getUser()->setFlash('notice', 'El tipo de actividad "' . $this->srcmt_tipo_actividad . '" no se puede borrar porque tiene actividades ICM asociadas');
                $this->redirect('@srcmt_tipo_actividad');
            }
            $this->srcmt_actividades_academicas = $this->srcmt_tipo_actividad->getSrcmtActividadesAcademicas();

            if ($this->srcmt_actividades_academicas->count() > 0) {
                $this->getUser()->setFlash('notice', 'El tipo de  actividad "' . $this->srcmt_tipo_actividad . '" no se puede borrar porque tiene actividades academicas asignados');
                $this->redirect('@srcmt_tipo_actividad');
            }
    }

}
