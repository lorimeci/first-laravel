<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  
    public function index()
    {
        return DB::select("SELECT * FROM users");
    }

    function getData()
    {
        return User::all();
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $title = "welcome  everybody " ;
        $description = "Created right now " ;
        $data = [
             'iphone',
             'samsung'
        ];
    /*  return view('lorena' , compact('title', 'description')); */
    // return view('lorena')->with('title',$title);
    // return view('lorena')->with(['data' =>$data, ]);

        return view('lorena', compact('data', 'title'));
    }

}
