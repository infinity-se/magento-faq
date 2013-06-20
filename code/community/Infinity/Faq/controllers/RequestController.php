<?php
/**
 * Infinity Faq Request Controller by Matthew Gribben
 *
 * @category   Infinity
 * @package    Infinity_Faq
 * @copyright  Copyright (c) 2013 Matthew Gribben
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Infinity_Faq_RequestController extends Mage_Core_Controller_Front_Action {
	

    public function indexAction(){
    	
    	//$this->checkModule();

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
    
    public function submitAction(){
    	
    	$name = (string) $_POST['name'];
    	$question = (string) $_POST['question'];
    	$email = (string) $_POST['email'];
    	//$this->saveQuestion($name, $question);
    	
    	$mail = Mage::getModel('core/email');
    	$mail->setToName(Mage::getModel('faq/config')->getEmailSubmit());
    	$mail->setToEmail(Mage::getModel('faq/config')->getEmailSubmit());
    	$mail->setBody('Mail Text / Mail Content');
    	$mail->setSubject('An FAQ request has been submitted');
    	$mail->setFromEmail($email);
    	$mail->setFromName($name);
    	$mail->setType('This is the question submitted...'.$question);
    	
    	try {
    		$mail->send();
    		Mage::getSingleton('core/session')->addSuccess('Your request has been sent');
    		
    		$url = Mage::getUrl('faq/');
    		 
    		$cookie = Mage::getSingleton('core/cookie');
    		$cookie->set('faqrequest', 'sent' ,time()+86400,'/');
    		 
    		$this->_redirectUrl($url);
    		
    	}catch(Exception $e){
    		
    		var_dump($e);
    		
    	}
    }
    
    /*
    protected function saveQuestion($name, $question){
    	
    	$submitted = Mage::getModel('faq/submitted');
    	
    	$submitted->setName($name);
    	$submitted->setQuestion($question);
    	$submitted->save();
    	
    }
    */
    
}