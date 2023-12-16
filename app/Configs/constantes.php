<?php

defined('APPLICATION_PATH') || define('APPLICATION_PATH',realpath(__DIR__.'/../..'));
defined('APPLICATION_URL')  || define('APPLICATION_URL', 'http://restaurante.localhost');
defined('ADMIN_LTE')        || define('ADMIN_LTE',APPLICATION_URL.'/adminlte');
defined('APP_PATH')         || define('APP_PATH',APPLICATION_PATH.'/app');
defined('VIEWS_PATH')       || define('VIEWS_PATH',APP_PATH.'/Views');
defined('TEMPLATES_PATH')   || define('TEMPLATES_PATH',APP_PATH.'/Templates');
defined('TEMPLATES_DEFAULT')   || define('TEMPLATES_DEFAULT','main');
defined('COMPOSER_PATH')   || define('COMPOSER_PATH',APPLICATION_PATH.'/vendor');