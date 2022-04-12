<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;
use AshAllenDesign\LaravelExchangeRates\Rules\ValidCurrency;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class unitController extends Controller
{
    public static function index()
    {
        $exchangeRates = new ExchangeRate();
        $result = ['units' => $exchangeRates->currencies()];
        return view('writeUnit')->with('result',$result);
    }
    public static function convertUnit(Request $request)
    {
        if(session()->has('unit') && session('unit') == $request->unit){
            return redirect()->back()->withErrors('You cannot select the same value')->withInput();
        }
        else{
            
            $formData = ['currency' => $request->unit];
            $rules = ['currency' => new ValidCurrency];
            $validator = Validator::make($formData, $rules);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            
            
            $exchangeRates = new ExchangeRate();

            //First parameter: Main Unit , example: TRY
            $result = $exchangeRates->exchangeRate('TRY', $request->unit);

            session()->put('unit', $request->unit);
            session()->put('rate', $result);


            return redirect()->back();

        }
    }
}
