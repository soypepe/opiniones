<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.registro');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:100',
            'username' => 'required|max:40',
            'email' => 'required|email|max:200',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('panel');
    }
}
