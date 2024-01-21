<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\user;
use Session;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    public function index()
    {
        return view('stamp');
    }
}
