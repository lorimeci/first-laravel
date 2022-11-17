<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CollectionController extends Controller
{
    private $posts;
    public function __construct()
    {
    //    $json=Http::get( url:' ')
    //    ->json(); 
    //    $this->posts = collect($json['data']['children']);
    }
   public function index()
    {
        return "hello collections";
    }
}
