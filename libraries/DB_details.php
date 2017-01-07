<?php

	require __DIR__ .'/../vendor/autoload.php';

	$dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
	$dotenv->load();


	define('DB_HOST', getenv("DB_HOST"));
	define('DB_NAME', getenv("DB_NAME"));
	define('DB_USER', getenv("DB_USER"));
	define('DB_PASS', getenv("DB_PASS"));

?>