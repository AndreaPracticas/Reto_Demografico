<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with(['field', 'user'])->latest()->get();

        $noticias = $news->where('field_id', 1);
        $experiencias = $news->where('field_id', 2);
        $enlaces = $news->where('field_id', 3);

        return view('actualidad', compact('noticias', 'experiencias', 'enlaces'));
    }
}