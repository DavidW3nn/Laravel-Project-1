<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'tittle' => 'Register',
            'active' => 'register'
        ]);
    }
    
    public function store(Request $request)
    {
     $validatedData = $request->validate([
            'name' => 'required|max:255|min:1',
            'username' => 'required|min:4|max:255|unique:users',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' =>'required|min:5|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        // Import Database
        User::create($validatedData);

        //Flash Data Menggunakan Session
        // $request->session()->flash('success','Registration Succesfully! Please login');
        return redirect('/login')->with('success','Registration Succesfully! Please login');

        

    }
}
