<?php

namespace App\Services\Impl;


use App\Services\UserService;


class UserServiceImpl implements UserService {
    // class untuk implementasi untuk logic nya 
    private array $users =[
        'khannedy' => 'eko123'
        // username => password;
    ]; 

    public function login (string $username,string $password): bool {

        if(!isset($this->users[$username])) {
            // apakah ada data dengan key username yang dikirim
            // jika tidak ada 
            return false;
        } 

        $correctPass = $this->users[$username];

        return $password == $correctPass; // jika sama ini akan menghasilkan true;

    }
}