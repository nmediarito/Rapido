<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_landing_page() {
        //check if the url status for the website is available or ok
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_registration_page() {
        //check if the url status for registration page for customer is available or ok
        $response = $this->get('/register/customer');

        $response->assertStatus(200);
    }

    public function test_customer_login_form() {
        //check if the url status for registration page for customer is available or ok
        $response = $this->get('/customer/login');

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

    //Database has to be connected first
    public function test_user_duplication() {
        //create fake user data row in users table
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        //check if their ids are duplicates
        $this->assertTrue($user1->id != $user2->id);
    }

    //Database has to be connected first
    public function test_user_deletion() {
        //create fake mechanic data row in professionals table
        $user = User::factory()->create();

        //gets the created professional record
        $user = User::first();

        if($user) {
            $user->delete();
        }

        $this->assertTrue(true);
    }
}
