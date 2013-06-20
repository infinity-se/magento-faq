<?php

class Infinity_Faq_Model_Config extends Mage_Core_Model_Abstract {
	
	public function _construct(){
		
		parent::_construct();
		$this->_init('faq/config');
	}
	
}