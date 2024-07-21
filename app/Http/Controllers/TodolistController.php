<?php

namespace App\Http\Controllers;

use App\Services\TodolistService;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    private TodolistService $todolistService;

    public function __construct(TodolistService $todoListService) {
        $this->todolistService = $todoListService;
    }

    public function todo() {
        return view('todolist.todolist',[
            'title' => 'Todolist',
            'todolist' => $this->todolistService->GetTodoList()
        ]);
    }

    public function addTodo(Request $request) {

        $todo = $request->input('todo');

        if(empty($todo)) {
            // jika kosong
            return view('todolist.todolist',[
                'title' => 'Todolist',
                'todolist' => $this->todolistService->GetTodoList(),
                'error' => 'Todolist wajib diisi'
            ]);
        }

        $this->todolistService->SaveTodo(uniqid(),$todo);
        return redirect('/todolist');

    }

    public function removeTodo(Request $request,string $todoId) {
        $this->todolistService->RemoveTodo($todoId);

        return redirect('/todolist');

    }
}
