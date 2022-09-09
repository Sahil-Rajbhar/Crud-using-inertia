<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // $response = $this->get('/');
        // $response = $this->get('/employees');
        // $response = $this->get('/alpha');
        $response = $this->get('employees/{employee} ');

        $response->assertStatus(200);
        
    }
}