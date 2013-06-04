<?php
/**
 * Infinity Faq Index Controller by Matthew Gribben
 *
 * @category   Infinity
 * @package    Infinity_Faq
 * @copyright  Copyright (c) 2013 Matthew Gribben
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Infinity_Faq_IndexController extends Mage_Core_Controller_Front_Action {
	

    public function indexAction(){
    	
    	$this->checkModule();

		$this->loadLayout();     
		$this->renderLayout();
    }
    
    protected function checkModule(){
    	$model  = Mage::getModel('faq/config');
    	$model->load(0);
    	if($model->getStatus() == '2'){
    		$this->_redirectUrl(Mage::getBaseUrl());
    	}
    }

}