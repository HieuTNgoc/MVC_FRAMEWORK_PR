<?php
//Require libraries from folder libraries
require_once 'core/Routing.php';
require_once 'core/Controllers.php';
require_once 'core/Database.php';

require_once 'services/Session_services.php';
require_once 'config/config.php';
//Instantiate core class
$init = new Routing();
