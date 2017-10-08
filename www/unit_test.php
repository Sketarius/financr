<?php
	require_once('../core/FinancrStore.php');
	
	$session_key = 'giMhYjYYTxwkzV9cDaBeJIanES1nKh81zViyfhw8';
	$session_email = 'sketarius@gmail.com';
	$store = new FinancrStore();
	$store->verifySession($session_email, $session_key);

?>