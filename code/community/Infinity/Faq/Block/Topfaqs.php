<?php
/**
 * Infinity Faq Top FAQs Widget Block by Matthew Gribben
*
* @category   Infinity
* @package    Infinity_Faq
* @copyright  Copyright (c) 2013 Matthew Gribben
* @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
class Infinity_Faq_Block_Topfaqs extends Mage_Core_Block_Abstract implements Mage_Widget_Block_Interface
{
	
	protected function _toHtml()
	{
		$faqs = $this->_getTopFaqs();
		
		$html = '<h3>Top FAQs</h3>';
		
		foreach($faqs as $faq){

			$html .= '<p>Question: <a href="'.Mage::getUrl('faq/details/',array('id'=>$faq->getId())).'">'.$faq->getQuestion().'</a><p>';		

		}
			
		return $html;
	}
	
	/** Gets a Mage Collection of the top x number of FAQ's by views
	 * 
	 */
	protected function _getTopFaqs(){
		
		$config  = Mage::getModel('faq/config');
    	$config->load(0);
		
		$pageSize = $config->getWidgetPageSize();
		
		$faqs = Mage::getModel('faq/faq')->getCollection()->setOrder('views', 'DESC')->setPageSize($pageSize);
		
		return $faqs;
	}

}