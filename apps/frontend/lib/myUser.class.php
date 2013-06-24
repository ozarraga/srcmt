<?php

class myUser extends sfGuardSecurityUser
{
    public function __toString() {
        return parent::__toString();
    }

    public function addGroupByName($name, $con = null) {
        return parent::addGroupByName($name, $con);
    }

    public function addPermissionByName($name, $con = null) {
        return parent::addPermissionByName($name, $con);
    }

    public function checkPassword($password) {
        return parent::checkPassword($password);
    }

    protected function generateRandomKey($len = 20) {
        return parent::generateRandomKey($len);
    }

    public function getAllPermissionNames() {
        return parent::getAllPermissionNames();
    }

    public function getAllPermissions() {
        return parent::getAllPermissions();
    }

    public function getEmail() {
        return parent::getEmail();
    }

    public function getGroupNames() {
        return parent::getGroupNames();
    }

    public function getGroups() {
        return parent::getGroups();
    }

    public function getGuardUser() {
        return parent::getGuardUser();
    }

    public function getName() {
        return parent::getName();
    }

    public function getPermissionNames() {
        return parent::getPermissionNames();
    }

    public function getPermissions() {
        return parent::getPermissions();
    }

    public function getProfile() {
        return parent::getProfile();
    }

    public function getReferer($default) {
        return parent::getReferer($default);
    }

    public function getUsername() {
        return parent::getUsername();
    }

    public function hasCredential($credential, $useAnd = true) {
        return parent::hasCredential($credential, $useAnd);
    }

    public function hasGroup($name) {
        return parent::hasGroup($name);
    }

    public function hasPermission($name) {
        return parent::hasPermission($name);
    }

    public function initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array()) {
        parent::initialize( $dispatcher,  $storage, $options);
    }

    public function isAnonymous() {
        return parent::isAnonymous();
    }

    public function isSuperAdmin() {
        return parent::isSuperAdmin();
    }

    public function setPassword($password, $con = null) {
        parent::setPassword($password, $con);
    }

    public function setReferer($referer) {
        parent::setReferer($referer);
    }

    public function signIn($user, $remember = false, $con = null) {
        parent::signIn($user, $remember, $con);
    }

    public function signOut() {
        parent::signOut();
    }

}

