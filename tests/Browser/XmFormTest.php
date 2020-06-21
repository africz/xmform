<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class XmFormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $this->browse(function (Browser $browser) {
    //         $browser->visit('/')
    //                 ->assertSee('Laravel');
    //     });
    // }

    public function testWrongSymbol()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->maximize()
                ->type('company_symbol', 'ABCD')
                ->type('start_date', '2020-06-01')
                ->type('end_date', '2020-06-23')
                ->type('email', 'test@somedomain.com')
                ->scrollTo('#submit')
                ->click('Submit')
                ->assertSee('Company Symbol');
        });
    }
    public function testAllOkay()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('company_symbol', 'ABCD')
                ->type('start_date', '2020-06-01')
                ->type('end_date', '2020-06-10')
                ->type('email', 'test@somedomain.com')
                ->assertSee('company_symbol');
        });
    }
}
