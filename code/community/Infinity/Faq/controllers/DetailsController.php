<?php
/**
 * Infinity Faq Details Controller by Matthew Gribben
 *
 * @category   Infinity
 * @package    Infinity_Faq
 * @copyright  Copyright (c) 2013 Matthew Gribben
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Infinity_Faq_DetailsController extends Mage_Core_Controller_Front_Action
{
    public function indexAction(){

    	$id = $this->getRequest()->getParam('id');
    	 
    	$faq = Mage::getModel('faq/faq')->load($id);
    	 
    	$data = $faq->toArray();
    	 
    	$cookie = Mage::getSingleton('core/cookie');
    	$viewed = $cookie->get('viewed'.$id);
    	
    	if($viewed !== "viewed"){
    		
    		Mage::dispatchEvent('infinity_faq_block_details', $data);
    		
    	}
    	

		$this->loadLayout();     
		$this->renderLayout();
    }

}