<?php

spl_autoload_register(function ($path) {
    require_once(str_replace('\\', '/', $path) . '.php');
});
