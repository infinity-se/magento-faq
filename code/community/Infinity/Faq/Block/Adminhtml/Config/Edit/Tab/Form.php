<?php

class Infinity_Faq_Block_Adminhtml_Config_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('faq_form', array('legend'=>Mage::helper('faq')->__('FAQ Config')));

      $fieldset->addField('faq_url', 'text', array(
          'label'     => Mage::helper('faq')->__('FAQ URL'),
          'required'  => true,
          'name'      => 'faq_url',
      	  'disabled' => true,
      	  'after_element_html' => '<small>FAQ Url is not editable in this version.</small>',
	  ));
      
      $fieldset->addField('email_submit', 'text', array(
      		'label'     => Mage::helper('faq')->__('FAQ Request Email'),
      		'required'  => true,
      		'name'      => 'email_submit',
      ));
		
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('faq')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('faq')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('faq')->__('Disabled'),
              ),
          ),
      ));
      
      $fieldset->addField('ask', 'select', array(
      		'label'     => Mage::helper('faq')->__('Allow Users To Request an FAQ'),
      		'name'      => 'ask',
      		'values'    => array(
      				array(
      						'value'     => 1,
      						'label'     => Mage::helper('faq')->__('Enabled'),
      				),
      
      				array(
      						'value'     => 2,
      						'label'     => Mage::helper('faq')->__('Disabled'),
      				),
      		),
      ));
      
      $fieldset->addField('rating', 'select', array(
      		'label'     => Mage::helper('faq')->__('Allow Users To Rate an FAQ'),
      		'name'      => 'rating',
      		'values'    => array(
      				array(
      						'value'     => 1,
      						'label'     => Mage::helper('faq')->__('Enabled'),
      				),
      
      				array(
      						'value'     => 2,
      						'label'     => Mage::helper('faq')->__('Disabled'),
      				),
      		),
      ));
      
      $fieldset->addField('showrating', 'select', array(
      		'label'     => Mage::helper('faq')->__('Show Rating For an FAQ'),
      		'name'      => 'showrating',
      		'values'    => array(
      				array(
      						'value'     => 1,
      						'label'     => Mage::helper('faq')->__('Enabled'),
      				),
      
      				array(
      						'value'     => 2,
      						'label'     => Mage::helper('faq')->__('Disabled'),
      				),
      		),
      ));
     
			$config = Mage::getModel('faq/config')->load('0');
          $form->setValues($config);

      return parent::_prepareForm();
  }
}