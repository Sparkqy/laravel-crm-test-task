<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth
Auth::routes(['verify' => false, 'reset' => false]);

// Front-end
Route::get('', function () {
    return redirect()->route('frontend.companies.index');
});

Route::group([
    'middleware' => 'auth',
    'as' => 'frontend.',
], function () {
    // Companies
    Route::resource('companies', 'CompanyController')->except(['show']);

    // Clients
    Route::resource('clients', 'ClientController')->except(['show']);
});
