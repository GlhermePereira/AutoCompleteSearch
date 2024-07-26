<?php

use App\Http\Controllers\CountriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

Route::view('/','AutoCompleteSearch.index');

Route::prefix('auto-complete-search')->group(function(){
Route::get('search/{query}',[CountriesController::class,'search']);
});