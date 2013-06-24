<?php

require_once dirname(__FILE__).'/../lib/SrcmtSedesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/SrcmtSedesGeneratorHelper.class.php';

/**
 * SrcmtSedes actions.
 *
 * @package    srcmt
 * @subpackage SrcmtSedes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SrcmtSedesActions extends autoSrcmtSedesActions
{
    protected function executeBatchDelete(sfWebRequest $request) {
        $ids = $request->getParameter('ids');

        $collectionSedes = Doctrine_Query::create()
                ->from('SrcmtSedes')
                ->whereIn('id_sedes', $ids)
                ->execute();

        foreach ($collectionSedes as $clave => $sede) {

            $this->srcmt_milicianos = $sede->getSrcmtMilicianos();

            if ($this->srcmt_milicianos->count() > 0) {
                $this->getUser()->setFlash('notice', 'La sede "' . $sede . '" no se puede borrar porque tiene brigadistas estudiantiles asignados');
                $this->redirect('@srcmt_sedes');
            }
             $this->srcmt_brigadistas_dado = $sede->getSrcmtBrigadistasDado();

            if ($this->srcmt_brigadistas_dado->count() > 0) {
                $this->getUser()->setFlash('notice', 'La sede "' . $sede . '" no se puede borrar porque tiene brigadistas DADO asignados');
                $this->redirect('@srcmt_sedes');
            }
        }

        $errorMessage = '';
        try {
            $count = Doctrine_Query::create()
                    ->delete()
                    ->from('SrcmtSedes')
                    ->whereIn('id_sedes', $ids)
                    ->execute();
        } catch (Exception $exc) {
            $errorMessage = $exc->getMessage();
        }


        if ($count >= count($ids)) {
            $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
        } else {
            $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items. "' . $errorMessage . '"');
        }

        $this->redirect('@srcmt_sedes');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->srcmt_sede = $this->getRoute()->getObject();
        $this->srcmt_milicianos = $this->srcmt_sede->getSrcmtMilicianos();

            if ($this->srcmt_milicianos->count() > 0) {
                $this->getUser()->setFlash('notice', 'La sede "' . $this->srcmt_sede . '" no se puede borrar porque tiene brigadistas estudiantiles asignados');
                $this->redirect('@srcmt_sedes');
            }
            $this->srcmt_brigadistas_dado = $this->srcmt_sede->getSrcmtBrigadistasDado();

            if ($this->srcmt_brigadistas_dado->count() > 0) {
                $this->getUser()->setFlash('notice', 'La sede "' . $this->srcmt_sede . '" no se puede borrar porque tiene brigadistas DADO asignados');
                $this->redirect('@srcmt_sedes');
            }
}
}
