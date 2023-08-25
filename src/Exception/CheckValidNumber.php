<?php

namespace Bulbul5391\EnglishToBangla\Exception;
use Exception;
class CheckValidNumber extends Exception
{
    /**
     * @return static
     */
    public static function message()
    {
        return new static("Not a valid number");
    }
}
