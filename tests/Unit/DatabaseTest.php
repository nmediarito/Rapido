<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{

    /**
     * The SQL server and migrations must be set up and running first before all test cases in this class passes
     *
     *
     * Check if all the required values have inserted set after the migration on these specific tables
     */

    public function test_database_connection()
    {

    }

    public function test_membership_types_table()
    {
        $this->assertDatabaseHas('membership_types', [
            'id' => 1, 'name' => 'On Demand',
        ]);
        $this->assertDatabaseHas('membership_types', [
            'id' => 2, 'name' => 'Platinum',
        ]);
    }

    public function test_job_statuses_table()
    {
        $this->assertDatabaseHas('job_statuses', [
            'id' => 1, 'name' => 'Pending'
        ]);
        $this->assertDatabaseHas('job_statuses', [
            'id' => 2, 'name' => 'Accepted'
        ]);
        $this->assertDatabaseHas('job_statuses', [
            'id' => 3, 'name' => 'Completed'
        ]);
    }

    public function test_failure_types_table()
    {
        $this->assertDatabaseHas('failure_types', [
            'id' => 1, 'name' => 'Flat batteries'
        ]);
        $this->assertDatabaseHas('failure_types', [
            'id' => 2, 'name' => 'Flat tyres'
        ]);
        $this->assertDatabaseHas('failure_types', [
            'id' => 3, 'name' => 'Towing'
        ]);
        $this->assertDatabaseHas('failure_types', [
            'id' => 4, 'name' => 'Locked out'
        ]);
        $this->assertDatabaseHas('failure_types', [
            'id' => 5, 'name' => 'Fuel delivery'
        ]);
    }

    public function test_payment_types_table()
    {
        $this->assertDatabaseHas('payment_types', [
            'id' => 1, 'name' => 'Credit'
        ]);
        $this->assertDatabaseHas('payment_types', [
            'id' => 2, 'name' => 'Debit'
        ]);
    }
}
