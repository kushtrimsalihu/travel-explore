<?php

namespace App;

use Timber\Timber;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/StarterSite.php';

Timber::init();

new StarterSite();


Timber::$locations = array(
    get_template_directory() . '/templates', 
);

?>

