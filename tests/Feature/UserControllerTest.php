<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage() {
        $this->get('/login')
        ->assertSeeText('Login'); // title nya Login;
    }

    public function testLoginSuccess() {
        $this->post('/login',[
            'username' => 'khannedy',
            'password' => 'eko123'
        ])->assertRedirect('/')
        ->assertSessionHas('username','khannedy');
    }

    public function testUsernameAndPasswordWrong() {

        $this->post('/login',[
            'username' => 'wrong',
            'password' => 'wrong'
        ])->assertSeeText('username atau password salah');

    }
    public function testLoginEmpty() {

        $this->post('/login',[])->assertSeeText('username atau password wajib diisi');

    }

    public function testLogout() {
        $this->withSession([
            'username' => 'khannedy'
        ])
        ->post('/logout')
        ->assertRedirect('/login')
        ->assertSessionMissing('username'); //berharap sesion nya hilang/sudah terhapus 

    }

    // public function testLogoutGuest() {

    //     $this->post('/logout')
    //     ->assertRedirect('/');
    //     // jika dia belum login maka ga boleh logout

    // }

    public function testLoginUserPage() {
        $this->withSession([
            'username' => 'khannedy'
        ])
        ->get('/login')
        ->assertRedirect('/'); //karena dia sudah login, expected nya dia di redirect ke /
    }

    public function testLoginGuest() {
        $this->withSession([
            'username' => 'khannedy'
        ])
        ->post('/login',[
            'username' => 'khannedy',
            'password' => 'eko123'
        ])
        ->assertRedirect('/'); 
    }
}
