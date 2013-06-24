<?php

require_once dirname(__FILE__) . '/../lib/sfGuardPermissionGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/sfGuardPermissionGeneratorHelper.class.php';

/**
 * sfGuardPermission actions.
 *
 * @package    srcmt
 * @subpackage sfGuardPermission
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardPermissionActions extends autoSfGuardPermissionActions {

    protected function executeBatchDelete(sfWebRequest $request) {
        $ids = $request->getParameter('ids');

        $collectionPermissions = Doctrine_Query::create()
                ->from('sfGuardPermission')
                ->whereIn('id', $ids)
                ->execute();

        foreach ($collectionPermissions as $clave => $permiso) {

            $this->sf_guard_groups = $permiso->getSfGuardGroupPermission();

            if ($this->sf_guard_groups->count() > 0) {
                $this->getUser()->setFlash('notice', 'El permiso "' . $permiso . '" no se puede borrar porque tiene usuarios asignados');
                $this->redirect('@sf_guard_permission');
            }
            $this->sf_guard_users = $permiso->getSfGuardUserPermission();
            if ($this->sf_guard_users->count() > 0) {
                $this->getUser()->setFlash('notice', 'El permiso "' . $permiso . '" no se puede borrar porque tiene grupos asignados');
                $this->redirect('@sf_guard_permission');
            }
        }

        $errorMessage = '';
        try {
            $count = Doctrine_Query::create()
                    ->delete()
                    ->from('sfGuardPermission')
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

        $this->redirect('@sf_guard_permission');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->sf_guard_permission = $this->getRoute()->getObject();
        $this->sf_guard_users =  $this->sf_guard_permission->getSfGuardUserPermission();
        if ($this->sf_guard_users->count() > 0) {
            $this->getUser()->setFlash('notice', 'El permiso "' .  $this->sf_guard_permission . '" no se puede borrar porque tiene grupos asignados');
            $this->redirect('@sf_guard_permission');
        }
        $this->sf_guard_groups =  $this->sf_guard_permission->getSfGuardGroupPermission();

        if ($this->sf_guard_groups->count() > 0) {
            $this->getUser()->setFlash('notice', 'El permiso "' .  $this->sf_guard_permission . '" no se puede borrar porque tiene usuarios asignados');
            $this->redirect('@sf_guard_permission');
        }
//        $this->brigadista_dado->delete();
//        $this->redirect('@BrigadistasDado');

        parent::executeDelete($request);
    }

}
