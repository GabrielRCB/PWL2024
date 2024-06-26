<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/verify', [AuthController::class, 'verify']);
Route::get('/register',[AuthController::class,'register']);
Route::post('/register',[AuthController::class,'registerProceed']);
Route::get('/register/activation/{token}',[AuthController::class,'registerVerify']);
Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
});



Route::group(['prefix' => 'teacher'], function () {
    Route::get('/',[TeacherController::class,'list']);
//    Route::get('/{id}',[TeacherController::class,'detail']);
    Route::get('/add',[TeacherController::class,'add']);
    Route::get('/edit/{id}',[TeacherController::class,'edit']);

    Route::post('/update',[TeacherController::class,'update']);
    Route::post('/insert',[TeacherController::class,'insert']);
    Route::post('/delete',[TeacherController::class,'delete']);

});

Route::group(['prefix' => 'student'], function () {
    Route::get('/', [StudentController::class, 'list']);
//    Route::get('/{id}', [StudentController::class, 'detail']);
    Route::get('/add', [StudentController::class, 'add']);
    Route::get('/edit/{id}', [StudentController::class, 'edit']);

    Route::post('/update', [StudentController::class, 'update']);
    Route::post('/insert', [StudentController::class, 'insert']);
    Route::post('/delete', [StudentController::class, 'delete']);
});

Route::group(['middleware' => 'auth', 'prefix' => 'user'], function () {
    Route::get('/change-password', [TestingController::class, 'changePassword']);

    Route::post('/change-password', [TestingController::class, 'updatePassword']);
});

Route::get('mail/test',function (){
    \Illuminate\Support\Facades\Mail::to('jokowi@gmail.com')->queue(new \App\Mail\TestMail());
});



Route::group(['prefix'=>'app','middleware' => 'auth'],function (){
Route::get('/', [KasirController::class,'index']);

Route::post('/search-barcode', [KasirController::class,'searchProduct']);
Route::post('/insert', [KasirController::class, 'insert']);
});

Route::group(['prefix'=> 'transaksi','middleware' => 'auth'],function(){
Route::get('/',[TransaksiController::class,'index']);
Route::get('/{id}/pdf',[TransaksiController::class,'printPDF']);
});


Route::group([
    'middleware' => 'auth',
    'prefix' => 'product'
], function () {
    Route::get('/', [ProductController::class, 'list']);
//    Route::get('/{id}',[TeacherController::class,'detail']);
    Route::get('/add', [ProductController::class, 'add']);
    Route::get('/edit/{id}', [ProductController::class, 'edit']);

    Route::post('/update', [ProductController::class, 'update']);
    Route::post('/insert', [ProductController::class, 'insert']);
    Route::post('/delete', [ProductController::class, 'delete']);
});

//Route::get('/latihan',function (){
// echo "Gabriel";
//});

//Route::get('/read/{judul}', [TestController::class, 'read']);

//Route::get('/test', [TestController::class,'index']);

//Route::get('/teacher',[TestController::class,'teacher']);

//Route::get('/student', [TestController::class,'student']);



