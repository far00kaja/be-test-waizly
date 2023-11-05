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
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function  test_1_should_be_unauthorized_response()
    {
        $this->getJson(route('employee.index'))->assertUnauthorized();
    }

    public function  test_2_should_be_ok()
    {
        $login = $this->postJson(route('login', [
            'email' => 'email1@email.email', 'password' => 'password'
        ]));
        $result = json_decode($login->getContent(), true); //->authorization; 
        $token = $result['authorization']['token'];
        // $login->getcon
        $this
            ->withHeader('authorization', 'Bearer ' . $token)
            ->getJson(route('employee.index'))->assertOk();
    }
}
