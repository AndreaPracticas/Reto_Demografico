<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {return view('actualidad');}
}