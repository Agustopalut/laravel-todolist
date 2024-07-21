<?php

namespace App\Services\Impl;

use App\Services\TodolistService;
use Illuminate\Support\Facades\Session;

class TodolistServiceImpl implements TodolistService {
    
    public function SaveTodo(string $id, string $todo): void
    {
        if(!Session::exists('todolist')) {
            // jika todolist nya belu, ada
            // gunakan session yang ini: use Illuminate\Support\Facades\Session;
            // karena tidak object request, kita langsung mennggunakan syntax session
            Session::put('todolist',[]);
        }

        // tambah data nya ke session

        Session::push('todolist',[
            'id' => $id,
            'todo' => $todo
        ]);
        // : void, artinya tidak mengembalikan apapun
        // hanya sebuah logic biasa 

    }

    public function GetTodoList(): array {
        return Session::get('todolist',[]);// array kosong artinya, nilai default/data kosong jika tidak ditemukan session nya 
    }

    public function RemoveTodo(string $todoId): void
    {
        // mendapatkan semua data
        $todolist = Session::get('todolist');

        foreach ($todolist as $index => $value) {
            if($value['id'] == $todoId ) { //mencari data
                unset($todolist[$index]); //menghapus data
                break; // hentikan perulangan 
            }
        }

        Session::put('todolist',$todolist); // buat ulang session nya 
    }
}

?>