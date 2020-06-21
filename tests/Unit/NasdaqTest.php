<?php

namespace Tests\Unit;
use Illuminate\Support\Facades\Config;
use App\Nasdaq;
use Tests\TestCase;

class NasdaqTest extends TestCase
{
    private $nobj = null;
    
     public function setUp():void
     {
        $_url = config('app.nasdaq_url');
         $this->nobj=new Nasdaq($_url);
     }


    public function testVerifyCompany()
    {
        if (!count($this->nobj->verifyCompany("xx")))
        {
            $this->assertTrue(true);
        }
        
    }
}
