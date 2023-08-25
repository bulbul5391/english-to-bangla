<?php

namespace Bulbul5391\EnglishToBangla;
use Bulbul5391\EnglishToBangla\provider\ConvertEnToBn;
class EnToBn
{
    /**
     * @var ConvertEnToBn
     */
    protected $convert;
    public function __construct()
    {
        $this->convert = new ConvertEnToBn();
    }

    /**
     * @param $val
     * @param $for
     * @return array|mixed|string|void
     * @throws Exception\CheckValidNumber
     */
    function enToBn($val,$for=''){
        if($val == "" || $val == null){
            return;
        }
        elseif($for == "en")
        {
            return $val;
        }
        elseif($for == "word" || $for == "w")
        {
            return $this->convert->numberWord($val);
        }
        elseif($for == "money" || $for == "m")
        {
            return $this->convert->numberMoney($val);
        }
        elseif($for == "comma" || $for == "c")
        {
            return $this->convert->bnCommaLakh($val);
        }
        elseif($for == "decimal" || $for == "d")
        {
            return $this->convert->bnCommaLakh($val);
        }
        else{
            return $this->convert->translateEnToBn($val);
        }

    }

}
