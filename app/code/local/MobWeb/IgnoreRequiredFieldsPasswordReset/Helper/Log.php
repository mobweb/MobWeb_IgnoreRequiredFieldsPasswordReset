<?php

class MobWeb_IgnoreRequiredFieldsPasswordReset_Helper_Log extends Mage_Core_Helper_Abstract
{
    public function log($msg, $level = null)
    {
        Mage::log($msg, $level, $this->_getModuleName() . '.log');
    }
}
