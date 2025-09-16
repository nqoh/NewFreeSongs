<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_homepage_contain_not_user()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Not User');
    }

    public function test_returns_homepage_contain_have_user()
    {
        User::create([
            'email' => 'ngobese.nn@gmail.com',
            'name' => 'Nqobile',
            'password' => Hash::make(123456)
        ]);
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertDontSee('Not User');
    }
}
