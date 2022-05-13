<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_landing_page()
    {
        //check if the url status for the website is available or ok
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_registration_page()
    {
        //check if the url status for registration page for customer is available or ok
        $response = $this->get('/register/customer');

        $response->assertStatus(200);
    }

    public function registration_form()
    {
        //check if the url status for registration page for customer is available or ok
        $response = $this->get('/register/customer');

        $response->assertStatus(200);
    }
}
