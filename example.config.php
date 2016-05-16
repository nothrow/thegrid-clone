<?php
if (!defined('APPLICATION'))
    die;
        
function retrieve_config(): array {
    return [
        // path to entry point on web to clone. must end with '/', if it is a directory!
        'website' => 'http://localhost:80/',
        // relative path to this directory, where the cloned stuff will be put (original content will be deleted)
        'relative' => '../out'
    ];
}

