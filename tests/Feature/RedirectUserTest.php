<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RedirectUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRedirectUser()
    {
        $response = $this->get('/home');

        $response->assertRedirect(route('login'));
    }
}
