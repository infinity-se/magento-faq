<?php

class Infinity_Faq_Block_Adminhtml_Config extends Mage_Adminhtml_Block_Widget_Tabs
{

public function __construct(){
		
		$this->_controller = 'adminhtml_faq';
		$this->_blockGroup = 'faq';
		$this->_headerText = Mage::helper('faq')->__('Faq Config');
		
		parent::__construct();
	}
}