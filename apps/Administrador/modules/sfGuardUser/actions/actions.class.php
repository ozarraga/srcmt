<?php

require_once dirname(__FILE__) . '/../lib/sfGuardUserGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/sfGuardUserGeneratorHelper.class.php';

/**
 * sfGuardUser actions.
 *
 * @package    srcmt
 * @subpackage sfGuardUser
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserActions extends autoSfGuardUserActions {

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->sf_guard_user = $this->getRoute()->getObject();
        $this->sf_guard_groups = $this->sf_guard_user->getSfGuardUserGroup();

        if ($this->sf_guard_groups->count() > 0) {
            $this->getUser()->setFlash('notice', 'El usuario "' . $this->sf_guard_user . '" no se puede borrar porque tiene asignaciones a grupos');
            $this->redirect($request->getReferer());
        }
        $this->sf_guard_permissions = $this->sf_guard_user->getSfGuardUserPermission();
        if ($this->sf_guard_permissions->count() > 0) {
            $this->getUser()->setFlash('notice', 'El usuario "' . $this->sf_guard_user . '" no se puede borrar porque tiene permisos asignados');
            $this->redirect($request->getReferer());
        }
//        $this->brigadista_dado->delete();
//        $this->redirect('@BrigadistasDado');



        parent::executeDelete($request);
    }

    protected function executeBatchDelete(sfWebRequest $request) {
        $ids = $request->getParameter('ids');

        $collectionUsers = Doctrine_Query::create()
                ->from('sfGuardUser')
                ->whereIn('id', $ids)
                ->execute();

        foreach ($collectionUsers as $clave => $usuario) {
            if ($usuario->getIsSuperAdmin() == true) {
                $this->getUser()->setFlash('notice', 'El usuario "' . $usuario . '" no se puede borrar porque es Super Administrador');
                 $this->redirect('@sf_guard_user');
                break;
            }
            $this->sf_guard_groups = $usuario->getSfGuardUserGroup();

            if ($this->sf_guard_groups->count() > 0) {
                $this->getUser()->setFlash('notice', 'El usuario "' . $usuario . '" no se puede borrar porque tiene asignaciones a grupos');
                 $this->redirect('@sf_guard_user');
            }
            $this->sf_guard_permissions = $usuario->getSfGuardUserPermission();
            if ($this->sf_guard_permissions->count() > 0) {
                $this->getUser()->setFlash('notice', 'El usuario "' . $usuario . '" no se puede borrar porque tiene permisos asignados');
                 $this->redirect('@sf_guard_user');
            }
        }

        $errorMessage = '';
        try {
            $count = Doctrine_Query::create()
                    ->delete()
                    ->from('sfGuardUser')
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

        $this->redirect('@sf_guard_user');
    }

}
