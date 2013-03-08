<?php

// CRUD Session variables - FHM

class Session
{
	// initialize session
	public static function init()
	{
		session_start();
	}

	// return session object
	public static function getSession(){
		return $_SESSION;
	}

	// set the sesssion - FHM
	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	// get the session variable - FHM
	public static function get($key)
	{
		if (isset($_SESSION[$key]))
			return $_SESSION[$key];
	}

	// destroy session - FHM
	public static function destroy()
	{
		session_destroy();
	}

	// checks if session exists - FHM
	public static function exist()
	{
		return isset($_SESSION) ? true : false;;
	}

	//erases individual variables- FHM
	public static function erase($key)
	{
		unset($key);
		
	}

	//erase entire object - FHM
	public static function reset()
	{
		return $_SESSION = array();
	}
}