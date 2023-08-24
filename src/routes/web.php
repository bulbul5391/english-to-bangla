<?php
use Bulbul5391\EnglishToBangla\EnToBn;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {

    Route::get('checking',function (){
        return view('pgNameEnToBn::check',['data'=> '']);
    })->name('checking');

    Route::post('checking', function (Request $request){
        $convert = new EnToBn();
        $formVal = $request->all();
        $result = $convert->entoBn($formVal['userEntry'], $formVal['forConvert']);
        return view('pgNameEnToBn::check',['data' => $result, 'formVal' => $formVal]);
        return $request->all();
    });

});
