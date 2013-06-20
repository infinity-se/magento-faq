<?php
/**
 * Infinity Faq Details Block by Matthew Gribben
*
* @category   Infinity
* @package    Infinity_Faq
* @copyright  Copyright (c) 2013 Matthew Gribben
* @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/

class Infinity_Faq_Block_Details extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
    /** Get's the FAQ model
     * 
     * @return Magento Model
     */
    public function getFaqDetails(){	
    	$id = $this->getRequest()->getParam('id');
    	
    	$faq = Mage::getModel('faq/faq')->load($id);
    	
    	//$data = $faq->toArray();
    	
    	return $faq;
    }
    /** Gets the status of the show helpful rating
     * 
     */
    public function getHelpfulStatus(){
    	
    	$config = Mage::getModel('faq/config')->load(0);
    	
    	$status = (int) $config->getShowrating();
    	
    	if($status == 1){
    		
    		return true;
    		
    	}else{
    		
    		return false;
    		
    	}
    	
    }
    
    /** Gets the current count for the helpful rating
     * 
     * @return number
     */
    public function getHelpfulCount(){
    	
    	$id = $this->getRequest()->getParam('id');
    	 
    	$faq = Mage::getModel('faq/faq')->load($id);
    	
    	$count = (int) $faq->getHelpfulCount();
    	
    	return $count;
    	
    }
    
    /** Gets the total views for the FAQ
     * 
     * @return number
     */
    public function getTotalViews(){
    	
    	$id = $this->getRequest()->getParam('id');
    	
    	$faq = Mage::getModel('faq/faq')->load($id);
    	
    	$count = (int) $faq->getViews();
    	
    	return $count;
    	
    }
    
    /** Checks if a user has rated the FAQ as helpful or not
     * 
     * @return boolean
     */
    public function checkHelpSubmitted(){
    	
    	$config = Mage::getModel('faq/config')->load(0);
    	 
    	$status = (int) $config->getRating();
    	
    	$id = $this->getRequest()->getParam('id');
    	
    	$cookie = Mage::getSingleton('core/cookie');
    	$helpful = $cookie->get('helpful'.$id);
    	
    	if(is_string($helpful) || $status == '2'){
    		return true;
    	}else{
    		return false;
    	}
    }

}