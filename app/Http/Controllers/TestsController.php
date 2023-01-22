<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestFinishRequest;
use App\Models\Question;
use App\Models\QuestionDecryptions;

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
        $questionDecryptions = QuestionDecryptions::select('type_id', 'answers', 'result_uri')->get();

        $decrypted = [];
        $questions = Question::select('id')->get();
        foreach ($questions as $question) {
            $userAnswer = $request->get('question_' . $question->id);
            foreach ($questionDecryptions as $questionDecryption) {
                $answer = $questionDecryption->answers->{$question->id} ?? null;
                if (!$answer || $userAnswer != $answer) {
                    continue;
                }

                if (empty($decrypted[$questionDecryption->type_id])) {
                    $decrypted[$questionDecryption->type_id] = 0;
                }
                ++$decrypted[$questionDecryption->type_id];
            }
        }

        if (empty($decrypted)) {
            return redirect()->back()->withErrors(['message' => 'Тип не знайдено. Спробуйте ще раз']);
        }

        $typeId = array_keys($decrypted, max($decrypted))[0] ?? null;
        if ($typeId === null) {
            return redirect()->back()->withErrors(['message' => 'Тип не знайдено. Спробуйте ще раз']);
        }
        return redirect($questionDecryptions->where('type_id', $typeId)->first()->result_uri);
    }
}
