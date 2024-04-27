<?php

use App\Livewire\AdvertisingCampaigns\AdvertisingCampaignCreate;
use App\Livewire\AdvertisingCampaigns\AdvertisingCampaignEdit;
use App\Livewire\AdvertisingCampaigns\AdvertisingCampaignsIndex;
use App\Livewire\Builders\BuilderCreate;
use App\Livewire\Builders\BuilderEdit;
use App\Livewire\Builders\BuildersIndex;
use App\Livewire\Cities\CitiesIndex;
use App\Livewire\Cities\CityCreate;
use App\Livewire\Cities\CityEdit;
use App\Livewire\Clients\ClientCreate;
use App\Livewire\Clients\ClientEdit;
use App\Livewire\Clients\ClientsIndex;
use App\Livewire\Departments\DepartmentCreate;
use App\Livewire\Departments\DepartmentEdit;
use App\Livewire\Departments\DepartmentsIndex;
use App\Livewire\Districts\DistrictCreate;
use App\Livewire\Districts\DistrictEdit;
use App\Livewire\Districts\DistrictsIndex;
use App\Livewire\Payments\PaymentCreate;
use App\Livewire\Payments\PaymentEdit;
use App\Livewire\Payments\PaymentsIndex;
use App\Livewire\RealEstates\RealEstateCreate;
use App\Livewire\RealEstates\RealEstateEdit;
use App\Livewire\RealEstates\RealEstatesIndex;
use App\Livewire\Realtors\RealtorCreate;
use App\Livewire\Realtors\RealtorEdit;
use App\Livewire\Realtors\RealtorsIndex;
use App\Livewire\Requests\RequestCreate;
use App\Livewire\Requests\RequestEdit;
use App\Livewire\Requests\RequestsIndex;
use App\Livewire\ResidentialComplexes\ResidentialComplexCreate;
use App\Livewire\ResidentialComplexes\ResidentialComplexEdit;
use App\Livewire\ResidentialComplexes\ResidentialComplexesIndex;
use App\Livewire\Services\ServiceCreate;
use App\Livewire\Services\ServiceEdit;
use App\Livewire\Services\ServicesIndex;
use App\Livewire\Streets\StreetCreate;
use App\Livewire\Streets\StreetEdit;
use App\Livewire\Streets\StreetsIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::prefix('clients')->name('clients.')->group(function () {
    Route::get('/', ClientsIndex::class)->name('index');
    Route::get('create', ClientCreate::class)->name('create');
    Route::get('{full_name}/edit', ClientEdit::class)->name('edit');
});

Route::prefix('requests')->name('requests.')->group(function () {
    Route::get('/', RequestsIndex::class)->name('index');
    Route::get('create', RequestCreate::class)->name('create');
    Route::get('{requirements}/edit', RequestEdit::class)->name('edit');
});

Route::prefix('payments')->name('payments.')->group(function () {
    Route::get('/', PaymentsIndex::class)->name('index');
    Route::get('create', PaymentCreate::class)->name('create');
    Route::get('{todo}/edit', PaymentEdit::class)->name('edit');
});

Route::prefix('realtors')->name('realtors.')->group(function () {
    Route::get('/', RealtorsIndex::class)->name('index');
    Route::get('create', RealtorCreate::class)->name('create');
    Route::get('{full_name}/edit', RealtorEdit::class)->name('edit');
});

Route::prefix('departments')->name('departments.')->group(function () {
    Route::get('/', DepartmentsIndex::class)->name('index');
    Route::get('create', DepartmentCreate::class)->name('create');
    Route::get('{todo}/edit', DepartmentEdit::class)->name('edit');
});

Route::prefix('districts')->name('districts.')->group(function () {
    Route::get('/', DistrictsIndex::class)->name('index');
    Route::get('create', DistrictCreate::class)->name('create');
    Route::get('{todo}/edit', DistrictEdit::class)->name('edit');
});

Route::prefix('real-estates')->name('real-estates.')->group(function () {
    Route::get('/', RealEstatesIndex::class)->name('index');
    Route::get('create', RealEstateCreate::class)->name('create');
    Route::get('{todo}/edit', RealEstateEdit::class)->name('edit');
});

Route::prefix('residential-complexes')->name('residential-complexes.')->group(function () {
    Route::get('/', ResidentialComplexesIndex::class)->name('index');
    Route::get('create', ResidentialComplexCreate::class)->name('create');
    Route::get('{todo}/edit', ResidentialComplexEdit::class)->name('edit');
});

Route::prefix('builders')->name('builders.')->group(function () {
    Route::get('/', BuildersIndex::class)->name('index');
    Route::get('create', BuilderCreate::class)->name('create');
    Route::get('{todo}/edit', BuilderEdit::class)->name('edit');
});

Route::prefix('streets')->name('streets.')->group(function () {
    Route::get('/', StreetsIndex::class)->name('index');
    Route::get('create', StreetCreate::class)->name('create');
    Route::get('{todo}/edit', StreetEdit::class)->name('edit');
});

Route::prefix('cities')->name('cities.')->group(function () {
    Route::get('/', CitiesIndex::class)->name('index');
    Route::get('create', CityCreate::class)->name('create');
    Route::get('{todo}/edit', CityEdit::class)->name('edit');
});

Route::prefix('advertising-campaigns')->name('advertising-campaigns.')->group(function () {
    Route::get('/', AdvertisingCampaignsIndex::class)->name('index');
    Route::get('create', AdvertisingCampaignCreate::class)->name('create');
    Route::get('{todo}/edit', AdvertisingCampaignEdit::class)->name('edit');
});

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/', ServicesIndex::class)->name('index');
    Route::get('create', ServiceCreate::class)->name('create');
    Route::get('{todo}/edit', ServiceEdit::class)->name('edit');
});
