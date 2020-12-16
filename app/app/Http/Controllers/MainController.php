<?php


namespace App\Http\Controllers;


use App\Question;

/**
 * Class MainController
 * @package App\Http\Controllers
 */
class MainController
{
    public function index()
    {
        $questions = Question::with(['child','parent'])->get();

        $data = [
            'questions' => $questions
        ];

        return view('form', $data);
    }
}
