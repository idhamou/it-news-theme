<?php

// include all PHP files in ./includes/ directory:
foreach (glob(dirname(__FILE__) . '/includes/*.php') as $file) {
    include $file;
}