<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myencrypt {

    function password_encrypt($pass)
    {
    	$hash_format = "$2y$11$";

    	$salt_length = 22;
    	
    	$unique_random_string = md5(uniqid(mt_rand(), true));
		  
		$base64_string = base64_encode($unique_random_string);
		  
		$modified_base64_string = str_replace('+', '.', $base64_string);
		  
		$salt = substr($modified_base64_string, 0, $salt_length);

    	$format_and_salt = $hash_format . $salt;

    	$hash = crypt($pass, $format_and_salt);

    	return $hash;
    }

    function password_check($password, $existing_hash)
    {
		$hash = crypt($password, $existing_hash);
		
		if ($hash === $existing_hash)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}