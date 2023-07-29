<?php

use App\Http\Controllers\admin\agentController;
use App\Http\Controllers\admin\authController as AdminAuthController;
use App\Http\Controllers\admin\bannerControl;
use App\Http\Controllers\admin\cardController as AdminCardController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\homeController as AdminHomeController;
use App\Http\Controllers\admin\officeController;
use App\Http\Controllers\authController;
use App\Http\Controllers\cardController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\wishController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/user/register', [authController::class,"register"]);
Route::post('/user/register', [authController::class,"store"]);
Route::post('/user/login', [authController::class,"loginPost"]);
Route::get('/user/login', [authController::class,"login"])->name('login');
Route::get('/user/logout', [authController::class,"logout"])->middleware('auth');

Route::get('/payments/verify/{payment?}',[FrontController::class,'payment_verify'])->name('payment-verify');
Route::get('/',[homeController::class,'index']);
Route::get('/cards/{category}',[cardController::class,'index']);
Route::post('/add-to-wish/{id}', [ wishController::class, 'addToWish'])->name('add.to.wish');
Route::post('/remove-from-wish/{id}', [ wishController::class, 'removeFromWish'])->name('remove.from.wish');

Route::post('/add-to-cart/{id}', [ cardController::class, 'addToCart'])->name('add.to.cart');
Route::post('/update-cart/{id}', [ cardController::class, 'update_quen'])->name('update.cart');

Route::get('/remove-from-cart/{id}', [ cardController::class, 'removeFromCart'])->name('remove.from.cart');
Route::get('/cart', [ cartController::class, 'index']);

Route::get('/favorite',[wishController::class,'fav']);
Route::get('/search',[homeController::class,'search']);

Route::get('/agents',[homeController::class,'agents']);
Route::get('/terms',[homeController::class,'terms']);
Route::get('/service',[homeController::class,'service']);


Route::prefix('admin')->group(function () {
    Route::get('/login',[AdminAuthController::class,'login']);
    Route::post('/login', [AdminAuthController::class,"loginPost"]);

    Route::get('/register',[AdminAuthController::class,'register']);
    Route::post('/register', [AdminAuthController::class,"store"]);

    Route::get("/users/show",[AdminAuthController::class,'index']);
    Route::get("/users/delete/{id}",[AdminAuthController::class,'delete']);

    Route::get('/changepass',[AdminAuthController::class,'password']);
    Route::post('/changepass', [AdminAuthController::class,"change_password"]);
    Route::get('/logout',[AdminAuthController::class,'logout']);


    Route::middleware(['admin'])->group(function () {
        Route::get('/',[AdminHomeController::class,'index']);
        Route::get('/info',[AdminHomeController::class,'site_info']);
        Route::post('/info/update/{id}',[AdminHomeController::class,'site_info_update']);

        Route::get('/terms',[AdminHomeController::class,'terms']);
        Route::post('/terms/update/{id}',[AdminHomeController::class,'terms_update']);

        Route::get('/service',[AdminHomeController::class,'service']);
        Route::post('/service/update/{id}',[AdminHomeController::class,'service_update']);

                Route::prefix('category')->group(function () {
                    Route::get('/',[categoryController::class,'index']);
                    Route::get('/delete/{id}',[categoryController::class,'delete']);
                    Route::get('/edit/{cat}',[categoryController::class,'edit']);
                    Route::post('/edit/{cat}',[categoryController::class,'update']);
                    Route::get('/add',[categoryController::class,'add']);
                    Route::post('/add',[categoryController::class,'store']);
                });
                Route::prefix('office')->group(function () {
                    Route::get('/',[officeController::class,'index']);
                    Route::get('/delete/{id}',[officeController::class,'delete']);
                    Route::get('/edit/{office}',[officeController::class,'edit']);
                    Route::post('/edit/{office}',[officeController::class,'update']);
                    Route::get('/add',[officeController::class,'add']);
                    Route::post('/add',[officeController::class,'store']);
                });
                Route::prefix('agents')->group(function () {
                    Route::get('/',[agentController::class,'index']);
                    Route::get('/delete/{id}',[agentController::class,'delete']);
                    Route::get('/edit/{agent}',[agentController::class,'edit']);
                    Route::post('/edit/{agent}',[agentController::class,'update']);
                    Route::get('/add',[agentController::class,'add']);
                    Route::post('/add',[agentController::class,'store']);
                });
                Route::prefix('banners')->group(function () {
                    Route::get('/',[bannerControl::class,'index']);
                    Route::get('/delete/{id}',[bannerControl::class,'delete']);
                    Route::get('/edit/{banner}',[bannerControl::class,'edit']);
                    Route::post('/edit/{banner}',[bannerControl::class,'update']);
                    Route::get('/add',[bannerControl::class,'add']);
                    Route::post('/add',[bannerControl::class,'store']);
                });
                Route::prefix('cards')->group(function () {
                    Route::get('/',[AdminCardController::class,'index']);
                    Route::get('/delete/{id}',[AdminCardController::class,'delete']);
                    Route::get('/edit/{card}',[AdminCardController::class,'edit']);
                    Route::post('/edit/{card}',[AdminCardController::class,'update']);
                    Route::get('/add',[AdminCardController::class,'add']);
                    Route::post('/add',[AdminCardController::class,'store']);
                });


    });
});




// Route::get('/', function () {
//     return view('welcome');
// })->Middleware("auth");
