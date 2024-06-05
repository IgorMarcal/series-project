<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::query()->orderBy('nome')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request){
 
        Series::create($request->all());
        $request->session()->flash(['mensagem.sucesso' => 'Série adicionada com sucesso']);

        return to_route('series.index');
    }

    public function destroy(Request $request){
        
        $id = $request->series;
        Series::destroy($id);
        $request->session()->flash('mensagem.sucesso','Série removida com sucesso');
        

        return to_route('series.index');
    }
}
