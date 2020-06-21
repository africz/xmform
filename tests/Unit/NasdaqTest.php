<?php

namespace Tests\Unit;
use App\Nasdaq;
use Tests\TestCase;
use Illuminate\Contracts\Config;

class NasdaqTest extends TestCase
{
    private $nobj = null;
    
     public function setUp():void
     {
         $this->nobj=new Nasdaq();
     }


    public function testVerifyCompany()
    {
        if (!count($this->nobj->verifyCompany("xx")))
        {
            $this->assertTrue(true);
        }
        
    }
}
