<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'register',
            'active' => 'register'
        ];
        return view('register.index',$data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);
        $validate['password']=Hash::make($validate['password']);
        User::create($validate);
        
        return redirect('/login')->with('success','Registration successfull! You can login now');
    }
}
