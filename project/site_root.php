<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', __DIR__); 


function getRoot() {
    return $_SERVER['DOCUMENT_ROOT'];
}
