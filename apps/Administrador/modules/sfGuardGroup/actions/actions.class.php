<?php

require_once dirname(__FILE__) . '/../lib/sfGuardGroupGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/sfGuardGroupGeneratorHelper.class.php';

/**
 * sfGuardGroup actions.
 *
 * @package    srcmt
 * @subpackage sfGuardGroup
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardGroupActions extends autoSfGuardGroupActions {

    protected function executeBatchDelete(sfWebRequest $request) {
        $ids = $request->getParameter('ids');

        $collectionGroups = Doctrine_Query::create()
                ->from('sfGuardGroup')
                ->whereIn('id', $ids)
                ->execute();

        foreach ($collectionGroups as $clave => $grupo) {

            $this->sf_guard_users = $grupo->getSfGuardUserGroup();

            if ($this->sf_guard_users->count() > 0) {
                $this->getUser()->setFlash('notice', 'El grupo "' . $grupo . '" no se puede borrar porque tiene usuarios asignados');
                $this->redirect('@sf_guard_group');
            }
            $this->sf_guard_permissions = $grupo->getSfGuardUserPermission();
            if ($this->sf_guard_permissions->count() > 0) {
                $this->getUser()->setFlash('notice', 'El grupo "' . $grupo . '" no se puede borrar porque tiene permisos asignados');
                $this->redirect('@sf_guard_group');
            }
        }

        $errorMessage = '';
        try {
            $count = Doctrine_Query::create()
                    ->delete()
                    ->from('sfGuardGroup')
                    ->whereIn('id', $ids)
                    ->execute();
            
        } catch (Exception $exc) {
            $errorMessage = $exc->getMessage();
        }


        if ($count >= count($ids)) {
            $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
        } else {
            $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items. "' . $errorMessage . '"');
        }

        $this->redirect('@sf_guard_group');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->sf_guard_group = $this->getRoute()->getObject();
        $this->sf_guard_users = $this->sf_guard_group->getSfGuardUserGroup();

        if ($this->sf_guard_users->count() > 0) {
            $this->getUser()->setFlash('notice', 'El grupo "' . $this->sf_guard_group . '" no se puede borrar porque tiene usuarios asignados');
            $this->redirect('@sf_guard_group');
        }
        $this->sf_guard_permissions = $this->sf_guard_group->getSfGuardGroupPermission();
        if ($this->sf_guard_permissions->count() > 0) {
            $this->getUser()->setFlash('notice', 'El grupo "' . $this->sf_guard_group . '" no se puede borrar porque tiene permisos asignados');
            $this->redirect('@sf_guard_group');
        }
//        $this->brigadista_dado->delete();
//        $this->redirect('@BrigadistasDado');



        parent::executeDelete($request);
    }

}
