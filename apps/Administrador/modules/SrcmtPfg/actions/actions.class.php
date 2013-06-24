<?php

require_once dirname(__FILE__).'/../lib/SrcmtPfgGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/SrcmtPfgGeneratorHelper.class.php';

/**
 * SrcmtPfg actions.
 *
 * @package    srcmt
 * @subpackage SrcmtPfg
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SrcmtPfgActions extends autoSrcmtPfgActions
{
    protected function executeBatchDelete(sfWebRequest $request) {
        $ids = $request->getParameter('ids');

        $collectionPfg = Doctrine_Query::create()
                ->from('SrcmtPfg')
                ->whereIn('id_pfg', $ids)
                ->execute();

        foreach ($collectionPfg as $clave => $pfg) {

            $this->srcmt_milicianos = $pfg->getSrcmtMilicianos();

            if ($this->srcmt_milicianos->count() > 0) {
                $this->getUser()->setFlash('notice', 'El pfg "' . $pfg . '" no se puede borrar porque tiene brigadistas estudiantiles asignados');
                $this->redirect('@srcmt_pfg');
            }
        }

        $errorMessage = '';
        try {
            $count = Doctrine_Query::create()
                    ->delete()
                    ->from('SrcmtPfg')
                    ->whereIn('id_pfg', $ids)
                    ->execute();
        } catch (Exception $exc) {
            $errorMessage = $exc->getMessage();
        }


        if ($count >= count($ids)) {
            $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
        } else {
            $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items. "' . $errorMessage . '"');
        }

        $this->redirect('@srcmt_pfg');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->srcmt_pfg = $this->getRoute()->getObject();
        $this->srcmt_milicianos = $this->srcmt_pfg->getSrcmtMilicianos();

            if ($this->srcmt_milicianos->count() > 0) {
                $this->getUser()->setFlash('notice', 'El pfg "' . $this->srcmt_pfg . '" no se puede borrar porque tiene brigadistas estudiantiles asignados');
                $this->redirect('@srcmt_pfg');
            }
        
//        $this->brigadista_dado->delete();
//        $this->redirect('@BrigadistasDado');

        parent::executeDelete($request);
    }
}
