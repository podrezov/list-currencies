<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Wrappers\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::get();
        return $currencies;
    }
}
