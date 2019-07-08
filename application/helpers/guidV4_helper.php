<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * guidV4 ()
 * -----------------------------------------------------------------------
 *
 * A universally unique identifier (UUID) it is a 128-bit number
 * used to identify information in computer systems.
 *
 * xxxxxxxx-xxxx-Mxxx-Nxxx-xxxxxxxxxxxx
 *
 */
if(!function_exists('guidV4'))
{
	function guidV4()
	{
		if (function_exists('com_create_guid') === true)
		{
			return trim(com_create_guid(),'{}');
		}
		$data = openssl_random_pseudo_bytes(16);
		$data[6] = chr(ord($data[6]) & 0x0f | 0x40);
		$data[8] = chr(ord($data[8]) & 0x3f | 0x80);
		return vsprintf('%s%s-%s-%s-%s-%s%s%s',str_split(bin2hex($data), 4));
	}
}