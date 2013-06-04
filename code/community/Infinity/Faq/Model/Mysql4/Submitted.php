<?php

class Infinity_Faq_Model_Mysql4_Submitted extends Mage_Core_Model_Mysql4_Abstract
{
	public function _construct(){
		
		$this->_init('faq/submitted', 'submitted_id');
	}
}