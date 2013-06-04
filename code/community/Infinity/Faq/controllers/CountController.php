<?php
/**
 * Infinity Faq Count Controller by Matthew Gribben
 *
 * @category   Infinity
 * @package    Infinity_Faq
 * @copyright  Copyright (c) 2013 Matthew Gribben
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Infinity_Faq_CountController extends Mage_Core_Controller_Front_Action
{
	public function indexAction(){
		
	}
	
    public function yesAction(){
    	
    	$id = $this->getRequest()->getParam('id');
    	
    	$faq = Mage::getModel('faq/faq')->load($id);
    	
    	$data = $faq->toArray();
    	
    	Mage::dispatchEvent('infinity_faq_count_helpful', $data);
    	
    	$url = Mage::getUrl('faq/details/',array('id'=>$id));
    	
    	$cookie = Mage::getSingleton('core/cookie');
    	$cookie->set('helpful'.$id, 'helpful' ,time()+86400,'/');
    	
    	$this->_redirectUrl($url);

    }
    
    public function noAction(){
    	
    	$cookie = Mage::getSingleton('core/cookie');
    	$cookie->set('helpful'.$id, 'nothelpful' ,time()+86400,'/');
    	
    	$this->_redirectUrl(Mage::getBaseUrl());
    	
    }
    
}