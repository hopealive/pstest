<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionDecryptionController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //TODO: implement
        return view('vendor.voyager.question_decryption.index');
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        try {
            // $repository->save($data);//TODO: implement
        } catch (\Throwable $exception) {
            Log::error($exception);
            return redirect()->back()->with(['message' => 'Error. Data not saved', 'alert-type' => 'error']);
        }
        return redirect()->route('question_decryption.index')->with(['message' => "saved!", 'alert-type' => 'success']);
    }
}
