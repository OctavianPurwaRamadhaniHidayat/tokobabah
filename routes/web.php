<?php



use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HotProdukController;



/*
AUTHENTICATION ROUTES
*/

Route::get('/', function () {
    return view('landing.landing');    // view Landing Page
});

Route::get('/showregister', function () {
    return view('auth.register.register'); // view Registration Page
});
Route::post('/register', [AuthController::class, 'register']); // registration function

Route::get('/login_user', function () {
    return view('auth.login.login_user');    // view form login user
})->name('login_user');

Route::post('/login_user', [AuthController::class,'login_user']);//login user function


Route::get('/login_admin', function () {
    return view('auth.login.login_admin');    // view form login admin
});

Route::post('/login_admin', [AuthController::class, 'login_admin']); // login admin function

/*
ADMIN ROUTES
*/
Route::get('/dashboard_admin', [HotProdukController::class, 'dashboard_admin'])->middleware('auth:admins');

Route::get('/tambah', function () {
    return view('admin.crud.tambah'); //view tambah produk
})->middleware('auth:admins');

Route::get('/sepatu_admin', [ProdukController::class, 'sepatu_admin'])
    ->middleware('auth:admins');

Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->middleware('auth:admins');//form edit produk

Route::put('/produk/{id}', [ProdukController::class, 'update'])->middleware('auth:admins');//untuk update produk

Route::post('/store', [ProdukController::class, 'store'])->middleware('auth:admins');//untuk simpan tambah produk
Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->middleware('auth:admins');//untuk hapus produkt
/*
USER ROUTES
*/

// // Route::get('/sepatu', function () {
// //     return view('user.sepatu'); // view User sepatu
// });

Route::get('/sepatu', [ProdukController::class, 'sepatu'])
    ->middleware('auth');


    Route::get('/dashboard_user', [HotProdukController::class, 'tampilUser'])
    ->middleware('auth');
    Route::get('/admin/hot-produk', [HotProdukController::class, 'index'])
    ->middleware('auth');

Route::post('/admin/hot-produk', [HotProdukController::class, 'store'])
    ->middleware('auth');





    // logout admin dan user
    Route::post('/logout', [AuthController::class, 'logout']);//logout admin & user

Route::get('/sepatu', [ProdukController::class, 'sepatu'])
    ->middleware('auth');

Route::get('/sepatu/search', [ProdukController::class, 'search'])
    ->middleware('auth')
    ->name('sepatu.search');



Route::get('/sepatu_admin', [ProdukController::class, 'sepatu_admin'])
    ->middleware('auth:admins');

Route::get('/sepatu/search_admin', [ProdukController::class, 'search_admin'])
    ->middleware('auth:admins')
    ->name('sepatu.search_admin');