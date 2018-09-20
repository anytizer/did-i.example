<?php
error_reporting(E_ALL|E_STRICT);

// auto global
require_once("vendor/autoload.php");
#require_once("D:/htdocs/angular/libraries/unittesting/relay.php/src/anytizer/relay.php");

/**
 * Often XDebug is NOT necessary.
 * @see https://xdebug.org/docs/all_functions
 */
$xdebug_disable = "xdebug_disable";
if(function_exists($xdebug_disable)) {
	$xdebug_disable();
}

define("__API_URL__", "http://localhost/did-i/did-i/public_html/api");