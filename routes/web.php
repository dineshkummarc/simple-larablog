<?php

use App\Livewire\Blog\AllPost;
use App\Livewire\Blog\DetailPost;
use App\Livewire\Blog\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/blogs', AllPost::class)->name('blogs');
Route::get('/blogs/{post:slug}', DetailPost::class)->name('blogs.detail');
