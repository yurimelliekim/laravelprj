<?php

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
    return view('welcome');
});

Route::get('/test1',function(){
   return view('test');
});

//test mem
//Route::group(['namespace'=>'testmem'],function(){
//    Route::get('/testmemList',function(){
//       return view('test');
//    })->name('testmemList');
//
//});

Route::group(['namespace'=>'testmem'],function(){
    //list
    Route::get('/testmemList',[\App\Http\Controllers\testmem\TestmemController::class,'testmemList'])->name('testmemList');

    //확인용
    Route::get('/testmemDetail',function(){
       return view('testmem/testmemDetail');
    })->name('testmemDetail');
    //detail
    Route::get('/testmemDetail/{id}',[\App\Http\Controllers\testmem\TestmemController::class,'testmemDetail'])->name('testmemDetail');
    //create
    Route::post('testmemDetail/{id?}',[\App\Http\Controllers\testmem\TestmemController::class, 'testmemCreate'])->name('testmemCreate');
    //update
    Route::put('testmemDetail/{id}',[\App\Http\Controllers\testmem\TestmemController::class, 'testmemUpdate'])->name('testmemUpdate');
    //delete
    Route::delete('testmemDelete/{id}',[\App\Http\Controllers\testmem\TestmemController::class, 'testmemDelete'])->name('testmemDelete');
    //search test
//    Route::get('searchTest',[\App\Http\Controllers\testmem\TestmemController::class,'searchTest'])->name('searchTest');

    //emailCheck ajax
    //Route::post('')

});



//member test
Route::group(['namespace'=>'member'],function(){
    //회원 리스트
    Route::get('/memberList',[\App\Http\Controllers\member\MemberController::class,'memberList'])->name('memberList');
    //회원 상세보기
    Route::get('/memberDetail/{id}',[\App\Http\Controllers\member\MemberController::class,'memberDetail'])->name('memberDetail');
    //회원 추가(상세보기 페이지에서 id=0으로)
    //Route::post('/memberAdd',[\App\Http\Controllers\member\MemberController::class,'memberAdd'])->name('memberAdd');
    Route::post('/memberDetail/{id?}',[\App\Http\Controllers\member\MemberController::class, 'memberCreate'])->name('memberCreate');
    //회원 수정
    Route::put('/memberDetail/{id}',[\App\Http\Controllers\member\MemberController::class,'memberUpdate'])->name('memberUpdate');


    //회원 삭제 uri 때문에 이렇게 하면안됨.
    //Route::delete('/memberDetail/{id}',[\App\Http\Controllers\member\MemberController::class,'memberDelete'])->name('memberDelete');

    //회원추가
    //Route::get('/memberDetail',[\App\Http\Controllers\member\MemberController::class,'memberAdd'])->name('memberAdd');




});












/*Route::get('/test',function(){

    return view('test');
});*/

Route::get('/test', [\App\Http\Controllers\Test::class, 'index']);

/*Route::group(['namespace' => 'test'], function(){
    Route::get('/test', 'test@index');
});*/

Route::get('/test/customer',[\App\Http\Controllers\Test::class, 'customer']);

//customer test
Route::get('/customer',[\App\Http\Controllers\CustomerController::class, 'index']);
Route::get('/customer/add',[\App\Http\Controllers\CustomerController::class, 'add']);
Route::post('customer/add',[\App\Http\Controllers\CustomerController::class, 'add']);


