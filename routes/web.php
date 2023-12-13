<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\UserController;


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

// -----------------------------------------------------------------------------
// 페이징  

// 로그인 페이지
Route::get('/', function () {
    return view('nonLogin.login');
})->name('/');

// 로그인 페이지
Route::get('/login', function () {
    return view('nonLogin.login');
})->name('login');

// 메인 페이지
Route::get('/main',[MainPageController::class, 'index'])
    ->name('main');

// 공지사항 페이지 목록 물러오기
Route::get('/notice',[NoticeController::class, 'index'])->name('notice');

// 게시판 페이지
Route::get('/board',[BoardController::class, 'index'])->name('board');

// 상세 페이지 불러오기(공지사항, 일반게시판)
Route::get('/notice/{nId}',[NoticeController::class, 'show'])->name('notice.detail');
Route::get('/board/{bId}',[BoardController::class,'show'])->name('board.detail');

Route::get('/detail',function (){
    return view('details');
})->name('detail');

// 회원 가입 페이지
Route::get('/register',function (){
    return view('nonLogin.register');
})->name('register');

// 글 쓰기 페이지
Route::get('writePage', function (){
    return view('writePage',['work'=>'write']);
})->name('writePage');

// 글 수정 페이지
Route::get('/editPage/{category}/{pId}',[
    PostController::class,'show'
    ])->name('page.edit');

// 마이 페이지
Route::get('/myPage',function (){
    return view('myPage');
})->name('myPage');

// 회원 탈퇴 페이지
Route::get('/deleteUser',function(){
    return view('deleteUser');
})->name('deleteUser');

// ---------------------------------------------------------------------------------------
// 기능 컨트롤러

// 로그인 컨트롤러
Route::post('/user/login', [LoginController::class, 'login'])
    ->name('user.login');

// 회원가입 컨트롤러 
Route::post('/user/regist', [RegisterController::class,'register'])
    ->name('user.regist');

// 로그아웃
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')->middleware('auth:sanctum');

// 게시판 컨트롤러
// 글 쓰기
Route::post('/post',[PostController::class, 'store'])
    ->name('post');
// 글 수정하기(기능)
Route::put('/editPage/{category}/{pId}',[PostController::class,'edit'])
->name('editPage');

// 글 삭제하기(기능)
Route::delete('/deletePage/{category}/{pId}', [PostController::class,'destroy'])
->name('deletePage');

// 유저 정보 수정
Route::put('/user/edit',[UserController::class,'edit'])
->name('user.edit');
// 유저 정보 삭제
Route::delete('/user/destroy/{email}', [UserController::class, 'destroy'])
->name('user.destroy');
