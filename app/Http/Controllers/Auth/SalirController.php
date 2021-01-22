<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalirController extends Controller
{
    public function store(){
        
        auth()->logout();
        
        return view('home');
    }
}
