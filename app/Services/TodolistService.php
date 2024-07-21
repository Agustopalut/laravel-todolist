<?php

namespace App\Services;

interface TodolistService {
    public function SaveTodo(string $id,string $todo): void;
    public function GetTodoList() : array;
    public function RemoveTodo(string $todoId): void;
}

?>