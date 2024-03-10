<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\usercontroller;
use App\Http\controllers\productcontroller;
use App\Http\controllers\uploadmngcontroller;
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
Route::get('/', [usercontroller::class,'create']);
Route::post('/store', [usercontroller::class,'store']);
Route::get('list',[usercontroller::class,'list']);
Route::get('edit/{id}',[usercontroller::class,'edit']);
Route::post('update/{id}',[usercontroller::class,'update']);
Route::get('delete/{id}',[usercontroller::class,'delete']);

//database connection
Route::get("list2",[productcontroller::class,'list2']);

//image upload
Route::get("/upload",[uploadmngcontroller::class,"upload"])->name("upload");
Route::post("/upload",[uploadmngcontroller::class,"uploadpost"])->name("upload.post");

