<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Serie;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::query()
        ->orderBy('nome')
        ->get();

        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $series = Serie::create($request->all());

        return redirect()->route('home');
    }
}
