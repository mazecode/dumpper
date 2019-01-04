<?php namespace Dumpper;

use Dummper\Dumper;

if (!function_exists('dd')) {
    function dd()
    {
        array_map(function ($arg) {
            (new Dumper)->dump($arg);
        }, func_get_args());

        die;
    }
}
