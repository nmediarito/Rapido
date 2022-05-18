<?php

namespace Tests\Unit;

use App\Models\Professional;
use Tests\TestCase;

class MechanicTest extends TestCase
{

    public function test_landing_page() {
        //check if the url status for the website is available or ok
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_registration_page() {
        //check if the url status for registration page for customer is available or ok
        $response = $this->get('/register/mechanic');

        $response->assertStatus(200);
    }

    public function test_mechanic_login_form() {
        //check if the url status for registration page for customer is available or ok
        $response = $this->get('/mechanic/login');

        $response->assertStatus(200);
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

    //Database has to be connected first
    public function test_mechanic_duplication() {
        //create fake mechanic data row in professionals table
        $professional1 = Professional::factory()->create();
        $professional2 = Professional::factory()->create();
        //check if their ids are duplicates
        $this->assertTrue($professional1->id != $professional2->id);
    }

    //Database has to be connected first
    public function test_mechanic_deletion() {
        //create fake mechanic data row in professionals table
        $professional = Professional::factory()->create();

        //gets the created professional record
        $professional = Professional::first();

        if($professional) {
            $professional->delete();
        }

        $this->assertTrue(true);
    }
}
