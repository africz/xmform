<?php

namespace App;

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
        $json = file_get_contents($url);
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
}
