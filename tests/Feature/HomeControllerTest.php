<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testGuest() {
        $this->withSession([])
        ->get('/')
        ->assertRedirect('/login');
    }
    public function testUser() {
        $this->withSession([
            'username' => 'khannedy'
        ])
        ->get('/')
        ->assertRedirect('/todolist');
    }
}
