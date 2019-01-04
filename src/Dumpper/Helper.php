<?php

use Dumpper\Dumper;

if (!function_exists('d')) {
    function d()
    {
        array_map(function ($arg) {
            (new Dumper)->d($arg);
        }, func_get_args());

        die;
    }
}

if (!function_exists('ddd')) {
    function ddd()
    {
        array_map(function ($arg) {
            (new Dumper)->ddd($arg);
        }, func_get_args());

        die;
    }
}
