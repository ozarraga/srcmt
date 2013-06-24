<?php

/**
 * Estadisticas actions.
 *
 * @package    srcmt
 * @subpackage Estadisticas
 * @author     Oswaldo Zarraga
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EstadisticasActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
}
