<?php

class MobWeb_IgnoreRequiredFieldsPasswordReset_Helper_Data extends Mage_Core_Helper_Abstract
{
	public $brandSpecificTurnovers;

	/*
	 *
	 * Returns an array with the brand IDs and the turnover limit specified
	 *
	 */
	public function getTurnoverLimits()
	{
		// Get the brand specific turnover for each brand as specified
		// in the admin panel
		if(!($brandSpecificTurnovers = $this->brandSpecificTurnovers)) {
			for($i=0;$i<=10;$i++) {
				$brand = Mage::getStoreConfig('ignorerequiredfieldspasswordreset/limits/brand' . $i);
				$brandLimit = Mage::getStoreConfig('ignorerequiredfieldspasswordreset/limits/brand' . $i . '_limit');
				if($brand && $brandLimit) {
					$brandSpecificTurnovers[$brand] = $brandLimit;
				}
			}
			$this->brandSpecificTurnovers = $brandSpecificTurnovers;
		}

		return $brandSpecificTurnovers;
	}

	/*
	 *
	 * Returns the turnover limit for a specific brand ID
	 *
	 */
	public function getTurnoverLimit($brandId)
	{
		$brandSpecificTurnovers = $this->getTurnoverLimits();
		if(array_key_exists($brandId, $brandSpecificTurnovers)) {
			return $brandSpecificTurnovers[$brandId];
		}
	}

	public function getCustomerIgnoreRequiredFieldsPasswordReset($customerId, $brandId)
	{
		$resource = Mage::getSingleton('core/resource');
		$readConnection = $resource->getConnection('core_read');
		$query = sprintf('SELECT sum(amount) FROM %s WHERE type = %s AND customer_id = %s AND brand_id = %s',  $resource->getTableName('mobweb_ignorerequiredfieldspasswordreset/turnover'), '1', $customerId, $brandId);
		$results = $readConnection->fetchAll($query);
		return $results[0]['sum(amount)'];
	}
}