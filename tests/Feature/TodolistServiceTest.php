<?php

namespace Tests\Feature;

use App\Services\TodolistService;
// use Illuminate\Contracts\Session\Session; //bukan yang ini
Use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
// use Illuminate\Http\Request;
use Tests\TestCase;

class TodolistServiceTest extends TestCase
{
    private TodolistService $todoListService;

    public function setUp(): void {
        // wajib sertakan void
        parent::setUp();
        $this->todoListService = $this->app->make(TodolistService::class);
    }

    public function testNotNull() {
        self::assertNotNull($this->todoListService);
    }

    public function testSaveTodo() {
        $this->todoListService->SaveTodo('1','eko');

        $todolist = Session::get('todolist');

        foreach ($todolist as $value) {
            self::assertEquals('1', $value['id']);
            self::assertEquals('eko', $value['todo']);
        }
    }

    public function testGetTodoEmpty() {
        self::assertEquals([], $this->todoListService->GetTodoList());
        // expected nya data kosong, karena kita memang blm menambahkan data apapun
    }

    public function testGetTodoNotEmpty () {
        $expected =[
            [
                'id' => '1',
                'todo' => 'eko'
            ],
            [
                'id' => '2',
                'todo' => 'budi'
            ]
            ];
            $this->todoListService->SaveTodo('1','eko');
            $this->todoListService->SaveTodo('2','budi');
            self::assertEquals($expected,$this->todoListService->GetTodoList());
    }

    public function testRemoveTodo() {
        $this->todoListService->SaveTodo('1','eko');
        $this->todoListService->SaveTodo('2','budi');

        self::assertEquals(2,sizeof($this->todoListService->GetTodoList()));
        // menggunakan method sizeof(), untuk menghitung jumlah data yang ada

        $this->todoListService->RemoveTodo('3');
        self::assertEquals(2,sizeof($this->todoListService->GetTodoList()));

        $this->todoListService->RemoveTodo('1');
        self::assertEquals(1,sizeof($this->todoListService->GetTodoList()));

        $this->todoListService->RemoveTodo('2');
        self::assertEquals(0,sizeof($this->todoListService->GetTodoList()));

        

    }
}
