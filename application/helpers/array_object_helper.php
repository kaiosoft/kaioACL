<?php  

/**
 *	Copyright (C) Kaio Piranti Lunak
 *	Developer: Fatah Iskandar Akbar
 *  Email : info@kaiogroup.com
 *	Date: Juni 2013
**/


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*	
* 	conversi objek to array
*	
*/

if (!function_exists('object_to_array')) 
{
	function object_to_array($object) {
		if(is_object($object)) {
			$object = get_object_vars($object);
		}
		if(is_array($object)) {
			return array_map(__FUNCTION__, $object);
		} else {
			return $object;
		}
	}
}

if (!function_exists('array_to_object')) 
{
	function array_to_object($array)
	{
		$object= new stdClass();
		 
		foreach ($array as $key => $value){
		  if (is_array($value)){
			  $obj->$key = new stdClass();
			  array_to_obj($value, $obj->$key);
		  } else {
			$obj->$key = $value;
		  }
		}
		
		return $obj;
	}
}

/* End of file array_helper.php */
/* Location: ./system/helpers/array_helper.php */