<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Subscribe;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function sendmsg(){

        // this is responsible for sending the email
        Mail::to("hayekelie13@gmail.com")->send(new Subscribe("hayekelie13@gmail.com"));
        return redirect(url('/'));
    }
}
