<?php

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

// 로그인 페이지
Route::get('/', function () {
    return view('login');
});
// 로그인 페이지
Route::get('/login', function () {
    return view('login');
});

// 메인 페이지
Route::get('/main',function (){
    return view('main');
});

// 공지사항 페이지
Route::get('/main',function (){
    return view('main');
});

// 게시판 페이지
Route::get('/main',function (){
    return view('main');
});

// 회원 가입 페이지
Route::get('/register',function (){
    return view('register');
});

