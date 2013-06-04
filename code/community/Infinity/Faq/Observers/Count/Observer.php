<?php
/**
 * Infinity Faq Count Observer by Matthew Gribben
*
* @category   Infinity
* @package    Infinity_Faq
* @copyright  Copyright (c) 2013 Matthew Gribben
* @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
class Infinity_Faq_Observers_Count_Observer
{
    public function __construct()
    {
    }

    /** Observer method to record an faq view
     * 
     * @param Observer Object $observer
     */
	public function registerHelpful($observer){

		$event = $observer->getEvent();

		$data = $event->getData();

		$this->_recordHelpful($data['faq_id']);

	}
	
	/** Incriments the number of people who found this helpful
	 * 
	 * @param int $id
	 */
	protected function _recordHelpful($id){
		$faq = Mage::getModel('faq/faq')->load($id);
		
		$count = (int) $faq->getHelpfulCount();
		
		$count++;
		
		$faq->setHelpfulCount($count);
		
		$faq->save();
	}
	
}