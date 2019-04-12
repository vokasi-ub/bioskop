<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FilmModel;

class FController extends Controller
{
    public function index(){
        $f = FilmModel::all();
        return view('film.film', compact('f'));
    }
}
