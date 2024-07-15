<?php

namespace App;

use Timber\Timber;
use App\Init;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/includes/TwigExtension.php';
require_once __DIR__ . '/includes/Setup.php';
require_once __DIR__ . '/includes/Enqueue.php';
require_once __DIR__ . '/includes/PostType.php';
require_once __DIR__ . '/includes/Init.php';

Timber::init();

new Init();

Timber::$locations = [
    get_template_directory() . '/templates', 
    get_template_directory() . '/modules', 
    
];