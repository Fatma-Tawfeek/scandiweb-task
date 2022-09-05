<?php

// Load config
require_once 'config/config.php';

// Load helpers
include_once 'helpers/Service.php';
include_once 'helpers/Type.php';

// Autoload Core Libraries
spl_autoload_register(function($className){
    require_once 'libraries/' . $className .'.php';
});