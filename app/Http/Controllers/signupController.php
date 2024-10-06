<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class signupController extends Controller
{
    public function index(Request $request){
        return view ('signup');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
            'Phone-num' => 'required|numeric'
        ]);

        User::create($validatedData);

        // dd('success');

        return redirect('/login');
    }

    // public function store(){
    //     return request()->all();
        
    // }
}