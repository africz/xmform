<?php

namespace Tests\Unit;

use Tests\TestCase;

class XmFormTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testForm()
    {

        $response = $this->post(route('xmform'), [
            'company_name' => 'ABCD',
            'start_date' => '2020-06-01',
            'end_date' => '2020-06-01',
            'email' => 'info@hqsoft.hu'
        ]);
        $response->assertRedirect(route('xmform'));
    }
}
