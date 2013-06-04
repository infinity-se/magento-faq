<?php
/**
 * Infinity Faq Block by Matthew Gribben
*
* @category   Infinity
* @package    Infinity_Faq
* @copyright  Copyright (c) 2013 Matthew Gribben
* @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/

class Infinity_Faq_Block_Faq extends Mage_Core_Block_Template
{
	public function _prepareLayout(){
		
		return parent::_prepareLayout();
		
    }

    /** Gets the FAQ Items and returns them (paging by the amount set in config)
     * 
     */
	public function getfaqs(){

	$questions = Mage::getModel('faq/faq')->getCollection()->addFieldToFilter('status', 1);
	
	return $questions;

	}

	/** Gets the main FAQ Title set in the config
	 * 
	 */
	public function getFaqTitle(){

	$config = Mage::getModel('faq/config')->getCollection()->addFilter('title','MainTtitle')->getFirstItem();

	return $config->getValue();

	}
}