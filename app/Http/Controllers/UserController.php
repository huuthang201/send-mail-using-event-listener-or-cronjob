<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event\UserCreated;

class UserController extends Controller
{
    public function SendEmail()
    {
        event(new UserCreated("thang.01yt@gmail.com"));
    }
}
