<?php

use Bulbul5391\EnglishToBangla\EnToBn;

if (! function_exists('enToBn')) {
    function entoBn($val, $for='')
    {
        $convert = new EnToBn();
        return $convert->enToBn($val, $for);
    }
}
