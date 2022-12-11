<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('blog',function(){
    // storing the data in an api in order to acquire them in the second project
    $ord=app('firebase.firestore')->database()->collection('Order')->documents();
    $arr=array();
    $text=array();
    foreach($ord as $data){
        $text=[
            'id'=>$data->id(),
            'fruit'=>$data->data()['Fruit']
        ];
        array_push($arr,$text);
    }
    return [
        "status" => 1,
        "order" => $arr];

});
