<?php

use App\Sidecar\Browser;
use App\Sidecar\HelloWorld;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return Browser::execute()->body();

    // run many functions in parralel 

    // $result = HelloWorld::executeMany([
    //     ['name' => 'Bruno'],
    //     ['name' => 'Bruno'],
    //     ['name' => 'Bruno'],
    //     ['name' => 'Bruno'],
    //     ['name' => 'Bruno'],
    //     ['name' => 'Bruno'],
    // ]);

    // return collect($result)->map->body();

    $result = HelloWorld::executeAsync(['name' => 'Briella'])->settled();

    return $result->body();

});
