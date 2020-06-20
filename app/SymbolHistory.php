<?php

namespace App;

use Illuminate\Support\Facades\Http;

class SymbolHistory
{
    private $_url;
    public function __construct($symbol, $from, $to)
    {
        $from = \DateTime::createFromFormat('Y-n-j', $from)->getTimestamp();
        $to = \DateTime::createFromFormat('Y-n-j', $to)->getTimestamp();
        $url = config('app.symbol_history_url');

        $url = str_replace(":symbol", $symbol, $url);
        $url = str_replace(":period1", $from, $url);
        $url = str_replace(":period2", $to, $url);
        $this->_url = $url;
    }

    public function getData()
    {
        $host = config('app.symbol_history_host');
        $key = config('app.symbol_history_key');
        $response = Http::get($this->_url, [
            'X-RapidAPI-Host' => $host,
            'X-RapidAPI-Key' => $key
        ]);
        return $response;
    }
}
