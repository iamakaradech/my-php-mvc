<?php
require('./vendor/autoload.php');
const VIEW_FOLDER = './Views/';
$routes = [];

require_once('route.php');

dispatch($routes);
