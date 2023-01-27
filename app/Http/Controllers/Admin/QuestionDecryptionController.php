<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PsychoTypes;
use App\Models\Question;
use App\Models\QuestionDecryptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuestionDecryptionController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('vendor.voyager.question_decryption.index', [
            'psychoTypes' => PsychoTypes::all(),
            'questions' => Question::all(),
            'questionDecryptions' => QuestionDecryptions::all(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $questionDecryptions = QuestionDecryptions::all();
        try {
            foreach (PsychoTypes::all() as $psychoType) {
                $answers = [];
                foreach (Question::all() as $question) {
                    $fieldValue = $request->get('field_' . $psychoType->id . '_' . $question->id);
                    if ($fieldValue == null) {
                        continue;
                    }
                    $answers[] = $fieldValue;
                }
                $questionDecryption = $questionDecryptions->where('psycho_type_id', $psychoType->id)->first();
                if ($questionDecryption) {
                    $questionDecryption->answers = $answers;
                    $questionDecryption->save();
                } else if (!empty($answers)) {
                    $questionDecryption = QuestionDecryptions::create([
                        'psycho_type_id' => $psychoType->id,
                        'answers' => $answers,
                    ]);
                }
            }
        } catch (\Throwable $exception) {
            Log::error($exception);
            return redirect()->back()->with(['message' => 'Error. Data not saved', 'alert-type' => 'error']);
        }
        return redirect()->route('question_decryption.index')->with(['message' => "saved!", 'alert-type' => 'success']);
    }
}
