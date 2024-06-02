<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::all();
        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request){
        $nomeSerie = $request->input('nome');
        $series = New Series();
        $series->nome = $nomeSerie;
        $series->save();

        return redirect("/series");
    }
}
