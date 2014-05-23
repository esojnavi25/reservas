<?php
if (!defined("ACCESS")) {
	die("Error: You don't have permission to access here...");
}

if (!function_exists("COOKIE")) {
	function COOKIE($cookie, $value = false, $time = 300000, $redirect = false, $URL = false)
	{
		if ($value) {
			setcookie($cookie, filter($value), time() + $time, "/");

			if ($redirect) {
				redirect(isset($URL) ? $URL : _get("webBase"));
			}
		} else {
			return isset($_COOKIE[$cookie]) ? filter($_COOKIE[$cookie]) : false;
		}
	}
}

if (!function_exists("createLoginSessions")) {
	function createLoginSessions($data, $redirect = true)
	{
		if (is_array($data)) {
			SESSION('ReservationID',$data['ID_Reservation']);
			SESSION('ReservationName', $data['Name']);
			SESSION('ReservationTime', $data['Time']);
			SESSION('ExpirationTime', time() + 1800);

			if ($redirect) {
				redirect(SESSION("lastURL"));
			}
		} else {
			redirect();
		}

		return true;
	}
}

if (!function_exists("SESSION")) {
	function SESSION($session, $value = false)
	{
		if (!$value) {
			return isset($_SESSION[$session]) ? $_SESSION[$session] : false;
		} else {
			$_SESSION[$session] = filter($value);
		}

		return true;
	}
}

if (!function_exists("isAdmin")) {
	function isAdmin()
	{
		if (SESSION("ZanUserPrivilegeID") != 1) {
			return false;
		}

		return true;
	}
}

if (!function_exists("isConnected")) {
	function isConnected($URL = false)
	{
		if (!SESSION("ZanUser")) {
			redirect(($URL !== false) ? $URL : path("users/login/?return_to=". urlencode(getURL())));
		}

		return true;
	}
}

if (!function_exists("unsetCookie")) {
	function unsetCookie($cookie, $URL = false)
	{
		setcookie($cookie);
		redirect($URL);
	}
}

if (!function_exists("unsetSessions")) {
	function unsetSessions($URL = false)
	{
		$lastURL = SESSION("lastURL");
		session_unset();
		session_destroy();
		redirect(($URL) ? $URL : $lastURL);
	}
}
if(!function_exists('session_has_expired')){
	function session_has_expired(){
		$now = time();
		if( $now > SESSION('ExpirationTime') ){
			return true;
		}else{
			return false;
		}
	}
}
