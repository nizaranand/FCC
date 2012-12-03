<?php

/**
 * Envato Theme Installer Skin class to extend the WordPress Theme_Installer_Skin class.
 *
 * @package     Envato WordPress Theme Upgrader Library
 * @author      Arman Mirkazemi
 * @since       1.0
 */
class Envato_Theme_Installer_Skin extends Theme_Installer_Skin
{

	protected $envato_theme_updater;

	function __construct($envato_theme_updater)
	{
		parent::__construct();
		$this->envato_theme_updater = $envato_theme_updater;
	}

	/**
	 * @since   1.0
	 * @access  internal
	 *
	 * @return  array         Void.
	 */
	function feedback($string)
	{
		if (isset($this->upgrader->strings[$string]))
			$string = $this->upgrader->strings[$string];

		if (strpos($string, '%') !== false)
		{
			$args = func_get_args();
			$args = array_splice($args, 1);
			if (!empty($args))
				$string = vsprintf($string, $args);
		}

		if (empty($string))
			return;

		$this->envato_theme_updater->set_installation_message($string);
	}

	/**
	 * @since   1.0
	 * @access  internal
	 *
	 * @return  array         Void.
	 */
	function header()
	{
		
	}

	/**
	 * @since   1.0
	 * @access  internal
	 *
	 * @return  array         Void.
	 */
	function footer()
	{
		
	}

}