<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TheoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WordController;
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
});


// Route::prefix('user')->group(function(){
//     Route::redirect('/', '/user/posts')->name('user');
        
    // Route::get('posts', [PostController::class, 'index'])->name('user.posts');
    // Route::get('posts/create', [PostController::class, 'create'])->name('user.posts.create');
    // Route::post('posts', [PostController::class, 'store'])->name('user.posts.store');
    // Route::get('posts/{post}', [PostController::class, 'show'])->name('user.posts.show');
    // Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('user.posts.edit');
    // Route::put('posts/{post}', [PostController::class, 'update'])->name('user.posts.update');
    // Route::delete('posts/{post}', [PostController::class, 'delete'])->name('user.posts.delete');
    // Route::put('posts/{post}/like', [PostController::class, 'like'])->name('user.posts.like');
    
    // Route::get('donates', DonateController::class)->name('user.donates');

// });

// Route::group(function(){
    Route::get('tests', [TestController::class, 'index'])->name('tests');
    Route::get('words', [WordController::class, 'index'])->name('words');

 
    Route::get('user', [UserController::class, 'index'])->name('user');
    // Route::redirect('/user/switch','user/switch/r_k')->name('user');

    // Route::get('word/verify',[WordController::class, 'get'])->name('word.get');
    // Route::get('word/verify/{number}',[WordController::class, 'word'])->name('word');
    // Route::get('word/verify/next/{number}',[WordController::class, 'next'])->name('word.next');
    // Route::get('word/verify/back/{number}',[WordController::class, 'back'])->name('word.back');

    Route::get('word/verify/ru',[WordController::class, 'get_ru'])->name('word.ru.get');
    Route::get('word/verify/ru/{number}',[WordController::class, 'word_ru'])->name('word.ru');
    Route::get('word/verify/ru/next/{number}',[WordController::class, 'next_ru'])->name('word.ru.next');
    Route::get('word/verify/ru/back/{number}',[WordController::class, 'back_ru'])->name('word.ru.back');

    Route::get('word/verify/ch',[WordController::class, 'get_ch'])->name('word.ch.get');
    Route::get('word/verify/ch/{number}',[WordController::class, 'word_ch'])->name('word.ch');
    Route::get('word/verify/ch/next/{number}',[WordController::class, 'next_ch'])->name('word.ch.next');
    Route::get('word/verify/ch/back/{number}',[WordController::class, 'back_ch'])->name('word.ch.back');

    Route::get('word/control',[WordController::class, 'word_control_get'])->name('word_control.get');
    Route::get('word/control/{number}',[WordController::class, 'word_control'])->name('word_control');
    Route::get('word/control/know/{word_id}',[WordController::class, 'word_control_know'])->name('word_control_know');
    Route::get('word/control/noknow/{word_id}',[WordController::class, 'word_control_noknow'])->name('word_control_noknow');
    Route::get('word/control/next/{number}',[WordController::class, 'word_control_next'])->name('word_control.next');
    Route::get('word/control/back/{number}',[WordController::class, 'word_control_back'])->name('word_control.back');
    Route::get('word/check/{str}',[WordController::class, 'check'])->name('word.check');

    Route::get('tests/{category}',[TestController::class, 'get'])->name('test.get');
    Route::get('test/next/{number}',[TestController::class, 'next'])->name('test.next');
    Route::get('test/back/{number}',[TestController::class, 'back'])->name('test.back');
    Route::get('test/{number}',[TestController::class,'test'])->name('test');
    Route::post('test/{str}',[TestController::class, 'post'])->name('test.post');
    Route::get('check/{str}',[TestController::class, 'check_get'])->name('check');
    Route::post('check',[TestController::class, 'check_post'])->name('check.post');
    Route::get('test/view/id={id}',[TestController::class,'view_answer'])->name('view.answer');
    Route::get('check',[TestController::class,'test_final'])->name('test.final');

    Route::get('theories',[TheoryController::class,'index'])->name('theories');
    Route::get('theory/view/id={id}',[TheoryController::class,'view'])->name('view.theory');
//  Route::middleware("guest")->group(function(){
    Route::get('register',[RegisterController::class,'index'])->name('register');
    Route::post('register',[RegisterController::class,'store'])->name('register.store');

    Route::get('login',[LoginController::class,'index'])->name('login');
    Route::post('login',[LoginController::class,'store'])->name('login.check');
// });
// });
Route::middleware("auth")->group(function(){
    Route::get('logout',[UserController::class,'logout'])->name('logout');

});

