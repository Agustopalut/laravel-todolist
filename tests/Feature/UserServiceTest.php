<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use ParentIterator;
use Tests\TestCase;
use App\Services\UserService;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp(): void {
        parent::setUp();
        $this->userService = $this->app->make(UserService::class);
    }

    public function testSample() {
        self::assertTrue(true);
    }

    public function testLoginSuccess() {
        self::assertTrue($this->userService->login('khannedy','eko123'));
    }

    public function testLoginFailed() {
        self::assertFalse($this->userService->login('eko','eko123'));
    }
    public function testWrongPassword() {
        self::assertFalse($this->userService->login('khannedy','eko'));
    }
}
