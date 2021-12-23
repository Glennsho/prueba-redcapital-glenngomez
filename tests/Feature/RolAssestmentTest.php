<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RolAssestmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRolAssestment()
    {
        $response = $this->get('/login');

        $response->assertRedirect(route('admin.users.index'));
    }
}
