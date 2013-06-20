<?php
/**
 * Infinity Faq Details Observer by Matthew Gribben
*
* @category   Infinity
* @package    Infinity_Faq
* @copyright  Copyright (c) 2013 Matthew Gribben
* @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
class Infinity_Faq_Observers_Details_Observer
{
    public function __construct()
    {
    }

    /** Observer method to record an faq view
     * 
     * @param Observer Object $observer
     */
	public function registerView($observer){

		$event = $observer->getEvent();

		$data = $event->getData();

		$this->_recordView($data['faq_id']);
		
		$cookie = Mage::getSingleton('core/cookie');
		$cookie->set('viewed'.$data['faq_id'], 'viewed' ,time()+86400,'/');

	}

	/** Carries out the actual recording of the view.
	 * 
	 * @param int $id
	 */
	protected function _recordView($id){

		$faq = Mage::getModel('faq/faq')->load($id);
		
		$views = (int) $faq->getViews();
		
		$views++;
		
		$faq->setViews($views);
		
		$faq->save();

	}

}