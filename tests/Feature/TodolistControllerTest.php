<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
   
    public function testTodoPage() {
        $this->withSession([
            'username' => 'khannedy',
            'todolist' => [
                [
                    "id" => "1",
                    "todo" => "budi"
                ]
            ]
        ])->get('/todolist')
        ->assertSeeText("1")
        ->assertSeeText("budi");
    }

    public function testTodoFailed() {
        $this->withSession([
            'username' =>'khannedy'
        ])
        ->post('/todolist',[])
        ->assertSeeText("Todolist wajib diisi");
    }

    public function testTodoSuccess() {

        $this->withSession([
            'username' =>'khannedy'
        ])
        ->post('/todolist',[
            'todo' => 'eko'
        ])
        ->assertRedirect('/todolist');
        
    }

    public function testRemoveTodo() {
        $this->withSession([
            'username' =>'khannedy',
            'todolist' => [
                [
                    'id' => '1',
                    'todo' => 'eko'
                ],
                [
                    'id' => '2',
                    'todo' => 'budi'
                ],
            ]
        ])
        ->delete('/todolist/1/delete')
        ->assertRedirect('/todolist');
    }
}
