<?php

ob_start();

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");
defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");

defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USERT") ? null : define("DB_USER", "root");
defined("DB_PASS") ? null : define("DB_PASS", "josh123");
defined("DB_NAME") ? null : define("DB_NAME", "julie-hodgson");

require_once('functions.php');

 ?>
