<?php

use App\Livewire\Cabinets\CabinetCreate;
use App\Livewire\Cabinets\CabinetEdit;
use App\Livewire\Cabinets\CabinetsIndex;
use App\Livewire\Categories\CategoriesIndex;
use App\Livewire\Categories\CategoryCreate;
use App\Livewire\Categories\CategoryEdit;
use App\Livewire\Cities\CitiesIndex;
use App\Livewire\Cities\CityCreate;
use App\Livewire\Cities\CityEdit;
use App\Livewire\Clients\ClientCreate;
use App\Livewire\Clients\ClientEdit;
use App\Livewire\Clients\ClientsIndex;
use App\Livewire\Currencies\CurrenciesIndex;
use App\Livewire\Currencies\CurrencyCreate;
use App\Livewire\Currencies\CurrencyEdit;
use App\Livewire\Malls\MallCreate;
use App\Livewire\Malls\MallEdit;
use App\Livewire\Malls\MallsIndex;
use App\Livewire\Offices\OfficeCreate;
use App\Livewire\Offices\OfficeEdit;
use App\Livewire\Offices\OfficesIndex;
use App\Livewire\Payments\PaymentCreate;
use App\Livewire\Payments\PaymentEdit;
use App\Livewire\Payments\PaymentsIndex;
use App\Livewire\Subscriptions\SubscriptionCreate;
use App\Livewire\Subscriptions\SubscriptionEdit;
use App\Livewire\Subscriptions\SubscriptionsIndex;
use App\Livewire\Terminals\TerminalCreate;
use App\Livewire\Terminals\TerminalEdit;
use App\Livewire\Terminals\TerminalsIndex;
use App\Livewire\Tickets\TicketCreate;
use App\Livewire\Tickets\TicketEdit;
use App\Livewire\Tickets\TicketsIndex;
use App\Livewire\Transactions\TransactionCreate;
use App\Livewire\Transactions\TransactionEdit;
use App\Livewire\Transactions\TransactionsIndex;
use App\Livewire\Workers\WorkerCreate;
use App\Livewire\Workers\WorkerEdit;
use App\Livewire\Workers\WorkersIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::prefix('clients')->name('clients.')->group(function () {
    Route::get('/', ClientsIndex::class)->name('index');
    Route::get('create', ClientCreate::class)->name('create');
    Route::get('{full_name}/edit', ClientEdit::class)->name('edit');
});

Route::prefix('transactions')->name('transactions.')->group(function () {
    Route::get('/', TransactionsIndex::class)->name('index');
    Route::get('create', TransactionCreate::class)->name('create');
    Route::get('{transaction_id}/edit', TransactionEdit::class)->name('edit');
});

Route::prefix('subscriptions')->name('subscriptions.')->group(function () {
    Route::get('/', SubscriptionsIndex::class)->name('index');
    Route::get('create', SubscriptionCreate::class)->name('create');
    Route::get('{date}/edit', SubscriptionEdit::class)->name('edit');
});

Route::prefix('tickets')->name('tickets.')->group(function () {
    Route::get('/', TicketsIndex::class)->name('index');
    Route::get('create', TicketCreate::class)->name('create');
    Route::get('{date}/{worker_full_name}/edit', TicketEdit::class)->name('edit');
});

Route::prefix('workers')->name('workers.')->group(function () {
    Route::get('/', WorkersIndex::class)->name('index');
    Route::get('create', WorkerCreate::class)->name('create');
    Route::get('{full_name}/{cabinet_number}/{office_address}/edit', WorkerEdit::class)->name('edit');
});

Route::prefix('offices')->name('offices.')->group(function () {
    Route::get('/', OfficesIndex::class)->name('index');
    Route::get('create', OfficeCreate::class)->name('create');
    Route::get('{address}/{ticket_date}/edit', OfficeEdit::class)->name('edit');
});

Route::prefix('payments')->name('payments.')->group(function () {
    Route::get('/', PaymentsIndex::class)->name('index');
    Route::get('create', PaymentCreate::class)->name('create');
    Route::get('{name}/{terminal_internal_number}/edit', PaymentEdit::class)->name('edit');
});

Route::prefix('terminals')->name('terminals.')->group(function () {
    Route::get('/', TerminalsIndex::class)->name('index');
    Route::get('create', TerminalCreate::class)->name('create');
    Route::get('{internal_number}/{mall_address}/edit', TerminalEdit::class)->name('edit');
});

Route::prefix('cities')->name('cities.')->group(function () {
    Route::get('/', CitiesIndex::class)->name('index');
    Route::get('create', CityCreate::class)->name('create');
    Route::get('{name}/edit', CityEdit::class)->name('edit');
});

Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', CategoriesIndex::class)->name('index');
    Route::get('create', CategoryCreate::class)->name('create');
    Route::get('{name}/edit', CategoryEdit::class)->name('edit');
});

Route::prefix('currencies')->name('currencies.')->group(function () {
    Route::get('/', CurrenciesIndex::class)->name('index');
    Route::get('create', CurrencyCreate::class)->name('create');
    Route::get('{symbol}/edit', CurrencyEdit::class)->name('edit');
});

Route::prefix('malls')->name('malls.')->group(function () {
    Route::get('/', MallsIndex::class)->name('index');
    Route::get('create', MallCreate::class)->name('create');
    Route::get('{address}/edit', MallEdit::class)->name('edit');
});

Route::prefix('cabinets')->name('cabinets.')->group(function () {
    Route::get('/', CabinetsIndex::class)->name('index');
    Route::get('create', CabinetCreate::class)->name('create');
    Route::get('{number}/edit', CabinetEdit::class)->name('edit');
});
