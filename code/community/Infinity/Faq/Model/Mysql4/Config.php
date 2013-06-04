<?php

class Infinity_Faq_Model_Mysql4_Config extends Mage_Core_Model_Mysql4_Abstract
{
	public function _construct(){
		
		$this->_init('faq/config', 'config_id');
	}
}