<?php
/**
 * 'Footer' admin menu page
 */
class Admin_Theme_Item_Update extends Admin_Theme_Menu_Item
{
	public function __construct($parent_slug = '')
	{
		
		$this->setPageTitle(__('Theme update','churchope'));
		$this->setMenuTitle(__('Theme Update','churchope'));
		$this->setCapability('administrator');
		$this->setMenuSlug(SHORTNAME.'_update');
		parent::__construct($parent_slug);
		
		$this->init();
	}

	public function init()
	{
		$option = null;
		$option = new Admin_Theme_Element_Pagetitle();
		$option->setName(__('User Account Information','churchope'));
		$this->addOption($option);
		
		$option = null;
				
		$option = new Admin_Theme_Element_Text();
		$option->setName(__('Marketplace Username','churchope'))
				->setDescription(__('Please provide Username for theme update','churchope'))
				->setId(SHORTNAME."_envato_nick")
				->setStd('');
		$this->addOption($option);
		$option = null;
		
		
		$option = new Admin_Theme_Element_Text();
		$option->setName(__('Secret API Key','churchope'))
				->setDescription(__('Please provide API Key for theme update','churchope'))
				->setId(SHORTNAME."_envato_api")
				->setStd('');
		$this->addOption($option);
		$option = null;
	}
}
?>