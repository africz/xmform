<?php

namespace App;

use Illuminate\Support\Facades\Http;

class Nasdaq
{
    private $_url = null;
    private static $instance = null;
    private $_symbols = array();
    public function __construct($url = null)
    {
        if (!empty($url)) {
            $_url = $url;
        } else {
            $_url = config('app.nasdaq_url');
        }

        if (!count($this->_symbols)) {
            $this->getData($_url);
        }
    }

    public static function getInstance($url = null)
    {
        if (self::$instance == null) {
            self::$instance = new Nasdaq($url);
        }
        return self::$instance;
    }

    private function getData($url)
    {
        $json = Http::get($url);
        $this->_symbols = json_decode($json);
    }

    public function verifyCompany($company)
    {
        $retVal = false;
        foreach ($this->_symbols as $key => $value) {
            if (strcmp($value->Symbol, $company) == 0) {
                $retVal = true;
                break;
            }
        }
        return $retVal;
    }
    public function getCompanyName($company)
    {
        $retVal = null;
        $i = 0;
        foreach ($this->_symbols as $key => $value) {
            if (strcmp($value->Symbol, $company) == 0) {
                $retVal = $value->{'Company Name'};
                break;
            }
            $i++;
        }
        return $retVal;
    }
}
