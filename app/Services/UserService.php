<?php

namespace App\Services;

interface UserService {
    // kontrak
    function login(string $usernmae,string $password): bool;
    // yang direturn wajin true/false;
}