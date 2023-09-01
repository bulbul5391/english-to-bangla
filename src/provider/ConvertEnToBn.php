<?php

namespace Bulbul5391\EnglishToBangla\provider;
use Bulbul5391\EnglishToBangla\Exception\CheckValidNumber;

class ConvertEnToBn
{
    /**
     * @var string[]
     */
    protected  $engDataList = [
    '1','2','3','4','5','6','7','8','9','0','-','.',
    'Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday',
    'Sat','Sun','Mon','Tue','Wed','Thu','Fri',
    'am','pm','AM','PM','at','st','nd','rd','th',
    'January','February','March','April','May','June','July','August','September','October','November','December',
    'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec',
    ];

    /**
     * @var string[]
     */
    protected $bngDataList = [
    '১','২','৩','৪','৫','৬','৭','৮','৯','০','-','.',
    'শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার',
    'শনি','রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র',
    'পূর্বাহ্ণ','অপরাহ্ণ','পূর্বাহ্ণ','অপরাহ্ণ','','','','','',
    'জানুয়ারি','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর',
    'জানুয়ারি','ফেব্রুয়ারি','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর',
    ];

    /**
     * @var string[]
     */
    protected $bnNumbers = [
        '', 'এক', 'দুই', 'তিন', 'চার', 'পাঁচ', 'ছয়', 'সাত', 'আট', 'নয়', 'দশ',
        'এগারো', 'বারো', 'তেরো', 'চৌদ্দ', 'পনেরো', 'ষোল', 'সতেরো', 'আঠারো', 'উনিশ','বিশ',
        'একুশ', 'বাইশ', 'তেইশ', 'চব্বিশ', 'পঁচিশ', 'ছাব্বিশ', 'সাতাশ', 'আঠাশ', 'ঊনত্রিশ', 'ত্রিশ',
        'একত্রিশ', 'বত্রিশ', 'তেত্রিশ', 'চৌত্রিশ', 'পঁয়ত্রিশ', 'ছত্রিশ', 'সাঁইত্রিশ', 'আটত্রিশ', 'ঊনচল্লিশ','চল্লিশ',
        'একচল্লিশ', 'বিয়াল্লিশ', 'তেতাল্লিশ', 'চুয়াল্লিশ', 'পঁয়তাল্লিশ', 'ছেচল্লিশ', 'সাতচল্লিশ', 'আটচল্লিশ', 'ঊনপঞ্চাশ', 'পঞ্চাশ',
        'একান্ন','বাহান্ন', 'তিপ্পান্ন', 'চুয়ান্ন', 'পঞ্চান্ন', 'ছাপ্পান্ন', 'সাতান্ন', 'আটান্ন', 'ঊনষাট','ষাট',
        'একষট্টি', 'বাষট্টি', 'তেষট্টি', 'চৌষট্টি', 'পঁয়ষট্টি', 'ছেষট্টি', 'সাতষট্টি', 'আটষট্টি', 'ঊনসত্তর', 'সত্তর',
        'একাত্তর','বাহাত্তর', 'তিয়াত্তর', 'চুয়াত্তর', 'পঁচাত্তর', 'ছিয়াত্তর', 'সাতাত্তর', 'আটাত্তর', 'ঊনআশি','আশি',
        'একাশি', 'বিরাশি', 'তিরাশি', 'চুরাশি','পঁচাশি', 'ছিয়াশি', 'সাতাশি', 'আটাশি', 'ঊননব্বই', 'নব্বই',
        'একানব্বই','বিরানব্বই', 'তিরানব্বই', 'চুরানব্বই', 'পঁচানব্বই', 'ছিয়ানব্বই', 'সাতানব্বই', 'আটানব্বই', 'নিরানব্বই'
    ];

    /**
     * @var string[]
     */
    protected  $numbers = array('০','১','২','৩','৪','৫','৬','৭','৮','৯');

    /**
     * @throws CheckValidNumber
     */
    public  function isValid($number)
    {
        if(!is_numeric($number)){
            throw CheckValidNumber::message();
        }
    }

    /**
     * @param $data
     * @return array|string
     */
    public function translateEnToBn($data)
    {
        $result = '';
        if ($data == null || $data == "") {
            $result = 'কোন তথ্য পাওয়া যায়নি';
        }
        else{
            $result = str_replace($this->engDataList,$this->bngDataList,$data);
        }
        return $result;
    }

    /**
     * @param $number
     * @return string
     */
    public  function numberWord($number): string
    {
        if($number == 0){
            return 'শূন্য';
        }
        $arrayNumber = explode(".", $number);
        $bnText = $this->wordOfNumber($arrayNumber[0]);
        if(isset($arrayNumber[1])){
            $bnText .= ' দশমিক '. $this->getDecimalWord((string)$arrayNumber[1]);
        }
        return $bnText;
    }

    /**
     * @param $number
     * @return string
     * @throws CheckValidNumber
     */
    protected  function wordOfNumber($number): string
    {
        $this->isValid($number);

        $text = '';
        $crore = (int) ($number/10000000);
        if($crore != 0){
            if($crore > 99){
                $text .= $this->numberWord($crore).' কোটি ';
            }else{
                $text .= $this->bnNumbers[$crore].' কোটি ';
            }
        }

        $croreAmount = $number%10000000;
        $lakhAmount = (int) ($croreAmount/100000);
        if($lakhAmount > 0){
            $text .= $this->bnNumbers[$lakhAmount].' লক্ষ ';
        }

        $lakhAmount_tk = $croreAmount%100000;
        $thousandAmount = (int) ($lakhAmount_tk/1000);
        if($thousandAmount > 0){
            $text .= $this->bnNumbers[$thousandAmount].' হাজার ';
        }

        $thousandAmount_tk = $lakhAmount_tk%1000;
        $hundredAmount = (int) ($thousandAmount_tk/100);
        if($hundredAmount > 0){
            $text .= $this->bnNumbers[$hundredAmount].' শত ';
        }

        $hundredAmount_tk = (int) ($thousandAmount_tk%100);
        if($hundredAmount_tk > 0){
            $text .= $this->bnNumbers[$hundredAmount_tk];
        }

        return $text;
    }

    /**
     * @param $number
     * @return string
     */
    protected function getDecimalWord($number): string
    {
        $word = '';
        $numberLength = strlen($number);

        // Loop through each digit of the number
        for ($i = 0; $i < $numberLength; $i++) {
            $digit = (int)$number[$i];
            $word .= ' ' . $this->bnNumbers[$digit];
        }

        return $word;
    }

    /**
     * @param $number
     * @return string
     * @throws CheckValidNumber
     */
    public  function numberMoney($number)
    {
        $this->isValid($number);
        if($number == 0){
            return ' শূন্য টাকা';
        }

        if(is_float($number+0)){
            $money  = number_format((float)$number, 2, '.', '');
            $decimal = explode(".", $money);
            $text = $this->wordOfNumber($decimal[0]).' টাকা ';
            if(isset($decimal[1])){
                $text .= $this->bnNumbers[(int)$decimal[1]].' পয়সা';
            }
            return $text;
        }else{
            return $this->wordOfNumber($number).' টাকা ';
        }
    }

    /**
     * @param $number
     * @return string
     */
    public function bnCommaLakh($number): string
    {
        $n = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $number);
        return strtr($n,$this->numbers);
    }
}
