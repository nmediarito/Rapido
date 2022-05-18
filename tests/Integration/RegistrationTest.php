<?php

namespace Tests\Integration;

use App\Models\Professional;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    //Database has to be connected first
    public function test_registration_urls() {
        //check if the url status for registration page for customer is available or ok
        $response = $this->get('/register/customer');

        $response->assertStatus(200);

        //check if the url status for registration page for mechanic is available or ok
        $response = $this->get('/register/mechanic');

        $response->assertStatus(200);
    }

    //Database has to be connected first
    public function test_mechanic_registration() {
        //check if the url status for registration page for customer is available or ok
        $registrationPage = $this->get('/register/mechanic');

        $registrationPage->assertStatus(200);

        //create a new record
        $newMechanic = Professional::factory()->create();

        $newMechanicArray = $newMechanic->toArray();

        //register with the new record
        $response = $this->followingRedirects()->post('/mechanic/registration', $newMechanicArray)->assertStatus(200);

        //log new mechanic record in
        $this->be($newMechanic);

        $responseLogin = $this->get('/mechanic/login');

        $responseLogin->assertStatus(200);
    }

    //Database has to be connected first
    public function test_customer_registration() {
        //check if the url status for registration page for customer is available or ok
        $registrationPage = $this->get('/register/customer');

        $registrationPage->assertStatus(200);

        //create a new record
        $newUser = User::factory()->create();

        $newUserArray = $newUser->toArray();

        //register with the new record
        $response = $this->followingRedirects()->post('/customer/registration', $newUserArray)->assertStatus(200);

        //log new mechanic record in
        $this->be($newUser);

        $responseLogin = $this->get('/customer/login');

        $responseLogin->assertStatus(200);
    }
}
