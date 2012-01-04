<?php

// Account Schema:
// ---------------
// {
// 	email: "email@domain.com",
// 	apiKey: "Some GUID",
// 	active: true/false,
// 	url200: "redirect URL on 200 (success)",
// 	url500: "redirect URL on 500 (error)",
// 	accessToken: "unique token for access",
// 	accessTokenExpire: UnixTimestamp
// }

	function getUserByEmail($email) {
		$accounts = getAccounts();
		$query = array( "email" => $email );
		return $accounts->findOne( $query );
	}

	function getUserByKey($key) {
		$accounts = getAccounts();
		$query = array( "apiKey" => $key );
		return $accounts->findOne( $query );
	}

	function getUserByToken($token) {
		$accounts = getAccounts();
		$query = array( "accessToken" => $token );
		$account = $accounts->findOne( $query );
		if ($account["accessTokenExpire"] > time()) {
			return $account;
		}
	}

	function createNewUser($email) {
		$user = array( 
			"email" => $email, 
			"apiKey" => guid(),
			"active" => true,
			"url200" => NULL,
			"url500" => NULL 
		);
		$user = genToken($user);
		if (!is_null($user)) {
			return $user;
		}
	}

	function saveUser($user) {
		$accounts = getAccounts();
		return $accounts->save($user);
	}

	function genToken($user) {
		$user["accessToken"] = guid();
		$user["accessTokenExpire"] = time() + (60 * 60 * 24); //1 Day
		if (saveUser($user)) {
			return $user;
		}
	}

	function getAccounts() {
		$m = new Mongo();
		return $m->emailbackus->accounts;
	}

	function guid() {
    if (function_exists('com_create_guid') === true) {
        return trim(com_create_guid(), '{}');
    }
    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}

?>