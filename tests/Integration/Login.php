<?php

namespace Tests\Integration;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Login extends TestCase
{

    public function test_mechanic_login_form() {
        //check if the url status for registration page for customer is available or ok
        $response = $this->get('/mechanic/login');

        $response->assertStatus(200);
    }

    public function test_mechanic_login() {

    }

    //Database has to be connected first
    public function test_mechanic_logout() {
            //create fake mechanic data row in professionals table
            $professional = Professional::factory()->create();
            //log user in
            $this->be($professional);
            //logout route
            $response = $this->get('/mechanic/login');
            $response->assertStatus(200);
    }

    public function test_customer_login_form() {
        //check if the url status for registration page for customer is available or ok
        $response = $this->get('/customer/login');

        $response->assertStatus(200);
    }

    public function test_customer_login() {
        $user = User::factory()->create();

        $userExists = $user ? true : false;

        //check if user record exists
        $this->assertTrue($userExists);

        //log user in
        $response = $this->actingAs($user)->get('/home');

        $response->assertStatus(200);
    }

    //Database has to be connected first
    public function test_customer_logout() {
            //create fake user data row in users table
            $user = User::factory()->create();
            //log user in
            $this->be($user);
            //logout route
            $response = $this->get('/customer/login');
            $response->assertStatus(200);
    }

}

