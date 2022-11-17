<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Rules\UppercaseRule;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $data = [
            'first_name' => 'Shane',
            'last_name' => 'Rosenthal',
            'email' => 'srosenthal82@gmail.com',
        ];
        return view('profile', compact('data'));
    }
    public function store(ProfileRequest $request)
    {
      
       dd($request->all()); 
    }
}
