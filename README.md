# Project1
<p>this project is designated to create the crud operation for firestore. it is also responsible for creating an api and sending a sync request to the second project</p>

## Requirements
laravel 9<br>
Firestore

## Terminal commands
```bash
Composer require kreait/laravel-firebase 
```
```bash
Php artisan vendor:publish --provider=”Kreait\Laravel\Firebase\ServiceProvider” --tag=config
```
```bash
Composer require google/cloud-firestore
```

## CRUD operations in Firestore
the following code achieves the read function <br>
```php
    public function read(){
        // the read functuion
        $ord=app('firebase.firestore')->database()->collection('Order')->documents();
        return view("testview")->with('data',$ord);
    }
```
the following function deletes from Firestore <br>
```php
    public function delete($id){

        // delete function
        app('firebase.firestore')->database()->collection('Order')->document($id)->delete();
        return redirect(url('/'));
    }
```
the following function inserts elements into firestore <br>

```php
    public function insert(Request $request){
        // the insert fucntion

        $stuRef=app('firebase.firestore')->database()->collection('Order')->newDocument();
        $stuRef->set([
            'Fruit'=> $request->input('stat'),

]);
```
this function updates a field <br>
```php
    public function update(Request $request){

        //update function
        app('firebase.firestore')->database()->collection('Order')->document($request->input('id'))->update([
            ['path'=> 'Fruit', 'value'=>$request->input('fruit')],
        ]);
        return redirect(url('/'));

    }
        public function index($id){
        // a function that redirects to the update page
        $ord=app('firebase.firestore')->database()->collection('Order')->document($id)->snapshot();
        return view('formupdate')->with('order',$ord);
    }
```
## Routes
in order to route to the above controller and access it's function we write the following code in web.php file <br>
```php
Route::get('/', [DBhandler::class,'read']);
Route::post('/insert',[DBhandler::class,'insert']);
Route::get('/updat/{id}',[DBhandler::class,'index']);
Route::Post('/updating',[DBhandler::class,'update']);
Route::get('/delete/{id}',[DBhandler::class,'delete']);
```
## Verification email
in order to send an email we have to run the following terminal command to create a maillable item
```bash
php artisan make:mail Subscribe --markdown=emails.subscribers
```
then we create a controller that initiates the sending of the email <br>
```php
    public function sendmsg(){

        // this is responsible for sending the email
        Mail::to("hayekelie13@gmail.com")->send(new Subscribe("hayekelie13@gmail.com"));
        return redirect(url('/'));
    }
```

## Sending data to the API
we send data to this api in order to relay the data to the second project and send them to the online database the code is written in api.php <br>
```php
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
```

## Final Remark
this project will send the data to the api and then when the sync button is initiated it will send an email to the owner so he can send the request to the seconde project

