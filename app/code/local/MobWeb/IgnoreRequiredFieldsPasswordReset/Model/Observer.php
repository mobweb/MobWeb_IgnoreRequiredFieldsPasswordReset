<?php
class MobWeb_IgnoreRequiredFieldsPasswordReset_Model_Observer
{
	/*
	 *
	 *
	 *
	 */
	public function registerIgnoredFields(Varien_Event_Observer $observer)
	{
		// To disable the ignoring of one of the fields below, simply comment out or remove the relevant line below
		$ignoredFields = array();
		$ignoredFields[] = 'dob';
		$ignoredFields[] = 'taxvat';
		$ignoredFields[] = 'gender';

		foreach($ignoredFields AS $ignoredField) {
			Mage::register(sprintf('skip_%s_validation', $ignoredField), true);
			Mage::helper('mobweb_ignorerequiredfieldspasswordreset/log')->log(sprintf('registered field "%s" to be ignored', $ignoredField));
		}

		return $this;
		
	}
}