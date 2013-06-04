<?php
/**
 * Infinity Faq Config Controller by Matthew Gribben
 *
 * @category   Infinity
 * @package    Infinity_Faq
 * @copyright  Copyright (c) 2013 Matthew Gribben
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Infinity_Faq_Adminhtml_ConfigController extends Mage_Adminhtml_Controller_action {
	
	protected function _initAction(){
		
		$this->loadLayout()
			->_setActiveMenu('faq/conf')
			->_addBreadCrumb(Mage::helper('adminhtml')
			->__('FAQ Config'), Mage::helper('adminhtml')->__('FAQ Config'));
		

		$this->_addContent($this->getLayout()->createBlock('faq/adminhtml_config_edit'))
		->_addLeft($this->getLayout()->createBlock('faq/adminhtml_config_edit_tabs'));
		
		return $this;
		
	}
	
	public function indexAction(){
		$this->_initAction()->renderLayout();
	}
	
	public function saveAction(){
	
		if ($data = $this->getRequest()->getPost()) {
			
			//var_dump($data);
			//exit;
			
			if($data['status'] == '1'){
				
				//$this->_enableModule();
				
			}elseif ($data['status'] == '2'){
				
				//$this->_disableModule();
				
			}
			
	
			$model = Mage::getModel('faq/config');
			$model->load(0);
			$model->setData($data);
			$model->setConfigId(0);
			
			try {
				if ($model->getCreatedTime == NULL || $model->getUpdateTime() == NULL) {
					$model->setCreatedTime(now())
					->setUpdateTime(now());
				} else {
					$model->setUpdateTime(now());
				}
	
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('faq')->__('Item was successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);
	
				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/');
				return;
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				Mage::getSingleton('adminhtml/session')->setFormData($data);
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
				return;
			}
		}
		Mage::getSingleton('adminhtml/session')->addError(Mage::helper('faq')->__('Unable to find item to save'));
		$this->_redirect('*/*/');
	
	}
	
	public function editAction(){
	
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('faq/config');
		$model->load(0);
		$model->setConfigId(0);
		
		
		
	
		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				
			if($data['status'] == '1'){
				
				//$this->_enableModule();
				
			}elseif ($data['status'] == '2'){
				
				//$this->_disableModule();
				
			}
				
				$model->setData($data);
				$model->save();
			}
	
			Mage::register('faq_config_data', $model);
	
			$this->loadLayout();
			$this->_setActiveMenu('faq/conf');
	
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('FAQ Config'), Mage::helper('adminhtml')->__('FAQ Config'));
	
			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
	
			$this->_addContent($this->getLayout()->createBlock('faq/adminhtml_config_edit'))
			->_addLeft($this->getLayout()->createBlock('faq/adminhtml_config_edit_tabs'));
	
			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('faq')->__('Item does not exist'));
			$this->_redirect('*/*/');
		}
	
	
	}
	
	protected function _disableModule() {
		

		$outputPath = "advanced/modules_disable_output/Infinity_Faq";
		Mage::getModel('core/config')->saveConfig($outputPath, true);
		Mage::getConfig()->reinit();
		Mage::app()->reinitStores();
		
	}
		
	protected function _enableModule() {

			$outputPath = "advanced/modules_disable_output/Infinity_Faq";
			Mage::getModel('core/config')->saveConfig($outputPath, true);
			Mage::getConfig()->reinit();
			Mage::app()->reinitStores();
	}
	
}