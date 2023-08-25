<?php
use Bulbul5391\EnglishToBangla\EnToBn;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {

    Route::get('en-to-bn',function (){
        return view('pgNameEnToBn::check',['data'=> '']);
    })->name('en-to-bn');

    Route::post('en-to-bn', function (Request $request){
        $convert = new EnToBn();
        $formVal = $request->all();
        $result = $convert->enToBn($formVal['userEntry'], $formVal['forConvert']);
        return view('pgNameEnToBn::check',['data' => $result, 'formVal' => $formVal]);
        return $request->all();
    });

});
