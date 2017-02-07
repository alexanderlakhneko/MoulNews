<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS . '..' . DS );
define('SRC_DIR', ROOT . 'src' . DS);
define('VIEW_DIR', SRC_DIR . 'View' . DS);
define('LIB_DIR', SRC_DIR . 'Library' . DS);
define('CONFIG_DIR', ROOT . 'config' . DS);
define('VENDOR_DIR', ROOT . 'vendor' . DS);

require (VENDOR_DIR . 'autoload.php');

include(VIEW_DIR . "default_layout.php");

