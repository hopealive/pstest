<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestFinishRequest;
use App\Models\PsychoTypes;
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
        $questionDecryptions = QuestionDecryptions::select('psycho_type_id', 'answers')->get();

        $decrypted = [];
        $questions = Question::select('id')->get();
        foreach ($questions as $question) {
            $userAnswer = $request->get('question_' . $question->id);
            foreach ($questionDecryptions as $questionDecryption) {
                if (empty($questionDecryption->answers) || !in_array($userAnswer, $questionDecryption->answers)) {
                    continue;
                }

                if (empty($decrypted[$questionDecryption->psycho_type_id])) {
                    $decrypted[$questionDecryption->psycho_type_id] = 0;
                }
                ++$decrypted[$questionDecryption->psycho_type_id];
            }
        }

        if (empty($decrypted)) {
            return redirect()->back()->withErrors(['message' => 'Тип не знайдено. Спробуйте ще раз']);
        }

        $typeId = array_keys($decrypted, max($decrypted))[0] ?? null;
        if ($typeId === null) {
            return redirect()->back()->withErrors(['message' => 'Тип не знайдено. Спробуйте ще раз']);
        }

        $psychoType = PsychoTypes::find($typeId);
        if (!$psychoType) {
            return redirect()->back()->withErrors(['message' => 'Тип ' . $typeId . ' не знайдено. Спробуйте ще раз']);
        }
        return redirect()->route('post', ['slug' => $psychoType->post_slug]);
    }
}
