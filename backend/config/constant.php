<?php

DEFINE('DS', DIRECTORY_SEPARATOR); 

DEFINE('ROOT',$_SERVER['DOCUMENT_ROOT']);

DEFINE("BASE_URL", ROOT. DS . 'CRUD V3' . DS);

DEFINE("CONFIG",BASE_URL . DS . 'config' . DS);

DEFINE("MODELS",BASE_URL . DS . 'models' . DS);

DEFINE("LIB",BASE_URL . DS . 'lib' . DS);

DEFINE("CORE",BASE_URL . DS . 'core' . DS);

?>