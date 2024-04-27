<?php

use App\Livewire\Clients\ClientCreate;
use App\Livewire\Clients\ClientEdit;
use App\Livewire\Clients\ClientsIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::prefix('clients')->name('clients.')->group(function () {
    Route::get('/', ClientsIndex::class)->name('index');
    Route::get('create', ClientCreate::class)->name('create');
    Route::get('{full_name}/edit', ClientEdit::class)->name('edit');
});
