<?php

use App\Http\Controllers\DBhandler;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Laravel\Firebase\Facades\Firebase;
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

Route::get('/', [DBhandler::class,'read']);


Route::post('/insert',[DBhandler::class,'insert']);
Route::get('/updat/{id}',[DBhandler::class,'index']);
Route::Post('/updating',[DBhandler::class,'update']);
Route::get('/delete/{id}',[DBhandler::class,'delete']);
Route::get('/sendmail',[MailController::class,'sendmsg']);
Route::get('/inserts',function(){
    return view('insertform');
});
