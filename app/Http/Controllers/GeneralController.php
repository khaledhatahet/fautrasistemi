<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class GeneralController extends Controller
{
    public function ChangeLanguage($locale){

        try {
            if(array_key_exists($locale , config('locale.languages'))){
                Session::put('locale',$locale);
                App::setLocale($locale);
                return redirect()->back();
            }
            return redirect()->back();

        } catch (Exception $exception) {
            return redirect()->back();
        }
    }
}
