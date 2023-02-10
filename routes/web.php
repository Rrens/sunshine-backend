<?php

use App\Http\Controllers\BaristaController;
use App\Http\Controllers\CountUserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\testimonyController;
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

Route::get('/', [HomeController::class, 'index'])->name('index.home');


// Route::get('/login', function () {
//     return view('admin.auth.login');
// });

// Route::get('/ip', function () {
//     $checkLocation = geoIp()->getLocation($_SERVER['REMOTE_ADDR']);
//     return $checkLocation->toArray();
//     // dd($checkLocation);
// });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(
    [
        'prefix' => 'error'
    ],
    function () {
        Route::get('404', function () {
            return view('errors.404');
        });
    }
);

// Route::post('/login', function () {
//     return 'halo';
// })->name('login.auth');


Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'isAdmin'
    ],
    function () {

        Route::get('/ip', [CountUserController::class, 'index'])->name('ip');
        Route::group(
            ['prefix' => 'testimony'],
            function () {
                Route::get('/', [TestimonyController::class, 'index'])->name('index.testimoni');
                Route::post('/', [TestimonyController::class, 'store'])->name('store.testimoni');
                Route::get('/show/{id}', [TestimonyController::class], 'show')->name('show.testimoni');
                // Route::get('/{id}/delete', [TestimonyController::class, 'destroy'])->name('destroy.testimoni');
                Route::get('/{id}', [TestimonyController::class, 'update'])->name('showIdTestimony');
                // Route::get('/testimoni/{id}', function ($id) {
                //     $data = $id;
                //     return $data;
                // })->name('showIdTestimony');
            }
        );

        Route::group([
            'prefix' => 'menu'
        ], function () {

            Route::get('/', [MenuController::class, 'index'])->name('index.menu');
            Route::post('/', [MenuController::class, 'store'])->name('store.menu');
            // Route::get('/menu/edit/{id}', [HomeController::class, 'edit'])->name('showIdMenu');
            Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('showIdMenu');
            Route::post('/{id}/edit', [MenuController::class, 'update'])->name('update.menu');
            Route::get('/{id}/delete', [MenuController::class, 'destroy'])->name('deleteMenu');
            // Route::post('/menu/{id}/edit', function ($id, $request) {
            //     // dd($id, $request);
            //     return 'halo';
            // })->name('update.menu');
        });

        Route::group(
            [
                'prefix' => 'barista'
            ],
            function () {
                Route::get('/', [BaristaController::class, 'index'])->name('index.barista');
                Route::post('/', [BaristaController::class, 'store'])->name('store.barista');
                Route::get('/{id}/delete', [BaristaController::class, 'destroy'])->name('deleteBarista');
                Route::get('/{id}/edit', [BaristaController::class, 'edit'])->name('showIdBarita');
                Route::post('/{id}/edit', [BaristaController::class, 'update'])->name('update.barista');
            }
        );

        Route::group(
            [
                'prefix' => 'event'
            ],
            function () {
                Route::get('/', [EventController::class, 'index'])->name('index.event');
                Route::post('/', [EventController::class, 'store'])->name('store.event');
                Route::get('/{id}/delete', [EventController::class, 'destroy'])->name('deleteEvent');
                Route::get('/{id}/edit', [EventController::class, 'edit'])->name('showIdEvent');
                Route::post('/{id}/edit', [EventController::class, 'update'])->name('update.event');
            }
        );
        Route::group(
            [
                'prefix' => 'galery'
            ],
            function () {
                Route::get('/', [GaleryController::class, 'index'])->name('index.galery');
                Route::post('/', [GaleryController::class, 'store'])->name('store.galery');
                Route::get('/{id}/delete', [GaleryController::class, 'destroy'])->name('deleteGalery');
                Route::get('/{id}/edit', [GaleryController::class, 'edit'])->name('showIdGalery');
                Route::post('/{id}/edit', [GaleryController::class, 'update'])->name('update.galery');
            }
        );

        // Route::post('/barista', function () {
        //     return 'halo';
        // })->name('store.barista');





    }
);
