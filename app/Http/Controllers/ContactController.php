<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact-us');
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
}
