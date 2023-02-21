<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PsychoTypes;
use App\Models\Question;
use App\Models\QuestionDecryptions;
use App\Models\QuestionOption;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserAnswerController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = UserAnswer::query()->orderByDesc('created_at')->paginate();

        $answerIds = $data->pluck('answers');
        $answers = QuestionOption::whereIn('id', array_unique(array_merge(...$answerIds)))->get();

        return view('vendor.voyager.user_answer.index', compact('data', 'answers'));
    }
}
