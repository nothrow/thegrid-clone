<?php
define('APPLICATION', true);

require 'template.php';
require 'utils.php';

if (file_exists('example.php')) {
    require 'example.php';
}
else {
    die("I'm not configured! Copy example.config.php to example.php and edit it.");
}

$configuration = retrieve_config();

$realpath = $configuration['relative'];


add_line("Removing content of $realpath");

if (file_exists($realpath)) {
    if (!is_dir($realpath)) {
        die("$realpath is not a directory!");
    } else {
        rrmdir($realpath);
    }
}

mkdir($realpath, 0777, true);


function download_file_recursively(string $filename) {
}


download_file_recursively($configuration['website']);
