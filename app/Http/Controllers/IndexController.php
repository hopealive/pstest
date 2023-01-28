<?php

namespace App\Http\Controllers;

use App\Models\PsychoTypes;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index', ['psychoTypes' => PsychoTypes::all()]);
    }
}
