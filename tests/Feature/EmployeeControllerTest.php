<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testIndex()
{
    $response = $this->get('/employees');

    $response->assertStatus(200);
}

}
