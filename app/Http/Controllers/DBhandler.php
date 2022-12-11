<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\WebhookServer\WebhookCall;
use Symfony\Component\Console\Input\Input;


class DBhandler extends Controller
{
    // this controller contains all CRUD operations
    public function insert(Request $request){
        // the insert fucntion

        $stuRef=app('firebase.firestore')->database()->collection('Order')->newDocument();
$stuRef->set([
    'Fruit'=> $request->input('stat'),

]);
    return redirect(url('/'));
    }
    public function delete($id){

        // delete function
        app('firebase.firestore')->database()->collection('Order')->document($id)->delete();
        return redirect(url('/'));
    }
    public function update(Request $request){

        //update function
        app('firebase.firestore')->database()->collection('Order')->document($request->input('id'))->update([
            ['path'=> 'Fruit', 'value'=>$request->input('fruit')],
        ]);
        return redirect(url('/'));

    }
    public function read(){
        // the read functuion
        $ord=app('firebase.firestore')->database()->collection('Order')->documents();
        return view("testview")->with('data',$ord);

    }
    public function index($id){
        // a function that redirects to the update page
        $ord=app('firebase.firestore')->database()->collection('Order')->document($id)->snapshot();
        return view('formupdate')->with('order',$ord);
    }

}
