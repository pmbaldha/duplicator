<?php
if ( ! defined('DUPLICATOR_VERSION') ) exit; // Exit if accessed directly

/**
 * Helper Class for UI internactions
 * @package Dupicator\classes
 */
class DUP_UI_ViewState 
{
	
	/**
	 * The key used in the wp_options table
	 * @var string 
	 */
	private static $OptionsViewStateKey = 'duplicator_ui_view_state';
	
	/** 
     * Save the view state of UI elements
	 * @param string $key A unique key to define the ui element
	 * @param string $value A generic value to use for the view state
     */
	public static function save($key, $value) 
	{
		$view_state = array();
		$view_state = get_option(self::$OptionsViewStateKey);
		$view_state[$key] =  $value;
		$success = update_option(self::$OptionsViewStateKey, $view_state);
		return $success;
    }
	
	
	/** 
     *	Gets all the values from the settings array
	 *  @return array Returns and array of all the values stored in the settings array
     */
    public static function getArray() 
	{
		return get_option(self::$OptionsViewStateKey);
	}
	
	
	/** 
	  * Return the value of the of view state item
	  * @param type $searchKey The key to search on
	  * @return string Returns the value of the key searched or null if key is not found
	  */
    public static function getValue($searchKey) 
	{
		$view_state = get_option(self::$OptionsViewStateKey);
		if (is_array($view_state)) {
			foreach ($view_state as $key => $value) {
				if ($key == $searchKey) {
					return $value;	
				}
			}
		} 
		return null;
	}
	
}
