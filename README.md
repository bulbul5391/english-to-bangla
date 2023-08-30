# 💞️ English to Bangla 💞️ 
<p align="left"><a href="https://www.linkedin.com/in/bulbulsarker/" target="_blank">
    <img alt="Linkedin Follow" src="https://bdprescription.com/npm-package/linkedins.svg">
  </a>
</p>


🤗 You can easily convert such as
- Any english number to bangla number
- English number to bangla word
- English number to decimal number
- English month to bangla month
- English date to bangla date
- Your host name /en-to-bn


## ✍️ Installation
```
composer require bulbul5391/english-to-bangla
```

## 😊 Usage
```php
use Bulbul5391\EnglishToBangla\EnToBn;
$convert = new EnToBn();

echo $convert->enToBn(1233.77, 'w');
Output : এক হাজার দুই শত তেত্রিশ দশমিক সাত সাত

echo $convert->enToBn('January');
Output : জানুয়ারি

echo $convert->enToBn('520', 'm');
Output : পাঁচ শত বিশ টাকা
```
## Function Call From Blade Page
```php
    /*---Controller---*/
    <?php
    use Bulbul5391\EnglishToBangla\EnToBn; 
    class ReportController extends Controller
    {
        public function index(){
            $data['Controller] = 'App\Http\Controllers\ReportController';
            return view('report',$data);
        }
        public static function enToBn($val, $for=null)
        {
           $convert = new EnToBn();
           return $convert->enToBn($val, $for); 
        }
    }
    
    /*---report.blade.php---*/
    {{ $Controller::enToBn(10510) }} //Output ১০৫১০
    {{ $Controller::enToBn(10510,'en') }} //Output 10510
    {{ $Controller::enToBn(10510, 'w') }} //দশ হাজার পাঁচ শত দশ
```

## Or You  Can Call By Helper Function From Blade Page
```php
    php artisan vendor:publish --tag=EnToBnServiceProvider
    
    //Add this line in composer.json file
    "autoload-dev": {
        "files": [
            "app/Helpers/EnToBnHelper.php"
        ]
    }
    
    After Run : composer dump-autoload
    
    /*---Controller---*/
    class ReportController extends Controller
    {
        public function index(){
            return view('report');
        }
    }
    
    /*---report.blade.php---*/
    {{ enToBn(22222,'c')}}
    {{ enToBn(10510) }} //Output ১০৫১০
    {{ enToBn(10510,'en') }} //Output 10510
    {{ enToBn(10510, 'w') }} //দশ হাজার পাঁচ শত দশ
```

## ☑️Testing English to Bangla Translation
- http://{{hostname}}/en-to-bn

## ✨ Example 
| Input | Convert For | Output |
| --- | --- | --- |
| 10510 | null | ১০৫১০ |
| 10510 | word / w | দশ হাজার পাঁচ শত দশ |
| 10510 | money / m | দশ হাজার পাঁচ শত দশ টাকা |
| 10510 | comma / c | ১০,৫১০ |
| 105.12 | word / w | এক শত পাঁচ দশমিক এক দুই |
| Friday | null | শুক্রবার |
| Fri | null | শুক্র |
| January / Jan | null | জানুয়ারি |
| AM / am | null | পূর্বাহ্ণ |
| PM / pm | null | অপরাহ্ণ |
| 01-12-2020 | null | ০১-১২-২০২০ |
| 2020-12-01 | null | ২০২০-১২-০১ |
| 2020/12/01 | null | ২০২০/১২/০১ |

<h2 align="center">Thanks 🙋 </h2>
