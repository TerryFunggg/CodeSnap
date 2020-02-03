<?php
// set true if production environment else false for development
define('IS_ENV_PRODUCTION',true);

// configure error reporting options
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', !IS_ENV_PRODUCTION);
ini_set('error_log','log/phperror.txt');

date_default_timezone_set('America/New_York');

