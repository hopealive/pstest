<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestFinishRequest;
use App\Models\Question;

class TestsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('tests/index', ['questions' => Question::with('option')->get()]);
    }

    public function store(TestFinishRequest $request)
    {
        //TODO: implement
        abort(403, 'Type not founded');
    }
}
