<?php

class Infinity_Faq_Block_Adminhtml_Config_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('faq_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('faq')->__('FAQ Config'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('faq')->__('Main Config'),
          'title'     => Mage::helper('faq')->__('Main Config'),
          'content'   => $this->getLayout()->createBlock('faq/adminhtml_config_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}