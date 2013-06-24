<?php use_helper('I18N') ?>

<h2><?php echo __('Oops! The page you asked for is secure and you do not have proper credentials.', null, 'messages') ?></h2>

<p><?php echo sfContext::getInstance()->getRequest()->getUri() ?></p>

<h3><?php echo __('Login below to gain access', null, 'messages') ?></h3>

<?php echo get_component('sfGuardAuth', 'signin_form') ?>