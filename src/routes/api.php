<?php

use Illuminate\Support\Facades\Route;

// Auth
Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');

Route::group([
    'middleware' => 'auth:api',
    'namespace' => 'Api',
    'as' => 'api.',
], function () {
    // Companies
    Route::get('companies', 'CompanyController@index')->name('companies.index');
    Route::get('clients/{company}', 'CompanyController@clients')->name('companies.clients');

    // Clients
    Route::get('client_companies/{client}', 'ClientController@companies')->name('clients.companies');
});
