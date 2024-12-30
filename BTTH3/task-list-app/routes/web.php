<?php
use App\Http\Controllers\TaskController;
use App\Models\Task;

use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index']); // Directly points to index method
Route::resource('tasks', TaskController::class);