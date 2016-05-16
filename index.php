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


function download_file_recursively(string $fileurl, string $root, string $realpath) {
    if (substr($fileurl, -1) === '/') {
        $filename = substr($fileurl, strlen($root)) . '/index.html';
    } else {
        $filename = substr($fileurl, strlen($root));
    }

    $realfile = joinPaths([$realpath, $filename]);
    add_line("Downloading $fileurl to $realfile");
    $contents = file_get_contents($fileurl);
    file_put_contents($realfile, $contents);
}

download_file_recursively($configuration['website'], $configuration['website'], $realpath);
