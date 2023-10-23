<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
        // 페이징  

// 로그인 페이지
Route::get('/', function () {
    return view('login');
});
// 로그인 페이지
Route::get('/login', function () {
    return view('login');
})->name('login');

// 메인 페이지
Route::get('/main',function (){
    return view('main');
});

// 공지사항 페이지
Route::get('/notice',function (){
    return view('notice');
})->name('notice');

// 게시판 페이지
Route::get('/board',function (){
    return view('board');
})->name('board');

// 회원 가입 페이지
Route::get('/register',function (){
    return view('register');
});

    // 컨트롤러
// 로그인 컨트롤러
Route::post('/user/login', [LoginController::class, 'login'])
    ->name('user.login');
Route::post('/user/logout', [LoginController::class, 'logout'])
    ->name('user.logout');
// 회원가입 컨트롤러 
Route::post('/user/regist', [RegisterController::class,'register'])
    ->name('user.regist');


// 생텀 양식
Route::group(['middleware' => ['auth:sanctum']], function () {   

});

// 

