<?php namespace App\Wrappers;

use Illuminate\Support\Collection;

class Currency
{
    const CURRENCY_URL = 'http://phisix-api3.appspot.com/stocks.json';

    static public function get(): Collection
    {
        $json = file_get_contents(self::CURRENCY_URL);
        return collect(json_decode($json, true));
    }
}